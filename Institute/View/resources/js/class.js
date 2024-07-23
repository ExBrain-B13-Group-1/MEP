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
        window.location.href = "./../Class/viewdetailscalss.php";
        // fetch will be here 
    });

    $('#class-photo').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview_photo').attr('src', e.target.result).removeClass('hidden');
        };
        reader.readAsDataURL(this.files[0]);
    });

    $('#create-publish').on("click",(e)=>{
        console.log("hay");
        e.preventDetault();
        window.location.href = 'http://localhost/MEP/Institute/View/resources/Class/viewdetailsclass.php';
    });

    $('#create-cancel').on("click",(e)=>{
        console.log("hay");
        e.preventDetault();
        window.location.href = 'http://localhost/MEP/Institute/View/resources/Class/createclass.php';
    });

    $('#modify-savechange').on("click",(e)=>{
        console.log("hay");
        e.preventDetault();
        window.location.href = 'http://localhost/MEP/Institute/View/resources/Class/viewdetailsclass.php';
    });

    $('#modify-savechange').on("click",(e)=>{
        console.log("hay");
        e.preventDetault();
        window.location.href = 'http://localhost/MEP/Institute/View/resources/Class/viewdetailsclass.php';
    });

    $('#modify-cancel').on("click",(e)=>{
        console.log("hay");
        e.preventDetault();
        window.location.href = 'http://localhost/MEP/Institute/View/resources/Class/viewdetailsclass.php';
    });

});


console.log("hay");