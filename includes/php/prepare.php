<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/lib/php/qbuilder.php');
$title = 'DuelSystemGO! by GamingSamurai';

$heading = 'Choose your Duel!';
start_page($title, $heading);

/*
$wsql = 'SELECT type FROM weapons';
$weapons = get_stuff_from_db($wsql);

$esql = 'SELECT type FROM enemy';
$enemies = get_stuff_from_db($esql);

$wsql = get_prep_options('type'. 'weapons');
$rsql = get_prep_options('type'. 'races');
$csql = get_prep_options('type'. 'classes');
$asql = get_prep_options('type','armor');
$weapons = get_db_results($wsql);
$races = get_db_results($rsql);
$classes = get_db_results($ssql);
$armors = get_db_results($asql);
*/
?>
<div id="main" class="full">
    <form action="pages/battle.php" method="POST">
    <div id="player" class="prep-options">
    <h3>Player:</h3>
        <label>Weapon: </label>
        <select name="playerweapon" id="weaponChoice">
        <?php
/*        foreach($weapons as $warray => $weapon) {
            foreach($weapon as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
        <label>Armor: </label>
        <select name="playerarmor" id="armorChoice">
        <?php
/*        foreach($armors as $aarray => $armor) {
            foreach($armor as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
        <label>Race: </label>
        <select name="playerrace" id="raceChoice">
        <?php
/*        foreach($races as $rarray => $race) {
            foreach($race as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
        <label>Class: </label>
        <select name="playerclass" id="classChoice">
        <?php
/*        foreach($classes as $carray => $class) {
            foreach($class as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
    </div>
    <div id="enemy" class="prep-options">
    <h3>Enemy</h3>
        <label>Weapon: </label>
        <select name="enemyweapon" id="weaponChoice">
        <?php
/*        foreach($weapons as $warray => $weapon) {
            foreach($weapon as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
        <label>Armor: </label>
        <select name="enemyarmor" id="armorChoice">
        <?php
/*        foreach($armors as $aarray => $armor) {
            foreach($armor as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
        <label>Race: </label>
        <select name="enemyrace" id="raceChoice">
        <?php
/*        foreach($races as $rarray => $race) {
            foreach($race as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
        <label>Class: </label>
        <select name="enemyclass" id="classChoice">
        <?php
/*        foreach($classes as $carray => $class) {
            foreach($class as $name => $val) {
                echo '<option value="'.$val.'">'.$val.'</option>';
            }
        }
*/        ?>
        </select>
    </div>
    <input type="submit" value="Submit">
    </form>
</div>    

<?php
end_page();
