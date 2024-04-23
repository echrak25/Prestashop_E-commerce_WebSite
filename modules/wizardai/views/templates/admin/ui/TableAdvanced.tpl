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
<form id="actionForm" method="post" x-data="{ checkAll: false, submitForm(actionUrl) { const form = document.getElementById('actionForm'); form.action = actionUrl; form.submit(); } }">
    <div class="relative shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between border-t border-b bg-white p-3">
            <div class="flex items-center justify-between gap-5">
                <h3 class="inline font-semibold text-base text-gray-700 m-0 bg-white border-0">Prompts</h3>
            </div>
            {if isset($actions.add)}
                <a href="{$actions.add.url}" type="button" class="inline-flex items-center hover:no-underline justify-center px-4 py-2 text-sm font-medium tracking-wide transition-colors duration-100 bg-white border-2 rounded-md text-neutral-900 hover:text-white border-neutral-900 hover:bg-neutral-900">
                    {$actions.add.text|escape:'htmlall':'UTF-8'}
                </a>
            {/if}
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-t border-b">
            <tr>
                <th>
                    <div class="flex items-center ml-4 mb-0">
                        <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-neutral-900 focus:ring-neutral-900" x-model="checkAll">
                    </div>
                </th>
                {foreach $columns as $k => $v}
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        {if is_array($v)}
                            {$v.name|escape:'htmlall':'UTF-8'}
                        {else}
                            {$v|escape:'htmlall':'UTF-8'}
                        {/if}
                    </th>
                {/foreach}
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
            </thead>
            <tbody>
            {foreach $data as $row}
            <tr class="bg-white border-b hover:bg-gray-50  text-gray-700">
                <td>
                    <div class="flex items-center ml-4 mb-0">
                        <input type="checkbox" name="bulk[{$row['id']}]" value="{$row['id']}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-neutral-900 focus:ring-neutral-900" :checked="checkAll">
                    </div>
                </td>
                {foreach $columns as $k => $v}
                    <td class="px-6 py-4">
                        {if isset($row[$k].template)}
                            {$row[$k].template}
                        {else}
                            {$row[$k]}
                        {/if}
                    </td>
                {/foreach}
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-4">
                        <div class="relative inline-block text-left" x-data="{ open: false }" @click.away="open = false">
                            <button @click.prevent="open = !open" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"></path>
                                </svg>
                            </button>
                            <div x-show="open" class="origin-top-right absolute z-50 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                                    {foreach ['edit', 'delete'] as $actionType}
                                        {if isset($actions[$actionType])}
                                            {if $actionType === 'delete' && $row['is_default'] == '0'}
                                                <form action="{$actions[$actionType].url|escape:'htmlall':'UTF-8'}&id={$row.id|escape:'htmlall':'UTF-8'}" method="post" role="menuitem">
                                                    <input name="isWizardAISubmit" type="hidden" value="{$isWizardAISubmit|escape:'htmlall':'UTF-8'}">
                                                    <button class="w-full flex items-center hover:no-underline block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        {if isset($actions[$actionType].icon)}
                                                            <i class="{$actions[$actionType].icon|escape:'htmlall':'UTF-8'} mr-3"></i>
                                                        {/if}
                                                        {$actions[$actionType].text|escape:'htmlall':'UTF-8'}
                                                    </button>
                                                </form>
                                            {else}
                                                {if $actionType !== 'delete'}
                                                    <a href="{$actions[$actionType].url|escape:'htmlall':'UTF-8'}&id={$row.id|escape:'htmlall':'UTF-8'}" class="flex items-center hover:no-underline block rounded-md px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer" role="menuitem">
                                                        {if isset($actions[$actionType].icon)}
                                                            <i class="{$actions[$actionType].icon|escape:'htmlall':'UTF-8'} mr-3"></i>
                                                        {/if}
                                                        {$actions[$actionType].text|escape:'htmlall':'UTF-8'}
                                                    </a>
                                                {/if}
                                            {/if}
                                        {/if}
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            {/foreach}
            </tbody>
        </table>
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 p-3 bg-white">
            <div>
                <div x-data="{
            dropdownOpen: false
        }"
                     class="relative">

                    <button @click.prevent="dropdownOpen=true" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">Actions</button>

                    <div x-show="dropdownOpen"
                         @click.away="dropdownOpen=false"
                         x-transition:enter="ease-out duration-200"
                         x-transition:enter-start="-translate-y-2"
                         x-transition:enter-end="translate-y-0"
                         class="absolute top-0 z-1000 w-40 mt-12 -translate-x-1/2 left-1/2"
                         x-cloak>
                        <div class="p-1 mt-1 text-sm bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                            {foreach $bulkActions as $action}
                                <a href="#" @click.prevent="menuBarOpen=false; submitForm('{$action.url|escape:'htmlall':'UTF-8'}')" class="relative flex justify-between w-full cursor-default select-none group items-center rounded px-2 py-1.5 text-black hover:bg-neutral-100 hover:text-gray-900 hover:no-underline outline-none data-[disabled]:opacity-50 data-[disabled]:pointer-events-none">
                                    <span>{$action.text}</span>
                                </a>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
