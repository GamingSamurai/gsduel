<?php
include_once(dirname(dirname(dirname(__FILE))) . '/boot.php');
$title = 'DuelSystemGO! by GamingSamurai';
$heading = 'DuelSystemGO! by GamingSamurai';


start_page($title, $heading);
echo '<h2>Welcome to the Gaming Samurai DuelSystemGo!</h2>';
if(($_POST['login'] === true) && ($_POST['success'] === true)) {
    ?>
    <a href="">Continue</a>
    <?php
} else {
    if($_POST['success'] === false) {
        echo '<ul>The following errors occured during your attempt to login:';
        foreach($_POST['error'] as $k => $v) {
            echo '<li>'.$v.'</li>';
        }
        echo '</ul>';
    }
?>
    <h3>Please login or <form action="http://gsduel.gamingsamurai.com/" method="POST"><input type="hidden" name="register" value="true"><input type="submit" value="Register"></form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="login" value="true">
        <label>Username: </label><input type="text" id="uname" name="user">
        <label>Password: </label><input type="text" id="pword" name="pass">
        <input type="submit">
    </form>
<?php
}
end_page();
