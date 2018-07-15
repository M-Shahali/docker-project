<?
require_once('main.php');
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
    <div class="tac">
        <img src="image/notes.png"><br><br>

        <form action="register-check.php" method="post">
            <input type="text" class="ltr" placeholder="<?=_ph_studentNumber?>" name="studentNumber"><br>
            <br>
            <input type="password" class="ltr" placeholder="<?=_ph_password?>" name="password1"><br>
            <input type="password" class="ltr" placeholder="<?=_ph_confirm_password?>" name="password2"><br>
            <br>
            <input type="text" placeholder="<?=_ph_fieldName?>" name="fieldName"><br>
            <input type="text" placeholder="<?=_ph_name?>" name="name"><br>
            <input type="text" placeholder="<?=_ph_lastName?>" name="lastName"><br>
            <br>
            <br>
            <input type="text" placeholder="<?=_ph_nationalNumber?>" name="nationalNumber"><br>
            <input type="text" placeholder="<?=_ph_phoneNumber?>" name="phoneNumber"><br>
            <br>
            <br>
            <button type="submit" class="btn-blue"><?=_btn_register?></button>
        </form>

    </div>
</div>
<?
?>
</body>
</html>
