<?php
/**
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
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
 *  @author    Spimob.io SA <contact@spimob.io>
 *  @copyright 2021 Spimob sarl
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_'))
	exit;

class spimobchatbot extends Module
{
	protected $js_state = 0;
	protected $eligible = 0;
	protected $filterable = 1;
	protected static $products = array();
	protected $_debug = 0;

	public function __construct()
	{
		$this->name = 'spimobchatbot';
		//$this->tab = 'spimob_chatbot';
		$this->tab = 'advertising_marketing';


		$this->version = '1.2.1';
		$this->author = 'Spimob.io';
		//$this->module_key = 'fd2aaefea84ac1bb512e6f1878d990b8';
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('ChatBot.tn Plugin');
		$this->description = $this->l('ChatBot.tn is the easiest way to design, build and publish your chatbot for your website and your Facebook Messenger in minutes and use the live chat.');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall ChatBot.tn Plugin? You will lose all the data related to this module.');
		/* Backward compatibility */
		if (version_compare(_PS_VERSION_, '1.5', '<'))
			require(_PS_MODULE_DIR_.$this->name.'/backward_compatibility/backward.php');

		$this->checkForUpdates();
	}

	public function install()
	{
	
		Configuration::updateValue('SPIMOB_CHATBOT', $this->version);
		Configuration::updateValue('SPIMOB_USERID_ENABLED', false);

		if (!parent::install() 
			|| !$this->installTab()
			|| !$this->registerHook('footer') 
			|| !$this->registerHook('backOfficeHeader'))
			return false;


		return true;
	}

	public function uninstall()
	{
		if (!$this->uninstallTab() || !parent::uninstall())
			return false;
		
	}

	public function installTab()
	{
		if (version_compare(_PS_VERSION_, '1.5', '<'))
			return true;

		$tab = new Tab();
		$tab->active = 0;
		$tab->class_name = 'AdminSpimobChatBotAjax';
		$tab->name = array();
		foreach (Language::getLanguages(true) as $lang)
			$tab->name[$lang['id_lang']] = 'ChatBot.tn Plugin';
		$tab->id_parent = -1; //(int)Tab::getIdFromClassName('AdminAdmin');
		$tab->module = $this->name;
		return $tab->add();
	}

	public function uninstallTab()
	{
		if (version_compare(_PS_VERSION_, '1.5', '<'))
			return true;

		$id_tab = (int)Tab::getIdFromClassName('AdminSpimobChatBotAjax');
		if ($id_tab)
		{
			$tab = new Tab($id_tab);
			return $tab->delete();
		}

		return true;
	}

	public function displayForm()
	{
		// Get default language
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$helper = new HelperForm();

		// Module, token and currentIndex
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

		// Language
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;

		// Title and toolbar
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;		// false -> remove toolbar
		$helper->toolbar_scroll = true;	  // yes - > Toolbar is always visible on the top of the screen.
		$helper->submit_action = 'submit'.$this->name;
		$helper->toolbar_btn = array(
			'save' =>
			array(
				'desc' => $this->l('Save'),
				'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
				'&token='.Tools::getAdminTokenLite('AdminModules'),
			),
			'back' => array(
				'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
				'desc' => $this->l('Back to list')
			)
		);

		$fields_form = array();
		// Init Fields form array
		$fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Settings'),
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->l('API Key'),
					'name' => 'SPIMOB_ACCOUNT_ID',
					'size' => 20,
					'required' => true,
					'hint' => $this->l('This information is available in your ChatBot.tn account.')
				),
				array(
					'type' => 'radio',
					'label' => $this->l('Enable ChatBox'),
					'name' => 'SPIMOB_USERID_ENABLED',
					'hint' => $this->l('Enable or disable the chatbox in your website.'),
					'values'    => array(
						array(
							'id' => 'spimob_userid_enabled',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'spimob_userid_disabled',
							'value' => 0,
							'label' => $this->l('Disabled')
						),
					),
				),
			),
			'submit' => array(
				'title' => $this->l('Save'),
			)
		);

		// Load current value
		$helper->fields_value['SPIMOB_ACCOUNT_ID'] = Configuration::get('SPIMOB_ACCOUNT_ID');
		$helper->fields_value['SPIMOB_USERID_ENABLED'] = Configuration::get('SPIMOB_USERID_ENABLED');

		return $helper->generateForm($fields_form);
	}

	/**
	 * back office module configuration page content
	 */
	public function getContent()
	{
		$output = '';
		if (Tools::isSubmit('submit'.$this->name))
		{
			$spimob_account_id = Tools::getValue('SPIMOB_ACCOUNT_ID');
			if (!empty($spimob_account_id))
			{
				Configuration::updateValue('SPIMOB_ACCOUNT_ID', $spimob_account_id);
				Configuration::updateValue('SPIMOB_CONFIGURATION_OK', true);//GANALYTICS_CONFIGURATION_OK
				$output .= $this->displayConfirmation($this->l('API Key updated successfully'));
			}
			$spimob_userid_enabled = Tools::getValue('SPIMOB_USERID_ENABLED');
			if (null !== $spimob_userid_enabled)
			{
				Configuration::updateValue('SPIMOB_USERID_ENABLED', (bool)$spimob_userid_enabled);
				$output .= $this->displayConfirmation($this->l('Settings for chatbox updated successfully'));
			}
		}

		if (version_compare(_PS_VERSION_, '1.5', '>='))
			$output .= $this->displayForm();
		else
		{
			$this->context->smarty->assign(array(
				'account_id' => Configuration::get('SPIMOB_ACCOUNT_ID'),
			));
			$output .= $this->display(__FILE__, 'views/templates/admin/form-ps14.tpl');
		}

		return $this->display(__FILE__, 'views/templates/admin/configuration.tpl').$output;
	}

	protected function _getChatBotTag($back_office = false)
	{
		$user_id = null;
		if (Configuration::get('SPIMOB_USERID_ENABLED')){

			return '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
				<script src="https://developers.chatbot.tn/assets/chatbox/chatbot.tn.js"></script>
				<script>$("body").chatbot({"uid":"'.Tools::safeOutput(Configuration::get('SPIMOB_ACCOUNT_ID')).'"});</script>';

		}
		else
		{
			return '';
		}
	}


	
	/**
	 * hook footer to load JS script for standards actions such as product clicks
	 */
	public function hookFooter()
	{
		
		if (Configuration::get('SPIMOB_ACCOUNT_ID'))
		{
			return $this->_getChatBotTag();
		}		
		
	}

	
	/**
	 * hook home to display generate the product list associated to home featured, news products and best sellers Modules
	 */
	public function isModuleEnabled($name)
	{
		if (version_compare(_PS_VERSION_, '1.5', '>='))
			if(Module::isEnabled($name))
			{
				$module = Module::getInstanceByName($name);
				return $module->isRegisteredInHook('home');
			}
			else
				return false;
		else
		{
			$module = Module::getInstanceByName($name);
			return ($module && $module->active === true);
		}
	}


	/**
	 * Generate Google Analytics js
	 */
	protected function _runJs($js_code, $backoffice = 0)
	{
		if (Configuration::get('SPIMOB_ACCOUNT_ID'))
		{
			$runjs_code = '';
			return $runjs_code;
		}
	}

	/**
	 *  admin office header to add google analytics js
	 */
	public function hookBackOfficeHeader()
	{
		$js = '';
		if (strcmp(Tools::getValue('configure'), $this->name) === 0)
		{
			if (version_compare(_PS_VERSION_, '1.5', '>') == true)
			{
				$this->context->controller->addCSS($this->_path.'views/css/spimobchatbot.css');
				if (version_compare(_PS_VERSION_, '1.6', '<') == true)
					$this->context->controller->addCSS($this->_path.'views/css/spimobchatbot-nobootstrap.css');
			}
			else
			{
				$js .= '<link rel="stylesheet" href="'.$this->_path.'views/css/spimobchatbot.css" type="text/css" />\
						<link rel="stylesheet" href="'.$this->_path.'views/css/spimobchatbot-nobootstrap.css" type="text/css" />';
			}
		}

		$spimob_account_id = Configuration::get('SPIMOB_ACCOUNT_ID');

		if (!empty($spimob_account_id) && $this->active)
		{

			$this->context->smarty->assign('SPIMOB_ACCOUNT_ID', $spimob_account_id);

			$spimob_scripts = '';
			
			return $js.$this->_getChatBotTag(true);//.$this->_runJs($spimob_scripts, 1);
		}
		else return $js;
	}

	protected function checkForUpdates()
	{
	}

	protected function _debugLog($function, $log)
	{
		if (!$this->_debug)
			return true;

		$myFile = _PS_MODULE_DIR_.$this->name.'/logs/spimob_chatbot.log';
		$fh = fopen($myFile, 'a');
		fwrite($fh, date('F j, Y, g:i a').' '.$function."\n");
		fwrite($fh, print_r($log, true)."\n\n");
		fclose($fh);
	}
}
