$(document).ready(function () {
  // Function to handle upload areas dynamically
  function setupUploadArea(areaId, inputId, imageId, textId, isSlider = false, minWidth = 0, minHeight = 0) {
      const uploadArea = $(`#${areaId}`);
      const fileInput = $(`#${inputId}`);
      const uploadedImage = $(`#${imageId}`);
      const uploadText = $(`#${textId}`);

      uploadArea.on("click", function (event) {
          console.log("Upload area clicked.");
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
                  if (isSlider) {
                      const image = new Image();
                      image.src = e.target.result;
                      image.onload = function () {
                          if (image.width < minWidth || image.height < minHeight) {
                              alert(`Please upload an image with a minimum size of ${minWidth}x${minHeight} pixels.`);
                              fileInput.val(''); // Clear the input
                              uploadedImage.hide();
                              uploadText.show();
                          } else {
                              uploadedImage.attr("src", e.target.result).show();
                              uploadText.hide();
                          }
                      };
                  } else {
                      uploadedImage.attr("src", e.target.result).show();
                      uploadText.hide();
                  }
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
                  if (isSlider) {
                      const image = new Image();
                      image.src = e.target.result;
                      image.onload = function () {
                          if (image.width < minWidth || image.height < minHeight) {
                              alert(`Please upload an image with a minimum size of ${minWidth}x${minHeight} pixels. We do not allow below that those range!`);
                              fileInput.val(''); 
                              uploadedImage.hide();
                              uploadText.show();
                          } else {
                              uploadedImage.attr("src", e.target.result).show();
                              uploadText.hide();
                          }
                      };
                  } else {
                      uploadedImage.attr("src", e.target.result).show();
                      uploadText.hide();
                  }
              };
              reader.readAsDataURL(file);
          }
      });
  }

  // Initialize all upload areas
  setupUploadArea("upload-area-logo", "file-input-logo", "uploaded-image-logo", "upload-text-logo");
  setupUploadArea("upload-area-slider", "file-input-slider", "uploaded-image-slider", "upload-text-slider", true, 1800, 1000); // Example: slider image minimum 1920x1080
  setupUploadArea("upload-area-front", "file-input-front", "uploaded-image-front", "upload-text-front");
  setupUploadArea("upload-area-back", "file-input-back", "uploaded-image-back", "upload-text-back");
  setupUploadArea("upload-area-photo", "file-input-photo", "uploaded-image-photo", "upload-text-photo");
});
