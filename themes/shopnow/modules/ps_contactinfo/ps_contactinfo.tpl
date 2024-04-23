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
<div class="block-contact links wrapper">
    <h4 class="text-uppercase title-footer-block block-contact-title hidden-xs-down">{l s='Contact Us' d='Shop.Theme.Actions'}</h4>
    
    <div class="title clearfix hidden-md-up" data-target="#contact_footer" data-toggle="collapse">
        <span class="h3">{l s='Contact Us' d='Shop.Theme.Actions'}</span>
        <span class="pull-xs-right">
          <span class="navbar-toggler collapse-icons">
            <i class="material-icons add">expand_more</i>
            <i class="material-icons remove">expand_less</i>
          </span>
        </span>
    </div>
    <div id="contact_footer" class="contactinfo_footer collapse">
      {if isset($tc_config.BLOCKCONTACTINFOS_ADDRESS) && $tc_config.BLOCKCONTACTINFOS_ADDRESS}
            <div>
                <i aria-hidden="true" class="icon_pin_alt"></i>
                {l s='Address:' d='Shop.Theme.Actions'}
                {$tc_config.BLOCKCONTACTINFOS_ADDRESS|escape:'html':'UTF-8'}
            </div>
      {else if (isset($contact_infos.address.address1) && $contact_infos.address.address1) || (isset($contact_infos.address.address2) && $contact_infos.address.address2)}
          {if $contact_infos.address.address1}
              <div>
                <i aria-hidden="true" class="icon_pin_alt"></i>
                {l s='Address: [1]%address1%[/1]'
                  sprintf=[
                  '[1]' => '<span>',
                  '[/1]' => '</span>',
                  '%address1%' => $contact_infos.address.address1
                  ]
                  d='Shop.Theme.Actions'
                }
              </div>
          {/if}
          {if $contact_infos.address.address2}
              <div>
                <i aria-hidden="true" class="icon_pin_alt"></i>
                {l s='Address2: [1]%address2%[/1]'
                  sprintf=[
                  '[1]' => '<span>',
                  '[/1]' => '</span>',
                  '%address2%' => $contact_infos.address.address2
                  ]
                  d='Shop.Theme.Actions'
                }
              </div>
          {/if}
      {else}
        {if isset($contact_infos.address.formatted) && $contact_infos.address.formatted}
            <div>
                <i aria-hidden="true" class="icon_pin_alt"></i>
                {l s='Address: [1]%address%[/1]'
                  sprintf=[
                  '[1]' => '<span>',
                  '[/1]' => '</span>',
                  '%address%' => $contact_infos.address.formatted
                  ]
                  d='Shop.Theme.Actions'
                }
              </div>
        {/if}
      {/if}

      {if isset($tc_config.BLOCKCONTACTINFOS_PHONE_LABEL) && $tc_config.BLOCKCONTACTINFOS_PHONE_LABEL}
        <div>
            <a href="tel:{$tc_config.BLOCKCONTACTINFOS_PHONE_CALL|escape:'html':'UTF-8'}">
              <i class="fa fa-phone"></i>
              {l s='Phone: ' d='Modules.Contactinfo.Shop'}{$tc_config.BLOCKCONTACTINFOS_PHONE_LABEL|escape:'html':'UTF-8'}
          </a>
        </div>
      {/if}
      {if $contact_infos.fax}
        <div>
            {l s='Fax:' d='Shop.Theme.Actions' }{$contact_infos.fax nofilter}
        </div>
      {/if}
      {if $contact_infos.email}
        <div>
            <a href="mailto:{$contact_infos.email|escape:'html':'UTF-8'}">
                <i aria-hidden="true" class="icon_mail_alt"></i>
                {l s='Email: ' d='Shop.Theme.Actions' } {$contact_infos.email|escape:'html':'UTF-8'}
            </a>
        </div>
      {/if}
      {if isset($tc_config.BLOCKCONTACTINFOS_SKYPE) && $tc_config.BLOCKCONTACTINFOS_SKYPE}
        <div>
            <a href="skype:live:{$tc_config.BLOCKCONTACTINFOS_SKYPE|escape:'html':'UTF-8'}?call">
                <i class="fa fa-skype"></i>
                {l s='Skype:' d='Shop.Theme.Actions'} {$tc_config.BLOCKCONTACTINFOS_SKYPE|escape:'html':'UTF-8'}
            </a>
        </div>
      {/if}
    </div>
</div>