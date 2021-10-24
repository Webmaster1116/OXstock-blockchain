$(document).ready(function(){   

    $(window).scroll(function() {    

        var scroll = $(window).scrollTop();    

        if (scroll > 50) {

            $(".header").addClass("stekyHeader");

        }else{

             $(".header").removeClass("stekyHeader");

        }

    });





    $("#prisingcarousel").owlCarousel({

 autoplay: true,

  lazyLoad: true,

  loop: false,

  margin: 10,

  responsiveClass: true,

  autoHeight: true,

  autoplayTimeout: 7000,

  smartSpeed: 800,

  nav: true,
  responsive: {

    0: {

      items: 1

    },



    479: {

      items: 1

    },



    480: {

      items: 2

    },



    768: {

      items: 4

    },

    1201:{

      items: 5

    }

  }

});

    



    });