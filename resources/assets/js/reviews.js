(function(window, undefined){
    'use strict';

    var Reviews = function () {
        var methods = {
            init: function () {
                $('.reviews .open-reviews__button').on('click', function (e) {
                    e.preventDefault();

                    var parent_id = $(this).data('parent');

                    var $elements = $('.review__parent-' + parent_id)

                    if ($elements.hasClass('hide')) {
                        $elements.removeClass('hide');
                    } else {
                        $elements.addClass('hide');
                    }
                });
            }
        };

        methods.init();

        return methods;
    };

    $(function () {
        new Reviews();
    });
})(window);

