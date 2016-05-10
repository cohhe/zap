jQuery(document).ready(function() {
    var zap_aboutpage = zapWelcomeScreenCustomizerObject.aboutpage;
    var zap_nr_actions_required = zapWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof zap_aboutpage !== 'undefined') && (typeof zap_nr_actions_required !== 'undefined') && (zap_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + zap_aboutpage + '"><span class="welcome-screen-actions-count">' + zap_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".zap-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section zap-upsells">');
    }
    if (typeof zap_aboutpage !== 'undefined') {
        jQuery('.zap-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + zap_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', zapWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".zap-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});