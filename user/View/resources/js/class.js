$(document).ready(function () {
  // For Institutes & Available Classes
  $(".toggleButton").on("click", function () {
    const $button = $(this);
    const $checkboxList = $button.siblings(".checkbox-list");
    const $additionalCheckboxes = $checkboxList.find(".additional-checkboxes");
    const $icon = $button.find(".toggleIcon");

    $additionalCheckboxes.toggleClass("hidden");
    $checkboxList.toggleClass("expanded");

    if ($icon.attr("name") === "chevron-down-outline") {
      $icon.attr("name", "chevron-up-outline");
      $button.contents().first().replaceWith("See less");
    } else {
      $icon.attr("name", "chevron-down-outline");
      $button.contents().first().replaceWith("See more");
    }
  });

  // Function to render stars
  function renderStars(rating) {
    return `${Array(Math.floor(rating))
      .fill('<ion-icon name="star" class="text-yellow-400"></ion-icon>')
      .join("")}
${
  rating % 1 !== 0
    ? '<ion-icon name="star-half" class="text-yellow-400"></ion-icon>'
    : ""
}
${Array(Math.floor(5 - rating))
  .fill('<ion-icon name="star-outline" class="text-yellow-400"></ion-icon>')
  .join("")}`;
  }

  $("#rating-label-4-5").html(`${renderStars(4.5)} 4.5 - up (234 courses)`);
  $("#rating-label-4").html(`${renderStars(4)} 4 - 4.4 (456 courses)`);
  $("#rating-label-3-5").html(`${renderStars(3.5)} 3.5 - 3.9 (678 courses)`);
  $("#rating-label-3").html(`${renderStars(3)} 3 - 3.4 (890 courses)`);

  const ROWPERPAGE = 5;
  let currentPage = 1;

  // Sample data for classes
  const data = [
    {
      id: 1,
      name: "React for Beginners",
      institute: "Global Code Institute",
      instructor: "Matthew Davids",
      rating: 4.5,
      enrolledStudents: 301,
      startDate: "21/7/2024",
      endDate: "25/12/2024",
      deadline: "20/7/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 2,
      name: "Advanced JavaScript",
      institute: "Tech Innovators Academy",
      instructor: "Matthew Davids",
      rating: 4.0,
      enrolledStudents: 401,
      startDate: "10/8/2024",
      endDate: "15/12/2024",
      deadline: "5/8/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 3,
      name: "React for Beginners",
      institute: "Global Code Institute",
      instructor: "Matthew Davids",
      rating: 4.5,
      enrolledStudents: 301,
      startDate: "21/7/2024",
      endDate: "25/12/2024",
      deadline: "20/7/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 4,
      name: "Advanced JavaScript",
      institute: "Tech Innovators Academy",
      instructor: "Matthew Davids",
      rating: 4.0,
      enrolledStudents: 601,
      startDate: "10/8/2024",
      endDate: "15/12/2024",
      deadline: "5/8/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 5,
      name: "React for Beginners",
      institute: "Global Code Institute",
      instructor: "Matthew Davids",
      rating: 4.5,
      enrolledStudents: 301,
      startDate: "21/7/2024",
      endDate: "25/12/2024",
      deadline: "20/7/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 6,
      name: "Advanced JavaScript",
      institute: "Tech Innovators Academy",
      instructor: "Matthew Davids",
      rating: 4.0,
      enrolledStudents: 301,
      startDate: "10/8/2024",
      endDate: "15/12/2024",
      deadline: "5/8/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 7,
      name: "React for Beginners",
      institute: "Global Code Institute",
      instructor: "Matthew Davids",
      rating: 4.5,
      enrolledStudents: 801,
      startDate: "21/7/2024",
      endDate: "25/12/2024",
      deadline: "20/7/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 8,
      name: "Advanced JavaScript",
      institute: "Tech Innovators Academy",
      instructor: "Matthew Davids",
      rating: 4.0,
      enrolledStudents: 301,
      startDate: "10/8/2024",
      endDate: "15/12/2024",
      deadline: "5/8/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 9,
      name: "React for Beginners",
      institute: "Global Code Institute",
      instructor: "Matthew Davids",
      rating: 4.5,
      enrolledStudents: 301,
      startDate: "21/7/2024",
      endDate: "25/12/2024",
      deadline: "20/7/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    {
      id: 10,
      name: "Advanced JavaScript",
      institute: "Tech Innovators Academy",
      instructor: "Matthew Davids",
      rating: 4.0,
      enrolledStudents: 301,
      startDate: "10/8/2024",
      endDate: "15/12/2024",
      deadline: "5/8/2024",
      price: "250,000 MMK",
      coin: 500,
      image: "../../storages/classPhoto.png",
    },
    // Add more data as needed
  ];

  function renderCourses(data, page) {
    const container = $("#classes-container");
    container.empty();
    const start = (page - 1) * ROWPERPAGE;
    const end = start + ROWPERPAGE;
    const paginatedData = data.slice(start, end);

    paginatedData.forEach((course) => {
      const courseHTML = `
        <div class="flex justify-between border-b-2 py-5 cursor-pointer" data-id="${
          course.id
        }" onclick="window.location.href='viewdetailsclass.php?id=${
        course.id
      }'">
            <div class="flex justify-between items-start space-x-4 ">
                <div>
                    <img src="${
                      course.image
                    }" alt="" class="w-32 h-32 object-cover">
                </div>
                <div>
                    <h2 class="text-base text-black font-bold">${
                      course.name
                    }</h2>
                    <p class="text-sm text-gray-500">${course.institute}</p>
                    <p class="text-sm text-gray-600 my-2"><span class="font-bold">${
                      course.rating
                    }</span> ${renderStars(course.rating)} (${
        course.enrolledStudents
      })</p>
                    <p class="text-sm text-gray-600">Start Date: ${
                      course.startDate
                    }</p>
                    <p class="text-sm text-gray-600">End Date: ${
                      course.endDate
                    }</p>
                    <p class="text-sm font-bold text-red-400 inline">Enrollment Deadline: <span class="text-gray-600">${
                      course.deadline
                    }</span></p>
                </div>
            </div>
            <div class="flex flex-col justify-between">
             <div class="md:mt-2 text-gray-600">
                                <svg class="inline font-bold md:w-6 md:h-6 w-4 h-4 md:mr-1 md:mt-0 mt-2 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z"/><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/></g></svg>
                                <span class="inline font-bold text-base relative md:top-0 top-0.5 mb-2">100</span>
                                 <p class="text-base font-bold">${
                                   course.price
                                 }</p>
                            </div>             
                <button class="bg-primaryColor text-white px-2 py-1 rounded mt-2"><a href="../../View/resources/Auth/enrollment.php">Enroll</a></button>
            </div>
        </div>
    `;
      container.append(courseHTML);
    });
  }

  function renderPagination(totalPages, currentPage) {
    const pagination = $("#pagination");
    pagination.empty();

    // Add Previous Button
    if (currentPage > 1) {
      pagination.append(
        `<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray rounded-l" data-page="${
          currentPage - 1
        }"><ion-icon name="chevron-back-outline"></ion-icon></a></li>`
      );
    }

    // Add Page Numbers
    for (let i = 1; i <= totalPages; i++) {
      const activeClass =
        i === currentPage
          ? "z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100"
          : "flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100";
      pagination.append(
        `<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight border ${activeClass}" data-page="${i}">${i}</a></li>`
      );
    }

    // Add Next Button
    if (currentPage < totalPages) {
      pagination.append(
        `<li><a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray rounded-r" data-page="${
          currentPage + 1
        }"><ion-icon name="chevron-forward-outline"></ion-icon></a></li>`
      );
    }
  }

  function updateUI() {
    const totalPages = Math.ceil(data.length / ROWPERPAGE);
    renderCourses(data, currentPage);
    renderPagination(totalPages, currentPage);
  }

  // Initialize UI
  updateUI();

  // Pagination changes on clicking
  $("#pagination").on("click", "a", function (e) {
    e.preventDefault();
    currentPage = $(this).data("page");
    updateUI();
  });

  const courses = {
    "most-popular": [
      {
        id: 1,
        name: "React for Beginners",
        institute: "Global Code Institute",
        instructor: "Matthew Davids",
        rating: 4.5,
        enrolledStudents: 301,
        startDate: "21/7/2024",
        endDate: "25/12/2024",
        deadline: "20/7/2024",
        price: "250,000 MMK",
        coin: 500,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 2,
        name: "Advanced JavaScript",
        institute: "Tech Innovators Academy",
        instructor: "Matthew Davids",
        rating: 4.0,
        enrolledStudents: 401,
        startDate: "10/8/2024",
        endDate: "15/12/2024",
        deadline: "15/8/2024",
        price: "300,000 MMK",
        coin: 600,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 3,
        name: "Introduction to Python",
        institute: "Coding Academy",
        instructor: "Sophia Liu",
        rating: 4.6,
        enrolledStudents: 320,
        startDate: "1/8/2024",
        endDate: "20/12/2024",
        deadline: "30/7/2024",
        price: "270,000 MMK",
        coin: 540,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 4,
        name: "Full Stack",
        institute: "Tech Innovators Academy",
        instructor: "Robert Brown",
        rating: 4.3,
        enrolledStudents: 350,
        startDate: "5/9/2024",
        endDate: "10/1/2025",
        deadline: "11/9/2024",
        price: "350,000 MMK",
        coin: 700,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 5,
        name: "Data Analysis with R",
        institute: "Data Science Institute",
        instructor: "Emily Johnson",
        rating: 4.4,
        enrolledStudents: 290,
        startDate: "15/8/2024",
        endDate: "30/11/2024",
        deadline: "10/8/2024",
        price: "280,000 MMK",
        coin: 650,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 6,
        name: "Machine Learning",
        institute: "AI Academy",
        instructor: "David Lee",
        rating: 4.7,
        enrolledStudents: 380,
        startDate: "20/8/2024",
        endDate: "15/12/2024",
        deadline: "15/8/2024",
        price: "320,000 MMK",
        coin: 650,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 7,
        name: "UI/UX Design",
        institute: "Design School",
        instructor: "Laura Wilson",
        rating: 4.6,
        enrolledStudents: 310,
        startDate: "25/7/2024",
        endDate: "30/11/2024",
        deadline: "20/7/2024",
        price: "290,000 MMK",
        coin: 580,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 8,
        name: "Introduction to SQL",
        institute: "Database Institute",
        instructor: "James Smith",
        rating: 4.2,
        enrolledStudents: 270,
        startDate: "1/9/2024",
        endDate: "15/12/2024",
        deadline: "25/8/2024",
        price: "260,000 MMK",
        coin: 520,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 9,
        name: "Cybersecurity Essentials",
        institute: "Security Academy",
        instructor: "Anna Davis",
        rating: 4.5,
        enrolledStudents: 340,
        startDate: "10/8/2024",
        endDate: "20/12/2024",
        deadline: "5/8/2024",
        price: "310,000 MMK",
        coin: 620,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 10,
        name: "Cloud Computing Basics",
        institute: "Cloud Institute",
        instructor: "John Doe",
        rating: 4.3,
        enrolledStudents: 320,
        startDate: "15/7/2024",
        endDate: "30/11/2024",
        deadline: "10/7/2024",
        price: "280,000 MMK",
        coin: 560,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 11,
        name: "Digital Marketing Strategies",
        institute: "Marketing School",
        instructor: "Megan Green",
        rating: 4.4,
        enrolledStudents: 300,
        startDate: "1/8/2024",
        endDate: "30/12/2024",
        deadline: "25/7/2024",
        price: "270,000 MMK",
        coin: 540,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 12,
        name: "Ethical Hacking Basics",
        institute: "Security Academy",
        instructor: "Michael Brown",
        rating: 4.6,
        enrolledStudents: 330,
        startDate: "10/9/2024",
        endDate: "20/1/2025",
        deadline: "5/9/2024",
        price: "320,000 MMK",
        coin: 640,
        image: "../../storages/classPhoto.png",
      },
    ],
    new: [
      {
        id: 1,
        name: "Python for Data Science",
        institute: "Data Science Academy",
        instructor: "Jane Doe",
        rating: 4.7,
        enrolledStudents: 500,
        startDate: "01/9/2024",
        endDate: "30/12/2024",
        deadline: "31/8/2024",
        price: "350,000 MMK",
        coin: 700,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 2,
        name: "Introduction to Machine Learning",
        institute: "AI Institute",
        instructor: "Sam Roberts",
        rating: 4.8,
        enrolledStudents: 450,
        startDate: "01/10/2024",
        endDate: "30/12/2024",
        deadline: "25/9/2024",
        price: "370,000 MMK",
        coin: 740,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 3,
        name: "Java Programming Essentials",
        institute: "Programming Academy",
        instructor: "Lisa Brown",
        rating: 4.6,
        enrolledStudents: 420,
        startDate: "05/9/2024",
        endDate: "15/12/2024",
        deadline: "30/8/2024",
        price: "330,000 MMK",
        coin: 660,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 4,
        name: "Data Visualization with Python",
        institute: "Data Science Institute",
        instructor: "Robert King",
        rating: 4.7,
        enrolledStudents: 470,
        startDate: "10/9/2024",
        endDate: "20/12/2024",
        deadline: "5/9/2024",
        price: "340,000 MMK",
        coin: 680,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 5,
        name: "Introduction to Blockchain",
        institute: "Blockchain Academy",
        instructor: "Anna Wilson",
        rating: 4.5,
        enrolledStudents: 400,
        startDate: "15/10/2024",
        endDate: "31/12/2024",
        deadline: "10/10/2024",
        price: "360,000 MMK",
        coin: 720,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 6,
        name: "Web Development with Angular",
        institute: "Tech Innovators Academy",
        instructor: "Matthew Davids",
        rating: 4.4,
        enrolledStudents: 420,
        startDate: "20/9/2024",
        endDate: "31/12/2024",
        deadline: "15/9/2024",
        price: "350,000 MMK",
        coin: 600,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 7,
        name: "Advanced Data Structures",
        institute: "Coding Academy",
        instructor: "Sophia Liu",
        rating: 4.6,
        enrolledStudents: 340,
        startDate: "01/11/2024",
        endDate: "15/12/2024",
        deadline: "25/10/2024",
        price: "320,000 MMK",
        coin: 640,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 8,
        name: "Cloud Security Essentials",
        institute: "Cloud Institute",
        instructor: "James Smith",
        rating: 4.5,
        enrolledStudents: 390,
        startDate: "05/10/2024",
        endDate: "30/12/2024",
        deadline: "30/9/2024",
        price: "310,000 MMK",
        coin: 620,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 9,
        name: "Digital Marketing Analytics",
        institute: "Marketing School",
        instructor: "Megan Green",
        rating: 4.4,
        enrolledStudents: 310,
        startDate: "10/10/2024",
        endDate: "20/12/2024",
        deadline: "5/10/2024",
        price: "300,000 MMK",
        coin: 600,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 10,
        name: "Game Development with Unity",
        institute: "Gaming Academy",
        instructor: "Laura Wilson",
        rating: 4.6,
        enrolledStudents: 330,
        startDate: "15/11/2024",
        endDate: "31/1/2025",
        deadline: "10/11/2024",
        price: "370,000 MMK",
        coin: 740,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 11,
        name: "Intro to Cybersecurity",
        institute: "Security Academy",
        instructor: "Michael Brown",
        rating: 4.7,
        enrolledStudents: 340,
        startDate: "01/12/2024",
        endDate: "30/4/2025",
        deadline: "25/11/2024",
        price: "390,000 MMK",
        coin: 780,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 12,
        name: "Ethical Hacking Intermediate",
        institute: "Security Academy",
        instructor: "Anna Davis",
        rating: 4.6,
        enrolledStudents: 310,
        startDate: "15/12/2024",
        endDate: "30/5/2025",
        deadline: "10/12/2024",
        price: "400,000 MMK",
        coin: 800,
        image: "../../storages/classPhoto.png",
      },
    ],
    trending: [
      {
        id: 1,
        name: "Machine Learning Basics",
        institute: "AI Institute",
        instructor: "John Smith",
        rating: 4.8,
        enrolledStudents: 600,
        startDate: "15/9/2024",
        endDate: "30/12/2024",
        deadline: "14/9/2024",
        price: "400,000 MMK",
        coin: 800,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 2,
        name: "Deep Learning Specialization",
        institute: "AI Institute",
        instructor: "Robert King",
        rating: 4.9,
        enrolledStudents: 620,
        startDate: "20/9/2024",
        endDate: "31/12/2024",
        deadline: "15/9/2024",
        price: "420,000 MMK",
        coin: 840,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 3,
        name: "Advanced Data Analysis",
        institute: "Data Science Institute",
        instructor: "Emily Johnson",
        rating: 4.7,
        enrolledStudents: 500,
        startDate: "01/10/2024",
        endDate: "20/12/2024",
        deadline: "25/9/2024",
        price: "410,000 MMK",
        coin: 820,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 4,
        name: "AI for Business",
        institute: "AI Academy",
        instructor: "David Lee",
        rating: 4.6,
        enrolledStudents: 540,
        startDate: "10/10/2024",
        endDate: "30/12/2024",
        deadline: "5/10/2024",
        price: "430,000 MMK",
        coin: 860,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 5,
        name: "Blockchain Development",
        institute: "Blockchain Academy",
        instructor: "Anna Wilson",
        rating: 4.8,
        enrolledStudents: 550,
        startDate: "15/10/2024",
        endDate: "30/12/2024",
        deadline: "10/10/2024",
        price: "440,000 MMK",
        coin: 880,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 6,
        name: "Robotic Process Automation",
        institute: "Tech Institute",
        instructor: "John Doe",
        rating: 4.7,
        enrolledStudents: 510,
        startDate: "01/11/2024",
        endDate: "15/12/2024",
        deadline: "25/10/2024",
        price: "450,000 MMK",
        coin: 900,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 7,
        name: "Advanced Cybersecurity Techniques",
        institute: "Security Academy",
        instructor: "Michael Brown",
        rating: 4.6,
        enrolledStudents: 470,
        startDate: "10/11/2024",
        endDate: "31/12/2024",
        deadline: "5/11/2024",
        price: "460,000 MMK",
        coin: 920,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 8,
        name: "Introduction to Cloud Services",
        institute: "Cloud Institute",
        instructor: "James Smith",
        rating: 4.5,
        enrolledStudents: 500,
        startDate: "15/11/2024",
        endDate: "31/12/2024",
        deadline: "10/11/2024",
        price: "470,000 MMK",
        coin: 930,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 9,
        name: "Advanced Front-End Development",
        institute: "Design School",
        instructor: "Laura Wilson",
        rating: 4.6,
        enrolledStudents: 520,
        startDate: "01/12/2024",
        endDate: "30/1/2025",
        deadline: "25/11/2024",
        price: "480,000 MMK",
        coin: 960,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 10,
        name: "Introduction to Agile Methodologies",
        institute: "Business School",
        instructor: "Emily Johnson",
        rating: 4.5,
        enrolledStudents: 490,
        startDate: "05/12/2024",
        endDate: "31/1/2025",
        deadline: "30/11/2024",
        price: "490,000 MMK",
        coin: 980,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 11,
        name: "Data Science with R",
        institute: "Data Science Institute",
        instructor: "Robert King",
        rating: 4.7,
        enrolledStudents: 530,
        startDate: "10/12/2024",
        endDate: "15/2/2025",
        deadline: "5/12/2024",
        price: "500,000 MMK",
        coin: 1000,
        image: "../../storages/classPhoto.png",
      },
      {
        id: 12,
        name: "Big Data Analytics",
        institute: "Data Science Academy",
        instructor: "Jane Doe",
        rating: 4.8,
        enrolledStudents: 540,
        startDate: "15/12/2024",
        endDate: "30/3/2025",
        deadline: "10/12/2024",
        price: "510,000 MMK",
        coin: 1020,
        image: "../../storages/classPhoto.png",
      },
    ],
  };

  function generateCourseSlider(course) {
    return `
<div class="col-span-4 md:col-span-3 shadow-md">
    <a href="viewdetailsclass.php?id=${course.id}" class="block">
        <img class="rounded-t-lg w-full" src="${course.image}" alt="" />
        <div class="p-4">
            <h2 class="text-base text-black font-bold">${course.name}</h2>
            <p class="text-sm text-gray-500">${course.institute}</p>
            <p class="text-sm text-gray-600 mt-2">${course.instructor}</p>
            <p class="text-sm text-gray-600 mb-2"><span class="font-bold">${course.rating}</span> ⭐ (${course.enrolledStudents})</p>
            <p class="text-sm text-gray-600">Start Date: ${course.startDate}</p>
            <p class="text-sm text-gray-600">End Date: ${course.endDate}</p>
            <p class="text-sm font-bold text-red-400 inline">Enrollment Deadline: <span class="text-gray-600">${course.deadline}</span></p>
            <div class="flex justify-between items-center">
                <div class="mt-2 text-gray-600">
                                <svg class="inline font-bold md:w-6 md:h-6 w-4 h-4 md:mr-1 md:mt-0 mt-2 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z"/><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/></g></svg>
                                <span class="inline font-bold text-base relative md:top-0 top-0.5">${course.coin}</span>
                                <p class="text-base font-bold">${course.price}</p>
                </div>
                
                <button class="bg-primaryColor text-white px-4 py-1 rounded mt-2"><a href="../../View/resources/Auth/enrollment.php"">Enroll</a></button>
            </div>
        </div>
    </a>
</div>`;
}

  function loadCourses(tab) {
    const data = courses[tab];
    const carouselWrapper = $(`#${tab}-slider`);
    carouselWrapper.empty();

    const itemsPerSlide = 4;

    for (let i = 0; i < data.length; i += itemsPerSlide) {
      const slide = $(
        '<div class="hidden duration-700 ease-in-out" data-carousel-item></div>'
      );
      const slideContent = $(
        '<div class="w-full py-1 h-full grid grid-cols-12 gap-6 overflow-x-scroll scroll-smooth no-scrollbar"></div>'
      );
      for (let j = i; j < i + itemsPerSlide && j < data.length; j++) {
        slideContent.append(generateCourseSlider(data[j]));
      }
      slide.append(slideContent);
      carouselWrapper.append(slide);
    }

    // Activate the first slide
    carouselWrapper.children().first().addClass("block").removeClass("hidden");
  }

  function initializeCarousel(tab) {
    const carouselWrapper = $(`#${tab}-slider`);
    carouselWrapper
      .children()
      .first()
      .addClass("block active")
      .removeClass("hidden");
  }

  // Load initial tab's courses
  loadCourses("most-popular");
  initializeCarousel("most-popular");

  // Tab click handler
  $(".tab-button").on("click", function () {
    // Remove active styles from all tabs
    $(".tab-button")
      .removeClass("text-primaryColor border-primaryColor")
      .addClass("text-gray-500 border-transparent");

    // Add active styles to the clicked tab
    $(this)
      .removeClass("text-gray-500 border-transparent")
      .addClass("text-primaryColor border-primaryColor");

    // Show corresponding content
    const tab = $(this).data("tab");
    $(".tab-content").addClass("hidden");
    $(`#${tab}`).removeClass("hidden");
    loadCourses(tab);
    initializeCarousel(tab);
  });

  // Carousel controls
  $("button[data-carousel-next]").click(function () {
    let activeTab = $(".tab-content:not(.hidden)").attr("id");
    const items = $(`#${activeTab}-slider [data-carousel-item]`);
    const activeItem = items.filter(".active");
    let nextItem = activeItem.next();
    if (!nextItem.length) {
      nextItem = items.first();
    }
    activeItem.removeClass("active block").addClass("hidden");
    nextItem.addClass("active block").removeClass("hidden");
  });

  $("button[data-carousel-prev]").click(function () {
    let activeTab = $(".tab-content:not(.hidden)").attr("id");
    const items = $(`#${activeTab}-slider [data-carousel-item]`);
    const activeItem = items.filter(".active");
    let prevItem = activeItem.prev();
    if (!prevItem.length) {
      prevItem = items.last();
    }
    activeItem.removeClass("active block").addClass("hidden");
    prevItem.addClass("active block").removeClass("hidden");
  });

  // Handle accordion click
  // Initialize the accordion
  $(".accordion-content").each(function () {
    // Ensure that content is hidden initially
    $(this).css("max-height", "0");
  });

  $(".accordion-button").click(function () {
    const tab = $(this).data("tab");
    const content = $(`#mobile-${tab}`);
    const icon = $(this).find("ion-icon");

    // Slide up all accordion contents
    $(".accordion-content").not(content).slideUp().css("max-height", "0");
    $(".accordion-button")
      .not(this)
      .find("ion-icon")
      .attr("name", "chevron-down-outline");

    // Toggle the current content
    if (content.css("max-height") === "0px") {
      content.css("max-height", "1000px").slideDown();
      icon.attr("name", "chevron-up-outline");

      // Load course cards if empty
      if (!content.find(".w-64").length) {
        content.find(".overflow-x-auto").html(generateCourseCards(tab));
      }
    } else {
      content.slideUp().css("max-height", "0");
      icon.attr("name", "chevron-down-outline");
    }
  });

  // Optionally, initialize the first tab to open
  $(".accordion-button").first().trigger("click");

  // Generate course cards
  function generateCourseCards(category) {
    return courses[category]
      .map(
        (course) => `
        <div class="w-64 shadow-md flex-shrink-0" data-course-id="${course.id}">
          <a href="viewdetailsclass.php?id=${course.id}" class="block">
            <img class="rounded-t-lg w-full" src="${course.image}" alt="${course.name}" />
            <div class="p-4">
              <h2 class="text-base text-black font-bold">${course.name}</h2>
              <p class="text-sm text-gray-500">${course.institute}</p>
              <p class="text-sm text-gray-600 mt-2">${course.instructor}</p>
              <p class="text-sm text-gray-600 mb-2">
                <span class="font-bold">${course.rating}</span> ⭐ (${course.enrolledStudents})
              </p>
              <p class="text-sm text-gray-600">Start Date: ${course.startDate}</p>
              <p class="text-sm text-gray-600">End Date: ${course.endDate}</p>
              <p class="text-sm font-bold text-red-400 inline">
                Enrollment Deadline: <span class="text-gray-600">${course.deadline}</span>
              </p>
              <div class="flex justify-between items-center">
               <div class="mt-2 text-gray-600">
                                <svg class="inline font-bold md:w-6 md:h-6 w-5 h-5 md:mr-1 md:mt-0 mt-2 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z"/><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/></g></svg>
                                <span class="inline font-bold md:text-xl text-base relative md:top-0 top-0.5">${course.coin}</span>
                </div>
                <p class="text-base font-bold">${course.price}</p>
                <button class="bg-primaryColor text-white px-4 py-1 rounded mt-2">
                  <a href="../../View/resources/Auth/enrollment.php">Enroll</a>
                </button>
              </div>
            </div>
          </a>
        </div>
      `
      )
      .join("");
  }
});
