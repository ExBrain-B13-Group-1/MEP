// *********** Use in adminDashboard.php ***********

$(document).ready(function () {
  /* Start HPP Code 
         .............. 
         ..............*/

  // Thousand Separator Format
  function formatAmount(amount) {
    return amount.toLocaleString();
  }

  // Format the numbers
  $("#total-institutes").text(formatAmount(1960));
  $("#total-users").text(formatAmount(6942));
  $("#amount").text(formatAmount(5000));
  
  // Bar Chart Fpr Weekly Visitors
  const barCtx = document.getElementById("bar-chart").getContext("2d");
  console.log(barCtx);
  new Chart(barCtx, {
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
    },
  });

  // Pie Chart For Users
  const usersPieCtx = document
    .getElementById("users-pie-chart")
    .getContext("2d");
  new Chart(usersPieCtx, {
    type: "pie",
    data: {
      labels: ["Premium", "Regular"],
      datasets: [
        {
          data: [58.9, 41.1],
          backgroundColor: ["#FF6384", "#36A2EB"],
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
    },
  });

  // Pie Chart For Institutes
  const institutesPieCtx = document
    .getElementById("institutes-pie-chart")
    .getContext("2d");
  new Chart(institutesPieCtx, {
    type: "pie",
    data: {
      labels: ["Premium", "Regular"],
      datasets: [
        {
          data: [58.9, 41.1],
          backgroundColor: ["#FF6384", "#36A2EB"],
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
    },
  });

  //Sample Data For Ad Slots
  const adSlots = [
    {
      name: "ABC Institute",
      requested: "July 5",
      month: "12 Months",
      // profileImg: '../../storages/instituteLogo.png'
    },
    {
      name: "XYZ Institute",
      requested: "July 10",
      month: "2 Months",
      // profileImg: '../../storages/instituteLogo.png'
    },
    {
      name: "DEF Institute",
      requested: "July 15",
      month: "3 Months",
      // profileImg: '../../storages/instituteLogo.png'
    },
  ];

  // Start Ad Slots
  let adSlotsContent = `
         <table class="w-full text-xs cursor-pointer">
             <thead>
                 <tr class="border-b bg-[#D9D9D9] bg-opacity-30">
                     <th class="text-left px-2">Name</th>
                     <th class="text-left">Booked</th>
                     <th class="text-left">Month</th>
                     <th class="text-left">Action</th>
                 </tr>
             </thead>
             <tbody>
     `;

  // Can Add Logo
  // <div class="w-8 h-8 rounded-full overflow-hidden">
  //     <img src="${slot.profileImg}" class="w-full h-full object-cover rounded-full">
  // </div>
  adSlots.forEach((slot) => {
    adSlotsContent += `
             <tr class="border-b hover:bg-[#D9D9D9] hover:bg-opacity-10">
                 <td class="px-2">
                     <div class="flex items-center space-x-4">
                         ${slot.name}
                     </div>
                 </td>
                 <td>${slot.requested}</td>
                 <td>${slot.month}</td>
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

  // Sample Date For Top Clients
  const clients = [
    {
      profileImg: "../../storages/instituteLogo.png",
      amount: "$1000",
      reviews: "4.5",
    },
    {
      profileImg: "../../storages/instituteLogo.png",
      amount: "$1500",
      reviews: "4.8",
    },
    {
      profileImg: "../../storages/instituteLogo.png",
      amount: "$2000",
      reviews: "5.0",
    },
    {
      profileImg: "../../storages/instituteLogo.png",
      amount: "$1800",
      reviews: "4.7",
    },
  ];

  // Start Top Client
  let tableContent = `
                  <table class="w-full table-auto cursor-pointer">
             <thead>
                 <tr class="border-b bg-[#D9D9D9] bg-opacity-30">
                     <th class="text-left px-4">Profile</th>
                     <th class="text-left px-4">Amount</th>
                     <th class="text-left px-4">Reviews</th>
                 </tr>
             </thead>
             <tbody>
             `;

  clients.forEach((client) => {
    tableContent += `
                     <tr class="border-b hover:bg-[#D9D9D9] hover:bg-opacity-10">
                         <td class="text-left px-4">
                             <div class="w-8 h-8 rounded-full overflow-hidden">
                                 <img src="${client.profileImg}" class="w-full h-full object-cover rounded-full">
                             </div>
                         </td>
                         <td class="text-left px-4">${client.amount}</td>
                         <td class="text-left px-4">${client.reviews} <ion-icon name="star" class="relative top-1 text-xl text-dark-blue"></ion-icon></td>
                     </tr>
                 `;
  });

  tableContent += `
                     </tbody>
                 </table>
             `;

  $("#top-clients").html(tableContent);
  // End Top Clients

  // Optional (Later)
  //         $('#recent-actions').html(`
  //     <ul>
  //         <li>Super Admin Login at 2024/06/30 of 12:00PM</li>
  //         <li>Super Admin Change Themes at 2024/06/29 of 1:00PM</li>
  //         <li>Content Manager Update Home Page at 2024/06/29 of 11:00AM</li>
  //     </ul>
  // `);

  // Start Calendar Section
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    events: [], // Events will be added dynamically
  });
  calendar.render();

  // Sample Data For Institute's Ad Progress
  var subscriptions = {
    1: [{ title: "Limit", start: "2024-07-01", end: "2024-07-12" }],
    2: [{ title: "Limit", start: "2024-07-01", end: "2024-07-31" }],
    3: [{ title: "Limit", start: "2024-07-15", end: "2024-07-20" }],
  };

  // Make logo a little big when got clicked
  $(".logo").on("click", function () {
    $(".logo").removeClass("active transform scale-125");
    $(this).addClass("active transform scale-125");
    var instituteId = $(this).data("institute");
    calendar.removeAllEvents();
    var instituteEvents = subscriptions[instituteId] || [];
    instituteEvents.forEach((event) => {
      calendar.addEvent(event);
    });
  });
  // End Calendar Section

  /* ............
         ............
         End HPP Code */
});
