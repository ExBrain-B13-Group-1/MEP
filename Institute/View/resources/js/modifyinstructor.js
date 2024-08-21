$(document).ready(function () {

    let skills = [];

    $("#state-region").change(function() {
        let stateRegionId = $(this).val();
        console.log("Selected State/Region ID:", stateRegionId); // Debugging

        $("#city").empty();

        // Filter cities based on the selected state/region ID
        let filteredCity = cities.filter(function(city) {
            console.log("Checking city:", city); // Debugging
            return city.state_region_id == stateRegionId;
        });

        console.log("Filtered Cities:", filteredCity); // Debugging

        // Populate city dropdown with the result
        filteredCity.forEach(function(city) {
            $("#city").append(
                '<option value="' + city.id + '">' + city.name + '</option>'
            );
        });
    });

    $('#tags-input').on('keypress', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const tagText = $(this).val().trim();
            // console.log(tagText);
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
        skills.push(tagText);
        // console.log(skills);
        $('#skills').val(skills.join());

        tag.find('.remove-tag').on('click', function () {
            tag.remove();
            let tagText = tag[0]['childNodes'][1]['innerText'];
            skills.pop(tagText);
            // console.log(skills.join());
            $('#skills').val(skills.join());
        });
    }

    let skilltags = curskills.trim().split(',');
    skilltags.forEach(skill=>{
        if (skill !== '') {
            addTag(skill.trim());
            $('#tags-input').val('');
        }
    });
    
});