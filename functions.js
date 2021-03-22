//delete images
function unlink_UserImage(image_path ="", id = 0,empty_img = 0) {

    var obj = {path: image_path, id: id, empty: empty_img};
    var send = JSON.stringify(obj);
    $.ajax({
        url : "http://localhost/sdms/php_files/databaseApi_delete.php?api_del_id=1",
        type : "POST",
        data : send,
        success: function(data){
           if(data != ""){
                //console.log(data);
                setTimeout(location.reload.bind(location),1000); 
            }
        }
    });
};

//image preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

//message function
function message(message,status) { // message("display error or succes message", false);
    if (status == true) {
        $("#success").html(message).slideDown();
        $("#error").slideUp();
        setTimeout(function () {
            $("#success").slideUp();
        },5000)
    }else if(status == false){
        $("#error").html(message).slideDown();
        $("#success").slideUp();
        setTimeout(function () {
            $("#error").slideUp();
        },5000)
    }
}

 // function form-data to json 
 function jsonData(form_id) {
    var form_data = $(form_id).serializeArray(); //get all form values in array
    var obj ={};
    for (let a = 0; a < form_data.length; a++) { // convert form_data array into javaScript-Object
        obj[form_data[a].name] = form_data[a].value;
    }
    var json_data = JSON.stringify(obj); //convert java script-object into Json
    //console.log(json_data);
    return json_data;
}