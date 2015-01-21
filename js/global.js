$(document).ready(function(){

$('.bxslider').bxSlider({
        /*
        To add class on the first visible slide you have to call onSliderLoad. Then you continue adding and removing active-slide class with onSlideAfter call.
        */
        onSlideAfter: function (currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
            console.log(currentSlideHtmlObject);
            $('.active-slide').removeClass('active-slide');
            $('.bxslider > li').eq(currentSlideHtmlObject).addClass('active-slide');

            // Alts (Busca el alt de la imagen activa y la imprime en un p)
            var alt = document.querySelectorAll('.active-slide .header-thumb img');
		    var unique = alt[0];
			document.getElementById("alt-description").innerHTML = unique.alt;
        },
        onSliderLoad: function () {
            $('.bxslider > li').eq(1).addClass('active-slide');
        },
    
    });

});

