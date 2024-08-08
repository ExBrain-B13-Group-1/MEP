$(document).ready(function () {
    // Function to handle all upload areas dynamically
    function setupUploadArea(areaId, inputId, imageId, textId) {
      const uploadArea = $(`#${areaId}`);
      const fileInput = $(`#${inputId}`);
      const uploadedImage = $(`#${imageId}`);
      const uploadText = $(`#${textId}`);
      
      uploadArea.on("click", function (event) {
        console.log("Upload area clicked.");
        // Prevent the recursive click event
        if (event.target.id !== inputId) {
          fileInput.trigger("click");
        }
      });

      fileInput.on("change", function (event) {
        const file = event.target.files[0];
        console.log("File selected:", file);
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            uploadedImage.attr("src", e.target.result).show();
            uploadText.hide();
          };
          reader.readAsDataURL(file);
        }
      });

      uploadArea.on("dragover", function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).addClass("border-blue-500");
      });

      uploadArea.on("dragleave", function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).removeClass("border-blue-500");
      });

      uploadArea.on("drop", function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).removeClass("border-blue-500");
        const file = event.originalEvent.dataTransfer.files[0];
        console.log("File dropped:", file);
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
  // Initialize all upload areas
  setupUploadArea("upload-area-front", "file-input-front", "uploaded-image-front", "upload-text-front");
  setupUploadArea("upload-area-back", "file-input-back", "uploaded-image-back", "upload-text-back");
  setupUploadArea("upload-area-business", "file-input-business", "uploaded-image-business", "upload-text-business");
  });