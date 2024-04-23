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

namespace PayPlug\src\models\classes;

if (!defined('_PS_VERSION_')) {
    exit;
}

class Translation
{
    private $dependencies;

    public function __construct($dependencies)
    {
        $this->dependencies = $dependencies;
    }

    /**
     * @return array
     */
    public function getCardTranslations()
    {
        return [
            'delete' => [
                'confirm' => $this->l('card.delete.confirm', 'translation'),
                'success' => $this->l('card.delete.success', 'translation'),
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFooterTranslations()
    {
        return [
            'button' => [
                'text' => $this->l('footer.button.text', 'translation'),
            ],
            'faq' => [
                'top' => $this->l('footer.faq.top', 'translation'),
                'bottom' => $this->l('footer.faq.bottom', 'translation'),
                'link' => $this->l('footer.faq.link', 'translation'),
                'link_url' => $this->l('footer.faq.link_url', 'translation'),
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFrontIntegratedPaymentTranslations()
    {
        return [
            'privacy' => $this->l('ip.privacy', 'translation'),
            'secure' => $this->l('ip.secure', 'translation'),
        ];
    }

    /**
     * @return array
     */
    public function getHeaderTranslations()
    {
        return [
            'hidden' => $this->l('payplug.getHeaderTranslations.headerHidden', 'translation'),
            'visible' => $this->l('payplug.getHeaderTranslations.headerVisible', 'translation'),
            'title' => $this->l('payplug.getHeaderTranslations.headerTitle', 'translation'),
            'text' => $this->l('payplug.getHeaderTranslations.headerText', 'translation'),
        ];
    }

    /**
     * @return array
     */
    public function getLoggedTranslations()
    {
        return [
            'title' => $this->l('logged.title', 'translation'),
            'description' => $this->l('logged.description', 'translation'),
            'user' => [
                'link' => $this->l('logged.user.link', 'translation'),
                'logout' => $this->l('logged.user.logout', 'translation'),
            ],
            'mode' => [
                'title' => $this->l('logged.mode.title', 'translation'),
                'description' => [
                    'live' => $this->l('logged.mode.description.live', 'translation'),
                    'sandbox' => $this->l('logged.mode.description.sandbox', 'translation'),
                ],
                'link' => [
                    'live' => $this->l('logged.mode.link.live', 'translation'),
                    'sandbox' => $this->l('logged.mode.link.sandbox', 'translation'),
                ],
                'options' => [
                    'live' => $this->l('logged.mode.options.live', 'translation'),
                    'sandbox' => $this->l('logged.mode.options.sandbox', 'translation'),
                ],
            ],
            'inactive' => [
                'modal' => [
                    'title' => $this->l('logged.inactive.modal.title', 'translation'),
                    'description' => $this->l('logged.inactive.modal.description', 'translation'),
                    'password_label' => $this->l('logged.inactive.modal.password_label', 'translation'),
                    'cancel' => $this->l('logged.inactive.modal.cancel', 'translation'),
                    'ok' => $this->l('logged.inactive.modal.ok', 'translation'),
                    'error' => $this->l('logged.inactive.modal.error', 'translation'),
                ],
                'account' => [
                    'warning' => [
                        'title' => $this->l('logged.inactive.account.warning.title', 'translation'),
                        'description' => $this->l('logged.inactive.account.warning.description', 'translation'),
                        'link' => $this->l('logged.inactive.account.warning.link', 'translation'),
                        'trigger' => $this->l('logged.inactive.account.warning.trigger', 'translation'),
                    ],
                    'error' => [
                        'title' => $this->l('logged.inactive.account.error.title', 'translation'),
                        'description' => $this->l('logged.inactive.account.error.description', 'translation'),
                    ],
                    'success' => [
                        'title' => $this->l('logged.inactive.account.success.title', 'translation'),
                        'description' => $this->l('logged.inactive.account.success.description', 'translation'),
                    ],
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getLoginTranslations()
    {
        return [
            'title' => $this->l('login.title', 'translation'),
            'description' => $this->l('login.description', 'translation'),
            'email' => $this->l('login.email', 'translation'),
            'password' => $this->l('login.password', 'translation'),
            'register' => $this->l('login.register', 'translation'),
            'connect' => $this->l('login.connect', 'translation'),
            'forgot_password' => $this->l('login.forgot_password', 'translation'),
            'login_error' => $this->l('login.error', 'translation'),
        ];
    }

    /**
     * @return array
     */
    public function getModalTranslations()
    {
        return [
            'confirmation' => [
                'text' => $this->l('modal.confirmation.text', 'translation'),
                'submit' => $this->l('modal.confirmation.submit', 'translation'),
            ],
            'premium' => [
                'title' => $this->l('modal.premium.title', 'translation'),
                'description' => [
                    'unavailable' => $this->l('modal.premium.description.unavailable', 'translation'),
                    'form' => $this->l('modal.premium.description.form', 'translation'),
                    'contact' => $this->l('modal.premium.description.contact', 'translation'),
                    'default' => $this->l('modal.premium.description.default', 'translation'),
                    'oney' => $this->l('modal.premium.description.oney', 'translation'),
                ],
                'link' => [
                    'form' => $this->l('modal.premium.link.form', 'translation'),
                    'contact' => $this->l('modal.premium.link.contact', 'translation'),
                    'default' => $this->l('modal.premium.link.default', 'translation'),
                    'oney' => $this->l('modal.premium.link.oney', 'translation'),
                ],
                'feature' => [
                    'american_express' => $this->l('modal.premium.feature.american_express', 'translation'),
                    'applepay' => $this->l('modal.premium.feature.applepay', 'translation'),
                    'bancontact' => $this->l('modal.premium.feature.bancontact', 'translation'),
                    'integrated' => $this->l('modal.premium.feature.integrated', 'translation'),
                    'giropay' => $this->l('modal.premium.feature.giropay', 'translation'),
                    'ideal' => $this->l('modal.premium.feature.ideal', 'translation'),
                    'mybank' => $this->l('modal.premium.feature.mybank', 'translation'),
                    'satispay' => $this->l('modal.premium.feature.satispay', 'translation'),
                    'sofort' => $this->l('modal.premium.feature.sofort', 'translation'),
                ],
                'submit' => $this->l('modal.premium.submit', 'translation'),
            ],
        ];
    }

    /**
     * @return array
     */
    public function getOrderTranslations()
    {
        return [
            'update' => [
                'invalid_amount_message' => $this->l('order.update.invalid_amount_message', 'translation'),
            ],
            'module_name' => [
                'amex' => $this->l('order.module.amex', 'translation'),
                'applepay' => $this->l('order.module.applepay', 'translation'),
                'bancontact' => $this->l('order.module.bancontact', 'translation'),
                'default' => $this->l('order.module.default', 'translation'),
                'giropay' => $this->l('order.module.giropay', 'translation'),
                'ideal' => $this->l('order.module.ideal', 'translation'),
                'mybank' => $this->l('order.module.mybank', 'translation'),
                'oney' => [
                    'default' => $this->l('order.module.oney.default', 'translation'),
                    'x3_with_fees' => $this->l('order.module.oney.x3_with_fees', 'translation'),
                    'x3_without_fees' => $this->l('order.module.oney.x3_without_fees', 'translation'),
                    'x4_with_fees' => $this->l('order.module.oney.x4_with_fees', 'translation'),
                    'x4_without_fees' => $this->l('order.module.oney.x4_without_fees', 'translation'),
                ],
                'satispay' => $this->l('order.module.satispay', 'translation'),
                'sofort' => $this->l('order.module.sofort', 'translation'),
            ],
            'detail' => [
                'mode' => [
                    'live' => $this->l('order.detail.mode.live', 'translation'),
                    'test' => $this->l('order.detail.mode.test', 'translation'),
                ],
                'method' => [
                    'bancontact' => $this->l('order.detail.method.bancontact', 'translation'),
                    'applepay' => $this->l('order.detail.method.applepay', 'translation'),
                    'amex' => $this->l('order.detail.method.amex', 'translation'),
                    'oney' => [
                        'x3_with_fees' => $this->l('order.detail.method.oney.x3_with_fees', 'translation'),
                        'x4_with_fees' => $this->l('order.detail.method.oney.x4_with_fees', 'translation'),
                        'x3_without_fees' => $this->l('order.detail.method.oney.x3_without_fees', 'translation'),
                        'x4_without_fees' => $this->l('order.detail.method.oney.x4_without_fees', 'translation'),
                    ],
                ],
                'status' => [
                    'abandoned' => $this->l('order.detail.status.abandoned', 'translation'),
                    'authorization_expired' => $this->l('order.detail.status.authorization_expired', 'translation'),
                    'authorized' => $this->l('order.detail.status.authorized', 'translation'),
                    'cancelled' => $this->l('order.detail.status.cancelled', 'translation'),
                    'failed' => $this->l('order.detail.status.failed', 'translation'),
                    'not_paid' => $this->l('order.detail.status.not_paid', 'translation'),
                    'on_going' => $this->l('order.detail.status.on_going', 'translation'),
                    'oney_pending' => $this->l('order.detail.status.oney_pending', 'translation'),
                    'paid' => $this->l('order.detail.status.paid', 'translation'),
                    'partially_refunded' => $this->l('order.detail.status.partially_refunded', 'translation'),
                    'refunded' => $this->l('order.detail.status.refunded', 'translation'),
                    'suspended' => $this->l('order.detail.status.suspended', 'translation'),
                ],
                'yes' => $this->l('order.detail.yes', 'translation'),
                'no' => $this->l('order.detail.no', 'translation'),
                'card' => $this->l('order.detail.card', 'translation'),
                'capture' => [
                    'deferred' => $this->l('order.detail.capture.deferred', 'translation'),
                    'expiration' => $this->l('order.detail.capture.expiration', 'translation'),
                    'warning' => $this->l('order.detail.capture.warning', 'translation'),
                ],
            ],
        ];
    }

    /**
     * @description  get oney front office translations
     *
     * @return array
     */
    public function getOneyTranslations()
    {
        return [
            'required_field' => $this->l('Please fill in the required fields', 'translation'),
            'mobile' => $this->l('Please enter your mobile phone number.', 'translation'),
            'shipping_firstname' => $this->l('Please enter your shipping firstname.', 'translation'),
            'billing_firstname' => $this->l('Please enter your billing firstname.', 'translation'),
            'shipping_lastname' => $this->l('Please enter your shipping lastname.', 'translation'),
            'billing_lastname' => $this->l('Please enter your billing lastname.', 'translation'),
            'shipping_address' => $this->l('Please enter your shipping address.', 'translation'),
            'billing_address' => $this->l('Please enter your billing address.', 'translation'),
            'shipping_postcode' => $this->l('Please enter your shipping postcode.', 'translation'),
            'billing_postcode' => $this->l('Please enter your billing postcode.', 'translation'),
            'schedules_unavailable' => $this->l('oney.getOneyPriceAndPaymentOptions.unavailable', 'translation'),
            'shipping_city' => $this->l('Please enter your shipping city.', 'translation'),
            'billing_city' => $this->l('Please enter your billing city.', 'translation'),
            'city_name_error' => $this->l('Your city name is too long (max 32 characters).', 'translation'),
            'city_name_message' => $this->l(
                ' Please change it to another one or select another payment method.',
                'translation'
            ),
            'percentage' => $this->l('Payment in %sx', 'translation'),
            'cart_error' => $this->l('The cart is unvalid', 'translation'),
            'amount_error' => $this->l('oney.isValidOneyAmount.unvalid', 'translation'),
            'email_error' => $this->l('Your email address is not a valid email', 'translation'),
            'email_length_char_error' => $this->l(
                'Your email address is too long and the + character is not valid',
                'translation'
            ),
            'email_message' => $this->l(' please change it to another address (max 100 characters).', 'translation'),
            'email_char_error' => $this->l(
                'The + character is not valid. Please change your email address (100 characters max).',
                'translation'
            ),
            'email_length_error' => $this->l(
                'Your email address is too long. Please change your email address (100 characters max).',
                'translation'
            ),
            'email_invalid' => $this->l('Your email address is not a valid email', 'translation'),
            'pay_with_fee' => $this->l('payplug.getPaymentOptions.payWithOney', 'translation'),
            'pay_without_fee' => $this->l('payplug.getPaymentOptions.payWithOneyWithout', 'translation'),
            'payment_option_error' => $this->l('payplug.getPaymentOptions.errorOccurred', 'translation'),
            'address_invalid' => $this->l('payplug.getPaymentOptions.invalidAddresses', 'translation'),
            'invalid_amount' => $this->l('payplug.getPaymentOptions.invalidAmount', 'translation'),
            'invalid_carrier' => $this->l('payplug.getPaymentOptions.invalidCarrier', 'translation'),
            'invalid_cart' => $this->l('payplug.getPaymentOptions.invalidCart', 'translation'),
        ];
    }

    /**
     * @return array
     */
    public function getOrderStateActionRenderTranslations()
    {
        return [
            'undefined' => $this->l('action.orderState.renderOption.undefined', 'translation'),
            'nothing' => $this->l('action.orderState.renderOption.orderStateTypeNothing', 'translation'),
            'cancelled' => $this->l('action.orderState.renderOption.orderStateTypeCancelled', 'translation'),
            'error' => $this->l('action.orderState.renderOption.orderStateTypeError', 'translation'),
            'expired' => $this->l('action.orderState.renderOption.orderStateTypeExpired', 'translation'),
            'paid' => $this->l('action.orderState.renderOption.orderStateTypePaid', 'translation'),
            'pending' => $this->l('action.orderState.renderOption.orderStateTypePending', 'translation'),
            'refund' => $this->l('action.orderState.renderOption.orderStateTypeRefund', 'translation'),
        ];
    }

    /**
     * @return array
     */
    public function getPaylaterTranslations()
    {
        return [
            'title' => $this->l('paylater.title', 'translation'),
            'description' => $this->l('paylater.description', 'translation'),
            'advanced' => $this->l('paylater.advanced', 'translation'),
            'link' => $this->l('paylater.link', 'translation'),
            'options' => [
                'title' => $this->l('paylater.options.title', 'translation'),
                'description' => $this->l('paylater.options.description', 'translation'),
                'with_fees' => [
                    'label' => $this->l('paylater.options.with_fees.label', 'translation'),
                    'subtext' => $this->l('paylater.options.with_fees.subtext', 'translation'),
                ],
                'without_fees' => [
                    'label' => $this->l('paylater.options.without_fees.label', 'translation'),
                    'subtext' => $this->l('paylater.options.without_fees.subtext', 'translation'),
                ],
            ],
            'oneySchedule' => [
                'title' => $this->l('oneySchedule.title', 'translation'),
                'description' => $this->l('oneySchedule.description', 'translation'),
                'knowMore' => [
                    'text' => $this->l('oneySchedule.knowMore.text', 'translation'),
                ],
            ],
            'oneyPopupProduct' => [
                'title' => $this->l('oneyPopupProduct.title', 'translation'),
            ],
            'oneyPopupCart' => [
                'title' => $this->l('oneyPopupCart.title', 'translation'),
            ],
            'thresholds' => [
                'title' => $this->l('thresholds.title', 'translation'),
                'description' => $this->l('thresholds.description', 'translation'),
                'inter' => $this->l('thresholds.inter', 'translation'),
                'error' => [
                    'default' => $this->l('thresholds.error.text', 'translation'),
                    'max' => $this->l('thresholds.error.max.text', 'translation'),
                    'min' => $this->l('thresholds.error.min.text', 'translation'),
                ],
            ],
        ];
    }

    /**
     * @todo: Dispatch the different payment methods translation in their function
     *
     * @return array
     */
    public function getPaymentMethodsTranslations()
    {
        return [
            'title' => $this->l('paymentmethods.title', 'translation'),
            'description' => $this->l('paymentmethods.description', 'translation'),
            'standard' => [
                'title' => $this->l('paymentmethods.standard.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.standard.descriptions.live', 'translation'),
                ],
                'link' => $this->l('paymentmethods.standard.link', 'translation'),
                'advanced' => $this->l('paymentmethods.standard.advanced', 'translation'),
                'call_to_action' => $this->l('paymentmethods.standard.call_to_action', 'translation'),
                'has_saved_card' => $this->l('paymentmethods.standard.has_saved_card', 'translation'),
            ],
            'embedded' => [
                'title' => $this->l('paymentmethods.embedded.title', 'translation'),
                'descriptions' => [
                    'integrated' => [
                        'text' => $this->l('paymentmethods.embedded.descriptions.integrated.text', 'translation'),
                    ],
                    'popup' => [
                        'text' => $this->l('paymentmethods.embedded.descriptions.popup.text', 'translation'),
                        'link' => $this->l('paymentmethods.embedded.descriptions.popup.link', 'translation'),
                    ],
                    'redirect' => [
                        'text' => $this->l('paymentmethods.embedded.descriptions.redirect.text', 'translation'),
                        'link' => $this->l('paymentmethods.embedded.descriptions.redirect.link', 'translation'),
                    ],
                ],
                'link' => $this->l('paymentmethods.embedded.link', 'translation'),
                'options' => [
                    'integrated' => $this->l('paymentmethods.embedded.options.integrated', 'translation'),
                    'popup' => $this->l('paymentmethods.embedded.options.popup', 'translation'),
                    'redirect' => $this->l('paymentmethods.embedded.options.redirect', 'translation'),
                ],
            ],
            'integrated' => [
                'alert' => [
                    'title' => $this->l('paymentmethods.integrated.alert.text.title', 'translation'),
                    'text' => $this->l('paymentmethods.integrated.alert.text', 'translation'),
                ],
            ],
            'one_click' => [
                'title' => $this->l('paymentmethods.one_click.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.one_click.descriptions.live', 'translation'),
                ],
                'link' => $this->l('paymentmethods.one_click.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.one_click.call_to_action', 'translation'),
            ],

            'installment' => [
                'title' => $this->l('paymentmethods.installment.title', 'translation'),
                'descriptions' => [
                    'description_1' => $this->l('paymentmethods.installment.descriptions.description_1', 'translation'),
                    'text_from' => $this->l('paymentmethods.installment.descriptions.text_from', 'translation'),
                    'description_2' => $this->l('paymentmethods.installment.descriptions.description_2', 'translation'),
                    'controller_link' => $this->l('paymentmethods.installment.descriptions.controller_link', 'translation'),
                    'alert' => [
                        'start' => $this->l('paymentmethods.installment.descriptions.alert.start', 'translation'),
                        'end' => $this->l('paymentmethods.installment.descriptions.alert.end', 'translation'),
                    ],
                ],
                'select' => [
                    '2_schedules' => $this->l('paymentmethods.installment.select.2_schedules', 'translation'),
                    '3_schedules' => $this->l('paymentmethods.installment.select.3_schedules', 'translation'),
                    '4_schedules' => $this->l('paymentmethods.installment.select.4_schedules', 'translation'),
                ],
                'link' => $this->l('paymentmethods.installment.link', 'translation'),
                'error_limit' => $this->l('paymentmethods.installment.error_limit', 'translation'),
                'call_to_action' => $this->l('paymentmethods.installment.call_to_action', 'translation'),
            ],
            'deferred' => [
                'title' => $this->l('paymentmethods.deferred.title', 'translation'),
                'descriptions' => [
                    'description_1' => $this->l('paymentmethods.deferred.descriptions.description_1', 'translation'),
                    'description_2' => $this->l('paymentmethods.deferred.descriptions.description_2', 'translation'),
                ],
                'states' => [
                    'default' => $this->l('paymentmethods.deferred.states.default', 'translation'),
                    'state' => $this->l('paymentmethods.deferred.states.state', 'translation'),
                    'alert' => $this->l('paymentmethods.deferred.states.alert', 'translation'),
                ],
                'link' => $this->l('paymentmethods.deferred.link', 'translation'),
            ],
            'amex' => [
                'title' => $this->l('paymentmethods.amex.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.amex.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.amex.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.amex.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.amex.call_to_action', 'translation'),
            ],
            'applepay' => [
                'title' => $this->l('paymentmethods.applepay.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.applepay.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.applepay.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.applepay.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.applepay.call_to_action', 'translation'),
            ],
            'bancontact' => [
                'title' => $this->l('paymentmethods.bancontact.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.bancontact.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.bancontact.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.bancontact.link', 'translation'),
                'user' => [
                    'title' => $this->l('paymentmethods.bancontact.user.title', 'translation'),
                    'description' => $this->l('paymentmethods.bancontact.user.description', 'translation'),
                ],
                'call_to_action' => $this->l('paymentmethods.bancontact.call_to_action', 'translation'),
            ],
            'satispay' => [
                'title' => $this->l('paymentmethods.satispay.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.satispay.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.satispay.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.satispay.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.satispay.call_to_action', 'translation'),
            ],
            'sofort' => [
                'title' => $this->l('paymentmethods.sofort.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.sofort.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.sofort.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.sofort.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.sofort.call_to_action', 'translation'),
            ],
            'giropay' => [
                'title' => $this->l('paymentmethods.giropay.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.giropay.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.giropay.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.giropay.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.giropay.call_to_action', 'translation'),
            ],
            'ideal' => [
                'title' => $this->l('paymentmethods.ideal.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.ideal.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.ideal.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.ideal.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.ideal.call_to_action', 'translation'),
            ],
            'mybank' => [
                'title' => $this->l('paymentmethods.mybank.title', 'translation'),
                'descriptions' => [
                    'live' => $this->l('paymentmethods.mybank.descriptions.live', 'translation'),
                    'sandbox' => $this->l('paymentmethods.mybank.descriptions.sandbox', 'translation'),
                ],
                'link' => $this->l('paymentmethods.mybank.link', 'translation'),
                'call_to_action' => $this->l('paymentmethods.mybank.call_to_action', 'translation'),
            ],
        ];
    }

    /**
     * @return array
     */
    public function getRequirementsTranslations()
    {
        return [
            'title' => $this->l('payplug.getRequirementsTranslations.requirementsTitle', 'translation'),
            'descriptions' => [
                'description' => $this->l(
                    'payplug.getRequirementsTranslations.requirementsDescription',
                    'translation'
                ),
                'errorMessage' => $this->l(
                    'payplug.getRequirementsTranslations.requirementsDescriptionErrorMessage',
                    'translation'
                ),
                'check' => $this->l(
                    'payplug.getRequirementsTranslations.requirementsDescriptionsCheck',
                    'translation'
                ),
                'successMessage' => $this->l(
                    'payplug.getRequirementsTranslations.requirementsDescriptionsSuccessMessage',
                    'translation'
                ),
            ],
            'requirements' => [
                'curl' => [
                    'text' => $this->l(
                        'payplug.getRequirementsTranslations.requirementsCurlText',
                        'translation'
                    ),
                ],
                'php' => [
                    'text' => $this->l(
                        'payplug.getRequirementsTranslations.requirementsPhpText',
                        'translation'
                    ),
                ],
                'openssl' => [
                    'text' => $this->l(
                        'payplug.getRequirementsTranslations.requirementsOpensslText',
                        'translation'
                    ),
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getSubscribeTranslations()
    {
        return [
            'title' => $this->l('subscribe.title', 'translation'),
            'description' => $this->l('subscribe.description', 'translation'),
            'text' => $this->l('subscribe.text', 'translation'),
            'register' => $this->l('subscribe.register', 'translation'),
            'connect' => $this->l('subscribe.connect', 'translation'),
        ];
    }

    /**
     * @description Return translation for a given key and template
     *
     * @param string $string
     * @param string $name
     *
     * @return string
     */
    public function l($string = '', $name = '')
    {
        if (!is_string($string) || !$string) {
            return '';
        }

        if (!is_string($name) || !$name) {
            return '';
        }

        $translation = $this->dependencies
            ->getPlugin()
            ->getTranslationAdapter()
            ->trans($this->dependencies->name, $string, $name);

        return $string != $translation
            ? $translation
            : $this->getDefaultTranslation($string, $name);
    }

    /**
     * @description Return default translation for a given key and template
     *
     * @param string $string
     * @param string $name
     * @param mixed $default_translations
     * @param mixed $default_lang
     *
     * @return string
     */
    protected function getDefaultTranslation($string = '', $name = '', $default_translations = [], $default_lang = 'en')
    {
        if (!is_string($string) || !$string) {
            return '';
        }

        if (!is_string($name) || !$name) {
            return '';
        }

        $default_translation_file = dirname(__FILE__) . '/../../../translations/' . $default_lang . '.php';
        if (file_exists($default_translation_file)) {
            include $default_translation_file;
            $default_translations = $GLOBALS['_MODULE'];
        }

        if (empty($default_translations)) {
            return '';
        }

        $translation_key = '<{' . $this->dependencies->name . '}prestashop>' . strtolower($name) . '_' . md5($string);

        return isset($default_translations[$translation_key]) ? $default_translations[$translation_key] : $string;
    }
}
