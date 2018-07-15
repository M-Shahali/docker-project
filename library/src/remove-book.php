<?
require_once('main.php');
$studentNumber = $_POST['studentNumber'];
$session = $_COOKIE["session"];
$bookName = $_POST['book'];
if (true){

    $db = Db::getInstance();
    $record = $db->first("SELECT studentId FROM student_book WHERE studentId='$studentNumber' AND bookName='$bookName'");
    if($record) {
        $db->query("DELETE FROM student_book WHERE studentId='$studentNumber' AND bookName='$bookName'");

        $modify = $db->modify("UPDATE Books SET Status = :status WHERE Title='$bookName'", array(
            'status' => 1,
        ));
        $out = array();
//$out['aaa'] = "Keyword is: " . $_POST['meal'];
        $out['status'] = _removed_successfully;
    }else {
        $out['status'] = _cannot_remove;
    }
    echo json_encode($out);
}else{
    $out = array();
//    $out['aaa'] = "Keyword is: " . $_POST['meal'];
    $out['status'] = _reserved_unsuccessfully;
    echo json_encode($out);
}
