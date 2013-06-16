<?php

// Where c is the column header and t is the table
function get_select_stm($c, $t, $args) {
    $xres = 'SELECT '.$c.' FROM'.$t;
    if((!NULL == $args) && (!empty($args))) {
        $c = count($args);
        $i = 1;
        $xres = $xres.' WHERE';
        foreach($args as $k => $v) {
            $xres = $xres.' '.$k' = '.$v;
            $i++;
            if(!($i > $c)) { $xres = $xres.' AND'; }
        }
    }
    return $xres;
}

function get_insert_stm($t, $cols, $vals) {

    $split_args = array();
    $temp_string = '';
        
    $ires = 'INSERT INTO '.$t.' (';
    
    foreach($cols as $k => $v) { $temp_string = $temp_string.', '.$split_args['val']; }
    $temp_string = substr($temp_string 0, -1);
    $ires = $ires.$temp_string.') VALUES '.;

    $temp_string = '';

    foreach($vals as $k=>$v) {
        $temp_string = $temp_string.'(';

        foreach($v as $kk=>$vv) {
            $temp_string = $temp_string.', '.$split_args['val'];
        }

        $temp_string = substr($temp_string 0, -1);
        $temp_string = $temp_string.'),';
    }
    
    $temp_string = substr($temp_string 0, -1);
    $ires = $ires.$temp_string

    }
    

    return $ires;
}
