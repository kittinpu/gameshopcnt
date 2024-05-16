<?php
$dbcon = mysqli_connect('localhost', 'game_6314921002', '1101500551152', 'game_cnt');
if (mysqli_connect_errno()) {
    echo "ไม่สามารถติดต่อฐานข้อมูล MySQL ได้" . mysqli_connect_error();
}
mysqli_set_charset($dbcon, 'utf8');
