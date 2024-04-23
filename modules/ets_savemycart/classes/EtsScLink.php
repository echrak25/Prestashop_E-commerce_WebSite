<?php
/**
 * Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

class EtsScLink
{
    static $_INSTANCE;

    public static function getInstance()
    {
        if (!self::$_INSTANCE) {
            self::$_INSTANCE = new EtsScLink();
        }

        return self::$_INSTANCE;
    }


    public function getLangLink($idLang = null, Context $context = null, $idShop = null)
    {
        static $psRewritingSettings = null;
        if ($psRewritingSettings === null) {
            $psRewritingSettings = (int)Configuration::get('PS_REWRITING_SETTINGS', null, null, $idShop);
        }

        if (!$context) {
            $context = Context::getContext();
        }

        if ((!(int)Configuration::get('PS_REWRITING_SETTINGS') && in_array($idShop, [$context->shop->id, null])) || !Language::isMultiLanguageActivated($idShop) || !$psRewritingSettings) {
            return '';
        }

        if (!$idLang) {
            $idLang = $context->language->id;
        }

        return Language::getIsoById($idLang) . '/';
    }

    public function getLinkRewrite($idLang = null, $idShop = null, $relativeProtocol = false)
    {
        if (!$idLang) {
            $idLang = Context::getContext()->language->id;
        }
        $params = [];
        return Context::getContext()->link->getBaseLink($idShop, null, $relativeProtocol) . $this->getLangLink($idLang, null, $idShop) . Dispatcher::getInstance()->createUrl('ets_pc_savemycart', $idLang, $params, (int)Configuration::get('PS_REWRITING_SETTINGS'), '', $idShop);
    }
}
