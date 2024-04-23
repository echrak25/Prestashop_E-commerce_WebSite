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
class MLS_Slide extends MLS_Obj
{
    public $id_slide;
    public $image;    
    public $sort_order;
    public $backgroud_color;
    public $enabled;
    public $animation_in;
    public $animation_out;
    public $title;
    public $repeat_x;
    public $repeat_y;
    public $custom_class;
    public static $definition = array(
		'table' => 'ets_mls_slide',
		'primary' => 'id_slide',
		'multilang' => true,
		'fields' => array(
			'image' => array('type' => self::TYPE_STRING), 
            'sort_order' => array('type' => self::TYPE_INT),   
            'backgroud_color' => array('type' => self::TYPE_STRING),
            'enabled' => array('type' => self::TYPE_INT),
            'repeat_x' => array('type' => self::TYPE_INT),
            'repeat_y' => array('type' => self::TYPE_INT),
            'animation_in' => array('type' => self::TYPE_STRING),
            'animation_out' => array('type' => self::TYPE_STRING),
            'custom_class' => array('type' => self::TYPE_STRING),
            // Lang fields
            'title' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),			            
        )
	);
    public	function __construct($id_item = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_item, $id_lang, $id_shop);
        $languages = Language::getLanguages(false);         
        foreach($languages as $lang)
        {
            foreach(self::$definition['fields'] as $field => $params)
            {   
                $temp = $this->$field; 
                if(isset($params['lang']) && $params['lang'] && !isset($temp[$lang['id_lang']]))
                {                      
                    $temp[$lang['id_lang']] = '';                        
                }
                $this->$field = $temp;
            }
        }
        unset($context);        
        $this->setFields(Ets_multilayerslider::$slides);
	}
}
