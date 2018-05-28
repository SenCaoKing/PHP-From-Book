<?php

    /* 日期和时间 */

    // #1
    $raw = '22. 11. 1968';

    $start = DateTime::createFromFormat('d. m. Y', $raw);
    //var_dump($start); // object(DateTime)#1 (3) { ["date"]=> string(26) "1968-11-22 08:08:11.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" }
    //echo 'Start date: ' . $start->format('Y-m-d') . "\n"; // Start date: 1968-11-22

    // #2
    $end = clone $start;
    $end->add(new DateInterval('P1M6D'));
    // var_dump($end); // object(DateTime)#2 (3) { ["date"]=> string(26) "1968-12-28 08:16:23.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" }
    $diff = $end->diff($start);
    // var_dump($diff); // object(DateInterval)#3 (15) { ["y"]=> int(0) ["m"]=> int(1) ["d"]=> int(6) ["h"]=> int(0) ["i"]=> int(0) ["s"]=> int(0) ["weekday"]=> int(0) ["weekday_behavior"]=> int(0) ["first_last_day_of"]=> int(0) ["invert"]=> int(1) ["days"]=> int(36) ["special_type"]=> int(0) ["special_amount"]=> int(0) ["have_weekday_relative"]=> int(0) ["have_special_relative"]=> int(0) }
    // echo 'Difference: ' . $diff->format('%m month, %d days (total: %a days)') . "\n"; // Difference: 1 month, 6 days (total: 36 days)

    // #3
    if($start < $end){
        //echo "Start is before end!\n"; // Start is before end!
    }

    // #4
    $periodInterval = DateInterval::createFromDateString('first thursday');
    $periodInterator = new DatePeriod($start, $periodInterval, $end, DatePeriod::EXCLUDE_START_DATE);
    foreach ($periodInterator as $date) {
        echo $date->format('Y-m-d') . ' '; // 1968-11-28 1968-12-05 1968-12-12 1968-12-19 1968-12-26
    }

?>