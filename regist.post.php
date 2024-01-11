<?php
require_once("inc/db.php");

$login_id = isset($_POST['login_id']) ? $_POST['login_id'] : null;
$login_pw = isset($_POST['login_pw']) ? $_POST['login_pw'] : null;
$login_name = isset($_POST['login_name']) ? $_POST['login_name'] : null;

if ($login_id == null || $login_pw == null || $login_name == null){
  header("Location: /regist.php");
  exit();
}

$sql = "SELECT COUNT(member_id) cnt FROM tbl_member WHERE login_id =?";
$member_count = db_select($sql, array($login_id));
if ($member_count && $member_count[0]['cnt'] == 1){
  header("Location: /regist.php");
  exit();
}

$bcrypt_pw = password_hash($login_pw, PASSWORD_BCRYPT);

$sql = "INSERT INTO tbl_member (login_id, login_name, login_pw) VALUES (:login_id, :login_name, :login_pw)";
db_insert($sql, array(
  'login_id' => $login_id,
  'login_name' => $login_name,
  'login_pw' => $bcrypt_pw
  )
);

header("Location: /login.php");