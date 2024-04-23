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

class ETSSPTranslate
{
    public function l($string, $source = null)
    {
        return Translate::getModuleTranslation('ph_sendproduct_tofriend', $string, $source ?: pathinfo(__FILE__, PATHINFO_FILENAME));
    }

    public static function trans($originalString, $lang, $source = null)
    {
        static $module_name = 'ph_sendproduct_tofriend';

        if (is_array($lang)) {
            $iso_code = $lang['iso_code'];
        } elseif (is_object($lang)) {
            $iso_code = $lang->iso_code;
        } else {
            $language = new Language($lang);
            $iso_code = $language->iso_code;
        }

        $translationFile = rtrim(_PS_MODULE_DIR_, '/') . '/' . $module_name . '/translations/' . $iso_code . '.' . 'php';

        if (!@file_exists($translationFile)) {
            return $originalString;
        }

        $contentFile = Tools::file_get_contents($translationFile);
        $string = preg_replace("/\\\*'/", "\'", $originalString);
        $key = md5($string);
        $keyFile =Tools::strtolower('<{' . $module_name . '}prestashop>' . ($source ?: $module_name)) . '_' . $key;

        preg_match('/(\$_MODULE\[\'' . preg_quote($keyFile) . '\'\]\s*=\s*\')(.*)(\';)/', $contentFile, $matches);
        if ($matches && isset($matches[2])) {
            return Tools::stripslashes($matches[2]);
        }
        return $originalString;
    }
}