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
<div class="contact-rich">
  {if isset($tc_config.BLOCKCONTACTINFOS_ADDRESS) && $tc_config.BLOCKCONTACTINFOS_ADDRESS}
            <div class="block">
                <div class="icon"><i class="material-icons">place</i></div>
                <div class="data">{l s='Address:' d='Shop.Theme.Actions'}<br />
                {$tc_config.BLOCKCONTACTINFOS_ADDRESS|escape:'html':'UTF-8'}</div>
            </div>
      {else if (isset($contact_infos.address.address1) && $contact_infos.address.address1) || (isset($contact_infos.address.address2) && $contact_infos.address.address2)}
          {if $contact_infos.address.address1}
              <div class="block">
                <div class="icon"><i class="material-icons">place</i></div>
                <div class="data">
                    {l s='Address:' d='Shop.Theme.Actions'}<br />
                    {$contact_infos.address.address1|escape:'html':'UTF-8'}
                </div>
              </div>
          {/if}
          {if $contact_infos.address.address2}
              <div class="block">
                <div class="icon"><i class="material-icons">place</i></div>
                <div class="data">
                    {l s='Address:' d='Shop.Theme.Actions'}<br />
                    {$contact_infos.address.address2|escape:'html':'UTF-8'}
                </div>
              </div>
          {/if}
      {else}
        {if isset($contact_infos.address.formatted) && $contact_infos.address.formatted}
            <div class="block">
                <div class="icon"><i class="material-icons">place</i></div>
                <div class="data">
                    {l s='Address:' d='Shop.Theme.Actions' }<br />
                    {$contact_infos.address.formatted|escape:'html':'UTF-8'}
                </div>
              </div>
        {/if}
      {/if}
  
  
  
  {if isset($tc_config.BLOCKCONTACTINFOS_PHONE_LABEL) && $tc_config.BLOCKCONTACTINFOS_PHONE_LABEL}
    <div class="block">
      <div class="icon"><i class="material-icons">local_phone</i></div>
      <div class="data">
        {l s='Call us:' d='Shop.Theme.Actions'}<br/>
        <a href="tel:{$tc_config.BLOCKCONTACTINFOS_PHONE_CALL|escape:'html':'UTF-8'}">{$tc_config.BLOCKCONTACTINFOS_PHONE_LABEL|escape:'html':'UTF-8'}</a>
       </div>
    </div>
  {/if}
  
  
  
  
  {if $contact_infos.fax}
    <div class="block">
      <div class="icon"><i class="material-icons">present_to_all</i></div>
      <div class="data">
        {l s='Fax:' d='Shop.Theme.Actions'}<br/>
        {$contact_infos.fax|escape:'html':'UTF-8'}
      </div>
    </div>
  {/if}
  {if $contact_infos.email}
    <div class="block">
      <div class="icon"><i class="material-icons">mail_outline</i></div>
      <div class="data email">
        {l s='Email us:' d='Shop.Theme.Actions'}<br/>
        <a href="mailto:{$contact_infos.email|escape:'html':'UTF-8'}">{$contact_infos.email|escape:'html':'UTF-8'}</a>
       </div>
    </div>
  {/if}
</div>
