<?php
include_once(dirname(dirname(dirname(__FILE))) . '/boot.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/lib/php/qbuilder.php');

$title = 'DuelSystemGO! by GamingSamurai';

$heading = 'Choose your Duel!';
start_page($title, $heading);


$wsql = get_select_stm('name','weapons',NULL);
$weapons = get_db_results($wsql);
$rsql = get_select_stm('name','race',NULL);
$races = get_db_results($rsql);
$csql = get_select_stm('name','class',NULL);
$classes = get_db_results($csql);
$asql = get_select_stm('name','armor',NULL);
$armors = get_db_results($asql);
//echo '<br>weaps: '.print_r($weapons).'<br>';
/*
$esql = 'SELECT type FROM enemy';
$enemies = get_stuff_from_db($esql);

$wsql = get_prep_options('type'. 'weapons');
$rsql = get_prep_options('type'. 'races');
$weapons = get_db_results($wsql);
*/
?>
<div id="main" class="full">
    <form action="pages/battle.php" method="POST">
    <div id="player" class="prep-options">
    <h3>Player:</h3>
        <label>Weapon: </label>
        <select name="playerweapon" id="weaponChoice">
        <?php
        foreach($weapons as $warray => $weapon) {
            foreach($weapon as $kn => $val) {
                 echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
        ?>
        </select>
        <label>Armor: </label>
        <select name="playerarmor" id="armorChoice">
        <?php
        foreach($armors as $aarray => $armor) {
            foreach($armor as $kn => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
       ?>
        </select>
        <label>Race: </label>
        <select name="playerrace" id="raceChoice">
        <?php
        foreach($races as $rarray => $race) {
            foreach($race as $kn => $val) {
                if(!($val == 'Dragon')) {
                    echo '<option value="'.$val.'">'.$val.'</option>';
                }
            }
        }
        ?>
        </select>
        <label>Class: </label>
        <select name="playerclass" id="classChoice">
        <?php
        foreach($classes as $carray => $class) {
            foreach($class as $kn => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
        ?>
        </select>
    </div>
    <div id="enemy" class="prep-options">
    <h3>Enemy</h3>
        <label>Weapon: </label>
        <select name="enemyweapon" id="weaponChoice">
        <?php
        foreach($weapons as $warray => $weapon) {
            foreach($weapon as $kn => $val) {
                if($kn == 'name') { echo '<option value="'.$val.'">'.$val.'</option>'; }
            }
        }
        ?>
        </select>
        <label>Armor: </label>
        <select name="enemyarmor" id="armorChoice">
        <?php
        foreach($armors as $aarray => $armor) {
            foreach($armor as $kn => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
        ?>
        </select>
        <label>Race: </label>
        <select name="enemyrace" id="raceChoice">
        <?php
        foreach($races as $rarray => $race) {
            foreach($race as $kn => $val) {
                if($kn == 'name') {
                    echo '<option value="'.$val.'">'.$val.'</option>';
                }
            }
        }
        ?>
        </select>
        <label>Class: </label>
        <select name="enemyclass" id="classChoice">
        <?php
        foreach($classes as $carray => $class) {
            foreach($class as $kn => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
        ?>
        </select>
    </div>
    <input type="submit" value="Submit">
    </form>
</div>    

<?php
end_page();
