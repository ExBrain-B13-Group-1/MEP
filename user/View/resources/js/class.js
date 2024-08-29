$(document).ready(function () {
  // For Institutes & Available Classes

  const classurl = `http://localhost/MEP/user/Controller/ClassesController.php`;

  const searchWithCategory = `http://localhost/MEP/user/Controller/SearchClassWithCategoryController.php`;

  const searchByClassTitle = `http://localhost/MEP/user/Controller/SearchClassByTitleController.php`;

  const baseurl = "http://localhost/MEP/Institute/storages/uploads/";

  let dynurl = searchByClassTitle;
  let rowsPerPage = 10;
  let jsonData = [];
  let currentPage = 1;

  function fetchData() {
    $.ajax({
      url: dynurl,
      method: 'POST',
      dataType: 'json',
      data: {
        classtitle: ''
      },
      success: function (data) {
        // console.log(data);
        jsonData = data['classes'];
        if (data['success']) {
          $('#total-results').text(data['classes'].length);
          displayData();
          setupPagination();
        } else {
          alert('Classes not found');
        }
      },
      error: function (xhr, status, error) {
        console.error('Error fetching data:', status, error);
      }
    });
  }

  function displayData() {
    const container = $("#classes-container");
    container.empty();

    const startIndex = (currentPage - 1) * rowsPerPage;
    const endIndex = Math.min(startIndex + rowsPerPage, jsonData.length);

    for (let i = startIndex; i < endIndex; i++) {
      const rowData = jsonData[i];
      console.log(rowData);
      const row = `
                <div class="flex justify-between border-b-2 py-5 cursor-pointer" data-id="${rowData.id}" onclick="window.location.href='viewdetailsclass.php?classid=${rowData.id}'">
                  <div class="flex justify-between items-start space-x-4 ">
                      <div>
                          <img src="${baseurl}${rowData.c_photo}" alt="${rowData.c_photo}" class="md:w-[200px] w-[100px] object-cover">
                      </div>
                      <div>
                          <h2 class="text-base text-black font-bold">${rowData.c_title}</h2>
                          <p class="text-sm text-gray-500">${rowData.institute_name}</p>
                          <p class="text-sm text-gray-600">Start Date: <span class="text-gray-600 font-bold">${rowData.start_date}</span></p>
                          <p class="text-sm text-gray-600">End Date: <span class="text-gray-600 font-bold">${rowData.end_date}</span></p>
                          <p class="text-sm font-bold text-red-400 inline">Deadline: <span class="text-gray-600">${rowData.enrollment_deadline}</span></p>
                      </div>
                  </div>
                  <div class="flex flex-col justify-between">
                                  <div class="md:mt-2 text-gray-600">
                                        <p class="text-base font-bold whitespace-nowrap">${addThousandSeparator(rowData.c_fee)} MMK</p>
                                        <svg class="inline font-bold md:w-5 md:h-5 w-4 h-4 md:mr-1 md:mt-0 mt-2 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z"/><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/></g></svg>
                                        <span class="inline font-bold text-base relative md:top-0 top-0.5 mb-2">${rowData.credit_point}</span>
                                  </div>             
                      <button class="bg-primaryColor text-white px-2 py-1 rounded mt-2"><a href="http://localhost/MEP/user/Controller/CheckEnrollClassInfoController.php?classid=${rowData.id}">Enroll</a></button>
                  </div>
                </div>`;
      container.append(row);
    }
  }

  function setupPagination() {
    const container = $('#pagination');
    container.empty();
    const pageCount = Math.ceil(jsonData.length / rowsPerPage);
    const maxVisiblePages = 2; // Number of visible pages in the middle

    const prevButton = `
         <li>
             <a href="#" class="pagination-btn flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-700 hover:text-gray-100 " data-page="prev">
                 <span class="sr-only">Previous</span>
                 <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                 </svg>
             </a>
         </li>`;
    container.append(prevButton);

    if (pageCount <= maxVisiblePages + 2) { // +2 for the first and last page
      for (let i = 1; i <= pageCount; i++) {
        const pageButton = `
             <li>
                 <a href="#" class="pagination-btn flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border hover:bg-gray-400 border-gray-300 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ${i === currentPage ? 'active-page' : ''}" data-page="${i}">${i}</a>
             </li>`;
        container.append(pageButton);
      }
    } else {
      container.append(createPageButton(1));

      if (currentPage > 2) {
        container.append(createEllipsis());
      }

      let startPage = Math.max(2, currentPage - 1);
      let endPage = Math.min(pageCount - 1, currentPage + 1);

      for (let i = startPage; i <= endPage; i++) {
        container.append(createPageButton(i));
      }

      if (currentPage < pageCount - 1) {
        container.append(createEllipsis());
      }

      container.append(createPageButton(pageCount));
    }

    const nextButton = `
         <li>
             <a href="#" class="pagination-btn flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-700 hover:text-gray-100 " data-page="next">
                 <span class="sr-only">Next</span>
                 <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                 </svg>
             </a>
         </li>`;
    container.append(nextButton);
  }

  function createPageButton(page) {
    return `
      <li>
          <a href="#" class="pagination-btn flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border hover:bg-gray-400 border-gray-300 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ${page === currentPage ? 'active-page' : ''}" data-page="${page}">${page}</a>
      </li>`;
  }

  function createEllipsis() {
    return `
      <li>
          <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300">...</span>
      </li>`;
  }

  function handlePaginationClick(e) {
    e.preventDefault();
    const page = $(e.target).closest('a').data('page');

    if (page === 'prev') {
      if (currentPage > 1) {
        currentPage--;
      }
    } else if (page === 'next') {
      const pageCount = Math.ceil(jsonData.length / rowsPerPage);
      if (currentPage < pageCount) {
        currentPage++;
      }
    } else {
      currentPage = parseInt(page);
    }

    displayData();
    setupPagination(); // Re-render pagination with updated currentPage
  }

  $(document).on('click', '.pagination-btn', handlePaginationClick);

  fetchData();

  // filter by name 
  $('#search-input').on('keyup', () => {
    let title = $('#search-input').val();
    $('#category-select option').prop('selected', false);
    $('#category-select option[value="default"]').prop('selected', true);
    console.log(title);
    $.ajax({
      url: searchByClassTitle,
      method: 'POST',
      dataType: 'json',
      data: {
        classtitle: title
      },
      success: function (data) {
        jsonData = data['classes'];
        $('#total-results').text(data['classes'].length);
        displayData();
        setupPagination();
      },
      error: function (xhr, status, error) {
        console.error('Error fetching data:', status, error);
      }
    });
  });

  // search by category
  $('#category-select').on('change', () => {
    let category = $('#category-select').val();
    $.ajax({
      url: searchWithCategory,
      method: 'POST',
      dataType: 'json',
      data: {
        category: category
      },
      success: function (data) {
        // console.log(data);
        jsonData = data['classes'];
        console.log(jsonData);
        if (data['success']) {
          $('#total-results').text(data['classes'].length);
          displayData();
          setupPagination();
        } else {
          alert('Classes not found');
          window.location.reload();
        }
      },
      error: function (xhr, status, error) {
        console.error('Error fetching data:', status, error);
      }
    });
  });


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

  function addThousandSeparator(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  function generateCourseSlider(course) {
    return `
          <div class="col-span-4 md:col-span-3 shadow-md">
              <a href="http://localhost/MEP/user/View/resources/viewdetailsclass.php?classid=${course.id}">
                <img class="rounded-t-lg w-full h-[200px]" src="${baseurl}${course.c_photo}" alt="${course.c_photo}"/>
                  <div class="p-4">
                      <h2 class="text-base text-black font-bold">${course.c_title}</h2>
                      <p class="text-sm text-gray-500">${course.institute_name}</p>
                      <p class="text-sm text-gray-600 mt-2">${course.instructor_name}</p>
                      <p class="text-sm text-gray-600">Start Date: ${course.start_date}</p>
                      <p class="text-sm text-gray-600">End Date: ${course.end_date}</p>
                      <p class="text-sm font-bold text-red-400 inline">Enrollment Deadline: <span class="text-gray-600">${course.enrollment_deadline}</span></p>
                      <div class="flex justify-between items-center">
                          <div class="mt-2 text-gray-600">
                              <p class="text-base font-bold">${addThousandSeparator(course.c_fee)} MMK</p>
                              <svg class="inline font-bold md:w-5 md:h-5 w-4 h-4 md:mr-1 md:mt-0 mt-3 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z"/><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/></g></svg>
                              <span class="inline font-bold text-base relative md:top-0 top-0.5">${course.credit_point}</span>
                          </div>
                          <button class="bg-primaryColor text-white px-4 py-1 rounded mt-2">
                            <a href="http://localhost/MEP/user/Controller/CheckEnrollClassInfoController.php?classid=${course.id}">Enrolls</a>
                          </button>
                      </div>
                  </div>
              </a>
          </div>`;
  }

  async function loadCourses(tab) {
    await $.ajax({
      url: classurl,
      type: "GET",
      dataType: "json",
      success: function (datas) {
        const data = datas[tab];

        const carouselWrapper = $(`#${tab}-slider`);
        carouselWrapper.empty();

        const itemsPerSlide = 4;

        for (let i = 0; i < data.length; i += itemsPerSlide) {
          const slide = $(
            '<div class="hidden duration-700 ease-in-out absolute inset-0 transition-transform transform translate-x-0 z-20" data-carousel-item></div>'
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
        carouselWrapper
          .children()
          .first()
          .addClass(
            "block ease-in-out absolute inset-0 transition-transform transform z-30 translate-x-0 z-10"
          )
          .removeClass("hidden");
      },
    });


  }

  function initializeCarousel(tab) {
    const carouselWrapper = $(`#${tab}-slider`);
    carouselWrapper
      .children()
      .first()
      .addClass(
        "block active ease-in-out absolute inset-0 transition-transform transform z-30 translate-x-0 z-10"
      )
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
    console.log("Items:", items); // Debug output

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
        generateCourseCards(tab).then((classdatas) => {
          content.find(".overflow-x-auto").html(classdatas);
        }).catch((error) => {
          console.error("Error loading course cards:", error);
        });
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
    return new Promise((resolve, reject) => {
      $.ajax({
        url: classurl,
        type: "GET",
        dataType: "json",
        success: function (datas) {
          const carddatas = datas[category].map(
            (classes) =>
              `<div class="w-64 shadow-md flex-shrink-0" data-course-id="${classes.id}">
                        <a href="viewdetailsclass.php?classid=${classes.id}" class="block">
                          <img class="rounded-t-lg w-full h-[150px]" src="${baseurl}${classes.c_photo}" alt="${classes.c_photo}" />
                          <div class="p-4">
                            <h2 class="text-base text-black font-bold">${classes.c_title}</h2>
                            <p class="text-sm text-gray-500">${classes.institute_name}</p>
                            <p class="text-sm text-gray-600 mt-2">${classes.instructor_name}</p>
                            <p class="text-sm text-gray-600">Start Date: ${classes.start_date}</p>
                            <p class="text-sm text-gray-600">End Date: ${classes.end_date}</p>
                            <p class="text-sm font-bold text-red-400 inline">
                              Enrollment Deadline: <span class="text-gray-600">${classes.enrollment_deadline}</span>
                            </p>
                            <div class="flex justify-between items-center">
                            <div class="mt-2 text-gray-600">
                                              <svg class="inline font-bold md:w-6 md:h-6 w-5 h-5 md:mr-1 md:mt-0 mt-2 mr-0.5 relative -top-0.5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932c0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853c0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836c0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91c0 .542-.412.914-1.135.982V8.518z"/><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 13.5a5.5 5.5 0 1 1 0-11a5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/></g></svg>
                                              <span class="inline font-bold md:text-xl text-base relative md:top-0 top-0.5">${classes.credit_point}</span>
                              </div>
                              <p class="text-base font-bold">${classes.c_fee}</p>
                              <button class="bg-primaryColor text-white px-4 py-1 rounded mt-2">
                                <a href="http://localhost/MEP/user/Controller/CheckEnrollClassInfoController.php?classid=${classes.id}">Enroll</a>
                              </button>
                            </div>
                          </div>
                        </a>
                      </div>`
          );
          const classdatas = carddatas.join('');
          resolve(classdatas);
        },
        error: function (error) {
          reject(error);
        }
      });
    });
  }

});


