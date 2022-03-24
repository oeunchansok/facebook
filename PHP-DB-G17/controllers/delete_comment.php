<?php
require_once '../models/comment.php';
$id = null;
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
if($id !== null)
{
    delete_comment($id);
    header('location: ../index.php');
}