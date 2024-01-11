<?php
function db_get_pdo()
{
  $host = 'localhost';
  $port = '3306';
  $dbname = 'phpmemo';
  $charset = 'utf8';
  $username = 'phpmemo';
  $db_pw = "1234";
  $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
  $pdo = new PDO($dsn, $username, $db_pw);
  return $pdo;
}
function db_select($query, $param = [])
{
  $pdo = db_get_pdo();
  try {
    $st = $pdo->prepare($query);
    $st->execute($param);
    $result = $st->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
    return $result;
  } catch (PDOException $ex) {
    return false;
  } finally {
    $pdo = null;
  }

}
function db_insert($query, $param = [])
{
  $pdo = db_get_pdo();
  try {
    $st = $pdo->prepare($query);
    $result = $st->execute($param);
    $last_id = $pdo->lastInsertId();
    $pdo = null;
    if ($result) {
      // var_dump($result); true나와영:
      // die;
      return $last_id;
    } else {
      return false;
    }
  } catch (PDOException $ex) {
    return false;
  } finally {
    $pdo = null;
  }
}

function db_update_delete($query, $param = [])
{
  $pdo = db_get_pdo();
  try {
    $st = $pdo->prepare($query);
    $result = $st->execute($param);
    $pdo = null;
    return $result;
  } catch (PDOException $ex) {
    return false;
  } finally {
    $pdo = null;
  }

}




?>