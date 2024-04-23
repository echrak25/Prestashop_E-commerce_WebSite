<?php
/**
 * 2007-2023 ETS-Soft
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
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author ETS-Soft <etssoft.jsc@gmail.com>
 * @copyright  2007-2023 ETS-Soft
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of ETS-Soft
 */

if (!defined('_PS_VERSION_'))
    exit;

class Ets_countdown_defines
{
    public static $instance;
    public $context;
    public $smarty;

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
            self::$instance = new Ets_countdown_defines();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('ets_countdown', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type' => 'switch',
                'name' => 'ETS_CD_ENABLE_COUNT_DOWN',
                'label' => $this->l('Enable'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_CD_ENABLE_COUNT_DOWN_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_CD_ENABLE_COUNT_DOWN_off',
                        'value' => 0,
                    )
                ),
            ),
            array(
                'type' => 'text',
                'label' => $this->l('Title'),
                'name' => 'ETS_CD_TITLE_COUNT_DOWN',
                'default' => $this->l('Offer ends in'),
                'default_lang' => 'Offer ends in',
                'lang' => true,
            ),
            array(
                'type'=> 'radio',
                'label' => $this->l('Display type'),
                'name' => 'ETS_CD_DISPLAY_TYPE',
                'default' => 'normal',
                'values' => array(
                    array(
                        'id'=> 'ETS_CD_DISPLAY_TYPE_normal',
                        'value' => 'normal',
                        'label' => $this->l('Normal'),
                    ),
                    array(
                        'id' => 'ETS_CD_DISPLAY_TYPE_flip',
                        'value' => 'flip',
                        'label' => $this->l('Flip'),
                    ),
                ),
            ),
            array(
                'type'=> 'color',
                'name' => 'ETS_CD_NUMBER_COLOR',
                'label' => $this->l('Number color'),
                'validate' => 'isColor',
            ),
            array(
                'type' =>'color',
                'name' => 'ETS_CD_BORDER_COLOR',
                'label' => $this->l('Border color'),
                'validate' => 'isColor',
            ),
            array(
                'type' => 'color',
                'name' => 'ETS_CD_BACKGROUND_COLOR',
                'label' => $this->l('Background color'),
                'validate' => 'isColor',
            ),
            array(
                'type' => 'color',
                'name' => 'ETS_CD_TIME_UNIT_COLOR',
                'label' => $this->l('Time unit color'),
                'validate' => 'isColor',
            ),
        );
    }
}