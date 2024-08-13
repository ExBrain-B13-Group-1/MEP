$(document).ready(function () {
  /* Start HPP Code 
       .............. 
       ..............*/

  $("#changePs").on("click", function (e) {
    e.preventDefault();

    let oldPassword = $("#old-password").val();
    let newPassword = $("#password").val();
    let confirmPassword = $("#confirm-password").val();
    let $psMessage = $("#psMessage");

    console.log(newPassword.length)
    if (oldPassword.length === 0) {
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
