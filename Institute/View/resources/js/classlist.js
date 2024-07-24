
$(document).ready(function () {
    new PaginatedTable('../json/classdatas.json', 10);
    // to change tab
    $(".changes").on("click", function () {
        $(".changes").removeClass("actives");
        $(this).addClass("actives");
        console.log($(this).text());
        if ($(this).text() === "Class Lists") {
            url = "../json/finishedclassdatas.json";
            window.location.href = "./../Class/classlist.php";
        } else if ($(this).text() === "Finished Classes") {
            url = "../json/classdatas.json";
            window.location.href = "./../Class/classlistfinished.php";
        }
    });

    $("#class-photo").change(function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#preview_photo").attr("src", e.target.result).removeClass("hidden");
        };
        reader.readAsDataURL(this.files[0]);
    });
});
