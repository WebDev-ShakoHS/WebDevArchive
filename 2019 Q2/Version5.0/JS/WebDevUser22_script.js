function changeText() {
 document.getElementById("textChange").innerHTML = "Thanks for liking my Webpage";
}
var space = " ";
var pos = 0;
var msg = "User 22";

window.onload=function hideImage() {
    var img = document.getElementById("heart");
    img.style.visibility = 'hidden';
}

function Scroll() {
document.title = msg.substring(pos, msg.length) + space +msg.substring(0,pos);

pos++;
if (pos > msg.length) pos = 0;
window.setTimeout("Scroll()", 0);
}
Scroll();
function rotate() {
        var angle = "-90"
		$(document.getElementById("flipper")).rotateLeft(angle);
    if ($(document.getElementById("heart")).css("visibility") == "hidden") {
      var heart = document.getElementById("heart");
        $(heart).rotateLeft(angle);
		console.log("rotated hidden");
		var img = document.getElementById("heart");
    	img.style.visibility = 'hidden';
   	} else {
		var heart = document.getElementById("heart");
		  $(heart).rotateLeft(angle);
		  console.log("rotated visable");
		  heart.style.visibility = 'visible';
	}


 }
function showImage() {
    var img = document.getElementById("heart");
    img.style.visibility = 'visible';
}

    
    

    


        
        
