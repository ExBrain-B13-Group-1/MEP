$(document).ready(function(){
  $("#userProfile").click(() => {
    const isOpen = $("#userProfile").attr("aria-isOpen");
    if (isOpen === "true") {
      $("#userProfile").attr("aria-isOpen", false);
      $("#profileMenu").fadeOut(100);
    } else {
      $("#userProfile").attr("aria-isOpen", true);
      $("#profileMenu").fadeIn(100);
    }
  });
  
  function navigation(type, elemnt) {
    const dashboard = $("#userDashboard");
    const userClass = $("#userClass");
    const userSchedule = $("#userSchedule");
    const userSupport = $("#userSupport");
    switch (type) {
      case "dashboard":
        $(dashboard).attr("aria-active", true);
        $(userClass).attr("aria-active", false);
        $(userSchedule).attr("aria-active", false);
        $(userSupport).attr("aria-active", false);
        break;
      case "class":
        $(dashboard).attr("aria-active", false);
        $(userClass).attr("aria-active", true);
        $(userSchedule).attr("aria-active", false);
        $(userSupport).attr("aria-active", false);
        break;
      case "schedule":
        $(dashboard).attr("aria-active", false);
        $(userClass).attr("aria-active", false);
        $(userSchedule).attr("aria-active", true);
        $(userSupport).attr("aria-active", false);
        break;
      case "support":
        $(dashboard).attr("aria-active", false);
        $(userClass).attr("aria-active", false);
        $(userSchedule).attr("aria-active", false);
        $(userSupport).attr("aria-active", true);
        break;
  
      default:
        break;
    }
  }
  
});

function menuForMobile () {
  if($('#menuList').attr('isOpen') === 'true'){
    $('#menuList').css({display:'none'})
    $('#menuList').attr('isOpen',false) 
  }else{
    $('#menuList').css({display:'block'})
    $('#menuList').attr('isOpen',true) 
  }
}