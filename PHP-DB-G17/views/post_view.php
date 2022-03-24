<?php
// require file
require_once ('../templates/header.php');

require_once ('../models/post.php');
require_once ('../models/like.php');
require_once ('../models/comment.php');

?>
<!-- ----------------------navbar-------------- -->
<nav class="navbar navbar-light bg-white" style="position: -webkit-sticky; position: sticky; top: 0; z-index:1;">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-primary "> <h3>Facebook </h3></span>
    <i class="fa fa fa-user text-primary p-2 " style="font-size:40px;border-bottom: 3px solid blue"></i>
    <a href="../index.php"><i class="fa fa fa-home" style="font-size:40px"></i></a>
  </div>
</nav>

<!-------------------button add post--------------- -->

<div class="container  m-auto bg-light"  >
    <div class="text-center ">
        <button   type="button" class="btn btn-primary bg-primary w-75 m-auto " data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Add Post</button>
    </div>

    <!-- -------------------Modal---------------------- -->
    <div class="modal fade w-75 m-auto" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Post</h5>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">close</a>
                </div>
                <div class="modal-body">
                    <form action="../controllers/create_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="descriptoin" name="descriptoin">
                            <!-- input file image  -->
                            <label for="uploadfile"><i class='fas fa-image' style='font-size:36px;color:green'></i></label>
                            <input type="file" name="uploadfile" value="" class="form-control" style='display:none' id="uploadfile">
                        </div>
                        <div class="form-group"> 
                            <button type="submit"  class="submit form-control bg-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -----------------------card post------------------- -->
    <div class=" w-75 m-auto col-12">
        <?php
            $posts = get_post();
            foreach($posts as $post):
        ?>
    <!-- -------------------------create profilt acc  when post------------- -->
        <div class="card m-5 ">
            <div class="card-header bg-white d-flex justify-content-between">                                       
                <div class=" w-25 h-75 ">
                    <img src="../images/sweet.jpg" class="rounded-circle w-50 h-75 " alt="">  
                    <H5>MEY SOK</H5>
                    <p><?php echo $post['postDate']?></p>
                </div>
                <div class="dropdown ">
                    <button class=" btn btn-none text-dark  " type="button" data-toggle="dropdown"><h1>...</h1></button>
                    <div class="dropdown-menu" style="border:none; background:none;">
                        <!-- edit -->
                        <a href="edit_view.php?id=<?php echo $post['post_id']?>"><i class="fa fa-pen"></i></a>
                        <!-- delete -->
                        <a href="../controllers/delete_post.php?id=<?php echo $post['post_id'] ?>" ><i class="fa fa-trash text-danger"></i></a>
                    </div>
                </div>   
            </div>
    <!-----------------------------create descriptoin and img for post ----------------->
            <div class="card-body">
                <div class="p-2 ml-3"><?php echo $post['descriptoin'] ?></div> 
                <div class="img-post"><img src="../image_upload/<?= $post['imges']?>" alt="" class="w-100"></div>
            </div>
            <div class="container m-3  justify-content-between" style="display:flex;border:none;background:none;">
<!-- ---------------------------display like--------------------- -->
                    <?php
                        $likes=get_like($post['post_id']);
                        foreach($likes as $like):
                    ?>
                    <form action="../controllers/insert_like.php" method='post'class="d-flex mr-4">
                        <button type='submit'style="display:flex;border:none;background:none;">like ❤ <span><?= $like['num_of_like']?></span> </button>
                        <input type="hidden" name="like" style='display:none' value="<?php echo $post['post_id'] ?>">
                    </form>
                <?php endforeach ?>
                <button class="m-3" style="display:flex;border:none;background:none;"><a href="../views/display_comment_view.php?id=<?php echo $post['post_id'] ?>" >comment</a> </button>
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
                        <a href="../views/edit_comment_view.php?id=<?php echo $comment['comment_id']?>"><i class="fa fa-pen"></i></a>
                        <!-- delete -->
                        <a href="../controllers/delete_comment.php?id=<?php echo $comment['comment_id'] ?>" ><i class="fa fa-trash text-danger"></i></a>
                    </ul>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <?php endforeach ?>
    </div>        
</div>
<?php require_once ('../templates/footer.php');?>