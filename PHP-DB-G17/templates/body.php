<!-- ----------------container------------------ -->
<div class="container">
<!----------------------- post filture in right-------------  -->
    <div class="rigth-bar">
        <div class="mx-auto w-75">
            <?php
                $posts = get_post();
                foreach($posts as $post):
                
            ?>
            <div class="card mt-5">
                <div class="card-header  w-25 h-75">
                    <img src="images/sweet.jpg" class="rounded-circle w-50 h-75" alt="">  
                    <H5>MEY SOK</H5>
                    <p><?php echo $post['postDate']?></p>
                </div>
                <div class="card-body">
                    <div class="p-2 ml-3"><?php echo $post['descriptoin'] ?></div> 
                    <div class="img-post w-100 "><img class="w-100" src="image_upload/<?= $post['imges']?>" alt=""></div>
                </div>
                <div class="container m-3 justify-content-between">
<!-- ---------------------------display like--------------------- -->
                    <?php
                        $likes=get_like($post['post_id']);
                        foreach($likes as $like):
                    ?>
                    <form action="controllers/insert_like.php" method='post'class="d-flex mr-4">
                        <button type='submit'>like ❤ <span><?= $like['num_of_like']?></span> </button>
                        <input type="hidden" name="like" style='display:none' value="<?php echo $post['post_id'] ?>">
                    </form>
                <?php endforeach ?>
                <button class="m-3"><a href="views/display_comment_view.php?id=<?php echo $post['post_id'] ?>" >comment</a> </button>
                </div>
<!--------------------------- display comment-------------------- -->
            <?php
                $comments= get_comment_post($post['post_id']);
                foreach($comments as $comment):
            ?>
            <div class="mb-1 w-75 mx-auto d-flex justify-content-between ">
                <p class="comment p-2"><?= $comment['content']?></p>
                <div class="dropdown">
                    <button class=" btn btn-none text-dark " type="button" data-toggle="dropdown"><h3>...</h3></button>
                    <ul class="dropdown-menu" style="border:none; background:none;">
                        <!-- edit -->
                        <a href="views/edit_comment_view.php?id=<?php echo $comment['comment_id']?>"><i class="fa fa-pen"></i></a>
                        <!-- delete -->
                        <a href="controllers/delete_comment.php?id=<?php echo $comment['comment_id'] ?>" ><i class="fa fa-trash text-danger"></i></a>
                    </ul>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <?php endforeach ?>
    </div>
</div>
<!------------------------------ put img cover and profile------------ -->
<div class="left-bar ">
    <div>
        <img class="img-cover" src="images/cute.jpg" alt="">
    </div>
        <div class="img-profile">
            <img class="rounded-circle" src="images/sweet.jpg" alt="" >
        </div>
        <div class="card-text">
            <h3>MEY SOK</h3>
        </div>
        <div class="btn_post mt-3">
            <button><a href="views/post_view.php">What's you mind</a></button> 
        </div>
    </div>
</div>