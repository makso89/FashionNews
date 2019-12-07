/*Aos initiation*/

AOS.init();

/*Owl Carousel initiation*/

jQuery(document).ready(function () {
    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        margin: 5,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            1000: {
                items: 2
            },
            1300: {
                items: 3
            }
        }
    });
});


/*Menu dropdown*/

jQuery(function ($) {
    // Bootstrap menu magic
    if ($(window).width() < 767) {
        $(".dropdown-toggle").attr('data-toggle', 'dropdown');
        $('.dropdown').on('show.bs.dropdown', function () {
            $(this).siblings('.open').removeClass('open').find('a.dropdown-toggle').attr('data-toggle', 'dropdown');
            $(this).find('a.dropdown-toggle').removeAttr('data-toggle');
        });
    }
});
