<p style='text-align:right'>
  <?php
  if (isset($_SESSION) === false){session_start();}
  if (isset($_SESSION['member_id']) === false){
  ?>
  <a href="/regist.php">join us</a>
  <a href="/login.php">login</a>
  <?php
  }else{
  ?>
  <a href="/logout.php">logout</a>
  <?php
  }
  ?>
</p>