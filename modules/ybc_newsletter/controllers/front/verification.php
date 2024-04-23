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
class Ybc_newsletterVerificationModuleFrontController extends ModuleFrontController
{
	private $message = '';
    private $mailDir;
    private $id_lang_email;
    private $submit;
    private $tableName = 'emailsubscription';

    public function init()
    {
        if(version_compare(_PS_VERSION_, '1.7', '<'))
            $this->tableName = 'newsletter';
        parent::init();
    }
	public function postProcess()
	{	           
        if(Tools::isSubmit('verify')) 
		  $this->message = $this->confirmEmail(Tools::getValue('token'));
        else
          $this->message = $this->unsubscrible(Tools::getValue('token'));
	}
	/**
	 * @see FrontController::initContent()
	 */
	public function initContent()
	{	    
		parent::initContent();        
		$this->context->smarty->assign(
            array(
                'message' => $this->message,
                'path' => '<span class="ybc-testimonial-breadcrumb-span">'.(Tools::isSubmit('verify') ? $this->module->l('Verify subcription') : $this->module->l('Unsubscribe')).'</span>'        
            )
        ); 
        if(version_compare(_PS_VERSION_, '1.7', '<'))
            $this->setTemplate('verification_execution.tpl');
        else
            $this->setTemplate('module:ybc_newsletter/views/templates/front/verification_execution_17.tpl');       
		
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
    public function confirmEmail($token)
	{	    
		$activated = false;
		if ($email = $this->getGuestEmailByToken($token))
			$activated = $this->activateGuest($email);
		else if ($email = $this->getUserEmailByToken($token))
			$activated = $this->registerUser($email);

		if (!$activated)
			return $this->module->l('This email is already registered and/or invalid.');
        if (Configuration::get('YBC_CONFIRMATION'))
		  $this->sendConfirmationEmail($email,$token);
		return $this->module->l('Thank you! You have successfully verified your email address.');
	}
    public function unsubscrible($token)
	{	    
		if ($email = $this->getGuestEmailByToken($token,true))
			$this->unsubscribeGuest($email);
		else if ($email = $this->getUserEmailByToken($token,true))
			$this->unsubscribeUser($email);
		return $email ? $this->module->l('You have successfully unsubscribed from our newsletter.') : $this->module->l('Invalid token');		
	}
    private function getGuestEmailByToken($token, $unsubscribe = false)
	{
		$sql = 'SELECT `email`
				FROM `'._DB_PREFIX_.$this->tableName.'`
				WHERE MD5(CONCAT( `email` , `newsletter_date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) = \''.pSQL($token).'\'
				AND `active` = '.($unsubscribe ? '1' : '0');

		return Db::getInstance()->getValue($sql);
	}
    private function activateGuest($email)
	{
		return Db::getInstance()->execute(
			'UPDATE `'._DB_PREFIX_.$this->tableName.'`
						SET `active` = 1
						WHERE `email` = \''.pSQL($email).'\''
		);
	}
    private function unsubscribeGuest($email)
	{
		return Db::getInstance()->execute(
			'DELETE FROM `'._DB_PREFIX_.$this->tableName.'`
             WHERE `email` = \''.pSQL($email).'\''
		);
	}
    private function getUserEmailByToken($token, $unsubscribe = false)
	{
		$sql = 'SELECT `email`
				FROM `'._DB_PREFIX_.'customer`
				WHERE MD5(CONCAT( `email` , `date_add`, \''.pSQL(Configuration::get('NW_SALT')).'\')) = \''.pSQL($token).'\'
				AND `newsletter` = '.($unsubscribe ? '1' : '0');

		return Db::getInstance()->getValue($sql);
	}
    public function registerUser($email)
	{
		$sql = 'UPDATE '._DB_PREFIX_.'customer
				SET `newsletter` = 1, newsletter_date_add = NOW(), `ip_registration_newsletter` = \''.pSQL(Tools::getRemoteAddr()).'\'
				WHERE `email` = \''.pSQL($email).'\'
				AND id_shop = '.(int)$this->context->shop->id;

		return Db::getInstance()->execute($sql);
	}
    public function unsubscribeUser($email)
	{
		$sql = 'UPDATE '._DB_PREFIX_.'customer
				SET `newsletter` = 0
				WHERE `email` = \''.pSQL($email).'\'
				AND id_shop = '.(int)$this->context->shop->id;
		return Db::getInstance()->execute($sql);
	}    
}
