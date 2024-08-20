function editClass(classId){
    console.log(classId);
    $.ajax({
        url: 'http://localhost/MEP/Institute/Controller/ClassEditRuleController.php',
        data: {
            classid: classId
        },
        type: 'POST',
        dataType: 'json',
    }).then(function(response){
        // console.log(response);
        if(response.qualify){
            window.location.href = "http://localhost/MEP/Institute/Controller/EditClassController.php?classid=" + classId;
        }else{
            alert("You are not allowed to edit this class");
        }
    }).catch(function(error){
        console.log(error);
    })

    // window.location.href = "http://localhost/MEP/Institute/Controller/EditClassController.php?classid=" + classId;
}