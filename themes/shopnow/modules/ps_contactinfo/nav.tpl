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
<div id="_desktop_contact_link">
  <div id="contact-link">
    {if isset($tc_config.BLOCKCONTACTINFOS_PHONE_CALL) && $tc_config.BLOCKCONTACTINFOS_PHONE_CALL}
      <div class="contact_link_item">
          <a href="tel:{$tc_config.BLOCKCONTACTINFOS_PHONE_CALL|escape:'html':'UTF-8'}">
              <i class="fa fa-phone" aria-hidden="true"></i>
              {l s='Phone: ' d='Modules.Contactinfo.Shop'}{$tc_config.BLOCKCONTACTINFOS_PHONE_LABEL|escape:'html':'UTF-8'}
          </a>
      </div>
    {/if}
    {if isset($contact_infos.email) && $contact_infos.email}
     <div class="contact_link_item">
          <a href="mailto:{$contact_infos.email|escape:'html':'UTF-8'}">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              {l s='Email: ' d='Modules.Contactinfo.Shop'}{$contact_infos.email|escape:'html':'UTF-8'}
          </a>
      </div>
    {/if}
  </div>
</div>
