<?php 
session_start();
require_once 'connect.php';

// Login Admin
if (isset($_POST["user"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM admin_tbl WHERE a_user =? AND a_pass =?";
    $db->executeInsert($sql);
    $db->executeQuery([$user,md5($pass)]);
    if ($db->rowCount()==1){
        $_SESSION["UID"]="admin";
        header("location:dashboard.php");
    }else{
        header("location:admin.php");
    }
}

// Logout
if (isset($_POST["logout"])){
    session_destroy();
    header("location:admin.php");
}

// Add user
if (isset($_POST["n_user"])) {
    $user = $_POST["n_user"];
    $pass = $_POST["pass"];

    $sql = "INSERT INTO admin_tbl (a_user, a_pass) VALUES (?, ?)";
    $db->executeInsert($sql);
    $db->executeQuery([$user,md5($pass)]);
    header("location:dashboard.php");
}

if (isset($_POST["a_user"]) && $_POST["a_pass"]){
    $a_user = $_POST["a_user"];
    $a_pass = $_POST["a_pass"];
    $another = $_POST["another"];

    echo $another;

    $sql = "UPDATE admin_tbl SET a_user=?, a_pass=? WHERE id=?";
    $db->executeInsert($sql);
    $db->executeQuery([$a_user,md5($a_pass),$another]);
    header("location:dashboard.php");
}

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM admin_tbl WHERE id=?";
    $db->executeInsert($sql);
    $db->executeQuery([$id]);
    header("location:dashboard.php");
}
?>