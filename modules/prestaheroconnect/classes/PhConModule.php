<?php
/**
 * 2007-2024 PrestaHero
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
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please contact us for extra customization service at an affordable price
 *
 * @author PrestaHero <etssoft.jsc@gmail.com>
 * @copyright  2007-2024 PrestaHero
 * @license    Valid for 1 website (or project) for each purchase of license
 *  International Registered Trademark & Property of PrestaHero
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
class PhConModule
{
    public static function getPrestaheroModules()
    {
        $context = Context::getContext();
        $result = array();
        if ($modules = PhConApi::getApi()->getModulesOnMarket(false)) {
            foreach ($modules as $item) {
                if (isset($item['is_module']) && (int)$item['is_module'] > 0) {
                    $moduleObj = Module::getInstanceByName($item['name']);
                    $dbVersion = self::getDbVersion($item['name']);
                    $newestVersion = $moduleObj && version_compare($moduleObj->version, $item['version'], '>') ? $moduleObj->version : $item['version'];
                    $result[$item['name']] = array(
                        'is_module' => 1,
                        'uri' => isset($item['uri']) ? $item['uri'] : '',
                        'is_installed' => Module::isInstalled($item['name']) && file_exists(_PS_MODULE_DIR_ . $item['name'] . '/' . $item['name'] . '.php') ,
                        'name' => $item['name'],
                        'id_product' => isset($item['id_product']) ? $item['id_product'] : '',
                        'version' => $newestVersion,
                        'old_version' => self::getOldVersion($item['name'], $newestVersion, $dbVersion),
                        'author' => isset($item['manufacturer_name']) ? $item['manufacturer_name'] : null,
                        'price' => isset($item['price']) ? $item['price'] : null,
                        'price_number' => isset($item['price_number']) ? $item['price_number'] : null,
                        'price_without_reduction' => isset($item['price_without_reduction']) ? $item['price_without_reduction'] : null,
                        'reduction' => isset($item['reduction']) ? $item['reduction'] : null,
                        'active' => $moduleObj ? $moduleObj->active : 0,
                        'enable_device' => $moduleObj ? $moduleObj->enable_device : 0,
                        'is_enabled' => Module::isEnabled($item['name']),
                        'description' => str_replace("\\",'',$item['description']),
                        'displayName' => $item['display_name'],
                        'logo' => $item['logo'],
                        'compatibility' => isset($item['compatibility']) ? $item['compatibility'] : '',
                        'to_buy' => file_exists(_PS_MODULE_DIR_ . $item['name'] . '/' . $item['name'] . '.php') ? false : true,
                        'to_upgrade' => self::canUpgradeFromLocal($item['name'], $dbVersion),
                        'upgrade_from_server' => (!isset($item['upgrade_from_server']) || (isset($item['upgrade_from_server']) && $item['upgrade_from_server'])) && self::canUpgradeFromPrestahero($item['name'], $item['version']),
                        'is_enabled_mobile' => self::isEnabledOnMobile($item['name']),
                        'is_enabled_desktop' => self::isEnabledOnDesktop($item['name']),
                        'is_enabled_tablet' => self::isEnabledOnTablet($item['name']),
                        'is_configurable' => class_exists($item['name']) && method_exists($item['name'], 'getContent') ? true : false,
                        'total_rating' => isset($item['total_rating']) ? $item['total_rating'] : 0,
                        'avg_rating' => isset($item['avg_rating']) ? $item['avg_rating'] : 0,
                        'is_must_have' => isset($item['is_must_have']) && $item['is_must_have'] ? true : false,
                        'min_ps_version' => isset($item['min_ps_version']) ? $item['min_ps_version'] : null,
                        'max_ps_version' => isset($item['max_ps_version']) ? $item['max_ps_version'] : null,
                        'img_color' => !$item['logo'] ? self::getRandomColor() : '',
                        'first_char' => $item['display_name'] ? Tools::substr($item['display_name'], 0, 1) : 'M',
                        'actions' => array(
                            'install' => self::getActionLinks($item['name'], 'install', $moduleObj),
                            'uninstall' => self::getActionLinks($item['name'], 'uninstall', $moduleObj),
                            'reset' => self::getActionLinks($item['name'], 'reset', $moduleObj),
                            'disable' => self::getActionLinks($item['name'], 'disable', $moduleObj),
                            'disable_mobile' => self::getActionLinks($item['name'], 'disable_mobile', $moduleObj),
                            'disable_tablet' => self::getActionLinks($item['name'], 'disable_tablet', $moduleObj),
                            'disable_desktop' => self::getActionLinks($item['name'], 'disable_desktop', $moduleObj),
                            'delete' => ($linkDlete = self::getActionLinks($item['name'], 'delete', $moduleObj)) ? $linkDlete : $context->link->getAdminLink('AdminModules') . '&configure=prestaheroconnect&deleteModule=1&module=' . $item['name'] . '&idProduct=' . $item['id_product'],
                            'upgrade' => self::getActionLinks($item['name'], 'upgrade', $moduleObj),
                            'enable' => self::getActionLinks($item['name'], 'enable', $moduleObj),
                            'enable_mobile' => self::getActionLinks($item['name'], 'enable_mobile', $moduleObj),
                            'enable_tablet' => self::getActionLinks($item['name'], 'enable_tablet', $moduleObj),
                            'enable_desktop' => self::getActionLinks($item['name'], 'enable_desktop', $moduleObj),
                            'configure' => $context->link->getAdminLink('AdminModules') . '&configure=' . $item['name'],
                            'upgrade_ph' => $context->link->getAdminLink('AdminModules') . '&configure=prestaheroconnect&upgradeModule=1&module=' . $item['name'] . '&idProduct=' . (isset($item['id_product']) ? $item['id_product'] : '')
                        ),
                        'support_module' => isset($item['support_module']) && $item['support_module'] ? $item['support_module']: '',
                    );
                } else {
                    $item['img_color'] = !$item['logo'] ? self::getRandomColor() : '';
                    $item['first_char'] = $item['display_name'] ? Tools::substr($item['display_name'], 0, 1) : 'T';
                    $item['to_upgrade'] = false;
                    $item['is_installed'] = trim($context->shop->theme_name) === trim($item['name']);
                    if (@file_exists(($file = _PS_THEME_DIR_ . $item['name'] . '/config/theme.yml'))) {
                        $themeYML = Tools::file_get_contents($file);
                        $item['to_upgrade'] = preg_match('/version\s*\:\s*([0-9\.]+)/', $themeYML, $maches) && !empty($maches[1]) && !empty($item['version']) && version_compare($item['version'], $maches[1], '>');
                    }
                    $item['store_url'] = self::getBaseLink();
                    $result[$item['name']] = $item;
                }
            }
        }

        return $result;
    }
    public static function getBaseLink()
    {
        return (Configuration::get('PS_SSL_ENABLED_EVERYWHERE')?'https://':'http://').Context::getContext()->shop->domain.Context::getContext()->shop->getBaseURI();
    }
    public static function checkCompliancy($moduleName)
    {
        $phModules = self::getPrestaheroModules();
        if (!isset($phModules[$moduleName])) {
            return false;
        }
        $minVersion = $phModules[$moduleName]['min_ps_version'];
        $maxVersion = $phModules[$moduleName]['max_ps_version'];
        if ($minVersion && version_compare($minVersion, _PS_VERSION_, '>')) {
            return false;
        }
        if ($maxVersion && version_compare($maxVersion, _PS_VERSION_, '<')) {
            return false;
        }
        return true;
    }

    public static function canUpgradeFromPrestahero($moduleName, $newestVersion)
    {
        $moduleObj = Module::getInstanceByName($moduleName);
        if (!$moduleObj) {
            return false;
        }
        return Tools::version_compare($moduleObj->version, $newestVersion, '<');
    }

    public static function canUpgradeFromLocal($moduleName, $dbVersion = null)
    {
        if (!$dbVersion) {
            $dbVersion = self::getDbVersion($moduleName);
        }
        if (($module = Module::getInstanceByName($moduleName)) && $dbVersion) {
            return Tools::version_compare($module->version, $dbVersion, '>');
        }
        return false;
    }

    public static function getDbVersion($moduleName)
    {
        return Db::getInstance()->getValue("SELECT `version` FROM `" . _DB_PREFIX_ . "module` WHERE `name`='" . pSQL($moduleName) . "'");
    }

    public static function getOldVersion($moduleName, $newestVersion, $dbVersion = null)
    {
        $moduleObj = Module::getInstanceByName($moduleName);
        if (!$moduleObj || !Module::isInstalled($moduleName)) {
            return null;
        }
        if (!$dbVersion) {
            $dbVersion = self::getDbVersion($moduleName);
        }
        $currentVersion = version_compare($dbVersion, $moduleObj->version, '<') ? $dbVersion : $moduleObj->version;

        return Module::isInstalled($moduleName) && $moduleObj && version_compare($currentVersion, $newestVersion, '<') ? $currentVersion : null;
    }

    public static function getActionLinks($moduleName, $action, $moduleObject, $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }
        $is17 = version_compare('1.7.0', _PS_VERSION_, '<=');
        if ($is17) {
            try {
                $linkAction = $context->link->getAdminLink('AdminModulesManage', true,
                    array(
                        'route' => 'admin_module_manage_action',
                        'module_name' => $moduleName,
                        'action' => $action,
                    ));
                if (strpos($linkAction, $action) !== false) {
                    return $linkAction;
                }
            } catch (Exception $ex) {
                if ($ex) {
                    //
                }
                return '';
            }
        }
        $baseLink = $context->link->getAdminLink('AdminModules');
        switch ($action) {
            case 'install':
                return $baseLink . '&install=' . $moduleName . '&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'delete':
                return $baseLink . '&delete=' . $moduleName . '&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'uninstall':
                return $baseLink . '&uninstall=' . $moduleName . '&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'upgrade':
                return $baseLink . '&configure=prestaheroconnect&updateLocal=1&module=' . $moduleName;
            case 'disable':
                return $baseLink . '&enable=0&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'enable':
                return $baseLink . '&enable=1&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'enable_tablet':
                return $baseLink . '&enable_device=2&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'enable_desktop':
                return $baseLink . '&enable_device=1&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'enable_mobile':
                return $baseLink . '&enable_device=4&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'disable_mobile':
                return $baseLink . '&disable_device=4&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'disable_tablet':
                return $baseLink . '&disable_device=2&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'disable_desktop':
                return $baseLink . '&disable_device=1&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
            case 'reset':
                return $baseLink . '&reset&module_name=' . $moduleName . '&fromPhActionList=1' . ($moduleObject ? '&tab_module=' . $moduleObject->tab : '');
        }
    }

    public static function isEnabledOnMobile($moduleName, $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }
        if (!Tools::file_exists_no_cache(_PS_MODULE_DIR_ . $moduleName . '/' . $moduleName . '.php'))
            return false;
        $idModule = Module::getModuleIdByName($moduleName);
        if (!$idModule) {
            return false;
        }
        $enableDevice = Db::getInstance()->getValue("SELECT enable_device FROM `" . _DB_PREFIX_ . "module_shop` WHERE id_module=" . (int)$idModule . " AND id_shop=" . (int)$context->shop->id);
        if (!$enableDevice) {
            return false;
        }
        if (!in_array((int)$enableDevice, array(3, 2, 1, 0))) {
            return true;
        }
        return false;
    }

    public static function isEnabledOnDesktop($moduleName, $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }
        if (!Tools::file_exists_no_cache(_PS_MODULE_DIR_ . $moduleName . '/' . $moduleName . '.php'))
            return false;
        $idModule = Module::getModuleIdByName($moduleName);
        if (!$idModule) {
            return false;
        }
        $enableDevice = Db::getInstance()->getValue("SELECT enable_device FROM `" . _DB_PREFIX_ . "module_shop` WHERE id_module=" . (int)$idModule . " AND id_shop=" . (int)$context->shop->id);
        if (!$enableDevice) {
            return false;
        }
        if (!in_array((int)$enableDevice, array(6, 2, 4, 0))) {
            return true;
        }
        return false;
    }

    public static function isEnabledOnTablet($moduleName, $context = null)
    {
        if (!$context) {
            $context = Context::getContext();
        }
        if (!Tools::file_exists_no_cache(_PS_MODULE_DIR_ . $moduleName . '/' . $moduleName . '.php'))
            return false;
        $idModule = Module::getModuleIdByName($moduleName);
        if (!$idModule) {
            return false;
        }
        $enableDevice = Db::getInstance()->getValue("SELECT enable_device FROM `" . _DB_PREFIX_ . "module_shop` WHERE id_module=" . (int)$idModule . " AND id_shop=" . (int)$context->shop->id);
        if (!$enableDevice) {
            return false;
        }
        if (!in_array((int)$enableDevice, array(5, 1, 4, 0))) {
            return true;
        }
        return false;
    }

    public static function updateNewCodeModule($filePath, $moduleName)
    {
        if (!Tools::ZipTest($filePath)) {
            if (@file_exists($filePath))
                @unlink($filePath);
            return false;
        }

        $zip = new ZipArchive();
        if (!$zip->open($filePath)) {
            return false;
        }

        $pathExtract = dirname($filePath);
        if (!Tools::ZipExtract($filePath, $pathExtract)) {
            return false;
        }

        if (!@is_dir($pathExtract . '/' . $moduleName)) {
            return false;
        }
        $modulePath = rtrim(_PS_MODULE_DIR_, '/') . '/' . $moduleName;
        $bakPath = rtrim(_PS_MODULE_DIR_, '/') . '/' . $moduleName . '_' . time();
        if (@is_dir($modulePath)) {
            self::recurseCopyFolder($modulePath, $bakPath);
        }
        if (is_dir($modulePath . '/override')) { // Delete folder override in old module
            @copy($modulePath . '/override', $modulePath . '/phback_override');
            self::deleteDir($modulePath . '/override');
        }
        self::recurseCopyFolder($pathExtract . '/' . $moduleName, $modulePath);
        if (@is_dir($bakPath)) {
            if (@is_dir($bakPath . '/.git'))
                @copy($bakPath . '/.git', $modulePath . '/.git'); //Backup git directory to avoid losing dev code. git reset --hard to recover already committed code.
            if (@file_exists($bakPath . '/.gitignore')) {
                @copy($bakPath . '/.gitignore', $modulePath . '/.gitignore');
                @unlink($bakPath . '/.gitignore');
            }
            self::deleteDir($bakPath);
        }
        if (is_dir($modulePath . '/phback_override')) self::deleteDir($modulePath . '/phback_override');
        $zip->close();
        if(file_exists($filePath))
            @unlink(realpath($filePath));
        return true;
    }

    public static function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            return false;
        }
        if (Tools::substr($dirPath, Tools::strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . "{*,.[!.]*,..?*}", GLOB_BRACE);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } elseif(file_exists($file)) {
                @unlink($file);
            }
        }
        @rmdir($dirPath);
    }

    public static function getRandomColor()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    public static function upgradeLocalModule($moduleName)
    {
        $module = Module::getInstanceByName($moduleName);
        if (!$module || !$module->name) {
            return false;
        }
        $modules = Module::getModulesOnDisk();
        foreach ($modules as $item) {
            if ($item->name == $moduleName) {
                $module = $item;
                break;
            }
        }

        if (Module::needUpgrade($module)) {
            Module::getInstanceByName($moduleName)->runUpgradeModule();
        }
        return true;
    }

    public static function recurseCopyFolder($sourceDirectory, $destinationDirectory, $childFolder = '')
    {
        $directory = opendir($sourceDirectory);
        if (is_dir($destinationDirectory) === false) {
            mkdir($destinationDirectory);
        }

        if ($childFolder !== '') {
            if (is_dir("$destinationDirectory/$childFolder") === false) {
                mkdir("$destinationDirectory/$childFolder");
            }

            while (($file = readdir($directory)) !== false) {
                if ($file === '.' || $file === '..') {
                    continue;
                }

                if (is_dir("$sourceDirectory/$file") === true) {
                    self::recurseCopyFolder("$sourceDirectory/$file", "$destinationDirectory/$childFolder/$file");
                } else {
                    copy("$sourceDirectory/$file", "$destinationDirectory/$childFolder/$file");
                }
            }

            closedir($directory);

            return;
        }

        while (($file = readdir($directory)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            if (is_dir("$sourceDirectory/$file") === true) {
                self::recurseCopyFolder("$sourceDirectory/$file", "$destinationDirectory/$file");
            } else {
                copy("$sourceDirectory/$file", "$destinationDirectory/$file");
            }
        }
    }

}