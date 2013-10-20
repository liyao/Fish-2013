
$(document).ready(function(){
	// 菜单滑动效果
	var arrowRoller = function(){
		var moveArrow = function(obj,interval){
			var unit_left = $(obj).parent().position().left;
			var half_unit_width = $(obj).parent().width()*0.5;

			$(obj).addClass('active');
			$(obj).parent().siblings().find('a').removeClass('active');

			$('#arrow').stop().animate({
				left: unit_left+half_unit_width + 'px'
			},interval).css({
				top: '50px',
				height: '0',
				display: 'block'
			});
		}
		if($('.current-menu-item').length){
			moveArrow($('.current-menu-item a'),500);
		}else{
			moveArrow($("#menu-primary li:first a"),500);
		}
		$("#menu-primary li a").mouseover(function() {
			moveArrow($(this),500);
		});
		$("#menu-primary li a").mouseout(function() {
			if($('.current-menu-item').length){
				moveArrow($('.current-menu-item a'),800);
			}else{
				moveArrow($("#menu-primary li:first a"),500);
			}
		});
	}
	arrowRoller();
	/* @reply js by zwwooooo */
	$('.reply').click(function() {
		var atid = '"#' + $(this).parent().parent().attr("id") + '"';
		var atname = $(this).siblings('cite').text();
			$("#comment").attr("value","<a href=" + atid + ">@" + atname + " </a>").focus();
		});
			$('.cancel-comment-reply a').click(function() {	//点击取消回复评论清空评论框的内容
			$("#comment").attr("value",'');
	});
	/* @reply js by zwwooooo */
	$('.reply').click(function() {
		var atid = '"#' + $(this).parent().parent().parent().attr("id") + '"';
		var atname = $(this).prevAll().find('cite:first').text();
		$("#comment").attr("value","<a href=" + atid + ">@" + atname + " </a>").focus();
	});
	$('.cancel-comment-reply a').click(function() {	//点击取消回复评论清空评论框的内容
		$("#comment").attr("value",'');
	});
	(function() {
	    var c = document.createElement('script'); 
	    c.type = 'text/javascript';
	    c.async = true;
	    c.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.clicki.cn/boot/49129';
	    var h = document.getElementsByTagName('script')[0];
	    h.parentNode.insertBefore(c, h);
	})();

	//滚动显示最近评论  http://www.zxlive.net/add-new-comment-for-the-blog-roll-the-display.html
     var scrtime;   
     $("#recentcomments").hover(function(){   
             clearInterval(scrtime);   

     },function(){   

     scrtime = setInterval(function(){   
             var $ul = $("#recentcomments");//注意这里面的名字必须与前面插件中我们给ul命名的id相同   
             var liHeight = $ul.find("li:last").height();   
             $ul.animate({marginTop : liHeight+3+"px"},2000,function(){   

             $ul.find("li:last").prependTo($ul);   
             $ul.find("li:first").hide();   
             $ul.css({marginTop:0});   
             $ul.find("li:first").fadeIn(1000);   
             });          
     },4000);   

     }).trigger("mouseleave");

    $( '#menu' ).dlmenu({
        animationClasses : { in : 'menu-show-in', out : 'menu-show-out' }
    });
});