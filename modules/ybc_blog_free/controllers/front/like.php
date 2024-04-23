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
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version  Release: $Revision$

*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;
class Ybc_blog_freeLikeModuleFrontController extends ModuleFrontController
{
    public function init()
	{
	     $json = array();
	     $id_post = (int)Tools::getValue('id_post');
         $module = new Ybc_blog_free();
         if(!$module->itemExists('post','id_post',$id_post))
         {
            $json['error'] = $this->module->l('This post does not exist');
            die(json_encode($json));
         }
         if(!(int)Configuration::get('YBC_BLOG_FREE_ALLOW_LIKE'))
         {
            $json['error'] = $this->module->l('You are not allowed to like the post');
            die(json_encode($json));
         }
         if(!(int)Configuration::get('YBC_BLOG_FREE_GUEST_LIKE') && !$this->context->customer->id)
         {
            $json['error'] = $this->module->l('You need to login to like the post');
            die(json_encode($json));
         }   
         $context = Context::getContext();
         if(!$context->cookie->liked_posts)
            $likedPosts = array();
         else
            $likedPosts = @unserialize($context->cookie->liked_posts);  
         if(is_array($likedPosts) && !in_array($id_post,$likedPosts))
         {
             $likedPosts[] = $id_post;
             $post = new Ybc_blog_free_post_class($id_post);
             $post->likes = $post->likes+1;
             if($post->update())
             {
                $context->cookie->liked_posts = @serialize($likedPosts);
                 $context->cookie->write();
                 $json['likes'] = $post->likes;
                 $json['success'] = $this->module->l('Successfully liked the post');
                 die(json_encode($json));
             }             
         }
         $json['error'] = $this->module->l('You have liked this post');
         die(json_encode($json));
	}
}