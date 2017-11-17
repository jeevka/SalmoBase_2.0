// Sliding down 
$(document).ready(function(){
    $("#smoked_salmon").click(function(){
        $("#smoked_image").slideDown("slow");
    });
});


$(document).ready(function(){
    $("#tools").click(function(){
        $("#smoked_image").slideDown("slow");
    });
});

$(document).ready(function(){
    $("#tools").click(function(){
        $("#smoked_image_1").slideDown("slow");
    });
});


$(document).ready(function(){
    $("#tools").click(function(){
        $("#smoked_image_2").slideDown("slow");
    });
});


$(document).ready(function(){
    $("#about").click(function(){
        $("#smoked_image_2").slideUp("slow");
    });
});



$(document).ready(function(){
    $("#about").click(function(){
        $("#smoked_image_1").slideUp("slow");
    });
});


$(document).ready(function(){
    $("#about").click(function(){
        $("#smoked_image").slideUp("slow");
    });
});

$(document).ready(function(){
    $("#contact").click(function(){
        $("div").hide();
    });
});

$(document).ready(function(){
	$("#b_button_1").click(function(){
		alert("Bazinga Bazinga ....");
	});
});

$(document).ready(function(){
	$("#b_button_2").click(function() {
		window.open("salmobase.org",null,"height=200,width=400,status=yes,toolbar=no,menubar=no,location=no");
	});
}); 
