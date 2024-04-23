{*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if $PLW_HTML || $PLW_LOADING_MESSAGE}
    <div class="plw_content" style="background: {$PLW_BACKGROUND_COLOR|escape:'htmlall':'UTF-8'};">
        <div class="plw_content_center">
            {if $PLW_HTML}<div class="plw_icon">{str_replace(array('{bgcolor}','{size}','{size2}'),array($PLW_ICON_COLOR,$PLW_SPINNER_SIZE,$PLW_SPINNER_SIZE2),$PLW_HTML) nofilter}</div>{/if}
            {if $PLW_LOADING_MESSAGE}<div class="plw_text" style="color: {$PLW_TEXT_COLOR|escape:'htmlall':'UTF-8'};">{$PLW_LOADING_MESSAGE|escape:'htmlall':'UTF-8'}</div>{/if}
        </div>
    </div>
{/if}