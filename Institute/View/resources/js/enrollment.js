// filter by keyword 
const pendingListURL = `http://localhost/MEP/Institute/Controller/EnrollmentPendingListController.php`;
const filterByStudentNameURL = `http://localhost/MEP/Institute/Controller/FilterByNameEnrollmentPendingController.php`;
const showRelatedReceiptImageURL = `http://localhost/MEP/Institute/Controller/GetRelatedReceiptImageController.php`;
const pendingRejectedURL = `http://localhost/MEP/Institute/Controller/PendingRejectedController.php`;
const pendingApprovedURL = ``;

let baseUrl = `../../../../storages/uploads/`;

$(document).ready(function () {
     // Replace with your data source URL
    let dynurl = pendingListURL;
    let jsonData = [];

    function fetchData() {
        $.ajax({
            url: dynurl,
            method: 'GET',
            dataType: 'json',
            success: function (datas) {
                jsonData = datas;
                displayData(datas);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    function displayData(datas) {
        const tableBody = $('#table-body'); // Replace with your table's body selector
        tableBody.empty();

        for (let i = 0; i < datas.length; i++) {
            const rowData = jsonData[i];
            console.log(rowData);
            const row = ` <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                <td class="w-4 p-4">${rowData.s_unique_id}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${rowData.student_name}</td>
                                <td class="px-6 py-4">${rowData.gender}</td>
                                <td class="px-6 py-4">${rowData.c_title}</td>
                                <td class="px-6 py-4">${addThousandSeparator(rowData.c_fee)} MMK</td>
                                <td class="px-6 py-4">${rowData.phone}</td>
                                <td class="px-6 py-4 text-blue-600 cursor-pointer hover:text-blue-500" onclick="showReceipt('${rowData.receipt_image}')">
                                    <svg class="relative -top-0.5 w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m22.682 19.189l-.002-.002l-3.07-3.068a7.03 7.03 0 0 0 1.332-4.12a7.07 7.07 0 0 0-7.068-7.067V1.037A1.04 1.04 0 0 0 12.653.016L1.67 1.965a.83.83 0 0 0-.687.818v18.434c0 .403.29.748.687.818l10.982 1.949a1.04 1.04 0 0 0 1.22-1.022v-3.894a7.03 7.03 0 0 0 4.12-1.332l3.069 3.07c.446.446 1.17.447 1.617 0h.001c.447-.447.448-1.17.002-1.617zm-8.808-.62a6.576 6.576 0 0 1-6.569-6.57a6.576 6.576 0 0 1 6.569-6.567A6.576 6.576 0 0 1 20.442 12a6.576 6.576 0 0 1-6.568 6.568zm5.28-6.57a5.287 5.287 0 0 1-5.28 5.282c-2.913 0-5.282-2.369-5.282-5.28s2.37-5.282 5.282-5.282a5.287 5.287 0 0 1 5.28 5.28"/></svg>
                                    <span>Receipt</span>
                                </td>
                                <td class="px-6 py-4">
                                    <ion-icon name="close-circle-outline" class="relative top-1 w-7 h-7 text-red-500 dark:text-red-500 cursor-pointer mr-2 hover:text-red-700 dark:hover:text-red-600" onclick="rejected(event,${rowData.student_id})"></ion-icon>
                                    <ion-icon name="checkmark-circle-outline" class="relative top-1 w-7 h-7 text-green-600 dark:text-green-500 cursor-pointer hover:text-green-700 dark:hover:text-green-400" onclick="approved(event,${rowData.student_id,rowData.student_email})"></ion-icon>
                                </td>
                            </tr>`;
            // Construct your table row HTML using rowData and append to tableBody
            tableBody.append(row);
        }
    }

    fetchData();


    // filter by name 
    $('#search-input').on('keyup', () => {
        let text = $('#search-input').val();
        $.ajax({
            url: filterByStudentNameURL,
            method: 'POST',
            dataType: 'json',
            data: {
                studentname : text
            },
            success: function (datas) {
                jsonData = datas;
                // console.log(data);
                displayData(datas);
                // setupPagination();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    });
    

});


function addThousandSeparator(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function showReceipt(image){
    Swal.fire(`<img src='${baseUrl+image}' />`);
}

function rejected(e,id){
    Swal.fire({
        title: "Are you sure to reject?",
        text: "Notice: Check receipt image before reject!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Confirm",
        reverseButtons: true // This will swap the positions of the cancel and confirm buttons
    }).then((result) => {
        if (result.isConfirmed) {
            let rejectrow = e.target.parentElement.parentElement;
            let enrollmentcount = document.getElementById('pendingcount');
            let changeNum = parseInt(enrollmentcount.innerHTML);
            $.ajax({
                url: pendingRejectedURL,
                method: 'POST',
                dataType: 'json',
                data:{
                    id: id
                },
                success: function (status) {
                    // console.log(data);
                    if(status === "success"){
                        rejectrow.remove();
                        enrollmentcount.innerHTML = changeNum - 1;
                        Swal.fire({
                            title: "Reject Completed!",
                            icon: "success",
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', status, error);
                }
            });

            
        }
    });
}

function approved(e,id,email){
    Swal.fire({
        title: "Are you sure to approve?",
        text: "Notice: Check receipt image before approve!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Confirm",
        reverseButtons: true // This will swap the positions of the cancel and confirm buttons
    }).then((result) => {
        if (result.isConfirmed) {
            let approverow = e.target.parentElement.parentElement;
            let enrollmentcount = document.getElementById('pendingcount');
            let changeNum = parseInt(enrollmentcount.innerHTML);
            $.ajax({
                url: pendingApproveURL,
                method: 'POST',
                dataType: 'json',
                data:{
                    id: id,
                    email: email
                },
                success: function (status) {
                    // console.log(data);
                    if(status === "success"){
                        approverow.remove();
                        enrollmentcount.innerHTML = changeNum - 1;
                        Swal.fire({
                            title: "Approve Completed!",
                            icon: "success",
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', status, error);
                }
            });

            
        }
    });
}



