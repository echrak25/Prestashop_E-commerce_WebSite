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
<script>
    let nameTree = "{$name|strtolower|escape:'htmlall':'UTF-8'}";
    let objects = {$objects}
</script>

<label for="type" class="block text-sm font-medium text-gray-700">{$name|escape:'htmlall':'UTF-8'}</label>
<div x-data="checkboxTreeComponent(nameTree, objects)" class="py-3 px-4 w-full border rounded-md shadow-sm">
    <template x-for="object in objects" :key="object.id">
        <div x-html="renderObject(object)"></div>
    </template>
</div>
