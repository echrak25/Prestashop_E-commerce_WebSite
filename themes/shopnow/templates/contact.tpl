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
{extends file='page.tpl'}

{block name='page_header_container'}{/block}

{block name='page_content'}
    {* contact layout 1*}
    {if isset($tc_config.YBC_TC_CONTACT_FORM_LAYOUT) && $tc_config.YBC_TC_CONTACT_FORM_LAYOUT == 'contact_layout1'}
      <div class="page_contact_layout1 col-xs-12 col-sm-12">
          {if $tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE && $tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE != ''}
            <div class="embe_map_contact">
                {$tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE nofilter}
            </div>
          {/if}
          {widget name="ps_contactinfo" hook='displayLeftColumn'}
          {widget name="contactform"}
      </div>
    {/if}
    
    
    {* contact layout 2*}
    {if isset($tc_config.YBC_TC_CONTACT_FORM_LAYOUT) && $tc_config.YBC_TC_CONTACT_FORM_LAYOUT == 'contact_layout2'}
        <div class="page_contact_layout2 col-xs-12 col-sm-12">
            <div class="row">
              {if $tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE && $tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE != ''}
                
                    <div class="embe_map_contact col-xs-12 col-sm-6">
                        {$tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE nofilter}
                    </div>
                    <div class="embe_map_contact col-xs-12 col-sm-6">
                        {widget name="contactform"}
                    </div>
                
              {else}
                <div class="embe_map_contact col-xs-12 col-sm-12">
                    {widget name="contactform"}
                </div>
              {/if}
              <div class="col-xs-12 col-sm-12">
                {widget name="ps_contactinfo" hook='displayLeftColumn'}
              </div>
            </div>
        </div> 
    {/if}
    
    {* contact layout 3*}
    {if isset($tc_config.YBC_TC_CONTACT_FORM_LAYOUT) && $tc_config.YBC_TC_CONTACT_FORM_LAYOUT == 'contact_layout3'}
        <div class="page_contact_layout3">  
          {if $tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE && $tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE != ''}
                <div class="col-sm-6 col-md-4">
                    {widget name="ps_contactinfo" hook='displayLeftColumn'}
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="embe_map_contact">
                        {$tc_config.YBC_TC_GOOGLE_MAP_EMBED_CODE nofilter}
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    {widget name="contactform"}
                </div>
          {else}
                <div class="col-sm-6 col-md-6">
                    {widget name="ps_contactinfo" hook='displayLeftColumn'}
                </div>
                <div class="col-sm-6 col-md-6">
                    {widget name="contactform"}
                </div>
          {/if}
        </div>
    {/if}
{/block}
