/*
 * Smartsupp Live Chat integration module.
 * 
 * @package   Smartsupp
 * @author    Smartsupp <vladimir@smartsupp.com>
 * @link      http://www.smartsupp.com
 * @copyright 2016 Smartsupp.com
 * @license   GPL-2.0+
 *
 * Plugin Name:       Smartsupp Live Chat
 * Plugin URI:        http://www.smartsupp.com
 * Description:       Adds Smartsupp Live Chat code to PrestaShop.
 * Version:           2.2.0
 * Author:            Smartsupp
 * Author URI:        http://www.smartsupp.com
 * Text Domain:       smartsupp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

jQuery(document).ready( function($) {
    
    function page_refresh(errMsg) {
        var control = $( "#SMARTSUPP_OPTIONAL_API" ).next();
        var text = control.html();
        control.css('font-style', 'normal');
        control.html(text.replace('#', '<a href="https://developers.smartsupp.com/?utm_source=Prestashop&utm_medium=integration&utm_campaign=link" target="_blank">Smartsupp API</a>'));
        
        if ($( "#smartsupp_key" ).val() === "") {
            $( "#smartsupp_configuration" ).hide();
            $( "#configuration_form.smartsupp" ).hide();
            
            if (errMsg === true) {
                $( "#smartsupp_create_account" ).hide();
                $( "#smartsupp_connect_account" ).show();
            } else {
                $( "#smartsupp_connect_account" ).hide();
                $( "#smartsupp_create_account" ).show();
            }
        }
        else {
            $( "#smartsupp_create_account" ).hide();
            $( "#smartsupp_connect_account" ).hide();
            $( "#smartsupp_configuration" ).show();
            $( "#configuration_form.smartsupp" ).show();        
        }        
    } 
    page_refresh();
    $( "#configuration_form.smartsupp #SMARTSUPP_OPTIONAL_API" ).height("117px");   
    
    $( "#connect_existing_account_btn1, #connect_existing_account_btn2" ).click(function() {
        $("#smartsupp_configuration").next('.bootstrap').hide();
        $("div.messages").hide();
        $( "#smartsupp_create_account" ).hide();
        $( "#smartsupp_connect_account" ).show();
    });
    
    $( "#create_account_btn1, #create_account_btn2" ).click(function() {
        $("#smartsupp_configuration").next('.bootstrap').hide();
        $("div.messages").hide();
        $( "#smartsupp_connect_account" ).hide();
        $( "#smartsupp_create_account" ).show();
    });
    
    $( "#connect_existing_account_do" ).click(function() {
        var errMsg = false;

        $.ajax({
                url: ajax_controller_url,
                async: false,
                type: 'POST',
                data: {
                    action: 'login', 
                    email: $( "#smartsupp_connect_account #SMARTSUPP_EMAIL" ).val(), 
                    password: $( "#smartsupp_connect_account #SMARTSUPP_PASSWORD" ).val()
                },
                dataType: 'json',
                headers: { "cache-control": "no-cache" },
                success: function(data) {
                        $("input#smartsupp_key").val(data.key);
                        $("#smartsupp_configuration p.email").html(data.email);
                        if (data.error === null) {
                            $("div.messages").hide();
                            errMsg = false;
                        }
                        else {
                            $("#smartsupp-login-alerts").show();
                            $("#smartsupp-login-alert").html(data.message);
                            errMsg = true;
                        }
                }
        });        
        page_refresh(errMsg);
    });

    $( "#create_account_do" ).click(function() {
        $.ajax({
            url: ajax_controller_url,
            async: false,
            type: 'POST',
            data: {
                action: 'create', 
                email: $( "#smartsupp_create_account #SMARTSUPP_EMAIL" ).val(), 
                password: $( "#smartsupp_create_account #SMARTSUPP_PASSWORD" ).val(),
                marketing: $( "#smartsupp_create_account #SMARTSUPP_MKT" ).val()
            },
            dataType: 'json',
            headers: { "cache-control": "no-cache" },
            success: function(data) {
                $("input#smartsupp_key").val(data.key);
                    $("#smartsupp_configuration p.email").html(data.email);
                    if (data.error === null) {
                        $("#smartsupp_create_account .alerts").hide();
                    }
                    else {
                        $("#smartsupp_create_account .alerts").show();
                        $("#smartsupp_create_account .alerts .alert").html(data.message);
                    }
            }
        });        
        page_refresh();    
    });
        
    $( "#deactivate_chat_do" ).click(function() {
        $("#smartsupp_configuration").next('.bootstrap').hide();
        $.ajax({
                url: ajax_controller_url,
                async: false,
                type: 'POST',
                data: {
                    action: 'deactivate'
                },
                dataType: 'json',
                headers: { "cache-control": "no-cache" },
                success: function(data) {
                        $("input#smartsupp_key").val(data.key);
                        $("#smartsupp_configuration p.email").html(data.email);
                }
        });
        page_refresh();
    });
});    