//delete images
function unlink_UserImage(image_path ="", id = 0,empty_img = 0) {

    var obj = {path: image_path, id: id, empty: empty_img};
    var send = JSON.stringify(obj);
    $.ajax({
        url : "http://localhost/sdms/php_files/databaseApi.php?api_id=4",
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