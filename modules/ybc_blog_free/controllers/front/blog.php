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
class Ybc_blog_freeBlogModuleFrontController extends ModuleFrontController
{
    public $display_column_left = false;
    public $display_column_right = false;
    public function __construct()
	{
		parent::__construct();
        if(Configuration::get('YBC_BLOG_FREE_SIDEBAR_POSITION')=='right')
            $this->display_column_right=true;
        if(Configuration::get('YBC_BLOG_FREE_SIDEBAR_POSITION')=='left')
            $this->display_column_left =true;
		$this->context = Context::getContext();
	}
	public function init()
	{
		parent::init();
	}
	public function initContent()
	{
	    $module = new Ybc_blog_free();
		parent::initContent();
        $id_post = (int)Tools::getValue('id_post');
        $context = Context::getContext();
        if($id_post)
        {
            //Increase views            
            if(!$context->cookie->posts_viewed)
               $postsViewed = array();
            else
               $postsViewed = @unserialize($context->cookie->posts_viewed);             
            if(is_array($postsViewed) && !in_array($id_post, $postsViewed))
            {                
                if($module->itemExists('post','id_post',$id_post))
                {
                    $post = new Ybc_blog_free_post_class($id_post);
                    $post->click_number = (int)$post->click_number + 1;
                    if($post->update())
                    {
                        $postsViewed[] = $id_post;
                        $context->cookie->posts_viewed = @serialize($postsViewed);
                        $context->cookie->write();      
                    }                    
                }                
            }            
            $errors = array();
            $justAdded = false;
            $success = false;
            if(Tools::isSubmit('bcsubmit') && (int)Configuration::get('YBC_BLOG_FREE_ALLOW_COMMENT'))
            {
                $comment = new Ybc_blog_free_comment_class();
                $comment->approved = (int)Configuration::get('YBC_BLOG_FREE_COMMENT_AUTO_APPROVED') ? 1 : 0;
                $comment->subject = trim(Tools::getValue('subject'));
                $comment->comment = trim(Tools::getValue('comment'));
                $comment->id_post = (int)Tools::getValue('id_post');
                $comment->datetime_added = date('Y-m-d H:i:s');
                if((int)$this->context->cookie->id_customer)
                {
                    $comment->id_user = (int)$this->context->cookie->id_customer;
                    $comment->name = $this->context->customer->firstname.' '.$this->context->customer->lastname;
                    $comment->email = $this->context->customer->email;
                }
                else
                {
                   $comment->name = Tools::getValue('name_customer');
                   $comment->email = Tools::getValue('email_customer'); 
                }
                $comment->rating = (int)Tools::getValue('rating');
                $comment->reported = 1;
                if(!$this->context->cookie->id_customer)
                {
                    if(!Tools::getValue('name_customer'))
                    {
                        $errors[] = $this->module->l('Name is required');
                    }
                    if(Tools::getValue('email_customer') && !Validate::isEmail(Tools::getValue('email_customer')))
                    {
                        $errors[] = $this->module->l('Invalid email address');
                    }
                }
                if(Tools::strlen($comment->subject) < 10)
                    $errors[] = $this->module->l('Subject need to be at least 10 characters');
                if(Tools::strlen($comment->subject) >300)
                    $errors[] = $this->module->l('Subject can not be longer than 300 characters');  
                if(!Validate::isCleanHtml($comment->subject,false))
                    $errors[] = $this->module->l('Subject need to be clean HTML');
                if(Tools::strlen($comment->comment) < 20)
                    $errors[] = $this->module->l('Comment need to be at least 20 characters');
                if(!Validate::isCleanHtml($comment->comment,false))
                    $errors[] = $this->module->l('Comment need to be clean HTML');
                if(Tools::strlen($comment->comment) >2000)
                    $errors[] = $this->module->l('Subject can not be longer than 2000 characters');    
                if(!$comment->id_user && !(int)Configuration::get('YBC_BLOG_FREE_ALLOW_GUEST_COMMENT'))
                    $errors[] = $this->module->l('You need to log in before posting a comment');
                if((int)Configuration::get('YBC_BLOG_FREE_ALLOW_RATING'))
                {
                    if($comment->rating > 5 || $comment->rating < 1)
                        $errors[] = $this->module->l('Rating need to be from 1 to 5');
                }
                else
                    $comment->rating = 0;                
                if(!$module->itemExists('post','id_post',$comment->id_post))
                    $errors[] = $this->module->l('This post does not exist');
                if((int)Configuration::get('YBC_BLOG_FREE_USE_CAPCHA'))
                {                    
                    $savedCode = $context->cookie->security_capcha_code;
                    $capcha_code = trim(Tools::getValue('capcha_code'));                    
                    if($savedCode && Tools::strtolower($capcha_code)!=Tools::strtolower($savedCode))
                    {
                        $errors[] = $this->module->l('Security code is invalid');
                    }
                }
                if(!count($errors))
                {
                    $comment->add();
                    if((int)$this->context->cookie->id_customer)
                    {
                        $customer = new Customer((int)$this->context->cookie->id_customer);
                        $this->sendCommentNotificationEmail(
                            trim($customer->firstname.' '.$customer->lastname),
                            $customer->email,
                            $comment->subject,
                            $comment->comment,
                            $comment->rating.' '.($comment->rating != 1 ? $this->module->l('stars') : $this->module->l('star')),
                            $module->getLink('blog', array('id_post' => $comment->id_post))
                        );
                    }
                    else
                    {
                       $this->sendCommentNotificationEmail(
                            trim(Tools::getValue('name_customer')),
                            Tools::getValue('email_customer'),
                            $comment->subject,
                            $comment->comment,
                            $comment->rating.' '.($comment->rating != 1 ? $this->module->l('stars') : $this->module->l('star')),
                            $module->getLink('blog', array('id_post' => $comment->id_post))
                        ); 
                    }
                    
                    $justAdded = true;
                    $success = $this->module->l('Comment has been submitted ');
                    if($comment->approved)
                        $success .= $this->module->l('and approved');
                    else
                        $success .= $this->module->l('and waiting for approval');
                }       
            }
            $post = $this->getPost((int)Tools::getValue('id_post'));
            $id_customer = ($this->context->customer->id) ? (int)($this->context->customer->id) : 0;
            $id_group = null;
            if ($id_customer) {
                $id_group = Customer::getDefaultGroupId((int)$id_customer);
            }
            if (!$id_group) {
                $id_group = (int)Group::getCurrent()->id;
            }
            $group= new Group($id_group);
            if($post)
            {
                $urlAlias = Tools::strtolower(trim(Tools::getValue('url_alias')));
                if($urlAlias && $urlAlias != Tools::strtolower(trim($post['url_alias'])))
                    Tools::redirect($module->getLink('blog',array('id_post' => $post['id_post'])));               
                
                //check if liked post
                if(!$context->cookie->liked_posts)
                    $likedPosts = array();
                else
                    $likedPosts = @unserialize($context->cookie->liked_posts);
                
                if(is_array($likedPosts) && in_array($id_post, $likedPosts))
                    $likedPost = true;
                else
                    $likedPost = false;
                $climit = (int)Configuration::get('YBC_BLOG_FREE_MAX_COMMENT') ? (int)Configuration::get('YBC_BLOG_FREE_MAX_COMMENT') : false;
                $cstart = $climit ? 0 : false;
                $prettySkin = Configuration::get('YBC_BLOG_FREE_GALLERY_SKIN');
                $randomcode = time();
                $this->context->smarty->assign(
                    array(
                        'blog_post' => $post,
                        'allowComments' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_COMMENT') ? true : false,
                        'allowGuestsComments' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_GUEST_COMMENT') ? true : false,
                        'blogCommentAction' => $module->getLink('blog',array('id_post'=>(int)Tools::getValue('id_post'))),
                        'comment' => !$justAdded ? Tools::getValue('comment') : '',
                        'subject' => !$justAdded ?Tools::getValue('subject') : '',
                        'name_customer' => !$justAdded ? Tools::getValue('name_customer') : '',
                        'email_customer' => !$justAdded ?Tools::getValue('email_customer') : '',
                        'hasLoggedIn' => $this->context->customer->isLogged(true), 
                        'blog_errors' => $errors,
                        'comments' => $module->getCommentsWithFilter(' AND bc.approved = 1 AND bc.id_post='.(int)Tools::getValue('id_post'),' bc.id_comment desc, ',$cstart,$climit),
                        'reportedComments' => $context->cookie->reported_comments ? @unserialize($context->cookie->reported_comments) : false,
                        'blog_success' => $success,
                        'allow_report_comment' =>(int)Configuration::get('YBC_BLOG_FREE_ALLOW_REPORT') ? true : false,
                        'display_related_products' =>(int)Configuration::get('YBC_BLOG_FREE_SHOW_RELATED_PRODUCTS') ? true : false,
                        'allow_rating' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_RATING') ? true : false,
                        'default_rating' => (int)Tools::getValue('rating') > 0 && (int)Tools::getValue('rating') <=5 ? (int)Tools::getValue('rating')  :(int)Configuration::get('YBC_BLOG_FREE_DEFAULT_RATING'),
                        'everage_rating' => (int)$module->getEverageReviews($post['id_post']),
                        'total_review' =>(int)$module->countTotalReviewsWithRating($post['id_post']),
                        'use_capcha' => (int)Configuration::get('YBC_BLOG_FREE_USE_CAPCHA') ? true : false,
                        'capcha_image' => $module->getLink('capcha',array('randcode'=>$randomcode)),
                        'use_facebook_share' => (int)Configuration::get('YBC_BLOG_FREE_ENABLE_FACEBOOK_SHARE') ? true : false,
                        'use_google_share' => (int)Configuration::get('YBC_BLOG_FREE_ENABLE_GOOGLE_SHARE') ? true : false,
                        'use_twitter_share' => (int)Configuration::get('YBC_BLOG_FREE_ENABLE_TWITTER_SHARE') ? true : false,
                        'post_url' => $module->getLink('blog',array('id_post'=>(int)Tools::getValue('id_post'))),
                        'report_url' => $module->getLink('report'),
                        'likedPost' => $likedPost,                        
                        'allow_like' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_LIKE') ? true : false,
                        'show_date' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_DATE') ? true : false,
                        'show_tags' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_TAGS') ? true : false,
                        'show_categories' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_CATEGORIES') ? true : false,
                        'show_views' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_VIEWS') ? true : false,
                        'enable_slideshow' => (int)Configuration::get('YBC_BLOG_FREE_ENABLE_POST_SLIDESHOW') ? true : false,
                        'prettySkin' => in_array($prettySkin, array('dark_square','dark_rounded','default','facebook','light_rounded','light_square')) ? $prettySkin : 'dark_square', 
                        'prettyAutoPlay' => (int)Configuration::get('YBC_BLOG_FREE_GALLERY_AUTO_PLAY') ? 1 : 0,
                        'path' => $module->getBreadCrumb(),
                        'show_author' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_AUTHOR') ? 1 : 0,
                        'blog_random_code' => $randomcode,
                        'date_format' => trim((string)Configuration::get('YBC_BLOG_FREE_DATE_FORMAT')),
                        'blog_layout' => Tools::strtolower(Configuration::get('YBC_BLOG_FREE_LAYOUT')),
                        'blog_related_product_type' => Tools::strtolower(Configuration::get('YBC_RELATED_PRODUCTS_TYPE')),
                        'blog_related_posts_type' => Tools::strtolower(Configuration::get('YBC_RELATED_POSTS_TYPE')),
                        'blog_template_dir' => dirname(__FILE__).'/../../views/templates/front',
                        'breadcrumb' => $module->is17 ? $module->getBreadCrumb() : false,
                        'show_price'=>$group->show_prices,
                    )
                );   
            }
            else
                $this->context->smarty->assign(
                    array(
                        'blog_post' => false
                ));
            if($module->is17)
                $this->setTemplate('module:ybc_blog_free/views/templates/front/single_post.tpl');
            else         
                $this->setTemplate('single_post_16.tpl');             
        }
        else
        {
            $postData = $this->getPosts();            
            $this->context->smarty->assign(
                array(
                    'blog_posts' => $postData['posts'],
                    'blog_paggination' => $postData['paggination'],
                    'blog_category' => $postData['category'],
                    'blog_latest' => $postData['latest'],
                    'blog_dir' => $postData['blogDir'],
                    'blog_tag' => $postData['tag'],
                    'blog_search' => $postData['search'],
                    'is_main_page' => !$postData['category'] && !$postData['tag'] && !$postData['search'] && !Tools::isSubmit('latest') && !Tools::isSubmit('id_author') ? true : false,
                    'allow_rating' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_RATING') ? true : false,
                    'show_featured_post' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_FEATURED_BLOCK') ? true : false,
                    'allow_like' => (int)Configuration::get('YBC_BLOG_FREE_ALLOW_LIKE') ? true : false,
                    'show_date' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_DATE') ? true : false,
                    'show_views' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_VIEWS') ? true : false,
                    'path' => $module->getBreadCrumb(),
                    'date_format' => trim((string)Configuration::get('YBC_BLOG_FREE_DATE_FORMAT')),
                    'show_categories' => (int)Configuration::get('YBC_BLOG_FREE_SHOW_POST_CATEGORIES') ? true : false,
                    'blog_layout' => Tools::strtolower(Configuration::get('YBC_BLOG_FREE_LAYOUT')),
                    'blog_skin' => Tools::strtolower(Configuration::get('YBC_BLOG_FREE_SKIN')),
                    'author' => $postData['author'],     
                    'breadcrumb' => $module->is17 ? $module->getBreadCrumb() : false,              
                )
            );
            if($module->is17)
                $this->setTemplate('module:ybc_blog_free/views/templates/front/blog_list.tpl');
            else        
                $this->setTemplate('blog_list_16.tpl'); 
        }               
	}
    public function getPost($id_post)
    {
        $module = new Ybc_blog_free();
        $post = $module->getPostById($id_post);
        
        if($post)
        {
            $post['id_category'] = $module->getCategoriesStrByIdPost($post['id_post']);
            $post['tags'] = $module->getTagsByIdPost($post['id_post']);
            $post['related_posts'] = (int)Configuration::get('YBC_BLOG_FREE_DISPLAY_RELATED_POSTS') ? $module->getRelatedPosts($id_post, $post['tags'], $this->context->language->id) : false;
            if($post['related_posts'])
            {
                foreach($post['related_posts'] as &$rpost)
                    if($rpost['image'])
                    {
                        $rpost['image'] = $module->blogDir.'views/img/post/'.$rpost['image'];
                        $rpost['thumb'] = $module->blogDir.'views/img/post/thumb/'.$rpost['thumb'];
                        $rpost['link'] =   $module->getLink('blog',array('id_post'=>$rpost['id_post']));
                        $rpost['categories'] = $module->getCategoriesByIdPost($rpost['id_post'],false,true); 
                        $rpost['comments_num'] = $module->countCommentsWithFilter(' AND bc.id_post='.$rpost['id_post'].' AND approved=1');
                        if(!$this->context->cookie->liked_posts)
                            $likedPosts = array();
                        else
                            $likedPosts = @unserialize($this->context->cookie->liked_posts);   
                        if(is_array($likedPosts) && in_array($rpost['id_post'], $likedPosts))
                            $rpost['liked'] = true;
                        else
                            $rpost['liked'] = false;                        
                    }                        
            }               
            $post['img_name'] = isset($post['image']) ? $post['image'] : '';
            if($post['image'])
                $post['image'] = 'http://'.$this->context->shop->domain.$this->context->shop->getBaseURI().'modules/'.$module->name.'/views/img/post/'.$post['image'];                            
            $post['link'] = $module->getLink('blog',array('id_post'=>$post['id_post']));
            $post['categories'] = $module->getCategoriesByIdPost($post['id_post'],false,true);  
            $post['products'] = $post['products'] ? $module->getRelatedProductByProductsStr($post['products']) : false;  
            $params = array(); 
            $params['id_author'] = (int)$post['added_by'];
            $employee = $this->getAuthorById($params['id_author']);
            if($employee)
                $params['alias'] = str_replace(' ','-',trim(Tools::strtolower($employee['firstname'].' '.$employee['lastname']))); 
            $post['author_link'] = $module->getLink('blog', $params);
            return $post;
        }
        return false;
    }
    public function getPosts()
    {
        $context = Context::getContext();
        $params = array('page'=>"_page_");
        $module = new Ybc_blog_free();
        $filter = ' AND p.enabled = 1 ';
        $featurePage = false;
        $id_category = (int)trim(Tools::getValue('id_category'));
        if($id_category)
        {
            if($module->itemExists('category','id_category',$id_category))
            {
                $category = new Ybc_blog_free_category_class($id_category,$this->context->language->id);
                $urlAlias = Tools::strtolower(trim(Tools::getValue('url_alias')));
                if($urlAlias && $urlAlias != Tools::strtolower(trim($category->url_alias)))
                    Tools::redirect($module->getLink('blog',array('id_category' => $id_category)));
            }
            $filter .= " AND p.id_post IN (SELECT id_post FROM "._DB_PREFIX_."ybc_blog_free_post_category WHERE id_category = ".(int)trim(Tools::getValue('id_category')).") ";
            $params['id_category'] = (int)trim(Tools::getValue('id_category'));
        }
        elseif(trim(Tools::getValue('latest')))
        {            
            $params['latest'] = 'true';
        }                  
        elseif(trim(Tools::getValue('tag'))!='')
        {            
            $tag = addslashes(urldecode(trim(Tools::getValue('tag'))));
            $md5tag = md5(urldecode(trim(Tools::strtolower(Tools::getValue('tag')))));            
            $filter .= " AND p.id_post IN (SELECT id_post FROM "._DB_PREFIX_."ybc_blog_free_tag WHERE tag = '$tag' AND id_lang = ".$this->context->language->id.")";
            //Increase views          
            
            if(!$context->cookie->tags_viewed)
               $tagsViewed = array();
            else
               $tagsViewed = @unserialize($context->cookie->tags_viewed);
                     
            if(is_array($tagsViewed) && !in_array($md5tag, $tagsViewed))
            {   
                if($module->increasTagViews($tag))
                {
                    $tagsViewed[] = $md5tag;
                    $context->cookie->tags_viewed = @serialize($tagsViewed);
                    $context->cookie->write();    
                }                              
            }
            $params['tag'] = trim(Tools::getValue('tag'));
        }  
        elseif(trim(Tools::getValue('search'))!='')
        {
            $search = addslashes(trim(Tools::getValue('search')));
            $filter .= " AND p.id_post IN (SELECT id_post FROM "._DB_PREFIX_."ybc_blog_free_post_lang WHERE (title like '%$search%' OR description like '%$search%') AND id_lang = ".$this->context->language->id.")";
            $params['search'] = trim(Tools::getValue('search'));
        }
        elseif($id_employee = (int)Tools::getValue('id_author'))
        {
            $filter .= " AND p.added_by = ".$id_employee;
            $params['id_author'] = $id_employee;
            $employee = $this->getAuthorById($id_employee);
            if($employee)
                $params['alias'] = str_replace(' ','-',trim(Tools::strtolower($employee['firstname'].' '.$employee['lastname'])));
        }                
        else
        {
            if(Configuration::get('YBC_BLOG_FREE_MAIN_PAGE_POST_TYPE') == 'featured')
            {
                $filter .= ' AND p.is_featured = 1';
                $featurePage = true;    
            }                        
        }
            
        if(!trim(Tools::getValue('latest')))            
            $sort = 'p.sort_order ASC, p.id_post DESC, ';
        else
            $sort = 'p.id_post DESC, ';
        
        //Paggination
        $page = (int)Tools::getValue('page') && (int)Tools::getValue('page') > 0 ? (int)Tools::getValue('page') : 1;
        $totalRecords = (int)$module->countPostsWithFilter($filter);
        $paggination = new Ybc_blog_free_paggination_class();
        $paggination->total = $totalRecords;
        
        $paggination->url = $module->getLink('blog', $params);
        if(!Tools::isSubmit('id_category') && !Tools::isSubmit('search') && !Tools::isSubmit('tag') && !Tools::isSubmit('latest') && !Tools::isSubmit('id_author'))
            $paggination->limit =  (int)Configuration::get('YBC_BLOG_FREE_ITEMS_PER_PAGE') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_ITEMS_PER_PAGE') : 20;
        else
            $paggination->limit =  (int)Configuration::get('YBC_BLOG_FREE_ITEMS_PER_PAGE_INNER') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_ITEMS_PER_PAGE_INNER') : 20;
        $totalPages = ceil($totalRecords / $paggination->limit);
        if($page > $totalPages)
            $page = $totalPages;
        $paggination->page = $page;
        $start = $paggination->limit * ($page - 1);
        if($start < 0)
            $start = 0;
        if(!$featurePage)
            $posts = $module->getPostsWithFilter($filter, $sort, $start, $paggination->limit);
        else
            $posts = $module->getPostsWithFilter($filter, $sort, 0, false);        
        if(!$context->cookie->liked_posts)
            $likedPosts = array();
        else
            $likedPosts = @unserialize($context->cookie->liked_posts);
        if($posts)
        {
            foreach($posts as &$post)
            {
                $post['id_category'] = $module->getCategoriesStrByIdPost($post['id_post']);
                $post['tags'] = $module->getTagsByIdPost($post['id_post']);
                if($post['thumb'])
                    $post['thumb'] = $module->blogDir.'views/img/post/thumb/'.$post['thumb'];
                if($post['image'])
                    $post['image'] = $module->blogDir.'views/img/post/'.$post['image'];
                $post['link'] = $module->getLink('blog',array('id_post'=>$post['id_post']));
                $post['categories'] = $module->getCategoriesByIdPost($post['id_post'],false,true);
                $post['everage_rating'] = $module->getEverageReviews($post['id_post']);
                $post['total_review'] = $module->countTotalReviewsWithRating($post['id_post']);
                if(is_array($likedPosts) && in_array($post['id_post'], $likedPosts))
                    $post['liked'] = true;
                else
                    $post['liked'] = false;
            }                
        }
       
        return array(
            'posts' => $posts , 
            'paggination' => $featurePage ? '' : $paggination->render(), 
            'category' => (int)Tools::getValue('id_category') ? (($cat = $module->getCategoryById((int)Tools::getValue('id_category'))) ? $cat : array('enabled' => false)) : false,
            'blogDir' => $module->blogDir,
            'tag' => trim(Tools::getValue('tag')) !='' ? urldecode(trim(Tools::getValue('tag'))) : false,
            'search' => trim(Tools::getValue('search'))!='' ? urldecode(trim(Tools::getValue('search'))) : false,
            'latest' => trim(Tools::getValue('latest'))=='true' ? true : false,
            'author' => isset($employee) && $employee ? trim(Tools::ucfirst($employee['firstname']).' '.Tools::ucfirst($employee['lastname'])) : false,
        );
    }
    public function sendCommentNotificationEmail($customer, $bemail, $subject, $comment, $rating, $postLink)
    {
        if(!(int)Configuration::get('YBC_BLOG_FREE_ENABLE_MAIL'))
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
                        'new_comment', trim($subject) ? trim($subject) : 
                        Mail::l('New comment from customer [{customer}]', $this->context->language->id), 
                        array('{customer}' => $customer, '{email}' => $bemail,'{rating}' => $rating, '{subject}' => $subject, '{comment}'=>$comment, '{post_link}' => $postLink),  
                        trim($email), null, null, null, null, null, 
                        $mailDir, 
                        false, $this->context->shop->id
                    );   
                }                
            }
        }
    }
    private function getAuthorById($id_employee)
    {
        return Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.'employee WHERE id_employee = '.(int)$id_employee);
    }
}