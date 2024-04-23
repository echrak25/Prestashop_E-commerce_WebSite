<?php
/**
 * 2007-2022 ETS-Soft
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 wesite only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2022 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

if (!defined('_PS_VERSION_'))
    exit;

class Ets_whatsapp_defines
{
    public static $instance;
    public function __construct()
    {
        $this->context = Context::getContext();
        if (is_object($this->context->smarty)) {
            $this->smarty = $this->context->smarty;
        }
    }
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ets_whatsapp_defines();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('ets_whatsapp', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type' => 'switch',
                'name' => 'ETS_WA_ENABLED',
                'label' => $this->l('Enable WhatsApp'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WA_ENABLED_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WA_ENABLED_off',
                        'value' => 0,
                    )
                ),
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_WA_CALL_PREFIX',
                'label' => $this->l('Call prefix'),
                'default' => Configuration::get('PS_COUNTRY_DEFAULT'),
            ),  
            array(
                'type' => 'text',
                'name' => 'ETS_WA_NUMBER_PHONE',
                'label' => $this->l('Mobile phone number'),
                'validate' => 'isPhoneNumber',
                'required' => true,
                'desc' => $this->l('Lorem ipsurm cau truc so dien thaoi mau co + hay ko co'),
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_WA_DISPLAY_TITLE',
                'label' => $this->l('Display title under WhatsApp icon'),
                'validate' => 'isCleanHtml',
                'default' => $this->l('Contact us via WhatsApp'),
                'lang' => true,
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_WA_DISPLAY_POSITION',
                'validate' => 'isCleanHtml',
                'default' => 'right_bottom',
                'label' => $this->l('Display position'),
                'values' => array(
                    array(
                        'id'=> 'ETS_WA_DISPLAY_POSITION_right_center',
                        'label' => $this->l('Right - center'),
                        'value'=>'right_center',
                    ),
                    array(
                        'id'=> 'ETS_WA_DISPLAY_POSITION_right_bottom',
                        'label' => $this->l('Right - bottom'),
                        'value'=>'right_bottom',
                    ),
                    array(
                        'id'=> 'ETS_WA_DISPLAY_POSITION_left_center',
                        'label' => $this->l('Left - center'),
                        'value'=>'left_center',
                    ),
                    array(
                        'id'=> 'ETS_WA_DISPLAY_POSITION_left_bottom',
                        'label' => $this->l('Left - bottom'),
                        'value'=>'left_bottom',
                    ),
                ),
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_WA_ADJUST_RIGHT',
                'validate' => 'isUnsignedInt',
                'label' => $this->l('Adjust position - right padding'),
                'suffix' => 'px',
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_WA_ADJUST_BOTTOM',
                'validate' => 'isUnsignedInt',
                'label' => $this->l('Adjust position - bottom padding'),
                'suffix' => 'px',
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_WA_ADJUST_LEFT',
                'validate' => 'isUnsignedInt',
                'label' => $this->l('Adjust position - left padding'),
                'suffix' => 'px',
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_WA_SEND_CURRENT_URL',
                'label' => $this->l('Send URL of the current page'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_WA_SEND_CURRENT_URL_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_WA_SEND_CURRENT_URL_off',
                        'value' => 0,
                    )
                ),
            ), 
        );
    }
    public static function getCountries()
    {
        $sql = 'SELECT * FROM `'._DB_PREFIX_.'country` c
        LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (c.id_country = cl.id_country AND cl.id_lang="'.(int)Context::getContext()->language->id.'")
        ORDER BY cl.name asc';
        $countries = Db::getInstance()->executeS($sql);
        if($countries)
        {
            foreach($countries as &$country)
            {
                $country['iso_code'] = Tools::strtolower($country['iso_code']);
                
            }
        }
        return $countries;
    }
}