
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>

<?php

if(isset($_FILES['image'])) {
    // $error = array();
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';


$file_name = $_FILES['image']['name'];
$file_temp = $_FILES['image']['tmp_name'];   
$size = $_FILES['image']['size'];
$file_explode = explode('.',$file_name);
$file_ext = end($file_explode);
$file_type = array('jpeg','jpg','png');

    // 1kb = 1024 bytes and 1mb = 1024 kb so 1mb = 1048576
if($size > 2097152) {
    echo "File should be less than 2 MB.";
}elseif(in_array($file_ext,$file_type) == false) {
    echo "File type error";
}elseif(move_uploaded_file($file_temp,"upload/".$file_name)) {
    echo "Your image has been uploaded succesfully";
}
}

?>


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="send">
</form>
    
</body>
</html>
