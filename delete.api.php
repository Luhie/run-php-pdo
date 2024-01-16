<?php
header('Content-Type: application/json');

session_start();
if (isset($_SESSION['member_id']) === false){
    echo json_encode(array('result' => false));
    exit();
}

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : null;
if ($post_id == null){
    echo json_encode(array('result' => false));
    exit();
}

require_once("inc/db.php");

$member_id = $_SESSION['member_id'];

$result = db_update_delete("delete from tbl_post where post_id = :post_id and member_id = :member_id",
    array(
        'post_id' => $post_id,
        'member_id' => $member_id
    )
);

echo json_encode(array('result' => $result));
