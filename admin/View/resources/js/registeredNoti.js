// *********** Use in registeredNoti.php ***********

$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/

  // User Tab & Institute Tab
  $(".tab-button").click(function () {
    $(".tab-button")
      .removeClass("text-dark-blue dark:text-[#9aabff] font-bold text-xl")
      .addClass("text-gray-700 dark:text-gray-400");
    $(this)
      .removeClass("text-gray-700 dark:text-gray-400")
      .addClass("text-dark-blue dark:text-[#9aabff] font-bold text-xl");
    $(".tab-content").removeClass("active").addClass("hidden");
    if (this.id === "user-tab") {
      $("#user-content").removeClass("hidden").addClass("active");
      $("#user-notification-list").empty(); 
      userNotifications.forEach(addNotification);
    } else {
      $("#institute-content").removeClass("hidden").addClass("active");
      $("#institute-notification-list").empty(); 
      instituteNotifications.forEach(addNotification);
    }
  });

  // Sample data
  const userNotifications = [
    {
      photo: "../../../storages/user1.jpg",
      name: "John Smith",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/user1.jpg",
      name: "XYZ Academy",
      date: "July 19, 2024",
      time: "20min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/user1.jpg",
      name: "John Smith",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/user1.jpg",
      name: "Jane Doe",
      date: "July 19, 2024",
      time: "20min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/user1.jpg",
      name: "John Smith",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/user1.jpg",
      name: "Jane Doe",
      date: "July 19, 2024",
      time: "20min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/user1.jpg",
      name: "John Smith",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
  ];

  // Sample data
  const instituteNotifications = [
    {
      photo: "../../../storages/instituteLogo.png",
      name: "ABC Institute",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/instituteLogo.png",
      name: "XYZ Academy",
      date: "July 19, 2024",
      time: "20min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/instituteLogo.png",
      name: "ABC Institute",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/instituteLogo.png",
      name: "XYZ Academy",
      date: "July 19, 2024",
      time: "20min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/instituteLogo.png",
      name: "ABC Institute",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/instituteLogo.png",
      name: "XYZ Academy",
      date: "July 19, 2024",
      time: "20min ago",
      formLink: "#",
    },
    {
      photo: "../../../storages/instituteLogo.png",
      name: "ABC Institute",
      date: "July 18, 2024",
      time: "18min ago",
      formLink: "#",
    },
  ];

  // Function to add dynamic notification depends on user or institute
  function addNotification(notification) {
    const notificationHtml = `
            <div class="bg-thin-bg p-4 rounded-lg flex items-center justify-between cursor-pointer hover:bg-thin-hover-bg">
                <div class="flex items-center">
                    <img src="${notification.photo}" alt="User Avatar" class="rounded-full w-16 h-16 mr-4">
                    <div>
                        <div class="font-bold">${notification.name}</div>
                        <div class="text-gray-500 dark:text-gray-400 text-sm">${notification.date}</div>
                        <div class="text-gray-500 dark:text-gray-400 text-sm">${notification.time}</div>
                    </div>
                </div>
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" {...$$props}>
<path fill="currentColor" d="m12 15.577l-3.539-3.538l.708-.72L11.5 13.65V5h1v8.65l2.33-2.33l.709.719zM5 19v-4.038h1V18h12v-3.038h1V19z" /></svg>
                    <a href="${notification.formLink}" class="text-dark-blue dark:text-[#9aabff] underline mr-32">
                    Validation Form</a>
                    <div class="flex flex-col">
                        <button class="bg-primary-main text-white px-4 py-2 rounded text-sm flex items-center transition duration-100 transform hover:scale-105 verify-button">
                         <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" class="mr-1" viewBox="0 0 24 24" {...$$props}>
<path fill="currentColor" d="M23 11.99L20.56 9.2l.34-3.69l-3.61-.82L15.4 1.5L12 2.96L8.6 1.5L6.71 4.69L3.1 5.5l.34 3.7L1 11.99l2.44 2.79l-.34 3.7l3.61.82l1.89 3.2l3.4-1.47l3.4 1.46l1.89-3.19l3.61-.82l-.34-3.69zm-3.95 1.48l-.56.65l.08.85l.18 1.95l-1.9.43l-.84.19l-.44.74l-.99 1.68l-1.78-.77l-.8-.34l-.79.34l-1.78.77l-.99-1.67l-.44-.74l-.84-.19l-1.9-.43l.18-1.96l.08-.85l-.56-.65L3.67 12l1.29-1.48l.56-.65l-.09-.86l-.18-1.94l1.9-.43l.84-.19l.44-.74l.99-1.68l1.78.77l.8.34l.79-.34l1.78-.77l.99 1.68l.44.74l.84.19l1.9.43l-.18 1.95l-.08.85l.56.65l1.29 1.47z" />
<path fill="currentColor" d="m10.09 13.75l-2.32-2.33l-1.48 1.49l3.8 3.81l7.34-7.36l-1.48-1.49z" /></svg>
                            Verified
                        </button>
                        <div class="w-2 h-2"></div>
                        <button class="bg-red-500 text-white px-4 py-2 rounded text-sm flex items-center transition duration-100 transform hover:scale-105 reject-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" class="mr-1" viewBox="0 0 16 16" {...$$props}>
<path fill="currentColor" fill-rule="evenodd" d="M7.67 14.72h.71L10.1 13h2.4l.5-.5v-2.42l1.74-1.72v-.71l-1.71-1.72V3.49l-.5-.49H10.1L8.38 1.29h-.71L6 3H3.53L3 3.5v2.43L1.31 7.65v.71L3 10.08v2.42l.53.5H6zM6.16 12H4V9.87l-.12-.35L2.37 8l1.48-1.51l.15-.35V4h2.16l.36-.14L8 2.35l1.54 1.51l.35.14H12v2.14l.17.35L13.69 8l-1.55 1.52l-.14.35V12H9.89l-.38.15L8 13.66l-1.48-1.52zm1.443-5.859a1 1 0 0 0-.128.291q-.045.164-.062.317l-.005.043h-.895l.003-.051q.027-.49.212-.864q.079-.162.193-.318q.122-.16.294-.28q.178-.125.409-.2A1.7 1.7 0 0 1 8.165 5q.42 0 .726.14q.301.133.494.363q.19.228.279.52q.087.291.087.599q0 .287-.098.54q-.096.247-.238.466q-.14.215-.31.41q-.165.193-.304.372a2.5 2.5 0 0 0-.23.34a.65.65 0 0 0-.088.318v.48h-.888v-.539q0-.252.094-.464a2 2 0 0 1 .24-.401q.145-.19.308-.368a5 5 0 0 0 .299-.356q.14-.18.228-.377a1 1 0 0 0 .09-.421a1 1 0 0 0-.047-.318v-.001a.6.6 0 0 0-.13-.243a.56.56 0 0 0-.216-.158H8.46a.7.7 0 0 0-.294-.059a.64.64 0 0 0-.339.083a.7.7 0 0 0-.223.215zM8.5 11h-.888v-.888H8.5z" clip-rule="evenodd" /></svg>
                        Reject
                        </button>
                    </div>
                </div>
            </div>
        `;
    if ($("#user-content").hasClass("active")) {
      $("#user-notification-list").append(notificationHtml);
    } else {
      $("#institute-notification-list").append(notificationHtml);
    }
  }

  // Initial render
  userNotifications.forEach(addNotification);

  // Function to show the modal with appropriate message and name
  function showModal(action, name) {
    $("#confirmation-modal").removeClass("hidden");
    if (action === "verify") {
      $("#modal-title").text("Confirm Verification");
      $("#modal-message").html(
        `If you verify <strong>${name}</strong>, we will send an email to confirm the completion.`
      );
      $("#confirm-button").text("Verify").data("action", "verify");
    } else if (action === "reject") {
      $("#modal-title").text("Confirm Rejection");
      $("#modal-message").html(
        `If you reject <strong>${name}</strong>, the user will need to fill in the correct information again.`
      );
      $("#confirm-button").text("Reject").data("action", "reject");
    }
  }

  // Function to handle the modal confirmation
  $("#confirm-button").click(function () {
    const action = $(this).data("action");
    $("#confirmation-modal").addClass("hidden");
    if (action === "verify") {
      // Handle the verification process
      alert("User has been verified and an email has been sent.");
    } else if (action === "reject") {
      // Handle the rejection process
      alert(
        "User has been rejected. Please ask them to fill in the correct information."
      );
    }
  });

  // Function to close the modal
  $("#cancel-button").click(function () {
    $("#confirmation-modal").addClass("hidden");
  });

  // Show modal on button click (verify)
  $(document).on("click", ".verify-button", function () {
    const name = $(this)
      .closest(".flex.items-center.justify-between")
      .find(".font-bold")
      .text();
    showModal("verify", name);
  });

  // Show modal on button click (reject)
  $(document).on("click", ".reject-button", function () {
    const name = $(this)
    .closest(".flex.items-center.justify-between")
    .find(".font-bold")
    .text();
    showModal("reject", name);
  });

  /* ............
     ............
     End HPP Code */
});
