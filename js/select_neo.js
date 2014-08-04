var $ = jQuery.noConflict();
$(document).ready(function(){
	
	$(".neo").each(function(){
		//REPLACE OPTION WITH LI
		$(this).children("option").replaceWith(function(){
			var print_val = $(this).attr("value"); var print_id = $(this).attr("id"); var print_class = $(this).attr("class"); var print_name = $(this).attr("name"); var print_status = $(this).attr("selected"); var print_text = $(this).text();
			return $("<li value="+ print_val +" class="+ print_class +" id="+ print_id +" name="+ print_name +" selected="+ print_status +">"+ print_text +"</li>", {
				html: $(this).html()
			});
		});
		
		//REPLACE SELECT WITH UL
		$(this).replaceWith(function(){
			return $("<ul>", {
				html: $(this).html()
			});
		});
		
		//GET UNDEFINED AND SETUP CLASES AGAIN
		$("#undefined").parent().addClass("neo closed");
		$(".undefined").removeAttr("id"); $(".undefined[name=undefined]").removeAttr("name"); $(".undefined[selected=undefined]").removeAttr("selected"); $(".undefined").removeClass();
		
		//GET VALUE AND HTML & APPLY TO FIRST CHILD
	});//END WRAPPER FUNCTION
	
	$(".neo").each(function(){
		$(this).children("li:first-child").attr("selected", "selected");
		var print_first_text = $(this).children("li:first-child").text();
		var print_first_value = $(this).children("li:first-child").attr("value");
		$(this).prepend("<li value="+ print_first_value +" class='default'>"+ print_first_text +"</li>");
	});
	
	$(".neo").each(function(){
		//ANIMATE THE CLICK
		$(this).click(function(){
			$(this).children("li:not(.default)").slideToggle(function(){
				$(this).parent().toggleClass("open");
				$(this).parent().toggleClass("closed");
			});
		});
	});

	$(".neo li:not(.default)").each(function(){
		$(this).click(function(){
		//CLICK CHILDREN TO GET TEXT OF ACTIVE AND ADD TO DEFAULT
		var print_text = $(this).text();
		var print_value = $(this).attr("value");
		$(this).siblings(".default").text(print_text);
		$(this).siblings(".default").attr("value", print_value);
			
		//APEARENCE & ATTR
		$(this).addClass("active");
		$(this).siblings().removeClass("active");	
		$(this).attr("selected", "selected");
		$(this).siblings().removeAttr("selected");
	});
	});
});