function getStudentDetails(event) {
    if (event.keyCode() == 13) {
        alert("tjos os pl");
    }
}

$(document).ready(function () {


    $("#studentID").keydown(function (event) {
        if (event.keyCode == 13) {
            $.ajax({
                url: "/getStudentDetail",
                type: "GET",
                data: {"student_id": $("#studentID").val()},
                success: function (data) {
                    $("#name").val(data["name"]);
                    $("#faculty").val(data["faculty"]);
                    $("#batch").val(data["batch"]);//alert(data);
                    //var json_obj = $.parseJSON(data);

                }
            });
        }
    });


});