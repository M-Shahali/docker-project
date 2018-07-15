<?
require_once('main.php');
$studentNumber = $_POST['studentNumber'];
$session = $_COOKIE["session"];
$foodName = $_POST['meal'];
$day = $_POST['day'];

if(validDay($day)) {
    if (true) {
        $db = Db::getInstance();
        $db->query("DELETE FROM studnet_food WHERE studentId='$studentNumber' AND foodName='$foodName' AND dayOfWeek='$day' ");
        $out = array();
//$out['aaa'] = "Keyword is: " . $_POST['meal'];
        $out['status'] = _removed_successfully;
        echo json_encode($out);
    } else {
        $out = array();
//    $out['aaa'] = "Keyword is: " . $_POST['meal'];
        $out['status'] = _reserved_unsuccessfully;
        echo json_encode($out);
    }
}else{
    $out['status'] = _out_of_time;
    echo json_encode($out);
}