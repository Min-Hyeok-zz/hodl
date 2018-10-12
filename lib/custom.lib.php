<?php
//커스텀 함수 입니다


//레벨별 등급 이름 설정

function setLevelName ($point) {
    switch ($point) {
        case $point <= 1000: $name = "초보"; break;
        case $point <= 2500: $name = "중수"; break;
        case $point <= 7000: $name = "고수"; break;
        case $point <= 15000: $name = "쌉고수"; break;
    }
    return $name;
}

function passingTime ($datetime) { //시간을 방금,몇분전 등으로 표시 합니다.
    $time = time() - strtotime($datetime);

    if($time < 60) {
        $results = "방금전";
    } else if ($time >= 60 and $time < 3600) {
        $results = floor($time/60)."분 전";
    } else if ($time >= 3600 and $time < 86400) {
        $results = floor($time/3600)."시간 전";
    } else if ($time >= 86400 and $time < 2419200) {
        $results = floor($time/86400)."일 전";
    } else if ($time >= 2419200 and $time < 30758400) {
        $results = floor($time/2419200)."달 전";
    } else if ($time >= 30758400) {
        $results = floor($time/30758400)."년 전";
    } else {
        $results = date("y-m-d", strtotime($datetime));
    }
    return $results;
}