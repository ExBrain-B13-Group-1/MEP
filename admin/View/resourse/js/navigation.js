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
      $("#brandLogo").attr("src", "./resourse/img/LOGOclose.svg");
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
      $("#brandLogo").attr("src", "./resourse/img/LOGO.svg");
      $("#navbar").css({ width: "83%",marginLeft:'14rem' });
      $(".sideLabel").css({ display: "block" });
      $("#main").attr("aria-checked", "false");
      $(".sideLabel").parent().css({ justifyContent: "start" });
      $("#logo-sidebar").css({
        width: "15.5%",
      });
    }
  }




  // <link rel="stylesheet" href="css/style.css?<?=time()?>">