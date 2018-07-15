<?php
require_once('main.php');
$studentNumber = $_POST['studentNumber'];


$db = Db::getInstance();
$record = $db->query("SELECT courseName FROM student_course WHERE studentId='$studentNumber'");

$out = array();
$out['a'] = $studentNumber;
$out['record'] = $record;

echo json_encode($out);