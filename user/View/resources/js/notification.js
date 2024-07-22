$(document).ready(function () {
  // Sample Data for Classes and Events
  const classes = [
    {
      id: 1,
      logo: "../../storages/instituteLogo.png",
      name: "A Institute",
      action: "Enrolled Successful",
      class: "Javascript For Beginner",
      aboutClass:
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem soluta incidunt saepe ullam. Dolor, voluptatibus. Corporis sint ipsa odio, totam similique assumenda nihil a eum facilis excepturi, nemo aperiam eveniet.",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 4.5,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      days: "Mon, Tue, Thu, Sat",
      fromTime: "5:00 PM",
      toTime: "7:00 PM",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "Just now",
      isRead: true,
    },
    {
      id: 2,
      logo: "../../storages/instituteLogo.png",
      name: "Y Institute",
      action: "Enrolled Successful",
      class: "React For Beginner",
      aboutClass:
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem soluta incidunt saepe ullam. Dolor, voluptatibus. Corporis sint ipsa odio, totam similique assumenda nihil a eum facilis excepturi, nemo aperiam eveniet.",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Jane Smith",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 5,
      startDate: "12/8/2024",
      endDate: "25/12/2024",
      days: "Sun, Mon, Thu, Sat",
      fromTime: "3:00 PM",
      toTime: "5:00 PM",
      fees: "500 Coins",
      payWith: "",
      time: "35 mins ago",
      isRead: false,
    },
    {
      id: 3,
      logo: "../../storages/instituteLogo.png",
      name: "B Institute",
      action: "Enrolled Successful",
      class: "Javascript For Advanced",
      aboutClass:
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem soluta incidunt saepe ullam. Dolor, voluptatibus. Corporis sint ipsa odio, totam similique assumenda nihil a eum facilis excepturi, nemo aperiam eveniet.",
      classPhoto: "../../storages/classPhoto.png",
      instructor: "Matthew Davis",
      instructorPhoto: "../../storages/user1.jpg",
      instructorRating: 3,
      startDate: "12/7/2024",
      endDate: "25/12/2024",
      days: "Tue, Wed, Fri, Sat",
      fromTime: "4:00 PM",
      toTime: "6:00 PM",
      fees: "250,000 MMK",
      payWith: "Kpay",
      time: "2 mins ago",
      isRead: false,
    },
  ];

  const events = [
    {
      id: 1,
      logo: "../../storages/instituteLogo.png",
      name: "C Institute",
      action: "Registered Successful",
      eventName: "Understanding Cloud Computing in 2024",
      aboutEvent:
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem soluta incidunt saepe ullam. Dolor, voluptatibus. Corporis sint ipsa odio, totam similique assumenda nihil a eum facilis excepturi, nemo aperiam eveniet.",
      eventPhoto: "../../storages/event.png",
      eventType: "Webinar",
      speaker: "Matthew Davis, David James",
      speakerPhoto: "../../storages/user1.jpg, ../../storages/user1.jpg",
      eventDate: "12/7/2024",
      fromTime: "9:30 AM",
      toTime: "12:00 PM",
      time: "5 mins ago",
      isRead: true,
    },
    {
      id: 2,
      logo: "../../storages/instituteLogo.png",
      name: "XYZ Institute",
      action: "Registered Successful",
      eventName: "Job Fair Opportunity",
      aboutEvent:
        "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem soluta incidunt saepe ullam. Dolor, voluptatibus. Corporis sint ipsa odio, totam similique assumenda nihil a eum facilis excepturi, nemo aperiam eveniet.",
      eventPhoto: "../../storages/event.png",
      eventType: "Job Fair",
      speaker: "Matthew Davis, David James",
      speakerPhoto: "../../storages/user1.jpg, ../../storages/user1.jpg",
      eventDate: "14/7/2024",
      fromTime: "9:30 AM",
      toTime: "11:00 PM",
      time: "1 min ago",
      isRead: false,
    },
  ];

  // Merge classes and events into one array for rendering
  const notifications = [...classes, ...events];

  // Sort notifications by time (most recent first)
  notifications.sort((a, b) => parseTime(b.time) - parseTime(a.time));

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
      const isClass = "class" in notification;
      const notificationHtml = `
        <div class="relative" data-notification-id="${
          notification.id
        }" data-type="${isClass ? "class" : "event"}">
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
                <p class="text-sm font-semibold">${notification.name}</p>
                <p class="text-xs text-green-700">${notification.action}</p>
              </div>
            </div>
            <div class="text-right">
              <p class="text-xs text-gray-500 mb-1">${notification.time}</p>
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
    const type = $(this).data("type");
    const notification = (type === "class" ? classes : events).find(
      (notif) => notif.id === notificationId
    );

    if (type === "class") {
      $("#details-header").html(`
        <img src="${notification.logo}" alt="Avatar" class="w-10 h-10 rounded-full">
        <div class="ml-3">
          <p class="text-lg font-semibold">${notification.name}</p>
          <p class="text-sm text-gray-500">Details</p>
        </div>
      `);

      $("#details").html(`
        <div class="p-4 bg-white rounded-lg shadow-md">
          <div class="mb-6 flex justify-between space-x-3">
            <img src="${notification.classPhoto}">
            <p class="text-sm">${notification.aboutClass}</p>
          </div>
          <div class="flex items-center mb-4">
            <img src="${
              notification.instructorPhoto
            }" alt="Instructor Photo" class="w-12 h-12 rounded-full mr-3">
            <div>
              <p class="text-lg font-semibold">${notification.class}</p>
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
              <p class="text-sm text-gray-600 mb-2"><strong>Days:</strong> ${
                notification.days
              }</p>
              <p class="text-sm text-gray-600 mb-2"><strong>Time:</strong> ${
                notification.fromTime
              } - ${notification.toTime}</p>
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
    } else {
      $("#details-header").html(`
        <img src="${notification.logo}" alt="Avatar" class="w-10 h-10 rounded-full">
        <div class="ml-3">
          <p class="text-lg font-semibold">${notification.name}</p>
          <p class="text-sm text-gray-500">Details</p>
        </div>
      `);

      const speakers = notification.speaker
        .split(", ")
        .map((speaker, index) => {
          return `<div class="flex items-center mb-2">
            <img src="${
              notification.speakerPhoto.split(", ")[index]
            }" alt="Speaker Photo" class="w-8 h-8 rounded-full mr-2">
            <p class="text-sm">${speaker}</p>
          </div>`;
        })
        .join("");

      $("#details").html(`
        <div class="p-4 bg-white rounded-lg shadow-md">
          <div class="mb-4 flex justify-between space-x-3">
            <img src="${notification.eventPhoto}">
            <p class="text-sm">${notification.aboutEvent}</p>
          </div>
          <div class="mb-4">
          <p class="text-lg font-semibold mb-2">${notification.eventName}</p>
            <p class="text-base font-semibold">- ${notification.eventType}</p>
          </div>
          <div>
            <p class="text-sm text-gray-600 mb-2"><strong>Event Date:</strong> ${notification.eventDate}</p>
            <p class="text-sm text-gray-600 mb-2"><strong>Time:</strong> ${notification.fromTime} - ${notification.toTime}</p>
            <p class="text-sm text-gray-600 mb-2"><strong>Speakers:</strong></p>
            ${speakers}
          </div>
          <div class="mt-4">
            <a href="${notification.agendaUrl}" download="Event_Agenda.pdf" class="bg-primaryColor text-white text-xs py-2 px-4 rounded-lg inline-block text-center"><ion-icon name="arrow-down-outline" class="relative right-1 top-0.5"></ion-icon>Download Agenda</a>
          </div>
        </div>
      `);
    }

    // Mark notification as read
    notification.isRead = true;

    renderNotifications("#notification-list", () => true);
    // Refresh the unread list
    renderNotifications("#unread-list", (notification) => !notification.isRead);

    // Also refresh the read list
    renderNotifications("#read-list", (notification) => notification.isRead);

    // Remove the unread indicator in the clicked item
    $(this).find(".bg-red-600").remove();

    $("#details").removeClass("hidden");

    // For Mobile View Handling
    if ($(window).width() < 768) {
      $("#left-side").addClass("hidden");
      $("#right-side").removeClass("hidden");

      $("#back-button").on("click", function () {
        $("#right-side").addClass("hidden");
        $("#left-side").removeClass("hidden");
      });
    }
  });

  // Back to notifications list on mobile
  $("#back-to-notifications").click(function () {
    $("#details").addClass("hidden");
    $("#notifications-container").show();
  });

  // Function to parse time for sorting
  function parseTime(timeStr) {
    if (timeStr === "Just now") return Number.MAX_SAFE_INTEGER;

    const timeValue = parseInt(timeStr.split(" ")[0], 10);
    const unit = timeStr.split(" ")[1];
    const now = new Date();

    switch (unit) {
      case "min":
      case "mins":
        return new Date(now.getTime() - timeValue * 60000).getTime();
      case "hour":
      case "hours":
        return new Date(now.getTime() - timeValue * 3600000).getTime();
      case "day":
      case "days":
        return new Date(now.getTime() - timeValue * 86400000).getTime();
      default:
        return new Date(timeStr).getTime();
    }
  }
});
