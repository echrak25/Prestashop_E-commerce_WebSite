{*
* 2007-2015 PrestaShop
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
{if isset($errors) && $errors}
    <div class="ybc_blog_free_alert error">
        <div class="bootstrap">
            <div class="module_error alert alert-danger">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <ul>
                    {foreach from=$errors item='error'}
                        <li>{$error|escape:'html':'UTF-8'}</li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
{/if}
{if isset($import_ok) && $import_ok}
    <div class="ybc_blog_free_alert success">
        <div class="bootstrap">
            <div class="module_confirmation conf confirm alert alert-success">
                <button data-dismiss="alert" class="close" type="button">×</button>
                    {l s='Import successfull' mod='ybc_blog_free'}
            </div>
        </div>
    </div>
{/if}
<form id="module_form" class="defaultForm form-horizontal" novalidate="" enctype="multipart/form-data" method="post" action="">
    <div id="fieldset_0" class="panel">
        <div class="panel-heading">
            <i class="material-icons"></i>
            {l s='Export/Import' mod='ybc_blog_free'}
        </div>
        <div class="ybc_blog_free_export_form_content">
            <div class="ybc_blog_free_export_option">
                <div class="panel-heading">
                    {l s='Export blog content' mod='ybc_blog_free'}
                </div>
                <button type="submit" name="submitExportBlog" class="submitExportBlog"><i class="icon icon-download"></i>{l s='Export blog' mod='ybc_blog_free'}</button>
                <p class="ybc_blog_free_export_option_note">{l s='Export all blog data including blog images, text, custom CSS and configuration' mod='ybc_blog_free'}</p>
            </div>
            <div class="ybc_blog_free_import_option">
                <div class="panel-heading">
                    {l s='Import blog data' mod='ybc_blog_free'}
                </div>
                <div class="ybc_blog_free_import_option_updata">
                    <label for="blogdata">{l s='Data package' mod='ybc_blog_free'}</label>
                    <input id="blogdata" type="file" name="blogdata" />
                </div>
                <div class="ybc_blog_free_import_option_clean">
                    <input type="checkbox" name="importoverride" id="importoverride" value="1" />
                    <label for="importoverride">{l s='Override existing data' mod='ybc_blog_free'}</label>
                </div>
                <div class="ybc_blog_free_import_option_button">
                    <div class="ybc_blog_free_import_submit">
                        <button type="submit" name="submitImportBlog" class="submitImportBlog"><i class="icon icon-compress"></i>{l s='Import data' mod='ybc_blog_free'}</button>
                    </div>
                </div>
            </div>
    </div>
    </div>
</form>