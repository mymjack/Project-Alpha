// (function($) {

// 	skel.breakpoints({
// 		xlarge:	'(max-width: 1680px)',
// 		large:	'(max-width: 1280px)',
// 		medium:	'(max-width: 980px)',
// 		small:	'(max-width: 736px)',
// 		xsmall:	'(max-width: 480px)'
// 	});

// 	$(function() {

// 		var	$window = $(window),
// 			$body = $('body');

// 		// Disable animations/transitions until the page has loaded.
// 			$body.addClass('is-loading');

// 			$window.on('load', function() {
// 				window.setTimeout(function() {
// 					$body.removeClass('is-loading');
// 				}, 100);
// 			});

// 		// Fix: Placeholder polyfill.
// 			$('form').placeholder();

// 		// Prioritize "important" elements on medium.
// 			skel.on('+medium -medium', function() {
// 				$.prioritize(
// 					'.important\\28 medium\\29',
// 					skel.breakpoint('medium').active
// 				);
// 			});

// 		// Off-Canvas Navigation.

// 			// Navigation Panel Toggle.
// 				$('<a href="#navPanel" class="navPanelToggle"></a>')
// 					.appendTo($body);

// 			// Navigation Panel.
// 				$(
// 					'<div id="navPanel">' +
// 						$('#nav').html() +
// 						'<a href="#navPanel" class="close"></a>' +
// 					'</div>'
// 				)
// 					.appendTo($body)
// 					.panel({
// 						delay: 500,
// 						hideOnClick: true,
// 						hideOnSwipe: true,
// 						resetScroll: true,
// 						resetForms: true,
// 						side: 'right'
// 					});

// 			// Fix: Remove transitions on WP<10 (poor/buggy performance).
// 				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
// 					$('#navPanel')
// 						.css('transition', 'none');


// 	});

// })(jQuery);

// Definitions
regexpTel = new RegExp("^([ \.\-\/\\\(\)]{0,2}[a-zA-Z_]{0,5}[ \.\-\/\\\(\)]?\d){6,24}[ \.\-\/\\\(\)]?$");
regexpEmail = new RegExp("^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"); // W3C
regexpUsername = new RegExp("^.{3,30}$");
regexpPassword = new RegExp("^.{3,40}$");

// Finds the div noti and display the notification text inside in some color for some seconds.
var notifying = null;
function notify(text, colorClass, waitForSec) {
	if (notifying)
		clearTimeout(notifying);

	colorClass = colorClass || 'notify-yellow';
	waitForSec = waitForSec || 5;
	var totalHeight = 0;
	$($("#noti").children()[0]).html(text).removeClass('notify-red notify-yellow notify-green').addClass(colorClass);
	$("#noti").children().each(function(){
	    totalHeight = totalHeight + $(this).outerHeight(true);
	});
	$('#noti').css('height', totalHeight.toString()+'px');
	notifying = setTimeout(function(){$('#noti').css('height', '0');}, waitForSec*1000);
}

function backToTop(offset) {
	offset = offset || "0";
	$("html, body").animate({ scrollTop: offset+"px" });
}

// POSTs the login info to server via AJAX
function login() {
	$.ajax({
		url: './server/login_form.php', 
    	type: "POST",
		data: $('form').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				window.location.href = data.redirect;
			} else {
				notify(data.errorMsg, 'notify-red');
			}
		}
    });
}

// POSTs the register info to server via AJAX
function register() {
	$un = $('#un');
	$pw = $('#pw');
	$cpw = $('#cpw');

	if ($un.val() == '' && $un.prop('required')) {
		notify('Username is empty', 'notify-red');
		return;
	}
	if (!regexpUsername.test($un.val())) {
		notify('Username must be 3-30 characters long', 'notify-red');
		return;
	}

	if ($pw.val() == '' && $pw.prop('required')) {
		notify('Password is empty', 'notify-red');
		return;
	}
	if (!regexpPassword.test($pw.val())) {
		notify('Password must be 3-40 characters long', 'notify-red');
		return;
	}

	if ($cpw.val() != $pw.val()) {
		notify('Confirm password does not match password', 'notify-red');
		return;
	}

	$.ajax({
		url: './server/register_form.php', 
    	type: "POST",
		data: $('form').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				window.location.href = data.redirect;
			} else {
				notify(data.errorMsg, 'notify-red');
			}
		}
    });
}

function toggleInfo() {
	$('#user-info-btn').find("> button").toggleClass('hidden');
	$('#user-info').toggleClass('display');
	formDisplayAdjust($('#user-info'));
}

function toggleOrder() {
	$("#edit, #submit, #add-item").toggleClass('hidden');
	$("#contact-info, #items, #shipment").toggleClass('display');
	formDisplayAdjust($("#contact-info, #items, #shipment"));
}

function toggleFlight() {
	$("#edit, #submit").toggleClass('hidden');
	$("#flyer-info, #flight-info").toggleClass('display');
	formDisplayAdjust($("#flyer-info, #flight-info"));
}

function formDisplayAdjust($form) {
	if ($form.hasClass('display')) {
		$form.find('.input-with-label input').each(function(){
			$(this).attr('size', $(this).val().length+1).prop('disabled', 'true');
		});
		$form.find('.input-with-label textarea, .input-with-label select').each(function(){
			$(this).prop('disabled', 'true');
		});
	} else {
		$form.find('.input-with-label input, \
			.input-with-label select, \
			.input-with-label textarea').removeAttr('size').removeProp('disabled');
	}
}

function saveInfo() {
	$.ajax({
		url: './server/profile_form.php', 
    	type: "POST",
		data: $('#user-info').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				notify("您的信息已成功保存", 'notify-green');
				toggleInfo();
			} else {
				notify(data.errorMsg, 'notify-red');
			}
		},
		error: function(result) {
			notify("服务器繁忙，请稍后重试", 'notify-red');
		}
    });
}

var itemIdCounter = 0;
function addItem() {
	itemIdCounter ++;
	$newItem = $("#item-template").clone()
	$newItem.attr("id", "item-"+itemIdCounter).attr("class", "");
	$newItem.find("input[type=file]").attr("id", "item-img-"+itemIdCounter);
	fileUploader($newItem.find("ul"));
	bindDragHighlight($newItem.find("li.drop-zone"));
	$newItem.appendTo($("#items"));
	$newItem.find("input[type!=file]").change(function(){reEstimateOrder()});

	// Code below triggers delete when quantity drop below 1
	$newItem.find("input[name=quantity]").change(function(){
		if ($(this).val() <= 0) {
			removeItem($(this), $(this).parent().parent());
		}
	});

	// Alternate, X button, but no space for it
	// $newItem.find("button[name=remove]").click(function(){
	// 	removeItem($(this), $(this).parent().parent());
	// });
}

function removeItem($source, $item) {
	$item.animate({opacity:0},500, function(){
		// Unregister uploaded images here
		$item.animate({height:0},300, function(){
			$item.remove();
		});
	});
}

function reEstimateOrder() {
	console.log('Re-estimating weight and value. (Algorithm is empty) ');
	var totalWeight = 10, totalValue = 100;

	// Implement estimate algorithm here.

	$('#total-weight').html(totalWeight);
	$('#total-value').html(totalValue);
}

// Transform select spinners into fancier ones
if (typeof $('<select></select>').select2 === "function") { 
	$('select.dep').select2({
		placeholder: "- 出发地 -",
	  	allowClear: true
	});
	$('select.arri').select2({
		placeholder: "- 目的地 -",
	  	allowClear: true
	});
}

// Back to top button
$('#back-to-top').click(function(){backToTop()});