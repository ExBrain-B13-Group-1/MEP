// *********** Use in SignUp.html *********** 


$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/

  handleFileUpload("#upload-logo", "#preview-image-logo", "#file-name-logo");
  handleFileUpload("#upload-front", "#preview-image-front", "#file-name-front");
  handleFileUpload("#upload-back", "#preview-image-back", "#file-name-back");
  handleFileUpload(
    "#upload-license",
    "#preview-image-license",
    "#file-name-license"
  );

  // Function for handling file upload (logo, nrc front, nrc back, business license)
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

  // Can add more affiliation input
  $("#add-affiliation").on("click", function () {
    $("#affiliations-container").append(
      '<input type="text" name="affiliations[]" placeholder="Add Affiliations" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg mb-2">'
    );
  });

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

  // Function to change the step
  function goToStep(step) {
    $(".form-step").removeClass("active").addClass("hidden");
    $(`#step${step}`).removeClass("hidden").addClass("active");
    updateNextButton(step);
  }

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

  /* ............
     ............
     End HPP Code */
});
