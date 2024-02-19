<?php

require_once 'connect.php';
require_once "validation.php";

if (isset($_POST["table"])) {
    $std_name = $_SESSION["std_name"];
    $std_id = $_SESSION["std_id"];
    if ($_POST["std_num"] == null) {
        $std_num = 1;
    } else {
        $std_num = $_POST["std_num"];
    }
    $srt_time = $_POST["srt_time"];
    $end_time = $_POST["end_time"];
    $date = $_POST["valuedate"];
    $date1 = $_POST["date1"];
    $month = $_POST["valuemonth"];
    $year = $_POST["valueyear"];
    if ($date != "undefined") {
        $srt_day = $date . "-" . $month . "-" . $year;
    } else {
        $srt_day = $date1 . "-" . $month . "-" . $year;
    }
    $table = $_POST["table"];

    $sql2 = "SELECT * FROM user_table WHERE std_id = ?";
    $db->executeInsert($sql2);
    $db->executeQuery([$std_id]);

    if ($db->rowCount() != 1) {
        $result = $db->fetchAll();
        $sql3 = "SELECT srt_time, end_time FROM $table WHERE srt_day = ?";
        $db->executeInsert($sql3);
        $db->executeQuery([$srt_day]);
        $time_slot = [];
        $result = $db->fetchAll();

        foreach ($result as $row) {
            $time_slot[] = $row["srt_time"] . "-" . $row["end_time"];
        }

        $userrequest = $srt_time . "-" . $end_time;
        list($userrequest_srt, $userrequest_end) = explode("-", $userrequest);

        $user_srt_time = strtotime($userrequest_srt);
        $user_end_time = strtotime($userrequest_end);
        $check = true;
        foreach ($time_slot as $time) {
            list($srt, $end) = explode("-", $time);
            $stime = strtotime($srt);
            $etime = strtotime($end);

            if ($user_srt_time >= $stime && $user_srt_time < $etime) {
                $check = false;
            } else if ($user_end_time > $stime && $user_end_time <= $etime) {
                $check = false;
            } else if ($user_srt_time <= $stime && $user_end_time >= $etime) {
                $check = false;
            }
        }
        if ($check) {
            $Randomnumber = rand(10000000, 99999999);

            $sql = "INSERT INTO $table (std_id, std_num, srt_day, srt_time, end_time, number) VALUES (?,?,?,?,?,?)";
            $db->executeInsert($sql);
            $db->executeQuery([$std_id, $std_num, $srt_day, $srt_time, $end_time, $Randomnumber]);
            $sql = "INSERT INTO history (std_id, std_name, std_num, srt_day, srt_time, end_time, number, room) VALUES (?,?,?,?,?,?,?,?)";
            $db->executeInsert($sql);
            $db->executeQuery([$std_id, $std_name, $std_num, $srt_day, $srt_time, $end_time, $Randomnumber, $table]);
            $sql = "INSERT INTO user_table (std_id, room) VALUES (?,?)";
            $db->executeInsert($sql);
            $db->executeQuery([$std_id, $table]);
            $_SESSION["table"] = $table;
            $Validate->setValidate("จองสำเร็จ");
        } else {
            $Validate->setValidate("เวลาที่จองซ้ำกับเวลาที่จองไปแล้ว");
        }
    } else {
        $_SESSION["validate"] = "รหัสนักศึกษานี้จองไปแล้ว";
        header("location:index.php");
    }
} else {
    echo "not num";
}
