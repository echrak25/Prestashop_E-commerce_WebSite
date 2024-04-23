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
class Ets_mailchimpsyncApilistenModuleFrontController extends ModuleFrontController
{
    public $template = null;
    public function initContent(){
        parent::initContent();
        $this->setTemplate(($this->module->is17?'module:'.$this->module->name.'/views/templates/front/' :'').'api-call'.($this->module->is17?'':'16').'.tpl');
        return '';     
    }
	public function init(){
	   parent::init();
        $this->wh_log(print_r($_REQUEST,true));
        if ( !Tools::getIsset('key') ){
            $this->wh_log('No security key specified, ignoring request');
            return null;
        } elseif (Tools::getValue('key') != Configuration ::get('YBC_API_KEY') ) {
            $this->wh_log('Security key specified, but not correct:');
            $this->wh_log("\t".'Wanted: "'.Tools::getValue('key').'", but received "'.Tools::getValue('key').'"');
            return null;
        } else {
            $this->wh_log(print_r($_REQUEST,true)); 
            if ( Tools::getIsset('type')){
                switch(Tools::getValue('type')){
                    case 'subscribe'  :
                        $this->prosessRequestApi(Tools::getValue('data'),'subscribed');
                        break;
                    case 'unsubscribe': 
                        if ( Tools::getValue('data')['action'] == 'delete' ){
                            $this->prosessRequestApi(Tools::getValue('data'),'delete'); 
                        }else{
                            $this->prosessRequestApi(Tools::getValue('data'),'unsubscribed'); 
                        }
                        break;
                    case 'cleaned'    : 
                        $this->cleaned(Tools::getValue('data'));
                        break;
                    case 'upemail'    : 
                        $this->upemail(Tools::getValue('data'));     
                        break;
                    case 'profile'    : 
                        $this->profile(Tools::getValue('data'));     
                        break;
                    default:
                        $this->wh_log('Request type "'.Tools::getValue('data').'" unknown, ignoring.');
                }
            }
        }
        
        return null;
	}
    
    public function wh_log($msg){
        $logfile = dirname(__FILE__).'/'.Configuration ::get('YBC_API_KEY').'webhook.log';
        @file_put_contents($logfile,date("Y-m-d H:i:s")." | ".$msg."\n",FILE_APPEND);
    }
    public function subscribe($data){
        if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'customer` SET `newsletter` = 1 WHERE email=\''.$data['email'].'\' ')){
            $this->wh_log($data['email'] . ' just subscribed!');
        }
        if ( version_compare(_PS_VERSION_, '1.7.0', '>=') && Module ::isInstalled('ps_emailsubscription') ){
            if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'emailsubscription` SET `active` = 1 WHERE email=\''.$data['email'].'\' ')){
                $this->wh_log($data['email'] . ' just subscribed!');
            }
        }else{
            if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'newsletter` SET `active` = 1 WHERE email=\''.$data['email'].'\' ')){
                $this->wh_log($data['email'] . ' just subscribed!');
            }
        }
    }
    
    public function unsubscribe($data){
        if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'customer` SET `newsletter` = 0 WHERE email=\''.$data['email'].'\' ')){
            $this->wh_log($data['email'] . ' just unsubscribed!');
        }
        if ( version_compare(_PS_VERSION_, '1.7.0', '>=') && Module ::isInstalled('ps_emailsubscription') ){
            if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'emailsubscription` SET `active` = 0 WHERE email=\''.$data['email'].'\' ')){
                $this->wh_log($data['email'] . ' just unsubscribed!');
            }
        }else{
            if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'newsletter` SET `active` = 0 WHERE email=\''.$data['email'].'\' ')){
                $this->wh_log($data['email'] . ' just unsubscribed!');
            }
        }
    }
    
    public function cleaned($data){
        $this->wh_log($data['email'] . ' was cleaned from your list!');
    }
    public function upemail($data){
        $this->wh_log($data['old_email'] . ' changed their email address to '. $data['new_email']. '!');
    }
    public function profile($data){
        $this->wh_log($data['email'] . ' updated their profile!');
    }
    
    public function prosessRequestApi($data,$action){
        if ( ! $action ){
            return;
        }
        if ( $action == 'subscribed' || $action == 'unsubscribed' ){
            $value_update = $action == 'subscribed' ? 1 : 0;
            if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'customer` SET `newsletter` = '.(int)$value_update.' WHERE email=\''.$data['email'].'\' ')){
                $this->wh_log($data['email'] . ' just subscribed!');
            }
            if ( version_compare(_PS_VERSION_, '1.7.0', '>=') && Module ::isInstalled('ps_emailsubscription') ){
                if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'emailsubscription` SET `active` = '.(int)$value_update.' WHERE email=\''.$data['email'].'\' ')){
                    $this->wh_log($data['email'] . ' just subscribed!');
                }
            }else{
                if (DB::getInstance()->execute('UPDATE `'._DB_PREFIX_.'newsletter` SET `active` = '.(int)$value_update.' WHERE email=\''.$data['email'].'\' ')){
                    $this->wh_log($data['email'] . ' just subscribed!');
                }
            }
        }else{
            if ( DB::getInstance()->execute('DELETE `'._DB_PREFIX_.'customer` WHERE email=\''.$data['email'].'\' ') ){
                $this->wh_log($data['email'] . ' just delete!');
            }
            if ( version_compare(_PS_VERSION_, '1.7.0', '>=') && Module ::isInstalled('ps_emailsubscription') ){
                if (DB::getInstance()->execute('DELETE `'._DB_PREFIX_.'emailsubscription` WHERE email=\''.$data['email'].'\' ')){
                    $this->wh_log($data['email'] . ' just delete!');
                }
            }else{
                if (DB::getInstance()->execute('DELETE `'._DB_PREFIX_.'newsletter` WHERE email=\''.$data['email'].'\' ')){
                    $this->wh_log($data['email'] . ' just delete!');
                }
            }
            
        }
 
    }

}
