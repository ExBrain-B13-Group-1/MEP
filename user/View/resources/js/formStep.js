// *********** Use in verification.html, enrollment.html *********** 


$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/

  // For Verification Page Submit
  $("#verifyForm").submit(function (event) {
    event.preventDefault();
    goToStep(2);
  });

  // For Enrollment Page Submit
  $("#enrollForm").submit(function (event) {
    event.preventDefault();
    goToStep(2);
  });

  // Function to change the step
  function goToStep(step) {
    $(".form-step").removeClass("active").addClass("hidden");
    $(`#step${step}`).removeClass("hidden").addClass("active");
  }

  // Handling agree terms (if clicked, unlock opacity)
  $("#agree-terms").change(function () {
    if ($(this).is(":checked")) {
      $("#submit-button")
        .prop("disabled", false)
        .removeClass("opacity-50 cursor-not-allowed")
        .addClass("hover:bg-opacity-90");
    } else {
      $("#submit-button")
        .prop("disabled", true)
        .addClass("opacity-50 cursor-not-allowed")
        .removeClass("hover:bg-opacity-90");
    }
  });

  /* ............
     ............
     End HPP Code */
});
