<?php 
session_start();
require_once "connect.php";
require_once "validation.php";

if(isset($_SESSION["UID"])){
    if($_SESSION["UID"] == "admin"){
        if (isset($_GET["id"]) && isset($_GET["table"])){
            $id = $_GET["id"];
            $table = $_GET["table"];
            $sql = "DELETE FROM ls1 WHERE std_id=?";
            $db->executeInsert($sql);
            $db->executeQuery([$id]);
            $sql = "DELETE FROM user_table WHERE std_id=?";
            $db->executeInsert($sql);
            $db->executeQuery([$id]);
            header("location:member.php?table=$table");
        }
        if (isset($_POST["std_id"])){
            $std_id = $_POST["std_id"];
            $std_name = $_POST["std_name"];
            $srt_day = $_POST["srt_day"];
            $srt_time = $_POST["srt_time"];
            $end_time = $_POST["end_time"];
            $table = $_POST["table"];
        
            $sql = "UPDATE $table SET std_id=?, std_name=?, srt_day=?, srt_time=?, end_time=? WHERE std_id=?";
            $db->executeInsert($sql);
            $db->executeQuery([$std_id, $std_name, $srt_day, $srt_time, $end_time ,$std_id]);
            header("location:member.php?table=$table");
    }

    if(isset($_GET["number"])){
        $number = $_GET["number"];
        $Validate->getSearch($number);
    }
}
    if(isset($_GET["delete"])){
        $std_id = $_GET["delete"];
        $table = $_GET["table"];
        $sql = "DELETE FROM user_table WHERE std_id=?";
        $db->executeInsert($sql);
        $db->executeQuery([$std_id]);
        $sql = "DELETE FROM $table WHERE std_id=?";
        $db->executeInsert($sql);
        $db->executeQuery([$std_id]);

        require_once "validation.php";
        $Validate->setValidate("ยกเลิกการจองสำเร็จ");
}

if($_SESSION["UID"] == "admin"){
    if(isset($_GET["accept"])){
        $accept = $_GET["accept"];
        $sql = "DELETE FROM user_table WHERE std_id=?";
        $db->executeInsert($sql);
        $db->executeQuery([$accept]);
        header("location:member.php");
}
}

    

}



?>