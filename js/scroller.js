(function($) {
    var el = $("#mobile-nav");
    var content = $(".trip-detail"),
        viewportHeight = window.innerHeight,
        elHeight = el.outerHeight(true),
        elOffsetTop = el.offset().top,
        contentHeight = content.outerHeight(true);
    $(window).resize(function() {
        viewportHeight = window.innerHeight;
        elHeight = el.outerHeight(true);
        elOffsetTop = el.offset().top;
        contentHeight = content.outerHeight(true);
    });
    el.wrap("<div class='lf-ghost' style='height:" + elHeight + "px;display:" + el.css("display") + "'></div>");
    $(window).bind("scroll", function() {
        var offsetBottom = elOffsetTop + contentHeight - viewportHeight;
        if ($(this).scrollTop() >= (elOffsetTop + elHeight)) {
            el.addClass('floating-nav-tabs');
            if ($(this).scrollTop() >= offsetBottom) {
                el.css({
                    'top': '-50px',
                    'transition': 'all ease .4s'
                });
            } else {
                el.removeAttr('style');
            }
        } else if ($(this).scrollTop() <= (elOffsetTop + elHeight)) {
            el.css({
                'top': '-100px',
                'transition': 'all ease .8s'
            }).removeClass('floating-nav-tabs');
        }
    });

    //layer slider settings
    $("#layerslider_1").css({
        'height': window.innerHeight + 'px'
    });

})(jQuery);