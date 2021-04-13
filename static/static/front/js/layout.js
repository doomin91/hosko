/* *******************************************************
 * filename : common.js
 * description : 전체적으로 사용되는 JS
 * date : 2018-03-02
******************************************************** */


jQuery(function($){
	
	// 임의의 영역을 만들어 스크롤바 크기 측정
	function getScrollBarWidth(){
		if($(document).height() > $(window).height()){
			$('body').append('<div id="fakescrollbar" style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"></div>');
			fakeScrollBar = $('#fakescrollbar');
			fakeScrollBar.append('<div style="height:100px;">&nbsp;</div>');
			var w1 = fakeScrollBar.find('div').innerWidth();
			fakeScrollBar.css('overflow-y', 'scroll');
			var w2 = $('#fakescrollbar').find('div').html('html is required to init new width.').innerWidth();
			fakeScrollBar.remove();
			return (w1-w2);
		}
		return 0;
	}

	/* *********************** 사이드바 FIXED ************************ */
	$(window).scroll(function  () {
		var scrollHeight = $(window).scrollTop();
		var rightStartTop = $(window).height() / 2;

		if ( scrollHeight > rightStartTop ) {
			$("#rightBar").addClass("fixed");
		}else {
			$("#rightBar").removeClass("fixed");
		}
	});

    //탑버튼
    $(window).scroll(function(){
        if($(window).scrollTop() > 500){
            $('.go_top').addClass('on');
        } else {
            $('.go_top').removeClass('on');
        }
        $('.go_top').on('click', function () {
            $('html, body').stop().animate({
                scrollTop: 0
            }, 500);
        });
    });  

});


