$(document).ready(function(){

    $('.modechanges').on("click",()=>{
        updateChartColors();
    });

    $('.changes').on('click', function() {
        $('.changes').removeClass("actives");
        $(this).addClass('actives');
        console.log($(this).text());
        if ($(this).text() === "Class Lists") {
            console.log("dash");
            $('.classlists').removeClass('hidden').addClass('block');
            $('.finishedclasses').removeClass('block').addClass('hidden');
        } else if ($(this).text() === "Finished Classes") {
            console.log("fina");
            $('.classlists').removeClass('block').addClass('hidden');
            $('.finishedclasses').removeClass('hidden').addClass('block');
        }
    });

});