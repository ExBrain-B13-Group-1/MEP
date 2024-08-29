// *********** Use in enrollment.html ***********

// Sample Data
// const paymentData = {
//   kpay: {
//     logo: "../../../storages/payment/kpay.png",
//     qr: "../../../storages/payment/kpayQr.svg",
//   },
//   wavepay: {
//     logo: "../../../storages/payment/wavepay.jpg",
//     qr: "../../../storages/payment/wavepayQr.svg",
//   },
// };

$(document).ready(function () {
  $("#payment-plan").val(defaultValue);
  updatePaymentDetails(defaultValue);

  // Update details on change
  $("#payment-plan").change(function () {
    const selectedValue = $(this).val();
    updatePaymentDetails(selectedValue);
  });

  function updatePaymentDetails(value) {
    if (paymentData[value]) {
      const data = paymentData[value];
      $("#payment-logo").attr("src", data.image);
      $("#qr-code").attr("src", data.qr_code);
      $("#payment-info").text(data.details);
      $("#payment-details").removeClass("hidden");
    } else {
      $("#payment-details").addClass("hidden");
    }
  }

  // Function for toggling fees-type (if MMK, appear payment qr) (if not, hide)
  function togglePaymentPlan() {
    const selectedFee = $("#fees-type").val();
    // console.log(selectedFee);
    if (selectedFee.includes("Coins")) {
      $("#payment-plan-container, #attachment-receipt").css({
        display: "none",
      });
    } else {
      $("#payment-plan-container, #attachment-receipt").css({
        display: "block",
      });
    }
  }

  // Initial check
  togglePaymentPlan();

  // Listen for changes in the fees dropdown
  $("#fees-type").on("change", function () {
    togglePaymentPlan();
  });

  /* ............
     ............
     End HPP Code */
});
