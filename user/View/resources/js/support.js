$(document).ready(function () {
  // Initial display setup
  $(".tab-content").hide();
  $("#faq-content").show();

  // Tab handling
  $(".tab-button").click(function () {
    $(".tab-button")
      .removeClass("bg-[#4460EF] text-white")
      .addClass("bg-white text-[#4460EF]");
    $(this)
      .removeClass("bg-white text-[#4460EF]")
      .addClass("bg-[#4460EF] text-white");

    $(".tab-content").hide();
    const selectedTab = $(this).data("tab");
    $(`#${selectedTab}-content`).show();
  });

  // Accordion faq
  $(".accordion-button").click(function () {
    var content = $(this).next(".accordion-content");
    var icon = $(this).find(".icon");
    content.slideToggle({
      complete: function () {
        icon.text(content.is(":visible") ? "-" : "+");
      },
    });
  });

  $("#upload-area").on("click", function (event) {
    console.log("Upload area clicked.");
    // Prevent the recursive click event
    if (event.target.id !== "file-input") {
      $("#file-input").trigger("click");
    }
  });

  $("#file-input").on("change", function (event) {
    const file = event.target.files[0];
    console.log("File selected:", file);
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $("#uploaded-image").attr("src", e.target.result).show();
        $("#upload-text").hide();
      };
      reader.readAsDataURL(file);
    }
  });

  $("#upload-area").on("dragover", function (event) {
    event.preventDefault();
    event.stopPropagation();
    $(this).addClass("border-blue-500");
  });

  $("#upload-area").on("dragleave", function (event) {
    event.preventDefault();
    event.stopPropagation();
    $(this).removeClass("border-blue-500");
  });

  $("#upload-area").on("drop", function (event) {
    event.preventDefault();
    event.stopPropagation();
    $(this).removeClass("border-blue-500");
    const file = event.originalEvent.dataTransfer.files[0];
    console.log("File dropped:", file);
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $("#uploaded-image").attr("src", e.target.result).show();
        $("#upload-text").hide();
      };
      reader.readAsDataURL(file);
    }
  });

  $("#send-message").on("click", function (e) {
    e.preventDefault();

    let email = $("#email").val();
    let comment = $("#comment").val();
    let errImage = $("#errImage")[0].files[0];

    // Create a FormData object
    let formData = new FormData();
    formData.append("email", email);
    formData.append("comment", comment);
    formData.append("errImage", errImage);

    // Make the AJAX request
    $.ajax({
      url: "../../Controller/SupportController.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "text",
      success: function (data) {
        console.log(data);
      },
      error: function (err) {
        console.log(err);
        alert("Error occurred during submission.");
      },
    });
  });
});
