(function($) {

    var updateCss = function(){
        jQuery('#sunlight_css').val( editor.getSession().getValue() );
    }

    jQuery('#save-cusotm-css').submit( updateCss );

})( jQuery );


var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/javascript");


