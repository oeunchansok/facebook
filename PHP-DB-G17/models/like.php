<?php
require_once('database.php');
// _____________________________________insert like________________
function insert_like($user_id,$post_id,$num_like){
    global $db;
    $statement = $db->prepare('INSERT INTO likes (user_id,post_id,num_like) values(:user_id,:post_id,:num_like)');
    $statement->execute([
        ':user_id' => $user_id,
        ':post_id' => $post_id,
        ':num_like'=> $num_like
    ]);
    return $statement->rowcount()>0;
}
// _____________________________________git like on post________________
function get_like($post_id){
    global $db;
    $statement=$db->prepare("SELECT count(num_like) AS 'num_of_like' FROM likes WHERE post_id=:post_id");
    $statement->execute([
        ':post_id' => $post_id
    ]);
    return $statement->fetchAll();
}