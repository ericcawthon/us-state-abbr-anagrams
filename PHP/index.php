<?php
// MySQL Database connection information
require('includes/config.php');

include('dbase.class.php');
$DBase = new DBase();
include('states.class.php');
$stobj = new States($DBase);
include('util.class.php');

$i = 0;
$strings_list = array();
foreach ($stobj->state_abbrs as $st)
{
    $i++;
    $current_states = array();
    foreach ($stobj->getStateConnections($st) as $st2)
    {
        $current_states[$st] = $st;
        $i++;
        if (in_array($st2, $current_states)) { continue; }
        $current_states[$st2] = $st2;
        foreach ($stobj->getStateConnections($st2) as $st3)
        {
            $i++;
            if (in_array($st3, $current_states)) { continue; }
            $current_states[$st3] = $st3;
            foreach ($stobj->getStateConnections($st3) as $st4)
            {
                $i++;
                if (in_array($st4, $current_states)) { continue; }
                $current_states[$st4] = $st4;
                $strings_list[] = implode("", $current_states);
                array_pop($current_states);
            }
            array_pop($current_states);
        }
        array_pop($current_states);
    }
    array_pop($current_states);
}
echo $i;
util::debug($strings_list);

$stobj->saveStringsList($strings_list);
?>