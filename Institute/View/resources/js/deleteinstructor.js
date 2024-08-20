let instructorLists = `http://localhost/MEP/Institute/Controller/ViewInstructorController.php`;
let searchInstructorByNameURL = `http://localhost/MEP/Institute/Controller/SearchInstructorByNameController.php`;

let qualifyForDeleteURL = `http://localhost/MEP/Institute/Controller/InstructorDeleteRuleController.php`;

let updateDatabaseURL = `http://localhost/MEP/Institute/Controller/DeleteInstuctorUpdateDatabaseController.php`;


$(document).ready(function () {
    // Replace with your data source URL
    let dynurl = instructorLists;
    let rowsPerPage = 8;
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
                                    ${rowData.instructor_sr_no}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ${rowData.full_name}
                                </th>
                                <td class="px-6 py-4">
                                    ${rowData.gender}
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.email}
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.phone}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="javascript:void(0);" class="text-blue-700 underline card-details" onclick="showCard(${rowData.id})">Details</a>
                                </td>
                                <td class="px-6 py-4 text-red-600 cursor-pointer">
                                    <ion-icon name="trash-outline" class="relative top-1 w-5 h-5 ml-5" onclick="deleteInstructor(event,${rowData.id})"></ion-icon>
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
    $('#card-container').html(`<div class="h-[70vh] overflow-y-auto hide-scrollbar loading-spinner flex justify-center items-center">
                                    <div role="status">
                                        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                        </svg>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>`); // Add loading spinner

    $('#card-container').removeClass('hidden');
    $('#list-table').removeClass('col-span-8').addClass('col-span-6');

    fetch(`http://localhost/MEP/Institute/Controller/ViewInstructorController.php`).then(response => response.json())
        .then(datas => {
            // console.log(datas);
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
                    $('#card-container').html(cardhtml); // Replace loading spinner with card content

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
        .catch(error => console.error('Error fetching instructor data:', error));
}

function closeCard() {
    document.getElementById('card-container').classList.add('hidden');
    let getlisttable = document.getElementById('list-table');
    getlisttable.classList.remove('col-span-6');
    getlisttable.classList.add('col-span-8');
}

function deleteInstructor(event,id) {
    event.preventDefault();
    // event.target.closest('tr').remove();
    console.log(id);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: qualifyForDeleteURL,
                method: 'POST',
                data: { instructorid: id},
                success: function (response) {
                    // console.log(response);
                    let resultobj = JSON.parse(response);
                    console.log(resultobj);
                    if(resultobj.qualify){
                        event.target.closest('tr').remove();
                        updateDatabase(id);
                        Swal.fire({
                            title: "Deleted!",
                            text: "Instructor has been deleted.",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1000); // Reload after 2 seconds
                    }else{
                        Swal.fire({
                            title: "Not Allow!",
                            text: "Instructor has not been deleted. Because there are classes that instructor teaches.",
                            icon: "warning",
                            showConfirmButton: false
                        });
                    }
                }
            });
        }
    });
}

function updateDatabase(id){
    console.log(id);
    $.ajax({
        url: updateDatabaseURL, 
        method: 'POST',
        dataType: 'json',
        data: { instructorid: id},
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', status, error);
        }
    });
}









