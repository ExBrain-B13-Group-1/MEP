
$(document).ready(function () {
    $('#burger').click(function () {
        $('#mobile-menu').toggleClass('sidebar-open');
        $('#backdrop').toggleClass('hidden');
    });

    $('#backdrop').click(function () {
        $('#mobile-menu').removeClass('sidebar-open');
        $('#backdrop').addClass('hidden');
    });

    // Change active link color
    $('.nav-link').click(function (e) {
        e.preventDefault();
        $('.nav-link').removeClass('active').addClass('inactive');
        $(this).addClass('active').removeClass('inactive');
    });
});
