<?php
/**
 * 2013 - 2024 Payplug SAS.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0).
 * It is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@payplug.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
 * versions in the future.
 *
 * @author    Payplug SAS
 * @copyright 2013 - 2024 Payplug SAS
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of Payplug SAS
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * @description Dispatch payment method
 */
class PayplugDispatcherModuleFrontController extends ModuleFrontController
{
    private $cartAdapter;
    private $dependenciesClass;
    private $orderAdapter;
    private $paymentAction;
    private $refundAction;
    private $toolsAdapter;

    public function __construct()
    {
        parent::__construct();
        $this->dependenciesClass = new PayPlug\classes\DependenciesClass();
        $this->cartAdapter = $this->dependenciesClass->getPlugin()->getCart();
        $this->orderAdapter = $this->dependenciesClass->getPlugin()->getOrder();
        $this->paymentAction = $this->dependenciesClass->getPlugin()->getPaymentAction();
        $this->refundAction = $this->dependenciesClass->getPlugin()->getRefundAction();
        $this->toolsAdapter = $this->dependenciesClass->getPlugin()->getTools();
    }

    /**
     * @description Method that is executed after init() and checkAccess().
     */
    public function postProcess()
    {
        if ($method = $this->toolsAdapter->tool('getValue', 'method')) {
            $error_url = 'index.php?controller=order&step=3&has_error=1&modulename=' . $this->dependenciesClass->name;

            // Check if order exists
            $cart = $this->cartAdapter->get((int) (int) $this->toolsAdapter->tool('getValue', 'id_cart'));
            $order = $this->orderAdapter->get((int) $this->orderAdapter->getOrderByCartId((int) $cart->id));
            $order_exists = $this->dependenciesClass
                ->getValidators()['order']
                ->isCreated($order, (int) $cart->id);
            if ($order_exists['result']) {
                $this->dependenciesClass->getHelpers()['cookies']->setPaymentErrorsCookie([
                    $this->dependenciesClass->l('The transaction was not completed and your card was not charged.'),
                ]);
                $this->toolsAdapter->tool('redirect', $error_url);
            }

            $payment = $this->paymentAction->dispatchAction($method);

            if (empty($payment)) {
                if ('applepay' == $method) {
                    exit(json_encode([
                        'result' => false,
                        'message' => 'Failed preparePayment',
                    ]));
                }

                $this->dependenciesClass->getHelpers()['cookies']->setPaymentErrorsCookie([
                    $this->dependenciesClass->l('The transaction was not completed and your card was not charged.'),
                ]);
                $this->toolsAdapter->tool('redirect', $error_url);
            }

            if ('applepay' == $method) {
                exit(json_encode([
                    'result' => true,
                    'apiResponse' => $payment['resource']->payment_method,
                    'idPayment' => $payment['resource']->id,
                    'idCart' => $this->context->cart->id,
                ]));
            }
            $this->toolsAdapter->tool('redirect', $payment['return_url']);
        }
    }
}
