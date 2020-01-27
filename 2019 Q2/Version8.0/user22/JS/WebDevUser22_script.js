
function myFunction() {
document.getElementById("myDropdown").classList.toggle("show");
}
	

window.onclick = function (e) {
	if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}


/*jslint node: true */



var link = $('link');
$('#stylebutton .button').on('click', function () {	
			var $this = $(this);
			var stylesheet = $(this).data('file');
			link.attr('href', 'CSS/' + stylesheet + '.css');
			$this
			.siblings('button')
				.removeAttr('disabled')
				.end()
				.attr('disabled', 'disabled')
});

$('#fontchange #initial').on('click', function() {
		var button1 = document.getElementById("positive");
		var button2 = document.getElementById("negative");
		(button1).style.visibility = 'visible';
		(button2).style.visibility = 'visible';
});
$('#fontchange #positive').on('click', function() {
		var fontSize = parseInt($("body").css("font-size"));
		fontSize = fontSize + 3 + "px";
		$("body").css({'font-size':fontSize});
});
$('#fontchange #negative').on('click', function() {
		var fontSize = parseInt($("body").css("font-size"));
		fontSize = fontSize - 3 + "px";
		$("body").css({'font-size':fontSize});
});
$('#challengebutton #revealer').on('click', function() {
		var revealer = document.getElementById("revealer");
		revealer.innerHTML="Are you really?"
		var button1 = document.getElementById("revealed1");
		(button1).style.visibility = 'visible';
		var button2 = document.getElementById("revealed2");
		(button2).style.visibility = 'visible';
});
$('#challengebutton #revealed1').on('click', function() {
		var x = document.getElementById("textbubble");
		x.style.visibility = 'visible';
	});
$('#challengebutton #revealed2').on('click', function() {
		var revealer = document.getElementById("revealer");
		revealer.innerHTML="You up for a challenge?"
		var button1 = document.getElementById("revealed1");
		(button1).style.visibility = 'hidden';
		var button2 = document.getElementById("revealed2");
		(button2).style.visibility = 'hidden';
		var x = document.getElementById("textbubble");
		x.style.visibility = 'hidden';
});




$('ul li  > a')

$(function() {
			$('li:first-child').addClass('emphasis');
	});
$(document).ready(function() {
			$('li:first-child').addClass('emphasis');
		});

//		$(document).(function(){
//		$("body").css("background-color", "gray");
//			  });
// made a comment due to a conflict in objective
  $(document).ready(function() {
			var div = document.getElementById("future")
			var $table = $('<table>');
				$table.append('<thead>').children('thead')
		.append('<tr />').children('tr').append('<th>A</th><th>B</th><th>C</th><th>D</th><th>E</th>');
				$table.append('<tbody />').children('tbody').append('<tr/>').children('tr:last')
			.append("<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>")
			$(div).append($table)
		});

$(document).ready(function() {
			$("body").css("font-family", "Comic Sans MS")
		});

$(document).ready(function() {
	var $this = document.getElementById("light");
	$($this).attr('disabled', 'disabled')
});
function changeText() {
 document.getElementById("textChange").innerHTML = "Thanks for liking my Webpage";
}
var space = " ";
var pos = 0;
var msg = "User 22";

$(document).ready(function() {
    var img = document.getElementById("heart");
    img.style.visibility = 'hidden';
});

//this is a code that doesnt make sense logically but it works
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
$(document).ready(function() {
	var $this = document.getElementById("light");
	$($this).attr('disabled', 'disabled')
});