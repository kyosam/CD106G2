<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>森存者後台</title>
</head>
<body>
  <div id="st">
  <div class="logo">
    <img src="images/logo.png" alt="logo">
  </div>
  <div class="container">
    <form action="back_login_checkid.php" method="POST">
    <h2>後端管理系統</h2>
    <?php
    if(isset($_SESSION['reason'])){
      if($_SESSION['reason'] == 'nonexist'){
    //   echo "<p class='error'>此帳號密碼不存在</p>";
         echo "<script>alert('此帳號密碼不存在');</script>";
      }else if($_SESSION['reason'] == 'admStatus0'){
    //   echo "<p class='error'>此帳號已被停權</p>";
      echo "<script>alert('此帳號已被停權');</script>";
      }
    }
    ?>
    <p><label>帳號 <input type="text" class="inputs" name="admId" placeholder="account" autofocus required></label></p>
    <p><label>密碼 <input type="password" class="inputs" name="admPsw" placeholder="password" required></label></p>
    <input type="submit" value="登入">
  </form>
  </div>
</body>
</html>