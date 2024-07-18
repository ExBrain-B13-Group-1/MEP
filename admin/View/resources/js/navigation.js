

$("#eventCancel").click(() => {
  $("#eventDetails").fadeOut(100);
});

$("#faqEdite").click(() => {});

function faqEdite(element) {
  const faqForm = $(element).parent().parent().children()[0];
  const inputQ = $(faqForm).children()[0];
  const inputA = $(faqForm).children()[1];
  inputQ.disabled = false;
  $(inputQ).attr("aria-disabled", false);
  inputA.disabled = false;
  $(inputA).attr("aria-disabled", false);
}

function eventClick(element) {
  console.log($(element).attr("key"));
  $("#eventDetails").css({ display: "flex" });
}

function activeForm() {
  console.log($("#faqInputForm").children());
}

function faqSwitch(element, type) {
  const userBtn = $(element).parent().children()[0];
  const instBtn = $(element).parent().children()[1];
  if (type === "user") {
    $("#faqInstitute").fadeOut(100);
    $("#faqUser").fadeIn(100);
    $(userBtn).attr("aria-ative", true);
    $(instBtn).attr("aria-ative", false);
  } else {
    $("#faqUser").fadeOut(100);
    $("#faqInstitute").fadeIn(100);
    $(userBtn).attr("aria-ative", false);
    $(instBtn).attr("aria-ative", true);
  }
}

function settingMenu(type) {
  const general = $("#settingMenuContainer").children()[0];
  const acc = $("#settingMenuContainer").children()[1];
  const privacy = $("#settingMenuContainer").children()[2];
  const theme = $("#settingMenuContainer").children()[3];
  const maintenance = $("#settingMenuContainer").children()[4];
  switch (type) {
    case "general":
      $(general).attr("aria-active", true);
      $(acc).attr("aria-active", false);
      $(privacy).attr("aria-active", false);
      $(theme).attr("aria-active", false);
      $(maintenance).attr("aria-active", false);

      $("#accountSetting").fadeOut()
      $("#privacySetting").fadeOut()
      $("#ThemeSetting").fadeOut()
      $("#maintenanceSetting").fadeOut()
      $("#generalSetting").fadeIn(100)
      break;
    case "account":
      $(general).attr("aria-active", false);
      $(acc).attr("aria-active", true);
      $(privacy).attr("aria-active", false);
      $(theme).attr("aria-active", false);
      $(maintenance).attr("aria-active", false);

      $("#generalSetting").fadeOut()
      $("#privacySetting").fadeOut()
      $("#ThemeSetting").fadeOut()
      $("#maintenanceSetting").fadeOut()
      $("#accountSetting").fadeIn(100)
      break;

    case "privacy":
      $(general).attr("aria-active", false);
      $(acc).attr("aria-active", false);
      $(privacy).attr("aria-active", true);
      $(theme).attr("aria-active", false);
      $(maintenance).attr("aria-active", false);


      $("#generalSetting").fadeOut()
      $("#accountSetting").fadeOut()
      $("#ThemeSetting").fadeOut()
      $("#maintenanceSetting").fadeOut()
      $("#privacySetting").fadeIn(100)
      break;

    case "themes":
      $(general).attr("aria-active", false);
      $(acc).attr("aria-active", false);
      $(privacy).attr("aria-active", false);
      $(theme).attr("aria-active", true);
      $(maintenance).attr("aria-active", false);

      $("#generalSetting").fadeOut()
      $("#accountSetting").fadeOut()
      $("#privacySetting").fadeOut()
      $("#maintenanceSetting").fadeOut()
      $("#ThemeSetting").fadeIn(100)
      break;

    case "maintenance":
      $(general).attr("aria-active", false);
      $(acc).attr("aria-active", false);
      $(privacy).attr("aria-active", false);
      $(theme).attr("aria-active", false);
      $(maintenance).attr("aria-active", true);

      $("#generalSetting").fadeOut()
      $("#accountSetting").fadeOut()
      $("#privacySetting").fadeOut()
      $("#ThemeSetting").fadeOut()
      $("#maintenanceSetting").fadeIn(100)
      break;

    default:
      break;
  }
}


function openAccountSecurity(type) {
  const securityContainer = $('#securityContainer')
  const twoFactor = $('#securityContainer').children()[0]
  const recovery = $('#securityContainer').children()[1]
  $(securityContainer).css({display:'flex'})
  if(type === '2fa'){
    $(twoFactor).fadeIn(100)
  }else if(type === 'recovery'){
    $(recovery).fadeIn(100)
  }else return;
}

function closeAccountSecurity () {
 $('#securityContainer').fadeOut(100)
 const twoFactor = $('#securityContainer').children()[0]
 const recovery = $('#securityContainer').children()[1]
 $(twoFactor).fadeOut()
 $(recovery).fadeOut()
}
// <link rel="stylesheet" href="css/style.css?<?=time()?>">

 $(".insitute_check").click(() => {
  console.log('hi');
 })

function check(){
  console.log('hi');
}

$( "#insttituteTable tbody" ).on( "click", "tr", function() {
  console.log( $( this ).text() );
});