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

if (!defined('_PS_VERSION_'))
    exit;
class PhConCache
{
    public static $cacheDir = _PS_CACHE_DIR_ . 'phconnect/';

    public static function get($key, $deleteIfExpired = false)
    {
        if (!($lifetime = (int)Configuration::get('PH_CON_CACHE_TTL')) || $lifetime < 1 || $lifetime > 24)
            $lifetime = 24;
        if ($files = glob(self::$cacheDir . $key . '.*')) {
            foreach ($files as $file) {
                $time = Tools::substr(strrchr($file, '.'), 1);
                if ($time + $lifetime * 3600 < time() && file_exists($file)) {
                    if ($deleteIfExpired)
                    {
                        if(file_exists($file))
                            @unlink($file);
                    }
                    else
                        return array(
                            'cache' => ($rs = @json_decode($content = Tools::file_get_contents($file),true)) !== null ? $rs : $content,
                            'expired' => true,
                        );
                } elseif (file_exists($file))
                    return array(
                        'cache' => ($rs = @json_decode($content = Tools::file_get_contents($file),true)) !== null ? $rs : $content,
                        'expired' => false,
                    );
            }
        }
        return false;
    }

    public static function set($key, $value)
    {
        if (is_array($value) || is_object($value))
            $value = @json_encode($value);
        self::delete($key);
        if (!is_dir(self::$cacheDir) && @mkdir(self::$cacheDir, 0755, true)) {
            if (@file_exists(dirname(__file__) . '/../index.php')) {
                @copy(dirname(__file__) . '/../index.php', self::$cacheDir . 'index.php');
            }
        }
        return @file_put_contents(self::$cacheDir . $key . '.' . time(), $value);
    }

    public static function delete($key)
    {
        if ($files = glob(self::$cacheDir . $key . '.*')) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    @unlink($file);
                }
            }
        }
    }

    public static function clearAll()
    {
        if (is_dir(self::$cacheDir) && ($files = glob(self::$cacheDir . '*'))) {
            foreach ($files as $file) {
                if (file_exists($file) && $file != self::$cacheDir . 'index.php') {
                    @unlink($file);
                }
            }
        }
    }

    public static function removeCacheDir()
    {
        if (is_dir(self::$cacheDir)) {
            self::clearAll();
            if (file_exists(self::$cacheDir . 'index.php'))
                @unlink(self::$cacheDir . 'index.php');
            @unlink(self::$cacheDir);
        }
    }
}