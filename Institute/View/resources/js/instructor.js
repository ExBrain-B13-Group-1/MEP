class InstructorLists extends PaginatedTable{
    displayData() {
        const container = $('#table-body');
        // console.log(container);
        container.empty();
        const start = (this.currentPage - 1) * this.rowsPerPage;
        const end = start + this.rowsPerPage;
        const paginatedItems = this.jsonData.slice(start, end);

        paginatedItems.forEach(item => {
            console.log(item);
            const row = `
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-4 p-4">
                ${item.id}
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                ${item.full_name}
            </th>
            <td class="px-6 py-4">
                ${item.gender}
            </td>
            <td class="px-6 py-4">
                ${item.email}
            </td>
            <td class="px-6 py-4">
                ${item.phone}
            </td>
            <td class="px-6 py-4">
                <a href="javascript:void(0);" class="text-blue-700 underline card-details" onclick="showCard(${item.id})">Details</a>
            </td>
            <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                <a href="javascript:void(0);" class="text-blue-700 underline">Edit</a>
            </td>
        </tr>`;
            container.append(row);
        });
    }
}

new InstructorLists('http://localhost/MEP/Institute/Controller/ViewInstructorController.php', 9);

function showCard(id){
    $('#card-container').text("");
    $('#list-table').removeClass('col-span-8').addClass('col-span-6');
    fetch(`http://localhost/MEP/Institute/Controller/ViewInstructorController.php`).then(response=>response.json())
    .then(datas=>{
        datas.forEach(item=>{
            if(item.id === id){
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
                $('#card-container').append(cardhtml);
                $('#card-container').removeClass('hidden');

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
    .catch();
}

function closeCard(){
    document.getElementById('card-container').classList.add('hidden');
    let getlisttable = document.getElementById('list-table');
    getlisttable.classList.remove('col-span-6');
    getlisttable.classList.add('col-span-8');
}

$(document).ready(function () {
    $('#tags-input').on('keypress', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const tagText = $(this).val().trim();
            if (tagText !== '') {
                addTag(tagText);
                $(this).val('');
            }
        }
    });

    function addTag(tagText) {
        const tag = $(`
                <div class="tag bg-gray-200 dark:bg-gray-600 rounded px-2 py-1 m-1 flex items-center text-black dark:text-white">
                    <span>${tagText}</span>
                    <span class="remove-tag ml-2 cursor-pointer text-gray-500 dark:text-gray-300">&times;</span>
                </div>
            `);
        $('#tags-input').before(tag);

        tag.find('.remove-tag').on('click', function () {
            tag.remove();
        });
    }
});
