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
      price: "250,000 MMK (500 Coins)",
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
      price: "300,000 MMK (600 Coins)",
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
      price: "250,000 MMK (500 Coins)",
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
      price: "300,000 MMK (600 Coins)",
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
      price: "250,000 MMK (500 Coins)",
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
      price: "300,000 MMK (600 Coins)",
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
      price: "250,000 MMK (500 Coins)",
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
      price: "300,000 MMK (600 Coins)",
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
      price: "250,000 MMK (500 Coins)",
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
      price: "300,000 MMK (600 Coins)",
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
        }" onclick="window.location.href='viewdetailsclass.php?id=${course.id}'">
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
                <p class="text-base font-bold">${course.price}</p>
                <button class="bg-primaryColor text-white px-2 py-1 rounded mt-2">Enroll</button>
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
        price: "250,000 MMK (500 Coins)",
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
        price: "300,000 MMK (600 Coins)",
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
        price: "270,000 MMK (540 Coins)",
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
        price: "350,000 MMK (700 Coins)",
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
        price: "280,000 MMK (560 Coins)",
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
        price: "320,000 MMK (640 Coins)",
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
        price: "290,000 MMK (580 Coins)",
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
        price: "260,000 MMK (520 Coins)",
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
        price: "310,000 MMK (620 Coins)",
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
        price: "280,000 MMK (560 Coins)",
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
        price: "270,000 MMK (540 Coins)",
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
        price: "320,000 MMK (640 Coins)",
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
        price: "350,000 MMK (700 Coins)",
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
        price: "370,000 MMK (740 Coins)",
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
        price: "330,000 MMK (660 Coins)",
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
        price: "340,000 MMK (680 Coins)",
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
        price: "360,000 MMK (720 Coins)",
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
        price: "350,000 MMK (700 Coins)",
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
        price: "320,000 MMK (640 Coins)",
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
        price: "310,000 MMK (620 Coins)",
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
        price: "300,000 MMK (600 Coins)",
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
        price: "370,000 MMK (740 Coins)",
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
        price: "390,000 MMK (780 Coins)",
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
        price: "400,000 MMK (800 Coins)",
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
        price: "400,000 MMK (800 Coins)",
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
        price: "420,000 MMK (840 Coins)",
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
        price: "410,000 MMK (820 Coins)",
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
        price: "430,000 MMK (860 Coins)",
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
        price: "440,000 MMK (880 Coins)",
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
        price: "450,000 MMK (900 Coins)",
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
        price: "460,000 MMK (920 Coins)",
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
        price: "470,000 MMK (940 Coins)",
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
        price: "480,000 MMK (960 Coins)",
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
        price: "490,000 MMK (980 Coins)",
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
        price: "500,000 MMK (1000 Coins)",
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
        price: "510,000 MMK (1020 Coins)",
        image: "../../storages/classPhoto.png",
      },
    ],
  };

  function generateCourseSlider(course) {
    return `
<div class="col-span-3 shadow-md">
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
            <p class="text-base font-bold">${course.price}</p>
            <button class="bg-primaryColor text-white px-4 py-1 rounded mt-2"><a href="Auth/enrollment.php">Enroll</a></button>
        </div>
    </div>
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

  // Load initial tab's courses
  loadCourses("most-popular");

  // Tab click handler
  $(".tab-button").on("click", function () {
    $(".tab-button")
      .removeClass("border-primaryColor text-primaryColor")
      .addClass("text-gray-500 border-transparent");
    $(this).addClass("border-primaryColor text-primaryColor");
    const tab = $(this).data("tab");
    $(".tab-content").addClass("hidden");
    $(`#${tab}`).removeClass("hidden");
    loadCourses(tab);
  });

  // Carousel controls
  $("[data-carousel-next]").on("click", function () {
    const activeSlide = $("#controls-carousel [data-carousel-item].block");
    const nextSlide = activeSlide.next("[data-carousel-item]");
    if (nextSlide.length) {
      activeSlide.removeClass("block").addClass("hidden");
      nextSlide.removeClass("hidden").addClass("block");
    } else {
      activeSlide.removeClass("block").addClass("hidden");
      $("#controls-carousel [data-carousel-item]")
        .first()
        .removeClass("hidden")
        .addClass("block");
    }
  });

  $("[data-carousel-prev]").on("click", function () {
    const activeSlide = $("#controls-carousel [data-carousel-item].block");
    const prevSlide = activeSlide.prev("[data-carousel-item]");
    if (prevSlide.length) {
      activeSlide.removeClass("block").addClass("hidden");
      prevSlide.removeClass("hidden").addClass("block");
    } else {
      activeSlide.removeClass("block").addClass("hidden");
      $("#controls-carousel [data-carousel-item]")
        .last()
        .removeClass("hidden")
        .addClass("block");
    }
  });

  // Handle accordion click
  $(".accordion-button").click(function () {
    var tab = $(this).data("tab");
    $(".accordion-content").slideUp();
    if (!$(this).next(".accordion-content").is(":visible")) {
      $(this).next(".accordion-content").slideDown();
    }
  });

  // For accordion
  function generateCourseCards(category) {
    return courses[category]
      .map(
        (course) => `
    <div class="w-64 shadow-md flex-shrink-0">
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
                <p class="text-base font-bold">${course.price}</p>
                <button class="bg-primaryColor text-white px-4 py-1 rounded mt-2"><a href="Auth/enrollment.php">Enroll</a></button>
            </div>
        </div>
    </div>
`
      )
      .join("");
  }

  $(".accordion-button").click(function () {
    const tab = $(this).data("tab");
    const content = $(`#mobile-${tab}`);
    const icon = $(this).find("ion-icon");

    if (content.hasClass("hidden")) {
      $(".accordion-content").addClass("hidden");
      $(".accordion-button ion-icon").attr("name", "chevron-down-outline");
      content.removeClass("hidden");
      icon.attr("name", "chevron-up-outline");

      if (!content.find(".w-64").length) {
        content.find(".overflow-x-auto").html(generateCourseCards(tab));
      }
    } else {
      content.addClass("hidden");
      icon.attr("name", "chevron-down-outline");
    }
  });
});
