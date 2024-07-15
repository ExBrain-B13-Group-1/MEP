$(document).ready(function(){

    $('.modechanges').on("click",()=>{
        updateChartColors();
    });

    $('.changes').on('click', function() {
        $('.changes').removeClass("actives");
        $(this).addClass('actives');
        console.log($(this).text());
        if ($(this).text() === "Class Lists") {
            window.location.href = './../class/classlist.html';
        } else if ($(this).text() === "Finished Classes") {
            console.log("fina");
            window.location.href = './../class/classlistfinished.html';
        }
    });

});