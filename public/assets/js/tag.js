(function($){
    function postsCarousel() {
        var checkWidth = $(window).width();
        var owlPost = $("#circuits");
        if (checkWidth > 767) {
          if (typeof owlPost.data('owl.carousel') != 'undefined') {
            owlPost.data('owl.carousel').destroy();
          }
          owlPost.removeClass('owl-carousel');
        } else if (checkWidth < 768) {
          owlPost.addClass('owl-carousel');
          owlPost.owlCarousel({
            items: 2,
            nav:true,
            dots: false,
            loop: false
          });
        }
    }
      
    postsCarousel();
    $(window).on("resize",function(){postsCarousel()});

    $( ".race-wrapper" ).each(function( index ) {
        if($(this).hasClass("current")){
            $(this).append("<div class='ribbon'><img src='./assets/img/badge.svg'/><span>Prossima Gara</span></div>")
        }
    });

    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
    
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });
    
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
    
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });


})(jQuery)