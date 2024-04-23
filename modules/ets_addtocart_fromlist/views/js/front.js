/**
 * Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

var _0x7035 = ["\x61\x74\x63\x5F\x73\x70\x69\x6E\x6E\x65\x72", "\x61\x64\x64\x43\x6C\x61\x73\x73", "\x61\x75\x74\x6F\x72\x65\x6E\x65\x77", "\x68\x74\x6D\x6C", "\x69", "\x66\x69\x6E\x64", "\x64\x61\x74\x61\x2D\x69\x64\x2D\x70\x72\x6F\x64\x75\x63\x74\x2D\x61\x74\x74\x72\x69\x62\x75\x74\x65", "\x61\x74\x74\x72", "\x70\x61\x72\x65\x6E\x74", "\x76\x61\x6C", "\x2E\x61\x74\x63\x5F\x71\x74\x79", "\x64\x61\x74\x61\x2D\x69\x64\x2D\x70\x72\x6F\x64\x75\x63\x74", "\x50\x4F\x53\x54", "\x6E\x6F\x2D\x63\x61\x63\x68\x65", "\x63\x61\x72\x74", "\x70\x61\x67\x65\x73", "\x75\x72\x6C\x73", "\x3F\x72\x61\x6E\x64\x3D", "\x67\x65\x74\x54\x69\x6D\x65", "\x6A\x73\x6F\x6E", "\x61\x63\x74\x69\x6F\x6E\x3D\x75\x70\x64\x61\x74\x65\x26\x61\x64\x64\x3D\x31\x26\x61\x6A\x61\x78\x3D\x74\x72\x75\x65\x26\x71\x74\x79\x3D", "\x31", "\x26\x69\x64\x5F\x70\x72\x6F\x64\x75\x63\x74\x3D", "\x26\x74\x6F\x6B\x65\x6E\x3D", "\x73\x74\x61\x74\x69\x63\x5F\x74\x6F\x6B\x65\x6E", "\x26\x69\x70\x61\x3D", "", "\x26\x69\x64\x5F\x63\x75\x73\x74\x6F\x6D\x69\x7A\x61\x74\x69\x6F\x6E\x3D", "\x75\x6E\x64\x65\x66\x69\x6E\x65\x64", "\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73", "\x61\x64\x64\x5F\x73\x68\x6F\x70\x70\x69\x6E\x67\x5F\x63\x61\x72\x74", "\x75\x70\x64\x61\x74\x65\x43\x61\x72\x74", "\x61\x64\x64\x2D\x74\x6F\x2D\x63\x61\x72\x74", "\x65\x6D\x69\x74", "\x61\x6A\x61\x78"];
$(document).ready(function () {
    $(document).on('click','#ets_addToCart',function () {
        var $this = $(this);
        $(this).addClass('loading');
        let idCombination = $this.parent().closest('article.product-miniature').attr('data-id-product-attribute');
        let quantity = $('.ets_atc_qty').val();
        let idProduct = $this.parent().closest('article.product-miniature').attr('data-id-product');
        $.ajax({
            type: "POST",
            headers: {"\x63\x61\x63\x68\x65\x2D\x63\x6F\x6E\x74\x72\x6F\x6C": _0x7035[13]},
            url: prestashop[_0x7035[16]][_0x7035[15]][_0x7035[14]] + _0x7035[17] + new Date()[_0x7035[18]](),
            async: true,
            cache: false,
            dataType: _0x7035[19],
            data: _0x7035[20] + ((quantity && quantity != null) ? quantity : _0x7035[21]) + _0x7035[22] + idProduct + _0x7035[23] + prestashop[_0x7035[24]] + ((parseInt(idCombination) && idCombination != null) ? _0x7035[25] + parseInt(idCombination) : _0x7035[26] + _0x7035[27] + ((typeof customizationId !== _0x7035[28]) ? customizationId : 0)),
            success: function (_0x4bd3x3, _0x4bd3x4, _0x4bd3x5) {
                prestashop[_0x7035[33]](_0x7035[31], {
                    reason: {
                        idProduct: idProduct,
                        idProductAttribute: idCombination,
                        linkAction: _0x7035[32]
                    },
                    resp :_0x7035
                });
                $this.removeClass('loading');
            },
            error: function(xhr, status, error)
            {

                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });

    });
    if ( $('.atc_div.add-to-cart-button').length > 0 ){
        if ( $('.atc_div.add-to-cart-button').parents('.product-miniature').length > 0 ){
            $('.atc_div.add-to-cart-button').parents('.product-miniature').addClass('ets_cart_type_button');
        }

    }
});