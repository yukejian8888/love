/* @script.js文件 */

$(document).ready(function () {
	// Layout
	$('#m-nav li:nth-child(4n+1) a').addClass('clr1');
	$('#m-nav li:nth-child(4n+2) a').addClass('clr2');
	$('#m-nav li:nth-child(4n+3) a').addClass('clr3');
	$('#m-nav li:nth-child(4n+4) a').addClass('clr4');
	
	if ($('body').hasClass('p-homepage')) {
		// Listing posts in order
		var $container = $('.m-postlst');
		$container.imagesLoaded(function(){
			$container.masonry();
			// Fixing layout
			//fixLayout();
		});
    }
	if ($('body').hasClass('p-detailpage')) {
		if ($.browser.msie && $.browser.version === '10.0') {  // <ul>,<ol>
			$('html').addClass('ie10');
		}
	}
	
	// search
	bindSchEvents($('#j-lnksch'), $('#j-schform .txt'));
});
/*
** search function
*/
function bindSchEvents($lnk, $txt){
	$lnk.bind('click', function () {
		$(this).addClass('f-hidden').parent().addClass('m-schshow');
		setTimeout(function () {
			$txt.focus();
		}, 300);
		return false;
	});
	$txt.bind('blur', function () {
		setTimeout(function () {
			$lnk.removeClass('f-hidden').parent().removeClass('m-schshow');
		}, 300);
		return false;
	});
}