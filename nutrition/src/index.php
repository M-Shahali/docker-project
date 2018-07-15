<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="style.css">
    <script src="jquery/jquery.js"></script>

</head>
<title>nutrition</title>
<body>
<br><br><br>
<?
require_once('main.php');
$studentNumber = $_POST['userName'];
$session = $_COOKIE["session"];

if (!is_authenticated($studentNumber,$session)){
    $message = _studentNumber_not_registered;
    require_once("msg-fail.php");
    exit;
}
?>
<form action="http://127.0.0.1/menu.php" method="post">
    <input type="hidden" name="userName" value="<?=$studentNumber?>"><br>
    <button type="submit" class="btn-blue btn-service"><?=_btn_service?></button>
</form>
<div class="ltr" >
<a href="http://127.0.0.1"><img class="btn-exit" src="image/exit.png"></a>
</div>
<div class="table">
    <table>
        <tr>
            <th>DayOfWeek</th>
            <th>Name</th>
            <th>Meal</th>
            <th>Price</th>
        </tr>
        <?
        $db = Db::getInstance();
        $record = $db->query("SELECT DayOfWeek,Name,Meal,Price FROM Foods");
        foreach ($record as $item){
            echo "<tr class='table-row'>";
            foreach ($item as $key => $value){
                echo "<td>";
                echo $value;
                echo "</td>";
            }
            echo "<td><span class='btn add'>" ;
            echo "add";
            echo "</span</td>";
            echo "</tr>";
        }
        ?>

    </table>
</div>
<br>
<br>
<div class="center">
    <div id="note"></div>
    <br>

    <br><br><br><br><br><br><br>


    <span id="reserved"><?=_reserved_food?></span>

    <br><br><br><br><br>

    <span id="foods"></span>
    <div id="image">
        <img src="image/food.jpg">
    </div>
</div>
<script>
    $('#reserved').click(function () {
        $("#foods").empty();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'reserved-food.php',
            data: {
                studentNumber: "<?echo $studentNumber?>"
            },
            success: function(msg){

                    $.each(msg.record, function( index, value ) {
                        $.each(value, function( key, val ) {
                            $("#foods").append("<b>"+ " " + val + " " + "</b>");
                        });
                        $("#foods").append("<br><br>");
                    });
            }
        });
    });

    $('.btn').click(function(){
        // to change the text
        if($(this).text().trim() === 'add') {
            $(this).text('remove')
        } else {
            $(this).text('add')
        }

        // to change the class name
        if($(this).hasClass('add')) {
            $(this).addClass('remove').removeClass('add');
            var $row = $(this).closest("tr"),
                $name = $row.find("td:nth-child(2)"),
                $id = $row.find("td:nth-child(1)");

            //$row.css({ 'background-color' : 'rgba(76, 175, 80, 0.3)'});
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'add-food.php',
                data: {
                    meal: $name.text(),
                    day : $id.text(),
                    studentNumber: "<?echo $studentNumber?>"
                },
                success: function(msg){
                    $('#note').html(msg.status);
                    $row.css({ 'background-color' : 'rgba(76, 175, 80, 0.4)'});
                }
            });
        } else {
            $(this).addClass('add').removeClass('remove');
            var $row = $(this).closest("tr"),
                $name = $row.find("td:nth-child(2)"),
                $id = $row.find("td:nth-child(1)");
            //$row.css({ 'background-color' : 'rgba(255, 0, 0, 0.3'});
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'remove-food.php',
                data: {
                    meal: $name.text(),
                    day : $id.text(),
                    studentNumber: "<?= $studentNumber?>"
                },
                success: function(msg){
                    $('#note').html(msg.status);
                    $row.css({ 'background-color' : 'rgba(255, 0, 0, 0.2'});
                }
            });
        }
    });

</script>
</body>
</html>
