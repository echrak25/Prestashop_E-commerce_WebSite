{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 *}
<link rel="stylesheet" href="https://unpkg.com/micromodal/dist/micromodal.min.css">
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
<script src="{$path|escape:'htmlall':'UTF-8'}views/js/wizardai.elementor.js"></script>
<script>
    var ajaxWizardAIUrl = "{$ajaxUrl|escape:'htmlall':'UTF-8'}";
    var labelAskButton = "{$labelAskButton|escape:'htmlall':'UTF-8'}";
    var labelModalTitle = "{$labelModalTitle|escape:'htmlall':'UTF-8'}";
    var labelPromptTextarea = "{$labelPromptTextarea|escape:'htmlall':'UTF-8'}";
    var labelModalSubmit = "{$labelModalSubmit|escape:'htmlall':'UTF-8'}";
    var labelModalClose = "{$labelModalClose|escape:'htmlall':'UTF-8'}";
    var securityToken = "{$securityToken|escape:'htmlall':'UTF-8'}";
    var wizardai_ps_account_id = "{$wizardai_ps_account_id|escape:'htmlall':'UTF-8'}";
</script>
