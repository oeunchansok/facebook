<?php
require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST' or !empty($_FILES['file_name']['name']))
{
    $descriptoin = $_POST['descriptoin'];
    $image = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
    $target="../image_upload/".$image;
    move_uploaded_file($tempname,$target);
    if(!empty($descriptoin) or !empty($image)){
        $isCreated = create_post($descriptoin,$image,1);
        if($isCreated){
            header('location:../views/post_view.php');
        }
    }
}
?>