
// Dark Mode & Light Mode
$(document).ready(function(){

    const modeChange = $(".modechanges");
    const savedMode = localStorage.getItem("isDark");
    console.log(savedMode);

    function updateMode() {
        const isDark = $("html").hasClass('dark');
        const mode = isDark ? "true" : "false";
        const labelColor = isDark ? "#ffffff" : "#000000";
        console.log(labelColor);

        localStorage.setItem("isDark", mode);
        localStorage.setItem("labelColor", labelColor);

        isDark ? $(modeChange).attr("name", "moon-outline") : $(modeChange).attr("name", "sunny-outline");
    }

    if (savedMode === "true") {
        $("html").addClass("dark"); 
        console.log("dark mode");
        $(modeChange).attr("name", "moon-outline");
        updateMode();
    } else {
        $("html").removeClass("dark");
        console.log("light mode");
        $(modeChange).attr("name", "sunny-outline");
        updateMode();
    }

    updateMode();

    modeChange.on('click', function() {
        $("html").toggleClass("dark");
        updateMode();
    });

});

