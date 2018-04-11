// Top colourful bar
jQuery(document).ready(function() {
	jQuery("#top-bar").animate({
		width: "100%"
	},
	{
		queue: false,
		duration: 5000
	});
	// Mouse over search box focus function
	jQuery("#s").mouseover(function() {
		jQuery(this).focus().val([""]);
	});
	// Link sparkling function
	jQuery(".post_meta li,body a:not(.post_meta li a)").hover(function() {
		if (!jQuery(this).is(":animated")) {
			jQuery(this).animate({
				opacity: ".7"
			},
			220).animate({
				opacity: "1"
			},
			180);
		}
	});

    $(function () {
        $("#return_top").click(//定义返回顶部点击向上滚动的动画
        function () {
            $('html,body').animate({ scrollTop: 0 }, 1000);
        });
    })	

	// When a link is clicked
	jQuery("a.tab").click(function() {

		// switch all tabs off
		jQuery(".active").removeClass("active");

		// switch this tab on
		jQuery(this).addClass("active");

		// slide all content up
		jQuery(".content").slideUp();

		// slide this content up
		var content_show = jQuery(this).attr("title");
		jQuery("#" + content_show).slideDown();

	});

	jQuery('#tab-title span').click(function() {
		jQuery(this).addClass("selected").siblings().removeClass();
		jQuery("#tab-content > .widget-container").slideUp('1500').eq(jQuery('#tab-title span').index(this)).slideDown('1500');
	});

});