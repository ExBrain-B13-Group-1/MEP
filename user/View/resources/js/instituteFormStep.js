// *********** Use in SignUp.html ***********

$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/

  handleFileUpload("#upload-logo", "#preview-image-logo", "#file-name-logo");
  handleFileUpload("#upload-slider", "#preview-image-slider", "#file-name-slider");

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
        // $("#loadingSpinner").show();
        // $("#page").hide();

        let name = $("#institute-name").val();
        let email = $("#institute-email").val();
        let type_id = $("#institute-type").val();
        let contact = $("#institute-contact").val();
        let address = $("#institute-address").val();
        let state = $("#state-region").val();
        let city = $("#city").val();
        let website = $("#website-link").val();
        let social = $("#social-links").val();

        let f_name = $("#founder-name").val();
        let f_email = $("#founder-email").val();
        let f_contact = $("#founder-contact").val();

        // Append file data
        let photo = $("#file-input-logo")[0].files[0];
        let slider = $("#file-input-slider")[0].files[0];
        let nrc_front = $("#file-input-front")[0].files[0];
        let nrc_back = $("#file-input-back")[0].files[0];

        // Create a FormData object
        let formData = new FormData();
        formData.append("name", name);
        formData.append("email", email);
        formData.append("type_id", type_id);
        formData.append("contact", contact);
        formData.append("address", address);
        formData.append("state", state);
        formData.append("city", city);
        formData.append("website", website);
        formData.append("social", social);

        formData.append("f_name", f_name);
        formData.append("f_email", f_email);
        formData.append("f_contact", f_contact);

        formData.append("photo", photo);
        formData.append("slider", slider);
        formData.append("nrc_front", nrc_front);      
        formData.append("nrc_back", nrc_back);

        $.ajax({
          url: "../../../Controller/InstituteRegisterController.php",
          type: "POST",
          data: formData,
          processData: false, 
          contentType: false, 
          dataType: "text", 
          success: function (data) {
            console.log(data);
            goToStep(3);
          },
          error: function () {
            alert("An unexpected error occurred. Please try again.");
          },
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
