// *********** Use in instituteFeedback.php ***********

$(document).ready(function () {
  /* Start HPP Code 
       .............. 
       ..............*/

  // Normal Email Format
  const normalText = `
               <p>We hope this message finds you well.</p>
               <p>We are writing to inform you about the outcome of our assessment regarding the review reported by your institute.</p>
               <br>
               <p>After thoroughly evaluating the reported review, we have determined that it <span class="text-dark-blue font-semibold">does not infringe</span> on any guidelines and does not contain any inappropriate content.</p>
               <br>
               <p>We appreciate your understanding in this matter. Should you have any further questions or require additional assistance, please do not hesitate to contact us.</p>
               <br>
               <p>Thank you for your cooperation.</p>
               <p>Best regards,</p>
               <p>Myanmar Education Portal</p>
               <p>Admin</p>
           `;

  // Warning Email Format
  const warningText = `
               <p>We are writing to inform you about the outcome of our assessment regarding the review reported by your institute.</p>
               <br>
               <p>After thoroughly evaluating the reported review, we have found that it <span class="text-red-600 font-semibold">contains inappropriate content</span> that violates our guidelines.</p>
               <br>
               <p>As a result, we have <span class="text-red-600 font-semibold">issued a warning</span> to the user who posted the review.</p>
               <p>We have informed that such conduct is unacceptable and that further violations will result in more severe consequences.</p>
               <br>
               <p>Thank you for your cooperation.</p>
               <p>Best regards,</p>
               <p>Myanmar Education Portal</p>
               <p>Admin</p>
           `;

  // Sample Data
  const instituteFeedbacks = [
    {
      type: "report",
      email: "abc@gmail.com",
      logo: "../../storages/instituteLogo.png",
      institute: "ABC Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia.",
      link: "https://abcinstitute/posts/123",
    },
    {
      type: "report",
      email: "xyz@gmail.com",
      logo: "../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia.",
      link: "https://abcinstitute/posts/123",
    },
    {
      type: "feedback",
      email: "xyz@gmail.com",
      logo: "../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit perspiciatis saepe illo quo. Optio, culpa molestiae, ipsa saepe officia alias sint nobis earum nihil id tempora modi. Debitis, possimus quidem!",
    },
    {
      type: "report",
      email: "xyz@gmail.com",
      logo: "../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia.",
      link: "https://abcinstitute/posts/123",
    },
  ];

  // Function for creating report items including Normal & Warning Buttons
  function createReportItem(data) {
    const reportButtons = `
                   <div class="flex flex-col justify-center">
                       <button class="bg-thin-bg px-4 py-2 rounded text-sm flex items-center transition duration-100 transform hover:scale-105 verify-button">
                           <ion-icon name="checkmark-done-circle-outline" class="text-lg mr-2 text-primary-main"></ion-icon>
                           Normal
                       </button>
                       <div class="w-2 h-2"></div>
                       <button class="bg-thin-bg px-4 py-2 rounded text-sm flex items-center transition duration-100 transform hover:scale-105 warn-button">
                           <ion-icon name="alert-circle-outline" class="text-lg mr-2 text-red-500"></ion-icon>
                           Warning
                       </button>
                   </div>
               `;

    return `
                   <div class="bg-gray-100 p-4 rounded-lg mb-4 report-item cursor-pointer" data-type="${
                     data.type
                   }" data-email="${data.email}" data-institute="${data.institute}">
                       <div class="grid grid-cols-5 my-2">
                           <div class="${
                             data.type === "report"
                               ? "col-span-4"
                               : "col-span-5"
                           } text-sm">
                               <p>From: <span>${
                                 data.email
                               }</span> <span class="px-2 py-1 bg-${data.type === "report" ? "red-500 text-white" : "dark-blue text-white"} rounded-md text-xs ml-2">${data.type.charAt(0).toUpperCase() + data.type.slice(1)}</span></p>
                               <div class="flex items-center space-x-4 mt-1">
                                   <div class="w-12 h-12 rounded-full bg-gray-300"><img src="${
                                     data.logo
                                   }" class="w-12 h-12 rounded-full"></div>
                                   <div>
                                       <p class="font-semibold">${
                                         data.institute
                                       }</p>
                                       <p class="text-sm text-gray-600">${
                                         data.date
                                       }</p>
                                   </div>
                               </div>
                               <p class="mt-1">${data.content}</p>
                               ${
                                 data.link
                                   ? `<p class="text-blue-500 mt-1">Reported Post Link: <a href="${data.link}">${data.link}</a></p>`
                                   : ""
                               }
                           </div>
                           ${data.type === "report" ? reportButtons : ""}
                       </div>
                   </div>
               `;
  }

  instituteFeedbacks.forEach((data) => {
    $("#report-feedback-container").append(createReportItem(data));
  });

  // Verifying Button Clicking
  $(".verify-button").on("click", function () {
    $("#mailCard").removeClass("hidden");
    const email = $(this).closest(".report-item").data("email");
    const instituteName = $(this).closest(".report-item").data("institute");
    updateMessageContent("normal", email, instituteName);
  });

  // Warning Button Clicking
  $(".warn-button").on("click", function () {
    $("#mailCard").removeClass("hidden");
    const email = $(this).closest(".report-item").data("email");
    const instituteName = $(this).closest(".report-item").data("institute");
    updateMessageContent("warning", email, instituteName);
  });

  // Function for update back message content
  function updateMessageContent(type, email, instituteName) {
    $("#message-to").text(`To: ${email}`);
    $("#message-subject").text(`Subject: Review Report Result`);
    $("#message-content").html(type === "normal" ? normalText : warningText);
    $("#message-institute").text(instituteName);
  }

  /* ............
       ............
       End HPP Code */
});
