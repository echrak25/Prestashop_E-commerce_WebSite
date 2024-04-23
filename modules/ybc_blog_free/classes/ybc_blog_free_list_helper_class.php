<?php
/**
* 2007-2015 PrestaShop
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
*  @copyright 2007-2016 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version  Release: $Revision$
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;
class Ybc_blog_free_list_helper_class extends Module
{
    public $actions = array();
    public $currentIndex = '';
    public $identifier = '';
    public $show_toolbar = true;
    public $title = '';
    public $fields_list = array();
    public function __construct()
    {
        if($this->fields_list)
        {
            foreach($this->fields_list as $id => &$field)
            {
                $field['active'] = Tools::getValue($field[$id]);
            }
        }
    }
    public function render()
    {
        if($this->fields_list)
        {
            $this->context->smarty->assign(
                array(                    
                    'actions' => $this->actions,
                    'currentIndex' => $this->currentIndex,
                    'identifier' => $this->identifier,
                    'show_toolbar' => $this->show_toolbar,
                    'title' => $this->title,
                    'fields_list' => $this->fields_list,
                )
            );
            return $this->display(__FILE__.'../', 'list_helper.tpl');
        }
    }
}