<?php
include_once(dirname(dirname(dirname(__FILE))) . '/boot.php');

$title = 'DuelSystemGO! by GamingSamurai';
$heading = 'DuelSystemGO! by GamingSamurai';

$success = array();

start_page($title, $heading);

echo '<h2>Welcome to the Gaming Samurai DuelSystemGo!</h2>';

if($_POST['login'] == true) {
    $lu = $_POST['user'];
    $lp = $_POST['pass'];
    $success = login($lu, $lp);
    if($success['loggedin'] == true) {
        $_SESSION['username'] = $lu;
        ?>
        <a href="http://gsduel.gamingsamurai.com/">Continue</a> <!-- pages/prepare.php -->
        <?php
    } elseif($success['loggedin'] == false) {
        echo '<ul class="error">The following errors occured during your attempt to login:';
        echo $success['error'];
        echo '</ul>';
    } else {
        echo '<br>wtf, over?!<br>';
    }
} else {
?>
    <h3>Please login or <form action="http://gsduel.gamingsamurai.com/" method="POST">
            <input type="hidden" name="register" value="true">
            <input type="submit" value="Register">
        </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="login" value="true">
        <label>Username: </label><input type="text" id="uname" name="user">
        <label>Password: </label><input type="password" id="pword" name="pass">
        <input type="submit">
    </form>
<?php
}
end_page();
