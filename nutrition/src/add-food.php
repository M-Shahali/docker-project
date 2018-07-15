<?
require_once('main.php');
$studentNumber = $_POST['studentNumber'];
$session = $_COOKIE["session"];
$foodName = $_POST['meal'];
$day = $_POST['day'];
$out = array();
$db = Db::getInstance();

if(validDay($day)) {
    $record = $db->first("SELECT studentId FROM studnet_food WHERE studentId='$studentNumber' AND foodName='$foodName' AND dayOfWeek='$day'");
    if (!$record) {
        if (is_authenticated($studentNumber, $session)) {
            //$db = Db::getInstance();
            $db->insert("INSERT INTO studnet_food
(studentId,  foodName,  dayOfWeek) VALUES
(:studentId, :foodName, :dayOfWeek)", array(
                'studentId' => $studentNumber,
                'foodName' => $foodName,
                'dayOfWeek' => $day,
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
    $out['status'] = _out_of_time;
}
echo json_encode($out);

