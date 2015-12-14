function getStudentDetails(event){
    if(event.keyCode()==13){
        alert("tjos os pl");
    }
}

$(document).ready(function(){
    $("label").click(function(){
        alert("Text");
    });

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $("#studentID").keydown(function(event){
        if(event.keyCode == 13) {
            alert("tis is ok");
        }
    });

    $("#but").click(function(){
        alert("sdf");
        $.ajax({
            url:"/getStudentDetail",
            type: "POST",
            data: { "tag_id" : "sd" },
            success: function(data) {
                alert(data);
            }
        });
    });

});