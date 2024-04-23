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

class EtsSendProductForm extends ObjectModel {
    public static $instance = null;
    public static $definition = array(
        'table' => 'ph_sendproduct_tofriend',
        'primary' => 'id_sptf',
        'fields' => array(
            'email_to' => array('type' => self::TYPE_STRING, 'validate' => 'isEmail'),
            'receiver' => array('type' => self::TYPE_HTML),
            'email_from' => array('type' => self::TYPE_STRING, 'validate' => 'isEmail'),
            'sender' => array('type' => self::TYPE_HTML),
            'subject' => array('type' => self::TYPE_HTML),
            'body' => array('type' => self::TYPE_HTML),
            'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'id_lang' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
            'status' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'is_logged' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
        )
    );
    public $email_to;
    public $receiver;
    public $email_from;
    public $sender;
    public $subject;
    public $body;
    public $id_product;
    public $id_lang;
    public $id_shop;
    public $is_logged;
    public $status;
    public $date_add;
    public $date_upd;
    public function __construct($id_item = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id_item, $id_lang, $id_shop);
    }
    public static function getInstance()
    {
        if(!isset(self::$instance)){
            self::$instance = new EtsSendProductForm();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('ph_sendproduct_tofriend', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function sendMail(Context $context,$temp_product){
        $product = new Product((int)$this->id_product,false,$context->language->id);
        $defaultSubject = $this->l('Your friend shared a product to you.');
        $template_vars = array(
            '{customer_name}' => $this->sender??'',
            '{receiver}' => $this->receiver??'',
            '{product_link}'=> $context->link->getProductLink($product,$product->link_rewrite,$product->category,$product->ean13,$context->language->id,$context->shop->id,$product->getDefaultIdProductAttribute()),
            '{product}'=> $temp_product,
        );
        if (Mail::send(
            $this->id_lang,
            'send_product',
            $defaultSubject,
            $template_vars,
            $this->email_to,
            $this->receiver,
            $this->email_from,
            $context->shop->name,
            null,
            null,
            dirname(__FILE__).'/../../mails/',
            null,
            $this->id_shop
        )){
            return true;
        }
        return false;
    }
}