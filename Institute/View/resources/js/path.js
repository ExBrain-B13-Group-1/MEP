$(document).ready(function(){
    $('.sidebarlinks').click(function(){
        let clickpage = $(this).attr('click-page');
        $('.add-new-classs').click(function(){
            console.log("hay");
        });
        
        // console.log(clickpage);

        const pageMap = {
            "dashboard": "Dashboard/dashoverview.php",
            "class-lists": "Class/classlist.php",
            "create-new-class": "Class/createclass.php",
            "delete-class": "Class/deleteclass.php",
            "instructor-list": "Instructor/instructorlist.php",
            "add-instructor": "Instructor/addinstructor.php",
            "delete-instructor": "Instructor/deleteinstructor.php",
            "student-list": "Student/studentlist.php",
            "event-list": "Event/eventlist.php",
            "create-event": "Event/createevent.php",
            "history": "History/history.php",
            "notification": "Notification/notification.php",
            "setting": "Setting/setting.php",
            "logout": "" // Special case for logout
        };

        if (clickpage in pageMap) {
            if (clickpage === "logout") {
                console.log("logout");
            } else {
                window.location.href = `./../../resources/${pageMap[clickpage]}`;
            }
        }
    });
});
