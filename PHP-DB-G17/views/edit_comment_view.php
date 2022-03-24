<?php
require_once('../templates/header.php');
require_once('../models/comment.php');
?>
<!--------------------------- form input edit post--------------- -->
<nav class="navbar navbar-light bg-white">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-primary"> <h3>Facebook</h3></span>
    <i class="fa fa fa-comment " style="font-size:40px; border-bottom: 3px solid black;"></i>
    <a href="../index.php"><i class="fa fa fa-home" style="font-size:40px"></i></a>
  </div>
</nav>

<div class="container mt-5 ">
  <?php
    isset($_GET['id']) ? $id=$_GET['id'] : $id=null;
      if($id!=null){
        $comment = get_comment_by_id($id);
      }
  ?>
  <div class="col-8 m-auto p-3 bg-light">
    <h4  class="col-6 m-auto p-3">+Update Comment Here..</h4>
    <form action="../controllers/edit_comment_controllers.php" method="post">
      <input type="hidden" value="<?php echo $comment['comment_id']?>" name="id">
          <div class="form-group">
            <input type="text" class="form-control " placeholder="comment" name="comment" value="<?php echo $comment['content']?>">
          </div>
          <button class="submit form-control bg-primary">Update</button>
    </form>
  </div>
</div>
<?php require_once ('../templates/footer.php'); ?>