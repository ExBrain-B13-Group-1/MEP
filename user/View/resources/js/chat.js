$(document).ready(function () {
  // Sample Data
  const notifications = [
    {
      id: 1,
      photo: "../../storages/noti_person1.png",
      name: "Marry",
      email: "marry@gmail.com",
      action: "sent message to",
      details: "you",
      time: "Just now",
      location: "Bago",
      isActive: true,
      isRead: true,
    },
    {
      id: 2,
      photo: "../../storages/noti_person2.png",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "you",
      time: "35 min ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    {
      id: 3,
      photo: "../../storages//noti_person3.png",
      name: "Benny",
      email: "benny@gmail.com",
      action: "sent message to",
      details: "you",
      stars: 0,
      time: "1 hour ago",
      location: "Mandalay",
      isActive: false,
      isRead: false,
    },
    {
      id: 4,
      photo: "../../storages//noti_person1.png",
      name: "Kaythi",
      email: "keyth@gmail.com",
      action: "sent message to",
      details: "you",
      time: "1 day ago",
      location: "Bago",
      isActive: false,
      isRead: true,
    },
    {
      id: 5,
      photo: "../../storages/noti_person3.png",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "you",
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: true,
    },
    {
      id: 6,
      photo: "../../storages/noti_person1.png",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "you",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    {
      id: 7,
      photo: "../../storages/noti_person1.png",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "you",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    {
      id: 8,
      photo: "../../storages/noti_person1.png",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "you",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    {
      id: 9,
      photo: "../../storages/noti_person1.png",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "you",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    {
      id: 10,
      photo: "../../storages/noti_person1.png",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "you",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
  ];

  // To keep track of the current notification
  let currentNotification = null;

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
            notification.photo
          }" alt="Avatar" class="w-10 h-10 rounded-full">
          ${
            notification.isActive
              ? `<div class="w-3 h-3 bg-green-600 rounded-full absolute bottom-7 left-8"></div>`
              : ""
          }
        </div>
        <div class="ml-3">
          <p class="text-sm font-semibold">${
            notification.name
          } <span class="text-gray-500">${notification.action}</span> </br> ${
        notification.details
      }
          </p>
        </div>
      </div>
      <div class="text-right">
        <p class="text-xs text-gray-500 mb-1">${notification.time}</p>
        <p class="text-xs text-gray-500">${notification.location}</p>
      </div>
    </div>
  </div>
`;
      $(listId).append(notificationHtml);
    });
  }

  // Sending messages
  $("#send-message").on("click", function () {
    const message = $("#chat-input").val().trim();
    if (message !== "") {
      const now = new Date();
      const formattedTime = `${getDayName(now)} AT ${formatAMPM(now)}`;
      const messageHtml = `
  <div class="text-xs text-gray-500 mt-1 text-center">${formattedTime}</div>
  <div class="flex justify-end items-center space-x-3 mb-4">
    <div class="bg-white text-gray-900 py-1 px-3 rounded-lg max-w-xs shadow-md">
      ${message}
    </div>
    <div>
      <img src="../../storages/user1.jpg" alt="Avatar" class="w-10 h-10 rounded-full">
    </div>
  </div>
`;
      $("#chat-messages").append(messageHtml);
      $("#chat-input").val("");

      // Scroll to the bottom of the chat
      $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
    }
  });

  // Format Time AM, PM
  function formatAMPM(date) {
    let hours = date.getHours();
    let minutes = date.getMinutes();
    const ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;
    const strTime = `${hours}:${minutes} ${ampm}`;
    return strTime;
  }

  // Get Day Name
  function getDayName(date) {
    const days = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
    return days[date.getDay()];
  }

  // Send message on enter key press
  $("#chat-input").on("keypress", function (e) {
    if (e.which === 13) {
      $("#send-message").click();
    }
  });

  // Handling click on details notifications
  $(document).on("click", "[data-notification-id]", function () {
    const notificationId = $(this).data("notification-id");
    const notification = notifications.find(
      (notif) => notif.id === notificationId
    );

    currentNotification = notification;

    // For Mobile View Handling
    if ($(window).width() < 768) {
      $("#left-side").addClass("hidden");
      $("#right-side").removeClass("hidden");

      $("#back-button").on("click", function () {
        $("#right-side").addClass("hidden");
        $("#left-side").removeClass("hidden");
      });
    }

    if (notification.action === "sent message to") {
      // Update chat header
      $("#chat-photo").attr("src", notification.photo);
      $("#chat-name").text(notification.name);

      // Clear previous messages
      $("#chat-messages").empty();

      // Add new messages (you can customize this part to load actual chat history)
      const sampleMessages = [
        { text: "Hello!", time: "TUE AT 3:35 PM" },
        { text: "How can I help you?", time: "TUE AT 3:36 PM" },
      ];
      sampleMessages.forEach((msg) => {
        const messageHtml = `
      <div class="text-xs text-gray-500 mt-1 text-center">${msg.time}</div>
      <div class="flex items-center space-x-3 mb-4">
        <div>
          <img src="${notification.photo}" alt="Avatar" class="w-10 h-10 rounded-full">
        </div>
        <div class="bg-white text-gray-900 py-1 px-3 rounded-lg max-w-xs shadow-md">
          ${msg.text}
        </div>
      </div>
    `;
        $("#chat-messages").append(messageHtml);
      });
    }

    // Mark as read and remove unread icon
    notification.isRead = true;
    $(this).find(".bg-red-600").remove();
    renderNotifications("#notification-list", () => true);
    renderNotifications("#read-list", (notification) => notification.isRead);
    renderNotifications("#unread-list", (notification) => !notification.isRead);
  });
});
