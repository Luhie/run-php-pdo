<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php-memo join us</title>
</head>
<body>
  <?php require_once("inc/header.php"); ?>
  <h1>php-memo 회원가입</h1>
  <form method="POST" action="regist.post.php">
    <p>
      아이디 :
      <input type="text" name="login_id" />
    </p>
    <p>
      비밀번호 :
      <input type="password" name="login_pw" />
    </p>
    <p>
      이름 :
      <input type="text" name="login_name" />
    </p>
    <p><input type="submit" value="join" /></p>
  </form>
  
</body>
</html>