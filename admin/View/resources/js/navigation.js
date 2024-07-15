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
    isCloseSideBar();
  });

  function isCloseSideBar() {
    if ($("#logo-sidebar").attr("close") === "true") {
      $("#brandLogo").attr("src", "./resources/img/LOGOclose.svg");
      $("#navbar").css({ width: "93.5%",marginLeft:'5rem' });
      $(".sideLabel").css({ display: "none" });
      $(".sideLabel").parent().css({ justifyContent: "center" });
      $("#main").attr("aria-checked", "true");
      $("#brandLogo").css({
        size: "100",
      });
      $("#logo-sidebar").css({
        width: "5%",
      });
    } else {
      $("#brandLogo").attr("src", "./resources/img/LOGO.svg");
      $("#navbar").css({ width: "83%",marginLeft:'14rem' });
      $(".sideLabel").css({ display: "block" });
      $("#main").attr("aria-checked", "false");
      $(".sideLabel").parent().css({ justifyContent: "start" });
      $("#logo-sidebar").css({
        width: "15.5%",
      });
    }
  }


  $("#eventCancel").click(() => {
    $("#eventDetails").fadeOut(100)
  })


  $("#faqEdite").click(()=> {

  })


  function faqEdite (element) {
    const faqForm = $(element).parent().parent().children()[0];
    const inputQ = $(faqForm).children()[0]
    const inputA = $(faqForm).children()[1]
    inputQ.disabled = false;
    $(inputQ).attr('aria-disabled',false)
    inputA.disabled = false;
    $(inputA).attr('aria-disabled',false)
  }


function eventClick (element) {
  console.log($(element).attr('key'));
  $("#eventDetails").css({display:'flex'})
}


function activeForm () {
  console.log($('#faqInputForm').children());
}


function faqSwitch (element,type) {
  const userBtn = $(element).parent().children()[0]
  const instBtn = $(element).parent().children()[1]
  if(type === 'user') {
    $("#faqInstitute").fadeOut(100)
    $("#faqUser").fadeIn(100)
    $(userBtn).attr('aria-ative',true)
    $(instBtn).attr('aria-ative',false)
  }else{
    $("#faqUser").fadeOut(100)
    $("#faqInstitute").fadeIn(100)
    $(userBtn).attr('aria-ative',false)
    $(instBtn).attr('aria-ative',true)
  }
}

  // <link rel="stylesheet" href="css/style.css?<?=time()?>">