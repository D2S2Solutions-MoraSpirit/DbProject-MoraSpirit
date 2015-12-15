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

function myIndexOf(item) {

    alert(php_var[0].getResourceId());
    for (var i = 0; i < eqList.length; i++) {
        if (eqList[i].getEquipmentName() == item) {
            return eqList[i].getResourceId();
        }
    }
    return -1;
}

function addRequestResource(){


    alert(equipmentType);
    var resourceId=myIndexOf(equipmentType);

    $('select[name="equipmentCombo"]').find(":selected").text();




}