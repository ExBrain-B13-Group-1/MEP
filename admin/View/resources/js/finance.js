$(document).ready(function () {
  /* Start HPP Code 
         .............. 
         ..............*/

  // Thousand Separator Format
  // function formatAmount(amount) {
  //   return "$ " + amount.toLocaleString();
  // }

  // $("#total-income").text(formatAmount(100000000));
  // $("#income-user").text(formatAmount(100000000));
  // $("#income-institute").text(formatAmount(100000000));

  // Get Current Year
  var currentYear = new Date().getFullYear();

  $("#current-year").text(currentYear);

  $("#prev-year").click(function () {
    currentYear--;
    updateChartData();
  });

  $("#next-year").click(function () {
    currentYear++;
    updateChartData();
  });

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

  // Initialize the finance chart
  var financeChart = new Chart(ctx, {
    type: "line",
    data: getChartData(currentYear),
    options: {
      scales: {
        x: {
          ticks: {
            color: getChartTextColor(), // Text color for X-axis
          },
        },
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 25,
            max: 100,
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

  // Update the finance chart data when the year changes
  function updateChartData() {
    $("#current-year").text(currentYear);
    financeChart.data = getChartData(currentYear);
    updateChart(financeChart); // Ensure the chart is updated with the correct colors
  }

  // Update the finance chart when the theme changes
  new MutationObserver(function () {
    updateChart(financeChart);
  }).observe(document.documentElement, {
    attributes: true,
    attributeFilter: ["class"],
  });

  /* ............
         ............
         End HPP Code */
});
