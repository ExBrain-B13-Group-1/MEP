class FinishedClassDetails extends PaginatedTable {
    displayData() {
        const container = $('#table-body');
        container.empty();
        const start = (this.currentPage - 1) * this.rowsPerPage;
        const end = start + this.rowsPerPage;
        const paginatedItems = this.jsonData.slice(start, end);

        paginatedItems.forEach(item => {
            const row = `
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    ${item.id}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    ${item.name}
                                </th>
                                <td class="px-6 py-4">
                                    ${item.gender}
                                </td>
                                <td class="px-6 py-4">
                                    ${item.showRelatedClass()}
                                </td>
                                <td class="px-6 py-4">
                                    <input type="checkbox" ${(item.certificate) ? checked : unchecked} />
                                </td>
                                <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                                    Details
                                </td>
                            </tr>`;
            container.append(row);
        });
    }
}