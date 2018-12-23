(function ($) {
    Drupal.behaviors.ziehharmonikaAccordion = {
        attach: function (context, settings) {
            $('.ziehharmonika').ziehharmonika({
                // Disable last open accordion
                collapsible: true,
                // Gives certain prefix for  headlines
                prefix: '\u2b51'
            });
            // First element will be opened
            $('.ziehharmonika h3:eq(0)').ziehharmonika('open');
        }
    };
}(jQuery));
