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

$(document).ready(function() {
    $("#seeMoreInstituteButton").click(function() {
        if ($("#innerInstituteWrapper").hasClass("active-wrapper")) {
            $("#innerInstituteWrapper").removeClass("active-wrapper");
            setTimeout(function() {
                $("#seeMoreButton").text("See more");
            }, 800);
        } else {
            $("#innerInstituteWrapper").addClass("active-wrapper");
            $("#seeMoreButton").text("See less");
        }
    });
    $("#seeMoreClassButton").click(function() {
        if ($("#innerClassWrapper").hasClass("active-wrapper")) {
            $("#innerClassWrapper").removeClass("active-wrapper");
            setTimeout(function() {
                $("#seeMoreButton").text("See more");
            }, 800);
        } else {
            $("#innerClassWrapper").addClass("active-wrapper");
            $("#seeMoreButton").text("See less");
        }
    });
});

