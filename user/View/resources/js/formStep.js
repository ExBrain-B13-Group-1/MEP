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

  // For Verification
  $("#age").on("input", function () {
    let value = $(this).val();
    console.log(value);
    if (isNaN(value) || value < 5 || value > 90) {
      $(this)
        .get(0)
        .setCustomValidity("Please enter a number between 5 and 90.");
    } else {
      $(this).get(0).setCustomValidity("");
    }
  });

  $("#submit-button").on("click", function (e) {
    e.preventDefault(); 

    function validateForm() {
        let isValid = true;
        
        // Check if all required text inputs have values
        $("input[required]").each(function() {
            if ($.trim($(this).val()) === '') {
                isValid = false;
                $(this).addClass('border-red-500'); 
            } else {
                $(this).removeClass('border-red-500');
            }
        });
        
        // Check if at least one gender radio button is selected
        if (!$('input[name="gender"]:checked').val()) {
            isValid = false;
            $("#gender").addClass('border-red-500'); 
        } else {
            $("#gender").removeClass('border-red-500');
        }

        // Check if files are selected
        let nrc_front = $("#file-input-front")[0].files[0];
        let nrc_back = $("#file-input-back")[0].files[0];
        if (!nrc_front || !nrc_back) {
            isValid = false;
            // Optionally add error styling or messages for file inputs
            $("#upload-area-front, #upload-area-back").addClass('border-red-500');
        } else {
            $("#upload-area-front, #upload-area-back").removeClass('border-red-500');
        }

        return isValid;
    }

    // Perform validation
    if (validateForm()) {
        let username = $("#user-name").val();
        let email = $("#user-email").val();
        let age = $("#age").val();
        let contact = $("#contact").val();
        let gender = $('input[name="gender"]:checked').val();

        // Append file data
        let nrc_front = $("#file-input-front")[0].files[0];
        let nrc_back = $("#file-input-back")[0].files[0];

        // Create a FormData object
        let formData = new FormData();
        formData.append("name", username);
        formData.append("email", email);
        formData.append("age", age);
        formData.append("contact", contact);
        formData.append("gender", gender);
        if (nrc_front) {
            formData.append("nrc_front", nrc_front);
        }
        if (nrc_back) {
            formData.append("nrc_back", nrc_back);
        }

        // Make the AJAX request
        $.ajax({
            url: "../../../Controller/VerifyController.php", 
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            dataType: "text", 
            success: function (data) {
                console.log(data);
                goToStep(2);
            },
            error: function (err) {
                console.log(err);
                alert("Error occurred during submission.");
            },
        });
    } else {
        alert("Please fill out all required fields and upload both NRC images.");
    }
});


  /* ............
     ............
     End HPP Code */
});
