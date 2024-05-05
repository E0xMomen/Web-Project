<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BLOGS</title>
    <link rel="stylesheet" href="./CSS/blogs.css">
</head>

<?php require_once "conect.php"; ?>

<body>
    <div class="container">
        <h1>BLOGS</h1>
        <div class="blog-actions">
        </div>
        <div class="blog-count">Total BLOGS:</div>
        <?php
        if ($_SESSION["type"] == "super" || $_SESSION["type"] == "admin") {
            echo '<a href="Dashboard.php"><button id="back">Back</button></a>';
        } else {
            echo '<a href="afterlogin.php"><button id="back">Back</button></a>';
        }
        ?>

        <table class="blog-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>write by who</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>type</th>
                    <th>content</th>
                    <th>time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $sql = "SELECT * FROM blogs";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                        <tr>
                            <td> $row[id] </td>
                            <td> $row[name] </td>
                            <td> $row[email] </td>
                            <td> $row[phone] </td>
                            <td> $row[type] </td>
                            <td> $row[content] </td>  
                            <td> $row[created_at] </td>
                            
                        </tr>
                        ";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>