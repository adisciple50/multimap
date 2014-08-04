var $ = jQuery.noConflict();
$(window).load(function(){
		var map_attached_img_h = $("img.active").outerHeight();
		var map_attached_img_w = $("img.active").outerWidth();
	
	//Construct the map	
	$("map").css({//Center the map like the image does, maybe css only?
				"position":"absolute",
				"margin":"auto",
				"top":"0",
				"left":"0",
				"right":"0",
				"bottom":"0"
	});
	$("map").height(map_attached_img_h);
	$("map").width(map_attached_img_w);
	
});

$(function(){
	$('area').click(function(event){
    	event.preventDefault();
	});
	
	
	$("area").not('.ban').mouseenter(function(){
		var which_room_text = $("#room-name");
		var get_this_room = $(this).attr("alt");
		which_room_text.text(get_this_room);
		$(this).click(function(){
			$(this).children().toggleClass("highlight");
		
			$(this).children()
			.css({"border-radius":"0",
				  "background":"#fff",
				  "z-index":"10"
				 })
			.animate({"width":"100%",
					  "height":"100%",
					"left":"0",
					"top":"0"
			}, function(){
				$(this).addClass("active open");
				$(this).load("/acronamy/sites/all/modules/building_map/about.html", function(){
					$(".open").css({"background-image":"url("+  $(this).attr("value") +")"});
				});
			});
		});
	});
	$("area").mouseleave(function(){
		$(this).children().toggleClass("highlight");
	});
	$("area").each(function(){
		var txt = $(this).attr("coords");
		
      var re1='(\\d+)';	// Integer Number 1
      var re2='.*?';	// Non-greedy match on filler
      var re3='(\\d+)';	// Integer Number 2

      var p = new RegExp(re1+re2+re3,["i"]);
      var m = p.exec(txt);
      if (m != null){
          var coor_left=m[1];
          var coor_top=m[2];
      }
		
		$(this).css({"display":"block"});
		$(this).append("<div class='marker' style='left:"+ m[1] +"px; top:"+ m[2] +"px; width:1.5em; height:1.5em; position:absolute;'></div>")	
	});
});