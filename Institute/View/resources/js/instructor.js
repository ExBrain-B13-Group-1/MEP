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


console.log("hello");