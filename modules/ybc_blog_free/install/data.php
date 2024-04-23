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
    $languages = Language::getLanguages(false);
    $tempDir = dirname(__FILE__).'/../views/img/temp/';
    $imgDir = dirname(__FILE__).'/../views/img/';
    //Install sample data
    //Category
    $category = new Ybc_blog_free_category_class();
    $category->id_category = 1;
    $category->enabled = 1;
    $category->image = '';
    $category->sort_order = 1;
    $category->datetime_added = date('Y-m-d H:i:s');
    $category->datetime_modified = date('Y-m-d H:i:s');
    $category->added_by = (int)Context::getContext()->employee->id;
    $category->modified_by = (int)Context::getContext()->employee->id;
    foreach($languages as $language)
    {
        $category->url_alias[$language['id_lang']] = 'sample-category';
        $category->title[$language['id_lang']] = 'Sample category';
        $category->description[$language['id_lang']] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
        $category->meta_description[$language['id_lang']] = 'Sample category meta description';
        $category->meta_keywords[$language['id_lang']] = 'Lorem,ipsum';
    }
    $category->save();
    
    //Post
    for ($i = 1; $i <= 1; $i++){
        $post = new Ybc_blog_free_post_class();
        $post->id_post = $i;
        $post->enabled = $i;
        $post->sort_order = $i;
        $post->datetime_added = date('Y-m-d H:i:s');
        $post->datetime_modified = date('Y-m-d H:i:s');
        $post->added_by = (int)Context::getContext()->employee->id;
        $post->modified_by = (int)Context::getContext()->employee->id;
        $post->click_number = 0;
        $post->likes = 0;
        $post->products = '';
        $post->thumb = 'post-thumb-sample.jpg';
        $post->image = 'post.jpg';
        $post->is_featured = 1;        
        foreach($languages as $language)
        {
            $post->title[$language['id_lang']] = 'Sample blog title';
            $post->url_alias[$language['id_lang']] = 'sample-post'.$i;
            $post->short_description[$language['id_lang']] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
            $post->description[$language['id_lang']] = 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';
            $post->description[$language['id_lang']] .= '<br/>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';
            $post->description[$language['id_lang']] .= '<br/>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';
            $post->description[$language['id_lang']] .= '<br/>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';
            $post->description[$language['id_lang']] .= '<br/>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';
            $post->meta_description[$language['id_lang']] = 'Sample post meta description';
            $post->meta_keywords[$language['id_lang']] = 'Lorem,minim';
        }
        $post->save();
        if(file_exists($tempDir.'post.jpg'))
            @copy($tempDir.'post.jpg',$imgDir.'post/post.jpg');
        if(file_exists($tempDir.'post-thumb-sample.jpg'))
            @copy($tempDir.'post-thumb-sample.jpg',$imgDir.'post/thumb/post-thumb-sample.jpg');
        
        $req ="INSERT INTO "._DB_PREFIX_."ybc_blog_free_post_category(id_post, id_category)  VALUES(".(int)$i.",1)";
        Db::getInstance()->execute($req);
        
        foreach($languages as $language)
        {
            $req ="INSERT INTO "._DB_PREFIX_."ybc_blog_free_tag(id_post, id_lang, tag, click_number)  VALUES(".(int)$i.",".(int)$language['id_lang'].",'Lorem',0)";
            Db::getInstance()->execute($req);
            $req ="INSERT INTO "._DB_PREFIX_."ybc_blog_free_tag(id_post, id_lang, tag, click_number)  VALUES(".(int)$i.",".(int)$language['id_lang'].",'Consectetur',0)";
            Db::getInstance()->execute($req);
        }    
    }
    
    $slide = new Ybc_blog_free_slide_class();
    $slide->id_slide = 1;
    $slide->enabled = 1;
    $slide->image = 'slide1.jpg';
    $slide->sort_order = 1;
    foreach($languages as $language)
    {
        $slide->url[$language['id_lang']] = '';
        $slide->caption[$language['id_lang']] = 'Lorem ipsum dolor sit amet consectetur adipiscing Elit sed do eiusmod tempor incididunt ut labore et';        
    }    
    $slide->save();
    if(file_exists($tempDir.'slide1.jpg'))
        @copy($tempDir.'slide1.jpg',$imgDir.'slide/slide1.jpg');
        
    $slide = new Ybc_blog_free_slide_class();
    $slide->id_slide = 2;
    $slide->enabled = 1;
    $slide->image = 'slide2.jpg';
    $slide->sort_order = 1;
    foreach($languages as $language)
    {
        $slide->url[$language['id_lang']] = '';
        $slide->caption[$language['id_lang']] = 'Lorem ipsum dolor sit amet consectetur adipiscing Elit sed do eiusmod tempor incididunt ut labore et';
    }    
    $slide->save();
    if(file_exists($tempDir.'slide2.jpg'))
        @copy($tempDir.'slide2.jpg',$imgDir.'slide/slide2.jpg');
        
    //Gallery
    $gallery = new Ybc_blog_free_gallery_class();
    $gallery->id_gallery = 1;
    $gallery->enabled = 1;
    $gallery->image = 'gallery.jpg';
    $gallery->sort_order = 1;
    $gallery->url = '';
    $gallery->is_featured = 1;
    foreach($languages as $language)
    {
        $gallery->title[$language['id_lang']] = 'Sample gallery';  
        $gallery->description[$language['id_lang']] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et';              
    }    
    $gallery->save();
    if(file_exists($tempDir.'gallery.jpg'))
        @copy($tempDir.'gallery.jpg',$imgDir.'gallery/gallery.jpg');
    if(file_exists($tempDir.'gallery-thumb.jpg'))
        @copy($tempDir.'gallery-thumb.jpg',$imgDir.'gallery/thumb/gallery-thumb.jpg');