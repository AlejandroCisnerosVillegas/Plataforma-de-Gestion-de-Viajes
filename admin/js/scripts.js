(function() {
    "use strict";
    $("html").niceScroll({styler:"fb",cursorcolor:"#97B6CC", cursorwidth: '6', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});
    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#97B6CC", cursorwidth: '6', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});
    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }
})(jQuery);  