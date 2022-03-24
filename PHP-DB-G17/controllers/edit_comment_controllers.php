<?php require_once '../models/comment.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $content = $_POST['comment'];
    if(!empty($content)){
        $up_date_comments = update_comment($content,$id);
        header('location:../index.php');
    }
}