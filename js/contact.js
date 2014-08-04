var $ = jQuery.noConflict();
$(function(){
	$("button.contact").click(function(){
		$(this).addClass("active").removeClass("inactive");
		$(this).siblings("button").addClass("inactive").removeClass("active");
		
		$(".map.wrapper").addClass("contact"); //ADD CONTACT GATED SWITCH
		if($(".map.wrapper").hasClass("contact")){
			$("#picker ol").slideUp();	//IF NOT CONTACT SLIDE DOWN RESET
		}
		
		$("section.contact.wrapper").load("/acronamy/sites/all/modules/building_map/maps.html");
		$("#zoom").fadeOut();
		$("section.contact.wrapper iframe").parent().fadeIn();
		
		$("section.contact.wrapper").css({
			"background":"url(/acronamy/sites/all/modules/building_map/img/loader.gif)",
			"background-size":"5%",
			"background-repeat":"no-repeat",
			"background-position":"center",
			"background-color":"rgba(0,0,0,0.2)"
		});
		
		$("#about-floor").slideUp();
		
		//DYNAMIC TEXT
		var building = $(".map.wrapper").attr("value");
		$("dt.building").text(building);
		$(".map.wrapper h1.dynamic").text(building +" Contact Details");
	});
	
	$("button.internal").click(function(){
		$(this).addClass("active").removeClass("inactive");
		$(this).siblings("button").addClass("inactive").removeClass("active");	
	
		$(".map.wrapper").toggleClass("contact"); //REMOVE CONTACT GATED SWITCH
		
		if($(".map.wrapper").not("contact")){ //IF NOT CONTACT SLIDE DOWN RESET
			$("#picker ol").slideDown();
		}
		
		$("#zoom").fadeIn();
		
		$("section.contact.wrapper iframe").parent().fadeOut(function(){
			$(this).siblings("iframe").remove();
			$(".map.wrapper").removeClass("contact");
		});
		
		$("#about-floor").slideDown();
		
		//DYNAMIC TEXT
		var building = $(".map.wrapper").attr("value");
		$("dt.building").text(building);
		$(".map.wrapper h1.dynamic").text("about floor ...");
	});
});