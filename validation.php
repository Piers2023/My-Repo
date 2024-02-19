<?php
session_start();
class Validation{
    public function setValidate($massage){
        $_SESSION["validate"] = $massage;
        header("location:index.php");
    }
    public function setValue($result){
        $_SESSION["validate"] = $result;
        header("location:member.php");
    }

    public function getSearch($result){
        $_SESSION["search"] = $result;
        header("location:member.php");
    }
}

$Validate = new Validation();
?>