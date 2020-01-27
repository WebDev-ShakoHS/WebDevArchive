
$(document).ready(function(){
    $("#navbar-frame").load("nav.html");
});

 $(".accordion").on("click", ".accordion-header", function() {
 	$(this).toggleClass("active").next().slideToggle();
 });


