// *********** Use in registeredNoti.php ***********

$(document).ready(function () {
  /* Start HPP Code 
     .............. 
     ..............*/

  // Default
  let activeTab = "user";

  // User Tab & Institute Tab
  $(".tab-button").click(function () {
    // Update tab button styles
    $(".tab-button")
      .removeClass("text-dark-blue dark:text-[#9aabff] font-bold text-xl")
      .addClass("text-gray-700 dark:text-gray-400");
    $(this)
      .removeClass("text-gray-700 dark:text-gray-400")
      .addClass("text-dark-blue dark:text-[#9aabff] font-bold text-xl");
    // Hide all tab contents
    $(".tab-content").removeClass("active").addClass("hidden");

    // Show the clicked tab's content
    if (this.id === "user-tab") {
      activeTab = "user";
      $("#user-content").removeClass("hidden").addClass("active");
    } else if (this.id === "institute-tab") {
      activeTab = "institute";
      $("#institute-content").removeClass("hidden").addClass("active");
    }
  });

  // Function to show the modal with appropriate message and name
  function showModal(action, name, notificationId) {
    $("#confirmation-modal").removeClass("hidden");
    if (action === "verify") {
      $("#modal-title").text("Confirm Verification");
      $("#modal-message").html(
        `If you verify <strong>${name}</strong>, we will send an email to confirm the completion.`
      );
      $("#confirm-button")
        .text("Verify")
        .data("action", "verify")
        .data("id", notificationId);
    } else if (action === "reject") {
      $("#modal-title").text("Confirm Rejection");
      $("#modal-message").html(
        `If you reject <strong>${name}</strong>, we will notify them of the rejection.`
      );
      $("#confirm-button")
        .text("Reject")
        .data("action", "reject")
        .data("id", notificationId);
    }
  }

  console.log(activeTab);
  // Function to handle the modal confirmation
  $("#confirm-button").click(function () {
    const action = $(this).data("action");
    const notificationId = $(this).data("id");
    console.log("Action: ", action); 
    console.log("Notification ID: ", notificationId); 

    // Hide the confirmation modal
    $("#confirmation-modal").addClass("hidden");

    let formSelector;
    if (activeTab === "user") {
      formSelector = "#userForm";
    } else {
      formSelector = "#instituteForm";
    }
    // Find the form
    const form = $(formSelector);
    // Remove existing hidden inputs to avoid duplication
    form.find("input[name='action']").remove();
    form.find("input[name='id']").remove();

    // Append new hidden inputs with action and notificationId
    $("<input>")
      .attr({
        type: "hidden",
        name: "action",
        value: action,
      })
      .appendTo(form);

    $("<input>")
      .attr({
        type: "hidden",
        name: "id",
        value: notificationId,
      })
      .appendTo(form);

    // Display an alert based on action
    if (action === "verify") {
      alert(`This ${activeTab} has been verified and an email has been sent.`);
    } else if (action === "reject") {
      alert(
        `This ${activeTab} has been rejected. Please ask them to fill in the correct information.`
      );
    }

    // Submit the form
    form.submit();
  });

  // Function to close the modal
  $("#cancel-button").click(function () {
    $("#confirmation-modal").addClass("hidden");
  });

  // Show modal on button click (verify)
  $(document).on("click", ".verify-button", function () {
    const notificationId = $(this).data("id");
    const name = $(this)
      .closest(".flex.items-center.justify-between")
      .find(".font-bold")
      .text();
    showModal("verify", name, notificationId);
  });

  // Show modal on button click (reject)
  $(document).on("click", ".reject-button", function () {
    const notificationId = $(this).data("id");
    const name = $(this)
      .closest(".flex.items-center.justify-between")
      .find(".font-bold")
      .text();
    showModal("reject", name, notificationId);
  });



  // Function to handle the modal confirmation
  $(".viewForm").click(function () {
   
    const action = $(this).data("action");
    const notificationId = parseInt($(this).data("id"));

    console.log("Notification ID: ", notificationId);

    if (action == "view") {
      window.location.href = `./../Notification/instituteSignUp.php?id=${notificationId}&action=${action}`;
  }

    // let formSelector;
    // if (activeTab === "user") {
    //   formSelector = "#userForm";
    // } else {
    //   formSelector = "#instituteForm";
    // }
    // // Find the form
    // const form = $(formSelector);
    // // Remove existing hidden inputs to avoid duplication
    // form.find("input[name='action']").remove();
    // form.find("input[name='id']").remove();

    // // Append new hidden inputs with action and notificationId
    // $("<input>")
    //   .attr({
    //     type: "hidden",
    //     name: "action",
    //     value: action,
    //   })
    //   .appendTo(form);

    // $("<input>")
    //   .attr({
    //     type: "hidden",
    //     name: "id",
    //     value: notificationId,
    //   })
    //   .appendTo(form);

    // // Display an alert based on action
    // if (action === "verify") {
    //   alert(`This ${activeTab} has been verified and an email has been sent.`);
    // } else if (action === "reject") {
    //   alert(
    //     `This ${activeTab} has been rejected. Please ask them to fill in the correct information.`
    //   );
    // }

    // // Submit the form
    // form.submit();
  });

  /* ............
     ............
     End HPP Code */
});
