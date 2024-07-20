console.log("hello");
$(document).ready(function () {
    $(".tabs").click(function () {
        $(".tabs").removeClass("clicked"); // Remove the 'clicked' class from all tabs
        $(this).addClass("clicked"); // Add the 'clicked' class to the clicked tab
    });
});
document.addEventListener("DOMContentLoaded", function () {
    new Splide("#classesSplide").mount();
});

document.addEventListener("DOMContentLoaded", function () {
    new Splide("#instructorSplide").mount();
});
