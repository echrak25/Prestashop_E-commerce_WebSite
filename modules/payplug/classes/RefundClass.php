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

namespace PayPlug\classes;

if (!defined('_PS_VERSION_')) {
    exit;
}

class RefundClass
{
    private $configuration;
    private $context;
    private $dependencies;
    private $logger;
    private $order;
    private $orderHistory;
    private $orderSlip;
    private $tools;
    private $validate;
    private $validators;

    public function __construct($dependencies)
    {
        $this->dependencies = $dependencies;
        $this->configuration = $this->dependencies->getPlugin()->getConfigurationClass();
        $this->context = $this->dependencies->getPlugin()->getContext()->get();
        $this->logger = $this->dependencies->getPlugin()->getLogger();
        $this->order = $this->dependencies->getPlugin()->getOrder();
        $this->orderHistory = $this->dependencies->getPlugin()->getOrderHistory();
        $this->orderSlip = $this->dependencies->getPlugin()->getOrderSlip();
        $this->tools = $this->dependencies->getPlugin()->getTools();
        $this->validate = $this->dependencies->getPlugin()->getValidate();
        $this->validators = $this->dependencies->getValidators();
    }

    /**
     * Generate refund form
     * Done.
     *
     * @param int $amount_refunded_payplug
     * @param int $amount_available
     *
     * @return string
     */
    public function getRefundData($amount_refunded_payplug, $amount_available)
    {
        $this->context->smarty->assign([
            'amount_refunded_payplug' => $amount_refunded_payplug,
            'amount_available' => $amount_available,
        ]);

        return $this->dependencies->configClass->fetchTemplate('/views/templates/admin//order/refund_data.tpl');
    }

    /**
     * @description Get total amount already refunded
     *
     * @param int $id_order
     *
     * @return int
     */
    public function getTotalRefunded($id_order = 0)
    {
        if (!$id_order || !is_int($id_order)) {
            return 0;
        }
        $order = $this->order->get((int) $id_order);
        if (!$this->validate->validate('isLoadedObject', $order)) {
            return 0;
        }

        $amount_refunded_presta = 0;
        $flag_shipping_refunded = false;

        $order_slips = $this->orderSlip->getOrdersSlip($order->id_customer, $order->id);
        if (isset($order_slips) && !empty($order_slips) && sizeof($order_slips)) {
            foreach ($order_slips as $order_slip) {
                $amount_refunded_presta += $order_slip['amount'];
                if (!$flag_shipping_refunded && 1 == $order_slip['shipping_cost']) {
                    $amount_refunded_presta += $order_slip['shipping_cost_amount'];
                    $flag_shipping_refunded = true;
                }
            }
        }

        return $amount_refunded_presta;
    }

    /**
     * @description  Refund a payment
     *
     * @return string
     */
    public function refundPayment()
    {
        $this->logger->addLog('[Payplug] Start refund', 'notice');
        $amount = str_replace(',', '.', $this->tools->tool('getValue', 'amount'));
        $id_order = $this->tools->tool('getValue', 'id_order');
        $resource_id = $this->tools->tool('getValue', 'resource_id');
        $is_installment = $this->dependencies->getValidators()['payment']->isInstallment($resource_id)['result'];
        $pay_id = !$is_installment ? $resource_id : false;
        $inst_id = $is_installment ? $resource_id : false;
        $pay_mode = $this->tools->tool('getValue', 'pay_mode');

        $this->dependencies->apiClass->initializeApi('test' == $pay_mode);

        $amount_available = 0;
        if ($inst_id) {
            $installment = $this->dependencies->apiClass->retrieveInstallment($inst_id);
            if (!$installment['result']) {
                exit(json_encode([
                    'status' => 'error',
                    'data' => $this->dependencies
                        ->getPlugin()
                        ->getTranslationClass()
                        ->l('payplug.refundPayment.cannotRefund', 'refundclass'),
                ]));
            }

            foreach ($installment['resource']->schedule as $schedule) {
                foreach ($schedule->payment_ids as $p_id) {
                    $payment = $this->dependencies->apiClass->retrievePayment($p_id);
                    if ($payment['resource']->is_paid && !$payment['resource']->is_refunded) {
                        $amount_available += $payment['resource']->amount - $payment['resource']->amount_refunded;
                    }
                }
            }
        } else {
            $payment = $this->dependencies->apiClass->retrievePayment($pay_id);
            if (!$payment['result']) {
                exit(json_encode([
                    'status' => 'error',
                    'data' => $this->dependencies
                        ->getPlugin()
                        ->getTranslationClass()
                        ->l('payplug.refundPayment.cannotRefund', 'refundclass'),
                ]));
            }
            $amount_available = $payment['resource']->amount - $payment['resource']->amount_refunded;
        }

        $amount = is_numeric($amount) ? $this->dependencies->amountCurrencyClass->convertAmount($amount) : 0;

        $is_refundable_amount = $this->validators['payment']->isRefundableAmount(
            (int) $amount,
            (int) $amount_available
        );

        if (!$is_refundable_amount['result']) {
            switch ($is_refundable_amount['code']) {
                case 'format':
                    $this->logger->addLog('Incorrect amount to refund', 'notice');
                    exit(json_encode([
                        'status' => 'error',
                        'data' => $this->dependencies
                            ->getPlugin()
                            ->getTranslationClass()
                            ->l('payplug.refundPayment.incorrectAmount', 'refundclass'),
                    ]));
                case 'lower':
                    $this->logger->addLog('The amount to be refunded must be at least 0.10 €', 'notice');
                    exit(json_encode([
                        'status' => 'error',
                        'data' => $this->dependencies
                            ->getPlugin()
                            ->getTranslationClass()
                            ->l('payplug.refundPayment.amountAtLeast', 'refundclass'),
                    ]));
                case 'upper':
                default:
                    $this->logger->addLog('Cannot refund that amount.', 'notice');
                    exit(json_encode([
                        'status' => 'error',
                        'data' => $this->dependencies
                            ->getPlugin()
                            ->getTranslationClass()
                            ->l('payplug.refundPayment.cannotRefund', 'refundclass'),
                    ]));
            }
        }

        $metadata = [
            'ID Client' => (int) $this->tools->tool('getValue', 'id_customer'),
            'reason' => 'Refunded with Prestashop',
        ];

        $refund = $this->dependencies
            ->getPlugin()
            ->getRefundAction()->refundAction($pay_id, $amount, $metadata, $pay_mode, $inst_id);

        if ('error' == $refund) {
            $this->logger->addLog('Cannot refund that amount.', 'notice');
            $this->logger->addLog(
                '$pay_id : ' . $pay_id .
                ' - $amount : ' . $amount .
                ' - $metadata : ' . json_encode($metadata) . // or implode() ?
                ' - $pay_mode : ' . $pay_mode .
                ' - $inst_id : ' . $inst_id,
                'debug'
            );

            exit(json_encode([
                'status' => 'error',
                'data' => $this->dependencies
                    ->getPlugin()
                    ->getTranslationClass()
                    ->l('payplug.refundPayment.cannotRefund', 'refundclass'),
            ]));
        }
        $new_state = 7;
        $reload = false;

        if ($inst_id) {
            $installment = $this->dependencies->apiClass->retrieveInstallment($inst_id);
            if (!$installment['result']) {
                $this->logger->addLog('Cannot retrieve installment with id: ' . $inst_id, 'error');

                exit(json_encode([
                    'status' => 'error',
                    'data' => $this->dependencies
                        ->getPlugin()
                        ->getTranslationClass()
                        ->l('payplug.refundPayment.errorOccurred', 'refundclass'),
                ]));
            }

            $installment = $installment['resource'];
            $amount_available = 0;
            $amount_refunded_payplug = 0;
            if (isset($installment->schedule) && $installment->schedule) {
                foreach ($installment->schedule as $schedule) {
                    if (!empty($schedule->payment_ids)) {
                        foreach ($schedule->payment_ids as $p_id) {
                            $payment = $this->dependencies->apiClass->retrievePayment($p_id);
                            if (!$payment['result']) {
                                return 'error';
                            }
                            $payment = $payment['resource'];
                            if ($payment->is_paid && !$payment->is_refunded) {
                                $amount_available += (int) ($payment->amount - $payment->amount_refunded);
                            }
                            $amount_refunded_payplug += $payment->amount_refunded;
                        }
                    }
                }
            }

            $amount_available = (float) ($amount_available / 100);
            $amount_refunded_payplug = (float) ($amount_refunded_payplug / 100);

            if ((int) $this->tools->tool('getValue', 'id_state') || !$amount_available) {
                $new_state = (int) $this->tools->tool('getValue', 'id_state');
                if (!$new_state) {
                    if (1 == $installment->is_live) {
                        $new_state = (int) $this->configuration->getValue('order_state_refund');
                    } else {
                        $new_state = (int) $this->configuration->getValue('order_state_refund_test');
                    }
                }
                $order = $this->order->get((int) $id_order);
                if ($this->validate->validate('isLoadedObject', $order)) {
                    if (!$this->dependencies->cartClass->createLockFromCartId((int) $order->id_cart)) {
                        exit(json_encode([
                            'status' => 'error',
                            'data' => $this->dependencies
                                ->getPlugin()
                                ->getTranslationClass()
                                ->l('payplug.refundPayment.errorOccurred', 'refundclass'),
                        ]));
                    }

                    $current_state = (int) $this->dependencies
                        ->getPlugin()
                        ->getOrderRepository()
                        ->getCurrentOrderState((int) $order->id);

                    $this->logger->addLog('Current order state: ' . $current_state, 'notice');
                    if (0 != $current_state && $current_state != $new_state) {
                        $history = $this->orderHistory->get();
                        $history->id_order = (int) $order->id;
                        $history->changeIdOrderState($new_state, (int) $order->id, true);
                        $history->addWithemail();
                        $this->logger->addLog('Change order state to ' . $new_state, 'notice');
                    }

                    $delete_lock = $this->dependencies
                        ->getPlugin()
                        ->getLockRepository()
                        ->deleteLock((int) $order->id_cart);
                    if (!$delete_lock) {
                        $this->logger->addLog('Lock cannot be deleted.', 'error');
                    } else {
                        $this->logger->addLog('Lock deleted.', 'notice');
                    }
                }
                $reload = true;
            }
        } else {
            $payment = $this->dependencies->apiClass->retrievePayment($refund['id']);
            if (!$payment['result']) {
                exit(json_encode([
                    'status' => 'error',
                    'data' => $this->dependencies
                        ->getPlugin()
                        ->getTranslationClass()
                        ->l('payplug.refundPayment.errorOccurred', 'refundclass'),
                ]));
            }
            $payment = $payment['resource'];
            $new_state = (int) $this->tools->tool('getValue', 'id_state');

            if ($payment->is_refunded) {
                if (1 == $payment->is_live) {
                    $new_state = (int) $this->configuration->getValue('order_state_refund');
                } else {
                    $new_state = (int) $this->configuration->getValue('order_state_refund_test');
                }
            }

            if ($new_state || ($payment->is_refunded && empty($inst_id))) {
                $order = $this->order->get((int) $id_order);
                if ($this->validate->validate('isLoadedObject', $order)) {
                    if (!$this->dependencies->cartClass->createLockFromCartId((int) $order->id_cart)) {
                        exit(json_encode([
                            'status' => 'error',
                            'data' => $this->dependencies
                                ->getPlugin()
                                ->getTranslationClass()
                                ->l('payplug.refundPayment.errorOccurred', 'refundclass'),
                        ]));
                    }

                    $current_state = (int) $this->dependencies
                        ->getPlugin()
                        ->getOrderRepository()
                        ->getCurrentOrderState((int) $order->id);

                    $this->logger->addLog('Current order state: ' . $current_state, 'notice');
                    if (0 != $current_state && $current_state != $new_state) {
                        $history = $this->orderHistory->get();
                        $history->id_order = (int) $order->id;
                        $history->changeIdOrderState($new_state, (int) $order->id, true);
                        $history->addWithemail();
                        $this->logger->addLog('Change order state to ' . $new_state, 'notice');
                    } else {
                        $this->logger->addLog('Order status is already \'refunded\'', 'notice');
                    }

                    $delete_lock = $this->dependencies
                        ->getPlugin()
                        ->getLockRepository()
                        ->deleteLock((int) $order->id_cart);
                    if (!$delete_lock) {
                        $this->logger->addLog('Lock cannot be deleted.', 'error');
                    } else {
                        $this->logger->addLog('Lock deleted.', 'notice');
                    }
                }
                $reload = true;
            }

            $amount_refunded_payplug = $payment->amount_refunded / 100;
            $amount_available = ($payment->amount - $payment->amount_refunded) / 100;
        }

        $data = $this->getRefundData(
            $amount_refunded_payplug,
            $amount_available
        );

        exit(json_encode([
            'status' => 'ok',
            'data' => $data,
            'template' => $this->dependencies->hookClass->displayAdminOrderMain(['id_order' => $id_order]),
            'message' => $this->dependencies
                ->getPlugin()
                ->getTranslationClass()
                ->l('payplug.refundPayment.success', 'refundclass'),
            'reload' => $reload,
        ]));
    }
}
