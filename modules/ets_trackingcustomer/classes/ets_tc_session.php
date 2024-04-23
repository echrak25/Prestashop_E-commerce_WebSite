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
class Ets_tc_session extends ObjectModel
{
    public static $instance;
    public $source;
    public $url_source;
    public $utm_source;
    public $utm_medium; 
    public $browser;
    public $id_first_page;
    public $id_first_object;
    public $duration;
    public $id_exit_page;
    public $id_exit_object;
    public $first_url;
    public $exit_url;
    public $id_customer;
    public $id_guest;
    public $date_exit;
    public $total_page_visit;
    public $last_action;
    public $id_shop;
    public $create_account;
    public $add_cart;
    public $create_order;
    public $date_add;
    public $first_page;
    public $exit_page;
    public static $definition = array(
		'table' => 'ets_tc_session',
		'primary' => 'id_ets_tc_session',
		'multilang' => false,
		'fields' => array(
			'source' => array('type' => self::TYPE_STRING),
            'url_source' => array('type' => self::TYPE_STRING),
            'utm_source' => array('type' => self::TYPE_STRING),
            'utm_medium' => array('type' => self::TYPE_STRING),
            'browser' => array('type' => self::TYPE_STRING),
            'id_first_page' => array('type' => self::TYPE_INT),
            'id_first_object' => array('type' => self::TYPE_INT),
            'first_url' => array('type' => self::TYPE_STRING),
            'id_customer' => array('type' => self::TYPE_INT),
            'id_shop' => array('type' => self::TYPE_INT),
            'create_account' => array('type' => self::TYPE_INT),
            'add_cart' => array('type' => self::TYPE_INT),
            'create_order' => array('type' => self::TYPE_INT),
            'id_guest' => array('type' => self::TYPE_INT),
            'duration' => array('type' => self::TYPE_INT),
            'id_exit_page' => array('type' => self::TYPE_INT),
            'id_exit_object' => array('type' => self::TYPE_INT),
            'exit_url' => array('type' => self::TYPE_STRING),
            'date_exit' => array('type' => self::TYPE_STRING),
            'total_page_visit' => array('type'=> self::TYPE_STRING),
            'last_action' => array('type'=> self::TYPE_STRING),
            'first_page' => array('type' => self::TYPE_STRING),
            'exit_page' => array('type' => self::TYPE_STRING),
            'date_add' => array('type' => self::TYPE_STRING),
            
        )
	);
    public	function __construct($id_item = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_item, $id_lang, $id_shop);
	}
    public static function getInstance()
    {
        if (!(isset(self::$instance)) || !self::$instance) {
            self::$instance = new Ets_tc_session();
        }
        return self::$instance;
    }
    public function l($string,$file_name='')
    {
        return Translate::getModuleTranslation('ets_trackingcustomer', $string, $file_name ? : pathinfo(__FILE__, PATHINFO_FILENAME));
    }
    public function delete()
    {
        if(parent::delete())
        {
            return Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session='.(int)$this->id);
        }
    }
    public static function deleteSessionExpired()
    {
        $ETS_TC_STORAGE_LIMIT_SESSION = (int)Configuration::get('ETS_TC_STORAGE_LIMIT_SESSION');
        if($ETS_TC_STORAGE_LIMIT_SESSION && (int)Context::getContext()->customer->id && ($count_session = self::checkCustomerMultiSession(0,(int)Context::getContext()->customer->id)) && ($count_session > $ETS_TC_STORAGE_LIMIT_SESSION))
        {
            $limit = $count_session - $ETS_TC_STORAGE_LIMIT_SESSION;
            $sessions = Db::getInstance()->executeS('SELECT id_ets_tc_session FROM `'._DB_PREFIX_.'ets_tc_session` WHERE id_customer="'.(int)Context::getContext()->customer->id.'" ORDER BY id_ets_tc_session ASC LIMIT 0,'.(int)$limit);
            if($sessions)
            {
                foreach($sessions as $session)
                {
                    $sessionObj = new Ets_tc_session($session['id_ets_tc_session']);
                    $sessionObj->delete();
                }
            }
        }
    }
    public static function deleteSession($type){
        $sql ='SELECT id_ets_tc_session FROM `'._DB_PREFIX_.'ets_tc_session` WHERE id_shop="'.(int)Context::getContext()->shop->id.'"';
        if($type=='1_week_ago')
            $sql .=' AND date_add <= "'.pSQL(date('Y-m-d H:i:s',strtotime('-1 week'))).'"';
        elseif($type=='1_month_ago')
            $sql .=' AND date_add <= "'.pSQL(date('Y-m-d H:i:s',strtotime('-1 month'))).'"';
        elseif($type=='6_months_ago')
            $sql .=' AND date_add <= "'.pSQL(date('Y-m-d H:i:s',strtotime('-6 months'))).'"';
        elseif($type=='1_year_ago')
            $sql .=' AND date_add <= "'.pSQL(date('Y-m-d H:i:s',strtotime('-1 year'))).'"';
        $sessions = Db::getInstance()->executeS($sql);
        if($sessions)
        {
            foreach($sessions as $session)
            {
                $sessionObj = new Ets_tc_session($session['id_ets_tc_session']);
                $sessionObj->delete();
            }
        }
        return true;
    }
    public static function deleteActionExpired($id_session)
    {
        $ETS_TC_STORAGE_LIMIT_ACTION = (int)Configuration::get('ETS_TC_STORAGE_LIMIT_ACTION');
        if($ETS_TC_STORAGE_LIMIT_ACTION && ($count_action = Db::getInstance()->getValue('SELECT COUNT(*) FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session='.(int)$id_session)) && pSQL($count_action) > $ETS_TC_STORAGE_LIMIT_ACTION)
        {
            $limit = $count_action- $ETS_TC_STORAGE_LIMIT_ACTION;
            $actions = Db::getInstance()->executeS('SELECT date_add FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session="'.(int)$id_session.'" ORDER BY date_add asc LIMIT 0,'.(int)$limit);
            if($actions)
            {
                foreach($actions as $action)
                {
                    Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'ets_tc_action` WHERE date_add="'.pSQL($action['date_add']).'" AND id_ets_tc_session='.(int)$id_session);
                }
            }
        }  
    }
    public static function setTime(){
        $cookie = Context::getContext()->cookie;
        if(isset($cookie->id_ets_tc_session) && $cookie->id_ets_tc_session && ($session = new Ets_tc_session($cookie->id_ets_tc_session))  && Validate::isLoadedObject($session))
        {
            $last_visit = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session="'.(int)$cookie->id_ets_tc_session.'" AND action="visit_page" order by date_add desc');
            if($last_visit)
            {
                $duration = strtotime(date('Y-m-d H:i:s')) - strtotime($last_visit['date_add']);
                Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ets_tc_action` set duration="'.(int)$duration.'", date_exit="'.pSQL(date('Y-m-d H:i:s')).'" WHERE id_ets_tc_session="'.(int)$cookie->id_ets_tc_session.'" AND  date_add="'.pSQL($last_visit['date_add']).'"');
            }
            $session->duration = strtotime(date('Y-m-d H:i:s')) - strtotime($session->date_add);
            $session->date_exit = date('Y-m-d H:i:s');
        }
    }
    public static function setSession($cookie)
    {
        if(Ets_trackingcustomer::isBotAndIgnored())
            return '';
        if(!isset($cookie->id_ets_tc_session) || !$cookie->id_ets_tc_session ||   ($cookie->id_ets_tc_session && ($session = new Ets_tc_session($cookie->id_ets_tc_session)) && (!Validate::isLoadedObject($session) || ((int)Context::getContext()->customer->id && $session->id_customer &&  $session->id_customer!=(int)Context::getContext()->customer->id) || $session->id_shop !=Context::getContext()->shop->id )  ))
        {
            $url_source = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:'';
            if($url_source)
                $source = self::getDomain($url_source);
            else
                $source = '';
            $utm_source = Tools::getValue('utm_source');
            $utm_medium = Tools::getValue('utm_medium');
            $fc = Tools::getValue('fc');
            $controller = Context::getContext()->controller->php_self ? : Tools::getValue('controller');
            $id_first_object = (int)Tools::getValue('id_'.$controller);
            if($controller=='pagenotfound')
                return true;
            $module = Tools::getValue('module');
            if($fc=='module' && Validate::isModuleName($module) && Validate::isControllerName($controller))
            {
                $first_page = $fc.'-'.$module.'-'.$controller;
                if($module=='ybc_blog' && $controller=='blog')
                {
                    $id_first_object = (int)Tools::getValue('id_post');
                    if(!$id_first_object && ($post_url_alias =  Tools::getValue('post_url_alias')) && Validate::isLinkRewrite($post_url_alias))
                    {
                        $id_first_object = (int)Db::getInstance()->getValue('SELECT ps.id_post FROM `'._DB_PREFIX_.'ybc_blog_post_lang` pl ,`'._DB_PREFIX_.'ybc_blog_post_shop` ps  WHERE ps.id_shop="'.(int)Context::getContext()->shop->id.'" AND ps.id_post=pl.id_post AND pl.url_alias ="'.pSQL($post_url_alias).'"');
                    }
                }
                if($module=='ets_livechat' && $controller=='form')
                {
                    $id_first_object = (int)Tools::getValue('id_form');
                    $url_alias = Tools::getValue('url_alias');
                    if (!$id_first_object && Validate::isLinkRewrite($url_alias) && ($form = self::getForm(null, $url_alias)))
                        $id_first_object =(int)$form['id_form'];
                }
                if($module=='ets_collections' && $controller=='collection')
                {
                    $id_first_object =(int)Tools::getValue('id_collection');
                }
            }
            else
                $first_page = $controller;
            $first_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI']:'';
            $id_customer = (int)Context::getContext()->customer->id;
            $id_guest = (int)$cookie->id_guest;
            $session = new Ets_tc_session();
            $session->source = Validate::isCleanHtml($source) ? $source : '';
            $session->url_source = Validate::isCleanHtml($url_source) ? $url_source : '';
            $session->utm_source = Validate::isCleanHtml($utm_source) ? $utm_source :'';
            $session->utm_medium = Validate::isCleanHtml($utm_medium) ? $utm_medium :'';
            $session->id_first_page = (int)self::getMetaByPage($first_page);
            $session->id_first_object = (int)$id_first_object;
            $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
            $meta = new Meta($session->id_first_page,$id_lang_default);
            $session->first_page = ($meta->title ? : $meta->page);
            if(!$session->first_page)
                $session->first_page = $first_page;
            if($session->id_first_object && ($first_title = Ets_tc_session::getTitleMeta($session->id_first_page,$session->id_first_object,$id_lang_default)))
            {
                $session->first_page .=' - '.$first_title;
            }
            $session->first_url = Validate::isCleanHtml($first_url) ? $first_url : '';
            $session->id_customer = $id_customer;
            $session->id_shop = Context::getContext()->shop->id;
            $session->id_guest = $id_guest;
            $session->browser = self::getBrowser();
            if($session->add())
            {
                $cookie->id_ets_tc_session = $session->id;
                self::deleteSessionExpired();
            }
        }
    }
    public static function getBrowser()
    {
        if(isset($_SERVER['HTTP_USER_AGENT']) && ($userAgent = $_SERVER['HTTP_USER_AGENT']))
        {
            if(strpos($userAgent, 'MSIE') !== FALSE)
               return 'Internet explorer';
            elseif(strpos($userAgent, 'Trident') !== FALSE)
                return 'Internet explorer';
            elseif(strpos($userAgent, 'Firefox') !== FALSE)
               return 'Mozilla Firefox';
            elseif(strpos($userAgent, 'Opera Mini') !== FALSE)
               return "Opera Mini";
            elseif(strpos($userAgent, 'Opera') !== FALSE)
               return "Opera";
            elseif(strpos($userAgent, 'OPR/') !== FALSE)
                return "Opera";
            elseif(strpos($userAgent, 'Chrome') !== FALSE)
                return 'Google Chrome';
            elseif(strpos($userAgent, 'Safari') !== FALSE)
               return "Safari";
            else
               return 'Something';
        }
        return 'Something';
    }
    public static function checkAction($id_session,$action)
    {
        return Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_tc_action` WHERE action LIKE "'.pSQL($action).'" AND id_ets_tc_session='.(int)$id_session);
    }
    public static function getMetaByPage($page)
    {
        $id_meta = (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
        		SELECT m.id_meta
        		FROM `' . _DB_PREFIX_ . 'meta` m
        		WHERE (
        			m.page = "' . pSQL($page) . '"
        			OR m.page = "' . pSQL(str_replace('-', '', Tools::strtolower($page))) . '"
        		)');
          if(!$id_meta)
          {
                $meta = new Meta();
                $meta->page = $page;
                $meta->add();
                return $meta->id;
          }
          return $id_meta;
    }
    public static function getDomain($url)
    {

        $parse = parse_url($url);
        if(isset($parse['host']))
            return $parse['host'];
    }
    public static function addAction($action,$id_product=0,$id_cart=0,$id_order=0,$id_ticket=0,$id_product_attribute=0,$quantity=0)
    {
        if(!Ets_trackingcustomer::checkSaveSession() || Ets_trackingcustomer::isBotAndIgnored())
            return '';
        $cookie = Context::getContext()->cookie;
        if(!$id_product)
            $id_product = (int)Tools::getValue('id_product');

        if(isset($cookie->id_ets_tc_session) && $cookie->id_ets_tc_session && ($session = new Ets_tc_session($cookie->id_ets_tc_session)) && Validate::isLoadedObject($session))
        {
            $fc = Tools::getValue('fc');
            $controller = Context::getContext()->controller->php_self ? : Tools::getValue('controller');
            $id_object = (int)Tools::getValue('id_'.$controller);
            $module = Tools::getValue('module');
            
            if($fc=='module' && Validate::isModuleName($module) && Validate::isControllerName($controller))
            {
                $page = $fc.'-'.$module.'-'.$controller;
                if($module=='ybc_blog' && $controller=='blog')
                {
                    $id_object = (int)Tools::getValue('id_post');
                    if(!$id_object && ($post_url_alias =  Tools::getValue('post_url_alias')) && Validate::isLinkRewrite($post_url_alias))
                    {
                        $id_object = (int)Db::getInstance()->getValue('SELECT ps.id_post FROM `'._DB_PREFIX_.'ybc_blog_post_lang` pl ,`'._DB_PREFIX_.'ybc_blog_post_shop` ps  WHERE ps.id_shop="'.(int)Context::getContext()->shop->id.'" AND ps.id_post=pl.id_post AND pl.url_alias ="'.pSQL($post_url_alias).'"');
                    }
                }
                if($module=='ets_livechat' && $controller=='form')
                {
                    $id_object = (int)Tools::getValue('id_form');
                    $url_alias = Tools::getValue('url_alias');
                    if (!$id_object && Validate::isLinkRewrite($url_alias) && ($form = self::getForm(null, $url_alias)))
                        $id_object =(int)$form['id_form'];
                }
                if($module=='ets_collections' && $controller=='collection')
                {
                    $id_object =(int)Tools::getValue('id_collection');
                }
            }
            else
                $page = $controller;
            if($controller=='pagenotfound')
                return true;
            if($controller=='search')
                $search = Tools::getValue('s',Tools::getValue('search_query'));
            else
                $search ='';
            $page_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI']:'';
            $id_page = self::getMetaByPage($page);
            $insert = true;
            $last_visit = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session="'.(int)$cookie->id_ets_tc_session.'" AND action="visit_page" order by date_add desc');
            if($action=='visit_page')
            {
                if($last_visit && $last_visit['id_page'] == $id_page && $last_visit['id_product']== $id_product && $last_visit['page_url']==$page_url)
                {
                    if(!$session->total_page_visit)
                        $session->total_page_visit =1;
                    $insert = false;
                }
                else
                {
                    $session->total_page_visit++;
                }
                $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
                $meta = new Meta($id_page,$id_lang_default);
                $session->id_exit_page = $id_page;
                $session->id_exit_object = $id_object;
                $session->exit_url = $page_url;
                $session->exit_page = ($meta->title ? : $meta->page);
                if(!$session->exit_page)
                    $session->exit_page = $page;
                if($session->id_exit_object && ($title = Ets_tc_session::getTitleMeta($session->id_exit_page,$session->id_exit_object,$id_lang_default)))
                {
                    $session->exit_page .=' - '.$title;
                }
            }

            if($last_visit)
            {
                $duration = strtotime(date('Y-m-d H:i:s')) - strtotime($last_visit['date_add']);
                Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ets_tc_action` set duration="'.(int)$duration.'" ,date_exit="'.pSQL(date('Y-m-d H:i:s')).'" WHERE id_ets_tc_session="'.(int)$cookie->id_ets_tc_session.'" AND  date_add="'.pSQL($last_visit['date_add']).'"');
            }
            $session->duration = strtotime(date('Y-m-d H:i:s')) - strtotime($session->date_add);
            $session->date_exit = date('Y-m-d H:i:s');
            $session->last_action = $action;
            if($action=='create')
                $session->create_account = 1;
            if($action=='create_order' || $action=='create_order_guest')
                $session->create_order = 1;
            if($action=='add_cart')
                $session->add_cart=1;
            $session->update();
            $id_customer = (int)$session->id_customer ?: (int)Context::getContext()->customer->id;
            if($id_customer && Module::isEnabled('ets_free_downloads'))
                $is_verified = (int)Db::getInstance()->getValue('SELECT is_verified FROM `'._DB_PREFIX_.'ets_fd_verification` WHERE id_customer='.(int)$id_customer);
            else
                $is_verified = 0;
            if(Context::getContext()->cart && ($id_address = Context::getContext()->cart->id_address_delivery) && ($address = new Address($id_address)) && $address->id_country)
                $id_country = $address->id_country;
            elseif($id_customer && ($id_address = Address::getFirstCustomerAddressId($id_customer)) && ($address = new Address($id_address)) && $address->id_country)
                $id_country = $address->id_country;
            elseif(Context::getContext()->country->id)
                $id_country = Context::getContext()->country->id;
            else
                $id_country = (int)Configuration::get('PS_COUNTRY_DEFAULT');
            if($insert)
            Db::getInstance()->insert('ets_tc_action',
                array(
                    'id_ets_tc_session' => (int)$cookie->id_ets_tc_session,
                    'action' => pSQL($action),
                    'id_page' => pSQL($id_page),
                    'id_lang' => pSQL(Context::getContext()->language->id),
                    'id_currency' => isset(Context::getContext()->currency->id) ? (int)Context::getContext()->currency->id:0,
                    'id_country' => (int)$id_country,
                    'page_url' => pSQL($page_url),
                    'search' => $search && Validate::isCleanHtml($search) ? pSQL($search):'',
                    'id_product' => (int)$id_product,
                    'id_cart' => (int)$id_cart,
                    'id_order' => (int)$id_order,
                    'id_ticket' => (int)$id_ticket,
                    'id_product_attribute' => (int)$id_product_attribute,
                    'quantity' => $quantity,
                    'id_object' => (int)$id_object,
                    'is_verified' => $is_verified,
                    'is_registered' => $id_customer ?: 0,
                    'is_visitors' => $id_customer ? 0: 1,
                    'date_add' => date('Y-m-d H:i:s'),
                )
            );
            self::deleteActionExpired($cookie->id_ets_tc_session);
        }
    }
   
    public static function getFreeDownloadProducts($id_customer)
    {
        $context = Context::getContext();
        $sql = 'SELECT fdp.id_product,fdc.num_downloaded,fdp.last_downloaded,pl.name,fdp.id_ets_fd_product,fdc.version_download FROM `'._DB_PREFIX_.'ets_fd_product` fdp
        INNER JOIN `'._DB_PREFIX_.'ets_fd_customer` fdc ON (fdp.id_ets_fd_product= fdc.id_ets_fd_product AND fdc.id_customer="'.(int)$id_customer.'")
        INNER JOIN `'._DB_PREFIX_.'product` p ON (fdp.id_product = p.id_product)
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.id_product = pl.id_product AND pl.id_lang="'.(int)$context->language->id.'")
        ORDER BY fdc.id_ets_fd_customer desc';
        $products = Db::getInstance()->executeS($sql);
        if($products)
        {
            foreach($products as &$product)
            {
                $product['image'] = self::getProductImage($product['id_product']);
            }
        }
        return $products;
    }
    public static function getTickets($id_customer)
    {
        $sql = 'SELECT t.id_ets_hd_ticket as id_ticket,t.staff_replied as replied,t.status,t.date_add,pl.name,t.id_product FROM `'._DB_PREFIX_.'ets_hd_ticket` t
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON(t.id_product= pl.id_product AND pl.id_lang ="'.(int)Context::getContext()->language->id.'")
        WHERE t.id_customer = '.(int)$id_customer.' ORDER BY t.id_ets_hd_ticket desc';
        $tickets = Db::getInstance()->executeS($sql);
        if($tickets)
        {
            foreach($tickets as &$ticket)
            {
                $ticket['view_link'] = Context::getContext()->link->getAdminLink('AdminEtsHDTickets').'&id_ets_hd_ticket='.(int)$ticket['id_ticket'];
                if($ticket['id_product'])
                    $ticket['image'] = self::getProductImage($ticket['id_product']);
                else
                    $ticket['image'] ='';
            }
        }
        return $tickets;
    }
    public static function getLiveChatTickets($id_customer)
    {
        $sql = 'SELECT m.id_message as id_ticket,m.replied,m.status,m.date_add,pl.name,m.id_product  FROM `'._DB_PREFIX_.'ets_livechat_ticket_form_message` m
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (m.id_product= pl.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE m.id_customer='.(int)$id_customer.' ORDER BY m.id_message desc';
        $tickets = Db::getInstance()->executeS($sql);
        if($tickets)
        {
            foreach($tickets as &$ticket)
            {
                $ticket['view_link'] = Context::getContext()->link->getAdminLink('AdminLiveChatTickets').'&viewticket=1&id_ticket='.(int)$ticket['id_ticket'];
                if($ticket['id_product'])
                    $ticket['image'] = self::getProductImage($ticket['id_product']);
                else
                    $ticket['image'] ='';
            }
        }
        return $tickets;
    }
    public static function getShoplicenses($id_customer)
    {
        $sql = 'SELECT slp.id_product, slp.order_ref,slp.id_order,slp.paid, o.id_order as idOrder,pl.name,slp.date_add,slp.shop_name 
        FROM `'._DB_PREFIX_.'ets_sl_order_product` slp
        left JOIN `'._DB_PREFIX_.'orders` o ON (o.id_order=slp.id_order)
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product= slp.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")';
        if(!Module::isInstalled('ph_mydownloads'))
            $sql .=' WHERE slp.id_customer='.(int)$id_customer;
        else
            $sql .=' WHERE (slp.id_customer="'.(int)$id_customer.'" AND slp.transferred_status=0) OR (slp.transferred_status=1 AND slp.id_customer_transferred="'.(int)$id_customer.'")';
        $sql .=' ORDER BY slp.id_order desc, slp.position asc';
        $products = Db::getInstance()->executeS($sql);
        if($products)
        {
            foreach($products as &$product)
            {
                $product['image'] = self::getProductImage($product['id_product']);
                if(Module::isInstalled('ph_mydownloads'))
                {
                    $product['view_link'] = Context::getContext()->link->getAdminLink('AdminPhMdLicense');
                }
                $product['view_order'] = self::getLinkOrderAdmin($product['id_order']);
            }
        }
        return $products;
    }
    public static function getProductImage($id_product)
    {
        $image=false;
        $context = Context::getContext();
        if(Module::isEnabled('ets_customfields'))
        {
            if(($czfProduct = self::getCzfProductByProductId($id_product,$context->language->id)) && $czfProduct['logo'])
            {
                $image = $context->link->getMediaLink(_PS_IMG_.'../'.$czfProduct['logo']); ;
                return $image;
            }
        }
        if(version_compare(_PS_VERSION_, '1.7', '>='))
            $type_image= ImageType::getFormattedName('small');
        else
            $type_image= ImageType::getFormatedName('small');
        if(!$image)
        {
            $sql = 'SELECT i.id_image FROM `'._DB_PREFIX_.'image` i';
            $sql .= ' WHERE i.id_product="'.(int)$id_product.'"';
            if(!$image = Db::getInstance()->getRow($sql.' AND i.cover=1'))
            {
                $image = Db::getInstance()->getRow($sql);
            }
            if($image)
            {
                $product_class = new Product($id_product,false,Context::getContext()->language->id);
                
                return $context->link->getImageLink($product_class->link_rewrite ? :'extend-product',$image['id_image'],$type_image);
            }
        }
        if(file_exists(_PS_PROD_IMG_DIR_.$context->language->iso_code.'-default-'.$type_image.'.jpg'))
            return $context->link->getMediaLink(_PS_PROD_IMG_.$context->language->iso_code.'-default-'.$type_image.'.jpg');
        else
        {
            $langDefault = new Language(Configuration::get('PS_LANG_DEFAULT'));
            if(file_exists(_PS_PROD_IMG_DIR_.$langDefault->iso_code.'-default-'.$type_image.'.jpg'))
                return $context->link->getMediaLink(_PS_PROD_IMG_.$langDefault->iso_code.'-default-'.$type_image.'.jpg');
        }     
        return '';
    }
    public static function getLinkCustomerAdmin($id_customer)
    {
        if(version_compare(_PS_VERSION_, '1.7.6', '>='))
        {
            $link_customer = self::getLinkAdminController('admin_customers_view',array('customerId' => $id_customer));
        }
        else
            $link_customer = Context::getContext()->link->getAdminLink('AdminCustomers').'&id_customer='.(int)$id_customer.'&viewcustomer';
        return $link_customer;
    }
    public static function getLinkOrderAdmin($id_order)
    {
        if(version_compare(_PS_VERSION_, '1.7.7.0', '>='))
        {
            $link_order = self::getLinkAdminController('admin_orders_view',array('orderId' => $id_order));
        }
        else
            $link_order = Context::getContext()->link->getAdminLink('AdminOrders').'&id_order='.(int)$id_order.'&vieworder';
        return $link_order;
    }
    public static function getLinkAdminController($entiny,$params=array())
    {
        $sfContainer = call_user_func(array('\PrestaShop\PrestaShop\Adapter\SymfonyContainer','getInstance'));
    	if (null !== $sfContainer) {
    		$sfRouter = $sfContainer->get('router');
    		return $sfRouter->generate(
    			$entiny,
    			$params
    		);
    	}
    }
    public static function getListActions($id_session)
    {
        $sql ='SELECT DISTINCT a.*,if(ml.title="" or ml.title is null ,m.page,ml.title) as page,p.id_product,pl.name as product_name,cu.iso_code FROM `'._DB_PREFIX_.'ets_tc_action` a
        LEFT JOIN `'._DB_PREFIX_.'meta` m ON (m.id_meta = a.id_page)
        LEFT JOIN `'._DB_PREFIX_.'meta_lang` ml ON (m.id_meta = ml.id_meta AND ml.id_lang= a.id_lang)
        LEFT JOIN `'._DB_PREFIX_.'product` p ON (p.id_product=a.id_product AND (a.action="add_cart" OR a.action="reduce_quantity" OR a.action="delete_product" OR a.action="download_product" OR a.action="download_module" ))
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.id_product=pl.id_product AND pl.id_lang= a.id_lang)
        LEFT JOIN `'._DB_PREFIX_.'currency` cu ON (cu.id_currency=a.id_currency)
        WHERE a.id_ets_tc_session='.(int)$id_session.' ORDER BY a.date_add ASC';
        $actions = Db::getInstance()->executeS($sql);
        if($actions)
        {
            $list_actions = Module::getInstanceByName('ets_trackingcustomer')->getListActions();
            foreach($actions as &$action)
            {
                $action['action_text'] = isset($list_actions[$action['action']]) ? $list_actions[$action['action']]['title'] : $action['action'];
                $action['page'] = Tools::ucfirst($action['page']);
                if((int)$action['id_object'])
                {
                    $action['title'] = self::getTitleMeta($action['id_page'],$action['id_object'],$action['id_lang']);
                }
                if($action['id_product'])
                {
                    if($action['id_product']==(int)Configuration::getGlobalValue('PH_EXTEND_ID_PRODUCT'))
                    {
                        $product_support = new Product($action['id_product_attribute'],false,Context::getContext()->language->id);
                        $action['product_name'] = sprintf('Extend support of %s',$product_support->name);
                    }
                    $action['image'] = self::getProductImage($action['id_product']);
                    $action['price'] = Product::getPriceStatic($action['id_product'],true,$action['id_product_attribute']);
                    $action['total_price'] = $action['quantity']*$action['price'];
                    $action['price'] = Tools::displayPrice($action['price']);
                    $action['total_price'] = Tools::displayPrice($action['total_price']);
                    $action['link_product'] = $action['id_product']!=(int)Configuration::getGlobalValue('PH_EXTEND_ID_PRODUCT') || $action['id_product_attribute'] ? Context::getContext()->link->getProductLink($action['id_product']!=(int)Configuration::getGlobalValue('PH_EXTEND_ID_PRODUCT') ? $action['id_product'] : $action['id_product_attribute']):'';
                }
                if($action['id_currency'])
                {
                    $currency = new Currency($action['id_currency']);
                    $action['iso_code'] .=' ('.$currency->sign.')';
                }
            }
        }
        return $actions;
    }
    public static function getLinkMeta($id_meta,$id_object,$id_lang = null)
    {
        $context = Context::getContext();
        if(!$id_lang)
            $id_lang = (int)$context->language->id;
        $meta = new Meta($id_meta);  
        if($id_object)
        {
            switch ($meta->page) {
              case 'manufacturer':
                return $context->link->getManufacturerLink($id_object,null,$id_lang);
              case 'supplier':
                return $context->link->getSupplierLink($id_object,null,$id_lang);
              case 'product':
                return $context->link->getProductLink($id_object);
              case 'category':
                return $context->link->getCategoryLink($id_object);
              case 'cms':
                return $context->link->getCMSLink($id_object);
              case 'module-ybc_blog-blog':
                if(Module::isEnabled('ybc_blog'))
                {
                    return $context->link->getModuleLink('ybc_blog','blog',array('id_post'=>$id_object));
                }
                break; 
              case 'module-ets_livechat-form':
                if(Module::isEnabled('ets_livechat'))
                {
                    return $context->link->getModuleLink('ets_livechat','form',array('id_form'=>$id_object));
                }
                break; 
              case 'module-ets_collections-collection':
                if(Module::isEnabled('ets_collections'))
                {
                    return $context->link->getModuleLink('ets_collections','collection',array('id_collection'=>$id_object));
                }
                break;
            } 
        }
        elseif($meta->id)
        {
            if(Tools::strpos($meta->page,'module-')==0)
            {
                $pages = explode('-',$meta->page);
                $module = isset($pages[1]) ? $pages[1]:'';
                $controller = isset($pages[2]) ? $pages[2]:'';
                if($module && $controller)
                {
                    try{
                        return $context->link->getModuleLink($module,$controller);
                    }
                    catch(Exception $ex){
                        return '#';
                    }
                }
            }
            return $context->link->getPageLink($meta->page);
        }
    }
    public static function getTitleMeta($id_meta,$id_object,$id_lang = null)
    {
        $title = '';
        $context = Context::getContext();
        if(!$id_lang)
            $id_lang = (int)$context->language->id;
        $meta = new Meta($id_meta);  
        if($id_object)
        {
            switch ($meta->page) {
              case 'manufacturer':
                $manu = new Manufacturer($id_object,$id_lang);
                $title = $manu->name;
                break;
              case 'supplier':
                $sup = new Supplier($id_object,$id_lang);
                $title = $sup->name;
                break;
              case 'product':
                $p = new Product($id_object,false,$id_lang);
                $title = $p->name;
                break;
              case 'category':
                $c = new Category($id_object,$id_lang);
                $title = $c->name;
                break;
              case 'cms':
                $cms = new CMS($id_object,$id_lang);
                $title = $cms->meta_title;
                break;
              case 'module-ybc_blog-blog':
                if(Module::isEnabled('ybc_blog'))
                {
                    $blog = new Ybc_blog_post_class($id_object,$id_lang);
                    $title = $blog->title;
                }
                break; 
              case 'module-ets_livechat-form':
                if(Module::isEnabled('ets_livechat'))
                {
                    $form = new LC_Ticket_form($id_object,$id_lang);
                    $title = $form->title;
                }
                break; 
              case 'module-ets_collections-collection':
                if(Module::isEnabled('ets_collections'))
                {
                    $collection = new Ets_collection_class($id_object,$id_lang);
                    $title = $collection->name;
                }
                break;
            } 
        }
        elseif($meta->id)
            $title  = isset($meta->title[$id_lang]) && $meta->title[$id_lang] ? $meta->title[$id_lang] : $meta->page;
        return $title;
    }
    public function getListSessions($id_customer=0,$id_guest=0,$id_cart = 0)
    {
        $sql = 'SELECT distinct s.*,IF(ml1.title="" or ml1.title is null,m1.page,ml1.title) as first_page,IF(ml2.title="" or ml2.title is null,m2.page,ml2.title) as exit_page FROM `'._DB_PREFIX_.'ets_tc_session` s
        LEFT JOIN `'._DB_PREFIX_.'meta` m1 ON (s.id_first_page = m1.id_meta)
        LEFT JOIN `'._DB_PREFIX_.'meta_lang` ml1 ON (m1.id_meta = ml1.id_meta AND ml1.id_lang="'.(int)Context::getContext()->language->id.'")
        LEFT JOIN `'._DB_PREFIX_.'meta` m2 ON (s.id_exit_page = m2.id_meta)
        LEFT JOIN `'._DB_PREFIX_.'meta_lang` ml2 ON (m2.id_meta = ml2.id_meta AND ml2.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE 1 '.($id_customer  ? ' AND s.id_customer="'.(int)$id_customer.'"' : '').($id_guest ? ' AND s.id_guest = "'.(int)$id_guest.'"':'').($id_cart ? ' AND s.id_ets_tc_session IN (SELECT id_ets_tc_session FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_cart="'.(int)$id_cart.'")':'').' ORDER BY s.id_ets_tc_session DESC';
        $sessions =  Db::getInstance()->executeS($sql);
        if($sessions)
        { 
            foreach($sessions as &$session)
            {
                $session['total_action'] = Db::getInstance()->getValue('SELECT count(*) FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session='.(int)$session['id_ets_tc_session']);
                $session['actions'] = self::getListActions($session['id_ets_tc_session']);
                if($session['actions'])
                {
                    foreach($session['actions'] as &$action)
                    {
                        if($action['date_exit']!='0000-00-00 00:00:00')
                            $action['duration'] = Module::getInstanceByName('ets_trackingcustomer')->displayTime(strtotime($action['date_exit']) - strtotime($action['date_add']));
                        else
                            $action['duration'] ='';
                        $action['date_add_text'] = $this->getTime($action['date_add']);
                        
                    }
                }
            }
        }
        return $sessions;
    }
    public function getTime($date)
    {
        $time = strtotime(date('Y-m-d H:i:s')) - strtotime($date);
        if($time < 86400)
        {
            if($time > 3600)
            {
                $hours = Tools::ps_round($time/3600,2);
                return sprintf($this->l('%s hour%s ago'),$hours,$hours>1 ? 's':'');
            }
            elseif($time>60)
            {
                $minute = (int)($time/60);
                return  sprintf($this->l('%s minute%s ago'),$minute,$minute>1 ? 's':'');
            }
            else
            {
                return sprintf($this->l('%s second%s ago'),$time,$time>1 ? 's':'');
            }
        }
        else
            return Tools::displayDate($date,null,true);
    }
    public function getSessionByID($id_session)
    {
        $sql = 'SELECT s.*,IF(ml1.title="" or ml1.title is null,m1.page,ml1.title) as first_page,IF(ml2.title="" or ml2.title is null,m2.page,ml2.title) as exit_page FROM `'._DB_PREFIX_.'ets_tc_session` s
        LEFT JOIN `'._DB_PREFIX_.'meta` m1 ON (s.id_first_page = m1.id_meta)
        LEFT JOIN `'._DB_PREFIX_.'meta_lang` ml1 ON (m1.id_meta = ml1.id_meta AND ml1.id_lang="'.(int)Context::getContext()->language->id.'")
        LEFT JOIN `'._DB_PREFIX_.'meta` m2 ON (s.id_exit_page = m2.id_meta)
        LEFT JOIN `'._DB_PREFIX_.'meta_lang` ml2 ON (m2.id_meta = ml2.id_meta AND ml2.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE s.id_ets_tc_session='.(int)$id_session;
        $session =  Db::getInstance()->getRow($sql);
        if($session)
        {
            $session['total_action'] = Db::getInstance()->getValue('SELECT count(*) FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session='.(int)$session['id_ets_tc_session']);
            $session['actions'] = self::getListActions($session['id_ets_tc_session']);
            $session['duration'] = Module::getInstanceByName('ets_trackingcustomer')->displayTime($session['duration']);
            if($session['actions'])
            {
                foreach($session['actions'] as &$action)
                {
                    if($action['date_exit']!='0000-00-00 00:00:00')
                        $action['duration'] = Module::getInstanceByName('ets_trackingcustomer')->displayTime(strtotime($action['date_exit']) - strtotime($action['date_add']));
                    else
                        $action['duration'] ='';
                    $action['date_add_text'] = $this->getTime($action['date_add']);
                }
            }
        }
        return $session;
    }
    public static function checkCreateAccount($id_session){
        if(Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'ets_tc_action` WhERE id_ets_tc_session='.(int)$id_session.' AND action="create"'))
        {
            $session = new Ets_tc_session($id_session);
            return (new Customer($session->id_customer));
        }
        return false;
    }
    public static function getCountOrderInSession($id_session)
    {
        return Db::getInstance()->getValue('SELECT COUNT(id_order) FROM `'._DB_PREFIX_.'ets_tc_action` WhERE id_ets_tc_session='.(int)$id_session.' AND (action="create_order" OR action="create_order_guest")');
    }
    public static function getListTicketsBySession($id_session)
    {
        if(Module::isInstalled('ets_livechat'))
        {
            $sql = 'SELECT a.id_ticket,m.id_product,pl.name,m.replied,m.status FROM `'._DB_PREFIX_.'ets_tc_action` a
            INNER JOIN `'._DB_PREFIX_.'ets_livechat_ticket_form_message` m ON (m.id_message = a.id_ticket)
            LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (m.id_product = pl.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE a.action="add_ticket" AND a.id_ets_tc_session="'.(int)$id_session.'"';
            $tickets = Db::getInstance()->executeS($sql);
            if($tickets)
            {
                foreach($tickets as &$ticket)
                {
                    $ticket['view_link'] = Context::getContext()->link->getAdminLink('AdminLiveChatTickets').'&viewticket=1&id_ticket='.(int)$ticket['id_ticket'];
                    if($ticket['id_product'])
                        $ticket['image'] = self::getProductImage($ticket['id_product']);
                    else
                        $ticket['image'] ='';
                }
            }
            return $tickets;
        }
        
    }
    public static function getListHDTicketsBySession($id_session)
    {
        if(Module::isInstalled('ets_helpdesk'))
        {
            $sql = 'SELECT a.id_ticket,t.id_product,pl.name,t.staff_replied as replied,t.status FROM `'._DB_PREFIX_.'ets_tc_action` a
            INNER JOIN `'._DB_PREFIX_.'ets_hd_ticket` t ON (t.id_ets_hd_ticket = a.id_ticket)
            LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (t.id_product = pl.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE a.action="add_ticket_hd" AND a.id_ets_tc_session="'.(int)$id_session.'"';
            $tickets = Db::getInstance()->executeS($sql);
            if($tickets)
            {
                foreach($tickets as &$ticket)
                {
                    $ticket['view_link'] = Context::getContext()->link->getAdminLink('AdminEtsHDTickets').'&id_ets_hd_ticket='.(int)$ticket['id_ticket'];
                    if($ticket['id_product'])
                        $ticket['image'] = self::getProductImage($ticket['id_product']);
                    else
                        $ticket['image'] ='';
                }
            }
            return $tickets;
        }
        
    }
    public static function getListViewProducts($id_session)
    {
        $sql = 'SELECT a.id_product,pl.name FROM `'._DB_PREFIX_.'ets_tc_action` a
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (a.id_product=pl.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE a.id_ets_tc_session ="'.(int)$id_session.'" AND a.id_product!=0 AND a.action="view_demo" GROUP BY a.id_product';
        $products = Db::getInstance()->executeS($sql);
        if($products)
        {
            foreach($products as &$product)
            {
                $product['image'] = self::getProductImage($product['id_product']);
                $product['link_product'] = Context::getContext()->link->getProductLink($product['id_product']);
            }
        }
        return $products;
    }
    public static function getListDownloadProducts($id_session)
    {
        $sql = 'SELECT a.id_product,pl.name FROM `'._DB_PREFIX_.'ets_tc_action` a
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (a.id_product=pl.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE a.id_ets_tc_session ="'.(int)$id_session.'" AND a.id_product!=0 AND a.action="download_product" GROUP BY a.id_product';
        $products = Db::getInstance()->executeS($sql);
        if($products)
        {
            foreach($products as &$product)
            {
                $product['image'] = self::getProductImage($product['id_product']);
                $product['link_product'] = Context::getContext()->link->getProductLink($product['id_product']);
            }
        }
        return $products;
    }
    public static function getListComemntProducts($id_session)
    {
        if(Module::isInstalled('ets_reviews'))
        {
            $sql = 'SELECT a.id_product,pl.name FROM `'._DB_PREFIX_.'ets_tc_action` a
            LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (a.id_product=pl.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE a.id_ets_tc_session ="'.(int)$id_session.'" AND a.id_product!=0 AND a.action="add_comment_product" GROUP BY a.id_product';
            $products = Db::getInstance()->executeS($sql);
            if($products)
            {
                foreach($products as &$product)
                {
                    $product['image'] = self::getProductImage($product['id_product']);
                    $product['link_product'] = Context::getContext()->link->getProductLink($product['id_product']);
                }
            }
            return $products;
        }
        
    } 
    public static function getListOrderProducts($id_session)
    {
        $sql = 'SELECT o.reference,od.product_name as name,od.product_quantity,od.product_id,o.id_order,o.id_currency,od.product_price FROM `'._DB_PREFIX_.'ets_tc_action` a 
        INNER JOIN `'._DB_PREFIX_.'orders` o ON (a.id_order = o.id_order)
        LEFT JOIN `'._DB_PREFIX_.'order_detail` od ON (o.id_order= od.id_order)
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.id_product = od.product_id AND pl.id_lang = "'.(int)Context::getContext()->language->id.'")
        WHERE a.id_ets_tc_session='.(int)$id_session;
        $products = Db::getInstance()->executeS($sql);
        if($products)
        {
            foreach($products as &$product)
            {
                $product['image'] = self::getProductImage($product['product_id']);
                $product['link_order'] = self::getLinkOrderAdmin($product['id_order']);
                $product['link_product'] = Context::getContext()->link->getProductLink($product['product_id']);
                $product['product_price'] = Tools::displayPrice($product['product_price'],new Currency($product['id_currency']));
                if(Module::isEnabled('ets_shoplicense'))
                {
                    $product['shop_name'] =  Db::getInstance()->getValue('SELECT shop_name FROM `'._DB_PREFIX_.'ets_sl_order_product` WHERE id_product="'.(int)$product['product_id'].'" AND id_order="'.(int)$product['id_order'].'"');
                }
            }
        }
        return $products;
    }
    public static function getListCommentPosts($id_session)
    {
        if(Module::isInstalled('ybc_blog'))
        {
            $sql =' SELECT p.id_post,pl.title FROM `'._DB_PREFIX_.'ets_tc_action` a
            INNER JOIN `'._DB_PREFIX_.'ybc_blog_post` p ON (a.id_product= p.id_post)
            LEFT JOIN `'._DB_PREFIX_.'ybc_blog_post_lang` pl ON (p.id_post = pl.id_post AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
            WHERE a.id_ets_tc_session="'.(int)$id_session.'" AND a.action="add_comment_blog" GROUP BY p.id_post';
            $posts = Db::getInstance()->executeS($sql);
            if($posts)
            {
                $ybc_blog = Module::getInstanceByName('ybc_blog');
                foreach($posts as &$post)
                {
                    $post['link'] = $ybc_blog->getLink('blog',array('id_post'=>$post['id_post']));
                }
            }
            return $posts;
        }
        
    }
    public static function _getSessions($filter='',$sort='',$start=0,$limit=10,$total=false)
    {
        if($total)
            $sql ='SELECT COUNT(DISTINCT s.id_ets_tc_session) FROM `'._DB_PREFIX_.'ets_tc_session` s';
        else
            $sql ='SELECT DISTINCT s.*,CONCAT(c.firstname," ",c.lastname) as customer_name,c.email,(select COUNT(*) FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session= s.id_ets_tc_session AND action!="visit_page") as total_action FROM `'._DB_PREFIX_.'ets_tc_session` s';
        $sql .=' LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.id_customer = s.id_customer)';
        $sql .=' WHERE s.id_shop = '.(int)Context::getContext()->shop->id.(string)$filter;
        if($total)
            return Db::getInstance()->getValue($sql);
        else
        {
            $sql .=($sort ? ' ORDER BY '.pSQL($sort): ' ORDER BY s.date_exit DESC').' LIMIT '.(int)$start.','.(int)$limit.'';
            $sessions = Db::getInstance()->executeS($sql);
            if($sessions)
            {
                foreach($sessions as &$session)
                {
                    $session['id_cart'] = Db::getInstance()->getValue('SELECT GROUP_CONCAT(DISTINCT id_cart,"") FROM `'._DB_PREFIX_.'ets_tc_action` WHERE id_ets_tc_session='.(int)$session['id_ets_tc_session'].' AND id_cart>0');
                    $session['id_cart'] = str_replace(',',', ',$session['id_cart']);
                }
            }
            return $sessions;
        }    
    }
    public static function _getViewedProducts($filter='',$sort='',$start=0,$limit=10,$total=false)
    {
        if($total)
            $sql ='SELECT COUNT(DISTINCT a.is_registered,a.id_product) FROM `'._DB_PREFIX_.'ets_tc_action` a';
        else
            $sql ='SELECT CONCAT(a.id_product,"-",a.is_registered) as id, a.id_product,a.is_registered,CONCAT(c.firstname," ",c.lastname) as customer_name,c.email,CONCAT(ps.id_product," - ",pl.name) as product_name,lang.name as lang_name, MAX(a.date_add) as date_add,cart_product.id_cart,a.id_ets_tc_session FROM `'._DB_PREFIX_.'ets_tc_action` a';
        $sql .=' INNER JOIN `'._DB_PREFIX_.'customer` c ON (c.id_customer = a.is_registered)
        INNER JOIN `'._DB_PREFIX_.'product_shop` ps ON (ps.id_product = a.id_product AND ps.id_shop="'.(int)Context::getContext()->shop->id.'")
        LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (ps.id_product= pl.id_product AND pl.id_lang="'.(int)Context::getContext()->language->id.'")
        LEFT JOIN `'._DB_PREFIX_.'lang` lang ON (lang.id_lang= c.id_lang)
        ';
        $sql .= 'LEFT JOIN (
                SELECT cart.id_customer,cp.id_product,cart.id_cart FROM `'._DB_PREFIX_.'cart` cart 
                INNER JOIN `'._DB_PREFIX_.'cart_product` cp ON (cart.id_cart = cp.id_cart)
                WHERE cart.id_customer!=0
            ) cart_product ON (cart_product.id_customer = a.is_registered AND cart_product.id_product = a.id_product)';
        $sql .= 'LEFT JOIN (
                SELECT o.id_customer,od.product_id,o.id_order FROM `'._DB_PREFIX_.'orders` o 
                INNER JOIN `'._DB_PREFIX_.'order_detail` od ON (od.id_order = o.id_order)
            ) order_product ON (order_product.id_customer = a.is_registered AND order_product.product_id = a.id_product)';
        $sql .=' WHERE a.action = "visit_page" AND order_product.id_order is null '.(string)$filter;
        if($total)
            return Db::getInstance()->getValue($sql);
        else
        {
            $sql .=' GROUP BY a.id_product,a.is_registered';
            $sql .=($sort ? ' ORDER BY '.pSQL($sort): ' ORDER BY a.date_add DESC').($limit ? ' LIMIT '.(int)$start.','.(int)$limit:'') ;
            $products = Db::getInstance()->executeS($sql);
            if($products) {
                foreach ($products as &$product) {
                    $product['id_cart'] = (int)Db::getInstance()->getValue('SELECT c.id_cart FROM `'._DB_PREFIX_.'cart` c 
                    INNER JOIN `'._DB_PREFIX_.'cart_product` cp ON (c.id_cart = cp.id_cart)
                    WHERE c.id_customer = "'.(int)$product['is_registered'].'" AND cp.id_product="'.(int)$product['id_product'].'"');
                }
            }
            return  $products;
        }
    }
    public static function checkCustomerMultiSession($id_session,$id_customer)
    {
        if($id_customer)
        {
             $total = (int)Db::getInstance()->getValue('SELECT COUNT(id_ets_tc_session) FROM `'._DB_PREFIX_.'ets_tc_session` WHERE id_ets_tc_session!="'.(int)$id_session .'" AND id_customer="'.(int)$id_customer.'"');
             if($total)
                return $total+1;
        }
        return false;
    }
    public static function getForm($id_form = null, $alias = null)
    {
        if (!$id_form && !$alias)
            return false;
        return Db::getInstance()->getRow("
            SELECT f.*, fl.title,fl.description,fl.button_submit_label,fl.friendly_url,fl.meta_title,fl.meta_description,fl.meta_keywords
            FROM `" . _DB_PREFIX_ . "ets_livechat_ticket_form` f 
            LEFT JOIN `" . _DB_PREFIX_ . "ets_livechat_ticket_form_lang` fl ON f.id_form=fl.id_form AND fl.id_lang=" . (int)Context::getContext()->language->id . "
            WHERE f.deleted=0 AND f.id_shop=" . (int)Context::getContext()->shop->id . ($id_form ? " AND f.id_form=" . (int)$id_form : "") . ($alias ? " AND fl.friendly_url='" . pSQL($alias) . "'" : "") . "
        ");
    }
    public static function getCzfProductByProductId($idProduct, $idLang = null)
    {
        $sql = "SELECT cp.logo
                FROM `"._DB_PREFIX_."ets_czf_product` cp 
                WHERE cp.id_product =".(int)$idProduct;
        if($idLang)
        {
            return Db::getInstance()->getRow($sql);
        }
    }
    public static function getTopVisitPages($filter='',$page =1, $total=false)
    {
        $filter_customer = Tools::getValue('filter_visit_page_by_customer');
        if($filter_customer=='is_verified')
            $filter .= ' AND a.is_verified=1';
        if($filter_customer=='is_registered')
            $filter .= ' AND a.is_registered >=1'; 
        if($filter_customer=='is_visitors')
            $filter .= ' AND (a.is_registered=0 OR a.is_registered is NULL)';
        if($total)
        {
            $sql = 'SELECT COUNT(DISTINCT a.id_page,a.id_object) FROM `'._DB_PREFIX_.'ets_tc_action` a
            INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s ON(s.id_ets_tc_session = a.id_ets_tc_session AND s.id_shop="'.(int)Context::getContext()->shop->id.'")
            '.($filter_customer=='place_order' ? ' INNER JOIN `'._DB_PREFIX_.'orders` o ON (o.id_customer = a.is_registered AND o.valid=1)' :'').'
            WHERE a.action="visit_page" '.($filter ? (string)$filter:'');
            return Db::getInstance()->getValue($sql);
        }
        $start = 20 * ($page - 1);
        if($start < 0)
            $start = 0;
        $sql = 'SELECT a.id_page,a.id_object,COUNT(*) as total_view, avg(a.duration) as avg_duration FROM `'._DB_PREFIX_.'ets_tc_action` a
        INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s ON(s.id_ets_tc_session = a.id_ets_tc_session AND s.id_shop="'.(int)Context::getContext()->shop->id.'")
        WHERE a.action="visit_page" '.($filter ? (string)$filter:'').($filter_customer=='place_order' ? ' AND a.is_registered IN (SELECT id_customer FROM `'._DB_PREFIX_.'orders` WHERE valid=1)':'').' group by a.id_page,a.id_object ORDER BY total_view DESC LIMIT '.(int)$start.',20';
        $pages = Db::getInstance()->executeS($sql);
        $id_lang = Context::getContext()->language->id;
        if($pages)
        {
            foreach($pages as &$page)
            {
                $page['page_name'] = self::getTitleMeta($page['id_page'],$page['id_object'],$id_lang);
                $page['page_link'] = self::getLinkMeta($page['id_page'],$page['id_object'],$id_lang);
                $page['avg_duration'] = Module::getInstanceByName('ets_trackingcustomer')->displayTime($page['avg_duration']);
            }
        }
        return $pages;
    }
    public static function getTopCustomerByActions($filter='',$page=1,$total=false)
    {
        $filter_customer = Tools::getValue('filter_customer');
        if($filter_customer=='is_verified')
            $filter .= ' AND a.is_verified=1';
        if($filter_customer=='is_registered')
            $filter .= ' AND a.is_registered >=1'; 
        if($filter_customer=='is_visitors')
            $filter .= ' AND (a.is_registered=0 OR a.is_registered is NULL)';
        $filter_customer_by_action = Tools::getValue('filter_customer_by_action');
        if($filter_customer_by_action && Validate::isCleanHtml($filter_customer_by_action))
            $filter .= ' AND a.action="'.pSQL($filter_customer_by_action).'"';
        if($total)
        {
            $sql ='SELECT COUNT(DISTINCT if(a.is_registered >=1 ,a.is_registered,0),if(a.is_registered >=1,0,a.id_ets_tc_session)) as total_action FROM `'._DB_PREFIX_.'ets_tc_action` a 
            INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s ON (a.id_ets_tc_session=s.id_ets_tc_session AND s.id_shop="'.(int)Context::getContext()->shop->id.'")
            WHERE a.action!="visit_page"'.($filter ? (string)$filter:'').($filter_customer=='place_order' ? ' AND a.is_registered IN (SELECT id_customer FROM `'._DB_PREFIX_.'orders` WHERE valid=1)':'');
            return Db::getInstance()->getValue($sql);
        }
        $start = 20 * ($page - 1);
        if($start < 0)
            $start = 0;
        $sql = 'SELECT if(a.is_registered >=1 ,a.is_registered,0) as id_customer,if(a.is_registered >=1,0,a.id_ets_tc_session) as id,COUNT(*) as total_action FROM `'._DB_PREFIX_.'ets_tc_action` a
        INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s  ON (a.id_ets_tc_session=s.id_ets_tc_session AND s.id_shop="'.(int)Context::getContext()->shop->id.'")
        WHERE a.action!="visit_page" '.($filter ? (string)$filter:'').($filter_customer=='place_order' ? ' AND a.is_registered IN (SELECT id_customer FROM `'._DB_PREFIX_.'orders` WHERE valid=1)':'').'
        GROUP BY id_customer,id ORDER BY total_action DESC LIMIT '.(int)$start.',20';
        return Db::getInstance()->executeS($sql);
    }
    public static function getTopActions($filter='',$page=1, $total= false)
    {
        $filter_actions = Tools::getValue('filter_actions');
        if($filter_actions=='is_verified')
            $filter .= ' AND a.is_verified=1';
        if($filter_actions=='is_registered')
            $filter .= ' AND a.is_registered >=1'; 
        if($filter_actions=='is_visitors')
            $filter .= ' AND (a.is_registered=0 OR a.is_registered is NULL)';
        if($total)
        {
            $sql = 'SELECT COUNT(DISTINCT a.action) FROM `'._DB_PREFIX_.'ets_tc_action` a
            INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s ON(s.id_ets_tc_session = a.id_ets_tc_session AND s.id_shop="'.(int)Context::getContext()->shop->id.'")
            '.($filter_actions=='place_order' ? ' INNER JOIN `'._DB_PREFIX_.'orders` o ON (o.id_customer = a.is_registered AND o.valid=1)' :'').'
            WHERE a.action!="visit_page" '.($filter ? (string)$filter:'');
            return Db::getInstance()->getValue($sql);
        }
        $start = 10 * ($page - 1);
        if($start < 0)
            $start = 0;
        $sql = 'SELECT a.action,COUNT(*) as total_view FROM `'._DB_PREFIX_.'ets_tc_action` a
        INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s ON(s.id_ets_tc_session = a.id_ets_tc_session AND s.id_shop="'.(int)Context::getContext()->shop->id.'")
        WHERE a.action!="visit_page" '.($filter ? (string)$filter:'').($filter_actions=='place_order' ? ' AND a.is_registered IN (SELECT id_customer FROM `'._DB_PREFIX_.'orders` WHERE valid=1)':'').' group by a.action ORDER BY total_view DESC LIMIT '.(int)$start.',10';
        $actions = Db::getInstance()->executeS($sql);
        $list_actions = Module::getInstanceByName('ets_trackingcustomer')->getListActions();
        if($actions)
        {
            foreach($actions as &$action)
            {
                $action['action'] = isset($list_actions[$action['action']]) ? $list_actions[$action['action']]['title']:$action['action']; 
            }
        }
        return $actions;
    }
    public static function getTopBrowsers($filter='')
    {
        $filter_actions = Tools::getValue('filter_insights');
        if($filter_actions=='is_verified')
            $filter .= ' AND ac.is_verified=1';
        if($filter_actions=='is_registered')
            $filter .= ' AND ac.is_registered >=1'; 
        if($filter_actions=='is_visitors')
            $filter .= ' AND (ac.is_registered=0 OR ac.is_registered is NULL)';
        $sql = 'SELECT browser,COUNT(DISTINCT a.id_ets_tc_session) as total_view FROM `'._DB_PREFIX_.'ets_tc_session` a';
        if($filter_actions)
        {
            $sql .=' INNER JOIN `'._DB_PREFIX_.'ets_tc_action` ac ON (a.id_ets_tc_session = ac.id_ets_tc_session)';
            $sql .= ($filter_actions=='place_order' ? ' INNER JOIN `'._DB_PREFIX_.'orders` o ON (o.id_customer = ac.is_registered AND o.valid=1)' :'');
        }
        $sql .=' WHERE a.id_shop="'.(int)Context::getContext()->shop->id.'" '.($filter ? (string)$filter:'').' group by browser ORDER BY total_view DESC';
        return Db::getInstance()->executeS($sql);
    }
    public static function getTopLanguages($filter='')
    {
        $filter_actions = Tools::getValue('filter_insights');
        if($filter_actions=='is_verified')
            $filter .= ' AND a.is_verified=1';
        if($filter_actions=='is_registered')
            $filter .= ' AND a.is_registered >=1'; 
        if($filter_actions=='is_visitors')
            $filter .= ' AND (a.is_registered=0 OR a.is_registered is NULL)';
        $sql = 'SELECT a.id_lang,COUNT(DISTINCT s.id_ets_tc_session) as total_view,l.name FROM `'._DB_PREFIX_.'ets_tc_action` a
        INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s  ON (s.id_ets_tc_session = a.id_ets_tc_session)
        '.($filter_actions=='place_order' ? ' INNER JOIN `'._DB_PREFIX_.'orders` o ON (o.id_customer = a.is_registered AND o.valid=1)' :'').'
        LEFT JOIN `'._DB_PREFIX_.'lang` l ON(l.id_lang=a.id_lang)
        WHERE s.id_shop="'.(int)Context::getContext()->shop->id.'" AND a.id_lang>0 '.($filter ? (string)$filter:'').' group by a.id_lang ORDER BY total_view DESC';
        return  Db::getInstance()->executeS($sql);
    }
    public static function getTopCountries($filter='')
    {
        $filter_actions = Tools::getValue('filter_insights');
        if($filter_actions=='is_verified')
            $filter .= ' AND a.is_verified=1';
        if($filter_actions=='is_registered')
            $filter .= ' AND a.is_registered >=1'; 
        if($filter_actions=='is_visitors')
            $filter .= ' AND (a.is_registered=0 OR a.is_registered is NULL)';
        $sql = 'SELECT a.id_country,COUNT(DISTINCT s.id_ets_tc_session) as total_view,cl.name FROM `'._DB_PREFIX_.'ets_tc_action` a
        INNER JOIN `'._DB_PREFIX_.'ets_tc_session` s  ON (s.id_ets_tc_session = a.id_ets_tc_session)
        '.($filter_actions=='place_order' ? ' INNER JOIN `'._DB_PREFIX_.'orders` o ON (o.id_customer = a.is_registered AND o.valid=1)' :'').'
        LEFT JOIN `'._DB_PREFIX_.'country_lang` cl ON (cl.id_country = a.id_country AND cl.id_lang="'.(int)Context::getContext()->language->id.'")
        WHERE s.id_shop="'.(int)Context::getContext()->shop->id.'" AND a.id_country>0 '.($filter ? (string)$filter:'').' group by a.id_country ORDER BY total_view DESC';
        return Db::getInstance()->executeS($sql);
    }
    public static function getDateMin()
    {
        $sql = 'SELECT MIN(date_add) FROM `'._DB_PREFIX_.'ets_tc_session` WHERE id_shop="'.(int)Context::getContext()->shop->id.'"';
        return Db::getInstance()->getValue($sql);
    }
    public function updateAction()
    {
        return Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'ets_tc_action` SET is_registered="'.(int)$this->id_customer.'" WHERE id_ets_tc_session='.(int)$this->id);
    }
 }