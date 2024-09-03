let classListQualifiedForDeleteURL = `http://localhost/MEP/Institute/Controller/ClassListQualifiedForDeleteController.php`;
let classListQualifiedForDeleteURLByName = `http://localhost/MEP/Institute/Controller/ClassListQualifiedForDeleteByNameController.php`;

let statusUpdateURL = `http://localhost/MEP/Institute/Controller/CancelledClassStatusUpdateController.php`;

function addThousandSeparator(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function showStatus(status) {
    switch (status) {
        case "Active":
            return `<td class="px-6 py-4 text-green-500">${status}</td>`;
            break;
        case "Upcoming":
            return `<td class="px-6 py-4 text-yellow-500">${status}</td>`;
            break;
        case "Completed":
            return `<td class="px-6 py-4 text-blue-500">${status}</td>`;
            break;
        case "Cancelled":
            return `<td class="px-6 py-4 text-red-500">${status}</td>`;
            break;
    }
}

$(document).ready(function () {
    // Replace with your data source URL
    let dynurl = classListQualifiedForDeleteURL;
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
            console.log(rowData);
            const row = `
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    ${rowData.c_id}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ${rowData.c_title}
                                </th>
                                <td class="px-6 py-4">
                                    ${rowData.instructor_name}
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.start_date}
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.end_date}
                                </td>
                                <td class="px-6 py-4 text-yellow-500">
                                    ${rowData.status}
                                </td>
                                <td class="px-6 py-4">
                                    ${addThousandSeparator(rowData.c_fee)} MMK
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.max_enrollment}
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.enrollment_deadline}   
                                </td>
                                <td class="px-6 py-4 underline text-red-600 cursor-pointer">
                                    <ion-icon name="trash-outline" class="relative top-1 w-5 h-5 ml-5" onclick="deleteClass(event,${rowData.id})"></ion-icon>
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


    // filter by class title 
    $('#search-input').on('keyup', () => {
        let title = $('#search-input').val();
        currentPage = 1;
        console.log(title);
        $.ajax({
            url: classListQualifiedForDeleteURLByName,
            method: 'POST',
            dataType: 'json',
            data: {
                name: title
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

});

function deleteClass(event, id) {
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
                url: statusUpdateURL,
                method: 'POST',
                data: { classID: id },
                success: function (response) {
                    console.log(response);
                    let resultobj = JSON.parse(response);
                    if(resultobj.success){
                        event.target.closest('tr').remove();
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your class has been deleted.",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 1000); // Reload after 2 seconds
                    }
                }
            });
        }
    });
}