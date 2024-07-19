$(document).ready(function(){

    $('.changes').on('click', function() {
        $('.changes').removeClass("actives");
        $(this).addClass('actives');
        console.log($(this).text());
        if ($(this).text() === "Class Lists") {
            window.location.href = './../Class/classlist.php';
        } else if ($(this).text() === "Finished Classes") {
            console.log("fina");
            window.location.href = './../Class/classlistfinished.php';
        }
    });

    $('.class-views').on("click",function(){
        console.log('hay');
        // view details
        // sample prototype path change
        // window.location.href = ""
        // fetch will be here 
    });

});


console.log("hay");