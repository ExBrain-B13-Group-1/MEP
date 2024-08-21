// *********** Use in notiPopup.php ***********

$(document).ready(function () {
  /* Start HPP Code 
       .............. 
       ..............*/

  $("#notification-icon").on("click", function () {
    $("#notification-popup").toggleClass("hidden");
  });

  // Sample data
  const notifications = [
    {
      photo: "../../../storages/noti_person1.png",
      isActive: true,
      name: "Marry",
      action: "reviewed",
      details: "5 stars",
      stars: 5,
      time: "Just now",
      location: "Bago",
    },
    {
      photo: "../../../storages/noti_person2.png",
      isActive: true,
      name: "John Doe",
      action: "enrolled",
      details: "Front-End Development Course",
      stars: 0,
      time: "35 mins ago",
      location: "Yangon",
    },
    {
      photo: "../../../storages/noti_person3.png",
      isActive: false,
      name: "Benny",
      action: "sent message to",
      details: "Admin Chat",
      stars: 0,
      time: "1 hour ago",
      location: "Mandalay",
    },
    {
      photo: "../../../storages/noti_person1.png",
      isActive: true,
      name: "Kaythi",
      action: "reviewed",
      details: "5 stars",
      stars: 5,
      time: "1 day ago",
      location: "Bago",
    },
    {
      photo: "../../../storages/noti_person2.png",
      isActive: true,
      name: "John Doe",
      action: "enrolled",
      details: "Back-End Development Course",
      stars: 0,
      time: "3 days ago",
      location: "Yangon",
    },
  ];

  // Function for count stars
  function renderStars(starCount) {
    let starsHtml = "";
    for (let i = 0; i < starCount; i++) {
      starsHtml += '<ion-icon name="star"></ion-icon>';
    }
    return starsHtml;
  }

  // Function for adding notifications dynamically
  function addNotification(notification) {
    const notificationHtml = `
            <div class="flex items-center p-4 border-b">
                <div class="flex-shrink-0 relative">
                    <img src="${
                      notification.photo
                    }" alt="Avatar" class="w-10 h-10 rounded-full">
                    ${
                      notification.isActive
                        ? `<div class="w-3 h-3 bg-green-600 rounded-full absolute bottom-7 left-8"></div>`
                        : ``
                    }
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">${
                      notification.name
                    } <span class="text-gray-500">${
      notification.action
    }</span> ${notification.details}
                    <span class="text-yellow-500 pl-1">${renderStars(
                      notification.stars
                    )}</span>
                    </p>
                    <p class="text-xs text-gray-500">${notification.time} • ${
      notification.location
    }</p>
                </div>
            </div>
        `;
    $("#notification-list").append(notificationHtml);
  }

  // Add notifications to the list
  notifications.forEach(addNotification);

  /* ............
       ............
       End HPP Code */
});
