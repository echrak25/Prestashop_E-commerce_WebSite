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

namespace WizardAI;

use Configuration;
use Language;
use Translate;
use WizardAI\Exceptions\OpenAIForbiddenException;
use WizardAI\Exceptions\OpenAIInvalidAPIKeyException;
use WizardAI\Exceptions\OpenAIInvalidModelException;
use WizardAI\ObjectModels\WizardPrompt;

if (!defined('_PS_VERSION_')) {
    exit;
}

class WizardAI
{
    /***
     * @param string $promptCompiled
     * @param WizardPrompt $promptObject
     * @param $locale
     * @return string
     * @throws OpenAIForbiddenException
     * @throws OpenAIInvalidAPIKeyException
     * @throws OpenAIInvalidModelException
     */
    public static function queryInstructions($instructionsCompiled, $promptObject, $locale = null)
    {
        if ('' == \Configuration::get('WIZARDAI_PS_ACCOUNT_ID')) {
            throw new \Exception(\Translate::getModuleTranslation('wizardai', 'Your PrestaShop account is not linked to WizardAI.', 'wiazrdai'));
        }

        if (null == $locale) {
            $locale = new \Language(\Configuration::get('PS_LANG_DEFAULT'));
        }

        $request = [
            'system' => $promptObject->getChatbotSystem(),
            'instructions' => $instructionsCompiled,
            'model' => (string) $promptObject->model,
            'temperature' => (float) $promptObject->temperature,
            'top_p' => (float) $promptObject->top_p,
            'repeat_penalty' => (float) $promptObject->repeat_penalty,
        ];

        $languageSettings = self::getLanguageSettings($promptObject, $locale->iso_code);
        $request = array_merge($request, $languageSettings);

        $client = new WizardAIClient(\Configuration::get('WIZARDAI_PS_ACCOUNT_ID'));

        return $client->request($request);
    }

    /**
     * Ask a request to OpenAI.
     *
     * @param string $prompt
     * @param string $locale
     * @param string $append_text
     * @param bool $use_markdown
     * @param int $max_token
     */
    public static function ask($prompt, $locale = false)
    {
        if ('' == \Configuration::get('WIZARDAI_PS_ACCOUNT_ID')) {
            throw new \Exception(\Translate::getModuleTranslation('wizardai', 'Your PrestaShop account is not linked to WizardAI.', 'wiazrdai'));
        }

        if (null == $locale) {
            $locale = new \Language(\Configuration::get('PS_LANG_DEFAULT'));
        }

        $request = [
            'system' => "You are a writing assistant. Your role is to provide only the text requested by the user's query, without directly answering the question. Your task is to generate precise, relevant, and well-written texts that exactly match the user's request, while adhering to content and style guidelines. Do not provide any additional explanations or commentary.",
            'instructions' => [$prompt],
            'model' => (string) 'mistral-7b',
            'temperature' => (float) 0.9,
            'top_p' => (float) 0.5,
            'repeat_penalty' => (float) 1.0,
            'default_lang' => $locale,
            'translate_to' => [],
        ];

        $client = new WizardAIClient(\Configuration::get('WIZARDAI_PS_ACCOUNT_ID'));

        $result = $client->request($request);

        $formattedResult = [];
        foreach ($result as $iso_code => $value) {
            // Find PrestaShop language ID from ISO code
            $id_lang = \Language::getIdByIso($iso_code);
            if (!$id_lang) {
                continue; // Skip if the language ID is not found
            }
            $parser = new WizardParsedown();
            $formattedValue = $parser->text($value);
            $formattedValue = strip_tags(str_replace('"', '', $value));
            $formattedResult[$id_lang] = $formattedValue;
        }

        return $formattedResult;
    }

    public static function getCredits()
    {
        $uuid = \Configuration::get('WIZARDAI_PS_ACCOUNT_ID');
        $url = "https://wizardai.gekkode.com/api/v1/{$uuid}/credits";

        $ch = curl_init();

        $authorizationHeader = WizardAI::tokenHeader();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            $authorizationHeader,
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        if ($err) {
            // Gestion des erreurs
            error_log("Erreur lors de la récupération des crédits: $err");

            return 0; // Retourner 0 en cas d'erreur
        } else {
            $data = json_decode($response, true);
            if (isset($data['credits']) && is_numeric($data['credits'])) {
                // Assurez-vous que 'credits' est bien un nombre
                return $data['credits'];
            } else {
                // Si 'credits' n'est pas un nombre, retourner 0
                return 0;
            }
        }
    }

    /**
     * @param string $instructions
     * @param WizardPrompt $prompt
     * @param \Language $language
     *
     * @return string
     */
    public static function request($instructions, $prompt, $language = false)
    {
        $result = self::queryInstructions($instructions, $prompt, $language);

        return self::formatforPrestashop($result, $prompt);
    }

    public static function formatforPrestashop($result, $prompt)
    {
        $formattedResult = [];
        foreach ($result as $iso_code => $value) {
            // Find PrestaShop language ID from ISO code
            $id_lang = \Language::getIdByIso($iso_code);
            if (!$id_lang) {
                continue; // Skip if the language ID is not found
            }

            switch ($prompt->field) {
                case 'description':
                case 'short_description':
                case 'description_short':
                    $parser = new WizardParsedown();
                    $formattedValue = $parser->text($value);
                    break;
                case 'meta_title':
                case 'meta_description':
                    $formattedValue = strip_tags(str_replace('"', '', $value));
                    break;
                default:
                    $formattedValue = $value;
                    break;
            }

            $formattedResult[$id_lang] = $formattedValue;
        }

        return $formattedResult;
    }

    public static function getLanguageSettings($promptObject, $default_lang)
    {
        // Get the default language ISO code
        $defaultLang = $default_lang;

        $languages = [];
        // Check if $promptObject has the option to translate to all languages
        if ($promptObject->translate_result) {
            // Fetch all active languages in ISO code format
            $allLanguages = \Language::getLanguages(true, \Context::getContext()->shop->id);
            foreach ($allLanguages as $lang) {
                // ignore default lang
                if ($lang['iso_code'] == $defaultLang) {
                    continue;
                }
                $languages[] = $lang['iso_code'];
            }
        }

        return ['default_lang' => $defaultLang, 'translate_to' => $languages];
    }

    /**
     * Generate Authorization Header for curl request.
     * If token doesn't exist in Configuration Prestashop, generate one and save it.
     *
     * @return void
     */
    public static function tokenHeader($tokenOnly = false)
    {
        $token = \Configuration::get('WIZARDAI_API_TOKEN', null, null, 1);

        if (empty($token)) {
            $token = 'ps-' . bin2hex(random_bytes(32));

            \Configuration::updateValue('WIZARDAI_API_TOKEN', $token, false, null, 1);
        }

        if (!$tokenOnly) {
            return 'Authorization: Basic ' . $token;
        }

        return $token;
    }

    private static function l($message)
    {
        return \Translate::getModuleTranslation('wizardai', $message, 'wizardai');
    }
}
