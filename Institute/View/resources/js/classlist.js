class ClassList extends PaginatedTable{
    displayData(){
        const container = $('#table-body');
        container.empty();
        const start = (this.currentPage - 1) * this.rowsPerPage;
        const end = start + this.rowsPerPage;
        const paginatedItems = this.jsonData.slice(start, end);

        paginatedItems.forEach(item => {
            console.log(item);
            // console.log(item.id);
            const row = `
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">${item.id}</td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.c_title}</th>
                    <td class="px-6 py-4">${item.full_name}</td>
                    <td class="px-6 py-4">${item.start_date}</td>
                    <td class="px-6 py-4">${item.end_date}</td>
                    <td class="px-6 py-4 text-green-500">${"hello"}</td>
                    <td class="px-6 py-4">${item.c_fee}</td>
                    <td class="px-6 py-4">${item.max_enrollment}</td>
                    <td class="px-6 py-4">${item.enrollment_deadline}</td>
                    <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                        <a href="viewdetailsclass.php?${item.id}">View</a>
                    </td>   
                </tr>`;
            container.append(row);
        });
    }
}


$(document).ready(function () {
    new ClassList('http://localhost/MEP/Institute/Controller/ViewClassListController.php', 10);
    // to change tab
    $(".changes").on("click", function () {
        $(".changes").removeClass("actives");
        $(this).addClass("actives");
        console.log($(this).text());
        if ($(this).text() === "Class Lists") {
            window.location.href = "./../Class/classlist.php";
        } else if ($(this).text() === "Finished Classes") {
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