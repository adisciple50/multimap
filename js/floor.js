var $ = jQuery.noConflict();
$(function(){
	$("#picker li").click(function(){
			var selectMatchClass = $(this).attr("class");
			$("img."+ selectMatchClass).addClass("active").fadeIn();
			$("map."+ selectMatchClass).addClass("active").fadeIn();
		
			$("img."+ selectMatchClass).siblings().not("map, h1, section[name=gmap]").removeClass("active").fadeOut();
			$("map."+ selectMatchClass).siblings().not("img, h1, section[name=gmap]").removeClass("active").fadeOut();
		
		$(this).addClass("active");
		$(this).siblings().not("map, h1, section[name=gmap]").removeClass("active");
	});
	
	$("area").each(function(){
		var dirtyAreaCords = $(this).attr("coords");
		var cleanArea = dirtyAreaCords.replace(/[\s,]+/g,'').trim();
		var areaCoords = cleanArea;
		$(this).children().addClass(cleanArea);
	});
	
	//its not dry but its cleaning
$(".field-map-marker, .field-map-marker-floor-two, .field-map-marker-floor-three, .field-map-marker-floor-four, .field-map-marker-floor-five").each(function(){
	
	var dirtyCoords = $(this).children(".field-image-map-coordinates").text();				
	var clean = dirtyCoords.replace(/[\s,]+/g,'').trim();
	var coords = clean;
	
	$(this).addClass(coords);
	var src = $(this).find("img").attr("src");
	
	$("."+coords).not(".field-map-marker").attr("value", src);
	
	});
	
	$(".field-hiden-at-start").each(function(){
		var selectByClass = $(this).text();
		//Clean
		var clean = selectByClass.replace(/[\s,]+/g,'').trim();
		var selectByClass = clean;
		
		$("area."+ selectByClass +", tr."+ selectByClass).hide();
	});
});