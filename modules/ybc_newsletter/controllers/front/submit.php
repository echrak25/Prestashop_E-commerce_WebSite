<?php
/**
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version  Release: $Revision$
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;
if(!class_exists('Ybc_newsletter'))
    require_once(dirname(__FILE__).'/../../ybc_newsletter.php');
class Ybc_newsletterSubmitModuleFrontController extends ModuleFrontController
{
    private $mailDir;
    private $id_lang_email;
    const YBC_GUEST_NOT_REGISTERED = -1;
	const YBC_CUSTOMER_NOT_REGISTERED = 0;
	const YBC_GUEST_REGISTERED = 1;
	const YBC_CUSTOMER_REGISTERED = 2;
    private $tableName = 'emailsubscription';
    public function init()
	{
	    parent::init();
        if(version_compare(_PS_VERSION_, '1.7', '<'))
            $this->tableName = 'newsletter';        	
        $this->mailDir = dirname(__FILE__).'/../../mails/';
        $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
        $language = new Language((int)$this->context->language->id);
        if(is_dir($this->mailDir.$language->iso_code))
            $this->id_lang_email = (int)$this->context->language->id;
        else
            $this->id_lang_email = $id_lang_default;  
    }
    public function initContent()
    {
        //Handler
        if((int)Tools::getValue('close'))
        {
            if((int)Tools::getValue('donotshowagain') || (int)Configuration::get('YBC_NEWSLETTER_CLOSE_PERMANAL'))
                $this->closePermanal((int)Tools::getValue('donotshowagain') ? true : false);
            die('closed');
        }        
        if($npemail = Tools::getValue('npemail'))
        {           
            
            if(!Validate::isEmail($npemail))
            {
                $this->jsonEncode($this->module->l('Email is invalid','submit'));             
            }
            //Subcription
            $register_status = $this->isNewsletterRegistered($npemail);
    		if ($register_status > 0)
    			$this->jsonEncode($this->module->l('This email address is already registered.','submit'));
    		$email = pSQL($npemail);
    		if (!$this->isRegistered($register_status))
    		{
    			if (Configuration::get('YBC_REQUIRE_VERIFICATION'))
    			{
    				// create an unactive entry in the newsletter database
    				if ($register_status == self::YBC_GUEST_NOT_REGISTERED)
    					$this->registerGuest($email, false);                    
    				if (!$token = $this->getToken($email, $register_status))
    					$this->jsonEncode($this->module->l('Unknown error occurred during the subscription process.','submit'));
                    $this->markSubscribed();
    				$this->sendVerificationEmail($email, $token);                     
    				$this->jsonEncode(Configuration::get('YBC_NEWSLETTER_POPUP_THANK_YOU',$this->context->language->id),'success',$this->module->l('Thanks for subscribing to our newsletter. We have sent a verification email to you, Please check your email inbox and vefiry your subscription','submit')); 
    			}
    			else
    			{    
    			    
    				if ($this->register($email, $register_status) && ($token = $this->getToken($email, $register_status)))
                    { 
        				if (Configuration::get('YBC_CONFIRMATION'))
        					$this->sendConfirmationEmail($email,$token);
                        $this->markSubscribed();
                        $this->jsonEncode(Configuration::get('YBC_NEWSLETTER_POPUP_THANK_YOU',$this->context->language->id),'success',(int)Configuration::get('YBC_NEWSLETTER_DISPLAY_THANK_YOU'));   
                    }    					
    				else
    					$this->jsonEncode($this->module->l('An error occurred during the subscription process.','submit'));  
    				
    			}
    		}
        }
        $this->jsonEncode($this->module->l('Please enter your email','submit'));   
    }
    public function sendConfirmationEmail($email,$token)
	{	   
	   $unsubscribe_url = Context::getContext()->link->getModuleLink(
    			'ybc_newsletter', 'verification', array(
    				'token' => $token,
                    'unsubscribe' => 1,
    			)
    		);
	    $content = Configuration::get('YBC_CONFIRMATION_EMAIL',$this->context->language->id);
        $content = str_replace('[unsubscribe_url]','<a href="'.$unsubscribe_url.'" style="color:#337ff1">'.$unsubscribe_url.'</a>',$content);		
		Mail::Send($this->id_lang_email, 'newsletter_conf', Mail::l('Newsletter confirmation', $this->context->language->id), array('{content}' => $content), pSQL($email), null, null, null, null, null, $this->mailDir, false, $this->context->shop->id);        
	}    
    public function sendVerificationEmail($email, $token)
	{
		$verif_url = Context::getContext()->link->getModuleLink(
    			'ybc_newsletter', 'verification', array(
    				'token' => $token,
                    'verify' => 1,
    			)
    		);
        $content = Configuration::get('YBC_VERIFICATION_EMAIL',$this->context->language->id);
        $content = str_replace('[verification_url]','<a href="'.$verif_url.'" style="color:#337ff1">'.$verif_url.'</a>',$content);      
		
        return Mail::Send($this->id_lang_email, 'newsletter_verif', Mail::l('Email verification', $this->context->language->id), array('{content}' => $content), $email, null, null, null, null, null, $this->mailDir, false, $this->context->shop->id);
	}   
    private function jsonEncode($message, $type = 'error',$display_thank_you = 1)
    {
        $json = array();
        $json['thank_you'] = $display_thank_you;
        if($type == 'error')
            $json['error'] = $message;
        else
            $json['success'] = $message;
        die(json_encode($json));
    }
    private function isRegistered($register_status)
	{
		return in_array(
			$register_status,
			array(self::YBC_GUEST_REGISTERED, self::YBC_CUSTOMER_REGISTERED)
		);
	} 
    protected function register($email, $register_status)
	{
		if ($register_status == self::YBC_GUEST_NOT_REGISTERED)
			return $this->registerGuest($email);

		if ($register_status == self::YBC_CUSTOMER_NOT_REGISTERED)
			return $this->registerUser($email);

		return false;
	}
    private function registerGuest($email, $active = true)
	{
		$sql = 'INSERT INTO '._DB_PREFIX_.$this->tableName.' (id_shop, id_shop_group, email, newsletter_date_add, ip_registration_newsletter, http_referer, active)
				VALUES
				('.(int)$this->context->shop->id.',
				'.(int)$this->context->shop->id_shop_group.',
				\''.pSQL($email).'\',
				NOW(),
				\''.pSQL(Tools::getRemoteAddr()).'\',
				(
					SELECT c.http_referer
					FROM '._DB_PREFIX_.'connections c
					WHERE c.id_guest = '.(int)$this->context->customer->id.'
					ORDER BY c.date_add DESC LIMIT 1
				),
				'.(int)$active.'
				)';

		return Db::getInstance()->execute($sql);
	}
    public function registerUser($email)
	{
		$sql = 'UPDATE '._DB_PREFIX_.'customer
				SET `newsletter` = 1, newsletter_date_add = NOW(), `ip_registration_newsletter` = \''.pSQL(Tools::getRemoteAddr()).'\'
				WHERE `email` = \''.pSQL($email).'\'
				AND id_shop = '.(int)$this->context->shop->id;

		return Db::getInstance()->execute($sql);
	}
    private function getToken($email, $register_status)
	{
		if (in_array($register_status, array(self::YBC_GUEST_NOT_REGISTERED, self::YBC_GUEST_REGISTERED)))
		{
			$sql = 'SELECT MD5(CONCAT( `email` , `newsletter_date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) as token
					FROM `'._DB_PREFIX_.$this->tableName.'`
					WHERE `email` = \''.pSQL($email).'\'';
		}
		else if ($register_status == self::YBC_CUSTOMER_NOT_REGISTERED)
		{
			$sql = 'SELECT MD5(CONCAT( `email` , `date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\' )) as token
					FROM `'._DB_PREFIX_.'customer`
					WHERE `email` = \''.pSQL($email).'\'';
		}               
		return Db::getInstance()->getValue($sql);
	}
    private function isNewsletterRegistered($customer_email)
	{
		$sql = 'SELECT `email`
				FROM '._DB_PREFIX_.$this->tableName.'
				WHERE `email` = \''.pSQL($customer_email).'\'
				AND id_shop = '.(int)$this->context->shop->id;

		if (Db::getInstance()->getRow($sql))
			return self::YBC_GUEST_REGISTERED;

		$sql = 'SELECT `newsletter`
				FROM '._DB_PREFIX_.'customer
				WHERE `email` = \''.pSQL($customer_email).'\'
				AND id_shop = '.(int)$this->context->shop->id;

		if (!$registered = Db::getInstance()->getRow($sql))
			return self::YBC_GUEST_NOT_REGISTERED;

		if ($registered['newsletter'] == '1')
			return self::YBC_CUSTOMER_REGISTERED;

		return self::YBC_CUSTOMER_NOT_REGISTERED;
	}
    public function closePermanal($donotshowagain = false)
    {
        if(($startTime = (time()-60*(float)Configuration::get('YBC_NEWSLETTER_TIME_IN'))) > 0)
        {
            $this->context->cookie->ybc_popup_start = $startTime; 
        }
        if($donotshowagain)
            $this->context->cookie->ybc_notshowagain = 1;
        $this->context->cookie->write();
        return true;
    }
    public function markSubscribed()
    {
        $this->context->cookie->ybc_subscribed = 'subscribed';
        $this->context->cookie->write();
    }
}