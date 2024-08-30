<?php

// mktime(0,0,0,date("m")+2,date("d"),date("y"))  


date_default_timezone_set('asia/calcutta');


$futer_date=mktime(0,0,0,date("m")+1,date("d")+1,date("y")+1); // difine future date but add 0,0,0
$futer_time=mktime(date("h")+1,date("i")+1,date("s")+1);  // remove 0,0,0 for time

echo "<br>" . date('d/m/y',$futer_date);
echo "<br>" . date('h:i:s a',$futer_time);





?>