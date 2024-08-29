function toggleSwiperClass() {
    const swiperContainer = document.querySelector(".swiper-container");
    if (window.innerWidth < 768) {
        swiperContainer.classList.add("mySwiper");
    } else {
        swiperContainer.classList.remove("mySwiper");
    }
}

window.addEventListener("resize", toggleSwiperClass);
window.addEventListener("load", toggleSwiperClass);

var swiper;
function initSwiper() {
    if (window.innerWidth < 768) {
        swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true, // Disable slide shadows to see if it helps
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }
}

window.addEventListener("resize", function () {
    if (swiper) swiper.destroy(true, true);
    initSwiper();
});

window.addEventListener("load", initSwiper);

// console.log("hay");

$(document).ready(function () {

    $('#join-now-btn, #get-started-btn').on("click", () => {
        window.location.href = "http://localhost/MEP/user/View/resources/Auth/login.php";
    });

      // Handle dropdown price item click
  $("#dropdown-menu a").on("click", function () {
    var type = $(this).data("type");

    // Toggle visibility based on type
    if (type === "user") {
      $(".swiper-container").eq(0).removeClass("hidden");
      $(".swiper-container").eq(1).addClass("hidden");
      $("#personal-dropdown")
        .contents()
        .filter(function () {
          return this.nodeType === 3;
        })
        .first()
        .replaceWith("Personal");
    } else if (type === "institute") {
      $(".swiper-container").eq(1).removeClass("hidden");
      $(".swiper-container").eq(0).addClass("hidden");
      $("#personal-dropdown")
        .contents()
        .filter(function () {
          return this.nodeType === 3;
        })
        .first()
        .replaceWith("Institute");
    }
  });

  // Function to show the pop-up modal
  function showModal(title, description) {
    $("#modalTitle").text(title);
    $("#modalDescription").text(description);
    $("#modalBackdrop").fadeIn();
    $("#pricingModal").fadeIn();
  }

  // Function to close the pop-up modal
  function closeModal() {
    $("#modalBackdrop").fadeOut();
    $("#pricingModal").fadeOut();
  }

  // Event listener for Pro button
  $(".pro-button").on("click", function () {
    const title = "Upgrade to Pro";
    const description =
      "Get the Pro package for 50,000 MMK. Enjoy additional features like receiving 1000 points each month, unlimited consultations, and more.";
    showModal(title, description);
  });

  // Event listener for Buy 500 Coins button
  $(".coins-button").on("click", function () {
    const title = "Buy 30 Coins (User)";
    const description =
      "Buy 30 Coins for 25,000 MMK. Use these coins for events, enrollments, and more. Let's enroll many classes with handy coins.";
    showModal(title, description);
  });

  // Event listener for the close button
  $("#closeModal, #cancelButton").on("click", function () {
    closeModal();
  });

  // Optional: Event listener for the buy button
  $("#confirmButton").on("click", function () {
    let title = $("#modalTitle").text();

    let label;
    switch (title) {
      case "Upgrade to Pro":
        label = "Pro";
        break;
      case "Buy 30 Coins (User)":
        label = "For 30 Coins (User)";
        break;
      default:
        label = "Unknown";
        break;
    }
    // Get the selected payment plan value inside the click event
    let selectedOption = $("#payment-plan").val();

    // Initialize variables to hold the IDs
    let bankId = null;
    let payId = null;

    // Check if the selected option is a bank or pay and extract the ID
    if (selectedOption.startsWith("bank:")) {
      bankId = selectedOption.split(":")[1];
    } else if (selectedOption.startsWith("pay:")) {
      payId = selectedOption.split(":")[1];
    }
    // Log the results for testing
    // console.log("Bank ID:", bankId);
    // console.log("Pay ID:", payId);

    // Create a FormData object
    let formData = new FormData();

    formData.append("label", label);
    // Append the appropriate ID to the FormData object
    if (bankId) {
      formData.append("banking_id", bankId);
    } else if (payId) {
      formData.append("pay_id", payId);
    }

    // Make the AJAX request
    $.ajax({
      url: "../../Controller/PlanPaymentController.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "text",
      success: function (data) {
        console.log(data);
        // Reload the page
        location.reload();
      },
      error: function (err) {
        console.log(err);
        alert("Error occurred during submission.");
      },
    });
    // alert("Proceeding to payment...");
    // Add payment handling logic here
    closeModal();
  });

});