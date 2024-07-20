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

  // Create Banking Card
  const generateBankingCard = (data) => {
    return `
             <div class="space-y-2 bg-white dark:bg-gray-600 shadow-md rounded-lg overflow-hidden my-4 p-3">
                 <div class="px-2 bg-thin-bg relative">
                     <div class="w-full h-24">
                         <img src="${data.bankLogo}" alt="Bank Logo">
                     </div>
                     <div class="absolute top-2 right-3">
                         <img src="${data.qrCode}" alt="QR Code" class="w-8 h-8">
                     </div>
                 </div>
                 <div>
                     <label for="account-number" class="block font-medium text-gray-700 dark:text-white/90">Account Number</label>
                     <input type="text" id="account-number"
                         class="w-full p-2 border border-gray-300 dark:bg-gray-500 dark:border-gray-500 dark:text-white rounded-md text-xs focus:outline-none focus:ring-1 focus:ring-blue-light-bg"
                         value="${data.accountNumber}">
                 </div>
                 <button class="save-pay bg-dark-blue hover:bg-dark-blue/90 text-white float-right font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                     Save Changes
                 </button>
             </div>
         `;
  };

  // Create Pay Card
  const generatePayCard = (data) => {
    return `
             <div class="space-y-2 bg-white dark:bg-gray-600 shadow-md rounded-lg overflow-hidden my-4 p-3">
                 <div class="px-2 bg-thin-bg relative">
                     <div class="w-full h-24">
                         <img src="${data.payLogo}" alt="Pay Logo" class="w-20 h-20">
                     </div>
                     <div class="absolute top-2 right-3">
                         <img src="${data.qrCode}" alt="QR Code" class="w-8 h-8">
                     </div>
                 </div>
                 <div>
                     <label for="phone-number" class="block font-medium text-gray-700 dark:text-white/90">Phone Number</label>
                     <input type="text" id="phone-number"
                         class="w-full p-2 border border-gray-300 dark:bg-gray-500 dark:border-gray-500 dark:text-white rounded-md text-xs focus:outline-none focus:ring-1 focus:ring-blue-light-bg"
                         value="${data.phNumber}">
                 </div>
                 <button class="save-pay bg-dark-blue hover:bg-dark-blue/90 text-white float-right font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                     Save Changes
                 </button>
             </div>
         `;
  };

  const bankingContainer = $("#banking-container");
  const payContainer = $("#pay-container");

  bankingData.forEach((data) => {
    bankingContainer.append(generateBankingCard(data));
  });

  bankingContainer.append(`
             <div class="space-y-2 flex items-center justify-center">
                 <button id="addButtonBanking"
                     class=" w-20 h-20 border outline-dashed hover:bg-thin-hover-bg rounded-full text-lg font-bold text-dark-blue dark:text-[#9aabff]">
                     + ADD
                 </button>
             </div>
         `);

  payData.forEach((data) => {
    payContainer.append(generatePayCard(data));
  });

  payContainer.append(`
             <div class="space-y-2 flex items-center justify-center">
                 <button id="addButtonPay"
                     class=" w-20 h-20 border outline-dashed hover:bg-thin-hover-bg rounded-full text-lg font-bold text-dark-blue dark:text-[#9aabff]">
                     + ADD
                 </button>
             </div>
         `);

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

  // Save Changes button click 
  $(document).on("click", ".save-pay", function () {
    $("#confirmModal").removeClass("hidden");
  });

  $("#cancelConfirm").on("click", function () {
    $("#confirmModal").addClass("hidden");
  });

  $("#confirmChanges").on("click", function () {
    // To Handle Confirmation Data
    $("#confirmModal").addClass("hidden");
    alert("Changes have been confirmed!");
  });

  /* ............
         ............
         End HPP Code */
});
