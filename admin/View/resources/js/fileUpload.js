$(document).ready(function () {
  // Initialize all upload areas
  setupUploadArea(
    "upload-area-about",
    "file-input-about",
    "uploaded-image-about",
    "upload-text-about"
  );

  // Function to handle all upload areas dynamically
  function setupUploadArea(areaId, inputId, imageId, textId) {
    const uploadArea = $(`#${areaId}`);
    const fileInput = $(`#${inputId}`);
    const uploadedImage = $(`#${imageId}`);
    const uploadText = $(`#${textId}`);

    // Handle click to open file dialog
    uploadArea.on("click", function (event) {
      if (event.target.id !== inputId) {
        fileInput.trigger("click");
      }
    });

    // Handle file input change (file selected)
    fileInput.on("change", function (event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          uploadedImage.attr("src", e.target.result).show();
          uploadText.hide();
        };
        reader.readAsDataURL(file);
      }
    });

    // Handle dragover to style the drop area
    uploadArea.on("dragover", function (event) {
      event.preventDefault();
      event.stopPropagation();
      $(this).addClass("border-blue-500");
    });

    // Handle dragleave to remove the drop area styling
    uploadArea.on("dragleave", function (event) {
      event.preventDefault();
      event.stopPropagation();
      $(this).removeClass("border-blue-500");
    });

    // Handle file drop
    uploadArea.on("drop", function (event) {
      event.preventDefault();
      event.stopPropagation();
      $(this).removeClass("border-blue-500");
      const file = event.originalEvent.dataTransfer.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          uploadedImage.attr("src", e.target.result).show();
          uploadText.hide();
        };
        reader.readAsDataURL(file);
      }
    });
  }

});
