{**
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
 *}
<div x-data="{ currentLang: '{$languages[0].iso_code|escape:'javascript':'UTF-8'}' }" class="mb-4">
    <div class="flex">
        <!-- Champ d'input pour chaque langue -->
        {foreach from=$languages item=lang}
            <input x-show="currentLang === '{$lang.iso_code|escape:'javascript':'UTF-8'}'" type="text" id="{$name|escape:'htmlall':'UTF-8'}_{$lang.id_lang|escape:'htmlall':'UTF-8'}" name="{$name|escape:'htmlall':'UTF-8'}[{$lang.id_lang|escape:'htmlall':'UTF-8'}]" value="{$values[$lang.id_lang]|default:$values[1]|escape:'htmlall':'UTF-8'}" placeholder="{$lang.name|escape:'htmlall':'UTF-8'}" class="p-2 flex-1 border rounded-md">
        {/foreach}

        <!-- Sélecteur de langue -->
        {include file="./language-selector.tpl" languages=$languages}
    </div>
</div>
