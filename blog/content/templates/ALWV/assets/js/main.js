
(function($) {

	skel.breakpoints({
		xlarge: '(max-width: 1680px)',
		large: '(max-width: 1280px)',
		medium: '(max-width: 980px)',
		small: '(max-width: 736px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
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

		// Dropdowns.
			$('#nav > ul').dropotron({
				mode: 'fade',
				noOpenerFade: true,
				speed: 300
			});

		// Off-Canvas Navigation.

			// Navigation Toggle.
				$(
					'<div id="navToggle">' +
						'<a href="#navPanel" class="toggle"></a>' +
					'</div>'
				)
					.appendTo($body);

			// Navigation Panel.
				$(
					'<div id="navPanel">' +
						'<nav>' +
							$('#nav').navList() +
						'</nav>' +
					'</div>'
				)
					.appendTo($body)
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'left',
						target: $body,
						visibleClass: 'navPanel-visible'
					});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#navToggle, #navPanel, #page-wrapper')
						.css('transition', 'none');
						
	
		
		
		
		
	});
		
})(jQuery);

$(function(){
		$("#commentform").on("submit",function(){
		if($("#commail").length >0){
		if($.trim($("#comname").val()) == "" || $("#comname").val().length > 49) {
			$(".comment_error").html("请输入正确昵称(最大不超过49个字符)");
			$("#comname").focus();
			return false;
			};
		if($.trim($("#commail").val()) == "" || $("#commail").val().length > 128) {
			$(".comment_error").html("请输入正确邮箱(最大不超过128个字符)");
			$("#commail").focus();
			return false;
			};
		if($.trim($("#comment_content").val()) == "") {
			$(".comment_error").html("请输入评论内容");
			$("#comment_content").focus();
			return false;
			};
		}
		});
		
	
	$(".comment").hover(function(){	
		$(this).find(".comment-reply").show()
	},function(){
		$(this).find(".comment-reply").hide();
	});
	
	

})