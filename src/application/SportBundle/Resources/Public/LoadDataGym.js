/**
 * Created by Sineth on 12/15/2015.
 */

function test(){
    alert("tjos os pl");
}

function getScheduleData(){
    $.ajax({
        url: "/ViewScheduleDataController",
        type: "GET",
        data: {"resource_id": $("#studentID").val()},
        success: function (data) {
            $("#name").val(data["name"]);
            $("#faculty").val(data["faculty"]);
            $("#batch").val(data["batch"]);//alert(data);
            //var json_obj = $.parseJSON(data);

        }
    }
);
}

