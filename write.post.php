<?php
session_start();
if (isset($_SESSION['member_id']) === false){
  header("Location: /list.php");
  exit();
}

$post_content = isset($_POST['post_content']) ? $_POST['post_content'] : null;
if ($post_content ==null || trim($post_content) == ''){
  header("Location: /list.php");
  exit();
}

require_once("inc/db.php");

$member_id = $_SESSION['member_id'];

$sql = "INSERT INTO tbl_post (post_content, member_id) VALUES (:post_content, :member_id)";
$post_id = db_insert($sql, array(
    'post_content'=> $post_content,
    'member_id'=> $member_id
  )
);

header("Location: /list.php");
exit();