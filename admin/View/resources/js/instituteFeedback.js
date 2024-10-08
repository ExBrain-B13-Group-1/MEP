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
               <p>After thoroughly evaluating the reported review, we have determined that it <span class="text-dark-blue dark:text-[#9aabff] font-semibold">does not infringe</span> on any guidelines and does not contain any inappropriate content.</p>
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
      logo: "../../../storages/instituteLogo.png",
      institute: "ABC Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia.",
      link: "https://abcinstitute/posts/123",
    },
    {
      type: "report",
      email: "xyz@gmail.com",
      logo: "../../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia.",
      link: "https://abcinstitute/posts/123",
    },
    {
      type: "feedback",
      email: "xyz@gmail.com",
      logo: "../../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit perspiciatis saepe illo quo. Optio, culpa molestiae, ipsa saepe officia alias sint nobis earum nihil id tempora modi. Debitis, possimus quidem!",
    },
    {
      type: "report",
      email: "xyz@gmail.com",
      logo: "../../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia.",
      link: "https://abcinstitute/posts/123",
    },
    {
      type: "report",
      email: "xyz@gmail.com",
      logo: "../../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia.",
      link: "https://abcinstitute/posts/123",
    },
    {
      type: "feedback",
      email: "xyz@gmail.com",
      logo: "../../../storages/instituteLogo.png",
      institute: "XYZ Institute",
      date: "July 18, 2024",
      content:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit perspiciatis saepe illo quo. Optio, culpa molestiae, ipsa saepe officia alias sint nobis earum nihil id tempora modi. Debitis, possimus quidem!",
    },
  ];

  // Constants
  const ITEMS_PER_PAGE = 2;
  let currentPage = 1;

  // Function to create report item
  function createReportItem(data) {
    const reportButtons = `
   <div class="flex flex-col justify-center">
     <button class="bg-thin-bg px-4 py-2 rounded text-sm flex items-center transition duration-100 transform hover:scale-105 verify-button">
       <ion-icon name="checkmark-done-circle-outline" class="text-lg mr-2 text-primary-main dark:text-[#9aabff]"></ion-icon>
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
   <div class="bg-gray-100 dark:bg-gray-700 dark:text-white/90 p-4 rounded-lg mb-4 report-item cursor-pointer" data-type="${
     data.type
   }" data-email="${data.email}" data-institute="${data.institute}">
     <div class="grid grid-cols-5 my-2">
       <div class="${
         data.type === "report" ? "col-span-4" : "col-span-5"
       } text-sm">
         <p>From: <span>${
           data.email
         }</span> <span class="px-2 py-1 bg-${data.type === "report" ? "red-500 text-white" : "dark-blue text-white"} rounded-md text-xs ml-2">${data.type.charAt(0).toUpperCase() + data.type.slice(1)}</span></p>
         <div class="flex items-center space-x-4 mt-1">
           <div class="w-12 h-12 rounded-full bg-gray-300"><img src="${
             data.logo
           }" class="w-12 h-12 rounded-full"></div>
           <div>
             <p class="font-semibold">${data.institute}</p>
             <p class="text-sm text-gray-600 dark:text-gray-400">${data.date}</p>
           </div>
         </div>
         <p class="mt-1">${data.content}</p>
         ${
           data.link
             ? `<p class="text-blue-500 dark:text-blue-400 mt-1">Reported Post Link: <a href="${data.link}">${data.link}</a></p>`
             : ""
         }
       </div>
       ${data.type === "report" ? reportButtons : ""}
     </div>
   </div>
 `;
  }

  // Function to render items for the current page
  function renderPage() {
    const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
    const endIndex = startIndex + ITEMS_PER_PAGE;
    const itemsToDisplay = instituteFeedbacks.slice(startIndex, endIndex);

    const container = $("#report-feedback-container");
    container.empty();
    itemsToDisplay.forEach((data) => {
      container.append(createReportItem(data));
    });

    // Attach event listeners after rendering items
    attachEventListeners();
  }

  // Function to create pagination controls
  function createPaginationControls() {
    const totalPages = Math.ceil(instituteFeedbacks.length / ITEMS_PER_PAGE);
    const pagination = $("#pagination-controls");
    pagination.empty();

   // Add Previous Button
   if (currentPage > 1) {
    pagination.append(
      '<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white rounded-l" data-page="' +
        (currentPage - 1) +
        '"><ion-icon name="chevron-back-outline"></ion-icon></a></li>'
    );
  }
  for (let i = 1; i <= totalPages; i++) {
    const activeClass =
      i === currentPage
        ? "z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
        : "flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white";
    pagination.append(
      `<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight border ${activeClass}" data-page="${i}">${i}</a></li>`
    );
  }
  // Add Next Button
  if (currentPage < totalPages) {
    pagination.append(
      '<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white rounded-r" data-page="' +
        (currentPage + 1) +
        '"><ion-icon name="chevron-forward-outline"></ion-icon></a></li>'
    );
  }

    // Add click event for pagination controls
    pagination.find("a").on("click", function (e) {
      e.preventDefault();
      currentPage = parseInt($(this).data("page"));
      renderPage();
      createPaginationControls();
    });
  }

  // Function to attach event listeners to buttons
  function attachEventListeners() {
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
  }

  // Function to update message content
  function updateMessageContent(type, email, instituteName) {
    $("#message-to").text(`To: ${email}`);
    $("#message-subject").text(`Subject: Review Report Result`);
    $("#message-content").html(type === "normal" ? normalText : warningText);
    $("#message-institute").text(instituteName);
  }

  // Initial render
  renderPage();
  createPaginationControls();
  /* ............
       ............
       End HPP Code */
});
