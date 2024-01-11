<?php

session_start();
if (isset($_SESSION['member_id'])){
  header("Location: /list.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>php-memo list</title>
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <h1>php-memo 첫 페이지</h1>
  </body>
</html>