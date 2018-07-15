<?
require_once('main.php');
$studentNumber = $_POST['studentNumber'];
$session = $_COOKIE["session"];
$courseNumber = $_POST['CourseNumber'];
$courseName = $_POST['CourseName'];
$capacity = $_POST['Capacity'];
if (true){

    $db = Db::getInstance();
    $db->query("DELETE FROM student_course WHERE studentId='$studentNumber' AND courseName='$courseName' AND courseNumber='$courseNumber' ");
    if($capacity != 0) {
        $capacity = $capacity + 1;
    }
    $db = Db::getInstance();
    $modify = $db->modify("UPDATE Courses
            SET Capacity = :Capacity WHERE Number='$courseNumber'",array(
        'Capacity' => $capacity,
    ));

    $out = array();
//$out['aaa'] = "Keyword is: " . $_POST['meal'];
    $out['status'] = _removed_successfully;
    echo json_encode($out);
}else{
    $out = array();
//    $out['aaa'] = "Keyword is: " . $_POST['meal'];
    $out['status'] = _reserved_unsuccessfully;
    echo json_encode($out);
}
