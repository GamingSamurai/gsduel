<?php
include_once(dirname(dirname(dirname(__FILE))) . '/boot.php');

$title = 'DuelSystemGO! by GamingSamurai';
$heading = 'DuelSystemGO! by GamingSamurai';

$success = array();

start_page($title, $heading);

    echo '<br>POST : '.print_r($_POST),'<br>';
echo '<h2>Welcome to the Gaming Samurai DuelSystemGo!</h2>';

if($_POST['login'] == true) {
    $lu = $_POST['user'];
    $lp = $_POST['pass'];
    $lp = hash('sha256',$lp);
    $success = login($lu, $lp);
    if($success['loggedin'] === true) {
        echo '<br>success : '.$success.'<br>';
        ?>
        <a href="">Continue</a>
        <?php
    } elseif($success['loggedin'] === false) {
        echo '<br>FAIL: '.print_r($success).'<br>';
    } else {
        echo '<br>wtf, over?!<br>';
    }
} else {
    if((isset($success['loggedin'])) && ($success['loggedin'] == false)) {
        echo '<ul>The following errors occured during your attempt to login:';
        foreach($_POST as $k => $v) {
            if($k == 'error') { echo $v; }
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
