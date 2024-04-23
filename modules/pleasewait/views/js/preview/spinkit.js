/*
* 2007-2017 PrestaShop
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
*/
$(function() {

  $(".pagination a").click(function(e){
    e.preventDefault();
    // Remove the selected class from the currently selected indicator
    $(this).parent().parent().find(".selected").removeClass("selected");
    // Make the clicked indicator the selected one
    $(this).addClass("selected");
    
    updateSlideshowForSelectedPage();
  });
  
  $("#next").click(function(e) {
    goToNext();
  });
  
  $("#prev").click(function(e) {
    goToPrev();
  });

  // Keyboard shortcuts
  $("body").keyup(function(e) {
    if (e.keyCode == 39) {
      // Key right
      goToNext();
    } else if (e.keyCode == 37) {
      // Key left
      goToPrev();
    } else if (e.keyCode == 83) {
      // S key
      showSourceForActiveSpinner();
    } else if (e.keyCode == 27) {
      dismissSourceFrame();
    }
  }).keydown(function(e) {
    if (e.keyCode == 13) {
      // Enter key
      // The enter key needs to be set to keydown, to not trigger when you
      // hit enter in the URL field to enter the site
      showSourceForActiveSpinner();
    }
  });

  $(".js-sk-source-link").click(function(e) {
    e.preventDefault();
    showSourceForActiveSpinner();
  });

  // Present the source frame from dismissing when interacting with the textarea
  $("#source-frame textarea").click(function(e) {
    e.stopPropagation();
  });

  // Dismiss the sourceframe when clicking the black overlay
  $("#source-frame ul").click(function(e) {
    dismissSourceFrame();
  });
  
  function goToNext() {
    // Exit if there are no more spinners
    if ($(".pagination .selected").parent().index()+1 >= $(".pagination li").length)
      return;

    // Exit if there source-frame is visible
    if ($("#source-frame").hasClass("visible"))
      return;

    $(".pagination .selected")
      .removeClass("selected")
      .parent().next().find("a").addClass("selected");
    
    updateSlideshowForSelectedPage();
  }
  
  function goToPrev() {
    // Exit if the currently selected spinner is the first one
    if ($(".pagination .selected").parent().index() <= 0)
      return;

    // Exit if there source-frame is visible
    if ($("#source-frame").hasClass("visible"))
      return;

    $(".pagination .selected")
      .removeClass("selected")
      .parent().prev().find("a").addClass("selected");
    
    updateSlideshowForSelectedPage();
  }
  
  function updateSlideshowForSelectedPage() {
    var index = $(".pagination .selected").parent().index(),
        classIndex = parseInt(index+1, 10);
    $("body").attr("class", "active" + classIndex);
    
    $("#spinners .selected").removeClass("selected");
    $("#spinners li:nth-child(" + classIndex + ")").addClass("selected");
  }

  function showSourceForActiveSpinner() {
    // Exit if the source-frame is already visible
    if ($("#source-frame").hasClass("visible")) return;

    // Show the corresponding li in the source list
    var index = $(".pagination .selected").parent().index();
    $("#source-frame li:eq("+ parseInt(index, 10) +")").addClass("visible");

    $("#source-frame").addClass("visible");
  }

  function dismissSourceFrame() {
    $("#source-frame .visible").removeClass("visible");
    $("#source-frame").removeClass("visible");
  }
	
});
