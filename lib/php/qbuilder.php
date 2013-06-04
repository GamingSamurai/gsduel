<?php

// Where c is the column header and tbl is the table
function get_prep_options($c, $tbl) {
    $xres = 'SELECT '.$c.' FROM'.$tbl;
    return $xres;
}
