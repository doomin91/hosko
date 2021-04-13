$(document).ready(function(e) {
	var checkBrowser = function() {
		var agt = navigator.userAgent.toLowerCase();
		if (agt.indexOf("chrome") != -1) return 'Chrome'; 
		if (agt.indexOf("opera") != -1) return 'Opera'; 
		if (agt.indexOf("staroffice") != -1) return 'Star Office'; 
		if (agt.indexOf("webtv") != -1) return 'WebTV'; 
		if (agt.indexOf("beonex") != -1) return 'Beonex'; 
		if (agt.indexOf("chimera") != -1) return 'Chimera'; 
		if (agt.indexOf("netpositive") != -1) return 'NetPositive'; 
		if (agt.indexOf("phoenix") != -1) return 'Phoenix'; 
		if (agt.indexOf("firefox") != -1) return 'Firefox'; 
		if (agt.indexOf("safari") != -1) return 'Safari'; 
		if (agt.indexOf("skipstone") != -1) return 'SkipStone'; 
		if (agt.indexOf("msie") != -1) return 'Internet Explorer'; 
		if (agt.indexOf("netscape") != -1) return 'Netscape'; 
		if (agt.indexOf("mozilla/5.0") != -1) return 'Mozilla'; 
	}

	function onCheckDevice() {
		var isMoble = (/(iphone|ipod|ipad|android|blackberry|windows ce|palm|symbian)/i.test(navigator.userAgent)) ? "mobile" : "pc";
		$("body").addClass(isMoble);

		var deviceAgent = navigator.userAgent.toLowerCase();
		var agentIndex = deviceAgent.indexOf('android');

		if(agentIndex != -1) {
			var androidversion = parseFloat(deviceAgent.match(/android\s+([\d\.]+)/)[1]);

			$("body").addClass("android");

			// favicon();

			if(androidversion < 4.1) {
				$("body").addClass("android_old android_ics");
			}
			else if(androidversion < 4.3) {
				$("body").addClass("android_old android_oldjb");
			}
			else if(androidversion < 4.4) {
				$("body").addClass("android_old android_jb");
			}
			else if(androidversion < 5) {
				$("body").addClass("android_old android_kk");
			}
			else if(androidversion < 6) {
				$("body").addClass("android_old");
			}
			
			if(checkBrowser() == 'Firefox' 
				|| checkBrowser() == 'Mozilla') {
				$("body").removeClass("android_ics android_oldjb android_jb android_kk");
			}
			else if(checkBrowser() == "Chrome") {
				var chromeVersion = parseInt(deviceAgent.substring(deviceAgent.indexOf("chrome") + ("chrome").length + 1));
				
				if(chromeVersion > 40) {
					$("body").removeClass("android_old android_ics android_oldjb android_jb android_kk");
				}
				else {
					$("body").removeClass("android_ics android_oldjb android_jb android_kk");
				}
			}
		}
		else if(deviceAgent.match(/msie 8/) != null || deviceAgent.match(/msie 7/) != null) {
			$("body").addClass("old_ie");
		}
		else if(deviceAgent.match(/iphone|ipod|ipad/) != null) {
			$("body").addClass("ios");
		}
	}

	onCheckDevice();

	// css check
	window.checkSupported = function(property) {
		return property in document.body.style;
	}

	
	// dropdown list
	var dropList = (function() {
		function init() {
			var time = 150;

			// dropdown list
			$(document).on("change", ".dropLst .hidradio", function(evt) {
				var groupName = $(this).attr("name");
				var radios = $(".hidradio[name=" + groupName + "]");
				var checked = radios.filter(function() { return $(this).prop("checked") === true; });
				var text = $(checked).parents("label").find(".value").text();
				var list = $(checked).parents(".dlst").eq(0);

				$(list).find("label").removeClass("on");
				$(checked).parents("label").eq(0).addClass("on");

				if($(list).siblings(".txt").find(".val").length > 0) {
					$(list).siblings(".txt").find(".val").text(text);
				}
				else {
					$(list).siblings(".txt").text(text);
				}

				$(list).siblings(".txt").removeClass("on");
				$(checked).parents(".dlst").slideUp(time);
			}).on("click", ".dropLst > a", function(evt) {
				evt.preventDefault();
				
				var label = $(this);
				var target = $(this).parents(".dropLst").eq(0);
				var list = $(this).siblings(".dlst");
				var openList = $(".dropLst").filter(function() { return $(this).find(".dlst").css("display") != "none" && $(this) != target });

				$(openList).find(".dlst").stop().slideUp(time);
				$(target).find(" > a").removeClass("on").addClass("active");

				$(list).stop().slideToggle(time, function() {
					if($(this).css("display") != "none") $(label).addClass("on");
					else $(label).removeClass("on");

					$(label).removeClass("active");
				});
			}).on("click", ".dropLst li a", function(evt) {
				var value = $(this).text();

				$(this).parents(".dlst").eq(0).stop().slideUp(time, function() {
					if($(this).siblings(".txt").find(".val").length > 0) {
						$(this).siblings(".txt").find(".val").text(value);
					}
					else {
						$(this).siblings(".txt").text(value);
					}

					$(this).siblings(".txt").focus();
				});

				$(".dropLst > a").removeClass("on");

				$(this).parents(".dlst").eq(0).find("li a").removeClass("on");
				$(this).addClass("on");
			}).on("keyup", ".dropLst > a", function(evt) {
				var keyCode = evt.keyCode;

				var target = $(this).parents(".dropLst").eq(0);
				var list = $(this).siblings(".dlst");
				var chkRadio = $(this).siblings(".dlst").find(".hidradio:checked");
				var hoverRadio = $(list).find(".hover");
				var idx = -1;

				if(hoverRadio.length < 1) idx = (chkRadio.parents("li").eq(0).index() > -1) ? chkRadio.parents("li").eq(0).index() : 0;
				else idx = hoverRadio.parents("li").eq(0).index();

				var openList = $(list).filter(function() { return $(this).css("display") != "none" });
				if(openList.length < 1) return false;

				if(keyCode == 13) {
					$(list).find("li").find(".hover").find(".hidradio").prop("checked", true).trigger("change");
					$(list).find("label").removeClass("hover");
				} 
				else if(keyCode == 38 || keyCode == 37) {
					$(list).find("label").removeClass("hover");

					if(idx == 0) $(list).find("li").eq($(list).find("li").length - 1).find("label").addClass("hover");
					else $(list).find("li").eq(idx - 1).find("label").addClass("hover");
				}
				else if(keyCode == 40 || keyCode == 39) {
					$(list).find("label").removeClass("hover");
					
					if(idx == ($(list).find("li").length - 1)) $(list).find("li").eq(0).find("label").addClass("hover");
					else $(list).find("li").eq(idx + 1).find("label").addClass("hover");
				}
			}).on("focus", ".dropLst .dlst label", function(evt) {
				$(this).on("keyup", addEnterKeyEvent);
			}).on("blur", "label", function(evt) {
				$(this).off("keyup", addEnterKeyEvent);
			}).on("click touchstart", function(evt) {
				var evt = evt ? evt : event;
				var target = null;

				if (evt.srcElement) target = evt.srcElement;
				else if (evt.target) target = evt.target;

				var openList = $(".dropLst").filter(function() { return $(this).find(".dlst").css("display") != "none" });
				var activeList = $(".dropLst").filter(function() { return $(this).find(".txt").hasClass("on") === true });
				if($(target).parents(".dropLst").eq(0).length < 1) {
					$(openList).find(".dlst").slideUp(time);
					$(".dropLst > a").removeClass("on").removeClass("active");
				}
				else if(activeList.length > 0) {
					if(evt.type == "click") {
						activeList.find(".txt").removeClass("on").removeClass("active");
					}
				}
			});

			function addEnterKeyEvent(evt) {
				var keyCode = evt.keyCode;
				if(keyCode == 13) {
					$(this).children(".hidradio").prop("checked", true).trigger("change");
					$(this).parents(".dropLst").eq(0).find(".txt").focus();
				}
			}

			// init dropdown list value
			$(".dropLst").each(function(i) {
				var groupName = $(this).find(".hidradio").eq(0).attr("name");
				var radios = $(".hidradio[name=" + groupName + "]");
				var checked = $(radios).filter(function() { return $(this).prop("checked") === true; });
				var list = $(this).find(".dlst");
				var text = null;

				if(radios.length > 0 && checked.length > 0) {
					text = (checked.length > 0) ? $(checked).parents("label").find(".value").text() : radios.eq(0).siblings(".value").text();
	
					$(list).find("label").removeClass("on").attr("tabindex", 0);
					$(list).find("label input").attr("tabindex", -1);
					if (checked.length > 0) {
						$(checked).parents("label").eq(0).addClass("on");
					}
					else {
						radios.eq(0).parents("label").eq(0).addClass("on");
					}
				}
				else {
					text = (list.find(".value.on").length > 0) ? list.find(".value.on").text() : (($(this).find(".txt .val").length > 0) ? $(this).find(".txt .val").text() : $(this).find(".txt").text());
				}				

				if($(list).siblings(".txt").find(".val").length > 0) {
					$(list).siblings(".txt").find(".val").text(text);
				}
				else {
					$(list).siblings(".txt").text(text);
				}
			});
		}

		return {
			init : init
		};
	}());

	dropList.init();


	// file
	window.upFile = (function() {
		function init() {
			// file event
			$(document).on("change", ".hidFile", function(evt) {
				var file = $(this).val().split(/(\\|\/)/g).pop();
				var ext = file.split(".").pop();
				var fileLabel = $(this).siblings(".comText");
				var helpText = fileLabel.attr("title");

				if($(this).attr("readonly")) {
					return false;
				}
				
				if(file.length > 1) {
					fileLabel.text(file).removeClass("unselect");
				}
				else {
					fileLabel.text(helpText).addClass("unselect");
				}
			}).on("reset", "form", function(evt) {
				$(this).find(".hidFile").each(function(i) {
					var helpText = $(this).siblings(".comText").attr("title");
					$(this).siblings(".comText").text(helpText).addClass("unselect");
				});
			});
		}

		return {
			init : init
		}
	}());

	// click
	$(".sticky_quick .btn_top").on("click", function(evt) {
		evt.preventDefault();
		$("html, body").stop().animate({scrollTop:0}, 500, "easeOutExpo");
	});

	$(".stickyMenu").sticky({topSpacing:0});	
	$(".sticky_quick").sticky({topSpacing:60});	
	$(".type_01 .sticky_quick").sticky({topSpacing:0});	
	$(".type_02 .sticky_quick").sticky({topSpacing:0});	


	//upFile
	upFile.init();

	// gnb
	gnb.init();

	//GNB
	webGnb.init();

	//quickBar
	quickBar.init();

	//groupMenu
	groupMenu.init();

	//shipMenu
	shipSlider.init();

	//selectList
	selectList.init();

	lngSlider.init();

	gnList.init();
	
	goTop.init();
	
	//img
	$(".news_data img").removeAttr("style"); 

});

var loading = {
	show : function(target) {
		var html = '<div class="loadings' + ((target) ? ' inner' : '') + '"><div><i></i></div></div>';

		if(target) {
			if($(target).find("> .loadings").length < 1) $(target).append(html);
		}
		else {
			$("body").append(html);
		}
	},

	hide : function(target) {
		if(target) {
			$(target).find(".loadings").remove();
		}
		else {
			$(".loadings").remove();
		}
	}
}

var webGnb = (function(){
	var gnb = null;			
	var gnb1dep = null;	
	var btn1dep = null;		
	var btns = null;	
	var gnb2dep = null;	
	var btn2dep = null;	
	var btn3dep = null;	

	var btnInfo = null;	
	var info1dep = null;	
	var info2btn = null;	

	function init() {
		$(document).ready(function() {		
			gnb = $(".gnb_web_area");						
			gnb1dep = $(".gnb_web_area .dep1 > li");
			btn1dep = $(".gnb_web_area .dep1 .menu01");			
			btns = $(".gnb_web_area a");
			gnb2dep = $(".gnb_web_area .dep2 > li");
			btn2dep = $(".gnb_web_area .dep2 .menu02");
			btn3dep = $(".gnb_web_area .dep2 .menu03");

			btnInfo = $(".gnb_web_area .info ul > li > a");
			info1dep = $(".gnb_web_area .sub_menu ul.dep1 > li");
			info2btn = $(".gnb_web_area .sub_menu ul.dep2 > li > a");

			btn1dep.on("mouseover", function(evt) {
				evt.preventDefault();				
				gnb.addClass("active");
				$(this).addClass("hover");
			});

			btnInfo.on("mouseover", function(evt) {
				evt.preventDefault();				
				gnb.addClass("active");
			});

			gnb.on("mouseleave", function(evt) {
				evt.preventDefault();
				gnb.removeClass("active");
			});
			
			btn2dep.on("mouseover", function(evt) {
				evt.preventDefault();
				$(this).parents("li").find(".menu01").addClass("hover");				
				$(this).addClass("hover");
			});			
			btn3dep.on("mouseover", function(evt) {
				evt.preventDefault();
				$(this).parents("li").find(".menu01").addClass("hover");	
				$(this).parent().parent().siblings(".menu02").addClass("hover");	
							
			});		

			gnb1dep.on("mouseleave", function(evt) {
				evt.preventDefault();
				$(this).find("a").removeClass("hover");
			});

			gnb2dep.on("mouseleave", function(evt) {
				evt.preventDefault();
				$(this).find("a").removeClass("hover");
			});

			info2btn.on("mouseover", function(evt) {
				evt.preventDefault();			
				$(this).parent().parent().siblings("a").addClass("hover");
			});			
			info1dep.on("mouseleave", function(evt) {
				evt.preventDefault();
				$(this).find("a").removeClass("hover");
			});


			var lan = $(".gnb_web_area .global");
			var btnLan = $(".gnb_web_area .global .btn_global");
			btnLan.on("mouseover", function(evt) {
				evt.preventDefault();	
				lan.addClass("active");
			});
			lan.on("mouseleave", function(evt) {
				evt.preventDefault();
				lan.removeClass("active");
			});
		});
	}

	return {
		init : init
	}
}());

var quickBar = (function(){
	var quick = null;
	var menu = null;
	var quickBtn = null;
	var topBtn = null;

	function init(){
		$(document).ready(function() {	
			quick = $(".sticky_quick");
			menu = $(".sticky_quick .menus");
			quickBtn = $(".sticky_quick .btn_open");
			closeBtn = $(".sticky_quick .btn_close");
			topBtn = $(".sticky_quick .btn_top");

			// gnb
			quickBtn.on("click", function(evt) {
				evt.preventDefault();

				if(quick.hasClass("active")) {
					hideMenu();
				}
				else {
					showMenu();
				}
			});
			closeBtn.on("click", function(evt) {
				evt.preventDefault();
				hideMenu();
			});
		});
	}

	function hideMenu(){
		quick.removeClass("active");
		menu.slideUp();
		topBtn.show();
	};

	function showMenu(){
		quick.addClass("active");
		menu.slideDown();
		topBtn.hide();
	};


	return {
		init : init
	}
}());


var gnb = (function() {
	var body = null;
	var btnGnb = null;
	var gnbBg = null;

	var scrollElements = null;
	var scrolls = [];

	var timer = null;

	var mSet = null;
	
	var linkBtn = null;

	function init() {
		$(document).ready(function() {			
			body = $("body");
			btnGnb = $(".header .btn_gnb");			
			
			scrollElements = $(".nav_gnb .scroller");
			var topPos = scrollElements.eq(0).offset().top + 20;

			body.find(".header").append("<div class='gnb_modal'></div>");
			gnbBg = $(".gnb_modal");

			btnMenu1 = $(".btn_gnb a.menu01");
			btnMenu2 = $(".btn_gnb a.menu02");
			
			linkBtn = $(".dep2 > li > a");

			// gnb
			btnGnb.on("click", function(evt) {
				evt.preventDefault();

				if(btnGnb.hasClass("active")) {
					hideGnb();
				} else {
					showGnb();
				}
				
				//selected menu open
				var gnb_menu01 = $(".nav_gnb a.menu01");
				$.each( gnb_menu01, function( key, value ) {
					if ($(this).hasClass("mobile-gnb-block") == true) {
						$(this).click();
					} else if ($(this).hasClass("mobile-gnb-block2") == true) {
						$(this).click();
						$(".nav_gnb a.menu02.menuPlus").click();
					}
				});
			});
			
			linkBtn.on("click", function(evt) {
				if($(this).hasClass("menuPlus"))				
				{
					evt.preventDefault();
				}
				else
				{
					hideGnb();
				}
			});

			// bg
			gnbBg.on("click", function(evt) {
				hideGnb();
			}).on("touchmove", function(evt) {
				return false;
			});

			// gnb close
			$(".btn_gnb_close").on("click", function(evt) {
				evt.preventDefault();
				hideGnb();
			});

			//메뉴 열기 1
			$(".nav_gnb a.menu01").on("click", function(evt) {
				evt.preventDefault();

				var target = $(this).parent();

				if(target.hasClass("active"))
				{
					target.removeClass("active")
					target.find(".dep2").slideUp(200, function(){	
						refrehGnb();				
					});
					setTimeout(function() {
						var scrollPostion = scrolls[0].scrollTop;
						scrolls[0].scrollTo(0, 0);
					}, 210);	
				}
				else
				{
					$(".nav_gnb .dep1 li").removeClass("active");
					$(".nav_gnb .dep1 ul").slideUp(200);
					target.addClass("active")
					target.find(".dep2").slideDown(200, function(){
						refrehGnb();
					});					
					setTimeout(function() {
						var scrollPostion = scrolls[0].scrollTop;
						var targetPostion = target.offset().top - topPos + scrollPostion;
						scrolls[0].scrollTo(0, targetPostion);
					}, 210);		
				}					
			});

			//메뉴 열기 2
			$(".nav_gnb a.menu02.menuPlus").on("click", function(evt) {
				evt.preventDefault();

				var target = $(this).parent();

				if(target.hasClass("active"))
				{
					target.removeClass("active")
					target.find(".dep3").slideUp(200, function(){	
						refrehGnb();				
					});
				}
				else
				{
					target.addClass("active")
					target.find(".dep3").slideDown(200, function(){
						refrehGnb();
					});
				}				
			});

			$( window ).resize(function() {
			  open_chatroom();
			});
			open_chatroom();
		});
	}

	function open_chatroom(){
		var windowWidth = $( window ).width();
		if(windowWidth > 768) {
			if(mSet){
				hideGnb();
			}
			mSet = false;
		} else {
			mSet = true;
		}
	};

	function hideGnb() {
		body.removeClass("scroll_off show_gnb");
		btnGnb.removeClass("active");
		$(".nav_gnb .dep1 li").removeClass("active");
		$(".nav_gnb .dep1 ul").slideUp(200);
	}

	function showGnb() {
		body.addClass("scroll_off show_gnb");
		btnGnb.addClass("active");

		if(scrolls.length > 0) {
			refrehGnb();
		}
		else {
			scrollElements.each(function(i) {
				var scroll = null;
				var sid = $(this).attr("id");

				if(i == 1) {
					scroll = new FTScroller(document.getElementById(sid), {
						alwaysScroll : true,
						scrollbars : true,
						scrollingX : false,
						updateOnWindowResize : true,
						bounceDecelerationBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)",
						bounceBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)"
					});

					scroll.addEventListener('scroll', function (evt) {
						if(!body.hasClass("moveGnb")) {
							setGnbPostion(checkPostition());
						}						
					});
				}
				else {
					scroll = new FTScroller(document.getElementById(sid), {
						scrollbars : true,
						scrollingX : false,
						updateOnWindowResize : true,
						bounceDecelerationBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)",
						bounceBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)"
					});
				}
				
				scrolls.push(scroll);
			});
		}
	}

	// positon check
	function checkPostition(scrollTop) {
		var topPos = scrollElements.eq(1).offset().top;
		var idx = -1;

		$(".nav_gnb .dl").each(function(i) {
			var top = $(this).offset().top;
			
			if(topPos >= top) {
				idx++;
			}
		});

		return (idx < 0) ? 0 : idx;
	}

	function getScroll() {
		return scrolls;
	}

	function setHeight() {
		var wh = (window.innerHeight) ? window.innerHeight : $(window).height();
		var offset = scrollElements.eq(1).offset().top;

		$(".header .scroll_content").css("min-height", wh - offset);
	}

	function refrehGnb() {
		scrolls[0].updateDimensions();
	}

	return {
		init : init,
		getScroll : getScroll,
		refresh : refrehGnb,
		hide : hideGnb,
		show : showGnb
	}
}());

var groupMenu = (function() {
	var secIntro = null;
	var introImg = null;
	var introBox = null;
	var groupBtn = null;

	var groupDownBtn = null;
	var mapBtn = null;
	var historyBtn = null;
	var manBtn = null;

	var shipNum = null;
	var shipBtn = null;
	var shipPageBtn = null;

	var lngShipBtn = null;
	var valueBtn = null;

	function init() {
		$(document).ready(function() {	
			secIntro = $(".sec_intro");
			introImg = $(".sec_intro .intro_img");
			introBox = $(".sec_intro .intro_data");
			groupBtn = $(".sec_intro .groups .btn_group");

			groupBtn.on("click", function(evt) {
				evt.preventDefault();

				var targetId = $(this).attr("id");
				introImg.removeClass("on");
				introBox.removeClass("on");
				groupBtn.removeClass("on");

				$(this).addClass("on");
				$(".sec_intro .intro_img."+targetId).addClass("on");
				$(".sec_intro .intro_data."+targetId).addClass("on");
			});

			groupDownBtn = $(".sec_intro.sec_downloads .groups .btn_group");
			groupDownBtn.on("click", function(evt) {
				evt.preventDefault();
				var targetId = $(this).attr("id");
				if(targetId == "group_01"){
					console.log("on");
					$(".sub_section article.group_01").addClass("on");
				}
				else
				{
					console.log("off");
					$(".sub_section article.group_01").removeClass("on");
				}
			});

			mapBtn = $(".location .groups .btn_group");
			mapBtn.on("click", function(evt) {
				evt.preventDefault();

				var targetId = $(this).attr("id");
				mapBtn.removeClass("on");
				$(".location .info_box").removeClass("on");

				$(this).addClass("on");
				$(".location .info_box."+targetId).addClass("on");
			});

			historyBtn = $(".history .btn_history");
			historyBtn.on("click", function(evt) {
				evt.preventDefault();

				var targetId = $(this).attr("id");
				historyBtn.removeClass("on");
				$(".history .img_area").removeClass("on");
				$(".history .history_box").removeClass("on");

				$(this).addClass("on");
				$(".history .img_area."+targetId).addClass("on");
				$(".history .history_box."+targetId).addClass("on");
			});

			manBtn = $(".management .btn_man");
			manBtn.on("click", function(evt) {
				evt.preventDefault();

				var targetId = $(this).attr("id");
				manBtn.removeClass("on");
				$(".management .info_box").removeClass("on");
				$(".management .photo").removeClass("on");

				$(this).addClass("on");
				$(".management .photo."+targetId).addClass("on");
				$(".management .info_box."+targetId).addClass("on");
			});

			shipBtn = $(".ship_management .btns .btn");			
			shipNum = 1;
			shipBtn.on("click", function(evt) {
				evt.preventDefault();

				if(shipNum == 1){
					shipNum = 2;
				}
				else
				{
					shipNum = 1;
				}

				$(".ship_management .in_box").removeClass("on");
				$(".ship_diagram .diagram_area").removeClass("on");

				$(this).addClass("on");
				$(".ship_management .in_box.case_0"+shipNum).addClass("on");
				$(".ship_diagram .diagram_area.case_0"+shipNum).addClass("on");
			});

			shipPageBtn = $(".ship_management .status > a");
			shipPageBtn.on("click", function(evt) {
				evt.preventDefault();
				var targetClass = $(this).attr("Class");			
				if($(this).hasClass("on") === false){
					$(".ship_management .in_box").removeClass("on");
					$(".ship_diagram .diagram_area").removeClass("on");
					$(".ship_management .in_box."+targetClass).addClass("on");
					$(".ship_diagram .diagram_area."+targetClass).addClass("on");
				}
			});

			lngShipBtn = $(".com_lng .menu_btn");
			lngShipBtn.on("click", function(evt) {
				evt.preventDefault();

				var targetId = $(this).attr("id");
				var area = $(this).parents(".com_lng");
				area.find(".menu_btn").removeClass("on");
				area.find(".bg_img").removeClass("on");
				area.find(".case_box").removeClass("on");
				area.find(".btns").removeClass("on");
				$(".shadow_title p").removeClass("on");

				$(this).addClass("on");
				area.find(".bg_img."+targetId).addClass("on");
				area.find(".case_box."+targetId).addClass("on");
				area.find(".btns."+targetId).addClass("on");
				$(".shadow_title p."+targetId).addClass("on");
			});

			valueBtn = $(".value .banner_area .btn");
			valueBtn.on("click", function(evt) {
				evt.preventDefault();

				var targetId = $(this).data('name');
				$(".value").removeClass("on");
				$(".value."+targetId).addClass("on");
			});

		});
	}
	return {
		init : init
	}
}());

// slider
var shipSlider = (function() {
	var scrollElement = null;
	var scroll = null;

	function init() {
		$(document).ready(function() {
			scrollElement = $("#ship_scroll");

			if(scrollElement.length > 0){

				scroll = new FTScroller(scrollElement[0], {
					scrollbars : false,
					scrollingY : false,
					scrollingX : true,
					updateOnWindowResize : true,
					bounceDecelerationBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)",
					bounceBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)",
				});

				// click
				scrollElement.on("click", "a", function(evt) {
					//evt.preventDefault();
					$(this).parents("li").eq(0).addClass("on").siblings().removeClass("on");
					setCenter();
				});

				setCenter();
			}
		});
	}

	function setCenter() {
		if(scrollElement.length < 1) return;

		var centerElement = scrollElement.find("li.on").eq(0);
		var halfPos = parseInt(scrollElement.outerWidth() / 2) - parseInt(centerElement.outerWidth() / 2);		
		var targetOffset = centerElement.offset().left - scrollElement.offset().left;									
		var movePos = scroll.scrollLeft + targetOffset - halfPos;
		
		scroll.scrollTo(movePos, 0, 100);
	}

	$( window ).resize(function() {
		setCenter();
	});

	return {
		init : init,
		center : setCenter
	}
}());

// slider
var lngSlider = (function() {
	var scrollElement = null;
	var scroll = null;

	function init() {
		$(document).ready(function() {
			scrollElement = $(".dots_area");

			if(scrollElement.length > 0){

				scroll = new FTScroller(scrollElement[0], {
					scrollbars : false,
					scrollingY : false,
					scrollingX : true,
					updateOnWindowResize : true,
					bounceDecelerationBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)",
					bounceBezier : "cubic-bezier(0.215, 0.61, 0.355, 1)",
				});

				// click
				scrollElement.on("click", "button", function(evt) {
					evt.preventDefault();
					setPosition();
				});

				$(".slider_arrow .arrows > div").on("click", function(evt) {
					evt.preventDefault();
					setPosition();
				});

				setPosition();
			}
		});
	}

	function setPosition() {
		if(scrollElement.length < 1) return;

		var centerElement = scrollElement.find("li.slick-active").eq(0);
		var halfPos = parseInt(scrollElement.outerWidth() / 2) - parseInt(centerElement.outerWidth() / 2);		
		var targetOffset = centerElement.offset().left - scrollElement.offset().left;								
		var movePos = scroll.scrollLeft + targetOffset - halfPos;
		
		scroll.scrollTo(movePos, 0, 100);
	}

	return {
		init : init,
		center : setPosition
	}
}());

// select
var selectList = (function() {
	function init() {
		// select
		$(document).on("change", ".selectbox select", function(evt) {
			if($(this).attr("readonly")) {
				return false;
			}

			var text = $(this).find("option:selected").text();
			$(this).siblings(".txt").text(text);
		}).on("keyup", ".selectbox > .txt", function(evt) {
			var keyCode = evt.keyCode;
			var labelText = $(this).text();
			var selectObj = $(this).siblings("select");
			var idx = ($(this).text() == $(selectObj).children("option:selected").text()) ? $(selectObj).children("option:selected").index() : 0;

			if(keyCode == 38 || keyCode == 37) {
				if(idx == 0) $(selectObj).children().eq($(selectObj).children().length - 1).attr("selected", "selected").trigger("change");
				else $(selectObj).children().eq(idx - 1).attr("selected", "selected").trigger("change");
			} 
			else if(keyCode == 40 || keyCode == 39) {
				if(idx == ($(selectObj).children().length - 1)) $(selectObj).children().eq(0).attr("selected", "selected").trigger("change");
				else $(selectObj).children().eq(idx + 1).attr("selected", "selected").trigger("change");
			}
		}).on("click", ".selectbox > .txt", function(evt) {
			return false;
		}).on("focus", ".selectbox select", function(evt) {
			$(this).siblings(".txt").addClass("focus");
		}).on("blur", ".selectbox select", function(evt) {
			$(this).siblings(".txt").removeClass("focus");
		}).on("reset", "form", function(evt) {
			var selects = $(this).find(".selectbox select");
			
			setTimeout(function() {
				$(selects).each(function(i) {
					var text = ($(this).find("option:selected").text().length > 0) ? $(this).find("option:selected").text() : $(this).find("option").eq(0).text();
					$(this).siblings(".txt").text(text);
				});
			}, 30);
		});

		// init select box value
		$(".selectbox select").each(function(i) {
			var text = ($(this).find("option:selected").text().length > 0) ? $(this).find("option:selected").text() : $(this).find("option").eq(0).text();
			$(this).siblings(".txt").text(text);
		});

	}

	return {
		init : init
	};
}());

// global Network
var gnList = (function() {
	var gnBtn = null;
	var gnPage = null;
	var gnClose = null;
	var gBg = null;

	function init() {
		// select
		$(document).ready(function() {
			gnBtn = $(".map_area .btns .btn");
			gnPage = $(".global_info");
			gnClose = $(".global_info .btn_close");
			
			gnBtn.on("click", function(evt){
				evt.preventDefault();
				var targetId = $(this).attr("id");

				if($(this).hasClass("on"))
				{
					$(this).removeClass("on");
					pageClose();
				}
				else if(targetId == "info_06"){
					gnBtn.removeClass("on");
					gnPage.find(".info").removeClass("on");
					pageClose();
				}
				else
				{
					gnBtn.removeClass("on");
					gnPage.find(".info").removeClass("on");
					$(".global_network .info_korea").removeClass("on");
					$(this).addClass("on");
					gnPage.addClass("on");
					gnPage.find("."+targetId).addClass("on");
				}
			});

			gnClose.on("click", function(evt){
				evt.preventDefault();
				gnBtn.removeClass("on");
				pageClose();
			});

			gBg = $(".global_network .global_bg");
			$("#sel_nation").on("change", function(evt){
				evt.preventDefault();
				var targetId = $(this).val();
				if(targetId == "none"){
					pageClose();
				}
				else if(targetId == "info_06"){
					pageClose();
					$(".global_network .info_korea").addClass("on");
				}
				else
				{
					$(".global_network .info_korea").removeClass("on");
					gnPage.addClass("on");
					gBg.addClass("on");
					gnPage.find("."+targetId).addClass("on");
				}
			});

			gBg.on("click", function(evt){
				evt.preventDefault();
				pageClose();
			});
		});

		function pageClose(){
			gnPage.removeClass("on");
			$(".global_network .global_bg").removeClass("on");
			$(".global_network .info_korea").removeClass("on");
			gnPage.find(".info").removeClass("on");
		}
	};


	return {
		init : init
	};
}());

//gotop
var goTop = (function() {
	var btnWrap = null;
	var btn = null;
	var footer = null;
	var padding = 0;

	function init() {
		if($(".sticky_top").length < 1) return false;

		btnWrap = $(".sticky_top");
		btn = $(".btn_top_m");
		footer = $(".footer");

		// scroll
		$(window).scroll(onScroll).resize(onScroll).load(onScroll);

		// click
		btn.on("click", function(evt) {
			evt.preventDefault();
			$("html, body").stop().animate({scrollTop:0}, 500, "easeOutExpo");
		});
	}

	function onScroll() {
		var top = $(window).scrollTop();

		if(top > 60) {
			btn.parent().fadeIn(100);

			if(footer.length > 0) {
				var windowh = (window.innerHeight) ? window.innerHeight : $(window).height();
				var footOffset = footer.offset().top - windowh;
				var topPos = footer.offset().top;

				if(top >= footOffset + btn.height()) {
					btnWrap.addClass("off");
				}
				else {
					btnWrap.removeClass("off");
				}
			}
		}
		else {
			btn.parent().fadeOut(100);
		}
	}

	return {
		init : init,
		refresh : onScroll
	}
}());

