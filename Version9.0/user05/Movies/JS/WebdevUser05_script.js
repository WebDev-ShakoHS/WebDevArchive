function changeText() {
 document.getElementById("textChange").innerHTML="Thanks for liking my Webpage";
document.body.style.backgroundColor = "green";
}

var space = " ";
var pos = 0;
var msg = "Hows it going world";


function Scroll(){
document.title = msg.substring(pos, msg.length) + space +msg.substring(0,pos);

pos++;
if (pos > msg.length) pos = 0;
window.setTimeout("Scroll()", 0);
}
Scroll();