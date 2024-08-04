// *********** Use in page.php ***********

$(document).ready(function () {
  /* Start HPP Code 
         .............. 
         ..............*/

  // Initial show home content
  $("#home-content").show();
  //  Handling Tabs (Home, About Us, Service, Payment)
  $(".tab-button").click(function () {
    $(".tab-button")
      .removeClass("bg-dark-blue text-white")
      .addClass("text-gray-700");
    $(this).removeClass("text-gray-700").addClass("bg-dark-blue text-white");
    $(".tab-content").hide();
    if ($(this).text() === "Home") {
      $("#home-content").show();
    } else if ($(this).text() === "About Us") {
      $("#about-content").show();
    } else if ($(this).text() === "Service") {
      $("#service-content").show();
    } else {
      $("#payment-content").show();
    }
  });

  // Sample Banking & Pay Data
  const bankingData = [
    {
      bankLogo: "../../storages/payment/kbz.png",
      qrCode: "../../storages/payment/kbzQr.svg",
      accountNumber: "1234567890102",
    },
    {
      bankLogo: "../../storages/payment/cb.png",
      qrCode: "../../storages/payment/cbQr.svg",
      accountNumber: "9876543210123",
    },
    {
      bankLogo: "../../storages/payment/kbz.png",
      qrCode: "../../storages/payment/kbzQr.svg",
      accountNumber: "4567891234567",
    },
  ];

  const payData = [
    {
      payLogo: "../../storages/payment/kpay.png",
      qrCode: "../../storages/payment/kpayQr.svg",
      phNumber: "09475493303",
    },
    {
      payLogo: "../../storages/payment/wavepay.jpg",
      qrCode: "../../storages/payment/wavepayQr.svg",
      phNumber: "09475949432",
    },
    {
      payLogo: "../../storages/payment/kpay.png",
      qrCode: "../../storages/payment/kpayQr.svg",
      phNumber: "09768947382",
    },
  ];

  // Event listeners for add buttons
  $("#addButtonBanking").on("click", function () {
    $("#addBankModal").removeClass("hidden");
  });

  $("#addButtonPay").on("click", function () {
    $("#addPayModal").removeClass("hidden");
  });

  $("#closeBankAddModal").on("click", function () {
    $("#addBankModal").addClass("hidden");
  });

  $("#closePayAddModal").on("click", function () {
    $("#addPayModal").addClass("hidden");
  });

  let currentForm = null;

  // Save Changes button click
  $(document).on("click", ".save-pay", function () {
    currentForm = $(this).closest("form");
    $("#confirmModal").removeClass("hidden");
  });

  $("#cancelConfirm").on("click", function () {
    $("#confirmModal").addClass("hidden");
  });

  $("#confirmChanges").on("click", function () {
    // To Handle Confirmation Data
    $("#confirmModal").addClass("hidden");
    if (currentForm) {
      // Hide the modal
      $("#confirmModal").addClass("hidden");
      // Submit the current form
      currentForm.submit();
      alert("Changes have been confirmed!");
    }
  });

  /* ............
         ............
         End HPP Code */
});
