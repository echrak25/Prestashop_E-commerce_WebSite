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

include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_category_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_post_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_list_helper_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_paggination_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_comment_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_slide_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_gallery_class.php');
include_once(_PS_MODULE_DIR_.'ybc_blog_free/classes/ybc_blog_free_link_class.php');
class YbcImportExport extends Module
{
	public	function __construct()
	{
		$this->name = 'ybc_blog_free';
		parent::__construct();
	}
    public function getPostAllLanguage($id_post)
    {
        $sql = 'SELECT p.id_post,pl.title,pl.description,pl.short_description,pl.meta_keywords,pl.meta_description,l.iso_code FROM '._DB_PREFIX_.'ybc_blog_free_post p
            LEFT JOIN '._DB_PREFIX_.'ybc_blog_free_post_lang pl on (p.id_post = pl.id_post)
            LEFT JOIN '._DB_PREFIX_.'lang l on (pl.id_lang=l.id_lang)
            WHERE p.id_post ="'.(int)$id_post.'"
        ';
        return Db::getInstance()->executeS($sql);
    }
    public function getPosts()
    {
        $sql ='SELECT * FROM '._DB_PREFIX_.'ybc_blog_free_post';
        return Db::getInstance()->executeS($sql);
    }
    public function getCategories()
    {
        $sql ='SELECT * FROM '._DB_PREFIX_.'ybc_blog_free_category';
        return Db::getInstance()->executeS($sql);
    }
    public function getCategoryByIDPost($id_post)
    {
        $sql='SELECT c.* FROM '._DB_PREFIX_.'ybc_blog_free_category c,'._DB_PREFIX_.'ybc_blog_free_post_category pc WHERE c.id_category =pc.id_category AND pc.id_post= "'.(int)$id_post.'"';
        return Db::getInstance()->executeS($sql);
    }
    public function getCategoryAllLanguage($id_category)
    {
        $sql ='SELECT c.id_category, cl.title,cl.description,cl.meta_keywords,cl.meta_description,l.iso_code FROM '._DB_PREFIX_.'ybc_blog_free_category c
                LEFT JOIN '._DB_PREFIX_.'ybc_blog_free_category_lang cl on (c.id_category = cl.id_category)
                LEFT JOIN '._DB_PREFIX_.'lang l ON (l.id_lang= cl.id_lang)
                WHERE c.id_category="'.(int)$id_category.'"';
        return Db::getInstance()->executeS($sql);
    }
    public function getTags($id_post)
    {
        $sql = 'SELECT t.*,l.iso_code FROM '._DB_PREFIX_.'ybc_blog_free_tag t
        LEFT JOIN '._DB_PREFIX_.'lang l ON (t.id_lang=l.id_lang)
        WHERE t.id_post="'.(int)$id_post.'"
        '; 
        return Db::getInstance()->executeS($sql);
    }
    public function getSlides()
    {
        $sql ='SELECT * FROM '._DB_PREFIX_.'ybc_blog_free_slide';
        return Db::getInstance()->executeS($sql);
    }
    public function getSlideAllLanguage($id_slide)
    {
        $sql='SELECT sl.*,l.iso_code FROM '._DB_PREFIX_.'ybc_blog_free_slide_lang sl,'._DB_PREFIX_.'lang l WHERE sl.id_lang= l.id_lang AND sl.id_slide='.(int)$id_slide;
        return Db::getInstance()->executeS($sql);
    }
    public function getGalleries()
    {
        $sql= 'SELECT * FROM '._DB_PREFIX_.'ybc_blog_free_gallery';
        return Db::getInstance()->executeS($sql);
    }
    public function getGalleryAllLanguage($id_gallery)
    {
        $sql='SELECT gl.*,l.iso_code FROM '._DB_PREFIX_.'ybc_blog_free_gallery_lang gl,'._DB_PREFIX_.'lang l WHERE gl.id_lang=l.id_lang AND gl.id_gallery='.(int)$id_gallery;
        return Db::getInstance()->executeS($sql);
    }
    private function archiveThisFile($obj, $file, $server_path, $archive_path)
    {
        if (is_dir($server_path.$file)) {
            $dir = scandir($server_path.$file);
            foreach ($dir as $row) {
                if ($row[0] != '.') {
                    $this->archiveThisFile($obj, $row, $server_path.$file.'/', $archive_path.$file.'/');
                }
            }
        } else $obj->addFile($server_path.$file, $archive_path.$file);
    }
    public function generateArchive()
    {
        $errors = array();
        $zip = new ZipArchive();
        $cacheDir = dirname(__FILE__).'/../cache/';
        $zip_file_name = 'ybc_blog_free_'.date('dmYHis').'.zip';
        if ($zip->open($cacheDir.$zip_file_name, ZipArchive::OVERWRITE | ZipArchive::CREATE) === true) {
            if (!$zip->addFromString('blog-data.xml', $this->exportBlog())) {
               $errors[] = $this->l('Cannot create Menu-Info.xml');
            }
            $this->archiveThisFile($zip,'category', dirname(__FILE__).'/../views/img/', 'img/');
            $this->archiveThisFile($zip,'gallery', dirname(__FILE__).'/../views/img/', 'img/');
            $this->archiveThisFile($zip,'post', dirname(__FILE__).'/../views/img/', 'img/');
            $this->archiveThisFile($zip,'slide', dirname(__FILE__).'/../views/img/', 'img/');
            $this->archiveThisFile($zip,'temp', dirname(__FILE__).'/../views/img/', 'img/');
            $zip->close();
    
            if (!is_file($cacheDir.$zip_file_name)) {
                $errors[] = $this->l(sprintf('Could not create %1s', _PS_CACHE_DIR_.$zip_file_name));
            }
    
            if (!$errors) {
                if (ob_get_length() > 0) {
                    ob_end_clean();
                }
    
                ob_start();
                header('Pragma: public');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Cache-Control: public');
                header('Content-Description: File Transfer');
                header('Content-type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.$zip_file_name.'"');
                header('Content-Transfer-Encoding: binary');
                ob_end_flush();
                readfile($cacheDir.$zip_file_name);
                @unlink($cacheDir.$zip_file_name);
                exit;
            }
        }
        return $errors;
    }
    public function getComments($id_post)
    {
        $sql='SELECT * FROM '._DB_PREFIX_.'ybc_blog_free_comment WHERE id_post='.(int)$id_post;
        return Db::getInstance()->executeS($sql);
    }
	public function exportBlog() 
	{		
		//$filename = 'blog.xml';
//		header('Content-type: text/xml');
//		header('Content-Disposition: attachment; filename="'.$filename.'"');	
		$xml_output = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
		$xml_output .= '<entity_profile>'."\n";	
        $categories =$this->getCategories();
        if($categories)
            foreach($categories as $category)
            {
                $xml_output .='<category id_category="'.$category['id_category'].'" image="'.$category['image'].'" added_by="'.$category['added_by'].'" modified_by="'.$category['modified_by'].'" enabled="'.$category['enabled'].'" datetime_added="'.$category['datetime_added'].'" datetime_modified="'.$category['datetime_modified'].'" sort_order="'.$category['sort_order'].'">'."\n";
                $categoryLanguages = $this->getCategoryAllLanguage($category['id_category']);
                    if($categoryLanguages)
                    {
                       foreach($categoryLanguages as $categoryLanguage)
                       {
                            $xml_output .='<categorylanguage iso_code="'.$categoryLanguage['iso_code'].'">'."\n";
                                $xml_output .='<title>'.$categoryLanguage['title'].'</title>'."\n";
                                $xml_output .='<url_alias>'.$categoryLanguage['url_alias'].'</url_alias>'."\n";
                                $xml_output .='<description><![CDATA['.$categoryLanguage['description'].']]></description>'."\n";
                                $xml_output .='<meta_keywords>'.$categoryLanguage['meta_keywords'].'</meta_keywords>'."\n";
                                $xml_output .='<meta_description>'.$categoryLanguage['meta_description'].'</meta_description>'."\n";
                            $xml_output .='</categorylanguage>'."\n";
                       } 
                    }
                $xml_output .='</category>'."\n";
            }
        $posts = $this->getPosts();
        if($posts)
            foreach($posts as $post)
            {
                $id_post= $post['id_post'];
                $xml_output .= '<post id_post="'.$post['id_post'].'" is_featured="'.$post['is_featured'].'" products="'.$post['products'].'" thumb = "'.$post['thumb'].'" image ="'.$post['image'].'" added_by ="'.(int)$post['added_by'].'" modified_by="'.(int)$post['modified_by'].'" enabled="'.$post['enabled'].'" datetime_added ="'.$post['datetime_added'].'" datetime_modified="'.$post['datetime_modified'].'" datetime_active="'.$post['datetime_active'].'" sort_order="'.$post['sort_order'].'" click_number="'.(int)$post['click_number'].'" likes ="'.$post['likes'].'" >'."\n";					
                $postAllLanguage = $this->getPostAllLanguage($id_post);
                if($postAllLanguage)
                {
                    foreach($postAllLanguage as $language)
                    {
                        $xml_output .='<language iso_code ="'.$language['iso_code'].'">'."\n";
                            $xml_output .='<title>'.$language['title'].'</title>'."\n";
                            $xml_output .='<url_alias>'.$language['url_alias'].'</url_alias>'."\n";
                            $xml_output .='<description><![CDATA['.$language['description'].']]></description>'."\n";
                            $xml_output .='<short_description><![CDATA['.$language['short_description'].']]></short_description>'."\n";
                            $xml_output .='<meta_keywords>'.$language['meta_keywords'].'</meta_keywords>'."\n";
                            $xml_output .='<meta_description>'.$language['meta_description'].'</meta_description>'."\n";
                        $xml_output .='</language>'."\n";
                    }
                }
                $categories = $this->getCategoryByIDPost($id_post);
                if($categories)
                    foreach($categories as $category)
                    {
                       $xml_output .='<category id_category="'.$category['id_category'].'">'."\n";
                       $xml_output .='</category>'."\n"; 
                    }
                $tags =$this->getTags($id_post);
                if($tags)
                    foreach($tags as $tag)
                    {
                        $xml_output .='<tags iso_code="'.$tag['iso_code'].'" tag="'.$tag['tag'].'" click_number="'.$tag['click_number'].'"></tags>'."\n";
                    }
                $comments = $this->getComments($id_post);
                if($comments)
                    foreach($comments as $comment)
                    {
                        $xml_output .='<comment id_user="'.$comment['id_user'].'" name="'.$comment['name'].'" email="'.$comment['email'].'" subject="'.$comment['subject'].'" replied_by="'.$comment['replied_by'].'" rating="'.$comment['rating'].'" approved="'.$comment['approved'].'" datetime_added="'.$comment['datetime_added'].'" reported="'.$comment['reported'].'">'."\n";
                            $xml_output .='<comment_text>'.$comment['comment'].'</comment_text>'."\n";
                            $xml_output .='<reply>'.$comment['reply'].'</reply>'."\n";
                        $xml_output .='</comment>'."\n";
                    }
                    
                $xml_output .= '</post>'."\n";
            }
        $slides = $this->getSlides();
        if($slides)
            foreach($slides as $slide)
            {
                $xml_output .='<slide id_slide="'.(int)$slide['id_slide'].'" image="'.$slide['image'].'" enabled="'.$slide['enabled'].'" sort_order="'.$slide['sort_order'].'">'."\n";
                    $slideLanguages= $this->getSlideAllLanguage($slide['id_slide']);
                    if($slideLanguages)
                        foreach($slideLanguages as $slideLanguage)
                        {
                            $xml_output .='<slidelanguage iso_code="'.$slideLanguage['iso_code'].'">'."\n";
                                $xml_output .='<caption>'.$slideLanguage['caption'].'</caption>'."\n";
                                $xml_output .='<url>'.$slideLanguage['url'].'</url>'."\n";
                            $xml_output .='</slidelanguage>'."\n";
                        }
                $xml_output .='</slide>'."\n";
            }
        $galleries= $this->getGalleries();
        if($galleries)
            foreach($galleries as $gallery)
            {
                $xml_output .='<gallery id_gallery="'.(int)$gallery['id_gallery'].'" image="'.$gallery['image'].'" is_featured="'.$gallery['is_featured'].'" enabled="'.$gallery['enabled'].'" sort_order="'.$gallery['sort_order'].'">'."\n";
                    $galleryLanguages= $this->getGalleryAllLanguage($gallery['id_gallery']);
                    if($galleryLanguages)
                        foreach($galleryLanguages as $galleryLanguage)
                        {
                            $xml_output .='<gallerylanguage iso_code="'.$galleryLanguage['iso_code'].'">'."\n";
                                $xml_output .='<title>'.$galleryLanguage['title'].'</title>'."\n";
                                $xml_output .='<description>'.$galleryLanguage['description'].'</description>'."\n";
                            $xml_output .='</gallerylanguage>'."\n";
                        }
                $xml_output .='</gallery>'."\n";
            }
		$xml_output .= '</entity_profile>'."\n";
        return str_replace('&','and',$xml_output);
//		echo $xml_output; 
//		exit;		
	}
    public function processImport($zipfile = false)
    {
        $errors = array();
        if(!$zipfile)
        {
            $savePath = dirname(__FILE__).'/../cache/';
            if(@file_exists($savePath.'ybc_blog_free.data.zip'))
                @unlink($savePath.'ybc_blog_free.data.zip');
            $uploader = new Uploader('blogdata');
            $uploader->setCheckFileSize(false);
            $uploader->setAcceptTypes(array('zip'));        
            $uploader->setSavePath($savePath);
            $file = $uploader->process('ybc_blog_free.data.zip');
            if ($file[0]['error'] === 0) {
                if (!Tools::ZipTest($savePath.'ybc_blog_free.data.zip'))
                    $errors[] = $this->l('Zip file seems to be broken');
            } else {
                $errors[] = $file[0]['error'];
            }
            $extractUrl = $savePath.'ybc_blog_free.data.zip';
        }
        else      
            $extractUrl = $zipfile;
        if(!@file_exists($extractUrl))
            $errors[] = $this->l('Zip file doesn\'t exist');
        if(!$errors)
        {
            $zip = new ZipArchive();
            if($zip->open($extractUrl) === true)
            {
                if ($zip->locateName('blog-data.xml') === false)
                {
                    $errors[] = $this->l('blog-data.xml doesn\'t exist');                    
                    if($extractUrl && !$zipfile)
                    {
                        @unlink($extractUrl);                        
                    }                      
                }
            }
            else
                $errors[] = $this->l('Cannot open zip file. It might be broken or damaged');
        } 
        if(!$errors)
        {
            if(!Tools::ZipExtract($extractUrl, dirname(__FILE__).'/../views/'))
                $errors[] = $this->l('Cannot extract zip data');
            if(!@file_exists(dirname(__FILE__).'/../views/blog-data.xml'))
                $errors[] = $this->l('Neither blog-data.xml exist');
        }        
        if(!$errors)
        {            
            if(@file_exists(dirname(__FILE__).'/../views/blog-data.xml'))
            {
                $this->importData(dirname(__FILE__).'/../views/blog-data.xml');
                @unlink(dirname(__FILE__).'/../views/blog-data.xml');
            }              
        }
        return $errors;        
    }
    public function importData($file_xml)
    {
        if (file_exists($file_xml))	
		{	
    		$xml = simplexml_load_file($file_xml);
            $categories=array();
            if(isset($xml->category) && $xml->category)
            {
                foreach($xml->category as $category_xml)
                {
                    if(Tools::getValue('importoverride') && $this->itemExists('category','id_category',(int)$category_xml['id_category']))
                         $category = new Ybc_blog_free_category_class((int)$category_xml['id_category']);
                    else
                        $category = new Ybc_blog_free_category_class();
                    $category->enabled = (int)$category_xml['enabled'];
                    $category->image = (string)$category_xml['image'];;
                    $category->sort_order = (int)$category_xml['sort_order'];;
                    $category->datetime_added = (string)$category_xml['datetime_added'];;
                    $category->datetime_modified = (string)$category_xml['datetime_modified'];;
                    $category->added_by = (int)Context::getContext()->employee->id;
                    $category->modified_by = (int)Context::getContext()->employee->id;
                    if($category_xml->categorylanguage)
                    {
                        foreach($category_xml->categorylanguage as $categorylanguage)
                        {
                            if((string)$categorylanguage['iso_code'])
                            {
                                $id_lang= Language::getIdByIso((string)$categorylanguage['iso_code']);
                                if($id_lang)
                                {
                                    $category->title[$id_lang] = (string)$categorylanguage->title;
                                    $category->url_alias[$id_lang] =(string)$categorylanguage->url_alias;
                                    $category->description[$id_lang] = (string)$categorylanguage->description[0];
                                    $category->meta_description[$id_lang] = (string)$categorylanguage->meta_description;
                                    $category->meta_keywords[$id_lang] = (string)$categorylanguage->meta_keywords;
                                }
                            }
                            
                        }
                    }
                    $category->save();
                    $categories[(int)$category_xml['id_category']] = $category->id;     
                }
            }
            if(isset($xml->post) && $xml->post)
            {
                foreach ($xml->post as $post_xml)
        		{
        		    if(Tools::getValue('importoverride') && $this->itemExists('post','id_post',(int)$post_xml['id_post']))  
                        $post = new Ybc_blog_free_post_class((int)$post_xml['id_post']);
                    else
                        $post = new Ybc_blog_free_post_class();
                    $post->enabled = (int)$post_xml['enabled'];
                    $post->sort_order = (int)$post_xml['sort_order'];
                    $post->datetime_added = (string)$post_xml['datetime_added'];
                    $post->datetime_modified = (string)$post_xml['datetime_modified'];
                    $post->added_by = (int)Context::getContext()->employee->id;
                    $post->modified_by = (int)Context::getContext()->employee->id;
                    $post->click_number = (int)$post_xml['click_number'];
                    $post->likes = (int)$post_xml['likes'];
                    $post->products = (string)$post_xml['products'];
                    $post->thumb = (string)$post_xml['thumb'];
                    $post->image = (string)$post_xml['image'];
                    $post->is_featured = (int)$post_xml['is_featured'];
                    if($post_xml->language)       
                        foreach($post_xml->language as $language)
                        {
                            if((string)$language['iso_code'])
                            {
                                $id_lang = Language::getIdByIso((string)$language['iso_code']);
                                if($id_lang)
                                {
                                    $post->title[$id_lang] =(string)$language->title;
                                    $post->url_alias[$id_lang] = (string)$language->url_alias;
                                    $post->short_description[$id_lang] = (string)$language->short_description[0];
                                    $post->description[$id_lang] = (string)$language->description[0];
                                    $post->meta_description[$id_lang] =(string)$language->meta_description;
                                    $post->meta_keywords[$id_lang] = (string)$language->meta_keywords;
                                }
                            }  
                        }
                    $post->save();
                    Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'ybc_blog_free_post_category WHERE id_post='.(int)$post->id);
                    if(isset($post_xml->category)&&$post_xml->category)
                    {
                        foreach($post_xml->category as $category_xml)
                        {
                            $id_category = $categories[(int)$category_xml['id_category']];
                            Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'ybc_blog_free_post_category values("'.(int)$post->id.'","'.(int)$id_category.'")');
                        }
                    }
                    if(Tools::getValue('importoverride'))
                    {
                        Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'ybc_blog_free_tag WHERE id_post='.(int)$post->id);
                    }
                    if(isset($post_xml->tags)&& $post_xml->tags)
                    {
                        foreach($post_xml->tags as $tag_xml)
                        {
                            if((string)$tag_xml['iso_code'])
                            {
                                $id_lang = Language::getIdByIso((string)$tag_xml['iso_code']);
                                $tag= (string)$tag_xml['tag'];
                                $click_number= (int)$tag_xml['click_number'];
                                Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'ybc_blog_free_tag (id_post,id_lang,tag,click_number) values("'.(int)$post->id.'","'.(int)$id_lang.'","'.$tag.'","'.$click_number.'")');
                            }
                        }
                    }
                    if(Tools::getValue('importoverride'))
                    {
                        Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'ybc_blog_free_comment WHERE id_post='.(int)$post->id);
                    }
                    if(isset($post_xml->comment) && $post_xml->comment)
                        foreach($post_xml->comment as $comment_xml)
                        {
                            $comment= new Ybc_blog_free_comment_class();
                            $comment->id_user= (int)$comment_xml['id_user'];
                            $comment->name =(string)$comment_xml['name'];
                            $comment->email =(string)$comment_xml['email'];
                            $comment->id_post=(int)$post->id;
                            $comment->subject = (string)$comment_xml['subject'];
                            $comment->comment = (string)$comment_xml->comment_text;
                            $comment->reply= (string)$comment_xml->reply;
                            $comment->replied_by=(int)Context::getContext()->employee->id;
                            $comment->rating=(int)$comment_xml['rating'];
                            $comment->approved =(int)$comment_xml['approved'];
                            $comment->datetime_added =(string)$comment_xml['datetime_added'];
                            $comment->reported=(int)$comment_xml['reported'];
                            $comment->save();
                        }
                }
            }
            if(isset($xml->slide) && $xml->slide)
            {
                foreach ($xml->slide as $slide_xml)
        		{
        		    if(Tools::getValue('importoverride') && $this->itemExists('slide','id_slide',(int)$slide_xml['id_slide']))
                        $slide = new Ybc_blog_free_slide_class((int)$slide_xml['id_slide']);
                    else
                        $slide = new Ybc_blog_free_slide_class();
                    $slide->enabled = $slide_xml['enabled'];
                    $slide->image = $slide_xml['image'];
                    $slide->sort_order = $slide_xml['sort_order'];
                    if($slide_xml->slidelanguage)
                        foreach($slide_xml->slidelanguage as $slidelanguage)
                        {
                            if((string)$slidelanguage['iso_code'])
                            {
                                $id_lang = Language::getIdByIso((string)$slidelanguage['iso_code']);
                                if($id_lang)
                                {
                                    $slide->caption[$id_lang] = (string)$slidelanguage->caption;
                                    $slide->url[$id_lang] = (string)$slidelanguage->url;
                                }
                            }
                        }
                    $slide->save();
      		    }
            }
            if(isset($xml->gallery)&& $xml->gallery)
            {
                foreach($xml->gallery as $gallery_xml)
                {
                    if(Tools::getValue('importoverride') && $this->itemExists('gallery','id_gallery',(int)$gallery_xml['id_gallery']))
                        $gallery = new Ybc_blog_free_gallery_class((int)$gallery_xml['id_gallery']);
                    else
                        $gallery = new Ybc_blog_free_gallery_class();
                    $gallery->enabled = (int)$gallery_xml['$gallery'];
                    $gallery->image = (string)$gallery_xml['image'];
                    $gallery->sort_order = (int)$gallery_xml['sort_order'];
                    //$gallery->url = (string)$gallery_xml['url'];
                    $gallery->is_featured = (int)$gallery_xml['is_featured'];
                    if($gallery_xml->gallerylanguage)
                    foreach($gallery_xml->gallerylanguage as $gallerylanguage)
                    {
                        if((string)$gallerylanguage['iso_code'])
                        {
                            $id_lang = Language::getIdByIso((string)$gallerylanguage['iso_code']);
                            if($id_lang)
                            {
                                $gallery->title[$id_lang] = (string)$gallerylanguage->title;
                                $gallery->description[$id_lang] =(string)$gallerylanguage->description;
                            }
                        }
                        
                    }
                    $gallery->save();
                }
            }
        }
    }
    public function itemExists($tbl, $primaryKey, $id)
	{
		$req = 'SELECT `'.$primaryKey.'`
				FROM `'._DB_PREFIX_.'ybc_blog_free_'.$tbl.'` tbl
				WHERE tbl.`'.$primaryKey.'` = '.(int)$id;
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($req);        
		return ($row);
	}
}