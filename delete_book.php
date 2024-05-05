<?php

require_once "conect.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "DELETE FROM books where id ='$id'";
    $result = $con->query($sql);
    header("location:./books.php");
}
header("location:./books.php");