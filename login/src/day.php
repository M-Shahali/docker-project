<?php
require_once ('main.php');
/*if(validDay("Friday")){
    echo "hello";
}else{
    echo "bye";
}*/

$Date = date('Y-m-d', time());
echo $Date;
echo "<br>";
$Date = date('Y-m-d', strtotime($Date. ' + 17 days'));
echo $Date;
/*echo date('Y-m-d', strtotime($Date. ' + 2 days'));
echo "<br>";
echo $date = date('m/d/Y', time());
echo "<br>";
echo date('Y-m-d', strtotime($Date. ' + 365 days'));*/


/*function validDay($day)
{
    $date = date('m/d/Y h:i:s a', time());
    function getWeekday($date)
    {
        return date('l', strtotime($date));
    }

    $days = [
        0 => 'Sunday',
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
    ];
    $numberOfCurrentDay = array_search(getWeekday($date), $days);
    for ($i = 0; $i < 3; $i++) {
        if ($day == $days[($numberOfCurrentDay + $i) % 7]) {
            return true;
        }
    }
}*/