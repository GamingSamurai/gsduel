<?php
include_once(dirname(dirname(dirname(__FILE))) . '/boot.php');
$title = 'DuelSystemGO! by GamingSamurai';
$heading = 'DuelSystemGO! by GamingSamurai';


start_page($title, $heading);
?>
<h2>Welcome to the Gaming Samurai DuelSystemGo!</h2>
<?php
if(!isset($_SESSION['register'])) {
?>
<h3>Please Login or <a href="register.php">Register</a> to continue:</h3>
<form action="<?php echo $_SELF ?>" method="POST">
    <label>Username: </label><input type="text" id="uname" name="user">
    <label>Password: </label><input type="text" id="pword" name="pass">
</form>
<?php
} else {
?>
<h3>Please <a href="register.php">Register</a> to continue:</h3>
<form action="<?php echo $_SELF ?>" method="POST">
    <label>Username: </label><input type="text" id="uname" name="ruser">
    <label>Password: </label><input type="text" id="pword" name="rpass">
    <label>Confirm Password: </label><input type="text" id="pword2" name="rpass2">
    <label>Email: </label><input type="text" id="email" name="email">
</form>
<?php
}

end_page();
