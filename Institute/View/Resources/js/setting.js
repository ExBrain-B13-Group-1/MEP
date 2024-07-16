$(document).ready(function(){


    $('.modechanges').on("click",()=>{
        updateChartColors();
    });

    $('.changes').on('click', function() {
        $('.changes').removeClass("actives");
        $(this).addClass('actives');
        console.log($(this).text());

        const sections = {
            "General": ".generals",
            "Account & Security": ".accsecuritys",
            "Privacy & Policy": ".privacys",
            "Social Link": ".sociallinks"
        };
        
        const selectedText = $(this).text();
        
        Object.keys(sections).forEach(key => {
            const section = sections[key];
            if (key === selectedText) {
                $(section).removeClass('hidden').addClass('block');
            } else {
                $(section).removeClass('block').addClass('hidden');
                $('.generaledits').removeClass("block").addClass("hidden");
            }
        });
    });

    function togglePasswordVisibility(toggleId, inputId) {
        $(`#${toggleId}`).on('click', function () {
            const passwordField = $(`#${inputId}`);
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            const iconName = type === 'password' ? 'eye-off-outline' : 'eye-outline';
            $(this).attr('name', iconName);
        });
    }

    togglePasswordVisibility('toggle-password-cur', 'cur-password');
    togglePasswordVisibility('toggle-password-new', 'new-password');
    togglePasswordVisibility('toggle-password-confirm', 'confirm-password');


    $('#edit').on("click",()=>{
        // console.log('hay');
        $('.generals').removeClass("block").addClass("hidden");
        $('.generaledits').removeClass("hidden").addClass("block");
    });

    $('.cancels').on("click",()=>{
        // console.log("hay");
        $('.generals').removeClass("hidden").addClass("block");
        $('.generaledits').removeClass("block").addClass("hidden");
    });

    $('.saves').on("click",(e)=>{
        // console.log("hay");
        e.preventDefault();
        $('.generals').removeClass("hidden").addClass("block");
        $('.generaledits').removeClass("block").addClass("hidden");
    });

});