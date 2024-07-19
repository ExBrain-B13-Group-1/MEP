
$("#sidebarControl").click(() => {
    if ($("#logo-sidebar").attr("close") === "true") {
        $("#dropdown-example").attr("aria-checked", "false");
        $("#logo-sidebar").attr("close", "false");

        $("#sidebarControl").css({
            transform: "rotate(0)",
        });
    } else {
        $("#logo-sidebar").attr("close", "true");
        $("#dropdown-example").attr("aria-checked", "true");
        $("#sidebarControl").css({
            transform: "rotate(180deg)",
        });
    }
    console.log($("#sidebarControl").attr('route'));
    isCloseSideBar($("#sidebarControl").attr('route'));
});

function isCloseSideBar(type) {
    const ROUTE = ['finance','user','institute']
    
    let colseLogoURL = ROUTE.includes(type) ? "../../resources/img/LOGOclose.svg" : "../resources/img/LOGOclose.svg"
    let openLogoURL = ROUTE.includes(type) ? "../../resources/img/LOGO.svg" : "../resources/img/LOGO.svg"
    console.log(colseLogoURL,openLogoURL);
    if ($("#logo-sidebar").attr("close") === "true") {
        $("#brandLogo").attr("src", colseLogoURL);
        $("#navbar").css({
            width: "93.5%",
            marginLeft: '5rem'
        });
        $(".sideLabel").css({
            display: "none"
        });
        $(".sideLabel").parent().css({
            justifyContent: "center"
        });
        $("#main").attr("aria-checked", "true");
        $("#brandLogo").css({
            size: "100",
        });
        $("#logo-sidebar").css({
            width: "5%",
        });
    } else {

        $("#brandLogo").attr("src", openLogoURL);
        $("#navbar").css({
            width: "83%",
            marginLeft: '14rem'
        });
        $(".sideLabel").css({
            display: "block"
        });
        $("#main").attr("aria-checked", "false");
        $(".sideLabel").parent().css({
            justifyContent: "start"
        });
        $("#logo-sidebar").css({
            width: "15.5%",
        });
    }
}
(() => {
  if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark')
}
})()

var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});



// $(document).ready(function () {
//   const modeChange = $(".modechanges");
//   const savedMode = localStorage.getItem("isDark");

//   function updateMode() {
//     const isDark = $("html").hasClass("dark");
//     const mode = isDark ? "true" : "false";
//     const labelColor = isDark ? "#ffffff" : "#000000";

//     localStorage.setItem("isDark", mode);
//     localStorage.setItem("labelColor", labelColor);

//     $(modeChange).attr("name", isDark ? "moon-outline" : "sunny-outline");
//     updateSidebarLinkColors();
//   }

//   function updateSidebarLinkColors() {
//     $(".sidebarlinks").each(function () {
//       $(this).removeClass("sidebar-dark-currents sidebar-light-currents");
//       if (localStorage.getItem("isDark") === "true") {
//         if ($(this).hasClass("active")) {
//           $(this).addClass("sidebar-dark-currents");
//         }
//       } else {
//         if ($(this).hasClass("active")) {
//           $(this).addClass("sidebar-light-currents");
//         }
//       }
//     });
//   }

//   if (savedMode === "true") {
//     $("html").addClass("dark");
//   } else {
//     $("html").removeClass("dark");
//   }

//   updateMode();

//   modeChange.on("click", function () {
//     $("html").toggleClass("dark");
//     updateMode();
//   });
// });
