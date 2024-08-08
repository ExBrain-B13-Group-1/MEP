// *********** Use in SignUp.html ***********

$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/

  handleFileUpload("#upload-logo", "#preview-image-logo", "#file-name-logo");

  // Function for handling file upload (logo)
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


  // Check if all required fields are filled out
  function validateForm(step) {
    let isValid = true;
    $(`#step${step} [required]`).each(function () {
      if ($(this).val() === "") {
        isValid = false;
        return false;
      }
    });
    return isValid;
  }

  // Update the "Next" button based on the validity of the form fields
  function updateNextButton(step) {
    // Enable the "Next" button only if the form is valid
    if (validateForm(step)) {
      $(`#next${step}`)
        .removeClass("opacity-50 cursor-not-allowed")
        .addClass("hover:bg-opacity-90")
        .prop("disabled", false);
    } else {
      $(`#next${step}`)
        .addClass("opacity-50 cursor-not-allowed")
        .removeClass("hover:bg-opacity-90")
        .prop("disabled", true);
    }
  }

  // Check the validity of the form fields when the user types or changes input
  $(document).on("input change", "#step1 input, #step1 select", function () {
    updateNextButton(1);
  });

  $(document).on("input change", "#step2 input, #step2 select", function () {
    updateNextButton(2);
  });

  $(document).on("input change", "#step3 input, #step3 select", function () {
    updateNextButton(3);
  });

  // Function to move to the next step
  $("#next1").click(function () {
    if (validateForm(1)) {
      goToStep(2);
    }
  });

  // Function to go to the previous step
  $("#prev1").click(function () {
    goToStep(1);
  });

  $("#next2").click(function () {
    if (validateForm(2)) {
      goToStep(3);
    }
  });

  $("#prev2").click(function () {
    goToStep(2);
  });

  $("#form3").submit(function (event) {
    if (validateForm(3)) {
      event.preventDefault();
      goToStep(4);
    } else {
      event.preventDefault();
      alert("Please fill out all required fields.");
    }
  });

  const form = $("#regForm");

  // Append new hidden input
  $("<input>")
    .attr({
      type: "hidden",
      name: "register",
    })
    .appendTo(form);

  const savedStep = sessionStorage.getItem("current_step") || 1;
  console.log(savedStep);

  if (savedStep == 3) {
    goToStep(3);
  }

  // Function to change the step
  function goToStep(step) {
    $(".form-step").removeClass("active").addClass("hidden");
    $(`#step${step}`).removeClass("hidden").addClass("active");

    if (step === 3) {
      if (!sessionStorage.getItem("form_submitted")) {
        console.log("finished");
        sessionStorage.setItem("form_submitted", true);
        sessionStorage.setItem("current_step", step);

        // Show loading spinner
        $("#loadingSpinner").show();
        $("#page").hide();

        $.ajax({
          url: form.attr("action"),
          type: "POST",
          data: new FormData(form[0]),
          processData: false,
          contentType: false,
          success: function (response) {
            // Parse the JSON response
            const result = JSON.parse(response);
  
            // Introduce a 3-second delay
            setTimeout(function () {
              $("#loadingSpinner").hide();
              $('#page').show();
  
              if (result.success) {
                // If the response indicates success, show step 3
                goToStep(3);
              } else {
                goToStep(1);
                // Handle error message
                alert(result.message || "An error occurred. Please try again.");
              }
            }, 3000); // 3000 milliseconds = 3 seconds
          },
          error: function () {
            $("#loadingSpinner").hide();
            $('#page').show();
            alert("An unexpected error occurred. Please try again.");
          }
        });
        return;
      } else {
        console.log("Form already submitted.");
      }
    } else {
      updateNextButton(step);
      sessionStorage.removeItem("form_submitted");
    }
  }

  $("#loadingSpinner").hide();


  // Initial check for the "Next" button on page load
  updateNextButton(1);

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

  // Handler for state/region dropdown change
  $("#state-region").change(function () {
    var stateRegionId = $(this).val();
    $("#city").empty();

    // Filter cities based on the selected state/region ID
    var filteredCity = cities.filter(function (city) {
      return city.state_region_id == stateRegionId;
    });

    // Populate city dropdown with result
    filteredCity.forEach(function (city) {
      $("#city").append(
        '<option value="' + city.id + '">' + city.name + "</option>"
      );
    });
  });

  // Removing sessions
  $("#finishButton").click(function () {
    sessionStorage.removeItem("current_step");
    sessionStorage.removeItem("form_submitted");
  });
  /* ............
     ............
     End HPP Code */
});
