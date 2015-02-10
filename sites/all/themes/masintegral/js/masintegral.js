(function ($) {
    Drupal.behaviors.masintegralfullbg = {
        attach: function (context, settings) {
            $(window).load(function() {
                $("#background").fullBg();
            });
        }
    };
})(jQuery);
