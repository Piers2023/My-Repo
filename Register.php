<?php
session_start();
require_once 'connect.php';
require_once 'validation.php';
if (isset($_POST["std_id"])) {

    $std_id = $_POST["std_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $std_name = $fname . " " . $lname;
    $std_fac = $_POST["std_fac"];
    $std_bch = $_POST["std_bch"];
    $std_tel = $_POST["std_tel"];
    $std_pass = $_POST["std_pass"];
    $con_password = $_POST["con_password"];
    
    if($std_pass == $con_password){
        $sql1 = "SELECT std_id FROM member_tbl WHERE std_id =  ?";
        $db->executeInsert($sql1);
            $db->executeQuery([(int)$std_id]);
            if($db->rowCount() > 0){
                $Validate->setValidate("รหัสนักศึกษานี้มีผู้ใช้งานแล้ว");
            }else{
                $sql = "INSERT INTO member_tbl (std_id, std_name, std_fac, std_bch, std_tel, std_pass)
            VALUES (?, ?, ?, ?, ?, ?)";
            $db->executeInsert($sql);
            $db->executeQuery([(int)$std_id, $std_name, $std_fac, $std_bch, $std_tel, md5($std_pass)]);
            $Validate->setValidate("สมัครสำเร็จ");
            }
        
    }else{
        $Validate->setValidate("รหัสผ่านไม่ตรงกัน");
    }
}
