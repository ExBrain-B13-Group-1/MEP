$(document).ready(function(){

    const modeChange = $(".modechanges");
    const savedMode = localStorage.getItem("isDark");

    function updateMode() {
        const isDark = $("html").hasClass('dark');
        const mode = isDark ? "true" : "false";
        const labelColor = isDark ? "#ffffff" : "#000000";

        localStorage.setItem("isDark", mode);
        localStorage.setItem("labelColor", labelColor);

        $(modeChange).attr("name", isDark ? "moon-outline" : "sunny-outline");
        updateSidebarLinkColors();
    }

    function updateSidebarLinkColors() {
        $('.sidebarlinks').each(function() {
            $(this).removeClass('sidebar-dark-currents sidebar-light-currents');
            if(localStorage.getItem("isDark") === "true") {
                if ($(this).hasClass('active')) {
                    $(this).addClass('sidebar-dark-currents');
                }
            } else {
                if ($(this).hasClass('active')) {
                    $(this).addClass('sidebar-light-currents');
                }
            }
        });
    }

    if (savedMode === "true") {
        $("html").addClass("dark"); 
    } else {
        $("html").removeClass("dark");
    }

    updateMode();

    modeChange.on('click', function() {
        $("html").toggleClass("dark");
        updateMode();
    });

});
