/*$(document).on('click', '.addCart', function (e) {
    e.preventDefault();
    $.post({

        url: $(this).attr('action'),
        data:
            $(this).serialize()
        ,
        success: function (data) {
            if (data) {
                alert("Hello! I am an alert box!!");
            }
        },
        error: function (reject) {
            alert('failed');
        }

    });

});*/





(function ($) {
    $('#add_to_cart').on('submit', function (e) {
        e.preventDefault();

        $.post($(this).attr('action'), $(this).serialize(), function (data) {

        });
    })



})(jQuery);



