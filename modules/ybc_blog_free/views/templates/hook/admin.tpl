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
{if $ybc_blog_free_error_message}
    {$ybc_blog_free_error_message nofilter}
{/if}
<script type="text/javascript"> 
    var ybc_blog_free_ajax_url = '{$ybc_blog_free_ajax_url nofilter}';
    var ybc_blog_free_default_lang = {$ybc_blog_free_default_lang|intval};
    var ybc_blog_free_is_updating = {$ybc_blog_free_is_updating|intval};
    var ybc_blog_free_is_config_page = {$ybc_blog_free_is_config_page|intval};
    var ybc_blog_free_invalid_file = '{$ybc_blog_free_invalid_file|escape:'html':'UTF-8'}';
</script>
<script type="text/javascript" src="{$ybc_blog_free_module_dir|escape:'html':'UTF-8'}views/js/admin.js"></script>
<div class="bootstrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                {$ybc_blog_free_sidebar nofilter}
                <div class="blog_center_content col-lg-10">
                    {$ybc_blog_free_body_html nofilter}
                </div>
            </div>
        </div>
    </div>
</div>