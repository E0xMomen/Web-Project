<?php
require_once "conect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "DELETE FROM admin where id ='$id'";
    $result = $con->query($sql);
    header("location:./Admin-info.php");
}
header("location:./Admin-info.php");