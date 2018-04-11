var _setCount=0;
var _setHeight=function(){
        var maxH=$(".main").height()>$(".aside").height()?$(".main").height():$(".aside").height();
        $(".main").height(maxH);
        $(".aside").height(maxH);
    };
function getCookie(name){
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;
}
var init=function(){
    if($("#sideTools").size()==0){
        $("body").append('<ul id="sideTools"><li class="top"><span></span>返回页头</li><li class="aboutMe"><span></span><a href="/about.html">关于我</a></li><li id="controlSide" class="right"><span></span><a href="javascript:void(0);">隐藏侧边</a></li><li class="suiyu"><span></span><a href="/t">碎语</a></li><li class="bottom"><span></span>到页尾</li></ul>');
    }
	var _w1=$(".container").width();
	var _w=$(".container").width()-300;
	if(getCookie("hideSide")){		
        $("#controlSide").attr("class","left").find("a").html("显示侧边");
		$(".aside").hide();
		$(".main").css("width","100%");
	}else{		
		$(".main").css("width",_w+"px");
	}
	
    $("#sideTools").mouseenter(function(){
        $(this).animate({
            right: '0px'
        }, 300);
    }).mouseleave(function(){
        $(this).animate({
            right: '-70px'
        }, 300);
    });
    $("#sideTools .top").click(function(){
        $('html,body').animate({
            scrollTop: '0px'
        }, 800);
    });
  
    $("#controlSide").click(function(){
        if($(this).attr("class")=="right"){
            $(".aside").animate({
                width:"0px",
                opacity: 'hide'
            },700);
            $(".main").animate({
				width:_w1
            },800);
            $(this).attr("class","left").find("a").html("显示侧边");
			document.cookie="hideSide=" + escape("1");
        }else{            
            $(".aside").animate({
                width:"280px",
                opacity: 'show'
            },800);
            $(".main").animate({
			   width:_w+"px"
            },700);
            $(this).attr("class","right").find("a").html("隐藏侧边");
			document.cookie = "hideSide=;expires="+(new Date(0)).toGMTString();
        }
    });
    $("#sideTools .bottom").click(function(){
		var top=$('#footer').offset().top;
			$('html,body').animate({
            scrollTop:top
        }, 800);
    });
	
    $(".side-box-title").click(function(){		
        var obj=$(this).next();
		if($(obj).attr("hide")){	
			$(obj).slideDown("fast", function(){
			  $(obj).removeAttr("hide");
			});
		}else{	
			$(obj).slideUp("fast", function(){
			 $(obj).attr("hide",1);
			});
			
		}		
    });
	

    $(window).scroll(function() {
        var topnavPosition=document.body.scrollTop?document.body.scrollTop:document.documentElement.scrollTop;
        topnavPosition >= 120?$("#topnav").fadeTo("slow", 0.8).css({
            position:"fixed",
            top:"0px",
            left:"0px",
            zIndex:10,
            background:'#B2CBD0'
        }):$("#topnav").removeAttr('style').fadeTo("slow", 1);
    });
}



// 修复图片尺寸
function fixImgSize(img){
    var MAXWIDTH = '500';

    if(img.width > MAXWIDTH){
        img.width = MAXWIDTH;
        img.removeAttribute('height');
    }
}
