<?php
header('Content-Type: application/json');

session_start();
if (isset($_SESION['member_id']) === false){
  echo json_encode(['result' => false]);
  exit();
}

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null;
if ($post_id == null){
  echo json_encode(['result' => false]);
  exit();
}

require_once("incl/db.php");

$member_id = $_SESSION['member_id'];
$result = "DELTE FROM tbl_post WHERE post_id = :post_id AND member_id = :member_id";
$result = db_update_delete($sql, array(
  'post_id' => $post_id,
  'member_id' => $member_id
));
echo json_encode(['result' => $result]);