$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    $('#slider1').adaptiveSlider({
        opacity: 0.7,
        normalizedTextColors: {
          light: '#f1f1f1',
          dark: '#222'
        }
    });

    $('#slider2').adaptiveSlider({
        opacity: 0.7,
        normalizedTextColors: {
          light: '#f1f1f1',
          dark: '#222'
        }
    });
});

$("#logbtn").leanModal({top : 300, overlay : 0.6, closeButton: ".modal_close"} );