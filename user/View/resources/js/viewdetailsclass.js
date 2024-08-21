$(document).ready(function(){
    const morelesscontainer = $('.more-less-containers');
    $('#more-less-ctrl').on('click', () => {
        if (morelesscontainer.hasClass('h-[190vh]')) {
            // Currently expanded
            $('.show-moreless-text').text("Show less");
            $('.show-icons').attr("name", "chevron-up-outline");
        } else {
            // Currently collapsed
            $('.show-moreless-text').text("Show more");
            $('.show-icons').attr("name", "chevron-down-outline");
        }
        morelesscontainer.toggleClass('md:h-[67vh] h-[190vh]');
    });
});
