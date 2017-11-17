// Toggle species panel
$(document).ready(function(){
    $("#shift-panel").click(function(){
		$(".spceice-bar").toggle();
		$(this).find('span').toggleClass('glyphicon glyphicon-plus').toggleClass('glyphicon glyphicon-minus');

    });
});

$(document).ready(function(){
  $(".dropdown").click( function(){
	  $(this).find('span').toggleClass('caret').toggleClass('caret caret-up');
// 
// 

  });
});