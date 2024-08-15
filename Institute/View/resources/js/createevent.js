$(document).ready(function () {

    let isSet = false;

    let agendaItems = [
        { time: '9:30 AM - 10:00 AM', title: 'Meet the Team (Sample Format) ' }
    ];

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

    const renderAgenda = () => {
        $('#agendaContainer').empty();
        $.each(agendaItems, function(index, item) {
            const truncatedTitle = item.title.length > 40 ? item.title.substring(0, 40) + '...' : item.title;
            const row = `
                <div class="flex justify-between items-center dark:bg-gray-700 p-2 rounded shadow">
                    <div class="flex-1">
                        <p class="text-gray-700 dark:text-gray-400">${item.time}</p>
                        <p class="text-gray-900 font-bold overflow-hidden whitespace-nowrap text-ellipsis dark:text-gray-300">${truncatedTitle}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="editBtn text-blue-500 mr-12 pr-1.5" data-index="${index}">
                            <ion-icon name="create-outline" class="w-5 h-5"></ion-icon>
                        </button>
                        <button class="deleteBtn text-red-500 pr-3" data-index="${index}">
                            <ion-icon name="trash-outline" class="w-5 h-5"></ion-icon>
                        </button>
                    </div>
                </div>
            `;
            $('#agendaContainer').append(row);
        });

        $('.editBtn').on('click', function() {
            const index = $(this).data('index');
            $('#timeInput').val(agendaItems[index].time);
            $('#titleInput').val(agendaItems[index].title);
            $('#modalTitle').text('Edit Item');
            $('#modal').removeClass('invisible').data('editIndex', index);
        });

        $('.deleteBtn').on('click', function() {
            const index = $(this).data('index');
            agendaItems.splice(index, 1);
            renderAgenda();
        });
    };

    $('#addBtn').on('click', function() {
        $('#timeInput').val('');
        $('#titleInput').val('');
        $('#modalTitle').text('Add Item');
        $('#modal').removeClass('invisible').removeData('editIndex');
        $('#error').addClass('invisible');
    });

    $('#saveBtn').on('click', function() {
        const time = $('#timeInput').val();
        const title = $('#titleInput').val();

        if (!time || !title) {
            $('#error').removeClass('invisible');
            return;
        }

        const newItem = { time, title };

        const editIndex = $('#modal').data('editIndex');
        if (editIndex !== undefined) {
            agendaItems[editIndex] = newItem;
        } else {
            agendaItems.push(newItem);  
        }

        $('#modal').addClass('invisible');
        renderAgenda();
    });

    $('#cancelBtn').on('click', function() {
        $('#modal').addClass('invisible');
    });

    renderAgenda();

});



