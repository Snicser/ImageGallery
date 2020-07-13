$(function () {
    $(window).scroll(function () {
        $(this).scrollTop() > 10 ? $('#to-top').fadeIn('slow') : $('#to-top').fadeOut('slow');
    });

    $('#to-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 500);
    });
});