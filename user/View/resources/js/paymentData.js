// *********** Use in enrollment.html ***********

// Sample Data
const paymentData = {
  kpay: {
    logo: "../../../storages/payment/kpay.png",
    qr: "../../../storages/payment/kpayQr.svg",
  },
  wavepay: {
    logo: "../../../storages/payment/wavepay.jpg",
    qr: "../../../storages/payment/wavepayQr.svg",
  },
};

$(document).ready(function () {
  /* .................
   .................
   End HPP CSS Code*/
   
   // Handling Payment Plan Changing
  $("#payment-plan").change(function () {
    const selectedPlan = $(this).val();
    if (selectedPlan) {
      $("#payment-logo").attr("src", paymentData[selectedPlan].logo);
      $("#qr-code").attr("src", paymentData[selectedPlan].qr);
      $("#payment-details").removeClass("hidden");
    } else {
      $("#payment-details").addClass("hidden");
    }
  });

  // Function for toggling fees-type (if MMK, appear payment qr) (if not, hide)
  function togglePaymentPlan() {
    const selectedFee = $("#fees-type").val();
    if (selectedFee === "500") {
      $("#payment-plan-container, #attachment-receipt").css({
          "display": "none",
      });
  } else {
      $("#payment-plan-container, #attachment-receipt").css({
          "display": "block",
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
