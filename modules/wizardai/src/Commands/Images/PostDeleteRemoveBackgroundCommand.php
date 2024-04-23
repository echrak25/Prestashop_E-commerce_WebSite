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

namespace WizardAI\Commands\Images;

if (!defined('_PS_VERSION_')) {
    exit;
}

use WizardAI\Interfaces\CommandInterface;

class PostDeleteRemoveBackgroundCommand implements CommandInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function execute()
    {
        // Supposer que $this->data contient un chemin de fichier
        $filePath = $this->data['image_path'];

        // remove public path
        $baseUrl = \Context::getContext()->shop->getBaseURL(true);
        $filePath = str_replace($baseUrl, '', $filePath);
        $filePath = _PS_ROOT_DIR_ . $filePath;

        // Vérifier si le fichier existe
        if (file_exists($filePath)) {
            // Tenter de supprimer le fichier
            if (unlink($filePath)) {
                return 'Image successfully deleted.';
            } else {
                return 'Error deleting image.';
            }
        } else {
            return 'File not found.';
        }
    }
}
