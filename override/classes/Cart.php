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
if (!defined('_PS_VERSION_')) { exit; }
 
class Cart extends CartCore
{
    /*
    * module: ets_trackingcustomer
    * date: 2024-03-30 13:07:29
    * version: 1.3.0
    */
    public function addCartRule($id_cart_rule, bool $useOrderPrices = false)
    {
        if(parent::addCartRule($id_cart_rule,$useOrderPrices))
        {
            Hook::exec('actionAddCustomerActiton',array('action'=>'add_discount','id_product'=>$id_cart_rule));
            return true;
        }
    }
}