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
function upgrade_module_1_0_7($module)
{
    $sqls = array();
    $sqls[] ='ALTER TABLE `'._DB_PREFIX_.'ets_tc_session` 
    CHANGE `source` `source` VARCHAR(150),
    CHANGE `url_source` `url_source` VARCHAR(200), 
    CHANGE `utm_source` `utm_source` VARCHAR(50), 
    CHANGE `utm_medium` `utm_medium` VARCHAR(50), 
    CHANGE `browser` `browser` VARCHAR(50), 
    CHANGE `first_url` `first_url` VARCHAR(200), 
    CHANGE `exit_url` `exit_url` VARCHAR(200)';
    $sqls[] ='ALTER TABLE `'._DB_PREFIX_.'ets_tc_action` 
    CHANGE `page_url` `page_url` VARCHAR(200), 
    CHANGE `search` `search` VARCHAR(150), 
    CHANGE `is_verified` `is_verified` TINYINT(1), 
    CHANGE `is_registered` `is_registered` INT(11), 
    CHANGE `is_visitors` `is_visitors` TINYINT(1)';
    if(!$module->checkCreatedColumn('ets_tc_session','first_page'))
    {
       $sqls[]= 'ALTER TABLE `'._DB_PREFIX_.'ets_tc_session` ADD `first_page` VARCHAR(200)';

    }
    if(!$module->checkCreatedColumn('ets_tc_session','exit_page'))
    {
       $sqls[]= 'ALTER TABLE `'._DB_PREFIX_.'ets_tc_session` ADD `exit_page` VARCHAR(200)';

    }
    if($sqls)
    {
        foreach($sqls as $sql)
            Db::getInstance()->execute($sql);
    }
    $sessions = Db::getInstance()->executeS('SELECT id_ets_tc_session,id_customer FROM `'._DB_PREFIX_.'ets_tc_session` WHERE id_customer>=1');
    if($sessions)
    {
        foreach($sessions as $session)
            Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ets_tc_action` SET is_registered="'.(int)$session['id_customer'].'" WHERE id_ets_tc_session='.(int)$session['id_ets_tc_session']);
    }
    return true;
}