
// filter by checkbox categories
let finishedClassStudentListURL = `http://localhost/MEP/Institute/Controller/FinishedClassStudentListController.php`;
let updateCertificationStatusURL = `http://localhost/MEP/Institute/Controller/UpdateCertificationStatusController.php`;


let finishedClassStudentListCertified = `http://localhost/MEP/Institute/Controller/FinishedClassStudentListCertifiedController.php`;
let finishedClassStudentListNocertified = `http://localhost/MEP/Institute/Controller/FinishedClassStudentListNoCertifiedController.php`;

// filter by keyword 
let studentListFilterByKeyword = `http://localhost/MEP/Institute/Controller/SearchByNameFinishedClassStudentController.php`;

let baseUrl = `../../../../storages/uploads/`;

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}
// Usage
const classId = getQueryParam('classid');
console.log(classId); // Outputs: 11 if the URL is ?classid=11

$(document).ready(function () {
     // Replace with your data source URL
    let dynurl = finishedClassStudentListURL;
    let inputs = $('input[type=checkbox]');
    let rowsPerPage = 8;
    let jsonData = [];
    let currentPage = 1;

    function fetchData() {
        $.ajax({
            url: dynurl,
            method: 'POST',
            dataType: 'json',
            data: {
                classid: classId
            },
            success: function (data) {
                jsonData = data;
                console.log(data);
                displayData();
                setupPagination();
                if (Array.isArray(data) && data.length > 0) {
                    $('#class-title').text(data[0].class_title);
                    $('#class-id').text(data[0].class_id);
                }
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
            const row = `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    ${rowData.student_id}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ${rowData.name}
                                </th>
                                <td class="px-6 py-4">
                                    ${rowData.gender}
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.email}
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="certified-checkbox" data-student-id="${rowData.id}" data-class-id="${rowData.class_sr_id}" ${(rowData.certified) ? "checked" : ""} />
                                </td>
                                <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                                    <a href="javascript:void(0);" class="text-blue-700 underline card-details" onclick="showCard(${rowData['id']})">Details</a>
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

    // filter by checkbox categories
    inputs.change(() => {
        const categories = inputs.filter(':checked').map((_, input) => $(input).val()).get();
    
        console.log(categories);
    
        // If 'all' is selected, fetch the appropriate dataset
        if (categories.includes('all')) {
            if (categories.includes('certificate') && categories.includes('no-certificate')){
                dynurl = finishedClassStudentListURL;  // Fetch all data
            } else {
                dynurl = categories.includes('certificate') ? finishedClassStudentListCertified : categories.includes('no-certificate') ? finishedClassStudentListNocertified : finishedClassStudentListURL;
            }
        } 
        // If both "certificate" and "no-certificate" are selected without "all"
        else if (categories.includes('certificate') && categories.includes('no-certificate')) {
            dynurl = finishedClassStudentListURL;  // Fetch combined dataset if available
        } 
        // Handle individual category selections
        else if (categories.includes('certificate')) {
            dynurl = finishedClassStudentListCertified;  // Fetch certificate dataset
        } 
        else if (categories.includes('no-certificate')) {
            dynurl = finishedClassStudentListNocertified;  // Fetch no-certificate dataset
        } 
        // Fallback case, fetch all data
        else {
            dynurl = finishedClassStudentListURL;  
        }
    
        currentPage = 1;
        fetchData();
    });

    // filter by name 
    $('#search-input').on('keyup', () => {
        let text = $('#search-input').val();
        $.ajax({
            url: studentListFilterByKeyword,
            method: 'POST',
            dataType: 'json',
            data: {
                studentname : text,
                classid : classId
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

    $('#update-certification').click(function() {
        const updates = [];

        $('.certified-checkbox').each(function() {
            const studentId = $(this).data('student-id');
            const isCertified = $(this).is(':checked');
            const classId = $(this).data('class-id');
            updates.push({ student_id: studentId, certified: isCertified ,class_id: classId});
        });

        console.warn(updates);

        let dataobj = {
            updates: updates
        };
        let datajsonobj = JSON.stringify(dataobj);
        console.log(datajsonobj);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", updateCertificationStatusURL, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("datas=" + datajsonobj);
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4) {
                if (xmlhttp.status === 200) {
                    // console.log(xmlhttp.responseText);
                    let data = JSON.parse(xmlhttp.responseText);
                    if(data.success){
                        Swal.fire({
                            title: "Success",
                            text: data.message,
                            icon: "success",
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                        });
                    }
                } else {
                    console.error('Error updating certification statuses:', xmlhttp.status, xmlhttp.statusText);
                }
            }
        };
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
                                </div>`);
    $('#card-container').removeClass('hidden');
    $('#list-table').removeClass('col-span-8').addClass('col-span-6');
    
    // AJAX call to get student details
    $.ajax({
        url: `http://localhost/MEP/Institute/Controller/ViewStudentListController.php`,
        method: 'GET',
        dataType: 'json',
        success: function(datas) {
            datas.forEach(item => {
                if (item.id === id) {
                    console.log(item);
                    let cardhtml = `
                        <div class="flex items-center gap-5">
                        <div class="absolute top-0 right-0 pt-3 pr-5">
                            <button type="button" onclick="closeCard()" class="px-2 py-2 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-500 dark:hover:text-white">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="relative">
                            <img src="${baseUrl + item.profile_photo}" class="w-16 h-16 rounded-full" alt="${item.profile_photo}">
                            <div class="absolute top-0 right-0 w-5 h-5 rounded-full bg-blue-700 flex justify-center items-center">
                                <ion-icon name="checkmark-outline" class="text-white"></ion-icon>
                            </div>
                        </div>
                        <div class="dark:text-white">
                            <h3 class="font-black">${item.name}</h3>
                            <span class="dark:opacity-60">ID - ${item.student_id}</span>
                        </div>
                        </div>
                        <div>
                            <div>
                                <h3 class="text-red-600 dark:text-white mt-8 mb-3 font-black">Contact Information</h3>
                                <ion-icon name="mail-outline" class="w-5 h-5 relative top-1 mr-2 dark:text-white opacity-60"></ion-icon> 
                                <span class="text-blue-700 dark:text-blue-400">${item.email}</span>
                            </div>
                            <div>
                                <ion-icon name="call-outline" class="w-5 h-5 relative top-1 mr-2 dark:text-white opacity-60"></ion-icon> 
                                <span class="dark:text-white opacity-80">${item.phone}</span>
                            </div>
                            <div>
                                <ion-icon name="logo-linkedin" class="w-5 h-5 relative top-1 mr-2 dark:text-white opacity-60"></ion-icon> 
                                <span class="text-blue-700 dark:text-blue-400">${item.linkedin}</span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h3 class="text-red-600 dark:text-white mt-8 mb-3 font-black">Address</h3>
                                <p class="dark:text-white mr-2 opacity-80">${item.address}</p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h3 class="text-red-600 dark:text-white mt-8 mb-3 font-black">Enrolled Classes</h3>
                                <ul id="enrolled-classes" class="text-blue-700 dark:text-blue-400 list-inside list-disc"></ul>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h3 class="text-red-600 dark:text-white mt-8 mb-3 font-black">Certified Classes</h3>
                                <ul id="certified-classes" class="text-blue-700 dark:text-blue-400 list-inside list-disc"></ul>
                            </div>
                        </div>`;
                    
                        $('#card-container').html(cardhtml); // Replace loading spinner with card content

                    // AJAX call to fetch enrolled classes
                    $.ajax({
                        url: `http://localhost/MEP/Institute/Controller/GetEnrolledClassesController.php`,
                        method: 'GET',
                        data: { id: id },
                        dataType: 'json',
                        success: function(classes) {
                            let enrolledClassesHtml = classes.map(cls => `
                                <li>
                                    <a href="http://localhost/MEP/Institute/Controller/ViewDetailsClassController.php?classid=${cls.id}">${cls.c_title}</a>
                                </li>
                            `).join('');
                            $('#enrolled-classes').html(enrolledClassesHtml);
                        },
                        error: function(error) {
                            console.error('Error fetching enrolled classes:', error);
                        }
                    });

                    // AJAX call to fetch certified classes
                    $.ajax({
                        url: `http://localhost/MEP/Institute/Controller/GetCertifiedClass.php`,
                        method: 'GET',
                        data: { id: id },
                        dataType: 'json',
                        success: function(classes) {
                            // console.log(classes);
                            let certifiedClassesHtml = classes.map(cls => `
                                <li>
                                    <a href="http://localhost/MEP/Institute/View/resources/Class/finishedclassdetails.php?classid=${cls.c_id}">${cls.c_title}</a>
                                </li>
                            `).join('');
                            $('#certified-classes').html(certifiedClassesHtml);
                        },
                        error: function(error) {
                            console.error('Error fetching certified classes:', error);
                        }
                    });
                }
            });
        },
        error: function(error) {
            console.error('Error fetching student details:', error);
        }
    });
}

function closeCard() {
    document.getElementById('card-container').classList.add('hidden');
    let getlisttable = document.getElementById('list-table');
    getlisttable.classList.remove('col-span-6');
    getlisttable.classList.add('col-span-8');
}




