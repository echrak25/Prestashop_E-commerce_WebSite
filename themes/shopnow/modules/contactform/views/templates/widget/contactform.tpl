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
<div class="contact-form">
  <form action="{$urls.pages.contact|escape:'html':'UTF-8'}" method="post" {if $contact.allow_file_upload}enctype="multipart/form-data"{/if}>

    {if $notifications}
      <div class="col-xs-12 alert {if $notifications.nw_error}alert-danger{else}alert-success{/if}">
        <ul>
          {foreach $notifications.messages as $notif}
            <li>{$notif|escape:'html':'UTF-8'}</li>
          {/foreach}
        </ul>
      </div>
    {/if}

    <div class="form-fields">
      <div class="form-group row">
        <label class="col-md-3 form-control-label">{l s='Subject' d='Shop.Forms.Labels'}</label>
        <div class="col-md-6">
          <select name="id_contact" class="form-control form-control-select">
            {foreach from=$contact.contacts item=contact_elt}
              <option value="{$contact_elt.id_contact|escape:'html':'UTF-8'}">{$contact_elt.name|escape:'html':'UTF-8'}</option>
            {/foreach}
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 form-control-label">{l s='Email address' d='Shop.Forms.Labels'}</label>
        <div class="col-md-6">
          <input
            class="form-control"
            name="from"
            type="email"
            value="{$contact.email|escape:'html':'UTF-8'}"
            placeholder="{l s='your@email.com' d='Shop.Forms.Help'}"
          >
        </div>
      </div>

      {if $contact.orders}
        <div class="form-group row">
          <label class="col-md-3 form-control-label">{l s='Order reference' d='Shop.Forms.Labels'}</label>
          <div class="col-md-6">
            <select name="id_order" class="form-control form-control-select">
              <option value="">{l s='Select reference' d='Shop.Forms.Help'}</option>
              {foreach from=$contact.orders item=order}
                <option value="{$order.id_order|escape:'html':'UTF-8'}">{$order.reference|escape:'html':'UTF-8'}</option>
              {/foreach}
            </select>
          </div>
          <span class="col-md-3 form-control-comment">
            {l s='optional' d='Shop.Forms.Help'}
          </span>
        </div>
      {/if}

      {if $contact.allow_file_upload}
        <div class="form-group row">
          <label class="col-md-3 form-control-label">{l s='Attachment' d='Shop.Forms.Labels'}</label>
          <div class="col-md-6">
            <input type="file" name="fileUpload" class="filestyle">
          </div>
          <span class="col-md-3 form-control-comment">
            {l s='optional' d='Shop.Forms.Help'}
          </span>
        </div>
      {/if}

      <div class="form-group row">
        <label class="col-md-3 form-control-label">{l s='Message' d='Shop.Forms.Labels'}</label>
        <div class="col-md-9">
          <textarea
            class="form-control"
            name="message"
            placeholder="{l s='How can we help?' d='Shop.Forms.Help'}"
            rows="3"
          >{if $contact.message}{$contact.message|escape:'html':'UTF-8'}{/if}</textarea>
        </div>
      </div>
    </div>

    <footer class="form-footer">
        <div class="form-group row">
            <label class="col-md-3 form-control-label"></label>
            <div class="col-md-9">
                <input class="btn btn-primary" type="submit" name="submitMessage" value="{l s='Send' d='Shop.Theme.Actions'}">
            </div>
        </div>
    </footer>

  </form>
</div>
