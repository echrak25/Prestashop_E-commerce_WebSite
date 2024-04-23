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
class Ybc_blog_freeReportModuleFrontController extends ModuleFrontController
{
    public function init()
	{ 	  
	     $json = array();
	     $id_comment = (int)Tools::getValue('id_comment');
         $module = new Ybc_blog_free();
         if(!$module->itemExists('comment','id_comment',$id_comment))
         {
            $json['error'] = $this->module->l('This comment does not exist');
            die(json_encode($json));
         }
         if(!(int)Configuration::get('YBC_BLOG_FREE_ALLOW_REPORT'))
         {
            $json['error'] = $this->module->l('You are not allowed to report this comment');
            die(json_encode($json));
         }
         if(!isset($this->context->cookie->id_customer) || isset($this->context->cookie->id_customer) && !$this->context->cookie->id_customer)
         {
            $json['error'] = $this->module->l('Please login to report this comment');
            die(json_encode($json));
         }
         $context = Context::getContext();
         if(!$context->cookie->reported_comments)
            $reportedComments = array();
         else
            $reportedComments = @unserialize($context->cookie->reported_comments); 
         
         if(is_array($reportedComments) && !in_array($id_comment, $reportedComments))
         {
             $reportedComments[] = $id_comment;
             $context->cookie->reported_comments = @serialize($reportedComments);
             $context->cookie->write();	
             $customer = new Customer((int)$this->context->cookie->id_customer);             
             $comment = new Ybc_blog_free_comment_class($id_comment);
             $comment->reported = 0;
             $comment->update();             
             $json['success'] = $this->module->l('Successfully reported');
             $this->sendNotification(
                $comment->id_comment,
                $comment->subject,
                $comment->comment,
                $comment->rating.' '.($comment->rating != 1 ? $this->module->l('stars') : $this->module->l('star')),
                $module->getLink('blog', array('id_post' => $comment->id_post)),
                trim($customer->firstname.' '.$customer->lastname),
                $customer->email
             );
             die(json_encode($json));
         }
         $json['error'] = $this->module->l('This comment has been reported');
         die(json_encode($json));
	}
    public function sendNotification($id_comment, $subject, $comment, $rating, $postLink, $reporter, $remail)
    {
        if(!(int)Configuration::get('YBC_BLOG_FREE_ENABLE_MAIL_REPORT'))
            return false;
        $mailDir = dirname(__FILE__).'/../../mails/';
        $lang = new Language((int)$this->context->language->id);
        $mail_lang_id = (int)$this->context->language->id;
        if(!is_dir($mailDir.$lang->iso_code))
           $mail_lang_id = (int)Configuration::get('PS_LANG_DEFAULT'); 
        if(Configuration::get('YBC_BLOG_FREE_ALERT_EMAILS'))
            $emails = explode(',',Configuration::get('YBC_BLOG_FREE_ALERT_EMAILS'));
        else
            $emails = array();
        if($emails)
        {
            foreach($emails as $email)
            {    
                if(Validate::isEmail(trim($email)))
                {
                    Mail::Send(
                        $mail_lang_id, 
                        'report_comment', Mail::l('A blog comment is reported', $this->context->language->id), 
                        array('{reporter}' => $reporter, '{email}' => $remail,'{rating}' => $rating, '{subject}' => $subject, '{comment}'=>$comment, '{post_link}' => $postLink,'{id_comment}' => $id_comment),  
                        trim($email), null, null, null, null, null, 
                        $mailDir, 
                        false, $this->context->shop->id
                    );   
                }                
            }
        }
    }
}