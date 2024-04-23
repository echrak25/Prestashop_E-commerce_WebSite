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
require_once(dirname(__FILE__) . '/classes/ets_tc_defines.php');
require_once(dirname(__FILE__) . '/classes/ets_tc_view.php');
require_once(dirname(__FILE__) . '/classes/ets_tc_session.php');
require_once(dirname(__FILE__) . '/classes/ets_tc_paggination_class.php');
class Ets_trackingcustomer extends Module
{
    public $_errors = array();
    public $is17 = false;
    public $hooks_display = array();
    public $list_customer_default =array();
    public $_html='';
    public $hooks = array(
        'actionCustomerLogoutAfter',
        'actionCustomerAccountAdd',
        'actionAuthentication',
        'displayBackOfficeHeader',
        'displayHeader',
        'actionDispatcherBefore',
        'actionCustomerGridQueryBuilderModifier',
        'actionCustomerGridDefinitionModifier',
        'actionCustomerGridDataModifier',
        'displayBeforeBodyClosingTag',
        'actionCartUpdateQuantityBefore',
        'actionValidateOrder',
        'displayAdminCustomers',
        'actionObjectAddAfter',
        'actionObjectUpdateAfter',
        'actionAddCustomerActiton',
        'actionDownloadAttachment'
    );
    public $module_dir;
    public $secure_key;
    public function __construct()
    {
        $this->name = 'ets_trackingcustomer';
        $this->tab = 'front_office_features';
        $this->version = '1.3.0';
        $this->author = 'PrestaHero';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;
        parent::__construct();
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->module_dir = $this->_path;
        $this->displayName = $this->l('Customer activities - Track / View customer behavior');
        $this->description = $this->l('Check your customers’ behavior while visiting your PrestaShop store, the products they view and the ones they are more interested in.');
$this->refs = 'https://prestahero.com/';
        $this->module_key = '6f02499c023453b04b674cfe6cf5502f';
		if(version_compare(_PS_VERSION_, '1.7', '>='))
            $this->is17 = true;
        $this->list_customer_default = array('id_customer', 'social_title','firstname','lastname', 'email', 'total_spent', 'active', 'newsletter','optin','date_add', 'lats_visit');
    }
    public function install()
    {
        return parent::install() && $this->_installHooks() && $this->_installDefaultConfig()&& $this->_installTab() && $this->installDb();
    }
    public function unInstall()
    {
        return parent::unInstall() && $this->_unInstallHooks()&& $this->_unInstallDefaultConfig() && $this->_uninstallTab()&& $this->unInstallDb();
    }
    public function installDb()
    {
        return Ets_tc_defines::getInstance()->_installDb();
    }
    public function unInstallDb()
    {
        return Ets_tc_defines::getInstance()->_unInstallDb();
    }
    public function getTextLang($text, $lang,$file_name='')
    {
        if(is_array($lang))
            $iso_code = $lang['iso_code'];
        elseif(is_object($lang))
            $iso_code = $lang->iso_code;
        else
        {
            $language = new Language($lang);
            $iso_code = $language->iso_code;
        }
		$modulePath = rtrim(_PS_MODULE_DIR_, '/').'/'.$this->name;
        $fileTransDir = $modulePath.'/translations/'.$iso_code.'.'.'php';
        if(!@file_exists($fileTransDir)){
            return $text;
        }
        $fileContent = Tools::file_get_contents($fileTransDir);
        $text_tras = preg_replace("/\\\*'/", "\'", $text);
        $strMd5 = md5($text_tras);
        $keyMd5 = '<{' . $this->name . '}prestashop>' . ($file_name ? : $this->name) . '_' . $strMd5;
        preg_match('/(\$_MODULE\[\'' . preg_quote($keyMd5) . '\'\]\s*=\s*\')(.*)(\';)/', $fileContent, $matches);
        if($matches && isset($matches[2])){
           return  $matches[2];
        }
        return $text;
    }
    public function getTabs()
    {
        return  array(
            array(
                'class' => 'AdminCustomerManager',
                'icon' => 'icon-AdminPriceRule',
                'active' => 0,
                'name' => $this->l('Customer manager'),
                'name_lang' =>'Customer manager'
            ),
            array(
                'class' => 'AdminTrackingCustomerSession',
                'icon' => 'icon-customer-session',
                'active' => 1,
                'name' => $this->l('Customer sessions'),
                'name_lang' =>'Customer sessions'
            ),
        );
    }
    public function _installTab()
    {
        if ($parentId = Tab::getIdFromClassName('AdminParentCustomer')) {
            $languages = Language::getLanguages(false);
            $tabs = $this->getTabs();
            foreach($tabs as $tab)
            {
                $tabObj = new Tab();
                $tabObj->id_parent = (int)$parentId;
                $tabObj->class_name = $tab['class'];
                $tabObj->icon = $tab['icon'];
                $tabObj->module = $this->name;
                $tabObj->active=(int)$tab['active'];
                foreach ($languages as $l) {
                    $tabObj->name[$l['id_lang']] = $this->getTextLang($tab['name_lang'],$l) ?: $tab['name'];
                }
                if (!Tab::getIdFromClassName($tabObj->class_name))
                    $tabObj->add();
            }
            
        }
        return true;
    }
    public function _uninstallTab()
    {
        $tabs = $this->getTabs();
        foreach($tabs as $tab)
        {
            if ($id = Tab::getIdFromClassName($tab['class'])) {
                $tabobj = new Tab((int)$id);
                $tabobj->delete();
            }
        }
        return true;
    }
    public function _installDefaultConfig()
    {
        $inputs = $this->getConfigInputs();
        $languages = Language::getLanguages(false);
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if(isset($input['default']) && $input['default'])
                {
                    if(isset($input['lang']) && $input['lang'])
                    {
                        $values = array();
                        foreach($languages as $language)
                        {
                            $values[$language['id_lang']] = isset($input['default_lang']) && $input['default_lang'] ? $this->getTextLang($input['default_lang'],$language) : $input['default'];
                        }
                        Configuration::updateGlobalValue($input['name'],$values);
                    }
                    else
                        Configuration::updateGlobalValue($input['name'],$input['default']);
                }
            }
        }
        Configuration::updateGlobalValue('ETS_TC_TOKEN_AJAX',Tools::strtolower(Tools::passwdGen(12)));
        return true;
    }
    public function _unInstallDefaultConfig()
    {
        $inputs = $this->getConfigInputs();
        if($inputs)
        {
            foreach($inputs as $input)
            {
                Configuration::deleteByName($input['name']);
            }
        }
        Configuration::deleteByName('ETS_TC_ARRANGE_LIST_CUSTOMER');
        $this->context->cookie->id_ets_tc_session=0;
        return true; 
    }
    public function _installHooks()
    {
        foreach($this->hooks as $hook)
        {
            $this->registerHook($hook);
        }
        return true;
    }
    public function _unInstallHooks()
    {
        foreach($this->hooks as $hook)
        {
            $this->unRegisterHook($hook);
        }
        return true;
    }
    public static function validateArray($array,$validate='isCleanHtml')
    {
        if(!is_array($array))
            return true;
        if(method_exists('Validate',$validate))
        {
            if($array && is_array($array))
            {
                $ok= true;
                foreach($array as $val)
                {
                    if(!is_array($val))
                    {
                        if($val && !Validate::$validate($val))
                        {
                            $ok= false;
                            break;
                        }
                    }
                    else
                        $ok = self::validateArray($val,$validate);
                }
                return $ok;
            }
        }
        return true;
    }
    public function getConfigInputs()
    {
        return array(
            array(
                'type' => 'text',
                'name' => 'ETS_TC_STORAGE_LIMIT_SESSION',
                'label' => $this->l('Maximum number of latest sessions to store'),
                'suffix' => $this->l('Sessions'),
                'default' => 20,
                'validate' => 'isUnsignedInt',
                'desc' => $this->l('Leave blank to store all customer sessions'),
            ),
            array(
                'type' => 'text',
                'name' => 'ETS_TC_STORAGE_LIMIT_ACTION',
                'label' => $this->l('Maximum number of latest customer actions to store'),
                'suffix' => $this->l('Actions'),
                'default' => 50,
                'validate' => 'isUnsignedInt',
                'desc' => $this->l('Leave blank to store all customer actions'),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_TC_ONLY_SESSION_REGISTERED',
                'label' => $this->l('Only record sessions of registered user'),
                'default' => 0,
                'validate' => 'isUnsignedInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'active_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'active_off',
                        'value' => 0,
                    )
                ),
            ),
            array(
                'type'=> 'select',
                'name' => 'ETS_TC_CLEAR_SESSION',
                'label' => $this->l('Clear customer activities data older than'),
                'options' => array(
                    'query' => array(
                        array(
                            'id' => 'Everything',
                            'name' => $this->l('All time'),
                        ),
                        array(
                            'id' => '1_week_ago',
                            'name' => $this->l('1 week ago'),
                        ),
                        array(
                            'id' => '1_month_ago',
                            'name' => $this->l('1 month ago'),
                        ),
                        array(
                            'id' => '6_months_ago',
                            'name' => $this->l('6 months ago'),
                        ),
                        array(
                            'id' => '1_year_ago',
                            'name' => $this->l('1 year ago'),
                        )
                    ),
                    'id' => 'id',
                    'name'=>'name'
                ),
            ),
            array(
                'type' => 'switch',
                'name' => 'ETS_TC_DISABLE_GUEST_LOGGING',
                'label' => $this->l('Disable Guest Data Logging'),
                'default' => 0,
                'validate' => 'isUnsignedInt',
                'values' => array(
                    array(
                        'label' => $this->l('Yes'),
                        'id' => 'active_on',
                        'value' => 1,
                    ),
                    array(
                        'label' => $this->l('No'),
                        'id' => 'active_off',
                        'value' => 0,
                    )
                ),
            ),
        );
    }
    public function getSfContainer()
    {
        if(!class_exists('\PrestaShop\PrestaShop\Adapter\SymfonyContainer'))
        {
            $kernel = null;
            try{
                $kernel = new AppKernel('prod', false);
                $kernel->boot();
                return $kernel->getContainer();
            }
            catch (Exception $ex){
                return null;
            }
        }
        $sfContainer = call_user_func(array('\PrestaShop\PrestaShop\Adapter\SymfonyContainer', 'getInstance'));
        return $sfContainer;
    }
    public function addTwigVar($key, $value)
    {
        if($sfContainer = $this->getSfContainer())
        {
            $sfContainer->get('twig')->addGlobal($key, $value);
        }
    }
    public function assignTwigVar($params)
    {
        /** @var \Twig\Environment $tw */
        if(!class_exists('Ets_trackingcustomer_twig'))
            require_once(dirname(__FILE__).'/classes/Ets_trackingcustomer_twig.php');
        if($sfContainer = $this->getSfContainer())
        {
            try {
                $tw = $sfContainer->get('twig');
                $tw->addExtension(new Ets_trackingcustomer_twig($params));
            } catch (\Twig\Error\RuntimeError $e) {
            }
        }
    }
    public function addKeyTwig()
    {
        if(version_compare(_PS_VERSION_, '1.7.6', '>=') && $this->active)
        {
            $view = array(
                array(
                    'id_ets_tc_view' => 0,
                    'fields' => '',
                    'name' => $this->l('--'),
                ),
            );
            $list_views = Ets_tc_view::getListViews();
            $list_views = array_merge($view,$list_views);
            $id_view_selected = (int)Ets_tc_view::getViewByIdEmployee($this->context->employee->id);
            $this->assignTwigVar(
                array(
                    'ets_tc_list_views' => $list_views,
                    'ets_tc_id_view_selected' =>$id_view_selected,
                    'ets_tc_custom_column_text' => $this->l('Customize customer list'),
                    'link_customer_manager' => $this->context->link->getAdminLink('AdminCustomerManager'),
                    'module_ets_trackingcustomer' => $this,
                    'ets_tc_link_customer_session' => $this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session',
                    'ets_tc_select_action'=>$this->getSelectActions()
                )
            );
        }
    }
    public function hookActionDispatcherBefore($params)
    {
        if(isset($params['controller_type']) && $params['controller_type']==Dispatcher::FC_ADMIN)
        {
            $controller = Tools::getValue('controller');
            $context = $this->context;
            if(isset($context->employee->id) && $context->employee->id && $context->employee->isLoggedBack() && Tools::strtolower($controller)=='admincustomers')
            {
                $this->_postCustomer();
                if($request =$this->getRequestContainer())
                {
                    $id_customer = (int)$request->get('customerId');
                }
                else
                    $id_customer = (int)Tools::getValue('id_customer');
                if (!$id_customer) {
                    $this->addKeyTwig();
                }
            }
        }
        Ets_tc_session::setTime();
    }
    public function hookActionDownloadAttachment($params)
    {
        if(isset($params['attachment']) && ($attachment = $params['attachment']) && $attachment->id)
        {
            Ets_tc_session::addAction('download_attachment',0,0,0,0,0,0,$attachment->id) ;
        }
    }
    public function hookActionCartUpdateQuantityBefore($params)
    {
        if(isset($params['cart']) && ($cart = $params['cart']) && isset($params['product']) && ($product = $params['product']))
        {
            if($product->id==Configuration::getGlobalValue('PH_EXTEND_ID_PRODUCT'))
                $params['id_product_attribute'] = (int)Tools::getValue('id_extend_support_product');
            $id_extend_support_order = (int)Tools::getValue('id_extend_support_order');
            if(isset($params['operator']) && $params['operator']=='up')
                Ets_tc_session::addAction('add_cart',$product->id,$cart->id,0,$id_extend_support_order,isset($params['id_product_attribute']) ? (int) $params['id_product_attribute']:0,isset($params['quantity']) ? (int) $params['quantity']:0) ;
            else
                Ets_tc_session::addAction('reduce_quantity',$product->id,$cart->id,0,$id_extend_support_order,isset($params['id_product_attribute']) ? (int) $params['id_product_attribute']:0,isset($params['quantity']) ? (int) $params['quantity']:0) ;
        }
    }
    public function hookActionValidateOrder($params)
    {
        if (isset($params['order']) && ($order = $params['order']))
        {
            $customer = new Customer($order->id_customer);
            if($customer->is_guest)
                Ets_tc_session::addAction('create_order_guest',0,0,$order->id);
            else
                Ets_tc_session::addAction('create_order',0,0,$order->id);
        }
    }
    public function hookActionObjectUpdateAfter($params)
    {
        if(isset($params['object']) && ($object = $params['object']) && Validate::isLoadedObject($object))
        {
            if(get_class($object)=='EtsFdProduct')
            {
                Ets_tc_session::addAction('download_product',$object->id_product,0,0);
            }
        }
    }
    public function hookActionAddCustomerActiton($params)
    {
        if(isset($params['action']) && $params['action'])
        {
            Ets_tc_session::addAction($params['action'],isset($params['id_product']) ? (int)$params['id_product']:0,isset($params['id_cart']) ? (int)$params['id_cart']:0,isset($params['id_order']) ? (int)$params['id_order']:0,isset($params['id_ticket']) ? (int)$params['id_ticket']:0);
        }
    }
    public function hookActionObjectAddAfter($params)
    {
        if(isset($params['object']) && ($object = $params['object']) && Validate::isLoadedObject($object))
        {
            $class = get_class($object);
            if($class=='EtsFdProduct')
            { 
                Ets_tc_session::addAction('download_product',$object->id_product,0,0);
            }
            if($class=='LC_Ticket')
            {
                Ets_tc_session::addAction('add_ticket',0,0,0,$object->id);
            }
            if($class=='Ybc_blog_comment_class')
            {
                Ets_tc_session::addAction('add_comment_blog',$object->id_post,0,0,$object->id);
            }
            if($class=='EtsRVProductComment')
            {
                if(!$object->question)
                    Ets_tc_session::addAction('add_comment_product',$object->id_product,0,0,$object->id);
                else
                    Ets_tc_session::addAction('add_question_comment',$object->id_product,0,0,$object->id);
            }
            if($class=='ProductComment')
            {
                Ets_tc_session::addAction('add_comment_product',$object->id_product,0,0,$object->id);
            }
        }
    }
    public function hookActionAuthentication($params)
    {
        if(isset($params['customer']) && isset($params['customer']->id) && !$params['customer']->is_guest && ($id_customer = $params['customer']->id))
        {
            if ( (int)$this->context->cookie->id_ets_tc_session && ($session = new Ets_tc_session((int)$this->context->cookie->id_ets_tc_session))) {
                if(!$session->id_customer && $session->id)
                {
                    $session->id_customer = $id_customer;
                    $session->update();
                    $session->updateAction();
                    Ets_tc_session::deleteSessionExpired();
                }
                elseif($session->id_customer && $session->id_customer!=$id_customer)
                {
                    $session->date_exit =Date('Y-m-d H:i:s');
                    $session->update();
                    $this->context->cookie->id_ets_tc_session=0;
                    Ets_tc_session::setSession($this->context->cookie);
                }
            }
            Ets_tc_session::addAction('login');
        }
        
    }
    public function hookActionCustomerAccountAdd($params)
    {
        if(isset($params['newCustomer']) && ($customer = $params['newCustomer']))
        {
            if( ($id_customer = $customer->id) && (int)$this->context->cookie->id_ets_tc_session && ($session = new Ets_tc_session((int)$this->context->cookie->id_ets_tc_session)) )
            {
                if(!$session->id_customer && $session->id)
                {
                    $session->id_customer = $id_customer;
                    $session->update();
                    $session->updateAction();
                    Ets_tc_session::deleteSessionExpired();
                }
                elseif($session->id_customer && $session->id_customer!=$id_customer)
                {
                    $session->date_exit =Date('Y-m-d H:i:s');
                    $session->update();
                    $this->context->cookie->id_ets_tc_session=0;
                    Ets_tc_session::setSession($this->context->cookie);
                }
            }
            if($customer->is_guest)
                Ets_tc_session::addAction('create_guest');
            else
                Ets_tc_session::addAction('create');
        }
        
    }
    public function hookActionCustomerLogoutAfter($params)
    {
        if(isset($params['customer']) && isset($params['customer']->id) && !$params['customer']->is_guest && $params['customer']->id)
        {
            Ets_tc_session::addAction('logout');
        }
    }
    public function hookDisplayBeforeBodyClosingTag($params)
    {
        if(Ets_trackingcustomer::checkSaveSession())
        {
            if (!isset($params['cookie']->id_guest) && !Configuration::get('ETS_TC_DISABLE_GUEST_LOGGING') ) {
                Guest::setNewGuest($params['cookie']);
            }
            Ets_tc_session::setSession($params['cookie']);
            Ets_tc_session::addAction('visit_page');
        }
        
    }
    public function hookDisplayAdminCustomers($params)
    {
        $html ='';
        if(isset($params['id_customer']) && ($id_customer = $params['id_customer']))
        {
            if(Module::isEnabled('ets_free_downloads'))
            {
                if($products = Ets_tc_session::getFreeDownloadProducts($id_customer))
                {
                    $this->smarty->assign(
                        array(
                            'products' => $products,
                        )
                    );
                    $html .= $this->display(__FILE__,'free_download_products.tpl');
                }
            }
            if(Module::isEnabled('ets_helpdesk'))
            {
                if($tickets = Ets_tc_session::getTickets($id_customer))
                {
                    $this->smarty->assign(
                        array(
                            'tickets' => $tickets,
                        )
                    );
                    $html .= $this->display(__FILE__,'tickets.tpl');
                }
            }
            if(Module::isEnabled('ets_livechat'))
            {
                if($tickets = Ets_tc_session::getLiveChatTickets($id_customer))
                {
                    $this->smarty->assign(
                        array(
                            'tickets' => $tickets,
                        )
                    );
                    $html .= $this->display(__FILE__,'tickets.tpl');
                }
            }
            if(Module::isEnabled('ets_shoplicense'))
            {
                if($products = Ets_tc_session::getShoplicenses($id_customer))
                {
                    $this->smarty->assign(
                        array(
                            'ph_mydownloads'=>Module::isInstalled('ph_mydownloads'),
                            'products' => $products,
                        )
                    );
                    $html .= $this->display(__FILE__,'shoplicense.tpl');
                }
                
            }
            $this->context->smarty->assign(
                array(
                    'ets_tc_link_customer_session' => $this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&id_customer='.$id_customer,
                )
            );
            $html .= $this->display(__FILE__,'customer_admin.tpl');
        }
        return $html;
    }
    public function hookDisplayHeader($params)
    {
        if(Ets_trackingcustomer::checkSaveSession())
        {
            $controller = Tools::getValue('controller');
            $action = Tools::getValue('action');
            if($controller=='product' && $action=='quickview' && ($id_product=(int)Tools::getValue('id_product')))
            {
                if (!isset($params['cookie']->id_guest)) {
                    Guest::setNewGuest($params['cookie']);
                }
                Ets_tc_session::setSession($params['cookie']);
                Ets_tc_session::addAction('visit_page',$id_product);
            }
            $this->context->controller->addJS($this->_path.'views/js/front.js');
            $this->smarty->assign(
                array(
                    'ets_tc_link_ajax' => $this->context->link->getModuleLink($this->name,'ajax',array('token'=>Configuration::get('ETS_TC_TOKEN_AJAX'))),
                )
            );
            return $this->display(__FILE__,'header.tpl');
        }
        
    }
    public function addJquery()
    {
        if (version_compare(_PS_VERSION_, '1.7.6.0', '>=') && version_compare(_PS_VERSION_, '1.7.7.0', '<'))
            $this->context->controller->addJS(_PS_JS_DIR_ . 'jquery/jquery-'._PS_JQUERY_VERSION_.'.min.js');
        else
            $this->context->controller->addJquery();
    }
    public function hookDisplayBackOfficeHeader()
    {
        $controller = Tools::getValue('controller');
        $configure = Tools::getValue('configure'); 
        if($controller =='AdminCarts')
        {
            $this->context->controller->addRowAction('session');
        }
        if($request =$this->getRequestContainer())
        {
            $id_customer = (int)$request->get('customerId'); 
        }
        else    
            $id_customer = (int)Tools::getValue('id_customer');
        if(($controller=='AdminModules' && $configure== $this->name) || $controller=='AdminTrackingCustomerSession')
        {
            $this->context->controller->addCSS($this->_path.'views/css/admin.css');
            $this->addJquery();
            $this->context->controller->addJS($this->_path.'views/js/admin.js');
        }
        $this->context->controller->addCSS($this->_path.'views/css/admin_all.css');
        if ($controller == 'AdminCustomers' || $controller == 'admincustomers' ||  $controller=='AdminTrackingCustomerSession') {
            $this->addJquery();
            $this->context->controller->addJqueryUI('ui.widget');
            $this->context->controller->addJqueryUI('ui.sortable');
            $this->context->controller->addJS($this->_path.'views/js/customer.js');
            $this->context->controller->addCSS($this->_path.'views/css/customer.css');
        }
        $this->context->smarty->assign(
            array(
                 'ets_tc_module_dir' => $this->_path,
            )
        );
        if($controller=='AdminOrders')
        {   
            $this->context->controller->addJS($this->_path . 'views/js/admin_order.js');
            $request = $this->getRequestContainer();
            $idOrder = null;
            if($request){
                $idOrder = $request->get('orderId');
            }
            else{
                $idOrder = (int)Tools::getValue('id_order');
            }
            if($idOrder)
            {
               $order = new Order($idOrder);
               $this->smarty->assign(
                    array(
                        'ets_tc_link_view_session'=>$this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&id_order='.(int)$idOrder,
                    )
               );
            }
            else
            {
                $this->smarty->assign(
                    array(
                        'ets_tc_link_view_session'=>$this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session',
                    )
                );
            }
            return $this->display(__FILE__, 'admin-head.tpl');
        }
        
    }
    public function loadTopVisitPage()
    {
        $filter = Tools::getValue('filter');
        $page = 1;
        if($page && (!$filter || Validate::isCleanHtml($filter)))
        {
            die(
                json_encode(
                    array(
                        'top_visit_page'=> $this->displayTopVisitpage($filter,$page),
                    )
                )
            );
        }
    }
    public function loadTopInsight()
    {
        $filter = Tools::getValue('filter');
        if((!$filter || Validate::isCleanHtml($filter)))
        {
            die(
                json_encode(
                    array(
                        'top_insight'=> $this->displayTopInsight($filter),
                    )
                )
            );
        }
    }
    public function loadmoreTopVisitPage()
    {
        $filter = Tools::getValue('filter');
        $page = (int)Tools::getValue('page');
        if($page && (!$filter || Validate::isCleanHtml($filter)))
        {
            die(
                json_encode(
                    array(
                        'top_visit_page'=> $this->displayTopVisitpage($filter,$page),
                    )
                )
            );
        }
    }
    public function loadmoreTopActions()
    {
        $filter = Tools::getValue('filter');
        $page = (int)Tools::getValue('page');
        if($page && (!$filter || Validate::isCleanHtml($filter)))
        {
            die(
                json_encode(
                    array(
                        'top_actions'=> $this->displayTopAction($filter,$page),
                    )
                )
            );
        }
    }
    public function loadTopActions()
    {
        $filter = Tools::getValue('filter');
        $page = 1;
        if($page && (!$filter || Validate::isCleanHtml($filter)))
        {
            die(
                json_encode(
                    array(
                        'top_actions'=> $this->displayTopAction($filter,$page),
                    )
                )
            );
        }
    }
    public function saveSubmit()
    {
        $this->_postValidation();
        if (!count($this->_errors)) {
            $inputs = $this->getConfigInputs();
            $languages = Language::getLanguages(false);
            $id_lang_default = Configuration::get('PS_LANG_DEFAULT');
            foreach($inputs as $input)
            {
                if(isset($input['lang']) && $input['lang'])
                {
                    $values = array();
                    foreach($languages as $language)
                    {
                        $value_default = Tools::getValue($input['name'].'_'.$id_lang_default);
                        $value = Tools::getValue($input['name'].'_'.$language['id_lang']);
                        $values[$language['id_lang']] = ($value && Validate::isCleanHtml($value)) || !isset($input['required']) ? $value : (Validate::isCleanHtml($value_default) ? $value_default :'');
                    }
                    Configuration::updateValue($input['name'],$values);
                }
                else
                {
                    $val = Tools::getValue($input['name']);
                    if(Validate::isCleanHtml($val))
                        Configuration::updateValue($input['name'],$val);
                }
            }
            $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
        } else {
            $this->_html .= $this->displayError($this->_errors);
        }
    }
    public function loadmoreTopCustomerbyActions()
    {
        $filter = Tools::getValue('filter');
        $page = (int)Tools::getValue('page');
        if($page && (!$filter || Validate::isCleanHtml($filter)))
        {
            die(
                json_encode(
                    array(
                        'top_customer_by_actions'=> $this->displayTopCustomerByAction($filter,$page),
                    )
                )
            );
        }
    }
    public function loadTopCustomerByActions()
    {
        $filter = Tools::getValue('filter');
        $page = 1;
        if($page && (!$filter || Validate::isCleanHtml($filter)))
        {
            die(
                json_encode(
                    array(
                        'top_customers'=> $this->displayTopCustomerByAction($filter,$page),
                    )
                )
            );
        }
    }
    public function getContent()
    {
        if(Tools::isSubmit('loadTopCustomerByActions'))
        {
            $this->loadTopCustomerByActions();
        }
        if(Tools::isSubmit('loadmoreTopCustomerbyActions'))
        {
            $this->loadmoreTopCustomerbyActions();
        }
        if(Tools::isSubmit('loadTopVisitPage'))
        {
            $this->loadTopVisitPage();
        }
        if(Tools::isSubmit('loadmoreTopVisitPage'))
        {
            $this->loadmoreTopVisitPage();
        }
        if(Tools::isSubmit('loadmoreTopActions'))
        {
            $this->loadmoreTopActions();
        }
        if(Tools::isSubmit('loadTopActions'))
        {
            $this->loadTopActions();
        }
        if(Tools::isSubmit('loadTopInsight'))
        {
            $this->loadTopInsight();
        }
        if(Tools::isSubmit('actionSubmitAnalytic'))
            $this->actionSubmitAnalytic();
        if(Tools::isSubmit('ets_tc_export_products'))
        {
            $this->actionExportProductsViewed();
        }
        if(Tools::isSubmit('btnSubmitClearSession') && ($type= Tools::getValue('type')) && Validate::isCleanHtml($type))
        {
            if(Ets_tc_session::deleteSession($type))
            {
                die(
                    json_encode(
                        array(
                            'success' => $this->l('Clear session successfully'),
                        )
                    )
                );
            }
        }
        $this->_html = '';
        if (Tools::isSubmit('btnSubmit') && !Tools::isSubmit('btnclearCache')) {
            $this->saveSubmit();
        }
        $this->_html .= $this->displayTabs();
        $current_tab = Tools::getValue('current_tab','analystic');
        if(!in_array($current_tab, array('analystic','settings','products')))
            $current_tab = 'analystic';
        if($current_tab=='settings')
            $this->_html .= $this->renderForm();
        elseif($current_tab=='products')
            $this->_html .= $this->renderListViewedProducts();
        else
            $this->_html .= $this->renderAnalystic();
        return  $this->_html;
    }
    public function getDateRanger($start, $end, $format = 'Y-m-d', $list_data_by_date = false, $type = 'date')
    {

        $array = array();
        $interval = new DateInterval('P1D');
        if ($type == 'month') {
            $interval = DateInterval::createFromDateString('1 month');
        }

        $period = new DatePeriod(
            new DateTime($start),
            $interval,
            new DateTime($end));

        foreach ($period as $date) {
            if ($list_data_by_date) {
                $array[$date->format($format)] = 0;
            } else {
                $array[] = $date->format($format);
            }
        }
        return $array;
    }
    public function getYearRanger($start, $end, $format = 'Y', $list_data_by_date = false)
    {

        $array = array();

        $getRangeYear = range(gmdate('Y', strtotime($start)), gmdate('Y', strtotime($end)));
        foreach ($getRangeYear as $year) {
            if ($list_data_by_date) {
                $array[date($format, strtotime($year . '-01-01 00:00:00'))] = 0;
            } else {
                $array[] = date($format, strtotime($year . '-01-01 00:00:00'));
            }
        }
        return $array;
    }
    public function renderAnalystic()
    {
        $chart_labels = array();
        $data_sessions = array();
        $month = date('m');
        $year= date('Y');
        $days = (int)date('t', mktime(0, 0, 0, (int)$month, 1, (int)$year));
        if($days)
        {
            for($day=1; $day<=$days;$day++)
            {
                $chart_labels[]=$day;
                $data_sessions[] = (int)Ets_tc_session::_getSessions(' AND YEAR(s.date_add)="'.(int)$year.'" AND MONTH(s.date_add)="'.(int)$month.'" AND DAY(s.date_add)="'.(int)$day.'"',null,null,null,true);
            }
        }
        $session_datasets=array(
            array(
                'label'=> $this->l('Session'),
                'data' =>$data_sessions,
                'backgroundColor'=>'rgba(163,225,212,0.3)',
                'borderColor'=>'rgba(163,225,212,1)',
                'borderWidth'=>1,
                'pointRadius' => 2,
            ),
        );
        $this->smarty->assign(
            array(
                'session_datasets'=>$session_datasets,
                'chart_labels' => $chart_labels,
                'ets_tc_module_dir' => $this->_path,
                'top_visit_page' => $this->displayTopVisitpage(' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"'),
                'top_action' => $this->displayTopAction(' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"'),
                'top_customer_by_action'=>$this->displayTopCustomerByAction(' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"'),
                'top_insight' => $this->displayTopInsight(' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"'),
                'filter_action'=>' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"',
                'select_list_actions'=>$this->getSelectActions(false),
            )
        );
        return $this->display(__FILE__,'analystic.tpl');
    }
    public function actionSubmitAnalytic()
    {
        $data_filter = Tools::getValue('data_filter');
        $chart_labels = array();
        $data_sessions = array();
        $top_visit_page ='';
        $top_action = '';
        $top_insight ='';
        $top_customer_by_action ='';
        $filter_action ='';
        if($data_filter=='day_1' || $data_filter=='day')
        {
            if($data_filter=='day_1')
                $date = date('Y-m-d',strtotime('-1 day'));
            else
                $date = date('Y-m-d');
            for($h =0;$h<=23;$h++)
            {
                $chart_labels[] = $h.'h'; 
                $data_sessions[] = (int)Ets_tc_session::_getSessions(' AND s.date_add <="'.pSQL($date).' 23:59:59" AND s.date_add >= "'.pSQL($date).' 00:00:01" AND HOUR(s.date_add)= "'.(int)$h.'"',null,null,null,true);
            }
            $filter_action =' AND a.date_add <="'.pSQL($date).' 23:59:59" AND a.date_add >="'.pSQL($date).' 00:00:01"';
            $top_visit_page = $this->displayTopVisitpage($filter_action);
            $top_action = $this->displayTopAction($filter_action);
            $top_customer_by_action = $this->displayTopCustomerByAction($filter_action);
            $top_insight = $this->displayTopInsight(' AND a.date_add <="'.pSQL($date).' 23:59:59" AND a.date_add >="'.pSQL($date).' 00:00:01"');
            
        }
        elseif($data_filter=='month' || $data_filter=='month_1')
        {
            if($data_filter=='month')
            {
                $month = date('m');
                $year= date('Y');
            }
            else
            {
                $month = date('m',strtotime('-1 month'));
                $year= date('Y',strtotime('-1 month'));
            }
            $days = (int)date('t', mktime(0, 0, 0, (int)$month, 1, (int)$year));
            if($days)
            {
                for($day=1; $day<=$days;$day++)
                {
                    $chart_labels[]=$day;
                    $data_sessions[] = (int)Ets_tc_session::_getSessions(' AND YEAR(s.date_add)="'.(int)$year.'" AND MONTH(s.date_add)="'.(int)$month.'" AND DAY(s.date_add)="'.(int)$day.'"',null,null,null,true);
                }
            }
            $top_visit_page = $this->displayTopVisitpage(' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"');
            $top_action = $this->displayTopAction(' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"');
            $top_insight = $this->displayTopInsight(' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"');
            $filter_action =' AND YEAR(a.date_add)="'.(int)$year.'" AND MONTH(a.date_add)="'.(int)$month.'"';
            $top_customer_by_action = $this->displayTopCustomerByAction($filter_action);
        }
        elseif($data_filter=='from_to')
        {
            $from_date = Tools::getValue('from_date');
            $to_date = Tools::getValue('to_date');
            if(Validate::isDate($from_date))
                $start_date = $from_date;
            else
                $start_date = Ets_tc_session::getDateMin();
            if(Validate::isDate($to_date))
                $end_date = $to_date;
            else
                $end_date = date('Y-m-d H:i:s');
            if(strtotime($end_date) > strtotime($start_date))
            {
                if (date('Y', strtotime($start_date)) != date('Y', strtotime($end_date)))
                {
                    $years = $this->getYearRanger($start_date,$end_date,'Y');
                    if($years)
                    {
                        foreach($years as $year)
                        {
                            $chart_labels[] = $year;
                            $data_sessions[] = (int)Ets_tc_session::_getSessions(' AND YEAR(s.date_add)="'.(int)$year.'" AND s.date_add <="'.pSQL($end_date).'" AND s.date_add >="'.pSQL($start_date).'"',null,null,null,true); 
                        }
                    
                    }
                }
                elseif((int)date('m', strtotime($start_date)) != (int)date('m', strtotime($end_date))) 
                {
                    $months = $this->getDateRanger($start_date,$end_date,'m',false,'month');
                    if($months)
                    {
                        $year = date('Y', strtotime($start_date));
                        foreach($months as $month)
                        {
                            $chart_labels[] = $month;
                            $data_sessions[] = (int)Ets_tc_session::_getSessions(' AND YEAR(s.date_add)="'.(int)$year.'" AND MONTH(s.date_add)="'.(int)$month.'" AND s.date_add <="'.pSQL($end_date).'" AND s.date_add >="'.pSQL($start_date).'"',null,null,null,true);
                        }
                    }
                }
                else
                {
                    $days = $this->getDateRanger($start_date,$end_date,'d');
                    if($days)
                    {
                        $year = date('Y', strtotime($start_date));
                        $month = date('m', strtotime($start_date));
                        foreach($days as $day)
                        {
                            $chart_labels[] = $day;
                            $data_sessions[] = (int)Ets_tc_session::_getSessions(' AND YEAR(s.date_add)="'.(int)$year.'" AND MONTH(s.date_add)="'.(int)$month.'" AND DAY(s.date_add)="'.(int)$day.'"',null,null,null,true);
                        }
                    }
                }
            }
            $top_visit_page = $this->displayTopVisitpage(($from_date ? ' AND a.date_add >="'.pSQL($from_date).'"':'').($to_date ? ' AND a.date_add <="'.(pSQL($to_date)).'"':''));
            $top_action = $this->displayTopAction(($from_date ? ' AND a.date_add >="'.pSQL($from_date).'"':'').($to_date ? ' AND a.date_add <="'.(pSQL($to_date)).'"':''));
            $top_insight = $this->displayTopInsight(($from_date ? ' AND a.date_add >="'.pSQL($from_date).'"':'').($to_date ? ' AND a.date_add <="'.(pSQL($to_date)).'"':''));
            $filter_action =($from_date ? ' AND a.date_add >="'.pSQL($from_date).'"':'').($to_date ? ' AND a.date_add <="'.(pSQL($to_date)).'"':'');
            $top_customer_by_action = $this->displayTopCustomerByAction($filter_action);
        }
        die(
            json_encode(
                array(
                    'data_sessions' =>$data_sessions ?  array($data_sessions):false,
                    'label_datas' => $chart_labels,
                    'top_visit_page' => $top_visit_page,
                    'top_action' => $top_action,
                    'top_insight' => $top_insight,
                    'filter_action'=>$filter_action,
                    'top_customer_by_action'=>$top_customer_by_action,
                )
            )
        );
    }
    public function displayTopVisitpage($filter='',$page=1)
    {
        $totalPages = Ets_tc_session::getTopVisitPages($filter,1,true);
        $this->smarty->assign(
            array(
                'top_pages' => Ets_tc_session::getTopVisitPages($filter,$page),
                'load_more'=> $totalPages > 20*$page,
                'filter'=> $filter,
                'page_next'=> $page+1,
                'current_page'=>$page,
                'ajax'=> Tools::isSubmit('ajax'),
            )
        );
        return $this->display(__FILE__,'top_visit_page.tpl');
    }
    public function displayTopAction($filter='',$page=1)
    {
        $totalActions = Ets_tc_session::getTopActions($filter,1,true);
        $this->smarty->assign(
            array(
                'top_actions' => Ets_tc_session::getTopActions($filter,$page),
                'load_more'=> $totalActions > 10*$page,
                'filter'=> $filter,
                'page_next'=> $page+1,
                'current_page'=>$page,
                'ajax'=> Tools::isSubmit('ajax'),
            )
        );
        return $this->display(__FILE__,'top_actions.tpl');
    }
    public function displayTopCustomerByAction($filter='',$page=1)
    {
        $totalCustomer = Ets_tc_session::getTopCustomerByActions($filter,1,true);
        $customers =Ets_tc_session::getTopCustomerByActions($filter,$page);
        if($customers)
        {
            foreach($customers as &$customer)
            {
                if($customer['id_customer'])
                {
                    $customerObj = new Customer($customer['id_customer']);
                    $customer['customer_name'] = $customerObj->firstname.' '.$customerObj->lastname;
                }
                else
                    $customer['customer_name'] = sprintf($this->l('Visitor #%s'),$customer['id']);
            }
        }
        $this->smarty->assign(
            array(
                'top_customers' => $customers,
                'load_more'=> $totalCustomer > 20*$page,
                'filter'=> $filter,
                'page_next'=> $page+1,
                'current_page'=>$page,
                'ajax'=> Tools::isSubmit('ajax'),
                'link'=>$this->context->link,            )
        );
        return $this->display(__FILE__,'top_customer_by_actions.tpl');
    }
    public function displayTopInsight($filter='')
    {
        $this->smarty->assign(
            array(
                'browsers' => Ets_tc_session::getTopBrowsers($filter),
                'countries' => Ets_tc_session::getTopCountries($filter),
                'languages' => Ets_tc_session::getTopLanguages($filter),
                'link' => $this->context->link,
            )
        );
        return $this->display(__FILE__,'top_browsers.tpl');
    }
    public function displayTabs()
    {
        $current_tab = Tools::getValue('current_tab','analystic');
        if(!in_array($current_tab, array('analystic','settings','customer_session','products')))
            $current_tab = 'analystic';
        $this->smarty->assign(
            array(
                'current_tab' => $current_tab,
                'link'=> $this->context->link,
                'link_config' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name,
            )
        );  
        return $this->display(__FILE__,'tabs.tpl');
    }
    public function renderForm()
    {
        $current_tab = Tools::getValue('current_tab','analystic');
        if(!in_array($current_tab, array('analystic','settings')))
            $current_tab = 'analystic';
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                    'icon' => ''
                ),
                'input' => $this->getConfigInputs(),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = $this->id;
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&current_tab='.$current_tab;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $language->id;
        $helper->override_folder ='/';
        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
			'language' => array(
				'id_lang' => $language->id,
				'iso_code' => $language->iso_code
			),
            'PS_ALLOW_ACCENTED_CHARS_URL', (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL'),
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
            'link' => $this->context->link,
        );
        $this->fields_form = array();
        return $helper->generateForm(array($fields_form));
    }
    public function getConfigFieldsValues()
    {
        $languages = Language::getLanguages(false);
        $fields = array();
        $inputs = $this->getConfigInputs();
        if($inputs)
        {
            foreach($inputs as $input)
            {
                if(!isset($input['lang']))
                {
                    $fields[$input['name']] = Tools::getValue($input['name'],Configuration::get($input['name']));
                }
                else
                {
                    foreach($languages as $language)
                    {
                        $fields[$input['name']][$language['id_lang']] = Tools::getValue($input['name'].'_'.$language['id_lang'],Configuration::get($input['name'],$language['id_lang']));
                    }
                }
            }
        }
        return $fields;
    }
    public function _postValidation()
    {
        $languages = Language::getLanguages(false);
        $inputs = $this->getConfigInputs();
        $id_lang_default = Configuration::get('PS_LANG_DEFAULT');
        foreach($inputs as $input)
        {
            if(isset($input['lang']) && $input['lang'])
            {
                if(isset($input['required']) && $input['required'])
                {
                    $val_default = Tools::getValue($input['name'].'_'.$id_lang_default);
                    if(!$val_default)
                    {
                        $this->_errors[] = sprintf($this->l('%s is required'),$input['label']);
                    }
                    elseif($val_default && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate) && !Validate::{$validate}($val_default))
                        $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    elseif($val_default && !Validate::isCleanHtml($val_default))
                        $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                    else
                    {
                        foreach($languages as $language)
                        {
                            if(($value = Tools::getValue($input['name'].'_'.$language['id_lang'])) && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate)  && !Validate::{$validate}($value))
                                $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                            elseif($value && !Validate::isCleanHtml($value))
                                $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                        }
                    }
                }
                else
                {
                    foreach($languages as $language)
                    {
                        if(($value = Tools::getValue($input['name'].'_'.$language['id_lang'])) && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate)  && !Validate::{$validate}($value))
                            $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                        elseif($value && !Validate::isCleanHtml($value))
                            $this->_errors[] = sprintf($this->l('%s is not valid in %s'),$input['label'],$language['iso_code']);
                    }
                }
            }
            else
            {
                $val = Tools::getValue($input['name']);
                if($val===''&& isset($input['required']))
                {
                    $this->_errors[] = sprintf($this->l('%s is required'),$input['label']);
                }
                if($val!=='' && isset($input['validate']) && ($validate = $input['validate']) && method_exists('Validate',$validate) && !Validate::{$validate}($val))
                {
                    $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
                }
                elseif($val!==''&& !Validate::isCleanHtml($val))
                    $this->_errors[] = sprintf($this->l('%s is not valid'),$input['label']);
            }
        }
    }
    public function getRequestContainer()
    {
        if ($this->is17)
        {
            if($sfContainer = $this->getSfContainer())
            {
                return $sfContainer->get('request_stack')->getCurrentRequest();
            }
        }
        return null;
    }
    public function hookActionCustomerGridQueryBuilderModifier($params)
    {
        $request = $this->getRequestContainer();
        if(($id_customer = (int)Tools::getValue('id_customer')) || ($request && ($id_customer = $request->get('cusotmerId'))))
            return $id_customer;
        $fields = $this->getFieldsListCustomer();
        if(isset($params['search_query_builder']) && $params['search_query_builder'] && isset($params['count_query_builder']) && $params['count_query_builder'])
        {
            $searchQueryBuilder = &$params['search_query_builder'];
            $countQueryBuilder = &$params['count_query_builder'];
            if(in_array('lang_name',$fields))
            {
                $searchQueryBuilder->addSelect( 'lang.name as lang_name,c.id_lang')
                ->leftJoin('c',_DB_PREFIX_.'lang','lang','lang.id_lang = c.id_lang');
                $countQueryBuilder->leftJoin('c',_DB_PREFIX_.'lang','lang','lang.id_lang = c.id_lang');
            }
            if(in_array('total_purchased_products',$fields))
            {
                $sql ='SELECT SUM(od.product_quantity) FROM
                    `'._DB_PREFIX_.'orders` o
                    INNER JOIN `'._DB_PREFIX_.'order_detail` od ON (od.id_order = o.id_order)
                    WHERE(o.id_customer = c.id_customer) AND(o.id_shop IN('.(int)$this->context->shop->id.')) AND(o.valid = 1)';
                $searchQueryBuilder->addSelect('('.$sql.') as total_purchased_products');
            }
            if(in_array('age',$fields))
            {
                $searchQueryBuilder->addSelect('(YEAR(CURRENT_DATE)-YEAR(c.`birthday`)) - (RIGHT(CURRENT_DATE, 5) < RIGHT(c.`birthday`, 5)) as age');
            }
            if(in_array('last_abandoned_id',$fields))
            {
                $sql ='SELECT cart.id_cart FROM
                    `'._DB_PREFIX_.'cart` cart
                    LEFT JOIN `'._DB_PREFIX_.'orders` o ON (o.id_cart = cart.id_cart)
                    WHERE(cart.id_customer = c.id_customer) AND o.id_cart is null ORDER BY cart.id_cart desc LIMIT 1';
                $searchQueryBuilder->addSelect('('.$sql.') as last_abandoned_id');
            }
            if(in_array('last_purchased_products',$fields))
            {
                $searchQueryBuilder->addSelect('orders.id_last_order')
                    ->leftJoin('c','(SELECT max(id_order) as id_last_order,id_customer FROM `'._DB_PREFIX_.'orders` GROUP BY id_customer)','orders','orders.id_customer=c.id_customer');
            }
            if(in_array('shop_domain',$fields) && Module::isEnabled('ets_shoplicense'))
            {
                $searchQueryBuilder->addSelect('shop_orders.id_last_order_domain')
                    ->leftJoin('c','(SELECT max(o.id_order) as id_last_order_domain,o.id_customer FROM `'._DB_PREFIX_.'orders` o INNER JOIN `'._DB_PREFIX_.'ets_sl_order_product` slo ON (slo.id_order=o.id_order) GROUP BY o.id_customer)','shop_orders','shop_orders.id_customer=c.id_customer');
            }
            if(in_array('verified',$fields) && Module::isEnabled('ets_free_downloads'))
            {
                $searchQueryBuilder
                ->addSelect('efv' . '.`is_verified`')
                ->leftJoin('c',
                    _DB_PREFIX_ .'ets_fd_verification',
                    'efv',
                    'efv.id_customer = c.id_customer'
                );
                 $countQueryBuilder
                ->leftJoin('c',
                    _DB_PREFIX_ .'ets_fd_verification',
                    'efv',
                    'efv.id_customer = c.id_customer'
                );
            }
            if(in_array('last_free_download',$fields) && Module::isEnabled('ets_free_downloads'))
            {
                $searchQueryBuilder
                ->addSelect('MAX(fdp' . '.`id_product`) as last_free_download')
                ->leftJoin('c',
                    _DB_PREFIX_ .'ets_fd_customer',
                    'fdc',
                    'fdc.id_customer = c.id_customer'
                )
                ->leftJoin('fdc',
                    _DB_PREFIX_ .'ets_fd_product',
                    'fdp',
                    'fdp.id_ets_fd_product = fdc.id_ets_fd_product'
                );
                 $countQueryBuilder
                ->leftJoin('c',
                    _DB_PREFIX_ .'ets_fd_customer',
                    'fdc',
                    'fdc.id_customer = c.id_customer'
                )
                ->leftJoin('fdc',
                    _DB_PREFIX_ .'ets_fd_product',
                    'fdp',
                    'fdp.id_ets_fd_product = fdc.id_ets_fd_product'
                );
            }
            if(in_array('id_ticket',$fields))
            {
                if(Module::isEnabled('ets_helpdesk'))
                {
                    $sql ='SELECT ticket.id_ets_hd_ticket FROM
                    `'._DB_PREFIX_.'ets_hd_ticket` ticket
                    WHERE(ticket.id_customer = c.id_customer) AND ticket.status ="open" ORDER BY ticket.id_ets_hd_ticket desc LIMIT 1';
                    $searchQueryBuilder->addSelect('('.$sql.') as id_ets_hd_ticket');
                }
                if(Module::isEnabled('ets_livechat'))
                {
                    $sql ='SELECT ticket.id_message FROM
                    `'._DB_PREFIX_.'ets_livechat_ticket_form_message` ticket
                    WHERE(ticket.id_customer = c.id_customer) AND ticket.status ="open" ORDER BY ticket.id_message desc LIMIT 1';
                    $searchQueryBuilder->addSelect('('.$sql.') as id_message');
                }
            }
            if(in_array('source',$fields) || in_array('first_visit_page',$fields) || in_array('duration',$fields) || in_array('total_viewed_page',$fields) || in_array('last_action',$fields) || in_array('exit_page',$fields))
            {
                $searchQueryBuilder->addSelect( 'tcs.source')
                ->addSelect('tcs.id_first_page')
                ->addSelect('tcs.id_first_object')
                ->addSelect('tcs.id_exit_page')
                ->addSelect('tcs.id_exit_object')
                ->addSelect('tcs.url_source')
                ->addSelect('if(ml1.title="" or ml1.title is null,m1.page,ml1.title) as first_page')
                ->addSelect('tcs.first_url')
                ->addSelect('tcs.duration')
                ->addSelect('if(ml2.title="" or ml2.title is null,m2.page,ml2.title) as exit_page')
                ->addSelect('tcs.exit_url')
                ->addSelect('tcs.date_exit')
                ->addSelect('tcs.total_page_visit')
                ->addSelect('tcs.last_action')
                ->leftJoin('c','(SELECT id_customer,max(id_ets_tc_session) as max_id FROM `'._DB_PREFIX_.'ets_tc_session` GROUP BY id_customer)','session','session.id_customer = c.id_customer')
                ->leftJoin('session',_DB_PREFIX_.'ets_tc_session','tcs','tcs.id_ets_tc_session = session.max_id')
                ->leftJoin('tcs',_DB_PREFIX_.'meta','m1','tcs.id_first_page=m1.id_meta')
                ->leftJoin('m1',_DB_PREFIX_.'meta_lang','ml1','m1.id_meta=ml1.id_meta AND ml1.id_lang='.(int)$this->context->language->id)
                ->leftJoin('tcs',_DB_PREFIX_.'meta','m2','tcs.id_exit_page=m2.id_meta')
                ->leftJoin('m2',_DB_PREFIX_.'meta_lang','ml2','m2.id_meta=ml2.id_meta AND ml2.id_lang='.(int)$this->context->language->id);
                $countQueryBuilder->leftJoin('c','(SELECT id_customer,max(id_ets_tc_session) as max_id FROM `'._DB_PREFIX_.'ets_tc_session` GROUP BY id_customer)','session','session.id_customer = c.id_customer')
                ->leftJoin('session',_DB_PREFIX_.'ets_tc_session','tcs','tcs.id_ets_tc_session = session.max_id')
                ->leftJoin('tcs',_DB_PREFIX_.'meta','m1','tcs.id_first_page=m1.id_meta')
                ->leftJoin('m1',_DB_PREFIX_.'meta_lang','ml1','m1.id_meta=ml1.id_meta AND ml1.id_lang='.(int)$this->context->language->id)
                ->leftJoin('tcs',_DB_PREFIX_.'meta','m2','tcs.id_exit_page=m2.id_meta')
                ->leftJoin('m2',_DB_PREFIX_.'meta_lang','ml2','m2.id_meta=ml2.id_meta AND ml2.id_lang='.(int)$this->context->language->id);
            }
            if(Tools::isSubmit('customer') && ($submit_customer = Tools::getValue('customer')) && self::validateArray($submit_customer) ) 
            {
                if(isset($submit_customer['filters']) && ($submit_filters = $submit_customer['filters']))
                {
                    if(isset($submit_filters['lang_name']) && $submit_filters['lang_name']!=='')
                    {
                        $countQueryBuilder->andWhere('lang.name LIKE "%'.pSQL($submit_filters['lang_name']).'%"');
                        $searchQueryBuilder->andWhere('lang.name LIKE "%'.pSQL($submit_filters['lang_name']).'%"');
                    }
                    if(isset($submit_filters['source']) && $submit_filters['source']!=='')
                    {
                        $countQueryBuilder->andWhere('tcs.source LIKE "%'.pSQL($submit_filters['source']).'%"');
                        $searchQueryBuilder->andWhere('tcs.source LIKE "%'.pSQL($submit_filters['source']).'%"');
                    }
                    if((isset($submit_filters['exit_page']) && $submit_filters['exit_page']!=='') || (isset($submit_filters['first_page']) && $submit_filters['first_page']!=='') )
                    {
                        $id_page_manufacturer = (int)Ets_tc_session::getMetaByPage('manufacturer'); 
                        $id_page_supplier = (int)Ets_tc_session::getMetaByPage('supplier');
                        $id_page_product = Ets_tc_session::getMetaByPage('product');
                        $id_page_category = Ets_tc_session::getMetaByPage('category');
                        $id_page_cms = Ets_tc_session::getMetaByPage('cms');
                        $id_page_blog = Ets_tc_session::getMetaByPage('module-ybc_blog-blog');
                        $id_page_support = Ets_tc_session::getMetaByPage('module-ets_livechat-form');
                        $id_page_collection = Ets_tc_session::getMetaByPage('module-ets_collections-collection');
                        $livechat = Module::isEnabled('ets_livechat');
                        $blog = Module::isEnabled('ybc_blog');
                        $ets_collections = Module::isEnabled('ets_collections');
                    }
                    if(isset($submit_filters['first_page']) && $submit_filters['first_page']!=='')
                    {
                        $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'product_lang','pl','tcs.id_first_page= '.(int)$id_page_product.' AND tcs.id_first_object= pl.id_product AND pl.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'manufacturer','man','tcs.id_first_page= '.(int)$id_page_manufacturer.' AND tcs.id_first_object= man.id_manufacturer')
                        ->leftJoin('tcs',_DB_PREFIX_.'supplier','su','tcs.id_first_page= '.(int)$id_page_supplier.' AND tcs.id_first_object= su.id_supplier')
                        ->leftJoin('tcs',_DB_PREFIX_.'category_lang','cl','tcs.id_first_page= '.(int)$id_page_category.' AND tcs.id_first_object= cl.id_category AND cl.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'cms_lang','cms','tcs.id_first_page= '.(int)$id_page_cms.' AND tcs.id_first_object= cms.id_cms AND cms.id_lang='.(int)$this->context->language->id);
                        if($livechat)
                            $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_livechat_ticket_form_lang','tfl','tcs.id_first_page= '.(int)$id_page_support.' AND tcs.id_first_object= tfl.id_form AND tfl.id_lang='.(int)$this->context->language->id);
                        if($blog)
                            $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ybc_blog_post_lang','ybcbl','tcs.id_first_page= '.(int)$id_page_blog.' AND tcs.id_first_object= ybcbl.id_post AND ybcbl.id_lang='.(int)$this->context->language->id);
                        if($ets_collections)
                            $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_col_collection_lang','col','tcs.id_first_page= '.(int)$id_page_collection.' AND tcs.id_first_object= col.id_ets_col_collection AND col.id_lang='.(int)$this->context->language->id);
                        $countQueryBuilder->andWhere('(CONCAT(IFNULL(ml1.title,"")," - ",IFNULL(pl.name,""),IFNULL(man.name,""),IFNULL(su.name,""),IFNULL(cl.name,""),IFNULL(cms.meta_title,"")'.($livechat ? ',IFNULL(tfl.title,"")':'').($blog ? ',IFNULL(ybcbl.title,"")':'').($ets_collections ? ',IFNULL(col.name,"")':'').')  LIKE "%'.pSQL($submit_filters['first_page']).'%" OR CONCAT(IFNULL(m1.page,"")," - ",IFNULL(pl.name,""),IFNULL(man.name,""),IFNULL(su.name,""),IFNULL(cl.name,""),IFNULL(cms.meta_title,"")'.($livechat ? ',IFNULL(tfl.title,"")':'').($blog ? ',IFNULL(ybcbl.title,"")':'').($ets_collections ? ',IFNULL(col.name,"")':'').') LIKE "%'.pSQL($submit_filters['first_page']).'%")');
                        
                        $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'product_lang','pl','tcs.id_first_page= '.(int)$id_page_product.' AND tcs.id_first_object= pl.id_product AND pl.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'manufacturer','man','tcs.id_first_page= '.(int)$id_page_manufacturer.' AND tcs.id_first_object= man.id_manufacturer')
                        ->leftJoin('tcs',_DB_PREFIX_.'supplier','su','tcs.id_first_page= '.(int)$id_page_supplier.' AND tcs.id_first_object= su.id_supplier')
                        ->leftJoin('tcs',_DB_PREFIX_.'category_lang','cl','tcs.id_first_page= '.(int)$id_page_category.' AND tcs.id_first_object= cl.id_category AND cl.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'cms_lang','cms','tcs.id_first_page= '.(int)$id_page_cms.' AND tcs.id_first_object= cms.id_cms AND cms.id_lang='.(int)$this->context->language->id);
                        if($livechat)
                            $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_livechat_ticket_form_lang','tfl','tcs.id_first_page= '.(int)$id_page_support.' AND tcs.id_first_object= tfl.id_form AND tfl.id_lang='.(int)$this->context->language->id);
                        if($blog)
                            $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ybc_blog_post_lang','ybcbl','tcs.id_first_page= '.(int)$id_page_blog.' AND tcs.id_first_object= ybcbl.id_post AND ybcbl.id_lang='.(int)$this->context->language->id);
                        if($ets_collections)
                            $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_col_collection_lang','col','tcs.id_first_page= '.(int)$id_page_collection.' AND tcs.id_first_object= col.id_ets_col_collection AND col.id_lang='.(int)$this->context->language->id);
                        $searchQueryBuilder->andWhere('(CONCAT(IFNULL(ml1.title,"")," - ",IFNULL(pl.name,""),IFNULL(man.name,""),IFNULL(su.name,""),IFNULL(cl.name,""),IFNULL(cms.meta_title,"")'.($livechat ? ',IFNULL(tfl.title,"")':'').($blog ? ',IFNULL(ybcbl.title,"")':'').($ets_collections ? ',IFNULL(col.name,"")':'').')  LIKE "%'.pSQL($submit_filters['first_page']).'%" OR CONCAT(IFNULL(m1.page,"")," - ",IFNULL(pl.name,""),IFNULL(man.name,""),IFNULL(su.name,""),IFNULL(cl.name,""),IFNULL(cms.meta_title,"")'.($livechat ? ',IFNULL(tfl.title,"")':'').($blog ? ',IFNULL(ybcbl.title,"")':'').($ets_collections ? ',IFNULL(col.name,"")':'').') LIKE "%'.pSQL($submit_filters['first_page']).'%")');
                    }
                    if(isset($submit_filters['exit_page']) && $submit_filters['exit_page']!=='')
                    {
                        $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'product_lang','pl2','tcs.id_exit_page= '.(int)$id_page_product.' AND tcs.id_exit_object= pl2.id_product AND pl2.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'manufacturer','man2','tcs.id_exit_page= '.(int)$id_page_manufacturer.' AND tcs.id_exit_object= man2.id_manufacturer')
                        ->leftJoin('tcs',_DB_PREFIX_.'supplier','su2','tcs.id_exit_page= '.(int)$id_page_supplier.' AND tcs.id_exit_object= su2.id_supplier')
                        ->leftJoin('tcs',_DB_PREFIX_.'category_lang','cl2','tcs.id_exit_page= '.(int)$id_page_category.' AND tcs.id_exit_object= cl2.id_category AND cl2.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'cms_lang','cms2','tcs.id_exit_page= '.(int)$id_page_cms.' AND tcs.id_exit_object= cms2.id_cms AND cms2.id_lang='.(int)$this->context->language->id);
                        if($livechat)
                            $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_livechat_ticket_form_lang','tfl2','tcs.id_exit_page= '.(int)$id_page_support.' AND tcs.id_exit_object= tfl2.id_form AND tfl2.id_lang='.(int)$this->context->language->id);
                        if($blog)
                            $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ybc_blog_post_lang','ybcbl2','tcs.id_exit_page= '.(int)$id_page_blog.' AND tcs.id_exit_object= ybcbl2.id_post AND ybcbl2.id_lang='.(int)$this->context->language->id);
                        if($ets_collections)
                            $countQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_col_collection_lang','col2','tcs.id_exit_page= '.(int)$id_page_collection.' AND tcs.id_exit_object= col2.id_ets_col_collection AND col2.id_lang='.(int)$this->context->language->id);
                        $countQueryBuilder->andWhere('(CONCAT(IFNULL(ml2.title,"")," - ",IFNULL(pl2.name,""),IFNULL(man2.name,""),IFNULL(cl2.name,""),IFNULL(cms2.meta_title,"")'.($livechat ? ',IFNULL(tfl2.title,"")':'').($blog ? ',IFNULL(ybcbl2.title,"")':'').($ets_collections ? ',IFNULL(col2.name,"")':'').') LIKE "%'.pSQL($submit_filters['exit_page']).'%" OR CONCAT(IFNULL(m2.page,"")," - ",IFNULL(pl2.name,""),IFNULL(man2.name,""),IFNULL(cl2.name,""),IFNULL(cms2.meta_title,"")'.($livechat ? ',IFNULL(tfl2.title,"")':'').($blog ? ',IFNULL(ybcbl2.title,"")':'').($ets_collections ? ',IFNULL(col2.name,"")':'').') LIKE "%'.pSQL($submit_filters['exit_page']).'%")');
                        
                        $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'product_lang','pl2','tcs.id_exit_page= '.(int)$id_page_product.' AND tcs.id_exit_object= pl2.id_product AND pl2.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'manufacturer','man2','tcs.id_exit_page= '.(int)$id_page_manufacturer.' AND tcs.id_exit_object= man2.id_manufacturer')
                        ->leftJoin('tcs',_DB_PREFIX_.'supplier','su2','tcs.id_exit_page= '.(int)$id_page_supplier.' AND tcs.id_exit_object= su2.id_supplier')
                        ->leftJoin('tcs',_DB_PREFIX_.'category_lang','cl2','tcs.id_exit_page= '.(int)$id_page_category.' AND tcs.id_exit_object= cl2.id_category AND cl2.id_lang='.(int)$this->context->language->id)
                        ->leftJoin('tcs',_DB_PREFIX_.'cms_lang','cms2','tcs.id_exit_page= '.(int)$id_page_cms.' AND tcs.id_exit_object= cms2.id_cms AND cms2.id_lang='.(int)$this->context->language->id);
                        if($livechat)
                            $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_livechat_ticket_form_lang','tfl2','tcs.id_exit_page= '.(int)$id_page_support.' AND tcs.id_exit_object= tfl2.id_form AND tfl2.id_lang='.(int)$this->context->language->id);
                        if($blog)
                            $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ybc_blog_post_lang','ybcbl2','tcs.id_exit_page= '.(int)$id_page_blog.' AND tcs.id_exit_object= ybcbl2.id_post AND ybcbl2.id_lang='.(int)$this->context->language->id);
                        if($ets_collections)
                            $searchQueryBuilder->leftJoin('tcs',_DB_PREFIX_.'ets_col_collection_lang','col2','tcs.id_exit_page= '.(int)$id_page_collection.' AND tcs.id_exit_object= col2.id_ets_col_collection AND col2.id_lang='.(int)$this->context->language->id);
                        $searchQueryBuilder->andWhere('(CONCAT(IFNULL(ml2.title,"")," - ",IFNULL(pl2.name,""),IFNULL(man2.name,""),IFNULL(cl2.name,""),IFNULL(cms2.meta_title,"")'.($livechat ? ',IFNULL(tfl2.title,"")':'').($blog ? ',IFNULL(ybcbl2.title,"")':'').($ets_collections ? ',IFNULL(col2.name,"")':'').') LIKE "%'.pSQL($submit_filters['exit_page']).'%" OR CONCAT(IFNULL(m2.page,"")," - ",IFNULL(pl2.name,""),IFNULL(man2.name,""),IFNULL(cl2.name,""),IFNULL(cms2.meta_title,"")'.($livechat ? ',IFNULL(tfl2.title,"")':'').($blog ? ',IFNULL(ybcbl2.title,"")':'').($ets_collections ? ',IFNULL(col2.name,"")':'').') LIKE "%'.pSQL($submit_filters['exit_page']).'%")');
                    }
                    if(isset($submit_filters['total_page_visit']) && $submit_filters['total_page_visit']!=='')
                    {
                        $countQueryBuilder->andWhere('tcs.total_page_visit = "'.(int)$submit_filters['total_page_visit'].'"');
                        $searchQueryBuilder->andWhere('tcs.total_page_visit = "'.(int)$submit_filters['total_page_visit'].'"');
                    }
                    if(isset($submit_filters['last_action']) && $submit_filters['last_action']!=='')
                    {
                        $countQueryBuilder->andWhere('tcs.last_action LIKE "%'.pSQL($submit_filters['last_action']).'%"');
                        $searchQueryBuilder->andWhere('tcs.last_action LIKE "%'.pSQL($submit_filters['last_action']).'%"');
                    }
                    if(isset($submit_filters['is_verified']) && $submit_filters['is_verified']!=='' && Module::isEnabled('ets_free_downloads'))
                    {
                        $searchQueryBuilder->andWhere('efv.`is_verified` = '.(int)$submit_filters['is_verified']);
                    }
                }
                if(isset($submit_customer['orderBy']) && isset($submit_customer['sortOrder']))
                    $searchQueryBuilder->addOrderBy($submit_customer['orderBy'],$submit_customer['sortOrder']);
            }
            $searchQueryBuilder->addGroupBy('c.id_customer');
        }
    }
    public function hookActionCustomerGridDataModifier($params)
    {
        $actions = $this->getListActions();
        if (isset($params['data']) && $params['data']) {
            $data = &$params['data'];
            $results = $data->getRecords();
            $resultModified = array();
            foreach ($results as $item)
            {
                if($id_address = (int)Address::getFirstCustomerAddressId($item['id_customer'],true))
                {
                    $address = new Address($id_address);
                    $country = new Country($address->id_country,$this->context->language->id);
                    $item['country_name'] = $country->name;
                }
                else
                    $item['country_name']='--';
                if(isset($item['lang_name']))
                    $item['lang_name'] = $this->displayText(null,'img',null,null,null,null,_PS_IMG_.'/l/'.$item['id_lang'].'.jpg').$item['lang_name'];
                if(isset($item['last_free_download']))
                {
                    if($item['last_free_download'] && ($product = new Product($item['last_free_download'],false,$this->context->language->id)) && Validate::isLoadedObject($product))
                    {
                        $this->smarty->assign(array(
                            'product' => $product,
                            'image' => Ets_tc_session::getProductImage($item['last_free_download']),
                            'link'=>$this->context->link,
                        ));
                        $item['last_free_download'] = $this->display(__FILE__, 'item_product.tpl');
                    }
                    else
                        $item['last_free_download'] ='--';
                }
                else
                    $item['last_free_download'] ='--';
                if(isset($item['duration']) && $item['duration'])
                {
                    $item['duration'] = $this->displayTime($item['duration']);
                }
                if(isset($item['age']))
                {
                    if($item['age']==date('Y'))
                       $item['age'] ='--'; 
                }
                if(isset($item['source']) && $item['source'] && isset($item['url_source']))
                {
                    $this->smarty->assign(
                        array(
                            'href' => $item['url_source'],
                            'content' => $item['source'],
                            'blank' => true,
                        )
                    );
                    $item['source'] = $this->display(__FILE__,'a.tpl');
                }
                if(isset($item['exit_page']) && isset($item['exit_url']))
                {
                    $item['exit_page'] = Tools::ucfirst($item['exit_page']);
                    if($item['id_exit_object'] && ($exit_title = Ets_tc_session::getTitleMeta($item['id_exit_page'],$item['id_exit_object'])))
                    {
                        $item['exit_page'] .=' - '.$exit_title;
                    }
                    $this->smarty->assign(
                        array(
                            'href' => $item['exit_url'],
                            'content' => $item['exit_page'],
                            'blank' => true,
                        )
                    );
                    $item['exit_page'] = $this->display(__FILE__,'a.tpl');
                }
                if(isset($item['first_page']) && isset($item['first_url']))
                {
                    $item['first_page'] = Tools::ucfirst($item['first_page']);
                    if($item['id_first_object'] && ($first_title = Ets_tc_session::getTitleMeta($item['id_first_page'],$item['id_first_object'])))
                    {
                        $item['first_page'] .=' - '.$first_title;
                    }
                    $this->smarty->assign(
                        array(
                            'href' => $item['first_url'],
                            'content' => $item['first_page'],
                            'blank' => true,
                        )
                    );
                    $item['first_page'] = $this->display(__FILE__,'a.tpl');
                }
                if(isset($item['last_abandoned_id']) && $item['last_abandoned_id'])
                {
                    $this->smarty->assign(
                        array(
                            'href' => Ets_tc_session::getLinkAdminController('admin_carts_view',array('cartId' => $item['last_abandoned_id'])),
                            'content' => $item['last_abandoned_id'],
                            'blank' => false,
                        )
                    );
                    $item['last_abandoned_id'] = $this->display(__FILE__,'a.tpl');
                }
                if(isset($item['last_action']) && $item['last_action'])
                {
                    $item['last_action'] = isset($actions[$item['last_action']]) ? $actions[$item['last_action']]['title'] :$item['last_action'];
                }
                $resultModified[] = $item;
            }
            $recordCollection = new PrestaShop\PrestaShop\Core\Grid\Record\RecordCollection($resultModified);
            $gridData = new PrestaShop\PrestaShop\Core\Grid\Data\GridData($recordCollection, $data->getRecordsTotal(), $data->getQuery());
            $data = $gridData;
        }
    }
    public function displayTime($time)
    {
        if($time > 0)
        {
            if($time>3600)
            {
                $hours = Tools::ps_round($time/3600,2);
                return $this->displayText($hours.' '.($hours <= 1 ? $this->l('Hour') : $this->l('Hours')),'span','ets_tc_hours');
            }
            elseif($time>60)
            {
                $minute = (int)($time/60);
                return $this->displayText($minute .' '.($minute <= 1 ? $this->l('Minute') : $this->l('Minutes')),'span','ets_tc_minutes');
            }
            else
            {
                return $this->displayText((int)$time.' '.($time <=1 ? $this->l('Second') : $this->l('Seconds')),'span','ets_tc_seconds');
            }
        }
        return '--';
            
    }
    public function hookActionCustomerGridDefinitionModifier($params)
    {   
        $defination = &$params['definition'];
        $gridActions = $defination->getGridActions();
        $gridActions->add(
                (new PrestaShop\PrestaShop\Core\Grid\Action\Type\LinkGridAction('customlist'))
                    ->setName($this->l('Customize customer list'))
                    ->setIcon('storage')
                    ->setOptions([
                        'route' => 'admin_customers_storage',
                    ])
        );
        $defination->setGridActions($gridActions);
        if(Module::isEnabled('ets_free_downloads'))
        {
            $bulkActions = $defination->getBulkActions();
            $bulkActions->add((new PrestaShop\PrestaShop\Core\Grid\Action\Bulk\Type\SubmitBulkAction('verify_selected'))
                ->setName($this->l('Verify selected'))
                ->setOptions([
                    'submit_route' => 'admin_customers_bulk_verify',
                ]) 
            );
            $bulkActions->add((new PrestaShop\PrestaShop\Core\Grid\Action\Bulk\Type\SubmitBulkAction('unverify_selected'))
                ->setName($this->l('Unverify selected'))
                ->setOptions([
                    'submit_route' => 'admin_customers_bulk_unverify',
                ]) 
            );
        }
        $filters = new PrestaShop\PrestaShop\Core\Grid\Filter\FilterCollection();
        
        $columns = (new PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection())->add(
                (new PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\BulkActionColumn('customers_bulk'))
                    ->setOptions([
                        'bulk_field' => 'id_customer',
                    ])
        );
        $fields = $this->getFieldsListCustomer();
        if($fields)
        {
            foreach($fields as $field)
            {
                if($field=='id_customer')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('id_customer', Symfony\Component\Form\Extension\Core\Type\NumberType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search for customer ID'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('id_customer')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('id_customer'))
                        ->setName($this->l('ID'))
                        ->setOptions([
                            'field' => 'id_customer',
                        ])
                    );
                }
                elseif($field=='social_title')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('social_title'))
                        ->setName($this->l('Social title'))
                        ->setOptions([
                            'field' => 'social_title',
                        ])
                    );
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('social_title', Symfony\Component\Form\Extension\Core\Type\ChoiceType::class))
                        ->setTypeOptions([
                            'choices' => array(
                                'Mr.' => 1,
                                'Mrs.' => 2,
                            ),
                            'expanded' => false,
                            'multiple' => false,
                            'required' => false,
                            'choice_translation_domain' => false,
                        ])
                        ->setAssociatedColumn('social_title')
                    );
                }
                elseif($field=='firstname')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('firstname', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search first name'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('firstname')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('firstname'))
                        ->setName($this->l('First name'))
                        ->setOptions([
                            'field' => 'firstname',
                        ])
                    );
                }
                elseif($field=='lastname')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('lastname', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search last name'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('lastname')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('lastname'))
                        ->setName($this->l('Last name'))
                        ->setOptions([
                            'field' => 'lastname',
                        ])
                    );
                }
                elseif($field=='email')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('email', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->trans('Search email', [], 'Admin.Actions'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('email')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('email'))
                        ->setName($this->l('Email address'))
                        ->setOptions([
                            'field' => 'email',
                        ])
                    );
                }
                elseif($field=='total_spent')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\BadgeColumn('total_spent'))
                        ->setName($this->l('Total sales'))
                        ->setOptions([
                            'field' => 'total_spent',
                            'empty_value' => '--',
                        ])
                    );
                }
                elseif($field=='total_purchased_products')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('total_purchased_products'))
                        ->setName($this->l('Total purchased products'))
                        ->setOptions([
                            'field' => 'total_purchased_products',
                        ])
                    );
                }
                elseif($field=='last_purchased_products')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('id_last_order'))
                        ->setName($this->l('Last purchased products'))
                        ->setOptions([
                            'field' => 'id_last_order',
                        ])
                    );
                }
                elseif($field=='shop_domain' && Module::isEnabled('ets_shoplicense'))
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('id_last_order_domain'))
                        ->setName($this->l('Shop domain'))
                        ->setOptions([
                            'field' => 'id_last_order_domain',
                        ])
                    );
                }
                elseif($field=='last_abandoned_id')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('last_abandoned_id'))
                        ->setName($this->l('Last abandoned cart ID'))
                        ->setOptions([
                            'field' => 'last_abandoned_id',
                        ])
                    );
                }
                elseif($field=='active')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('active', PrestaShopBundle\Form\Admin\Type\YesAndNoChoiceType::class))
                        ->setAssociatedColumn('active')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ToggleColumn('active'))
                        ->setName($this->l('Enabled'))
                        ->setOptions([
                            'field' => 'active',
                            'primary_field' => 'id_customer',
                            'route' => 'admin_customers_toggle_status',
                            'route_param_name' => 'customerId',
                        ])
                    );
                }
                elseif($field=='newsletter')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('newsletter', PrestaShopBundle\Form\Admin\Type\YesAndNoChoiceType::class))
                        ->setAssociatedColumn('newsletter')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ToggleColumn('newsletter'))
                        ->setName($this->l('Newsletter'))
                        ->setOptions([
                            'field' => 'newsletter',
                            'primary_field' => 'id_customer',
                            'route' => 'admin_customers_toggle_newsletter_subscription',
                            'route_param_name' => 'customerId',
                        ])
                    );
                }
                elseif($field=='optin')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('optin', PrestaShopBundle\Form\Admin\Type\YesAndNoChoiceType::class))
                        ->setAssociatedColumn('optin')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ToggleColumn('optin'))
                        ->setName($this->l('Partner offers'))
                        ->setOptions([
                            'field' => 'optin',
                            'primary_field' => 'id_customer',
                            'route' => 'admin_customers_toggle_partner_offer_subscription',
                            'route_param_name' => 'customerId',
                        ])
                    );
                }
                elseif($field=='verified' && Module::isEnabled('ets_free_downloads'))
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('is_verified', PrestaShopBundle\Form\Admin\Type\YesAndNoChoiceType::class))
                        ->setAssociatedColumn('is_verified')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('is_verified'))
                        ->setName($this->l('Verified'))
                        ->setOptions([
                            'field' => 'is_verified',
                        ])
                    );
                }
                elseif($field =='last_free_download' && Module::isEnabled('ets_free_downloads'))
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('last_free_download'))
                        ->setName($this->l('Last free download item'))
                        ->setOptions([
                            'field' => 'last_free_download',
                        ])
                    );
                }
                elseif($field=='date_add')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('date_add', PrestaShopBundle\Form\Admin\Type\DateRangeType::class))
                        ->setTypeOptions([
                            'required' => false,
                        ])
                        ->setAssociatedColumn('date_add')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('date_add'))
                        ->setName($this->l('Registration time'))
                        ->setOptions([
                            'field' => 'date_add',
                        ])
                    );
                }
                elseif($field=='lats_visit')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('connect'))
                        ->setName($this->l('Last visit'))
                        ->setOptions([
                            'field' => 'connect',
                        ])
                    );
                }
                elseif($field=='lang_name')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('lang_name', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search languages'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('lang_name')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('lang_name'))
                        ->setName($this->l('Languages'))
                        ->setOptions([
                            'field' => 'lang_name',
                        ])
                    );
                }
                elseif($field=='country_name')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('country_name'))
                        ->setName($this->l('Country'))
                        ->setOptions([
                            'field' => 'country_name',
                            'sortable'=>false,
                        ])
                    );
                }
                elseif($field =='id_ticket')
                {
                    if(Module::isEnabled('ets_helpdesk'))
                    {
                        $columns->add(
                            (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('id_ets_hd_ticket'))
                            ->setName($this->l('Open ticket ID from Helpdesk system'))
                            ->setOptions([
                                'field' => 'id_ets_hd_ticket',
                            ])
                        );
                    }
                    if(Module::isEnabled('ets_livechat'))
                    {
                        $columns->add(
                            (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('id_message'))
                            ->setName($this->l('Open ticket ID from Live chat system'))
                            ->setOptions([
                                'field' => 'id_message',
                            ])
                        );
                    }
                }
                elseif($field=='source')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('source', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search source'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('source')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('source'))
                        ->setName($this->l('Source site'))
                        ->setOptions([
                            'field' => 'source',
                        ])
                    );
                }
                elseif($field=='first_visit_page')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('first_page', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search first visit page'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('first_page')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('first_page'))
                        ->setName($this->l('First visit page'))
                        ->setOptions([
                            'field' => 'first_page',
                        ])
                    );
                }
                elseif($field=='duration')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('duration'))
                        ->setName($this->l('Duration'))
                        ->setOptions([
                            'field' => 'duration',
                        ])
                    );
                }
                elseif($field=='total_viewed_page')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('total_page_visit', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search total viewed pages'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('total_page_visit')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('total_page_visit'))
                        ->setName($this->l('Total viewed pages'))
                        ->setOptions([
                            'field' => 'total_page_visit',
                        ])
                    );
                }
                elseif($field=='last_action')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('last_action', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search last action'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('last_action')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('last_action'))
                        ->setName($this->l('Last action'))
                        ->setOptions([
                            'field' => 'last_action',
                        ])
                    );
                }
                elseif($field=='exit_page')
                {
                    $filters->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('exit_page', Symfony\Component\Form\Extension\Core\Type\TextType::class))
                        ->setTypeOptions([
                            'attr' => [
                                'placeholder' => $this->l('Search exit page'),
                            ],
                            'required' => false,
                        ])
                        ->setAssociatedColumn('exit_page')
                    );
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('exit_page'))
                        ->setName($this->l('Exit page'))
                        ->setOptions([
                            'field' => 'exit_page',
                        ])
                    );
                }
                elseif($field=='age')
                {
                    $columns->add(
                        (new PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn('age'))
                        ->setName($this->l('Age'))
                        ->setOptions([
                            'field' => 'age',
                        ])
                    );
                }
            }
        }
        $filters->add(
            (new PrestaShop\PrestaShop\Core\Grid\Filter\Filter('actions', PrestaShopBundle\Form\Admin\Type\SearchAndResetType::class))
            ->setTypeOptions([
                'reset_route' => 'admin_common_reset_search_by_filter_id',
                'reset_route_params' => [
                    'filterId' => 'customer',
                ],
                'redirect_route' => 'admin_customers_index',
            ])
            ->setAssociatedColumn('actions')
        );
        $actions = (new PrestaShop\PrestaShop\Core\Grid\Action\Row\RowActionCollection())
                        ->add(
                            (new PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction('edit'))
                            ->setName($this->trans('Edit', [], 'Admin.Actions'))
                            ->setIcon('edit')
                            ->setOptions([
                                'route' => 'admin_customers_edit',
                                'route_param_name' => 'customerId',
                                'route_param_field' => 'id_customer',
                            ])
                        )
                        ->add(
                            (new PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction('view'))
                            ->setName($this->trans('View', [], 'Admin.Actions'))
                            ->setIcon('fa-search-plus')
                            ->setOptions([
                                'route' => 'admin_customers_view',
                                'route_param_name' => 'customerId',
                                'route_param_field' => 'id_customer',
                            ])
                        )
                        ->add((new PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\Customer\DeleteCustomerRowAction('delete'))
                            ->setName($this->trans('Delete', [], 'Admin.Actions'))
                            ->setIcon('delete')
                            ->setOptions([
                                'customer_id_field' => 'id_customer',
                                'customer_delete_route' => 'admin_customers_delete',
                            ])
                        )
                        ->add((new PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction('restore'))
                            ->setName($this->l('Customer sessions'))
                            ->setIcon('fa fa-file-o')
                            ->setOptions([
                                'route' => 'admin_customers_activities',
                                'route_param_name' => 'customerId',
                                'route_param_field' =>'id_customer',
                            ])
                        );
        if(Module::isEnabled('ets_ordermanager'))
        {
            $actions->add((new PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction('login_as_customer'))
                            ->setName($this->l('Login as customer'))
                            ->setIcon('fa fa-user')
                            ->setOptions([
                                'route' => 'admin_customers_login_as_customer',
                                'route_param_name' => 'customerId',
                                'route_param_field' =>'id_customer',
                            ])
                        );
        }
        if(Module::isEnabled('ets_livechat'))
        {
            $actions->add((new PrestaShop\PrestaShop\Core\Grid\Action\Row\Type\LinkRowAction('create_ticket_as_customer'))
                            ->setName($this->l('Create ticket'))
                            ->setIcon('fa fa-ticket')
                            ->setOptions([
                                'route' => 'admin_customers_create_ticket_as_customer',
                                'route_param_name' => 'customerId',
                                'route_param_field' =>'id_customer',
                            ])
                        );
        }
        $columns->add((new PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ActionColumn('actions'))
                ->setName($this->trans('Actions', [], 'Admin.Global'))
                ->setOptions([
                    'actions' => $actions,
                ])
            );
        $defination->setColumns($columns);
        $defination->setFilters($filters);
    }
    public function getFieldsListCustomer()
    {
        if (Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER')) {
            $list_fields = explode(',', Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER'));
        } else
            $list_fields = $this->list_customer_default;
        $id_view_selected = (int)Ets_tc_view::getViewByIdEmployee($this->context->employee->id);
        if($id_view_selected && ($viewObj = new Ets_tc_view($id_view_selected)) && Validate::isLoadedObject($viewObj))
            $list_fields = explode(',',$viewObj->fields);
        return $list_fields;
    }
    public function getTitleFields()
    {
        $fields =  array(
            'id_customer' => array(
                'title' => $this->l('ID'),
                'group' => $this->l('Customer info'),
                'beggin' => true,
                'all' => true,
            ),
            'social_title' => array(
                'title' => $this->l('Social title'),
            ),
            'firstname' => array(
                'title' => $this->l('First name'),
            ),
            'lastname' => array(
                'title' => $this->l('Last name'),
            ),
            'email' => array(
                'title' => $this->l('Email address'),
            ),
            'active' => array(
                'title' => $this->l('Enabled'),
            ),
            'lang_name' => array(
                'title' => $this->l('Language'),
            ),
            'country_name' => array(
                'title' => $this->l('Country'),
            ),
            'date_add' => array(
                'title' => $this->l('Registration date'),
            ),
            'verified' => array(
                'title' => $this->l('Verified'),
            ),
            'age'=> array(
                'title' => $this->l('Age'),
                'end'=>true,
            ),
            'newsletter' => array(
                'title' => $this->l('Newsletter'),
                'group' => $this->l('Marketing'),
                'beggin' => true,
                'all' => true,
            ),
            'optin' => array(
                'title' => $this->l('Partner offers'),
                'end' => true,
            ),
            'total_spent' => array(
                'title' => $this->l('Total sales'),
                'group' => $this->l('Sales'),
                'beggin' => true,
                'all' => true,
            ), 
            'total_purchased_products' => array(
                'title' => $this->l('Total purchased products'),
            ),
            'last_abandoned_id' => array(
                'title' => $this->l('Last abandoned cart ID'),
            ),
            'last_purchased_products' => array(
                'title' => $this->l('Last purchased products'),
                'end' => true
            ),
            'source' => array(
                'title' => $this->l('Source site'),
                'group' => $this->l('Last activity'),
                'beggin' => true,
                'all' => true,
            ),
            'first_visit_page' => array(
                'title' => $this->l('First visit page'),
            ),
            'duration' => array(
                'title' => $this->l('Duration'),
            ),
            'total_viewed_page' => array(
                'title' => $this->l('Total viewed pages'),
            ),
            'last_action' => array(
                'title' => $this->l('Last action'),
            ),
            'exit_page' => array(
                'title' => $this->l('Exit page'),
            ),
            'lats_visit' => array(
                'title' => $this->l('Last visit date'),
                'end'=> true,
            ),
            'id_ticket' => array(
                'title' => $this->l('Open ticket ID'),
                'group' => $this->l('Others'),
                'beggin' => true,
                'all' => Module::isEnabled('ets_free_downloads') || Module::isEnabled('ets_shoplicense'),
                'end' => !Module::isEnabled('ets_shoplicense') && !Module::isEnabled('ets_free_downloads') ? true : false,
            ),
            'last_free_download' => array(
                'title' => $this->l('Last free download'),
                'group' => !Module::isEnabled('ets_livechat') && !Module::isEnabled('ets_helpdesk') ? $this->l('Others') :'',
                'beggin' => !Module::isEnabled('ets_livechat') && !Module::isEnabled('ets_helpdesk') ? true : false,
                'all' => !Module::isEnabled('ets_livechat') && !Module::isEnabled('ets_helpdesk') && Module::isEnabled('ets_shoplicense') ? true : false,
                'end' => !Module::isEnabled('ets_shoplicense') ? true : false,
            ),
            'shop_domain' => array(
                'title' => $this->l('Shop domain'),
                'group' => !Module::isEnabled('ets_livechat') && !Module::isEnabled('ets_helpdesk') && !Module::isEnabled('ets_free_downloads') ? $this->l('Others') :'',
                'beggin' => !Module::isEnabled('ets_livechat') && !Module::isEnabled('ets_helpdesk') && !Module::isEnabled('ets_free_downloads') ? true : false,
                'end' => true,
            ),
        );
        if(!Module::isEnabled('ets_free_downloads'))
        {
            unset($fields['last_free_download']);
            unset($fields['verified']);
        }
        if(!Module::isEnabled('ets_shoplicense'))
        {
            unset($fields['shop_domain']);
        }
        if(!Module::isEnabled('ets_livechat ') && !Module::isEnabled('ets_helpdesk'))
            unset($fields['id_ticket']);
        return $fields;
    }
    public function getFormArrangeCustomer()
    {
        if (Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER')) {
            $list_fields = explode(',', Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER'));
        } else
            $list_fields = $this->list_customer_default;
        $view = array(
            array(
                'id_ets_tc_view' => 0,
                'fields' => implode(',',$list_fields),
                'name' => $this->l('--'),
            ),
        );
        $list_views = Ets_tc_view::getListViews();
        $list_views = array_merge($view,$list_views);
        $id_view_selected = (int)Ets_tc_view::getViewByIdEmployee($this->context->employee->id);
        if($id_view_selected && ($viewObj = new Ets_tc_view($id_view_selected)) && Validate::isLoadedObject($viewObj))
            $list_fields = explode(',',$viewObj->fields);
        $this->context->smarty->assign(
            array(
                'list_fields' => $list_fields,
                'title_fields' => $this->getTitleFields(),
                'list_views' => $list_views,
                'id_view_selected'=>$id_view_selected
            )
        );
        $display = $this->display(__FILE__, 'form_arrange.tpl');
        if (Tools::isSubmit('ajax')) {
            die(
                json_encode(
                    array(
                        'block_html' => $display,
                    )
                )
            );
        }
        return $display;
    }
    public function _postCustomer()
    {
        if (Tools::isSubmit('btnSubmitArrangeListCustomer')) {
            $listFieldCustomers =  Tools::getValue('listFieldCustomers');
            $id_view_selected = (int)Tools::getValue('id_view_selected');
            $errors ='';
            if(!$listFieldCustomers)
            {
                $errors = $this->l('Custom column is required');
            }
            elseif(!is_array($listFieldCustomers) || !self::validateArray($listFieldCustomers))
                $errors = $this->l('Custom column is not valid');
            if($errors)
            {
                die(json_encode(
                    array(
                        'errors'=> $errors,
                    )
                ));
            }
            else
            {
                Ets_tc_view::updateView($id_view_selected,$listFieldCustomers);
                die(json_encode(
                    array(
                        'success'=> $this->l('Updated successfully'),
                    )
                ));
            }
        }
        if (Tools::isSubmit('btnSubmitRessetToDefaultListCustomer'))
        {
            Ets_tc_view::updateView(0,'');
            die(json_encode(
                array(
                    'success'=> $this->l('Reset to default successfully'),
                )
            ));
        }
        if(Tools::isSubmit('submitChangeView'))
        {
            $id_view_selected = (int)Tools::getValue('id_view_selected');
            if(Ets_tc_view::submitChangeView($id_view_selected))
            {
                die(json_encode(
                    array(
                        'success'=> $this->l('Changed view successfully'),
                    )
                ));
            }
        }
        if(Tools::isSubmit('btnSubmitSaveView') || Tools::isSubmit('btnSubmitSaveAsView'))
        {
            $errors = '';
            $listFieldCustomers = Tools::getValue('listFieldCustomers');
            $name = Tools::getValue('view_name');
            $id_view = (int)Tools::getValue('id_view_selected');
            if(!$name)
                $errors = $this->l('Name is required');
            elseif(!Validate::isCleanHtml($name))
                $errors = $this->l('Name is not valid');
            elseif(Ets_tc_view::checkExistName($name, Tools::isSubmit('btnSubmitSaveView') ? $id_view :0))
                $errors = $this->l('Name already exists');
            elseif(!$listFieldCustomers)
            {
                $errors = $this->l('Custom column is required');
            }
            elseif(!is_array($listFieldCustomers) || !self::validateArray($listFieldCustomers))
                $errors = $this->l('Custom column is not valid');
            if(!$errors)
            {
                if(Tools::isSubmit('btnSubmitSaveAsView') || !$id_view)
                    $viewOjb = new Ets_tc_view();
                else
                    $viewOjb = new Ets_tc_view($id_view);
                $viewOjb->name = $name;
                $viewOjb->fields = implode(',', array_map('pSQL',$listFieldCustomers));
                $success ='';
                if($viewOjb->id)
                {
                    if($viewOjb->update())
                        $success = $this->l('Updated view successfully');
                    else
                        $errors = $this->l('An error occurred while saving the view');
                        
                }elseif($viewOjb->add())
                    $success = $this->l('Added view successfully');
                else
                    $errors = $this->l('An error occurred while saving the view');
                if($success)
                {
                    if($viewOjb->id!=$id_view)
                    {
                        if (Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER')) {
                            $list_fields = explode(',', Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER'));
                        } else
                            $list_fields = $this->list_customer_default;
                        $view = array(
                            array(
                                'id_ets_tc_view' => 0,
                                'fields' => implode(',',$list_fields),
                                'name' => $this->l('--'),
                            ),
                        );
                        $list_views = Ets_tc_view::getListViews();
                        $list_views = array_merge($view,$list_views);
                        Ets_tc_view::updateView($viewOjb->id,$listFieldCustomers);
                        $this->context->smarty->assign(
                            array(
                                'list_views' =>$list_views,
                                'id_view_selected' => $viewOjb->id,
                            )
                        );
                    }
                    Ets_tc_view::updateView($viewOjb->id,$listFieldCustomers);
                    die(json_encode(
                        array(
                            'success'=> $success,
                            'id_view_selected' => $viewOjb->id,
                            'list_sellect_view' => $viewOjb->id!=$id_view ? $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->name.'/views/templates/hook/select_view.tpl'):''
                        )
                    ));
                }
            }
            if($errors)
            {
                die(json_encode(
                    array(
                        'errors'=> $errors,
                    )
                ));
            }
        }
        if(Tools::isSubmit('btnSubmitDeleteView') && ($id_view_selected = (int)Tools::getValue('id_view_selected')))
        {
            $viewOjb = new Ets_tc_view($id_view_selected);
            $errors ='';
            if($viewOjb->delete())
            {
                if (Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER')) {
                    $list_fields = explode(',', Configuration::get('ETS_TC_ARRANGE_LIST_CUSTOMER'));
                } else
                    $list_fields = $this->list_customer_default;
                $view = array(
                    array(
                        'id_ets_tc_view' => 0,
                        'fields' => implode(',',$list_fields),
                        'name' => $this->l('--'),
                    ),
                );
                $list_views = Ets_tc_view::getListViews();
                $list_views = array_merge($view,$list_views);
                $this->context->smarty->assign(
                    array(
                        'list_views' =>$list_views,
                        'id_view_selected' => 0,
                    )
                );
                die(
                    json_encode(
                        array(
                            'success'=> $this->l('Deleted successfully'),
                            'list_sellect_view' => $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->name.'/views/templates/hook/select_view.tpl'),
                        )
                    )
                );
            }
            else
                $errors = $this->l('An error occurred while deleting');
            if($errors)
            {
                die(json_encode(
                    array(
                        'errors'=> $errors,
                    )
                ));
            }
        }
    }
    public function printOrderProducts($id_order, $tr,$no_html=false)
    {
        if(!$id_order)
            $id_order = (int)$tr['id_last_order'];
        $products = Db::getInstance()->executeS('SELECT product_name,product_id,product_attribute_id,sum(product_quantity) as product_quantity FROM `'._DB_PREFIX_.'order_detail` WHERE id_order='.(int)$id_order.' GROUP BY product_id,product_attribute_id ORDER BY id_order_detail ASC' );
        if($products)
        {
            foreach($products as &$product)
            {
                $product['image'] = Ets_tc_session::getProductImage($product['product_id']);
            }
            $this->context->smarty->assign(
                array(
                    'products' => $products,
                    'tr' => $tr,
                    'no_html'=>$no_html,
                    'link'=> $this->context->link,
                )
            );
            return $this->display(__FILE__,'images.tpl');
        }
        return '--';
    }
    public function printShopDomains($id_order, $tr)
    {
        if(!$id_order)
            $id_order = (int)$tr['id_last_order_domain'];
        if(Module::isInstalled('ph_mydownloads'))
        {
            $domains = Db::getInstance()->executeS('SELECT p.shop_name,.p.transferred_status,c.firstname,c.lastname FROM `'._DB_PREFIX_.'ets_sl_order_product` p
            LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.id_customer = p.id_customer_transferred)
            WHERE p.id_order='.(int)$id_order);
            if($domains)
            {
                foreach($domains as &$domain)
                {
                    if($domain['transferred_status'] && $domain['firstname'])
                        $domain['transferredTo'] = Tools::ucfirst(Tools::substr($domain['firstname'], 0, 1)).'.'.$domain['lastname'];
                }
            }
        }
        else
            $domains = Db::getInstance()->executeS('SELECT shop_name FROM `'._DB_PREFIX_.'ets_sl_order_product` WHERE id_order='.(int)$id_order);
        if($domains)
        {
            $this->smarty->assign(
                array(
                    'domains' => $domains,
                )
            );
            return $this->display(__FILE__,'domains.tpl');
        }
        else
            return '--';
    }
    public function getListActions()
    {
        return array(
            'add_cart' => array(
                'title' => $this->l('Add cart'),
                'active' => 'add_cart',
            ),
            'add_discount' => array(
                'title' => $this->l('Add discount code'),
                'active' => 'add_discount',
            ),
            'add_ticket_hd' => array(
                'title' => $this->l('Add ticket (Helpdesk system)'),
                'active' => 'add_ticket_hd',
            ),
            'add_ticket' => array(
                'title' => $this->l('Add ticket (Live chat system)'),
                'active' => 'add_ticket',
            ),
            'add_comment_blog' => array(
                'title' => $this->l('Add blog post comment'),
                'active' => 'add_comment_blog',
            ),
            'add_comment_product' => array(
                'title' => $this->l('Write product review'),
                'active' => 'add_comment_product',
            ),
            'add_question_comment'=> array(
                'title' => $this->l('Ask product question'),
                'active' => 'add_question_comment',
            ),
            'create' =>array(
                'title' =>$this->l('Create account'),
                'active' => 'create',
            ), 
            'create_guest'=> array(
                'title' =>$this->l('Create guest account'),
                'active' => 'create_guest',
            ), 
            'create_order' =>array(
                'title' => $this->l('Create order'),
                'active' => 'create_order',
            ),
            'create_order_guest' =>array(
                'title' => $this->l('Create order (Guest order)'),
                'active' => 'create_order_guest',
            ),
            'download_attachment' => array(
                'title' =>  $this->l('Download attachment'),
                'active' => 'download_attachment',
            ),
            'download_document' => array(
                'title' =>  $this->l('Download document'),
                'active' => 'download_document',
            ),
            'download_product' =>array(
                'title' =>  $this->l('Download free module'),
                'active' => 'download_product',
            ),
            'download_module' => array(
                'title' =>  $this->l('Download module'),
                'active' => 'download_module',
            ),
            'delete_product' =>array(
                'title' =>  $this->l('Delete product in cart'),
                'active' => 'delete_product',
            ),
            'reduce_quantity' => array(
                'title' =>  $this->l('Reduce product quantity'),
                'active' => 'reduce_quantity',
            ),
            'login' =>array(
                'title' =>   $this->l('Log in'),
                'active' => 'login',
            ),
            'logout' => array(
                'title' =>   $this->l('Log out'),
                'active' => 'logout',
            ),
            'visit_page' => array(
                'title' =>   $this->l('Visit page'),
                'active' => 'visit_page',
            ),
            'view_demo' => array(
                'title' =>   $this->l('View demo'),
                'active' => 'view_demo',
            ),
            'view_image' => array(
                'title' =>   $this->l('View product image'),
                'active' => 'view_image',
            ),
        );
    }
    public function getSelectActions($select = true){
        if(Tools::isSubmit('customer') && ($submit_customer = Tools::getValue('customer')) && self::validateArray($submit_customer) && isset($submit_customer['filters']) && ($submit_filters = $submit_customer['filters']) )
        {
            if(isset($submit_filters['last_action']) && $submit_filters['last_action'])
            {
                $this->smarty->assign(
                    array(
                        'last_action_selected' => $submit_filters['last_action'],
                    )
                );
            }
        }
        $actions = $this->getListActions();
        if(!Module::isEnabled('ets_helpdesk'))
            unset($actions['add_ticket_hd']);
        if(!Module::isEnabled('ets_livechat'))
            unset($actions['add_ticket']);
        if(!Module::isEnabled('ybc_blog'))
            unset($actions['add_comment_blog']);
        if(!Module::isEnabled('productcomments') && !Module::isEnabled('ets_reviews'))
            unset($actions['add_comment_product']);
        if(!Module::isEnabled('ets_reviews'))
            unset($actions['add_question_comment']);
        if(!Module::isEnabled('ets_customfields'))
            unset($actions['download_document']);
        if(!Module::isEnabled('ets_free_downloads'))
            unset($actions['download_product']);
        if(!Module::isEnabled('ph_mydownloads'))
            unset($actions['download_module']);
        $this->smarty->assign(
            array(
                'actions' => $actions,
                'select'=>$select,
            )
        );
        return $this->display(__FILE__,'filter_last_actions.tpl');
    }
    public function displayText($content=null,$tag=null,$class=null,$id=null,$href=null,$blank=false,$src = null,$name = null,$value = null,$type = null,$data_id_product = null,$rel = null,$attr_datas=null)
    {
        $this->smarty->assign(
            array(
                'content' =>$content,
                'tag' => $tag,
                'tag_class'=> $class,
                'tag_id' => $id,
                'href' => $href,
                'blank' => $blank,
                'src' => $src,
                'name' => $name,
                'value' => $value,
                'type' => $type,
                'data_id_product' => $data_id_product,
                'attr_datas' => $attr_datas,
                'rel' => $rel,
            )
        );
        return $this->display(__FILE__,'html.tpl');
    }
    public function renderList($listData)
    { 
        if(isset($listData['fields_list']) && $listData['fields_list'])
        {
            foreach($listData['fields_list'] as $key => &$val)
            {
                $value_key = (string)Tools::getValue($key);
                $value_key_max = (string)Tools::getValue($key.'_max');
                $value_key_min = (string)Tools::getValue($key.'_min');
                if(isset($val['filter']) && $val['filter'] && ($val['type']=='int' || $val['type']=='date'))
                {
                    if(Tools::isSubmit('ets_tc_submit_'.$listData['name']))
                    {
                        $val['active']['max'] =  trim($value_key_max);   
                        $val['active']['min'] =  trim($value_key_min); 
                    }
                    else
                    {
                        $val['active']['max']='';
                        $val['active']['min']='';
                    }  
                }  
                elseif(!Tools::isSubmit('del') && Tools::isSubmit('ets_tc_submit_'.$listData['name']))               
                    $val['active'] = trim($value_key);
                else
                    $val['active']='';
            }
        }  
        if(!isset($listData['class']))
            $listData['class']='';  
        $this->smarty->assign($listData);
        return $this->display(__FILE__, 'list_helper.tpl');
    }
    public function getFilterParams($field_list,$table='')
    {
        $params = '';        
        if($field_list)
        {
            if(Tools::isSubmit('ets_tc_submit_'.$table))
                $params .='&ets_tc_submit_'.$table.='=1';
            foreach($field_list as $key => $val)
            {
                $value_key = (string)Tools::getValue($key);
                $value_key_max = (string)Tools::getValue($key.'_max');
                $value_key_min = (string)Tools::getValue($key.'_min');
                if($value_key!='')
                {
                    $params .= '&'.$key.'='.urlencode($value_key);
                }
                if($value_key_max!='')
                {
                    $params .= '&'.$key.'_max='.urlencode($value_key_max);
                }
                if($value_key_min!='')
                {
                    $params .= '&'.$key.'_min='.urlencode($value_key_min);
                } 
            }
            unset($val);
        }
        return $params;
    }
    public function displayPaggination($limit,$name)
    {
        $this->context->smarty->assign(
            array(
                'limit' => $limit,
                'pageName' => $name,
            )
        );
        return $this->display(__FILE__,'limit.tpl');
    }
    public function checkCreatedColumn($table,$column)
    {
        $fieldsCustomers = Db::getInstance()->ExecuteS('DESCRIBE `'._DB_PREFIX_.pSQL($table).'`');
        $check_add=false;
        foreach($fieldsCustomers as $field)
        {
            if($field['Field']==$column)
            {
                $check_add=true;
                break;
            }    
        }
        return $check_add;
    }
    public static function checkSaveSession()
    {
        if(!Configuration::get('ETS_TC_ONLY_SESSION_REGISTERED'))
            return true;
        else
        {
            $context = Context::getContext();
            if(isset($context->customer) && $context->customer->id && !$context->customer->is_guest)
                return true;
            $cookie = $context->cookie;
            if(isset($cookie->id_ets_tc_session) && $cookie->id_ets_tc_session && ($session = new Ets_tc_session($cookie->id_ets_tc_session)) && Validate::isLoadedObject($session) && $session->id_customer)
                return true;
        }
        return false;
    }
    public function getLinkSessionByIdCart($id_cart)
    {
        $this->smarty->assign(
            array(
                'link_view_session' => $this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&id_cart='.$id_cart,
            )
        );
        return $this->display(__FILE__,'session_by_cart.tpl');
    }
    public function renderListViewedProducts()
    {
        $fields_list = array(
            'customer_name' => array(
                'title' => $this->l('Customer name'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
                'strip_tag' => false,
            ),
            'email' => array(
                'title' => $this->l('Email'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
                'strip_tag' => false,
            ),
            'lang_name' => array(
                'title' => $this->l('Language'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
                'strip_tag' => false,
            ),
            'product_name' => array(
                'title' => $this->l('Product'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
                'strip_tag' => false,
            ),
            'add_cart' => array(
                'title' => $this->l('Add cart'),
                'type' => 'select',
                'sort' => true,
                'filter' => true,
                'filter_list' => array(
                    'id_option' => 'active',
                    'value' => 'title',
                    'list' => array(
                        0 => array(
                            'active' => 0,
                            'title' => $this->l('No')
                        ),
                        1 => array(
                            'active' => 1,
                            'title' => $this->l('Yes')
                        ),
                    )
                ),
                'strip_tag'=> false,
            ),
            'date_add' => array(
                'title' => $this->l('Date add'),
                'width' => 40,
                'type' => 'date',
                'sort' => true,
                'filter' => true,
            ),
        );
        $filter = '';
        $show_resset = false;
        if(($customer_name = Tools::getValue('customer_name'))!='' && Validate::isCleanHtml($customer_name))
        {
            $filter .= ' AND CONCAT(CONCAT(c.firstname," ",c.lastname)) LIKE "%'.pSQL($customer_name).'%" ';
            $show_resset = true;
        }
        if(($email = Tools::getValue('email'))!='' && Validate::isCleanHtml($email))
        {
            $filter .= ' AND c.email LIKE "%'.pSQL($email).'%"';
            $show_resset = true;
        }
        if(($product_name = Tools::getValue('product_name'))!='' && Validate::isCleanHtml($product_name))
        {
            $filter .= ' AND (pl.name LIKE "%'.pSQL($product_name).'%" OR ps.id_product = "'.(int)$product_name.'")';
            $show_resset = true;
        }
        if(($lang_name = Tools::getValue('lang_name'))!='' && Validate::isCleanHtml($lang_name))
        {
            $filter .= ' AND lang.name LIKE "%'.pSQL($lang_name).'%"';
            $show_resset = true;
        }
        if(($add_cart = Tools::getValue('add_cart'))!='' && Validate::isBool($add_cart))
        {
            if($add_cart)
                $filter .= ' AND cart_product.id_cart is not null';
            else
                $filter .= ' AND cart_product.id_cart is null';
            $show_resset = true;
        }
        if(($date_add_min = Tools::getValue('date_add_min')) && Validate::isDate($date_add_min))
        {
            $filter .= ' AND a.date_add >= "'.pSQL($date_add_min).' 00:00:00"';
            $show_resset = true;
        }
        if(($date_add_max = Tools::getValue('date_add_max')) && Validate::isDate($date_add_max))
        {
            $filter .= ' AND a.date_add <= "'.pSQL($date_add_max).' 23:59:59"';
            $show_resset = true;
        }
        $sort = "";
        $sort_type=Tools::getValue('sort_type','desc');
        $sort_value = Tools::getValue('sort','date_add');
        if($sort_value)
        {
            switch ($sort_value) {
                case 'customer_name':
                    $sort .=' customer_name';
                    break;
                case 'email':
                    $sort .=' c.email';
                    break;
                case 'product_name':
                    $sort .=' ps.id_product';
                    break;
                case 'lang_name':
                    $sort .=' lang.name';
                    break;
                case 'add_cart':
                    $sort .=' cart_product.id_cart';
                    break;
                case 'date_add':
                    $sort .=' MAX(a.date_add)';
                    break;
            }
            if($sort && $sort_type && in_array($sort_type,array('asc','desc')))
                $sort .= ' '.$sort_type;
        }
        $page = (int)Tools::getValue('page');
        if($page<=0)
            $page = 1;
        $totalRecords = (int) Ets_tc_session::_getViewedProducts($filter,$sort,0,0,true);
        $paggination = new Ets_tc_paggination_class();
        $paggination->total = $totalRecords;
        $paggination->url = $this->context->link->getAdminLink('AdminModules').'&configure=ets_trackingcustomer&current_tab=products&page=_page_'.$this->getFilterParams($fields_list,'products').($sort_type ? '&sort_type='.($sort_type):'').($sort_value ? '&sort='.($sort_value):'');
        $paggination->limit =  (int)Tools::getValue('paginator_products_select_limit',20);
        $paggination->name ='products';
        $totalPages = ceil($totalRecords / $paggination->limit);
        if($page > $totalPages)
            $page = $totalPages;
        $paggination->page = $page;
        $start = $paggination->limit * ($page - 1);
        if($start < 0)
            $start = 0;
        $products= Ets_tc_session::_getViewedProducts($filter,$sort,$start,$paggination->limit,false);
        if($products)
        {
            foreach($products as &$product)
            {
                if($product['id_cart'])
                    $product['add_cart'] = $this->displayText($this->l('Yes'),'span','status_yes');
                else
                    $product['add_cart'] = $this->displayText($this->l('No'),'span','status_no');
                $link_view = $this->context->link->getAdminLink('AdminTrackingCustomerSession',true).'&current_tab=customer_session&viewSession=1&id_session='.$product['id_ets_tc_session'];
                $product['customer_name'] = $this->displayText($product['customer_name'],'a',null,null,$link_view);
                $product['child_view_url'] = $link_view;
                $link_product = $this->context->link->getProductLink($product['id_product']);
                $product['product_name'] = $this->displayText($product['product_name'],'a',null,null,$link_product,true);
            }
        }
        $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
        $paggination->style_links = $this->l('links');
        $paggination->style_results = $this->l('results');
        $listData = array(
            'name' => 'products',
            'actions' => array('view'),
            'icon' => 'icon-sessions',
            'currentIndex' => $this->context->link->getAdminLink('AdminModules').'&configure=ets_trackingcustomer&current_tab=products'.($paggination->limit!=20 ? '&paginator_products_select_limit='.$paggination->limit:''),
            'postIndex' => $this->context->link->getAdminLink('AdminModules').'&configure=ets_trackingcustomer&current_tab=products',
            'identifier' => 'id',
            'show_toolbar' => true,
            'show_action' => true,
            'title' => $this->l('Products viewed'),
            'fields_list' => $fields_list,
            'field_values' => $products,
            'paggination' => $paggination->render(),
            'filter_params' => $this->getFilterParams($fields_list,'products'),
            'show_reset' =>$show_resset,
            'show_export' => true,
            'totalRecords' => $totalRecords,
            'sort'=> $sort_value,
            'sort_type' => $sort_type,
            'show_bulk_action' => false,
        );
        return  $this->renderList($listData);
    }
    public function actionExportProductsViewed()
    {
        $filter = '';
        if(($customer_name = Tools::getValue('customer_name'))!='' && Validate::isCleanHtml($customer_name))
        {
            $filter .= ' AND CONCAT(CONCAT(c.firstname," ",c.lastname)) LIKE "%'.pSQL($customer_name).'%" ';
        }
        if(($email = Tools::getValue('email'))!='' && Validate::isCleanHtml($email))
        {
            $filter .= ' AND c.email LIKE "%'.pSQL($email).'%"';
        }
        if(($product_name = Tools::getValue('product_name'))!='' && Validate::isCleanHtml($product_name))
        {
            $filter .= ' AND (pl.name LIKE "%'.pSQL($product_name).'%" OR ps.id_product = "'.(int)$product_name.'")';
        }
        if(($lang_name = Tools::getValue('lang_name'))!='' && Validate::isCleanHtml($lang_name))
        {
            $filter .= ' AND lang.name LIKE "%'.pSQL($lang_name).'%"';
        }
        if(($add_cart = Tools::getValue('add_cart'))!='' && Validate::isBool($add_cart))
        {
            if($add_cart)
                $filter .= ' AND cart_product.id_cart is not null';
            else
                $filter .= ' AND cart_product.id_cart is null';
        }
        if(($date_add_min = Tools::getValue('date_add_min')) && Validate::isDate($date_add_min))
        {
            $filter .= ' AND a.date_add >= "'.pSQL($date_add_min).' 00:00:00"';
        }
        if(($date_add_max = Tools::getValue('date_add_max')) && Validate::isDate($date_add_max))
        {
            $filter .= ' AND a.date_add <= "'.pSQL($date_add_max).' 23:59:59"';
        }
        $products= Ets_tc_session::_getViewedProducts($filter,'MAX(a.date_add) desc',0,false,false);
        if ($products) {
            $fname = 'productsviewed_' . date('YmdHis') . '.csv';
            if (!@is_dir(_PS_CACHE_DIR_ . DIRECTORY_SEPARATOR . $this->name)) {
                @mkdir(_PS_CACHE_DIR_ . DIRECTORY_SEPARATOR . $this->name, 0755, true);
            }
            $fpath = _PS_CACHE_DIR_ . DIRECTORY_SEPARATOR . $this->name . DIRECTORY_SEPARATOR . $fname;
            $fhandler = fopen($fpath, 'w');
            fputcsv($fhandler, [
                $this->l('Customer name'),
                $this->l('Email'),
                $this->l('Product'),
                $this->l('Add cart'),
                $this->l('Date add')
            ]);

            foreach ($products as $row) {
                $formattedRow = [
                    isset($row['customer_name']) && $row['customer_name'] ? $row['customer_name'] : $this->l('N/A'),
                    isset($row['email']) && $row['email'] ? $row['email'] : $this->l('N/A'),
                    isset($row['product_name']) && $row['product_name'] ? $row['product_name'] : $this->l('N/A'),
                    isset($row['id_cart']) && $row['id_cart'] ? $this->l('Yes') : $this->l('No'),
                    isset($row['date_add']) && $row['date_add'] ? Tools::displayDate($row['date_add'], true) : $this->l('N/A')
                ];
                fputcsv($fhandler, $formattedRow);
            }
            fclose($fhandler);

            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment;filename="' . $fname . '"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');

            ob_clean();
            flush();

            if (readfile($fpath) && file_exists($fpath)) {
                unlink($fpath);
            }
            exit;
        }
    }
    /**
     * @return bool
     */
    public static function isBotAndIgnored()
    {
        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/botlink|zoombot|linkdexbot|yeti|zeus|webzip|webleacher|webfindbot|webcopier|url_spider_sql|urlresolver|unwindfetchor|twitterbot|technoratisnoop|sitesucker|search|pingdom|netcraftsurveyagent|naverbot|nationaldirectory|majesticseo|m2e|libwww-perl|inktomi|infoseek|idbot|httrack|firefly|froogle|get|girafabot|grabnet|facebot|fetch|find|facebookexternalhit|ezooms|easouspider|duckduckbot|curl|dataprovider|crawler|contaxe|chinaclaw|blackwidow|applebot|crawl|xing|baidu|yandex|duckduckgo|bing|naver|linkedin|pinterest|twitter|facebook|skype|alexa|sogou|geona|ia_archiver|lycos|scrubby|estyle|acoi|accona|aspseek|altavista|abacho|rambler|openstat.ru\/bot|dotbot|addthis|baiduspider|seznambot|mod_pagespeed|ccbot|mj12bot|fatbot|semrushbot|yandexmobilebot|ahrefsbot|bingbot|ahoy|alkalinebot|anthill|appie|arale|araneo|araybot|ariadne|arks|atn_worldwide|atomz|bbot|bjaaland|ukonline|borg-bot\/0\.9|boxseabot|bspider|calif|christcrawler|cmc\/0\.01|combine|confuzzledbot|coolbot|cosmos|internet cruiser robot|cusco|cyberspyder|cydralspider|desertrealm, desert realm|digger|diibot|grabber|downloadexpress|dragonbot|dwcp|ecollector|ebiness|elfinbot|esculapio|esther|fastcrawler|fdse|felix ide|fido|kit-fireball|fouineur|freecrawl|gammaspider|gazz|gcreep|golem|googlebot|griffon|gromit|gulliver|gulper|hambot|havindex|hotwired|htdig|iajabot|ingrid\/0\.1|informant|infospiders|inspectorwww|irobot|iron33|jbot|jcrawler|teoma|jeeves|jobo|image\.kapsi\.net|kdd-explorer|ko_yappo_robot|label-grabber|larbin|legs|linkidator|linkwalker|lockon|logo_gif_crawler|marvin|mattie|mediafox|merzscope|nec-meshexplorer|mindcrawler|moget|motor|msnbot|muncher|muninn|muscatferret|mwdsearch|sharp-info-agent|webmechanic|netscoop|newscan-online|objectssearch|occam|orbsearch\/1\.0|packrat|pageboy|parasite|patric|pegasus|perlcrawler|phpdig|piltdownman|pimptrain|pjspider|plumtreewebaccessor|portalbspider|psbot|getterrobo-plus|raven|rhcs|rixbot|roadrunner|robbie|robi|robocrawl|robofox|scooter|search-au|searchprocess|senrigan|shagseeker|sift|simbot|site valet|skymob|slcrawler\/2\.0|slurp|esi|snooper|solbot|speedy|spider_monkey|spiderbot\/1\.0|spiderline|nil|suke|http:\/\/www\.sygol\.com|tach_bw|techbot|templeton|titin|topiclink|udmsearch|urlck|valkyrie libwww-perl|verticrawl|victoria|void-bot|voyager|vwbot_k|crawlpaper|wapspider|webbandit\/1\.0|webcatcher|t-h-u-n-d-e-r-s-t-o-n-e|webmoose|webquest|webreaper|webs|webspider|webwalker|wget|winona|whowhere|wlm|wolp|wwwc|none|xget|nederland\.zoek|aisearchbot|woriobot|netseer|nutch|yandexbot|google-inspectiontool|storebot|googleother|apis-google|adsbot|mediapartners-google|feedfetcher-google|googleproducer|google-read-aloud|google-site-verification|schema-markup-validator/iu', $_SERVER['HTTP_USER_AGENT'])) {
            return true;
        }

        return false;
    }
}