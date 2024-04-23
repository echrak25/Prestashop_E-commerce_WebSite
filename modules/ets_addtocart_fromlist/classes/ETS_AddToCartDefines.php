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

if (!defined('_PS_VERSION_'))
    exit;

class ETS_AddToCartDefines {

    static $instance;
    static $configs;
    static $icons;
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ETS_AddToCartDefines();
        }
        return self::$instance;
    }
    public function l($string, $source = null)
    {
        return Translate::getModuleTranslation('ets_addtocart_fromlist', $string, $source == null ? pathinfo(__FILE__, PATHINFO_FILENAME) : $source);
    }
    public function getConfigs()
    {
        if (!self::$configs) {
            self::$configs = array(
                       'ETS_ADDTOCART_FROMLIST_LIVE_MODE' => array(
                            'type' => 'switch',
                            'label' => $this->l('Enable "Add to cart" button'),
                            'name' => 'ETS_ADDTOCART_FROMLIST_LIVE_MODE',
                            'is_bool' => true,
                            'values' => array(
                                array(
                                    'id' => 'active_on',
                                    'value' => true,
                                    'label' => $this->l('Enabled')
                                ),
                                array(
                                    'id' => 'active_off',
                                    'value' => false,
                                    'label' => $this->l('Disabled')
                                )
                            ),
                           'default' => 1,
                        ),
                'ETS_ATC_DISPLAY_TYPE' => array(
                    'type'      => 'radio',
                    'label'     => $this->l('Display type'),
                    'desc'      => $this->l("Choose the button display type"),
                    'name'      => 'ETS_ATC_DISPLAY_TYPE',
                    'required'  => true,
                    'class'     => 't',
                    'is_bool'   => true,
                    'default' => 1,
                    'values'    => array(
                        array(
                            'id'    => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Icon only')
                        ),
                        array(
                            'id'    => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Button')
                        )
                    ),
                ),

                'ETS_ATC_BUTTON_ICON' => array(
                    'type'      => 'custom_select',
                    'label'     => $this->l('Button label'),
                    'name'      => 'ETS_ATC_BUTTON_ICON',
                    'required'  => true,
                    'class' => 'atc-button',
                    'is_bool'   => true,
                    'default' => 1,
                    'values'    => array(
                        array(
                            'id'    => 'active_1',
                            'value' => 1,
                            'label' => $this->l('None'),
                            'data_icon'=>'none'
                        ),
                        array(
                            'id'    => 'active_2',
                            'value' => 2,
                            'label' => $this->l('Default icon'),
                            'data_icon'=>'fa-cart-plus'
                        ),
                        array(
                            'id'    => 'active_3',
                            'value' => 3,
                            'label' => $this->l('Sample 1'),
                            'data_icon'=>'fa-opencart'
                        ),
                        array(
                            'id'    => 'active_4',
                            'value' => 4,
                            'label' => $this->l('Sample 2'),
                            'data_icon'=>'fa-shopping-bag'
                        )

                    ),
                ),
                'ETS_ATC_BUTTON_LABEL' => array(
                    'label' => $this->l('Button label'),
                    'name'  => 'ETS_ATC_BUTTON_LABEL',
                    'class' => 'atc-button',
                    'type' => 'text',
                    'lang' => true,
                    'col'=>'3',
                    'default' => $this->l('Add to cart'),
                    'required'=> true,
                    'desc' => 'Input value is over 20 characters.'
                ),
                'ETS_ATC_BUTTON_POSITION' => array(
                    'type' => 'select',
                    'label' => $this->l('Button position'),
                    'name' => 'ETS_ATC_BUTTON_POSITION',
                    'class' => 'atc-button',
                    'options' => array(
                        'query' => array(
                            array(
                                'option_value' => 'button-left',
                                'option_title' => $this->l('Left')
                            ),                           array(
                                'option_value' => 'button-center',
                                'option_title' => $this->l('Center')
                            ),
                            array(
                                'option_value' => 'button-right',
                                'option_title' => $this->l('Right')
                            )
                        ),
                        'id' => 'option_value',
                        'name' => 'option_title'
                    ),
                    'default' => 'button-center',
                ),
                'ETS_ATC_ICON_STYLE_ICON' => array(
                    'type' => 'select',
                    'label' => $this->l('Icon style'),
                    'name' => 'ETS_ATC_ICON_STYLE_ICON',
                    'class' => 'atc-icon',
                    'options' => array(
                        'query' => array(
                            array(
                                'option_value' => 'fa-cart-plus',
                                'option_title' => $this->l('Sample 1')
                            ),
                            array(
                                'option_value' => 'fa-cart-arrow-down',
                                'option_title' => $this->l('Sample 2')
                            ),
                            array(
                                'option_value' => 'fa-shopping-cart',
                                'option_title' => $this->l('Sample 3')
                            ),
                            array(
                                'option_value' => 'fa-opencart',
                                'option_title' => $this->l('Sample 4')
                            ),
                            array(
                                'option_value' => 'fa-shopping-bag',
                                'option_title' => $this->l('Sample 5')
                            ),
                        ),
                        'id' => 'option_value',
                        'name' => 'option_title'
                    ),
                    'default' => 'fa-cart-plus',
                ),

                'ETS_ATC_ICON_POSITION' => array(
                    'type' => 'select',
                    'label' => $this->l('Icon position'),
                    'name' => 'ETS_ATC_ICON_POSITION',
                    'class' => 'atc-icon',
                    'options' => array(
                        'query' => array(
                            array(
                                'option_value' => 'icon-left',
                                'option_title' => $this->l('Left')
                            ),
                            array(
                                'option_value' => 'icon-right',
                                'option_title' => $this->l('Right')
                            )
                        ),
                        'id' => 'option_value',
                        'name' => 'option_title'
                    ),
                    'default' => 'icon-right',
                ),
                'ETS_ATC_ICON_BACKGROUND_BORDER' => array(
                    'type' => 'select',
                    'label' => $this->l('Background border'),
                    'name' => 'ETS_ATC_ICON_BACKGROUND_BORDER',
                    'class' => 'atc-icon',
                    'options' => array(
                        'query' => array(
                            array(
                                'option_value' => 'icon-square',
                                'option_title' => $this->l('Square')
                            ),
                            array(
                                'option_value' => 'icon-circle',
                                'option_title' => $this->l('Circle')
                            ),
                            array(
                                'option_value' => 'icon-rounded',
                                'option_title' => $this->l('Rounded')
                            )
                        ),
                        'id' => 'option_value',
                        'name' => 'option_title'
                    ),
                    'default' => 'icon-circle',
                ),


                'ETS_ATC_ADJUST_POSITION' => array(
                    'type' => 'custom',
                    'label' => $this->l('Adjust position'),
                    'name' => 'ETS_ATC_ADJUST_POSITION',
                    'required' => true,
                    'class' => 'atc-button',
                    'default' => 30,
                    'options' => array(
                        'ETS_ATC_ADJUST_TOP' => array(
                            'label' => $this->l('Top'),
                            'name' => 'ETS_ATC_ADJUST_TOP',
                            'default' => 5,
                            'class' => 'atc-button',
                            'prefix'=> 'px'
                        ),
                        'ETS_ATC_ADJUST_BOTTOM' => array(
                            'label' => $this->l('Bottom'),
                            'name' => 'ETS_ATC_ADJUST_BOTTOM',
                            'default' => 5,
                            'class' => 'atc-button',
                            'prefix'=> 'px'
                        ),
                        'ETS_ATC_ADJUST_RIGHT' => array(
                            'label' => $this->l('Right'),
                            'name' => 'ETS_ATC_ADJUST_RIGHT',
                            'default' => 5,
                            'class' => 'atc-button',
                            'prefix'=> 'px'
                        ),
                        'ETS_ATC_ADJUST_LEFT' => array(
                            'type' => 'adjust',
                            'label' => $this->l('Left'),
                            'name' => 'ETS_ATC_ADJUST_LEFT',
                            'default' => 5,
                            'class' => 'atc-button',
                            'prefix'=> 'px'
                        ),
                    )
                ),
                'ETS_ATC_ADJUST_POSITION_ICON' => array(
                    'type' => 'custom',
                    'label' => $this->l('Adjust position'),
                    'name' => 'ETS_ATC_ADJUST_POSITION_ICON',
                    'required' => true,
                    'class' => 'atc-icon',
                    'default' => 30,
                    'options' => array(
                        'ETS_ATC_ADJUST_ICON_TOP' => array(
                            'label' => $this->l('Top'),
                            'name' => 'ETS_ATC_ADJUST_ICON_TOP',
                            'default' => 60,
                            'class' => 'atc-icon',
                            'prefix'=> 'px'
                        ),
                        'ETS_ATC_ADJUST_ICON_RIGHT' => array(
                            'label' => $this->l('Right'),
                            'name' => 'ETS_ATC_ADJUST_ICON_RIGHT',
                            'default' => 10,
                            'class' => 'atc-icon',
                            'prefix'=> 'px'
                        ),
                        'ETS_ATC_ADJUST_ICON_LEFT' => array(
                            'type' => 'adjust',
                            'label' => $this->l('Left'),
                            'name' => 'ETS_ATC_ADJUST_ICON_LEFT',
                            'default' => 10,
                            'class' => 'atc-icon',
                            'prefix'=> 'px'
                        ),
                    )
                ),
                'ETS_ATC_ICON_BACKGROUND_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Icon background color'),
                    'class' => 'atc-icon',
                    'name' => 'ETS_ATC_ICON_BACKGROUND_COLOR',
                    'default' => '#ffffff',
                    'group_type' => 'icon_style'
                ),
                'ETS_ATC_ICON_BACKGROUND_COLOR_HOVER' => array(
                    'type' => 'color',
                    'label' => $this->l('Icon background color when hover'),
                    'class' => 'atc-icon',
                    'name' => 'ETS_ATC_ICON_BACKGROUND_COLOR_HOVER',
                    'default' => '#f9f9f9',
                    'group_type' => 'icon_style'
                ),
                'ETS_ATC_ICON_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Icon color'),
                    'class' => 'atc-icon',
                    'name' => 'ETS_ATC_ICON_COLOR',
                    'default' => '#7a7a7a',
                    'group_type' => 'icon_style'
                ),
                'ETS_ATC_ICON_SIZE' => array(
                    'type' => 'text',
                    'label' => $this->l('Icon size'),
                    'name' => 'ETS_ATC_ICON_SIZE',
                    'class' => 'atc-icon',
                    'col' => 2,
                    'suffix' => 'px',
                    'required' => true,
                    'desc' => $this->l('Define the icon size (px)'),
                    'default' => 30,
                ),

                'ETS_ATC_BUTTON_BACKGROUND_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Button background color'),
                    'class' => 'atc-button',
                    'name' => 'ETS_ATC_BUTTON_BACKGROUND_COLOR',
                    'default' => '#2fb5d2',
                    'group_type' => 'style'
                ),
                'ETS_ATC_BUTTON_BORDER_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Button border color'),
                    'name' => 'ETS_ATC_BUTTON_BORDER_COLOR',
                    'class' => 'atc-button',
                    'default' => '#2fb5d2',
                    'group_type' => 'style'
                ),

                'ETS_ATC_BUTTON_TEXT_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Button text color'),
                    'name' => 'ETS_ATC_BUTTON_TEXT_COLOR',
                    'class' => 'atc-button',
                    'default' => '#ffffff',
                    'group_type' => 'style'
                ),
                'ETS_ATC_BUTTON_BACKGROUND_HOVER_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Button background color when hover'),
                    'name' => 'ETS_ATC_BUTTON_BACKGROUND_HOVER_COLOR',
                    'class' => 'atc-button',
                    'default' => '#1d93ab',
                    'group_type' => 'style'
                ),
                'ETS_ATC_BUTTON_BORDER_HOVER_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Button border color when hover'),
                    'name' => 'ETS_ATC_BUTTON_BORDER_HOVER_COLOR',
                    'class' => 'atc-button',
                    'default' => '#1d93ab',
                    'group_type' => 'style'
                ),
                'ETS_ATC_BUTTON_TEXT_HOVER_COLOR' => array(
                    'type' => 'color',
                    'label' => $this->l('Button text color when hover'),
                    'name' => 'ETS_ATC_BUTTON_TEXT_HOVER_COLOR',
                    'class' => 'atc-button',
                    'default' => '#ffffff',
                    'group_type' => 'style'
                ),
                'ETS_ATC_BUTTON_BORDER_RADIUS' => array(
                    'type' => 'text',
                    'label' => $this->l('Button border radius'),
                    'name' => 'ETS_ATC_BUTTON_BORDER_RADIUS',
                    'class' => 'atc-button',
                    'col' => 2,
                    'suffix' => 'px',
                    'required' => false,
                    'desc' => $this->l('Define the button border radius (px)'),
                    'default' => 3,
                    'group_type' => 'style'
                ),
                'ETS_ATC_RESET_CONFIG' => array(
                    'type' => 'reset',
                    'name' => 'ETS_ATC_RESET_CONFIG',
                    'label' => $this->l('Reset to default'),
                    'default' => 1,
                ),
            );

        }
        return self::$configs;
    }
    public function _installSQL() {
        $sql = array();

        $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'ets_addtocart_fromlist` (
            `id_ets_addtocart_fromlist` int(11) NOT NULL AUTO_INCREMENT,
            PRIMARY KEY  (`id_ets_addtocart_fromlist`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
        foreach ($sql as $query) {
            if (Db::getInstance()->execute($query) == false) {
                return false;
            }
        }
        return true;
    }

    public function _uninstallSQL()
    {
        $sql = array();

        foreach ($sql as $query) {
            if (Db::getInstance()->execute($query) == false) {
                return false;
            }
        }
        return true;
    }

    public function getIcons()
    {
        if (!self::$icons) {
            self::$icons = array(
                'fa-cart-plus' =>'<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-cart-plus fa-w-18 fa-2x"><path fill="currentColor" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z" class=""></path></svg>',
                'fa-cart-arrow-down' => '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cart-arrow-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-cart-arrow-down fa-w-18 fa-2x"><path fill="currentColor" d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM403.029 192H360v-60c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v60h-43.029c-10.691 0-16.045 12.926-8.485 20.485l67.029 67.029c4.686 4.686 12.284 4.686 16.971 0l67.029-67.029c7.559-7.559 2.205-20.485-8.486-20.485z" class=""></path></svg>',
                'fa-shopping-cart'=>'<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-shopping-cart fa-w-18 fa-2x"><path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z" class=""></path></svg>',
                'fa-opencart'=>'<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="opencart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-opencart fa-w-20 fa-2x"><path fill="currentColor" d="M423.3 440.7c0 25.3-20.3 45.6-45.6 45.6s-45.8-20.3-45.8-45.6 20.6-45.8 45.8-45.8c25.4 0 45.6 20.5 45.6 45.8zm-253.9-45.8c-25.3 0-45.6 20.6-45.6 45.8s20.3 45.6 45.6 45.6 45.8-20.3 45.8-45.6-20.5-45.8-45.8-45.8zm291.7-270C158.9 124.9 81.9 112.1 0 25.7c34.4 51.7 53.3 148.9 373.1 144.2 333.3-5 130 86.1 70.8 188.9 186.7-166.7 319.4-233.9 17.2-233.9z" class=""></path></svg>',
                'fa-shopping-bag'=>'<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-bag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-shopping-bag fa-w-14 fa-2x"><path fill="currentColor" d="M352 160v-32C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128v32H0v272c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V160h-96zm-192-32c0-35.29 28.71-64 64-64s64 28.71 64 64v32H160v-32zm160 120c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm-192 0c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24z" class=""></path></svg>',
            );
        }
        return self::$icons;
    }
}