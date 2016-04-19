$(document).ready(function() {

$('div.alert-success').delay(3000).slideUp(300);

//Parallax background
checkSize();

$(window).resize(checkSize);

function checkSize(){
    if ($(".img-container").css("position") == "fixed" ){
			var x1 = $('.logo-home-hold').outerHeight();
			var x2 = x1 + $('.page-header').outerHeight();
			$('.inner1').css({'clip' : 'rect(' + x1 + 'px, auto,' + x2 + 'px, auto)', 'display' : 'block'});
			x1 = x2 + $('.over-opening-time').outerHeight();
			$('.inner2').css({'clip' : 'rect(' + x2 + 'px, auto,' + x1 + 'px, auto)', 'display' : 'block'});
			x2 = x1 + $('.fast-links').outerHeight(); //1123
			$('.inner3').css({'clip' : 'rect(' + x1 + 'px, auto,' + x2 + 'px, auto)', 'display' : 'block'});
			x1 = x2 + $('.over-welcome').outerHeight(); //1301
			$('.inner4').css({'clip' : 'rect(' + x2 + 'px, auto,' + x1 + 'px, auto)', 'display' : 'block'});

			var documentEl = $(document);
      var parallaxBg = $('div.img-container');
            
      documentEl.on('scroll', function() {
        var currScrollPos = documentEl.scrollTop();
          parallaxBg.css('top', currScrollPos*(-0.1) + 'px');
      });
    }
    else {
    	$('.inner1, .inner2, .inner3, .inner4').css('display', 'none');

    }
}

//Go to top button      
$('#to-the-top').on('click', function() {
	$('html,body').animate({scrollTop: 0}, 800);
});
        
//Fancybox - Projects page
$(".fancybox-thumb").fancybox({
  prevEffect  : 'none',
  nextEffect  : 'none',
  padding: 0,
  helpers : {
      thumbs  : {
          width   : 50,
          height  : 50
      }
  }
});    

});