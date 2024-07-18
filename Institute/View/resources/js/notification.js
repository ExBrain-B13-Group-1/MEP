$(document).ready(function () {
  // Sample Data
  const notifications = [
    {
      id: 1,
      photo: "../../../storages/profile1.svg",
      name: "Marry",
      email: "marry@gmail.com",
      action: "reviewed",
      details: "",
      stars: 5,
      time: "Just now",
      location: "Bago",
      isActive: true,
      isRead: true,
    },
    {
      id: 2,
      photo: "../../../storages/profile3.svg",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "enrolled",
      details: "Front-End Development Course",
      stars: 0,
      time: "35 min ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    {
      id: 3,
      photo: "../../../storages/profile1.svg",
      name: "Benny",
      email: "benny@gmail.com",
      action: "sent message to",
      details: "Admin Chat",
      stars: 0,
      time: "1 hour ago",
      location: "Mandalay",
      isActive: false,
      isRead: false,
    },
    {
      id: 4,
      photo: "../../../storages/profile2.svg",
      name: "Kaythi",
      email: "keyth@gmail.com",
      action: "reviewed",
      details: "",
      stars: 5,
      time: "1 day ago",
      location: "Bago",
      isActive: false,
      isRead: true,
    },
    {
      id: 5,
      photo: "../../../storages/profile3.svg",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "enrolled",
      details: "Back-End Development Course",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: true,
    },
    {
      id: 6,
      photo: "../../../storages/profile3.svg",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "Admin Chat",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    {
      id: 6,
      photo: "../../../storages/profile3.svg",
      name: "John Doe",
      email: "johndoe@gmail.com",
      action: "sent message to",
      details: "Admin Chat",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
      isActive: true,
      isRead: false,
    },
    
  ];

  // To keep who with texting
  let currentNotification = null;

  // Tab handling
  $(".tab-button").click(function () {
    $(".tab-button")
      .removeClass("bg-[#4460EF] text-white dark:text-white")
      .addClass("text-gray-700 dark:text-white");
    $(this).removeClass("text-gray-700 dark:text-white").addClass("bg-[#4460EF] text-white dark:text-white");
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
          <div class="flex items-center justify-between py-4 border-b dark:border-gray-600 border-gray-300">
            <div class="flex">
              <div class="flex-shrink-0 relative">
                <img src="${
                  notification.photo
                }" alt="Avatar" class="w-10 h-10 rounded-full">
                ${
                  notification.isActive
                    ? `<div class="w-3 h-3 bg-green-600 dark:bg-green-400 rounded-full absolute bottom-7 left-8"></div>`
                    : ""
                }
              </div>
              <div class="ml-3">
                <p class="text-sm font-semibold">${
                  notification.name
                } <span class="text-gray-500 dark:text-white/45">${
        notification.action
      }</span> </br> ${notification.details}
                <span class="text-yellow-500 pl-1">${renderStars(
                  notification.stars
                )}</span>
                </p>
              </div>
            </div>
            <div class="text-right">
              <p class="text-xs text-gray-500 dark:text-white mb-1">${notification.time}</p>
              <p class="text-xs text-gray-500 dark:text-white">${notification.location}</p>
            </div>
          </div>
        </div>
      `;
      $(listId).append(notificationHtml);
    });
  }

  // Function to render stars
  function renderStars(starCount) {
    let starsHtml = "";
    for (let i = 0; i < starCount; i++) {
      starsHtml += '<ion-icon name="star"></ion-icon>';
    }
    return starsHtml;
  }

  // Sending messages
  $("#send-message").on("click", function () {
    const message = $("#chat-input").val().trim();
    if (message !== "") {
      const now = new Date();
      const formattedTime = `${getDayName(now)} AT ${formatAMPM(now)}`;
      const messageHtml = `
        <div class="text-xs text-gray-500 dark:text-white/90 mt-1 text-center">${formattedTime}</div>
        <div class="flex justify-end items-center space-x-3 mb-4">
          <div class="bg-white text-gray-900 dark:bg-gray-600 dark:text-white py-1 px-3 rounded-lg max-w-xs shadow-md">
            ${message}
          </div>
          <div>
            <img src="../../../storages/profile3.svg" alt="Avatar" class="w-10 h-10 rounded-full">
          </div>
        </div>
      `;
      $("#chat-messages").append(messageHtml);
      $("#chat-input").val("");

      // Scroll to the bottom of the chat
      // console.log($('#chat-messages'));
      // console.log($("#chat-messages")[0].offsetTop);
      // console.log($("#chat-messages")[0].clientHeight);
      // console.log($("#chat-messages")[0].offsetHeight);
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

  // Handling click on notifications
  $(document).on("click", "[data-notification-id]", function () {
    const notificationId = $(this).data("notification-id");
    const notification = notifications.find(
      (notif) => notif.id === notificationId
    );

    currentNotification = notification;

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
          <div class="text-xs text-gray-500 dark:text-white/90 mt-1 text-center">${msg.time}</div>
          <div class="flex items-center space-x-3 mb-4">
            <div>
              <img src="${notification.photo}" alt="Avatar" class="w-10 h-10 rounded-full">
            </div>
            <div class="bg-white text-gray-900 dark:bg-gray-600 dark:text-white py-1 px-3 rounded-lg max-w-xs shadow-md">
              ${msg.text}
            </div>
          </div>
        `;
        $("#chat-messages").append(messageHtml);
      });

      // Populate mail field dynamically based on current chatting
      populateMailFields(notification);
    }

    // Mark as read and remove unread icon
    notification.isRead = true;
    $(this).find(".bg-red-600").remove();
    renderNotifications("#notification-list", () => true);
    renderNotifications("#read-list", (notification) => notification.isRead);
    renderNotifications("#unread-list", (notification) => !notification.isRead);
  });

  // Function to populate mail dynamically
  function populateMailFields(notification) {
    $("#mail-header").text(notification.time);
    $("#mail-from").text(notification.email);
    $("#mail-to").text("instituteAdmin@gmail.com");
    $("#mail-subject").text(
      notification.details ? `${notification.details}` : "No Subject"
    );
    $("#mail-body").text(
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae in, vel, quod quis impedit autem laborum, praesentium aliquam a dignissimos vero. Porro ipsa facilis numquam aliquam tempore odio rem magni?"
    );

    // Auto Put Value in "To"
    $("#mail-to-input").val(notification.email);
  }

  // Handling mail icon click
  $("#mail-button").click(function () {
    // Hide chat and show mail container
    $("#chat-container, #chat-input-container").hide();
    $("#mail-container").show();

    // Populate mail fields with current notification data
    if (currentNotification) {
      populateMailFields(currentNotification);
    }

    // Show back button & hide mail button
    $("#back-button").show();
    $("#mail-button").hide();
  });

  // Handling back button click
  $("#back-button").click(function () {
    // Hide mail container and show chat
    $("#mail-container").hide();
    $("#chat-container, #chat-input-container").show();

    // Hide back button & show mail button
    $(this).hide();
    $("#mail-button").show();
  });
});
