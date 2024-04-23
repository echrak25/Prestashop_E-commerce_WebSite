<script type="text/javascript">
var PC_ETS_VER_17 = {$_VER_17|intval};
var PC_ETS_VER_16 = {$_VER_16|intval};
{if isset($configs) && $configs}
{foreach from=$configs key=id item=config}
var {$id|escape:'html':'UTF-8'} = '{$config|escape:'html':'UTF-8'}';
{/foreach}
{/if}
var PC_ETS_REDIRECT_URL = '{$redirectURL nofilter}';
var PC_ETS_STATIC_TOKEN = '{$static_token nofilter}';
</script>
