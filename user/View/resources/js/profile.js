function profileMenu(type) {
  const profile = $("#profileSetting").children()[0];
  const photo = $("#profileSetting").children()[1];
  const account = $("#profileSetting").children()[2];

  switch (type) {
    case "general":
      $(profile).attr("aria-active", true);
      $(photo).attr("aria-active", false);
      $(account).attr("aria-active", false);

      $("#accountSection").fadeOut();
      $("#photoSection").fadeOut();
      $("#profileSection").fadeIn(100);
      break;
    case "photo":
      $(profile).attr("aria-active", false);
      $(photo).attr("aria-active", true);
      $(account).attr("aria-active", false);

      $("#accountSection").fadeOut();
      $("#profileSection").fadeOut();
      $("#photoSection").fadeIn(100);
      break;

    case "account":
      $(profile).attr("aria-active", false);
      $(photo).attr("aria-active", false);
      $(account).attr("aria-active", true);

      $("#profileSection").fadeOut();
      $("#photoSection").fadeOut();
      $("#accountSection").fadeIn(100);
      break;

    default:
      break;
  }
}

$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/
  $("#saveBtn").on("click", function (e) {
    e.preventDefault();

    let first_name = $("#first_name").val();
    let last_name = $("#last_name").val();
    let portfolio = $("#portfolio").val();
    let facebook = $("#facebook").val();
    let instagram = $("#instagram").val();
    let twitter = $("#twitter").val();
    let telegram = $("#telegram").val();

    // Create a FormData object
    let formData = new FormData();
    formData.append("first_name", first_name);
    formData.append("last_name", last_name);
    formData.append("portfolio", portfolio);
    formData.append("facebook", facebook);
    formData.append("instagram", instagram);
    formData.append("twitter", twitter);
    formData.append("telegram", telegram);

    // Make the AJAX request
    $.ajax({
      url: "../../Controller/InforController.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "text",
      success: function (data) {
        console.log(data);
        // Reload the page
        location.reload();
      },
      error: function (err) {
        console.log(err);
        alert("Error occurred during submission.");
      },
    });
  });

  $("#changePs").on("click", function (e) {
    e.preventDefault();

    let oldPassword = $("#old-password").val();
    let newPassword = $("#password").val();
    let confirmPassword = $("#confirm-password").val();
    let $psMessage = $("#psMessage");

    if (oldPassword.length === 0){
      $psMessage.text("Need Current Password!");
      $psMessage.css("color", "#ff3e3e");
      return;
    }

    if (newPassword.length === 0) {
      $psMessage.text("Password can't be empty!");
      $psMessage.css("color", "#ff3e3e");
      return;
    }

    if (newPassword !== confirmPassword) {
      $psMessage.text("Confirm Passwords don't match");
      $psMessage.css("color", "#ff3e3e");
      return;
    }

    let old_password = $("#old-password").val();
    let password = $("#password").val();
    let email = $("#email").val();


    // Create a FormData object
    let formData = new FormData();
    formData.append("old_password", old_password);
    formData.append("password", password);
    formData.append("email", email);

    // Make the AJAX request
    $.ajax({
      url: "../../Controller/PasswordController.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "text",
      success: function (data) {
        console.log(data);
        // Reload the page
        location.reload();
      },
      error: function (err) {
        console.log(err);
        alert("Error occurred during submission.");
      },
    });
  });

  /* ............
     ............
     End HPP Code */
});
