// *********** Use in finance/finance.php ***********

$(document).ready(function () {
  /* Start HPP Code 
         .............. 
         ..............*/

  // Get Current Year
  var currentYear = new Date().getFullYear();

  $("#current-year").text(currentYear);

  // Get Sample Data
  function getChartData(year) {
    var labels = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    var dataSets = {
      2024: {
        user: [65, 59, 80, 81, 56, 55, 40, 59, 80, 81, 56, 55, 40],
        institute: [28, 48, 40, 19, 86, 27, 90, 48, 40, 19, 86, 27],
      },
      2025: {
        user: [45, 79, 60, 91, 76, 65, 50, 79, 60, 91, 76, 65, 50],
        institute: [38, 58, 50, 29, 96, 37, 100, 58, 50, 29, 96, 37],
      },
    };

    var yearData = dataSets[year] || { user: [], institute: [] };

    return {
      labels: labels,
      datasets: [
        {
          label: "User",
          data: yearData.user,
          backgroundColor: "rgba(255, 206, 86, 0.2)",
          borderColor: "rgba(255, 206, 86, 1)",
          borderWidth: 1,
          fill: true,
          tension: 0.4,
        },
        {
          label: "Institute",
          data: yearData.institute,
          backgroundColor: "rgba(75, 192, 192, 0.2)",
          borderColor: "rgba(75, 192, 192, 1)",
          borderWidth: 1,
          fill: true,
          tension: 0.4,
        },
      ],
    };
  }

  var ctx = document.getElementById("financeChart").getContext("2d");

  // Finance Chart
  var financeChart = new Chart(ctx, {
    type: "line",
    data: getChartData(currentYear),
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 25,
            max: 100,
          },
        },
      },
    },
  });

  $("#prev-year").click(function () {
    currentYear--;
    updateChart();
  });

  $("#next-year").click(function () {
    currentYear++;
    updateChart();
  });

  // Update Chart Back Depends On Year
  function updateChart() {
    $("#current-year").text(currentYear);
    financeChart.data = getChartData(currentYear);
    financeChart.update();
  }

  /* ............
         ............
         End HPP Code */
});
