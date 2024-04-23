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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version  Release: $Revision$
 *  International Registered Trademark & Property of PrestaShop SA
 */

class Ybc_productimagehoverAjaxModuleFrontController extends ModuleFrontController
{
    public $ssl = true;

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        $list = array();
        if (($ids = explode(',', Tools::getValue('ids'))) && is_array($ids) && $ids) {
            $temp = array();
            // validate input string to array list id product
            foreach ($ids as $id)
                if (!in_array((int)$id, $temp))
                    $temp[] = (int)$id;
            // getlist image to input list product id
            if ($temp) {
                $imageType = ImageType::getFormattedName('home');
                foreach ($temp as $id_product) {
                    $image = Db::getInstance()->getRow("SELECT id_image FROM  `" . _DB_PREFIX_ . "image` 
                       WHERE  `id_product` = '" . (int)$id_product . "' AND (cover = 0 OR cover IS NULL) 
                       ORDER BY  `position` ASC");
                    if (!$image) {
                        $image = Db::getInstance()->getRow("SELECT id_image 
                           FROM  `" . _DB_PREFIX_ . "image` 
                           WHERE  `id_product` =  '" . (int)$id_product . "' AND cover =  1 ORDER BY  `position` ASC");
                    }
                    if ($image) {
                        $res = Db::getInstance()->getRow("
                            SELECT DISTINCT i.id_image, pl.id_product, pl.link_rewrite, pl.name
                            FROM `" . _DB_PREFIX_ . "image` i
                            LEFT JOIN `" . _DB_PREFIX_ . "product_lang` pl ON (pl.id_product = i.id_product AND pl.id_lang ='" . (int)$this->context->language->id . "')
                            WHERE pl.id_product = '" . (int)$id_product . "' AND i.id_image ='" . (int)$image['id_image'] . "'
                            GROUP BY pl.id_product  ORDER BY `position`
                        ");
                    }
                    if (isset($res) && $res) {
                        $link_rewrite = $this->context->link->getImageLink($res['link_rewrite'], (int)$res['id_image'], $imageType);
                        $list[$res['id_product']] = '<img class="' . (Configuration::get('YBC_PI_TRANSITION_EFFECT') ? Configuration::get('YBC_PI_TRANSITION_EFFECT') : 'fade') . ' replace-2x img-responsive ybc_img_hover" src="' . $link_rewrite . '" alt="' . $res['name'] . '" itemprop="image" title="' . $res['name'] . '"/>';
                    }
                }
            }
        }
        die(json_encode($list));
    }
}