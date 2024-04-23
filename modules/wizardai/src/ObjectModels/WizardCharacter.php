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

class WizardCharacter extends \ObjectModel
{
    /**
     * @var int
     */
    public $id_wizard_character;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $function;

    /**
     * @var string
     */
    public $content;

    /**
     * @var bool
     */
    public $is_default;

    /**
     * @var bool
     */
    public $is_active;

    /**
     * @var int
     */
    public $id_shop;

    /**
     * @var string
     */
    public $image;

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = [
        'table' => 'wizard_characters',
        'primary' => 'id_wizard_character',
        'fields' => [
            'name' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'function' => ['type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true],
            'content' => ['type' => self::TYPE_STRING, 'validate' => 'isCleanHtml', 'required' => true],
            'is_default' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
            'is_active' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
            'id_shop' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true],
        ],
    ];

    public function __construct($id = null, $id_lang = null, $id_shop = null, $translator = null)
    {
        parent::__construct($id, $id_lang, $id_shop, $translator);
        $this->image = $this->getImageIfExist($this->name, $this->function);
    }

    public static function assignSmartyCharacterAvailable($selectedCharacter = null)
    {
        $instance = new self();
        $allCharacters = $instance->getAllCharacters();
        $selectableItems = [];
        foreach ($allCharacters as $character) {
            $selectableItems[] = [
                'value' => $character->id_wizard_character,
                'title' => $character->name . ' - ' . $character->function,
                'image' => $character->getImageIfExist($character->name, $character->function),
            ];
        }
        $selectedItem = null;
        // If a specific model is selected.
        if ($selectedCharacter) {
            $characterSelected = $instance->getCharacterById($selectedCharacter);
            $selectedItem = [
                'value' => $characterSelected->id_wizard_character,
                'title' => $characterSelected->name . ' - ' . $characterSelected->function,
                'image' => $characterSelected->getImageIfExist($characterSelected->name, $characterSelected->function),
            ];
        }

        // If no model is selected, select the first one.
        if (!$selectedItem) {
            $selectedItem = $selectableItems[0];
        }

        return [
            'selectedCharacter' => json_encode($selectedItem),
            'selectableCharacters' => json_encode($selectableItems),
        ];
    }

    /**
     * Récupère tous les personnages.
     *
     * @return array liste de tous les personnages
     */
    public static function getAllCharacters()
    {
        $sql = new \DbQuery();
        $sql->select('*');
        $sql->from(static::$definition['table']);
        $sql->where('is_active = 1'); // Exemple de filtre pour récupérer uniquement les personnages actifs
        $sql->where('id_shop = ' . (int) \Context::getContext()->shop->id);

        $results = \Db::getInstance()->executeS($sql);

        $characters = [];
        foreach ($results as $data) {
            $character = new self();
            $character->hydrate($data);
            $characters[] = $character;
        }

        return $characters;
    }

    /**
     * Récupère un personnage par son ID.
     *
     * @param int $id identifiant du personnage
     *
     * @return WizardCharacter|null le personnage trouvé ou null si non trouvé
     */
    public static function getCharacterById($id)
    {
        $id = (int) $id; // Toujours valider et nettoyer les variables d'entrée
        $sql = new \DbQuery();
        $sql->select('*');
        $sql->from(static::$definition['table']);
        $sql->where('id_wizard_character = ' . (int) $id);

        $result = \Db::getInstance()->getRow($sql);

        if ($result) {
            $character = new self();
            $character->hydrate($result);

            return $character;
        }

        return null;
    }

    /**
     * Génère un portrait si celui-ci n'existe pas déjà.
     *
     * @param $ps_account_id
     *
     * @return bool
     */
    public function generatePortraitIfNeeded()
    {
        $ps_account_id = \Configuration::get('WIZARDAI_PS_ACCOUNT_ID');
        // Construire le nom du fichier basé sur $name et $function
        $nameFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $this->name);
        $functionFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $this->function);
        $nameFormat = str_replace(' ', '_', mb_strtolower($nameFormat));
        $functionFormat = str_replace(' ', '_', mb_strtolower($functionFormat));
        $filename = $nameFormat . '-' . $functionFormat . '.png';

        // Construire le chemin du fichier
        $filepath = __DIR__ . '/../../storages/img/characters/' . $filename;

        // Vérifier si le fichier existe déjà
        if (file_exists($filepath)) {
            // Si le fichier existe déjà, définir le chemin web et retourner true
            $this->image = '/modules/wizardai/storages/img/characters/' . $filename;

            return true;
        }

        // Si le fichier n'existe pas, appeler une fonction pour le générer (ex : generatePortrait)
        // Cette fonction doit renvoyer le chemin web de l'image générée ou false en cas d'échec
        $webPath = $this->generatePortrait($ps_account_id, $this->name, $this->function);

        if ($webPath) {
            // Si la génération réussit, définir le chemin web et retourner true
            $this->image = $webPath;

            return true;
        }

        // Si la génération échoue, retourner false
        return false;
    }

    /**
     * Make curl request to https://wizardai.gekkode.com/api/v1/{ps_account_id}/character/portrait
     *
     * @param $ps_account_id
     * @param $name
     * @param $function
     *
     * @return string
     */
    public function generatePortrait($ps_account_id, $name, $function)
    {
        // Convertir les caractères accentués en non-accentués
        $nameFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $functionFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $function);
        $nameFormat = str_replace(' ', '_', mb_strtolower($nameFormat));
        $functionFormat = str_replace(' ', '_', mb_strtolower($functionFormat));
        // Construire le nom du fichier basé sur $name et $function
        $filename = $nameFormat . '-' . $functionFormat . '.png';

        // Construire le chemin du fichier
        $filepath = __DIR__ . '/storages/img/characters/' . $filename;

        // Vérifier si le fichier existe déjà
        if (file_exists($filepath)) {
            // Return web path of filepath
            return '/modules/wizardai/storages/img/characters/' . $filename;
        }

        $url = 'https://wizardai.gekkode.com/api/v1/' . $ps_account_id . '/character/portrait';

        $data = [
            'name' => $name,
            'function' => $function,
        ];

        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);

        // Décoder la réponse JSON
        $decodedResponse = json_decode($response, true);

        // Vérifier les erreurs dans la réponse
        if (isset($decodedResponse['error'])) {
            // Gérer l'erreur comme vous le souhaitez, par exemple en loggant l'erreur et en retournant null
            error_log($decodedResponse['error']);

            return null;
        }

        // Obtenir l'URL de l'image à partir de la réponse
        $imageUrl = $decodedResponse['output'][0];

        // Télécharger et sauvegarder l'image
        $imageData = \Tools::file_get_contents($imageUrl);
        file_put_contents($filepath, $imageData);

        // Retourner le chemin du fichier
        return '/modules/wizardai/storages/img/characters/' . $filename;
    }

    /**
     * Vérifie si le portrait existe et définit le chemin web.
     *
     * @return bool
     */
    public function setPortraitUrl()
    {
        // Construire le nom du fichier basé sur $name et $function
        $nameFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $this->name);
        $functionFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $this->function);
        $nameFormat = str_replace(' ', '_', mb_strtolower($nameFormat));
        $functionFormat = str_replace(' ', '_', mb_strtolower($functionFormat));
        $filename = $nameFormat . '-' . $functionFormat . '.png';

        // Construire le chemin du fichier
        $filepath = __DIR__ . '/storages/img/characters/' . $filename;

        // Vérifier si le fichier existe
        if (file_exists($filepath)) {
            // Définir le chemin web de l'image
            $this->image = '/modules/wizardai/storages/img/characters/' . $filename;

            return true;
        }

        // Si le fichier n'existe pas, retourner false
        return false;
    }

    public static function getFormattedCharactersForTableList()
    {
        $characters = self::getAllCharacters();
        $formattedCharacters = [];

        foreach ($characters as $character) {
            $formattedCharacters[] = [
                'id' => $character->id_wizard_character,
                'name' => [
                    'avatar' => $character->getImageIfExist($character->name, $character->function), // Assurez-vous que cette propriété contient l'URL de l'image
                    'name' => $character->name,
                ],
                'role' => $character->function,
                'is_default' => $character->is_default,
            ];
        }

        return $formattedCharacters;
    }

    /**
     * Surcharge de la méthode hydrate pour inclure la définition du chemin du portrait.
     *
     * @param array $data données pour l'hydratation
     */
    public function hydrate(array $data, $id_lang = null)
    {
        parent::hydrate($data, $id_lang);

        // Après l'hydratation standard, définir l'URL du portrait
        // $this->setPortraitUrl();
    }

    public function getImageIfExist($name, $function)
    {
        $nameFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $functionFormat = iconv('UTF-8', 'ASCII//TRANSLIT', $function);
        $nameFormat = str_replace(' ', '_', mb_strtolower($nameFormat));
        $functionFormat = str_replace(' ', '_', mb_strtolower($functionFormat));
        $filename = $nameFormat . '-' . $functionFormat . '.png';

        if ($filename == 'damien-seo_copywriter.png' || $filename == 'wizard-seo_meta_generator.png') {
            return '/modules/wizardai/views/img/default/' . $filename;
        } else {
            // Construire le chemin du fichier
            $filepath = __DIR__ . '/../../storages/img/characters/' . $filename;

            // Vérifier si le fichier existe déjà
            if (file_exists($filepath)) {
                return '/modules/wizardai/storages/img/characters/' . $filename;
            }
        }

        return false;
    }

    /**
     * Vérifie si la table wizard_characters est vide.
     *
     * @return bool renvoie true si la table est vide, false autrement
     */
    public static function isEmpty()
    {
        $sql = new \DbQuery();
        $sql->select('COUNT(*)');
        $sql->from(static::$definition['table']);
        $count = (int) \Db::getInstance()->getValue($sql);

        return $count === 0;
    }

    public function toArray()
    {
        return [
            'id_wizard_character' => $this->id_wizard_character,
            'name' => $this->name,
            'function' => $this->function,
            'content' => $this->content,
            'is_default' => $this->is_default,
            'is_active' => $this->is_active,
            'id_shop' => $this->id_shop,
            'image' => $this->image,
        ];
    }
}
