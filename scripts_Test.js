

$(document).ready(function(){
    $("#shift-panel").click(function(){
                $(".species-bar").toggle();
                $(this).find('span').toggleClass('glyphicon glyphicon-triangle-bottom').toggleClass('glyphicon glyphicon-triangle-top');
    });
});


$(document).ready(function(){
  $(".dropdown").click( function(){
          $(this).find('span').toggleClass('caret').toggleClass('caret caret-up');

  });
});


(function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);



