var $ = jQuery.noConflict();
$(function(){

	//ADD a new class to the array if you need a new type of marker.
	
$state = [];
	$state[1] = "show";
	$state[2] = "hide";
	
$isOfType = [];
	$isOfType[1] = "Team";
	$isOfType[2] = "Toilets";
	$isOfType[3] = "Room";
	$isOfType[4] = "Area";
	
$markerType = []; //refers to html class name. you can reorder the list from here
	$markerType[1] = "male";
	$markerType[2] = "female";
	$markerType[3] = "kitchen";
	$markerType[4] = "misc";
	$markerType[5] = "ban";
	$markerType[6] = "ceo";
	$markerType[7] = "cis";
	$markerType[8] = "finance";
	$markerType[9] = "political";
	$markerType[10] = "cerimonial";
	$markerType[11] = "stairwell";	
	$markerType[12] = "lift";
	$markerType[13] = "breakout";
	$markerType[14] = "meeting";
	
	//DOM VARS
	var area = $("area");
	var key = $(".key");
	var icon = '<td><span class="marker"></span></td>';
	
//FACILITIES
	
//Objects	
if(area.hasClass($markerType[1])){
	key.append('<tr class="'+ $markerType[1] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[1]+ " " +$isOfType[2] +'</label></td>'+ icon +'</tr>');
	}
if(area.hasClass($markerType[2])){
	key.append('<tr class="'+ $markerType[2] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[2]+ " " +$isOfType[2] +'</label></td>'+ icon +'</tr>');
	}	
	
//Access
if(area.hasClass($markerType[3])){
	key.append('<tr class="'+ $markerType[3] +'"><td><input type="checkbox" checked></td><td><label>'+$markerType[3]+'</label></td>'+ icon +'</tr>');
}	
//Misc
if(area.hasClass($markerType[4])){
	key.append('<tr class="'+ $markerType[4] +'"><td><input type="checkbox" checked></td><td><label>Miscellaneous</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[5])){
	key.append('<tr class="'+ $markerType[5] +'"><td><input type="checkbox" checked></td><td><label>No Access</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[6])){
	key.append('<tr class="'+ $markerType[6] +'"><td><input type="checkbox" checked></td><td><label>CEO & Leaders Office</label></td>'+ icon +'</tr>');
}
//TEAM
if(area.hasClass($markerType[7])){
	key.append('<tr class="'+ $markerType[7] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[7] + " " +$isOfType[1] +'</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[8])){
	key.append('<tr class="'+ $markerType[8] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[8] + " " +$isOfType[1] +'</label></td>'+ icon +'</tr>');
}
// COUNCIL PURPOSE
if(area.hasClass($markerType[9])){
	key.append('<tr class="'+ $markerType[9] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[9] +'</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[10])){
	key.append('<tr class="'+ $markerType[10] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[10] +'</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[11])){
	key.append('<tr class="'+ $markerType[11] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[11] +'</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[12])){
	key.append('<tr class="'+ $markerType[12] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[12] +'</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[13])){ //breakout
	key.append('<tr class="'+ $markerType[13] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[13] +" "+ $isOfType[4] +'</label></td>'+ icon +'</tr>');
}
if(area.hasClass($markerType[14])){ //meeting
	key.append('<tr class="'+ $markerType[14] +'"><td><input type="checkbox" checked></td><td><label>'+ $markerType[14] +" "+ $isOfType[3] +'</label></td>'+ icon +'</tr>');
}
	$(".key tr input[type=checkbox]").click(function(){
		var category = $(this).parent().parent().attr("class")
		$("area."+ category).fadeToggle(100);
	});
});