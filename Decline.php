<?php
require_once "connect.php";
if (isset($_GET["std_id"])) {
    $std_id = $_GET["std_id"];
    $table = $_GET["table"];
    $code = $_GET["code"];
    $sql = "DELETE FROM user_table WHERE std_id=?";
    $db->executeInsert($sql);
    $db->executeQuery([$std_id]);
    $sql = "DELETE FROM $table WHERE std_id=?";
    $db->executeInsert($sql);
    $db->executeQuery([$std_id]);
    $sql = "DELETE FROM history WHERE number=?";
    $db->executeInsert($sql);
    $db->executeQuery([$code]);
    header("location:member.php");
}
?>