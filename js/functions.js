/*
 * http://love.hackerzhou.me
 */

// variables
var $win = $(window);
var clientWidth = $win.width();
var clientHeight = $win.height();

$(window).resize(function() {
    var newWidth = $win.width();
    var newHeight = $win.height();
    if (newWidth != clientWidth && newHeight != clientHeight) {
        location.replace(location);
    }
});

(function($) {
	$.fn.typewriter = function() {
		this.each(function() {
			var $ele = $(this), str = $ele.html(), progress = 0;
			$ele.html('');
			var timer = setInterval(function() {
				var current = str.substr(progress, 1);
				if (current == '<') {
					progress = str.indexOf('>', progress) + 1;
				} else {
					progress++;
				}
				$ele.html(str.substring(0, progress) + (progress & 1 ? '_' : ''));
				if (progress >= str.length) {
					clearInterval(timer);
				}
			}, 75);
		});
		return this;
	};
})(jQuery);

function timeElapse(){
	var current = new Date();
	current = (current / 1000 + 253) * 1000;
	var seconds = (Date.parse(current) - Date.parse(date)) / 1000;
	var days = Math.floor(seconds / (3600 * 24));
	seconds = seconds % (3600 * 24);
	var hours = Math.floor(seconds / 3600);
	if (hours < 10) {
		hours = "0" + hours;
	}
	seconds = seconds % 3600;
	var minutes = Math.floor(seconds / 60);
	if (minutes < 10) {
		minutes = "0" + minutes;
	}
	seconds = seconds % 60;
	if (seconds < 10) {
		seconds = "0" + seconds;
	}
	var result = "<span class=\"digit\">" + minutes + "</span> 分钟 <span class=\"digit\">" + seconds + "</span> 秒"; 
	$("#clock").html(result);
}

function resetTime(time){
  var timer=null;
  var t=time;
  var m=0;
  var s=0;
  m=Math.floor(t/60%60);
  m<10&&(m='0'+m);
  s=Math.floor(t%60);
  function countDown(){
   s--;
   s<10&&(s='0'+s);
   if(s.length>=3){
    s=59;
    m="0"+(Number(m)-1);
   }
   if(m.length>=3){
    m='00';
    s='00';
    clearInterval(timer);
   }

   var result = "<span class=\"digit\">" + m + "</span> 分钟 <span class=\"digit\">" + s + "</span> 秒"; 
   $("#clock").html(result);
  }
  timer=setInterval(countDown,1000);
}