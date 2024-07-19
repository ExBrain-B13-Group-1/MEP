$(document).ready(function () {
  // Sample Data
  const notifications = [
    {
      id: 1,
      logo: "../../storages/instituteLogo.png",
      name: "ABC Institute",
      action: "Enrolled Successful",
      class: "Javascript For Beginner",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 4.5,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "Just now",
      isRead: true,
    },
    {
      id: 2,
      logo: "../../storages/instituteLogo.png",
      name: "XYZ Institute",
      action: "Enrolled Successful",
      class: "React For Beginner",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Jane Smith",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 5,
      startDate: "12/8/2024",
      endDate: "25/12/2024",
      fees: "500 Coins",
      payWith: "",
      time: "35 mins ago",
      isRead: false,
    },
    {
      id: 3,
      logo: "../../storages/instituteLogo.png",
      name: "ABC Institute",
      action: "Enrolled Successful",
      class: "Javascript For Beginner",
      classPhoto: "../../../storage/classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../../storage/user1.jpg",
      instructorRating: 3,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "Just now",
      isRead: true,
    },
    {
      id: 4,
      logo: "../../storages/instituteLogo.png",
      name: "ABC Institute",
      action: "Enrolled Successful",
      class: "Javascript For Beginner",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 3,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "Just now",
      isRead: true,
    },
    {
      id: 5,
      logo: "../../storages/instituteLogo.png",
      name: "ABC Institute",
      action: "Enrolled Successful",
      class: "Javascript For Beginner",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 3,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "Just now",
      isRead: true,
    },
    {
      id: 6,
      logo: "../../storages/instituteLogo.png",
      name: "ABC Institute",
      action: "Enrolled Successful",
      class: "Javascript For Beginner",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 3,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "Just now",
      isRead: true,
    },
    {
      id: 7,
      logo: "../../storages/instituteLogo.png",
      name: "ABC Institute",
      action: "Enrolled Successful",
      class: "Javascript For Beginner",
      classPhoto: "../../storages//classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../storages//user1.jpg",
      instructorRating: 3,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "Just now",
      isRead: true,
    },
  ];

    // Tab handling
  $(".tab-button").click(function () {
    $(".tab-button")
      .removeClass("bg-[#4460EF] text-white")
      .addClass("text-gray-700");
    $(this).removeClass("text-gray-700").addClass("bg-[#4460EF] text-white");
    $(".tab-content").hide();
    if ($(this).text() === "All") {
      $("#all-content").show();
    } else if ($(this).text() === "Read") {
      $("#read-content").show();
    } else {
      $("#unread-content").show();
    }
  });

  // Initial render for All tab
  renderNotifications("#notification-list", () => true);
  renderNotifications("#read-list", (notification) => notification.isRead);
  renderNotifications("#unread-list", (notification) => !notification.isRead);

   // Show All content by default
  $("#all-content").show();

    // Function to render notifications
  function renderNotifications(listId, filterFn) {
    $(listId).empty();
    notifications.filter(filterFn).forEach((notification) => {
      const notificationHtml = `
                <div class="relative" data-notification-id="${notification.id}">
                    ${
                      notification.isRead
                        ? ""
                        : `<div class="w-2 h-2 bg-red-600 rounded-full absolute top-8 -left-3"></div>`
                    }
                    <div class="flex items-center justify-between py-4 border-b">
                        <div class="flex">
                            <div class="flex-shrink-0 relative">
                                <img src="${
                                  notification.logo
                                }" alt="Institute Logo" class="w-10 h-10 rounded-full">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-semibold">${
                                  notification.name
                                }</p>
                                <p class="text-xs text-green-700">${
                                  notification.action
                                }</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500 mb-1">${
                              notification.time
                            }</p>
                        </div>
                    </div>
                </div>
            `;
      $(listId).append(notificationHtml);
    });
  }

    // Handling click on details enrollment
  $(document).on("click", "[data-notification-id]", function () {
    const notificationId = $(this).data("notification-id");
    const notification = notifications.find(
      (notif) => notif.id === notificationId
    );

    $("#details-header").html(`
            <img src="${notification.logo}" alt="Avatar" class="w-10 h-10 rounded-full">
            <div class="ml-3">
                <p  class="text-lg font-semibold">${notification.name}</p>
                <p class="text-sm text-gray-500">Details</p>
            </div>
        `);

    $("#details").html(`
            <div class="p-4 bg-white rounded-lg shadow-md">
                <div class="mb-6">
                  <img src="${notification.classPhoto}" >
                </div>
                <div class="flex items-center mb-4">
                    <img src="${
                      notification.instructorPhoto
                    }" alt="Instructor Photo" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <p class="text-lg font-semibold">${
                          notification.class
                        }</p>
                        <p class="text-sm text-gray-500">Instructor: ${
                          notification.instructor
                        }</p>
                    </div>
                </div>
                <div class="my-4 flex items-center">
                   <p class="text-sm text-gray-600"><strong>Instructor Rating:</strong></p>
                    <div class="ml-2 flex">
                          ${Array(Math.floor(notification.instructorRating))
                            .fill(
                              '<ion-icon name="star" class="text-yellow-400"></ion-icon>'
                            )
                            .join("")}
                          ${
                            notification.instructorRating % 1 !== 0
                              ? '<ion-icon name="star-half" class="text-yellow-400"></ion-icon>'
                              : ""
                          }
                          ${Array(Math.floor(5 - notification.instructorRating))
                            .fill(
                              '<ion-icon name="star-outline" class="text-yellow-400"></ion-icon>'
                            )
                            .join("")}
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600 mb-2"><strong>Start Date:</strong> ${
                          notification.startDate
                        }</p>
                        <p class="text-sm text-gray-600 mb-2"><strong>End Date:</strong> ${
                          notification.endDate
                        }</p>
                    </div>
                  <div>
                        <p class="text-sm text-gray-600 mb-2"><strong>Fees:</strong> ${
                          notification.fees
                        }</p>
                        <p class="text-sm text-gray-600 mb-2"><strong>Paid With:</strong> ${
                          notification.fees.includes("Coin")
                            ? "Coin"
                            : notification.payWith
                        }</p>
                  </div>

                </div>
              
            </div>
        `);

        // For Mobile View Handling
    if ($(window).width() < 768) {
      $("#left-side").addClass("hidden");
      $("#right-side").removeClass("hidden");

      $("#back-button").on("click", function () {
        $("#right-side").addClass("hidden");
        $("#left-side").removeClass("hidden");
      });
    }

    notification.isRead = true;
    $(this).find(".bg-red-600").remove();
    renderNotifications("#notification-list", () => true);
    renderNotifications("#read-list", (notification) => notification.isRead);
    renderNotifications("#unread-list", (notification) => !notification.isRead);
  });
});
