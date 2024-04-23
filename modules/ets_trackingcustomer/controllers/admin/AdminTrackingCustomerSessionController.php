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

/**
 * Class AdminTrackingCustomerSessionController
 * @property \Ets_trackingcustomer $module
 */
class AdminTrackingCustomerSessionController extends ModuleAdminController
{
    public $list_session_default;
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
        $this->list_session_default = array('id_ets_tc_session','customer_name','duration','total_page_visit','create_order','date_add','source','date_exit');
    }
    public function initContent()
    {
        parent::initContent();
        $current_tab = Tools::getValue('current_tab');
        if($current_tab!='customer_session')
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminModules').'&configure='.$this->module->name.'&current_tab=analystic');
        if(($id_order = (int)Tools::getValue('id_order')) && ($order = new Order($id_order)) && Validate::isLoadedObject($order))
        {
            if($order->id_customer)
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&viewSession=1&id_customer='.$order->id_customer);
            else
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&viewSession=1&id_cart='.(int)$order->id_cart);
        }
        if (Tools::isSubmit('btnSubmitArrangeListCustomer')) {
            $listFieldCustomers =  Tools::getValue('listFieldCustomers');
            $errors ='';
            if(!$listFieldCustomers)
            {
                $errors = $this->l('Custom column is required');
            }
            elseif(!is_array($listFieldCustomers) || !Ets_trackingcustomer::validateArray($listFieldCustomers))
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
                Configuration::updateValue('ETS_TC_CUSTOM_SESSION_LIST',implode(',',$listFieldCustomers));
                die(json_encode(
                    array(
                        'success'=> $this->l('Updated successfully'),
                    )
                ));
            }
        }
        if (Tools::isSubmit('btnSubmitRessetToDefaultListCustomer'))
        {
            Configuration::updateValue('ETS_TC_CUSTOM_SESSION_LIST','');
            die(json_encode(
                array(
                    'success'=> $this->l('Reset to default successfully'),
                )
            ));
        }
    }
    public function renderList()
    {
        
        if(Tools::isSubmit('submitBulkDelete') && ($id_sessions = Tools::getValue('bulk_action_selected_sessions')) && Ets_trackingcustomer::validateArray($id_sessions) )
        {
            foreach($id_sessions as $id_session)
            {
                $session = new Ets_tc_session($id_session);
                $session->delete();
            }
            $this->context->cookie->success_message = $this->l('Deleted session successfully');
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session');
        }
        if(Tools::isSubmit('del') && ($id_ets_tc_session = (int)Tools::getValue('id_ets_tc_session')))
        {
            $session = new Ets_tc_session($id_ets_tc_session);
            if($session->delete())
            {
                $this->context->cookie->success_message = $this->l('Deleted session successfully');
                Tools::redirectAdmin($this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session');
            }
        }
        $id_customer = (int)Tools::getValue('id_customer');
        $id_guest = (int)Tools::getValue('id_guest');
        $id_session = (int)Tools::getValue('id_session');
        $id_cart = (int)Tools::getValue('id_cart');
        $this->context->smarty->assign(
            array(
                'ets_tc_body_html'=> $id_customer || $id_guest || $id_cart ? $this->displaySessionDetails(): (Tools::isSubmit('viewSession') && $id_session ? $this->displaySessionDetail($id_session) : $this->renderListSessions() ) ,
            )
        );
        $html ='';
        if($this->context->cookie->success_message)
        {
            $html .= $this->module->displayConfirmation($this->context->cookie->success_message);
            $this->context->cookie->success_message ='';
        }
        if($this->module->_errors)
            $html .= $this->module->displayError($this->module->_errors);
        $html .= $this->module->displayTabs();
        return $html.$this->module->display(_PS_MODULE_DIR_.$this->module->name.DIRECTORY_SEPARATOR.$this->module->name.'.php', 'admin.tpl');
    }
    public function displaySessionDetails()
    {
        $id_customer = (int)Tools::getValue('id_customer');
        $id_guest = (int)Tools::getValue('id_guest');
        $id_cart = (int)Tools::getValue('id_cart');
        $sessions = Ets_tc_session::getInstance()->getListSessions($id_customer,$id_guest,$id_cart);
        if($sessions)
        {
            foreach($sessions as $key=> &$session)
            {
                $session['duration'] = $this->module->displayTime($session['duration']);
                if($key==0)
                    $session['open'] =1;
                $session['detail'] = $this->displaySessionDetail($session);
            }
        }
        if($id_customer || ( $id_cart && ($cart = new Cart($id_cart)) && ($id_customer = (int)$cart->id_customer)))
        {
            if($id_address = (int)Address::getFirstCustomerAddressId($id_customer))
            {
                $address = new Address($id_address);
                $country = new Country($address->id_country,$this->context->language->id);
                $country_name = $country->name;
            }
            else
                $country_name ='';
            if(Module::isEnabled('ets_free_downloads'))
            {
                $is_verified = (int)Db::getInstance()->getValue('SELECT is_verified FROM `'._DB_PREFIX_.'ets_fd_verification` WHERE id_customer='.(int)$id_customer);
            }
            $this->context->smarty->assign(
                array(
                    'country_name' => $country_name,
                    'is_verified'=> isset($is_verified) ? $is_verified :false,
                    'link_customer' => Ets_tc_session::getLinkCustomerAdmin($id_customer),
                )
            );
        }        
        $this->context->smarty->assign(
            array(
                'sessions' => $sessions,
                'customer' => $id_customer ? (new Customer($id_customer)): false,
                'id_guest' => $id_guest,
                'id_cart' => $id_cart,
            )
        );
        return $this->module->display(_PS_MODULE_DIR_.$this->module->name.DIRECTORY_SEPARATOR.$this->module->name.'.php', 'session_details.tpl');
    }
    public function displaySessionDetail($session)
    {
        if(is_int($session))
        {
            $session = Ets_tc_session::getInstance()->getSessionByID($session);
            if($session['id_customer'])
            {
                if($id_address = (int)Address::getFirstCustomerAddressId($session['id_customer']))
                {
                    $address = new Address($id_address);
                    $country = new Country($address->id_country,$this->context->language->id);
                    $country_name = $country->name;
                }
                else
                    $country_name ='';
                if(Module::isEnabled('ets_free_downloads'))
                {
                    $is_verified = (int)Db::getInstance()->getValue('SELECT is_verified FROM `'._DB_PREFIX_.'ets_fd_verification` WHERE id_customer='.(int)$session['id_customer']);
                }
                $this->context->smarty->assign(
                    array(
                        'customer' => new Customer($session['id_customer']),
                        'link_customer' => Ets_tc_session::getLinkCustomerAdmin($session['id_customer']),
                        'country_name' => $country_name,
                        'is_verified' => isset($is_verified) ? $is_verified : false,
                    )
                );
            }
        }
        else
        {
            $this->context->smarty->assign(
                array(
                    'multi_session' => true,
                )
            );
        }  
        if($session)
        {
            $this->context->smarty->assign(
                array(
                    'session' => $session,
                )
            );
            return $this->module->display(_PS_MODULE_DIR_.$this->module->name.DIRECTORY_SEPARATOR.$this->module->name.'.php', 'session_detail.tpl');  
        }
        
    }
    public function renderListSessions()
    {
        $actions = $this->module->getListActions();
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
        $fields_list = array(
            'input_box' => array(
                'title' => '',
                'width' => 40,
                'type' => 'text',
                'strip_tag'=> false,
            ),
        );
        $fields = array(
            'id_ets_tc_session' => array(
                'title' => $this->l('ID'),
                'width' => 40,
                'type' => 'text',
                'sort' => true,
                'filter' => true,
            ),
            'customer_name' => array(
                'title' => $this->l('Customer'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
                'strip_tag' => false,
            ),
            'source' => array(
                'title' => $this->l('Source'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
            ),
            'first_page' => array(
                'title' => $this->l('First visit page'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
                'strip_tag' => false,
            ),
            'last_action' => array(
                'title' => $this->l('Last action'),
                'type' => 'select',
                'sort' => true,
                'filter' => true,
                'filter_list' => array(
                    'id_option' => 'active',
                    'value' => 'title',
                    'list' => $actions
                )
            ),
            'duration' => array(
                'title' => $this->l('Duration'),
                'width' => 40,
                'type' => 'text',
                'sort' => true,
                'filter' => false,
                'strip_tag' => false,
            ),
            'total_page_visit' => array(
                'title' => $this->l('Pages Viewed'),
                'width' => 40,
                'type' => 'int',
                'sort' => true,
                'filter' => true,
            ),
            'exit_page' => array(
                'title' => $this->l('Exit page'),
                'type' => 'text',
                'sort' => true,
                'filter' => true,
                'strip_tag' => false,
            ),
            'create_account' => array(
                'title' => $this->l('Create account'),
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
            'create_order' => array(
                'title' => $this->l('Created order'),
                'type' => 'select',
                'sort' => true,
                'filter' => true,
                'strip_tag'=> false,
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
                )
            ),
            'date_add' => array(
                'title' => $this->l('Start time'),
                'width' => 40,
                'type' => 'date',
                'sort' => true,
                'filter' => true,
            ),
            'date_exit' => array(
                'title' => $this->l('Last action time'),
                'width' => 40,
                'type' => 'date',
                'sort' => true,
                'filter' => true,
            ),
            'total_action' => array(
                'title' => $this->l('Total actions'),
                'type' => 'text',
                'sort' => true,
                'filter' => false,
            ),
            'id_cart' => array(
                'title' => $this->l('ID cart'),
                'type' => 'int',
                'sort' => false,
                'filter' => false,
            ),
        );
        if (Configuration::get('ETS_TC_CUSTOM_SESSION_LIST')) {
            $custom_fields = explode(',', Configuration::get('ETS_TC_CUSTOM_SESSION_LIST'));
        } else
            $custom_fields = $this->list_session_default;
        foreach($custom_fields as $field)
        {
            $fields_list[$field] = $fields[$field];
        }
        $filter = '';

        $show_resset = false;
        if($id_customer_filter = (int)Tools::getValue('id_customer_filter'))
        {
            $filter .= ' AND s.id_customer='.(int)$id_customer_filter;
            $show_resset = true;
        }
        if(($id_ets_tc_session = Tools::getValue('id_ets_tc_session'))!='' && Validate::isCleanHtml($id_ets_tc_session))
        {
            $filter .= ' AND s.id_ets_tc_session='.(int)$id_ets_tc_session;
            $show_resset = true;
        }
        if(($customer_name= Tools::getValue('customer_name'))!='' && Validate::isCleanHtml($customer_name))
        {
            $filter .= ' AND (CONCAT(c.firstname," ",c.lastname) LIKE "%'.pSQL($customer_name).'%" OR c.email LIKE "%'.pSQL($customer_name).'%")';
            $show_resset = true;
        }  
        if(($source = Tools::getValue('source'))!=''&& Validate::isCleanHtml($source))
        {
            $filter .= ' AND s.source LIKE "%'.pSQL($source).'%"';
            $show_resset = true;
        } 
        if(($first_page = Tools::getValue('first_page'))!='' && Validate::isCleanHtml($first_page))
        {
            $filter .= ' AND s.first_page LIKE "%'.pSQL($first_page).'%"';
            $show_resset = true;
        }
        if(($exit_page = Tools::getValue('exit_page'))!='' && Validate::isCleanHtml($exit_page))
        {
            $filter .= ' AND s.exit_page LIKE "%'.pSQL($exit_page).'%"';
            $show_resset = true;
        }
        if(($last_action = Tools::getValue('last_action'))!='' && Validate::isCleanHtml($last_action))
        {
            $filter .= ' AND s.last_action LIKE "%'.pSQL($last_action).'%"';
            $show_resset = true;
        } 
        if(($create_account = Tools::getValue('create_account'))!='' && Validate::isCleanHtml($create_account))
        {
            $filter .= ' AND s.create_account = "'.(int)$create_account.'"';
            $show_resset = true;
        } 
        if(($add_cart = Tools::getValue('add_cart'))!='' && Validate::isCleanHtml($add_cart))
        {
            $filter .= ' AND s.add_cart = "'.(int)$add_cart.'"';
            $show_resset = true;
        }
        if(($create_order = Tools::getValue('create_order'))!='' && Validate::isCleanHtml($create_order))
        {
            $filter .= ' AND s.create_order = "'.(int)$create_order.'"';
            $show_resset = true;
        } 
        if(($total_page_visit_min = Tools::getValue('total_page_visit_min'))!='' && Validate::isCleanHtml($total_page_visit_min))
        {
            $filter .= ' AND s.total_page_visit >= "'.(int)$total_page_visit_min.'"';
            $show_resset = true;
        } 
        if(($total_page_visit_max = Tools::getValue('total_page_visit_max'))!='' && Validate::isCleanHtml($total_page_visit_max))
        {
            $filter .= ' AND s.total_page_visit <= "'.(int)$total_page_visit_max.'"';
            $show_resset = true;
        } 
        if(($date_add_min = Tools::getValue('date_add_min'))!='' && Validate::isDate($date_add_min))
        {
            $filter .= ' AND s.date_add >= "'.pSQL($date_add_min).' 00:00:00"';
            $show_resset = true;
        }
        if(($date_add_max = Tools::getValue('date_add_max'))!='' && Validate::isDate($date_add_max))
        {
            $filter .= ' AND s.date_add <= "'.pSQL($date_add_max).' 23:59:59"';
            $show_resset = true;
        }
        if(($date_exit_min = Tools::getValue('date_exit_min'))!='' && Validate::isDate($date_exit_min))
        {
            $filter .= ' AND s.date_exit >= "'.pSQL($date_exit_min).' 00:00:00"';
            $show_resset = true;
        }
        if(($date_exit_max = Tools::getValue('date_exit_max'))!='' && Validate::isDate($date_exit_max))
        {
            $filter .= ' AND s.date_exit <= "'.pSQL($date_exit_max).' 23:59:59"';
            $show_resset = true;
        }
        $sort = "";
        $sort_type=Tools::getValue('sort_type','desc');
        $sort_value = Tools::getValue('sort','date_exit');
        if($sort_value)
        {
            switch ($sort_value) {
                case 'id_ets_tc_session':
                    $sort .=' s.id_ets_tc_session';
                    break;
                case 'customer_name':
                    $sort .=' customer_name';
                    break;
                case 'source':
                    $sort .= ' s.source';
                    break;
                case 'first_page':
                    $sort .= ' s.first_page';
                    break;
                case 'last_action':
                    $sort .= 's.last_action';
                    break;
                case 'duration':
                    $sort .= 's.duration';
                    break;
                case 'total_page_visit':
                    $sort .= 's.total_page_visit';
                    break;
                case 'exit_page':
                    $sort .= 's.exit_page';
                    break;
                case 'create_account':
                    $sort .='s.create_account';
                    break;
                case 'create_order':
                    $sort .='s.create_order';
                    break;
                case 'add_cart':
                    $sort .='s.add_cart';
                    break;
                case 'date_add':
                    $sort .='s.date_add';
                    break;
                case 'date_exit':
                    $sort .='s.date_exit';
                    break;
                case 'total_action':
                    $sort .='total_action';
                    break;
            }
            if($sort && $sort_type && in_array($sort_type,array('asc','desc')))
                $sort .= ' '.$sort_type;  
        }

        $page = (int)Tools::getValue('page');
        if($page<=0)
            $page = 1;
        $totalRecords = (int) Ets_tc_session::_getSessions($filter,$sort,0,0,true);
        $paggination = new Ets_tc_paggination_class();            
        $paggination->total = $totalRecords;
        $paggination->url = $this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&page=_page_'.$this->module->getFilterParams($fields_list,'session').($sort_type ? '&sort_type='.($sort_type):'').($sort_value ? '&sort='.($sort_value):'');
        $paggination->limit =  (int)Tools::getValue('paginator_session_select_limit',20);
        $paggination->name ='session';
        $totalPages = ceil($totalRecords / $paggination->limit);
        if($page > $totalPages)
            $page = $totalPages;
        $paggination->page = $page;
        $start = $paggination->limit * ($page - 1);
        if($start < 0)
            $start = 0;
        $sessions= Ets_tc_session::_getSessions($filter,$sort,$start,$paggination->limit,false);
        if($sessions)
        {
            foreach($sessions as &$session)
            {
                $session['input_box'] = $this->module->displayText('','input','','bulk_action_selected-session'.$session['id_ets_tc_session'],'','','','bulk_action_selected_sessions[]',$session['id_ets_tc_session'],'checkbox');
                $session['exit_page'] = Tools::ucfirst($session['exit_page']);
                $session['first_page'] = Tools::ucfirst($session['first_page']);
                $session['child_view_url'] =$this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&viewSession=1&id_session='.(int)$session['id_ets_tc_session'];
                $session['action_edit'] = false;
                $session['action_delete'] = true;
                $session['duration'] = $this->module->displayTime($session['duration']);
                if($session['customer_name'])
                {
                    if($id_address = (int)Address::getFirstCustomerAddressId($session['id_customer']))
                    {
                        $address = new Address($id_address);
                        $country = new Country($address->id_country,$this->context->language->id);
                        $country_name = $country->name;
                    }
                    else
                        $country_name ='';
                    if(Module::isEnabled('ets_free_downloads'))
                    {
                        $is_verified = (int)Db::getInstance()->getValue('SELECT is_verified FROM `'._DB_PREFIX_.'ets_fd_verification` WHERE id_customer='.(int)$session['id_customer']);
                    }
                    $this->context->smarty->assign(
                        array(
                            'customer_name' => $session['customer_name'],
                            'email_customer' => $session['email'],
                            'link_customer' => $this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session&viewSession=1&id_session='.(int)$session['id_ets_tc_session'],
                            'country_name'=> $country_name,
                            'is_verified' => isset($is_verified) ? $is_verified : false,
                        )  
                    );
                    $session['customer_name'] = $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->module->name.'/views/templates/hook/customer.tpl');
                }
                if($session['first_page'])
                    $session['first_page'] = $this->module->displayText($session['first_page'],'a','',null,$session['first_url'],true);
                if($session['exit_page'])
                    $session['exit_page'] = $this->module->displayText($session['exit_page'],'a','',null,$session['exit_url'],true);
                $session['last_action'] = isset($actions[$session['last_action']]) ? $actions[$session['last_action']]['title'] :$session['last_action'];
                if(!$session['total_action'])
                    $session['total_action']='--';
                $status_yes = $this->module->displayText($this->l('Yes'),'span','status_yes');
                $status_no = $this->module->displayText($this->l('No'),'span','status_no');
                if($session['create_order'])
                    $session['create_order'] = $status_yes;
                else
                    $session['create_order'] = $status_no;
                if($session['add_cart'])
                    $session['add_cart'] = $status_yes;
                else
                    $session['add_cart'] = $status_no;
                if($session['create_account'])
                    $session['create_account'] = $status_yes;
                else
                    $session['create_account'] = $status_no;
            }
        }
        $paggination->text =  $this->l('Showing {start} to {end} of {total} ({pages} Pages)');
        $paggination->style_links = $this->l('links');
        $paggination->style_results = $this->l('results');
        $listData = array(
            'name' => 'session',
            'actions' => array('view','delete'),
            'icon' => 'icon-sessions',
            'currentIndex' => $this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session'.($paggination->limit!=20 ? '&paginator_session_select_limit='.$paggination->limit:''),
            'postIndex' => $this->context->link->getAdminLink('AdminTrackingCustomerSession').'&current_tab=customer_session',
            'identifier' => 'id_ets_tc_session',
            'show_toolbar' => true,
            'show_action' => true,
            'title' => $this->l('Customer sessions'),
            'fields_list' => $fields_list,
            'field_values' => $sessions,
            'paggination' => $paggination->render(),
            'filter_params' => $this->module->getFilterParams($fields_list,'session'),
            'show_reset' =>$show_resset,
            'totalRecords' => $totalRecords,
            'sort'=> $sort_value,
            'sort_type' => $sort_type,
            'show_bulk_action' => true,
            'custom_list' => true,
        );            
        return  $this->module->renderList($listData).$this->displayPopupCustomList();
    }
    public function displayPopupCustomList()
    {
        if (Configuration::get('ETS_TC_CUSTOM_SESSION_LIST')) {
            $list_fields = explode(',', Configuration::get('ETS_TC_CUSTOM_SESSION_LIST'));
        } else
            $list_fields = $this->list_session_default;
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
        return $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->module->name.'/views/templates/hook/popup_custom_list.tpl');
    }
    public function getTitleFields()
    {
        $fields =  array(
            'id_ets_tc_session' => array(
                'title' => $this->l('Session ID'),
                'group' => $this->l('Sessions'),
                'beggin' => true,
                'all' => true,
                'required' => true,
            ),
            'customer_name' => array(
                'title' => $this->l('Customer'),
                'required' => true,
            ),
            'date_add' => array(
                'title' => $this->l('Start time'),
            ),
            'date_exit' => array(
                'title' => $this->l('Last action time'),
                'end'=> true,
            ),
            'first_page' => array(
                'title' => $this->l('First visit page'),
                'group' => $this->l('Visit'),
                'beggin' => true,
                'all' => true,
            ),
            'exit_page' => array(
                'title' => 'Exit page',
                'end' => true,
            ),
            'create_account' => array(
                'title'=> $this->l('Created account'),
                'group' => $this->l('Action'),
                'beggin' => true,
                'all' => true,
            ),
            'add_cart' => array(
                'title' => $this->l('Add cart'),
            ),
            'create_order' => array(
                'title' => $this->l('Created order')
            ),
            'last_action' => array(
                'title' => $this->l('Last action'),
                'end' => true,
            ),
            'duration' => array(
                'title'=> $this->l('Duration'),
                'group' => $this->l('Measure'),
                'beggin' => true,
                'all' => true,
            ),
            'total_page_visit' => array(
                'title' => $this->l('Total viewed pages'),
            ),
            'total_action' => array(
                'title' => $this->l('Total actions'),
            ),
            'source' => array(
                'title' => $this->l('Source'),
            ),
            'id_cart' => array(
                'title' => $this->l('ID cart'),
                'end' => true,
            ),
        );
        return $fields;
    }
}