let instructorLists = `http://localhost/MEP/Institute/Controller/ViewInstructorController.php`;
let searchInstructorByNameURL = `http://localhost/MEP/Institute/Controller/SearchInstructorByNameController.php`;

$(document).ready(function () {
    // Replace with your data source URL
    let dynurl = instructorLists;
    let rowsPerPage = 10;
    let jsonData = [];
    let currentPage = 1;

    function fetchData() {
        $.ajax({
            url: dynurl,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                jsonData = data;
                // console.log(data);
                displayData();
                setupPagination();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    function displayData() {
        const tableBody = $('#table-body'); // Replace with your table's body selector
        tableBody.empty();

        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, jsonData.length);

        for (let i = startIndex; i < endIndex; i++) {
            const rowData = jsonData[i];
            // console.log(rowData);
            const row = `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        ${rowData['instructor_sr_no']}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        ${rowData['full_name']}
                    </th>
                    <td class="px-6 py-4">
                        ${rowData['gender']}
                    </td>
                    <td class="px-6 py-4">
                        ${rowData['email']}
                    </td>
                    <td class="px-6 py-4">
                        ${rowData['phone']}
                    </td>
                    <td class="px-6 py-4">
                        <a href="javascript:void(0);" class="text-blue-700 underline card-details" onclick="showCard(${rowData.id})">Details</a>
                    </td>
                    <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                        <a href="http://localhost/MEP/Institute/Controller/ViewDetailsInstructorController.php?instructorid=${rowData.id}" class="text-blue-700 underline">Edit</a>
                    </td>
                </tr>`;
            // Construct your table row HTML using rowData and append to tableBody
            tableBody.append(row);
        }
    }

    function setupPagination() {
        const container = $('#pagination');
        container.empty();
        const pageCount = Math.ceil(jsonData.length / rowsPerPage);

        const prevButton = `
           <li>
               <a href="#" class="pagination-btn flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="prev">
                   <span class="sr-only">Previous</span>
                   <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                   </svg>
               </a>
           </li>`;
        container.append(prevButton);

        for (let i = 1; i <= pageCount; i++) {
            const pageButton = `
           <li>
               <a href="#" class="pagination-btn flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border hover:bg-gray-400 border-gray-300 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ${i === currentPage ? 'active dark:bg-slate-700' : ''}" data-page="${i}">${i}</a>
           </li>`;
            container.append(pageButton);
        }

        const nextButton = `
           <li>
               <a href="#" class="pagination-btn flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="next">
                   <span class="sr-only">Next</span>
                   <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                   </svg>
               </a>
           </li>`;
        container.append(nextButton);
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
        updatePagination();
    }

    function updatePagination() {
        $('#pagination a').removeClass('active dark:bg-slate-700');
        $(`#pagination a[data-page="${currentPage}"]`).addClass('active dark:bg-slate-700');
    }

    $(document).on('click', '.pagination-btn', handlePaginationClick);

    fetchData();


    // filter by name 
    $('#search-input').on('keyup', () => {
        let name = $('#search-input').val();
        console.log(name);
        $.ajax({
            url: searchInstructorByNameURL,
            method: 'POST',
            dataType: 'json',
            data: {
                instructorname: name
            },
            success: function (data) {
                jsonData = data;
                console.log(data);
                displayData();
                setupPagination();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    });


    $(".changes").on("click", function () {
        $(".changes").removeClass("actives");
        $(this).addClass("actives");
        console.log($(this).text());
        if ($(this).text() === "Class Lists") {
            window.location.href = "./../Class/classlist.php";
        } else if ($(this).text() === "Completed Classes") {
            window.location.href = "./../Class/classlistfinished.php";
        }
    });

    $("#class-photo").change(function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#preview_photo").attr("src", e.target.result).removeClass("hidden");
        };
        reader.readAsDataURL(this.files[0]);
    });


});


function showCard(id) {
    $('#card-container').text("");
    $('#list-table').removeClass('col-span-8').addClass('col-span-6');
    fetch(`http://localhost/MEP/Institute/Controller/ViewInstructorController.php`).then(response => response.json())
        .then(datas => {
            datas.forEach(item => {
                if (item.id === id) {
                    console.log(item);
                    let cardhtml = `
                            <div class="h-[70vh] overflow-y-auto hide-scrollbar">
                            <div class="flex items-center gap-5">
                                <div class="absolute top-0 right-0 pt-3 pr-5">
                                    <button type="button" class="px-2 py-2 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-base w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-500 dark:hover:text-white" onclick="closeCard()">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="relative">
                                    <img src="${item.profile_picture}" alt="${item.full_name}">
                                    <div class="absolute top-0 right-0 w-5 h-5 rounded-full bg-blue-700 flex justify-center items-center">
                                        <ion-icon name="checkmark-outline" class="text-white"></ion-icon>
                                    </div>

                                </div>
                                <div class="dark:text-white">
                                    <h3 class="font-black">${item.full_name}</h3>
                                    <span class="dark:opacity-60">${item.position}</span>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div>
                                        <h3 class="text-red-600 dark:text-white mt-8 mb-3 font-black">Content Information</h3>
                                        <ion-icon name="mail-outline" class="w-5 h-5 relative top-1 mr-2 dark:text-white opacity-60"></ion-icon> <span class="text-blue-700 dark:text-blue-400">${item.email}</span>
                                    </div>
                                    <div>
                                        <ion-icon name="call-outline" class="w-5 h-5 relative top-1 mr-2 dark:text-white opacity-60"></ion-icon> <span class="dark:text-white mr-2 opacity-80">(+95)</span><span class="dark:text-white opacity-80">${item.phone}</span>
                                    </div>
                                    <div>
                                        <ion-icon name="logo-linkedin" class="w-5 h-5 relative top-1 mr-2 dark:text-white opacity-60"></ion-icon> <span class="text-blue-700 dark:text-blue-400">${item.linkedin}</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-red-600 dark:text-white mt-5 mb-3 font-black">Biography</h3>
                                    <p class="dark:text-white dark:opacity-80">${item.bio}</p>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-red-600 dark:text-white mt-5 mb-3 font-black">Skill</h3>
                                    <div>
                                        <p class="dark:text-white dark:opacity-80 inline ">Programming Languages :</p> <span class="dark:text-blue-400 text-blue-700">${item.skills}</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h3 class="text-red-600 dark:text-white mt-5 mb-3 font-black inline">Experience : </h3> <span class="dark:text-blue-400 text-blue-700">${item.experience}</span>
                                </div>
                                <div>
                                    <div>
                                        <h3 class="text-red-600 dark:text-white mt-5 mb-3 font-black">Address</h3>
                                        <p class="dark:text-white mr-2 opacity-80">${item.address}</p>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-red-600 dark:text-white mt-5 mb-3 font-black">Related Class</h3>
                                    <ul id="related-classes" class="text-blue-700 dark:text-blue-400 list-inside list-disc">
                                    </ul>
                                </div>
                            </div>
                        </div>                
                `;
                    $('#card-container').append(cardhtml);
                    $('#card-container').removeClass('hidden');

                    fetch(`http://localhost/MEP/Institute/Controller/GetRelatedClassesController.php?id=${id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(classes => {
                            let relatedClassesHtml = classes.map(cls => `
                            <li>
                                <a href="http://localhost/MEP/Institute/Controller/ViewDetailsClassController.php?classid=${cls.id}">${cls.c_title}</a>
                            </li>
                        `).join('');

                            $('#related-classes').html(relatedClassesHtml);
                        })
                        .catch(error => console.error('Error fetching related classes:', error));
                }
            });
        })
        .catch();
}

function closeCard() {
    document.getElementById('card-container').classList.add('hidden');
    let getlisttable = document.getElementById('list-table');
    getlisttable.classList.remove('col-span-6');
    getlisttable.classList.add('col-span-8');
}






