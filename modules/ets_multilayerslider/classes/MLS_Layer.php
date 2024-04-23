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
class MLS_Layer extends MLS_Obj
{
    public $id_layer;
    public $id_slide;
    public $layer_type;    
    public $font_size;
    public $top;
    public $left;
    public $right;
    public $top_right;
    public $animation_in;
    public $animation_out;
    public $move_in;
    public $move_out;
    public $start_delay;
    public $stand_duration;    
    public $content_layer;
    public $link;
    public $sort_order;
    public $image;
    public $text_color;
    public $background_color;
    public $background_opacity;
    public $font_weight;
    public $font_family;
    public $text_decoration;
    public $text_transform;
    public $width;
    public $height;
    public $padding;
    public $box_radius;
    public $custom_class;
    public static $definition = array(
		'table' => 'ets_mls_layer',
		'primary' => 'id_layer',
		'multilang' => true,
		'fields' => array(
			'id_slide' => array('type' => self::TYPE_INT), 
            'layer_type' => array('type' => self::TYPE_STRING),   
            'font_size' => array('type' => self::TYPE_FLOAT),
            'text_color'=> array('type'=>self::TYPE_STRING),
            'top' => array('type' => self::TYPE_FLOAT),
            'left' => array('type' => self::TYPE_FLOAT),
            'right' => array('type' => self::TYPE_FLOAT),
            'top_right' => array('type' => self::TYPE_FLOAT),
            'image'=>array('type'=>self::TYPE_STRING),
            'width'=>array('type'=>self::TYPE_STRING),
            'height'=>array('type'=>self::TYPE_STRING),
            'font_family'=>array('type'=>self::TYPE_STRING),
            'text_decoration'=>array('type'=>self::TYPE_STRING),
            'text_transform'=>array('type'=>self::TYPE_STRING),
            'custom_class'=>array('type'=>self::TYPE_STRING),
            'padding'=>array('type'=>self::TYPE_STRING),
            'box_radius'=>array('type'=>self::TYPE_INT),
            'font_weight'=>array('type'=>self::TYPE_STRING),
            'background_color'=>array('type'=>self::TYPE_STRING),            
            'background_opacity'=>array('type'=>self::TYPE_FLOAT),
            'animation_in'=>array('type'=>self::TYPE_STRING),
            'animation_out'=>array('type'=>self::TYPE_STRING),            
            'move_in' => array('type' => self::TYPE_INT),
            'move_out' => array('type' => self::TYPE_INT),
            'start_delay' => array('type'=>self::TYPE_INT),
            'stand_duration'=> array('type'=>self::TYPE_INT),
            'sort_order' =>array('type'=>self::TYPE_INT),
            // Lang fields
            'content_layer' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            'link' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml'),
            			            
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
        $this->setFields(Ets_multilayerslider::$layers);
	}
}
