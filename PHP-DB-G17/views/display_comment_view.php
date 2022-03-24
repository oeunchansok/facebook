<?php
require_once ('../templates/header.php');
require_once ('../models/post.php');
?>
<!-- ---------------------navbar------------ -->
<nav class="navbar navbar-light bg-white">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-primary"> <h3>Facebook</h3></span>
    <i class="fa fa fa-comment " style="font-size:40px; border-bottom: 3px solid black;"></i>
    <a href="../index.php"><i class="fa fa fa-home" style="font-size:40px"></i></a>
  </div>
</nav>
<!-- -----------------------------form for add comment  -->
<div class="container mt-5">
  <?php
  isset($_GET['id']) ? $id=$_GET['id'] : $id=null;
  if($id!=null){
      $post = get_post_by_id($id);
  }
  ?>
  <div class="col-8 m-auto p-3 bg-light ">
    <h4  class="col-6 m-auto p-3">+Add Comment Here..</h4>
    <form action="../controllers/display_comment.php" method="post">
      <input type="hidden" value="<?php echo $post['post_id']?>" name="id">
      <div class="form-group">
        <input type="text" class="form-control " placeholder="Write comment here..." name="comment" value="">
      </div>
      <button class="submit form-control bg-primary">Send</button>
    </form>
</div>
<?php require_once('../templates/footer.php') ?>

