<?php
session_start();
require_once 'connect.php';
require_once 'validation.php';

// Login member
if (isset($_POST["std_id"]) && isset($_POST["std_pass"])) {
    $std_id = $_POST["std_id"];
    $std_pass = $_POST["std_pass"];

    $sql = "SELECT * FROM member_tbl WHERE std_id =? AND std_pass =?";
    $db->executeInsert($sql);
    $db->executeQuery([(int) $std_id, md5($std_pass)]);
    $result = $db->fetchAll();
    if ($db->rowCount() == 1) {
        $_SESSION["std_id"] = $result[0]["std_id"];
        $_SESSION["std_name"] = $result[0]["std_name"];
        $_SESSION["UID"] = "member";

        $Validate->setValidate("เข้าสู่ระบบสำเร็จ");

    } else {
        $Validate->setValidate("รหัสนักศึกษาหรือรหัสผ่านไม่ถูกต้อง");
    }
}

// Logout
if (isset($_GET["logout"])) {
    unset($_SESSION["UID"]);
    unset($_SESSION["std_id"]);
    unset($_SESSION["std_name"]);
    unset($_SESSION["table"]);
    $Validate->setValidate("ออกจากระบบสำเร็จ");
}
