// *********** Use in financeHistory.php ***********

$(document).ready(function () {
  /* Start HPP Code 
           .............. 
           ..............*/

  // Sample Data
  const data = [
    {
      id: "C131",
      name: "ABC Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C032",
      name: "XYZ Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "100,000",
      fee: "200,000 MMK",
    },
    {
      id: "C103",
      name: "DEF Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C134",
      name: "UIV Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "30,000",
      fee: "150,000 MMK",
    },
    {
      id: "C135",
      name: "ABC Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C036",
      name: "XYZ Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "100,000",
      fee: "200,000 MMK",
    },
    {
      id: "C107",
      name: "DEF Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C138",
      name: "UIV Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "30,000",
      fee: "150,000 MMK",
    },
    {
      id: "C139",
      name: "ABC Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C030",
      name: "XYZ Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "100,000",
      fee: "200,000 MMK",
    },
    {
      id: "C111",
      name: "DEF Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C122",
      name: "UIV Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "30,000",
      fee: "150,000 MMK",
    },
    {
      id: "C133",
      name: "ABC Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C044",
      name: "XYZ Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "100,000",
      fee: "200,000 MMK",
    },
    {
      id: "C105",
      name: "DEF Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "50,000",
      fee: "100,000 MMK",
    },
    {
      id: "C130",
      name: "UIV Institute",
      logo: "../../storages/instituteLogo.png",
      date: "21/6/2024",
      coin: "30,000",
      fee: "150,000 MMK",
    },
  ];

  const ROWPERPAGE = 5;
  let currentPage = 1;
  const totalPages = Math.ceil(data.length / ROWPERPAGE);

  //   Function for rendering table rows
  function renderTable(data, page) {
    const tbody = $("#table-body");
    tbody.empty();
    const start = (page - 1) * ROWPERPAGE;
    const end = start + ROWPERPAGE;
    const paginatedData = data.slice(start, end);
    paginatedData.forEach((row) => {
      const tr = `
                           <tr class="border-b border-gray-200 hover:bg-gray-100 cursor-pointer" data-id="${row.id}">
                               <td class="py-3 px-6">${row.id}</td>
                               <td class="py-3 px-6">${row.name}</td>
                               <td class="py-3 px-6">${row.date}</td>
                               <td class="py-3 px-6">${row.coin}</td>
                               <td class="py-3 px-6">${row.fee}</td>
                               <td class="py-3 px-6 text-blue-500">View</td>
                           </tr>
                       `;
      tbody.append(tr);
    });
  }

  // Function for rendering pagination
  function renderPagination(totalPages, currentPage) {
    const pagination = $("#pagination");
    pagination.empty();

    // Add Previous Button
    if (currentPage > 1) {
      pagination.append(
        '<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray rounded-l" data-page="' +
          (currentPage - 1) +
          '"><ion-icon name="chevron-back-outline"></ion-icon></a></li>'
      );
    }

    // Add Page Numbers
    for (let i = 1; i <= totalPages; i++) {
      const activeClass =
        i === currentPage
          ? "text-blue-600 border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700"
          : "text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray";
      pagination.append(
        `<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight border ${activeClass}" data-page="${i}">${i}</a></li>`
      );
    }

    // Add Next Button
    if (currentPage < totalPages) {
      pagination.append(
        '<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray rounded-r" data-page="' +
          (currentPage + 1) +
          '"><ion-icon name="chevron-forward-outline"></ion-icon></a></li>'
      );
    }
  }

  renderTable(data, currentPage);
  renderPagination(totalPages, currentPage);

  // Pagination changes on clicking
  $("#pagination").on("click", "a", function (e) {
    e.preventDefault();
    currentPage = $(this).data("page");
    renderTable(data, currentPage);
    renderPagination(totalPages, currentPage);
  });

  // Row Details View
  $("#table-body").on("click", "tr", function () {
    const id = $(this).data("id");
    const row = data.find((item) => item.id === id);
    const detailView = $("#detail-view");
    detailView.html(`
                   <div class="relative">
                       <button id="close-detail" class="text-2xl absolute -right-6 -top-2"><ion-icon name="close-outline"></ion-icon></button>
                      <div class="flex justify-start items-center space-x-4 mb-2">
                        <div>
                         <img class="w-16 h-16 rounded-full" src="${row.logo}">
                        </div>
                        <div>
                           <div class="font-bold">${row.name}</div>
                           <div>Coin: ${row.coin}</div>
                        </div>
                      </div>
                       <div class="text-[#A82525] text-sm mb-1 font-semibold">Contact Information</div>
                       <div class="text-xs flex items-center space-x-1"><ion-icon name="mail-outline"></ion-icon><span class="text-primary-main">example@mail.com</span></div>
                       <div class="text-xs flex items-center space-x-1"><ion-icon name="call-outline"></ion-icon><span class="text-primary-main">+95 976XXXXXX</span></div>
                       <div class="text-xs flex items-center space-x-1"><ion-icon name="logo-linkedin"></ion-icon><span class="text-primary-main">https://linkedin</span></div>
                       <div class="text-[#A82525] text-sm mt-4 mb-1 font-semibold">Bill Invoice Detail</div>
                       <div class="text-sm">Customer ID: 12343123DBER23</div>
                       <div class="text-sm">Invoice ID: 10,000</div>
                       <div class="text-sm">Coin Amount: ${row.coin}</div>
                       <div class="text-sm">Date: 06/07/2024</div>
                       <div class="text-sm">Time: 12:30 PM</div>
                   </div>
                   `);
    detailView.removeClass("hidden");
  });

  // Close Back
  $("#detail-view").on("click", "#close-detail", function () {
    $("#detail-view").addClass("hidden");
  });

  /* ............
           ............
           End HPP Code */
});
