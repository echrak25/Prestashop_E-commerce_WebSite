{*
* 2023 Payplug
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0).
* It is available through the world-wide-web at this URL:
* https://opensource.org/licenses/osl-3.0.php
* If you are unable to obtain it through the world-wide-web, please send an email
* to contact@payplug.com so we can send you a copy immediately.
*
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
 * versions in the future.
*
*  @author Payplug SAS
*  @copyright 2023 Payplug SAS
*  @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of Payplug SAS
*}
<!-- MODULE Payplug -->
{if $version < 1.7}
    <li>
        <a href="{$payplug_cards_url|escape:'htmlall':'UTF-8'}" title="{l s='Saved cards' mod='payplug'}">
            <i class="icon-credit-card"></i>
            <span>{l s='Saved cards' mod='payplug'}</span>
        </a>
    </li>
{else}
    <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="savedcards-link" href="{$payplug_cards_url|escape:'htmlall':'UTF-8'}">
          <span class="link-item">
            <i class="material-icons">&#xE870;</i>
              {l s='Saved cards' mod='payplug'}
          </span>
    </a>
{/if}
<!-- END : MODULE Payplug -->
