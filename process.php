<?php
session_start();
require_once 'connect.php';

if (isset($_POST["std_id"])) {

    $std_id = $_POST["std_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $std_name = $fname . " " . $lname;
    $std_fac = $_POST["std_fac"];
    $std_bch = $_POST["std_bch"];
    $std_tel = $_POST["std_tel"];
    $std_num = $_POST["std_num"];
    $srt_time = $_POST["srt_time"];
    $end_time = $_POST["end_time"];
    $date = $_POST["valuedate"];
    $month = $_POST["valuemonth"];
    $year = $_POST["valueyear"];
    $srt_day = $date."-".$month."-".$year; 
    $_SESSION["std_id"] = $std_id;
    $_SESSION["std_name"] = $std_name;
    $_SESSION["date"] = $srt_day;
    $_SESSION["time"] = $srt_time."-".$end_time;
    $table = $_POST["table"];
    $_SESSION["table"] = $table;
    $sql2 = "SELECT std_id FROM ls1 WHERE std_id = ? UNION SELECT std_id FROM ls2 WHERE std_id = ? UNION SELECT std_id FROM ls3 WHERE std_id = ? UNION SELECT std_id FROM freezone WHERE std_id = ?";
    $db->executeInsert($sql2);
    $db->executeQuery([$std_id, $std_id, $std_id, $std_id]);
    if($db->rowCount() != 1){
        $sql = "INSERT INTO $table (std_id, std_name, std_fac, std_bch, std_tel, srt_day, std_num, srt_time, end_time)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            

            $db->executeInsert($sql);
            $db->executeQuery([(int)$std_id, $std_name, $std_fac, $std_bch, $std_tel, $srt_day, $std_num, $srt_time, $end_time]);
            $_SESSION["validate"] = "จองสำเร็จ";
            header("location:index.php");
    }else{
        $_SESSION["validate"] = "รหัสนักศึกษานี้จองไปแล้ว";
        header("location:index.php");
    }

    

}
?>