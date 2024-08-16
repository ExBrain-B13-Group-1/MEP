// *********** Use in adminDashboard.php ***********

$(document).ready(function () {
  /* Start HPP Code 
         .............. 
         ..............*/

  // Thousand Separator Format
  // function formatAmount(amount) {
  //   return amount.toLocaleString();
  // }

  // // Format the numbers
  // $("#total-institutes").text(formatAmount(1960));
  // $("#total-users").text(formatAmount(6942));
  // $("#amount").text(formatAmount(5000));

  // Function to determine if dark mode is active
  function isDarkMode() {
    return $("html").hasClass("dark");
  }

  // Function to get the current text color based on the theme
  function getChartTextColor() {
    return isDarkMode() ? "white" : "black";
  }

  // Function to update chart options based on theme
  function updateChart(chart) {
    chart.options.scales.x.ticks.color = getChartTextColor();
    chart.options.scales.y.ticks.color = getChartTextColor();
    chart.options.plugins.legend.labels.color = getChartTextColor();
    chart.update();
  }

  // Initialize the bar chart
  const barCtx = $("#bar-chart")[0].getContext("2d");
  const barChart = new Chart(barCtx, {
    type: "bar",
    data: {
      labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      datasets: [
        {
          label: "Current Week",
          data: [200, 450, 300, 500, 700, 600, 400],
          backgroundColor: "rgba(54, 162, 235, 0.6)",
        },
        {
          label: "Previous Week",
          data: [150, 400, 250, 450, 650, 550, 350],
          backgroundColor: "rgba(153, 102, 255, 0.6)",
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          ticks: {
            color: getChartTextColor(), // Text color for X-axis
          },
        },
        y: {
          ticks: {
            color: getChartTextColor(), // Text color for Y-axis
          },
        },
      },
      plugins: {
        legend: {
          labels: {
            color: getChartTextColor(), // Text color for legend
          },
        },
      },
    },
  });

  // Update the bar chart when the theme changes
  new MutationObserver(function () {
    updateChart(barChart);
  }).observe(document.documentElement, {
    attributes: true,
    attributeFilter: ["class"],
  });

  // Function to initialize a pie chart with dynamic text color
  function initializePieChart(elementId, data) {
    const ctx = document.getElementById(elementId).getContext("2d");
    return new Chart(ctx, {
      type: "pie",
      data: data,
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: {
              color: getChartTextColor(), // Text color for legend
            },
          },
        },
      },
    });
  }

  /**
   * Function to categorize entities and calculate percentages
   */
  function getPieChartData(data, premiumPrices, totalCount) {
    let premiumCount = 0;

    data.forEach((item) => {
      // Convert item.payment_amount to number type
      const paymentAmount = Number(item.payment_amount);

      // Check if the payment amount is in the premiumPrices
      if (premiumPrices.includes(paymentAmount)) {
        premiumCount++;
      }
    });

    console.log("Premium Count:", premiumCount);
    const regularCount = totalCount - premiumCount;
    const premiumPercentage = (premiumCount / totalCount) * 100;
    const regularPercentage = (regularCount / totalCount) * 100;

    return {
      labels: ["Premium", "Regular"],
      datasets: [
        {
          data: [premiumPercentage, regularPercentage],
          backgroundColor: ["#FF6384", "#36A2EB"],
        },
      ],
    };
  }

  // Check if user data exists
  let usersPieData;
  if (jsonUserPays) {
    // Generate the pie chart data
    usersPieData = getPieChartData(jsonUserPays, [50000], totalUsers);
  } else {
    console.log("No data found!");
  }
  // Initialize the Users Pie Chart
  const usersPieChart = initializePieChart("users-pie-chart", usersPieData);

  // Check if institute data exists
  let institutesPieData;
  if (jsonInstitutePays) {
    // Generate the pie chart data
    institutesPieData = getPieChartData(
      jsonInstitutePays,
      [100000, 1000000],
      totalInstitutes
    );
  } else {
    console.log("No data found!");
  }
  // Initialize the Users Pie Chart
  const institutesPieChart = initializePieChart(
    "institutes-pie-chart",
    institutesPieData
  );

  // Update the pie charts when the theme changes
  new MutationObserver(function () {
    usersPieChart.options.plugins.legend.labels.color = getChartTextColor();
    institutesPieChart.options.plugins.legend.labels.color =
      getChartTextColor();
    usersPieChart.update();
    institutesPieChart.update();
  }).observe(document.documentElement, {
    attributes: true,
    attributeFilter: ["class"],
  });


  console.log(jsonInstitutePays);

  function getTopInstitutes(data, topN) {
    // Step 1: Aggregate total payments and collect name and photo by institute_id
    const paymentTotals = data.reduce((totals, item) => {
      const instituteId = item.institute_id;
      const paymentAmount = parseFloat(item.payment_amount);

      if (!totals[instituteId]) {
        totals[instituteId] = {
          total_payment: 0,
          name: item.name,
          photo: item.photo,
        };
      }
      totals[instituteId].total_payment += paymentAmount;

      return totals;
    }, {});

    // Step 2: Convert the paymentTotals object to an array of objects
    const paymentArray = Object.keys(paymentTotals).map((instituteId) => ({
      institute_id: instituteId,
      total_payment: paymentTotals[instituteId].total_payment,
      name: paymentTotals[instituteId].name,
      photo: paymentTotals[instituteId].photo,
    }));

    // Step 3: Sort the array by total_payment in descending order
    paymentArray.sort((a, b) => b.total_payment - a.total_payment);

    // Step 4: Get the top N institutes
    return paymentArray.slice(0, topN);
  }

  // Get the top institutes
  const top7Institutes = getTopInstitutes(jsonInstitutePays, 7);
  // Separate into top 4 and remaining
  const top4Institutes = top7Institutes.slice(0, 4);
  const remainingInstitutes = top7Institutes.slice(4, 7);
  console.log(top4Institutes);
  console.log(remainingInstitutes);
  // Start Top Client
  let tableContent = `
                  <table class="w-full table-auto cursor-pointer">
             <thead>
                 <tr class="border-b bg-[#D9D9D9] bg-opacity-30">
                     <th class="text-left px-4">Profile</th>
                     <th class="text-left px-4">Name</th>
                     <th class="text-left px-4">Amount</th>
                 </tr>
             </thead>
             <tbody>
             `;

             
 const baseUrl = 'http://localhost/MEP/storages/uploads/';
  top4Institutes.forEach((institute) => {
    const imageUrl = `${baseUrl}${institute.photo}`;
    tableContent += `
                     <tr class="border-b hover:bg-[#D9D9D9] hover:bg-opacity-10">
                         <td class="text-left px-4">
                             <div class="w-8 h-8 rounded-full overflow-hidden">
                                 <img src="${imageUrl}" class="w-full h-full object-cover rounded-full">
                             </div>
                         </td>
                         <td class="text-left pl-4">${institute.name}</td>
                         <td class="text-left">${
                           institute.total_payment.toLocaleString("en-US") +
                           " MMK"
                         }</td>
                     </tr>
                 `;
  });

  tableContent += `
                     </tbody>
                 </table>
             `;

  $("#top-clients").html(tableContent);
  // End Top Clients

  // Start Calendar Section
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    events: [], // Events will be added dynamically
  });
  calendar.render();

  // Assuming slots is an array of ad slot objects
  console.log(slots);

  // Make logo a little big when clicked
  $(".logo").on("click", function () {
    // Remove the 'active' class from all logos
    $(".logo").removeClass("active transform scale-125");

    // Add the 'active' class to the clicked logo
    $(this).addClass("active transform scale-125");

    // Get the institute ID from the clicked logo
    var instituteId = $(this).data("institute");

    // Remove all existing events from the calendar
    calendar.removeAllEvents();

    // Filter slots based on the selected institute ID
    var instituteEvents = slots
      .filter((slot) => slot.institute_id == instituteId)
      .map((slot) => ({
        title: "Limit", // or any other title you want to set
        start: slot.ad_start_date,
        end: slot.ad_end_date,
      }));

    // Add filtered events to the calendar
    instituteEvents.forEach((event) => {
      calendar.addEvent(event);
    });
  });

  // End Calendar Section


  // Start Ad Slots
  let adSlotsContent = `
         <table class="w-full text-xs cursor-pointer">
             <thead>
                 <tr class="border-b bg-[#D9D9D9] bg-opacity-30">
                     <th class="text-left px-2">Name</th>
                     <th class="text-left">Action</th>
                 </tr>
             </thead>
             <tbody>
     `;

  remainingInstitutes.forEach((slot) => {
    adSlotsContent += `
             <tr class="border-b hover:bg-[#D9D9D9] hover:bg-opacity-10">
                 <td class="px-2">
                     <div class="flex items-center space-x-4">
                         ${slot.name}
                     </div>
                 </td>
                 <td>
                     <button class="px-2 py-1 rounded transform transition-transform duration-200 hover:scale-110">
                         <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" class="inline mr-1" viewBox="0 0 24 24">
                             <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14L21 3m0 0l-6.5 18a.55.55 0 0 1-1 0L10 14l-7-3.5a.55.55 0 0 1 0-1z"/>
                         </svg>
                     </button>
                 </td>
             </tr>
         `;
  });

  adSlotsContent += `
             </tbody>
         </table>
     `;

  $("#upcoming-ad-slots").html(adSlotsContent);
  // End Ad Slots

  /* ............
         ............
         End HPP Code */
});
