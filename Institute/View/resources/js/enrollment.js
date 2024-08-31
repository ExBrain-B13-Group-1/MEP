// filter by keyword 
const pendingListURL = `http://localhost/MEP/Institute/Controller/EnrollmentPendingListController.php`;
const filterByStudentNameURL = `http://localhost/MEP/Institute/Controller/FilterByNameEnrollmentPendingController.php`;
const showRelatedReceiptImageURL = `http://localhost/MEP/Institute/Controller/GetRelatedReceiptImageController.php`;
const pendingRejectedURL = `http://localhost/MEP/Institute/Controller/PendingRejectedController.php`;
const pendingApprovedURL = `http://localhost/MEP/Institute/Controller/PendingApprovedController.php`;

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
        let count = 1;

        for (let i = 0; i < datas.length; i++) {
            const rowData = jsonData[i];
            console.log(rowData);
            const row = ` <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                <td class="w-4 p-4">${count++}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${rowData.user_name}</td>
                                <td class="px-6 py-4">${rowData.gender}</td>
                                <td class="px-6 py-4">${rowData.c_title}</td>
                                <td class="px-6 py-4">${addThousandSeparator(rowData.c_fee)} MMK</td>
                                <td class="px-6 py-4">${rowData.user_email}</td>
                                <td class="px-6 py-4 text-blue-600 cursor-pointer hover:text-blue-500" onclick="showReceipt('${rowData.receipt_image}')">
                                    <svg class="relative -top-0.5 w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m22.682 19.189l-.002-.002l-3.07-3.068a7.03 7.03 0 0 0 1.332-4.12a7.07 7.07 0 0 0-7.068-7.067V1.037A1.04 1.04 0 0 0 12.653.016L1.67 1.965a.83.83 0 0 0-.687.818v18.434c0 .403.29.748.687.818l10.982 1.949a1.04 1.04 0 0 0 1.22-1.022v-3.894a7.03 7.03 0 0 0 4.12-1.332l3.069 3.07c.446.446 1.17.447 1.617 0h.001c.447-.447.448-1.17.002-1.617zm-8.808-.62a6.576 6.576 0 0 1-6.569-6.57a6.576 6.576 0 0 1 6.569-6.567A6.576 6.576 0 0 1 20.442 12a6.576 6.576 0 0 1-6.568 6.568zm5.28-6.57a5.287 5.287 0 0 1-5.28 5.282c-2.913 0-5.282-2.369-5.282-5.28s2.37-5.282 5.282-5.282a5.287 5.287 0 0 1 5.28 5.28"/></svg>
                                    <span>Receipt</span>
                                </td>
                                <td class="px-6 py-4">${rowData.coin_amt}</td>
                                <td class="px-6 py-4">
                                    <ion-icon name="close-circle-outline" class="relative top-1 w-7 h-7 text-red-500 dark:text-red-500 cursor-pointer mr-2 hover:text-red-700 dark:hover:text-red-600" onclick="rejected(event,${rowData.user_id},${rowData.enrolled_class_id},'${rowData.user_email}','${rowData.start_date}','${rowData.end_date}')"></ion-icon>
                                    <ion-icon name="checkmark-circle-outline" class="relative top-1 w-7 h-7 text-green-600 dark:text-green-500 cursor-pointer hover:text-green-700 dark:hover:text-green-400" onclick="approved(event,[${rowData.user_id},${rowData.enrolled_class_id},'${rowData.user_email}','${rowData.start_date}','${rowData.end_date}','${rowData.days}','${rowData.start_time}','${rowData.end_time}','${rowData.c_title}'])"></ion-icon>
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
        currentPage = 1;
        $.ajax({
            url: filterByStudentNameURL,
            method: 'POST',
            dataType: 'json',
            data: {
                studentname: text
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

function showReceipt(image) {
    Swal.fire(`<img src='${baseUrl + image}' />`);
}

async function rejected(e, id, enrolled_class_id, email) {
    Swal.fire({
        title: "Are you sure to reject?",
        text: "Notice: Check receipt image before reject!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Confirm",
        reverseButtons: true // This will swap the positions of the cancel and confirm buttons
    }).then(async (result) => {
        if (result.isConfirmed) {
            let rejectrow = e.target.parentElement.parentElement;
            let enrollmentcount = document.getElementById('pendingcount');
            let changeNum = parseInt(enrollmentcount.innerHTML);

            const { value: text } = await Swal.fire({
                input: "textarea",
                inputLabel: "Rejected Reason Message",
                inputPlaceholder: "Type your message here...",
                inputAttributes: {
                    "aria-label": "Type your message here",
                    "style": "height: 70vh; width: 86%; resize: none;"
                },
                showCancelButton: true,
                reverseButtons: true,
                preConfirm: (text) => {
                    if (text.trim() === "") {
                        Swal.showValidationMessage("Message is required");
                        return false;
                    }
                    return text;
                }
            });

            if (!text) {
                return; // If validation failed, exit the function
            }

            // console.log(id);
            // console.log(email);
            // console.log(text);

            let dataobj = {
                id: id,
                enrolled_class_id: enrolled_class_id,
                email: email,
                reason: text
            }

            let stringifyData = JSON.stringify(dataobj);
            // console.log(stringifyData);

            var xmlhttp = new XMLHttpRequest();
            var url = pendingRejectedURL;
            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send("datas=" + encodeURIComponent(stringifyData)); // Use encodeURIComponent

            Swal.fire({
                title: "Reject Process Running...",
                html: "I will close in <b></b> milliseconds.",
                timer: 3000,
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                var result = xmlhttp.responseText;
                                // console.log(result);s
                                if (result) {
                                    rejectrow.remove();
                                    enrollmentcount.innerHTML = changeNum - 1;
                                } else {
                                    Swal.fire({
                                        title: "Rejected Failed!",
                                        icon: "error"
                                    });
                                }
                            } else if (xmlhttp.readyState === 4) {
                                console.error('Error:', xmlhttp.statusText); // Add error handling
                            }
                        }
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        }
    });
}

async function approved(e, selectedParams) {
    const [id, enrolled_class_id, email, startdate, enddate, days, starttime, endtime, title] = selectedParams;
    console.log(startdate);
    console.log(enddate);
    Swal.fire({
        title: "Are you sure to approve?",
        text: "Notice: Check receipt image before approve!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Confirm",
        reverseButtons: true // This will swap the positions of the cancel and confirm buttons
    }).then(async (result) => {
        if (result.isConfirmed) {
            let rejectrow = e.target.parentElement.parentElement;
            let enrollmentcount = document.getElementById('pendingcount');
            let changeNum = parseInt(enrollmentcount.innerHTML);

            const { value: formValues } = await Swal.fire({
                title: "Send Zoom Invitation",
                html: `
                    <div style="width: 450px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <label for="swal-input1" class="-mb-4">Zoom Meeting ID</label>
                        <input type="text" id="swal-input1" class="swal2-input placeholder-shown:text-gray-700 rounded-md" style="width: 100%;" placeholder="Zoom Meeting ID" autocomplete="off"/>
                        
                        <label for="swal-input2" class="mt-3 -mb-4">Zoom Meeting Password</label>
                        <input type="text" id="swal-input2" class="swal2-input placeholder-shown:text-gray-700 rounded-md" style="width: 100%;" placeholder="Zoom Meeting Password" autocomplete="off"/>
                        
                        <label for="swal-input3" class="mt-3 -mb-4">Class Title</label>
                        <input type="text" id="swal-input3" class="swal2-input placeholder-shown:text-gray-700 rounded-md" style="width: 100%;" value="${title}" placeholder="Class Title" readonly/>
                        
                        <label for="swal-input4" class="mt-3 -mb-4">Start Date</label>
                        <input type="text" id="swal-input4" class="swal2-input placeholder-shown:text-gray-700 rounded-md" style="width: 100%;" placeholder="Start Date" readonly value="${startdate}"/>
                        
                        <label for="swal-input5" class="mt-3 -mb-4">End Date</label>
                        <input type="text" id="swal-input5" class="swal2-input placeholder-shown:text-gray-700 rounded-md" style="width: 100%;" placeholder="End Date" readonly value="${enddate}"/>

                        <input type="hidden" id="swal-input6" value="${days}" />
                        <input type="hidden" id="swal-input7" value="${starttime}" />
                        <input type="hidden" id="swal-input8" value="${endtime}" />
                    </div>
                `,
                focusConfirm: false,
                preConfirm: () => {
                    const meetingID = document.getElementById("swal-input1").value;
                    const meetingPassword = document.getElementById("swal-input2").value;
                    const classTitle = document.getElementById("swal-input3").value;
                    const startDate = document.getElementById("swal-input4").value;
                    const endDate = document.getElementById("swal-input5").value;
                    const days = document.getElementById("swal-input6").value;
                    const start_time = document.getElementById("swal-input7").value;
                    const end_time = document.getElementById("swal-input8").value;

                    if (!meetingID || !meetingPassword || !classTitle || !startDate || !endDate || !days || !start_time || !end_time) {
                        Swal.showValidationMessage("All fields are required");
                        return false;
                    }

                    return [meetingID, meetingPassword, classTitle, startDate, endDate, days, start_time, end_time];
                }
            });

            if (formValues) {
                let user_id = id;
                let user_email = email;
                let meetingID = formValues[0];
                let meetingPassword = formValues[1];
                let classTitle = formValues[2];
                let startDate = formValues[3];
                let endDate = formValues[4];
                let days = formValues[5];
                let start_time = formValues[6];
                let end_time = formValues[7];

                let dataobj = {
                    user_id: user_id,
                    enrolled_class_id: enrolled_class_id,
                    user_email: user_email,
                    meetingID: meetingID,
                    meetingPassword: meetingPassword,
                    classTitle: classTitle,
                    startDate: startDate,
                    endDate: endDate,
                    days: days,
                    start_time: start_time,
                    end_time: end_time
                }

                let stringifyData = JSON.stringify(dataobj);
                console.log(stringifyData);

                var xmlhttp = new XMLHttpRequest();
                var url = pendingApprovedURL;
                xmlhttp.open("POST", url, true);
                xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlhttp.send("datas=" + encodeURIComponent(stringifyData)); // Use encodeURIComponent

                Swal.fire({
                    title: "Approve Process Running...",
                    html: "I will close in <b></b> milliseconds.",
                    timer: 3000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                            xmlhttp.onreadystatechange = function () {
                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                    var result = xmlhttp.responseText;
                                    console.log(result);
                                    if (result) {
                                        rejectrow.remove();
                                        enrollmentcount.innerHTML = changeNum - 1;
                                        Swal.close();
                                    } else {
                                        Swal.fire({
                                            title: "Approved Failed!",
                                            icon: "error"
                                        });
                                    }
                                } else if (xmlhttp.readyState === 4) {
                                    console.error('Error:', xmlhttp.statusText); // Add error handling
                                }
                            }
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                });
            }
        }
    });
}



