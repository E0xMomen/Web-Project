<?php
include_once "conect.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $sql = "DELETE FROM user WHERE id = $id ";
        mysqli_query($con , $sql);
        mysqli_affected_rows($con)."Recored deleted";
        mysqli_close($con);
    }
    header("Location:Users.php");
?>