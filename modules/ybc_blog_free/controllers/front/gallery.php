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
class Ybc_blog_freeGalleryModuleFrontController extends ModuleFrontController
{
	public function init()
	{
		parent::init();
	}
	public function initContent()
	{
	    $module = new Ybc_blog_free();
		parent::initContent();
        $galleryData = $this->getGalleries();
        $prettySkin = Configuration::get('YBC_BLOG_FREE_GALLERY_SKIN');
        $this->context->smarty->assign(
            array(
                'blog_galleries' => $galleryData['galleries'],
                'blog_paggination' => $galleryData['paggination'],
                'prettySkin' => in_array($prettySkin, array('dark_square','dark_rounded','default','facebook','light_rounded','light_square')) ? $prettySkin : 'dark_square', 
                'prettyAutoPlay' => (int)Configuration::get('YBC_BLOG_FREE_GALLERY_AUTO_PLAY') ? 1 : 0,
                'path' => $module->getBreadCrumb(),
                'blog_layout' => Tools::strtolower(Configuration::get('YBC_BLOG_FREE_LAYOUT')),
                'breadcrumb' => $module->is17 ? $module->getBreadCrumb() : false,
            )
        );
        if($module->is17)
            $this->setTemplate('module:ybc_blog_free/views/templates/front/gallery.tpl');
        else  
            $this->setTemplate('gallery_16.tpl');                
	}    
    public function getGalleries()
    {
        $filter = ' AND g.enabled = 1';            
        $sort = ' g.sort_order asc, g.id_gallery asc, ';
        $module = new Ybc_blog_free();
        //Paggination
        $page = (int)Tools::getValue('page') && (int)Tools::getValue('page') > 0 ? (int)Tools::getValue('page') : 1;
        $totalRecords = (int)$module->countGalleriesWithFilter($filter);
        $paggination = new Ybc_blog_free_paggination_class();
        $paggination->total = $totalRecords;
        $paggination->url = $module->getLink('gallery', array('page'=>"_page_"));
        $paggination->limit =  (int)Configuration::get('YBC_BLOG_FREE_GALLERY_PER_PAGE') > 0 ? (int)Configuration::get('YBC_BLOG_FREE_GALLERY_PER_PAGE') : 24;
        $totalPages = ceil($totalRecords / $paggination->limit);
        if($page > $totalPages)
            $page = $totalPages;
        $paggination->page = $page;
        $start = $paggination->limit * ($page - 1);
        if($start < 0)
            $start = 0;
        $galleries = $module->getGalleriesWithFilter($filter, $sort, $start, $paggination->limit);
        if($galleries)
        {
            foreach($galleries as &$gallery)
            {
                if($gallery['image'])
                {
                    $gallery['thumb'] = file_exists(dirname(__FILE__).'/../../views/img/gallery/thumb/'.$gallery['image']) ? $module->blogDir.'views/img/gallery/thumb/'.$gallery['image'] : $module->blogDir.'views/img/gallery/'.$gallery['image'];
                    $gallery['image'] = $module->blogDir.'views/img/gallery/'.$gallery['image'];                    
                }                    
            }                
        }        
        return array(
            'galleries' => $galleries , 
            'paggination' => $paggination->render()
        );
    }
}