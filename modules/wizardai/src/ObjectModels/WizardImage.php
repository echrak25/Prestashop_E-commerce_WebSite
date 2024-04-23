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

namespace WizardAI\ObjectModels;

if (!defined('_PS_VERSION_')) {
    exit;
}

use ObjectModel;

class WizardImage extends \ObjectModel
{
    /**
     * @var int
     */
    public $id_wizard_image;

    /**
     * @var string
     */
    public $server_path;

    /**
     * @var string
     */
    public $public_path;

    /**
     * @var string
     */
    public $prompt;

    /**
     * @var string
     */
    public $aspect_ratio;

    /**
     * @var int
     */
    public $steps;

    /**
     * @var float
     */
    public $guidances;

    /**
     * @var int
     */
    public $id_shop;

    /**
     * @var \DateTime
     */

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = [
        'table' => 'wizard_images',
        'primary' => 'id_wizard_image',
        'fields' => [
            'server_path' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'public_path' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'prompt' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'aspect_ratio' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'steps' => ['type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true],
            'guidances' => ['type' => self::TYPE_FLOAT, 'validate' => 'isFloat', 'required' => true],
            'id_shop' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true],
            'created_at' => ['type' => self::TYPE_DATE, 'validate' => 'isDate', 'required' => true],
        ],
    ];

    public function add($auto_date = true, $null_values = false)
    {
        // Définir la date et l'heure actuelles pour created_at
        $this->created_at = (new \DateTime())->format('Y-m-d H:i:s');

        // Appeler la méthode parente add
        return parent::add($auto_date, $null_values);
    }

    /**
     * Custom method to delete the image file from the server.
     */
    public function deleteWizardAIImage()
    {
        // Check if the image file exists on the server
        if (file_exists($this->server_path)) {
            // Attempt to delete the image file
            if (unlink($this->server_path)) {
                // Image file deleted successfully, now delete the database record
                if ($this->delete()) {
                    return true;
                } else {
                    return false; // Failed to delete the database record
                }
            } else {
                return false; // Failed to delete the image file
            }
        } else {
            return false; // Image file does not exist on the server
        }
    }

    public function toJson()
    {
        return json_encode([
            'id_wizard_image' => $this->id_wizard_image,
            'server_path' => $this->server_path,
            'public_path' => $this->public_path,
            'prompt' => $this->prompt,
            'aspect_ratio' => $this->aspect_ratio,
            'steps' => $this->steps,
            'guidances' => $this->guidances,
            'id_shop' => $this->id_shop,
            'created_at' => $this->created_at,
        ]);
    }

    public static function getAll($id_shop = null)
    {
        if (!$id_shop) {
            $id_shop = (int) \Context::getContext()->shop->id;
        }
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'wizard_images` WHERE id_shop = ' . (int) $id_shop . ' ORDER BY created_at DESC';

        return \Db::getInstance()->executeS($sql);
    }
}
