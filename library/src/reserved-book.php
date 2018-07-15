<?php
require_once('main.php');
$studentNumber = $_POST['studentNumber'];


$db = Db::getInstance();
$record = $db->query("SELECT bookName,expiredDate FROM student_book WHERE studentId='$studentNumber'");

$out = array();
$out['a'] = $studentNumber;
$out['record'] = $record;

echo json_encode($out);