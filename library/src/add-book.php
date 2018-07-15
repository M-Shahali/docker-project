<?
require_once('main.php');

$studentNumber = $_POST['studentNumber'];
$session = $_COOKIE["session"];
$bookName = $_POST['book'];
$available = $_POST['available'];

$Date = date('Y-m-d', time());
$Date = date('Y-m-d', strtotime($Date. ' + 14 days'));

$out = array();
$db = Db::getInstance();

if($available == "available") {
    $record = $db->first("SELECT studentId FROM student_book WHERE studentId='$studentNumber' AND bookName='$bookName'");
    if (!$record) {
        if (is_authenticated($studentNumber, $session)) {
            //$db = Db::getInstance();
            $db->insert("INSERT INTO student_book
(studentId,  bookName, expiredDate) VALUES
(:studentId, :bookName, :expiredDate)", array(
                'studentId' => $studentNumber,
                'bookName' => $bookName,
                'expiredDate' => $Date,

            ));
            $db = Db::getInstance();
           $modify = $db->modify("UPDATE Books
          SET Status = :status WHERE Title='$bookName'",array(
              'status' => 0,
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
    $out['status'] = _reserved_book;
}

echo json_encode($out);

