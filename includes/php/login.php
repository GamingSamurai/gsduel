<?php

$title = 'DuelSystemGO! by GamingSamurai';
$heading = 'DuelSystemGO! by GamingSamurai';

if(isset($_POST)) {
    
} else {

start_page($title, $heading);
?>
<h2>Welcome to the Gaming Samurai DuelSystemGo!</h2>
<h3>Please Login or <a href="register.php">Register</a> to continue:</h3>
<form action="<?php echo $_SELF ?>" method="POST">
    <label>Username</label><input type="text" id="uname" name="user">
    <label>Password</label><input type="text" id="pword" name="pass">
</form>
<?
}

end_page();
