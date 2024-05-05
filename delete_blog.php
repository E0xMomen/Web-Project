<?php
require_once "conect.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET["id"];
    $sql = "DELETE FROM blogs where id ='$id'";
    $result = $con->query($sql);
    header("location:personal.php");
}
header("location:Personal.php");
