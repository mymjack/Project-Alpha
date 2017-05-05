(function($) {

	skel.breakpoints({
		xlarge:	'(max-width: 1680px)',
		large:	'(max-width: 1280px)',
		medium:	'(max-width: 980px)',
		small:	'(max-width: 736px)',
		xsmall:	'(max-width: 480px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 100);
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Off-Canvas Navigation.

			// Navigation Panel Toggle.
				$('<a href="#navPanel" class="navPanelToggle"></a>')
					.appendTo($body);

			// Navigation Panel.
				$(
					'<div id="navPanel">' +
						$('#nav').html() +
						'<a href="#navPanel" class="close"></a>' +
					'</div>'
				)
					.appendTo($body)
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'right'
					});

			// Fix: Remove transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#navPanel')
						.css('transition', 'none');


	});

})(jQuery);


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
		url: './login-form.php', 
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
	if (!new RegExp($un.attr('pattern')).test($un.val())) {
		notify('Username must be at least 3 characters long', 'notify-red');
		return;
	}

	if ($pw.val() == '' && $pw.prop('required')) {
		notify('Password is empty', 'notify-red');
		return;
	}
	if (!new RegExp($pw.attr('pattern')).test($pw.val())) {
		notify('Password must be at least 3 characters long', 'notify-red');
		return;
	}

	if ($cpw.val() != $pw.val()) {
		notify('Confirm password does not match password', 'notify-red');
		return;
	}

	$.ajax({
		url: './regis-form.php', 
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
	$('#info-form-btn').find("> button").toggleClass('hidden');
	$('#info-form').find("> div.row").toggleClass('hidden');
}

function saveInfo() {
	$.ajax({
		url: './save-info.php', 
    	type: "POST",
		data: $('#info-form-form').serialize(),
		success: function(result) {
			data = JSON.parse(result);
			if (data.status == 'success') {
				notify("您的信息已成功保存", 'notify-green');
				setTimeout(function(){location.reload();}, 2500);
			} else {
				notify(data.errorMsg, 'notify-red');
			}
		},
		error: function(result) {
			notify("服务器繁忙，请稍后重试", 'notify-red');
		}
    });
}