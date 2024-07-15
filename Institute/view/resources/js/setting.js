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
            }
        });
    });
    
});