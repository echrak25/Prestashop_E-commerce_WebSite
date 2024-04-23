<?php
/**
  * Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

require_once(_PS_MODULE_DIR_.'ph_sendproduct_tofriend/classes/Ets_sptf_defines.php');
require_once(_PS_MODULE_DIR_.'ph_sendproduct_tofriend/classes/EtsSendProductForm.php');
class Ph_sendproduct_tofriendSubmitModuleFrontController extends ModuleFrontController {

    public function initContent()
    {
        $errs = array();
        $fields = Ets_sptf_defines::getInstance()->getConfigFields();
        foreach ($fields as $field){
            $res = $this->validateField($field);
            if ($res){
                $errs[$field] = $res;
            }
        }
        if ($errs){
            die(
                json_encode(array(
                        'success' => false,
                        'errors'=>$errs
                    )
                )
            );
        }else {
            $sendProductForm = new EtsSendProductForm();
            $sendProductForm ->email_to = Tools::getValue('friend-email')['val'];
            $sendProductForm ->receiver = Tools::getValue('friend-name')['val'];
            $sendProductForm ->email_from = Tools::getValue('your-email')['val'];
            $sendProductForm ->sender = Tools::getValue('your-name')['val'];
            $sendProductForm ->subject = 'subject';
            $sendProductForm ->body = Tools::getValue('sptf-message')['val'];
            $sendProductForm ->id_shop = $this->context->shop->id;
            $sendProductForm ->id_lang = $this->context->language->id;
            $sendProductForm ->is_logged = (bool)$this->context->customer->id;
            $sendProductForm->id_product = Tools::getValue('productId');
            $temp_product = $this->renderProduct(Tools::getValue('productId'));
            if ($sendProductForm->sendMail($this->context,$temp_product)){
                $sendProductForm->status=true;
                $sendProductForm->add();
                Mail::send(
                    $this->context->language->id,
                    'send_product_reply',
                    $this->module->l('Send product successfully.'),
                    array('{sender}'=>$sendProductForm->sender,'{receiver}' => $sendProductForm->receiver),
                    $sendProductForm->email_from,
                    $sendProductForm->sender,
                    $sendProductForm->email_to,
                    $this->context->shop->name,
                    null,
                    null,
                    dirname(__FILE__).'/../../../mails/',
                    null,
                    $this->context->shop->id
                );
                die(json_encode(array(
                    'success'=>true,
                    'message'=> 'Mail sent successfully'
                )));
            }else{
                $sendProductForm->status=false;
                $sendProductForm->add();
                die(json_encode(array(
                    'success'=>true,
                    'message'=> 'Send mail failed'
                )));
            }

        }
    }
    public function validateField($field){
        $fieldVal = Tools::getValue($field);
        if (!$fieldVal){
          return $this->l('Unexpected error occurred. Please try again or contact module admin.','ph_sendproduct_tofriend');
        }else{
            if (!$fieldVal['val'] && $fieldVal['required'] == 1){
                return $this->l('The field is required.','ph_sendproduct_tofriend');
            }
            if ($fieldVal['type'] == 'email' && !Validate::isEmail($fieldVal['val'])) {
                return $this->l('The e-mail address you entered is invalid.','ph_sendproduct_tofriend');
            }
        }
        return false;
    }
    private function renderProduct($id_product){
        $product = new Product((int)$id_product);
        $img = $product->getCover($product->id);
        $image_type = ImageType::getFormattedName('large');
        $id_lang = $this->context->language->id;
        $iso_code = $this->context->currency->iso_code;
        $product_image_link = $this->context->link->getImageLink(isset($product->link_rewrite) ? $product->link_rewrite[$id_lang] : $product->name, (int)$img['id_image'], $image_type);
        $this->context->smarty->assign(array(
            'product_name'=>$product->name[$id_lang],
            'product_image_link'=>$product_image_link,
            'product_price'=>$this->context->currentLocale->formatPrice($product->price, $iso_code),
            'message' => Tools::getValue('sptf-message')['val'],
        ));
        return $this->module->fetch(_PS_MODULE_DIR_.$this->module->name.'/views/templates/hook/mail_product.tpl');
    }
}