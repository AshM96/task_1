<?php
require_once 'config.php';

if(isset($_POST['att'])){
    $delete = "DELETE FROM `list_inner`";
    $query = mysqli_query($connect, $delete);
}

if(isset($_POST['data-att'])){
    $d_att = $_POST['data-att'];
    $delete1 = "DELETE FROM `list_inner` WHERE `text` = '$d_att'";
    $query1 = mysqli_query($connect, $delete1);
}


if(isset($_POST['del_d'])){
    $del_a = $_POST['del_d'];
    $delete2 = "DELETE FROM `list_inner` WHERE `text` = '$del_a'";
    $query2 = mysqli_query($connect, $delete2);
}