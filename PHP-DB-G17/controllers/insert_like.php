<?php
// insert like 
require_once '../models/like.php';
if($_SERVER['REQUEST_METHOD']=='POST'){   
$num_like = 1;
$post_id =$_POST['like'];
if(!empty($post_id)){
    $is_created = insert_like(1,$post_id,$num_like);
    if($is_created){
        header('location:../index.php');
        }
    }
}