// *********** Use in mailSystem.php ***********

$(document).ready(function () {
  /* Start HPP Code 
       .............. 
       ..............*/

  //  Handling Tabs (User, Institute, Others)
  $(".tab-button").click(function () {
    $(".tab-button")
      .removeClass("bg-dark-blue text-white")
      .addClass("text-gray-700");
    $(this).removeClass("text-gray-700").addClass("bg-dark-blue text-white");
    $(".tab-content").hide();
    if ($(this).text() === "User") {
      $("#user-content").show();
    } else if ($(this).text() === "Institute") {
      $("#institute-content").show();
    } else {
      $("#others-content").show();
    }
  });

  // Sample Data
  const userEmails = [
    {
      name: "John Smith",
      senderMail: "johnsmith@gmail.com",
      photo: "../../storages/user1.jpg",
      date: "July 18, 2024",
      time: "18 min ago",
      subject: "About Bug Report",
      content:
        "Hi Admin,I have faced something that is not working well on your website's Home Page. Can you please check the error I am encountering? Below are the details:Issue: Course Search doesn't respondSteps to reproduce:",
    },
    {
      name: "Jane Doe",
      senderMail: "jonedoe@gmail.com",
      photo: "../../storages/user1.jpg",
      date: "July 19, 2024",
      time: "22 min ago",
      subject: "Feature Request",
      content:
        "It would be great if you could add a dark mode to the website. Thanks!",
    },
    {
      name: "John Smith",
      senderMail: "johnsmith@gmail.com",
      photo: "../../storages/user1.jpg",
      date: "July 18, 2024",
      time: "18 min ago",
      subject: "About Bug Report",
      content:
        "Hi Admin,I have faced something that is not working well on your website's Home Page. Can you please check the error I am encountering? Below are the details:Issue: Course Search doesn't respondSteps to reproduce:",
    },
    {
      name: "Jane Doe",
      senderMail: "jonedoe@gmail.com",
      photo: "../../storages/user1.jpg",
      date: "July 19, 2024",
      time: "22 min ago",
      subject: "Feature Request",
      content:
        "It would be great if you could add a dark mode to the website. Thanks!",
    },
  ];

  const instituteEmails = [
    {
      name: "Institute Admin",
      senderMail: "admin@institute.com",
      photo: "../../storages/instituteLogo.png",
      date: "July 20, 2024",
      time: "10 min ago",
      subject: "New Course Available",
      content:
        "We have launched a new course on AI and Machine Learning. Please check it out!",
    },
  ];

  const othersEmails = [
    {
      name: "Support Team",
      senderMail: "support@website.com",
      photo: "../../storages/noti_person1.png",
      date: "July 21, 2024",
      time: "5 min ago",
      subject: "System Maintenance",
      content:
        "We will be performing system maintenance on July 22, 2024, from 12:00 AM to 2:00 AM.",
    },
  ];

  // Initial Load
  loadNotifications(userEmails, "#user-content");
  loadNotifications(instituteEmails, "#institute-content");
  loadNotifications(othersEmails, "#others-content");

  // Function for mapping corresponding incoming emails and content split with ...
  function loadNotifications(emails, containerId) {
    const notifications = emails.map((email, index) => ({
      name: email.name,
      time: email.time,
      subject: email.subject,
      content: email.content.split(" ").slice(0, 10).join(" ") + "...",
      index: index,
    }));

    $(containerId).html("");
    notifications.forEach((notification) =>
      addNotification(notification, notification.index, containerId)
    );
  }

  // Function for add notifications depending on 3 parameters
  function addNotification(notification, index, containerId) {
    const notificationHtml = `
             <div class="notification-item p-1 cursor-pointer" data-index="${index}">
                 <div>
                     <div class="flex justify-between items-start">
                         <div class="font-bold text-base">${notification.name}</div>
                         <div class="text-gray-500 dark:text-gray-400 text-sm">${notification.time}</div>
                     </div>
                 </div>
                 <div class="text-gray-500 dark:text-gray-400 text-sm font-semibold">${notification.subject}</div>
                 <p class="text-xs">${notification.content}</p>
             </div>
             <hr class="border>
         `;
    $(containerId).append(notificationHtml);
  }

  // Switchable Tab
  function switchTab(tabId) {
    $(".tab-content").addClass("hidden");
    $(tabId).removeClass("hidden");
  }

  // Load default email details
  if (userEmails.length > 0) {
    updateEmailDetails(userEmails[0]);
  }

  // Tab Switch
  $(document).on("click", ".tab", function () {
    const tabId = $(this).data("tab");
    switchTab(`#${tabId}`);
    $(this).addClass("active").siblings().removeClass("active");
  });

  // Email Click
  $(document).on("click", ".notification-item", function () {
    const index = $(this).data("index");
    const containerId = $(this).closest(".tab-content").attr("id");
    let emails = [];

    if (containerId === "user-content") {
      emails = userEmails;
    } else if (containerId === "institute-content") {
      emails = instituteEmails;
    } else if (containerId === "others-content") {
      emails = othersEmails;
    }

    updateEmailDetails(emails[index]);
  });

  // Function for email details of third column
  function updateEmailDetails(email) {
    const emailHtml = `
             <div class="email-details">
                 <div class="flex items-center mb-4">
                     <img src="${email.photo}" alt="User Avatar" class="rounded-full w-12 h-12 mr-4">
                     <div>
                        <div class="flex items-center">
                             <div class="font-bold">${email.name}</div>
                            <div class="w-20"></div>
                             <div class="text-gray-500 dark:text-gray-400 text-sm">${email.time}</div>
                         </div>
                          <div class="text-gray-500 dark:text-gray-400 text-sm">${email.date}</div>
                     </div>
                    
                 </div>
                 <div class="email-content text-sm mb-4">
                     <p>Sender: ${email.senderMail}</p>
                     <p class="text-dark-blue dark:text-[#9aabff]">Subject: ${email.subject}</p>
                     </br>
                     <p>${email.content}</p>
                 </div>
                 <div class="reply-box flex space-x-2 mt-20">
                    <div>
                      <input type="text" class="w-full mb-2 p-2 border rounded bg-card-bg dark:bg-gray-600 dark:border-gray-500 dark:text-white text-sm focus:outline-none focus:ring-1 focus:ring-blue-light-bg" placeholder="Subject">
                     <input type="text" class="w-full mb-2 p-2 border rounded bg-card-bg dark:bg-gray-600 dark:border-gray-500 dark:text-white text-sm focus:outline-none focus:ring-1 focus:ring-blue-light-bg" placeholder="To" value="${email.senderMail}">
                     <button class="w-full bg-dark-blue text-white px-4 py-2 rounded text-sm">Send</button>
                     </div>
                     <textarea rows="6" class="w-full mb-2 p-2 border rounded bg-card-bg dark:bg-gray-600 dark:border-gray-500 dark:text-white text-sm focus:outline-none focus:ring-1 focus:ring-blue-light-bg" placeholder="Comment"></textarea>
                     
                 </div>
             </div>
         `;
    $("#email-details-container").html(emailHtml);
  }

  // Only work in php file of script
  // New Message button
  // $("#new-message").on("click", function (e) {
  //   e.preventDefault();  // Prevent default anchor behavior
  //   $("#new-message-form").toggleClass("hidden");
  //   // Toggle button styles
  //   if ($("#new-message-form").hasClass("hidden")) {
  //     $(this)
  //       .removeClass("bg-dark-blue text-white")
  //       .addClass("text-dark-blue bg-transparent");
  //   } else {
  //     $(this)
  //       .removeClass("text-dark-blue bg-transparent")
  //       .addClass("bg-dark-blue text-white");
  //   }
  // });

  // Form of Cancel
  // $("#cancel-button").on("click", function () {
  //   $("#new-message-form").addClass("hidden");
  //   $("#new-message")
  //     .removeClass("bg-dark-blue text-white")
  //     .addClass("text-dark-blue bg-transparent");
  // });

  /* ............
       ............
       End HPP Code */
});
