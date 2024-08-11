
class ClassList extends PaginatedTable{
    displayData(){
        const container = $('#table-body');
        container.empty();
        const start = (this.currentPage - 1) * this.rowsPerPage;
        const end = start + this.rowsPerPage;
        const paginatedItems = this.jsonData.slice(start, end);

        paginatedItems.forEach(item => {
            // console.log(item);
            // console.log(item.id);
            const row = `
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">${item.c_id}</td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.c_title}</th>
                    <td class="px-6 py-4">${item.instructor_name}</td>
                    <td class="px-6 py-4">${item.start_date}</td>
                    <td class="px-6 py-4">${item.end_date}</td>
                    ${showStatus(item.class_status)}
                    <td class="px-6 py-4">${addThousandSeparator(item.c_fee)}</td>
                    <td class="px-6 py-4">${item.max_enrollment}</td>
                    <td class="px-6 py-4">${item.enrollment_deadline}</td>
                    <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                        <a href="http://localhost/MEP/Institute/Controller/ViewDetailsClassController.php?classid=${item.id}&status=${item.class_status}">View</a>
                    </td>   
                </tr>`;
            container.append(row);
        });
    }
}

let url = `http://localhost/MEP/Institute/Controller/ViewClassListController.php`;

new ClassList(url,10);

function addThousandSeparator(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function showStatus(status){
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

    // to change tab
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



