<?php
require_once '../models/comment.php';
if($_SERVER['REQUEST_METHOD']=='POST'){   
$post_id =$_POST['id'];
echo $post_id;
$content = $_POST['comment'];
if(!empty($content) and !empty($post_id) ){
    $is_created = create_comment($content,1,$post_id);
    if($is_created){
        header('location:../index.php');
        }
    }
}
