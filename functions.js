//delete images
function unlink_UserImage(image_path ="", id = 0) {
    var path = image_path;
    var userid = id;
    $.ajax({
        url : "deleteUserPImg.php",
        type : "POST",
        data : {path : path, id:userid},
        success: function(data){
            if(data != ""){
                $("#imagePre").html('');
                setTimeout(location.reload.bind(location),1000); 
            }
        }
    });
};