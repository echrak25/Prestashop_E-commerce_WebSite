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

class Ets_bs_defines
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
            self::$instance = new Ets_bs_defines();
        }
        return self::$instance;
    }
    public function l($string)
    {
        return Translate::getModuleTranslation('ets_bestselling', $string, pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'name' => 'ETS_BS_TILE_HOME_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position home_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Best selling product'),
                'default_lang' => 'Best selling product',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_BS_NUMBER_PRODUCT_IN_HOME',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position home_block',
                'validate' => 'isUnsignedId',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all best-selling products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_BS_DISPLAY_TYPE_IN_HOME',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position home_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_HOME_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_HOME_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_BS_AUTO_PLAY_HOME',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_BS_AUTO_PLAY_HOME_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_BS_AUTO_PLAY_HOME_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position home_block',
            ),
            array(
                'name' => 'ETS_BS_TILE_LEFT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position left_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Best selling product'),
                'default_lang' => 'Best selling product',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_BS_NUMBER_PRODUCT_IN_LEFT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position left_block',
                'validate' => 'isUnsignedId',
                'default' =>8,
                'desc' => $this->l('Leave blank to show all best-selling products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_BS_DISPLAY_TYPE_IN_LEFT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position left_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_LEFT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_LEFT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
                
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_BS_AUTO_PLAY_LEFT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_BS_AUTO_PLAY_LEFT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_BS_AUTO_PLAY_LEFT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position left_block',
            ),
            array(
                'name' => 'ETS_BS_TILE_RIGHT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position right_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Best selling product'),
                'default_lang' => 'Best selling product',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_BS_NUMBER_PRODUCT_IN_RIGHT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position right_block',
                'validate' => 'isUnsignedId',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all best-selling products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_BS_DISPLAY_TYPE_IN_RIGHT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position right_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_RIGHT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_RIGHT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_BS_AUTO_PLAY_RIGHT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_BS_AUTO_PLAY_RIGHT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_BS_AUTO_PLAY_RIGHT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position right_block',
            ),
            array(
                'name' => 'ETS_BS_TILE_PRODUCT_BLOCK',
                'label' => $this->l('Title'),
                'lang'=>true,
                'type'=>'text',
                'form_group_class'=> 'position product_block',
                'validate'=>'isCleanHtml',
                'default' => $this->l('Best selling product'),
                'default_lang' => 'Best selling product',
                'showRequired' => true,
            ),
            array(
                'type'=> 'text',
                'name' => 'ETS_BS_NUMBER_PRODUCT_IN_PRODUCT',
                'label' => $this->l('Number of products to display'),
                'form_group_class'=> 'position product_block',
                'validate' => 'isUnsignedId',
                'default' => 8,
                'desc' => $this->l('Leave blank to show all best-selling products'),
            ),
            array(
                'type' => 'radio',
                'name' => 'ETS_BS_DISPLAY_TYPE_IN_PRODUCT',
                'label' => $this->l('Display type'),
                'form_group_class'=> 'position product_block',
                'validate' => 'isCleanHtml',
                'default' => 'slide',
                'values' => array(
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_PRODUCT_gird',
                        'label' => $this->l('Grid'),
                        'value'=>'gird',
                    ),
                    array(
                        'id'=> 'ETS_BS_DISPLAY_TYPE_IN_PRODUCT_slide',
                        'label' => $this->l('Slider'),
                        'value'=>'slide',
                    ),
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_BS_AUTO_PLAY_PRODUCT',
                'label' => $this->l('Auto-play slider'),
                'default' => 1,
                'validate' => 'isInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'ETS_BS_AUTO_PLAY_PRODUCT_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'ETS_BS_AUTO_PLAY_PRODUCT_off',
                        'value' => 0,
                    )
                ),
                'form_group_class'=> 'position product_block',
            ),
        );
    }
}