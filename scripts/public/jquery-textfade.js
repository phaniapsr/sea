(function ($) {
    $.fn.extend({
        rotaterator: function (options) {
            var defaults = {
                fadeSpeed: 500,
                pauseSpeed: 100,
                child: null
            };
            var options = $.extend(defaults, options);
            return this.each(function () {
                var o = options;
                var obj = $(this);
                var items = $(obj.children(), obj);
                items.each(function () {
                    $(this).hide();
                });
                if (!o.child) {
                    var next = $(obj).children(':first');
                } else {
                    var next = o.child;
                }
                $(next).fadeIn(o.fadeSpeed, function () {
                    $(next).delay(o.pauseSpeed).fadeOut(o.fadeSpeed, function () {
                        var next = $(this).next();
                        if (next.length == 0) {
                            next = $(obj).children(':first');
                        }
                        $(obj).rotaterator({
                            child: next,
                            fadeSpeed: o.fadeSpeed,
                            pauseSpeed: o.pauseSpeed
                        });
                    });
                });
            });
        }
    });
}(jQuery));
$(document).ready(function () {
    $('#cse').rotaterator({
        fadeSpeed: 500,
        pauseSpeed: 100
    });
});
$(document).ready(function () {
    $('#it').rotaterator({
        fadeSpeed: 500,
        pauseSpeed: 100
    });
});
$(document).ready(function () {
    $('#ece').rotaterator({
        fadeSpeed: 500,
        pauseSpeed: 100
    });
});
$(document).ready(function () {
    $('#eee').rotaterator({
        fadeSpeed: 500,
        pauseSpeed: 100
    });
});
$(document).ready(function () {
    $('#mec').rotaterator({
        fadeSpeed: 500,
        pauseSpeed: 100
    });
});
$(document).ready(function () {
    $('#civil').rotaterator({
        fadeSpeed: 500,
        pauseSpeed: 100
    });
});
$(document).ready(function () {
    $('#forgot').rotaterator({
        fadeSpeed: 500,
        pauseSpeed: 100
    });
});