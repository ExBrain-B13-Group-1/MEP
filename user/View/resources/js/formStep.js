// *********** Use in verification.html, enrollment.html *********** 


$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/
     
  handleFileUpload("#upload-front", "#preview-image-front", "#file-name-front");
  handleFileUpload("#upload-back", "#preview-image-back", "#file-name-back");

   // Function for handling file upload (nrc front & back)
  function handleFileUpload(inputId, previewImageId, fileNameId) {
    $(inputId).on("change", function (event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          $(previewImageId).attr("src", e.target.result).removeClass("hidden");
        };
        reader.readAsDataURL(file);
        $(fileNameId).text(file.name);
      } else {
        $(previewImageId).attr("src", "#").addClass("hidden");
        $(fileNameId).text("");
      }
    });
  }

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
      console.log("got clicked");
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
