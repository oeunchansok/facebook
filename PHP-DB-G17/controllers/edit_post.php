<?php require_once '../models/post.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['itemId'];
    $descriptoin = $_POST['descriptoin'];
    // $imges = $_POST['old_image'];
    if (!empty($_FILES["uploadfile"]["name"])){
        $image = $_FILES["uploadfile"]["name"];
    }else{
        $image=$_POST['old_image'];
    }   
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $target="../image_upload/".$image;
    move_uploaded_file($tempname,$target);
    if(!empty($descriptoin) or !empty($imges)){
        $up_date_posts = update_post($descriptoin,$image,$id);
        header('location:../views/post_view.php');
    }
}