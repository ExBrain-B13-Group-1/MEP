class PaginatedTable {
    constructor(url,rowsPerPage) {
        this.url = url;
        this.rowsPerPage = rowsPerPage;
        this.currentPage = 1;
        this.jsonData = [];
        this.init();
    }

    fetchData() {
        $.ajax({
            url: this.url,
            method: 'GET',
            dataType: 'json',
            success: (data) => {
                this.jsonData = data;
                this.displayData();
                this.setupPagination();
            },
            error: (xhr, status, error) => {
                console.error('Error fetching data:', status, error);
            }
        });
    }
    

    displayData() {
        // display data
        // overwrite display data in clild class
    }

    setupPagination() {
        const container = $('#pagination');
        container.empty();
        const pageCount = Math.ceil(this.jsonData.length / this.rowsPerPage);

        const prevButton = `
            <li>
                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="prev">
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
                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border hover:bg-gray-400 border-gray-300 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white ${i === this.currentPage ? 'active' : ''}" data-page="${i}">${i}</a>
            </li>`;
            container.append(pageButton);
        }

        const nextButton = `
            <li>
                <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="next">
                    <span class="sr-only">Next</span>
                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                </a>
            </li>`;

        container.append(nextButton);
    }

    handlePaginationClick(e) {
        e.preventDefault();
        const page = $(e.target).closest('a').data('page');

        if (page === 'prev') {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        } else if (page === 'next') {
            const pageCount = Math.ceil(this.jsonData.length / this.rowsPerPage);
            if (this.currentPage < pageCount) {
                this.currentPage++;
            }
        } else {
            this.currentPage = parseInt(page);
        }

        this.displayData();
        this.updatePagination();
    }

    updatePagination() {
        $('#pagination a').removeClass('active');
        $(`#pagination a[data-page="${this.currentPage}"]`).addClass('active');
    }

    bindEvents() {
        $(document).on('click', '#pagination a', (e) => this.handlePaginationClick(e));
    }

    init() {
        this.fetchData();
        this.bindEvents();
    }
}