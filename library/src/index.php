<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/base.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="jquery/jquery.js"></script>

</head>
<title>library</title>
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
            <th>BookName</th>
            <th>Author</th>
            <th>status</th>
        </tr>
        <?
        $db = Db::getInstance();
        $record = $db->query("SELECT Title,author,status FROM Books");
        foreach ($record as $item){
            echo "<tr class='table-row'>";
            foreach ($item as $key => $value){
                if($key == "status"){
                    if($value==1){
                        echo "<td>";
                        echo "available";
                        echo "</td>";
                    }else{
                        echo "<td>";
                        echo "unavailable";
                        echo "</td>";
                    }
                }else {
                    echo "<td>";
                    echo $value;
                    echo "</td>";
                }
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
    
</div>
<div id="image">
    <img src="image/books.jpg">
</div>
<script>
    $('#reserved').click(function () {
        $("#foods").empty();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'reserved-book.php',
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
                $name = $row.find("td:nth-child(1)"),
                $id = $row.find("td:nth-child(3)");
            //$row.css({ 'background-color' : 'rgba(76, 175, 80, 0.3)'});
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'add-book.php',
                data: {
                    book: $name.text(),
                    available: $id.text(),
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
                $name = $row.find("td:nth-child(1)"),
                $id = $row.find("td:nth-child(1)");

            //$row.css({ 'background-color' : 'rgba(255, 0, 0, 0.3'});
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'remove-book.php',
                data: {
                    book: $name.text(),
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
