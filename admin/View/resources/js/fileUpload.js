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
  setupUploadArea("upload-area-about", "file-input-about", "uploaded-image-about", "upload-text-about");
  setupUploadArea("upload-area-1", "file-input-1", "uploaded-image-1", "upload-text-1");
  setupUploadArea("upload-area-2", "file-input-2", "uploaded-image-2", "upload-text-2"); 
  setupUploadArea("upload-area-3", "file-input-3", "uploaded-image-3", "upload-text-3");
  setupUploadArea("upload-area-4", "file-input-4", "uploaded-image-4", "upload-text-4"); 
  setupUploadArea("upload-area-5", "file-input-5", "uploaded-image-5", "upload-text-5");
  setupUploadArea("upload-area-6", "file-input-6", "uploaded-image-6", "upload-text-6");
  });