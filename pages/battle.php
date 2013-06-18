<?php

    require_once(dirname(dirname(__FILE__)) . '/boot.php');

    $pwname = $_POST['playerweapon'];

    $player_weapon = new player_weapon();
    $player_weapon->getPlayerWeapon($pwname);

    $title = 'Time to Fight! - DuelSystemGO! by GamingSamurai';
    $heading = 'Duel Started!';
    start_page($title, $heading);

    echo '<br>pwep: ';
    foreach($player_weapon as $k => $v)
    print '<br>'.$k.' : '.$player_weapon->$k;

