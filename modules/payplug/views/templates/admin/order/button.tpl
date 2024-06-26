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
<input class="{$module_name|escape:'htmlall':'UTF-8'}Button{if isset($button_disable) && $button_disable} -disabled{else} -green{/if}"
       type="submit"
       name="{$submitName|escape:'htmlall':'UTF-8'}"
       value="{$submitValue|escape:'htmlall':'UTF-8'}"
       {if isset($e2e_action) && $e2e_action} data-e2e-type="button" data-e2e-action="{$e2e_action|escape:'htmlall':'UTF-8'}"{/if}
       {if isset($button_disable) && $button_disable} disabled{/if} />

{if !isset($button_disable) || !$button_disable}
    <p class="hide ppaction pperror"></p>
    <p class="hide ppaction ppsuccess"></p>
    <img class="loader" src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/gif/spinner.gif" />
{/if}
