<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */
if (!defined('_PS_VERSION_')) {
    exit;
}
$sql = [];

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'wizard_jobs` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `entity` VARCHAR(50) NOT NULL,
    `entity_id` INT(10) UNSIGNED NOT NULL,
    `task` VARCHAR(50) NOT NULL,
    `attempts` INT(11) NOT NULL,
    `id_lang` INT(11) NOT NULL,
    `id_shop` INT(11) NOT NULL,
    `is_failed` TINYINT(1) NOT NULL,
    `is_sended` TINYINT(1) NOT NULL DEFAULT 0,
    `is_executed` TINYINT(1) NOT NULL,
    `generated_at` DATETIME NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'wizard_prompts` (
    `id_wizard_prompt` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_character` INT UNSIGNED NOT NULL,
    `id_shop` INT UNSIGNED NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `selector` VARCHAR(255) NOT NULL,
    `entity` VARCHAR(255) NOT NULL,
    `field` VARCHAR(50) NOT NULL,
    `conditions` TEXT DEFAULT NULL,
    `content` TEXT NOT NULL DEFAULT "",
    `append_to_text` TINYINT(1) NOT NULL DEFAULT 0,
    `translate_result` TINYINT(1) NOT NULL DEFAULT 1,
    `add_to_cron` TINYINT(1) NOT NULL DEFAULT 0,
    `is_default` TINYINT(1) NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `model` VARCHAR(255) NOT NULL,
    `temperature` FLOAT NOT NULL,
    `top_p` FLOAT NOT NULL,
    `repeat_penalty` FLOAT NOT NULL,
    PRIMARY KEY (`id_wizard_prompt`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS ' . _DB_PREFIX_ . 'wizard_prompts_lang (
    id_wizard_prompt INT UNSIGNED NOT NULL,
    id_lang INT UNSIGNED NOT NULL,
    label VARCHAR(255) NOT NULL DEFAULT "Generate",
    PRIMARY KEY (id_wizard_prompt, id_lang)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'wizard_characters` (
    `id_wizard_character` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `function` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL DEFAULT "",
    `is_default` TINYINT(1) NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `id_shop` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`id_wizard_character`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'wizard_images` (
    `id_wizard_image` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `server_path` VARCHAR(255) NOT NULL,
    `public_path` VARCHAR(255) NOT NULL,
    `prompt` VARCHAR(255) NULL,
    `aspect_ratio` VARCHAR(5) NOT NULL,
    `steps` INT NOT NULL,
    `guidances` FLOAT NOT NULL,
    `id_shop` INT UNSIGNED NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id_wizard_image`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
