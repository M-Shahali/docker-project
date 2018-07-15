<?
require_once('main.php');

$userName = $_POST['userName'];
$password = $_POST['password'];

if (!$session = is_logged_in($userName,$password)){
  $message = _user_not_registered;
  require_once("msg-fail.php");
  exit;
} else {
    //echo $session;
    //we have to set cookie and work on links
    setcookie("session", $session, time()+3600, "/","", 0);
    ?>
    <html>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="style.css">
    <body>
<div class="tac" style="margin-left:40%">
<ul style="list-style-type: none">
    <li style="float: left">
    <form action="http://127.0.0.1:8084/index.php" method="post">
        <input type="hidden" name="userName" value="<?=$userName?>"><br>
        <button type="submit" class="btn-blue"><?=_btn_education?></button>
    </form>
    </li>
    <li style="float: left">
    <form action="http://127.0.0.1:8081/index.php" method="post">
        <input type="hidden" name="userName" value="<?=$userName?>"><br>
        <button type="submit" class="btn-blue"><?=_btn_library?></button>
    </form>
    </li>
    <li style="float: left">
    <form action="http://127.0.0.1:8082/index.php" method="post">
        <input type="hidden" name="userName" value="<?=$userName?>"><br>
        <button type="submit" class="btn-blue"><?=_btn_nutrition?></button>
    </form>
    </li>
</ul>
</div>
    </body>
    </html>
    <?
}

?>
