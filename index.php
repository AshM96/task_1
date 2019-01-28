<?php
require_once 'config.php';

if (isset($_POST['name'])) {
    $text = $_POST['name'];
    $insert = "INSERT INTO `list_inner` (`text`) VALUES ('$text')";
    $query = mysqli_query($connect,$insert);

    $select = "SELECT * FROM `list_inner` WHERE `text`='$text'";
    $query1 = mysqli_query($connect,$select);
    $arr = mysqli_fetch_assoc($query1);
    if($arr){
        $obj= [
            'text' => $arr['text']
        ];
    }

    echo json_encode($obj);die;

}

$select1 = "SELECT `*` FROM `list_inner`";
$query2 = mysqli_query($connect,$select1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<style>
    .active, .active a{
        color: red;
    }
</style>
<body>

	<div class="content">
		<a href="#" class="remove_all">Начать новый список</a>
		<div class="input_bar">
			<input name="data" type="text" id="inp_do" placeholder="Что нужно делать?"><a href="#" id="btn_enter">Enter</a>
		</div>
		<div class="result">
			<ol id="list_todo">
                <?php while ($r = mysqli_fetch_assoc($query2)){ ?>
                    <li class="added_list"><a href="#" class="del_this" data-set="<?php echo $r['text'] ?>">Delete</a><input type="checkbox" data-a="<?php echo $r['text'] ?>"><?php echo $r['text'] ?></li>
                <?php }?>
            </ol>
		</div>
		<a href="#" id="delet_check">Удалить выполненные</a>
	</div>
	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>