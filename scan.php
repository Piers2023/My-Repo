<?php
require_once "connect.php";
session_start();
if(isset($_SESSION["UID"])){
    if(isset($_GET["std_id"])&& isset($_GET["table"])){
    $std_id = $_GET["std_id"];
    $table = $_GET["table"];
    $sql = "SELECT std_id FROM $table WHERE std_id = ?";
    $db->executeInsert($sql);
    $db->executeQuery([$std_id]);
    if($db->rowCount() > 0){
        echo "Successfully";
    }else{
        echo "Failed";
    }
}
}else{
    echo "You are not Admin!";
}

    
    ?>