<?
require_once('main.php');
$studentNumber = $_POST['studentNumber'];
$session = $_COOKIE["session"];
$courseNumber = $_POST['CourseNumber'];
$courseName = $_POST['CourseName'];
$capacity = $_POST['Capacity'];
$capacity = $capacity -1;
$out = array();
$db = Db::getInstance();

if($capacity >= 0) {
    $record = $db->first("SELECT studentId FROM student_course WHERE studentId='$studentNumber' AND courseNumber='$courseNumber'");
    if (!$record) {
        if (is_authenticated($studentNumber, $session)) {
            //$db = Db::getInstance();
            $db->insert("INSERT INTO student_course
(studentId,  courseName,  courseNumber) VALUES
(:studentId, :courseName, :courseNumber)", array(
                'studentId' => $studentNumber,
                'courseName' => $courseName,
                'courseNumber' => $courseNumber,
            ));
            $db = Db::getInstance();
            $modify = $db->modify("UPDATE Courses
            SET Capacity = :Capacity WHERE Number='$courseNumber'",array(
                'Capacity' => $capacity,
            ));
//$out['aaa'] = "Keyword is: " . $_POST['meal'];
            $out['status'] = _reserved_successfully;
        } else {

//    $out['aaa'] = "Keyword is: " . $_POST['meal'];
            $out['status'] = _reserved_unsuccessfully;
        }
    } else {
        $out['status'] = _reserved_before;
    }
}else{
    $out['status'] = _full_class;
}
echo json_encode($out);

