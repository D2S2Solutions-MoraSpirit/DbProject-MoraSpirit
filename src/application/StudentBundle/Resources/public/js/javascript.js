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




function submitTable(){
    var data = [];
    jQuery.each(jQuery('#resourceItemTable tr:gt(0)'), function(i,e ) {
        data.push(jQuery('td', e).map(function(i,e) {
                return e.innerHTML;
            }).get()
        );
    });


   var studentID= $("#studentID").val();
   var requestID= $("#requestID").val();

    jQuery.ajax({
        url: "/submitStudentRequest",
        type: "GET",
        data: {"student_id": studentID,"request_id":requestID,"tableList":data},
        success: function (data) {

            if(data['status']==true){
                alert("Successfully added the request");
            }else{
                alert("Unable to add request");
            }

            //var json_obj = $.parseJSON(data);

        }
    });


}


