<?php
require_once("inc/db.php");

$login_id = isset($_POST['login_id']) ? $_POST['login_id'] : null;
$login_pw = isset($_POST['login_pw']) ? $_POST['login_pw'] : null;

if ($login_id == null || $login_pw == null){    
  header("Location: /login.php");
  exit();
}

$sql = "SELECT * FROM tbl_member WHERE login_id = ?";
$member_data = db_select($sql, array($login_id));

if ($member_data == null || count($member_data) == 0){
  header("Location: /login.php");
  exit();
}

$is_match_password = password_verify($login_pw, $member_data[0]['login_pw']);

if ($is_match_password === false){
  header("Location: /login.php");
  exit();
}

session_start();
$_SESSION['member_id'] = $member_data[0]['member_id'];

header("Location: /list.php");





