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
class Ybc_blog_free_comment_class extends ObjectModel
{
    public $id_comment;
    public $id_user;
    public $name;
    public $email;
    public $id_post;
    public $subject;
    public $comment;
    public $reply;
	public $approved;
	public $datetime_added;
	public $reported;
    public $rating;
    public $replied_by;
    public static $definition = array(
		'table' => 'ybc_blog_free_comment',
		'primary' => 'id_comment',
		'multilang' => false,
		'fields' => array(			
            'id_comment' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => false),
            'replied_by' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'id_user' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
            'name' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 5000),
            'email' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 5000),
            'rating' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'id_post' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'approved' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'reported' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true),
            'subject' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 5000),
            'comment' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 99000),
            'reply' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 99000),
            'datetime_added' =>	array('type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'size' => 500),  
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
	}
}