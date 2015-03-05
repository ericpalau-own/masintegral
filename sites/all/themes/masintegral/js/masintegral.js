(function ($) {
    Drupal.behaviors.masintegralfullbg = {
        attach: function (context, settings) {
            $(window).load(function() {
                $("#background").fullBg();
                $("#background").show();
                $("#content, #content-right, #footer, #sidebar-second").delay(1000).fadeIn( "3000", function() {
                    // Animation complete
                });
            });
        }
    };
    /*
    Drupal.behaviors.masintegralnewsletter = {
        attach: function (contect, settings) {
            $(window).load(function() {
                $('#block-newsletter-newsletter-subscribe').before('<div class="newsletter-button">newsletter</div>');
                $('#block-newsletter-newsletter-subscribe').addClass('nl-wrapper-hidden');

                $('.newsletter-button').click(function(){
                    if($('#block-newsletter-newsletter-subscribe').hasClass('nl-wrapper-hidden')) {
                        $('#block-newsletter-newsletter-subscribe').slideDown().addClass('nl-wrapper-visible').removeClass('nl-wrapper-hidden');
                    } else {
                        $('#block-newsletter-newsletter-subscribe').slideUp().addClass('nl-wrapper-hidden').removeClass('nl-wrapper-visible');
                    }
                })
            })
        }
    }
    */
})(jQuery);
