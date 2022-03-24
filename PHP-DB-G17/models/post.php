<?php
require_once('database.php');
// ________________________function create post____________
function create_post($descriptoin,$image,$user_id)
{
    global $db;
    $statement = $db->prepare('INSERT INTO posts (descriptoin,imges,user_id) values(:descriptoin,:images,:user_id)');
    $statement->execute([
        ':descriptoin' => $descriptoin,
        ':images' => $image,
        ':user_id' => $user_id
    ]);
    return $statement->rowcount()>0;
}
// ________________________function get post____________
function get_post()
{   
    
    global $db;
    $statement = $db->prepare('SELECT * FROM posts ORDER BY post_id desc');
    $statement->execute();
    return $statement->fetchAll();
}
// ________________________function remove post____________
function delete_post($id)
{
    global $db;
    $statement = $db->prepare('DELETE FROM posts WHERE post_id = :post_id');
    $statement->execute([
        ':post_id' => $id
    ]);
    return $statement->rowCount() > 0;
}
// ________________________function get post by id____________
function get_post_by_id($id){
    global $db;
    $statement =$db->prepare("SELECT * FROM posts WHERE post_id = :post_id ORDER BY post_id");
    $statement->execute([
        ':post_id'=>$id,
    ]);
    return $statement->fetch();
}
// ________________________function update post____________
function update_post($descriptoin,$images,$post_id){
    global $db;
    $statement=$db ->prepare("UPDATE posts SET descriptoin=:descriptoin,imges=:imges where post_id = :post_id");
    $statement->execute([
        ':descriptoin'=>$descriptoin,
        ':imges'=>$images,
        ':post_id' => $post_id
    ]);
    return $statement->rowcount()>0;
}



