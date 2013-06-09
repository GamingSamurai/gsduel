<?php
include_once(dirname(dirname(dirname(__FILE))) . '/boot.php');
$title = 'DuelSystemGO! by GamingSamurai';
$heading = 'DuelSystemGO! by GamingSamurai';


start_page($title, $heading);
?>
<h2>Welcome to the Gaming Samurai DuelSystemGo!</h2>
<?php
if((!isset($_SESSION['register'])) || (isset($_SESSION['register']) == false)) {
?>
<h3>Please Login or <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"><input type=hidden name="register" value="true"><input type="submit" value="Register"> </form> to continue:</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="register" value="false">
    <label>Username: </label><input type="text" id="uname" name="user">
    <label>Password: </label><input type="text" id="pword" name="pass">
    <input type="submit">
</form>
<?php
} else {
?>
<h3>Thank you for deciding to Register:</h3>
<form action="register.php" method="POST">
    <label>Username: </label><input type="text" id="uname" name="ruser">
    <label>Password: </label><input type="text" id="pword" name="rpass">
    <label>Confirm Password: </label><input type="text" id="pword2" name="rpass2">
    <label>Email: </label><input type="text" id="email" name="remail">
    <input type="submit">
</form>
<?php
}

end_page();
