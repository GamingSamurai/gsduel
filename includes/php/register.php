<?php

include_once(dirname(dirname(dirname(__FILE))) . '/boot.php');
//include_once(dirname(dirname(dirname(__FILE__))) . '/lib/php/functions.php');
$title = 'DuelSystemGO! by GamingSamurai';
$heading = 'DuelSystemGO! Registration';

//send_user_to('/',$successres,true);

start_page($title, $heading);

if(isset($_POST['user_submitted'])) {
    
    $u = $_POST['ruser'];
    $p1 = $_POST['rpass'];
    $p2 = $_POST['rpass2'];
    $e = $_POST['remail'];
    
    $successres = register($u, $p1, $p2, $e);
    if($successres['success'] === true) {
        $_SESSION['username'] = $u;
        echo '<h3>Thanks for registering,</h3> please <a href="">continue</a>.';
    } else {
        echo'<ul class="error">';
        echo 'There were errors with your registration:';
        foreach($successres as $k => $v) {
            if($k == 'error') { echo $v; }
        }
        echo '</ul>';
        ?>
        <form method="POST">
            <label>Username: </label><input type="text" id="uname" name="ruser">
            <label>Password: </label><input type="password" id="pword" name="rpass">
            <label>Confirm Password: </label><input type="password" id="pword2" name="rpass2">
            <label>Email: </label><input type="text" id="email" name="remail">
            <input type="hidden" name="user_submitted" value="true">
            <input type="hidden" name="register" value="true">
            <input type="submit">
        </form>
        
        <?php
    }
} else {
?>
        <h3>Thank you for deciding to Register:</h3>
        <form method="POST">
            <label>Username: </label><input type="text" id="uname" name="ruser">
            <label>Password: </label><input type="text" id="pword" name="rpass">
            <label>Confirm Password: </label><input type="text" id="pword2" name="rpass2">
            <label>Email: </label><input type="text" id="email" name="remail">
            <input type="hidden" name="user_submitted" value="true">
            <input type="hidden" name="register" value="true">
            <input type="submit">
        </form>

<?php
}

end_page();
