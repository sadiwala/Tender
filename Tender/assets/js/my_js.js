$(document).ready(function  () {
	setTimeout(function(){ 
	$.getJSON("")
	$("abcd").append("Base Price:<?php echo $player['base_price'];?>");
	},10);
});


var a =function(){
//Send the signal to backend to make the sold variable to 1 using ajax or whatever....
};
var timer=setTimeout(a,5*60*1000);

$('#buy').on('click',function(){
	//Send the signal to backend to start  the timer
	clearTimeout(timer);
	timer=setTimeout(a,5*60*1000);
});