(function($) {

  $.fn.menumaker = function(options) {
      
      var cssmenu = $(this), settings = $.extend({
        title: "",
        format: "dropdown",
        sticky: false
      }, options);

      return this.each(function() {
        cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
        $(this).find("#menu-button").on('click', function(){
          $(this).toggleClass('menu-opened');
		  $("body").toggleClass("overflowhidden");
			$(".menu-overlay").toggleClass("show-overlay");
      $("html").toggleClass("htmloverflowhidden");
          var mainmenu = $(this).next('ul');
          if (mainmenu.hasClass('open')) { 
            mainmenu.slideToggle( "fast" ).removeClass('open');
		  }
          else {
            mainmenu.slideToggle( "fast" ).addClass('open');
            if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
			  
            }
          }
        });
		
        cssmenu.find('li ul').parent().addClass('has-sub');

        multiTg = function() {
          cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
          cssmenu.find('.submenu-button').on('click', function() {
            $(this).toggleClass('submenu-opened');
            if ($(this).siblings('ul').hasClass('open')) {
              $(this).siblings('ul').removeClass('open').toggle( "hide" );
            }
            else {
              $(this).siblings('ul').addClass('open').toggle( "slow" );
            }
          });
        };

        if (settings.format === 'multitoggle') multiTg();
        else cssmenu.addClass('dropdown');

        if (settings.sticky === true) cssmenu.css('position', 'fixed');

        resizeFix = function() {
          if ($( window ).width() > 1024) {
            cssmenu.find('ul').show();
			
          }

          if ($(window).width()<= 1024) {
            cssmenu.find('ul').hide().removeClass('open');
			$(".menu-overlay").click(function(e) {
				$("#cssmenu ul").removeClass("open");
				$("#cssmenu ul").css("display","none");
				$(".menu-overlay").removeClass("show-overlay");
				$("#menu-button").removeClass("menu-opened");  
				$(".submenu-button").removeClass("submenu-opened"); 
				 $("body").removeClass("overflowhidden");
         $("html").removeClass("htmloverflowhidden");
				 
			  });
			  $('body').click(function(evt){    
					if($(evt.target).closest('#cssmenu').length)
					return;
					$("#cssmenu ul").removeClass("open");
					$("body").removeClass("overflowhidden");
          $("html").removeClass("htmloverflowhidden");
					$("#cssmenu ul").css("display","none");
					$("#menu-button").removeClass("menu-opened"); 
					$(".submenu-button").removeClass("submenu-opened");
					$(".menu-overlay").removeClass("show-overlay");
				  });
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);

      });
  };
})(jQuery);

(function($){
$(document).ready(function(){

$(document).ready(function() {
  $("#cssmenu").menumaker({
    title: "",
    format: "multitoggle"
  });

  $("#cssmenu").prepend("<div id='menu-line'></div>");

var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

$("#cssmenu > ul > li").each(function() {
  if ($(this).hasClass('active')) {
    activeElement = $(this);
    foundActive = true;
  }
});

if (foundActive === false) {
  activeElement = $("#cssmenu > ul > li").first();
}

defaultWidth = lineWidth = activeElement.width();

defaultPosition = linePosition = activeElement.position().left;

menuLine.css("width", lineWidth);
menuLine.css("left", linePosition);

$("#cssmenu > ul > li").hover(function() {
  activeElement = $(this);
  lineWidth = activeElement.width();
  linePosition = activeElement.position().left;
  menuLine.css("width", lineWidth);
  menuLine.css("left", linePosition);
}, 
function() {
  menuLine.css("left", defaultPosition);
  menuLine.css("width", defaultWidth);
});

});


});
})(jQuery);
