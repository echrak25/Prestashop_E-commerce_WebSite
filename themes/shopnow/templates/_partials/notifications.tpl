{*
* 2007-2022 ETS-Soft
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 wesite only.
* If you want to use this file on more websites (or projects), you need to purchase additional licenses. 
* You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
* 
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
{if isset($notifications)}
<aside id="notifications">
  <div class="container">
    {if $notifications.error}
      {block name='notifications_error'}
        <article class="alert alert-danger" role="alert" data-alert="danger">
          <ul>
            {foreach $notifications.error as $notif}
              <li>{$notif|escape:'html':'UTF-8'}</li>
            {/foreach}
          </ul>
        </article>
      {/block}
    {/if}

    {if $notifications.warning}
      {block name='notifications_warning'}
        <article class="alert alert-warning" role="alert" data-alert="warning">
          <ul>
            {foreach $notifications.warning as $notif}
              <li>{$notif|escape:'html':'UTF-8'}</li>
            {/foreach}
          </ul>
        </article>
      {/block}
    {/if}

    {if $notifications.success}
      {block name='notifications_success'}
        <article class="alert alert-success" role="alert" data-alert="success">
          <ul>
            {foreach $notifications.success as $notif}
              <li>{$notif|escape:'html':'UTF-8'}</li>
            {/foreach}
          </ul>
        </article>
      {/block}
    {/if}

    {if $notifications.info}
      {block name='notifications_info'}
        <article class="alert alert-info" role="alert" data-alert="info">
          <ul>
            {foreach $notifications.info as $notif}
              <li>{$notif|escape:'html':'UTF-8'}</li>
            {/foreach}
          </ul>
        </article>
      {/block}
    {/if}
  </div>
</aside>
{/if}
