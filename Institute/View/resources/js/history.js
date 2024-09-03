const historyURL = `http://localhost/MEP/Institute/Controller/HistoryModuleController.php`;



$(document).ready(function() {
    let jsonData = [];
    let currentPage = 1;
    let rowsPerPage = 11;
    $('.module-tabs').first().addClass('text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500');
    $('.module-tabs').click(function() {
        $('.module-tabs').removeClass('text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500');
        $(this).addClass('text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500');
        let tab = $(this).attr('click-tab');
        console.log(tab);
        fetchHistory(tab);
    });

    function fetchHistory(action){
        $.ajax({
            url: historyURL,
            type: 'POST',
            data: {
                action: action === 'all' ? '' : action
            },
            success: function(response){
                let dataobj = JSON.parse(response);
                jsonData = dataobj;
                displayData();
                setupPagination();
            }
        });
    }


    function displayData() {
        const tableBody = $('#history-table-body');
        tableBody.empty();

        const dataToDisplay = jsonData;
        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, dataToDisplay.length);

        for (let i = startIndex; i < endIndex; i++) {
            const rowData = dataToDisplay[i];
            console.log(rowData);
            const relativeTime = timeAgo(rowData.create_date);
            const row = `
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 whitespace-wrap">
                                    ${rowData.module}
                                </td>
                                <td class="px-6 py-4">
                                    ${rowData.action}
                                </td>
                                <td class="px-6 py-4 ">
                                    ${rowData.remark}
                                </td>
                                <td class="px-6 py-4 ">
                                    ${relativeTime}
                                </td>
                            </tr>`;
            tableBody.append(row);
        }
    }

    function timeAgo(date) {
        const now = new Date();
        const secondsPast = (now.getTime() - new Date(date).getTime()) / 1000;

        if (secondsPast < 60) {
            return `${Math.floor(secondsPast)} seconds ago`;
        }
        if (secondsPast < 3600) {
            return `${Math.floor(secondsPast / 60)} minutes ago`;
        }
        if (secondsPast < 86400) {
            return `${Math.floor(secondsPast / 3600)} hours ago`;
        }
        if (secondsPast < 2592000) {
            return `${Math.floor(secondsPast / 86400)} days ago`;
        }
        if (secondsPast < 31536000) {
            return `${Math.floor(secondsPast / 2592000)} months ago`;
        }
        return `${Math.floor(secondsPast / 31536000)} years ago`;
    }

    function setupPagination() {
        const container = $('#pagination');
        container.empty();
        const dataToPaginate = jsonData;
        const pageCount = Math.ceil(dataToPaginate.length / rowsPerPage);

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

    fetchHistory('');

});