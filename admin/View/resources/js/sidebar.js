const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
const themeToggleBtn = document.getElementById('theme-toggle');
let dark;
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
    isCloseSideBar($("#sidebarControl").attr('route'));
});

function isCloseSideBar(type) {
    const ROUTE = ['finance','user','institute']
    let openImageOne = dark  ? "../../resources/img/LOGOwhite.svg" : '../../resources/img/LOGO.svg'
    let openImageTwo = dark  ? "../resources/img/LOGOwhite.svg": "../resources/img/LOGO.svg"
    
    let closeLogoURL = ROUTE.includes(type) ? "../../resources/img/LOGOclose.svg" : "../resources/img/LOGOclose.svg"
    let openLogoURL = ROUTE.includes(type) ? openImageOne: openImageTwo
    console.log(openImageOne,openImageTwo);
    if ($("#logo-sidebar").attr("close") === "true") {
        $("#brandLogo").attr("src", closeLogoURL);
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
    dark=true
} else {
    document.documentElement.classList.remove('dark')
    dark=false
}
})()



// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}


themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
            dark=true
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
            dark=false
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
            dark=false
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
            dark=true
        }
    }
    
});

