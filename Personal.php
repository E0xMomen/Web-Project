<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/Personal.css">
    <title>Book Planet</title>
</head>
<?php
require_once "conect.php";
$name = $_SESSION["name"];
$e = $_SESSION["email"];
?>

<body>

    <header>
        <img src="./images/logo.png" alt="not found">
        <span>Personal Page</span>
        <nav>
            <ul>
                <li><a href="./afterlogin.php">Home</a></li>
                <li><a href="./afterlogin.php">About Website</a></li>
                <li><a href="./afterlogin.php">Category</a></li>
                <li><a href="./afterlogin.php">Contact Us</a></li>
                <li><a href=""><label style="cursor: pointer;"><?php echo $name ?></label></a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
        <pre>Welcome to Book Planet - Your Cybersecurity Library</pre>
    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function () {
            var header = document.querySelector("header")
            header.classList.toggle("sticky", window.scrollY > 0)
        })
    </script>

    <section class="personal-page">
        <div class="container">
            <div class="blogs-added">
                <h2>Blogs Added</h2>
                <div class="blog-cards" style="flex-wrap: wrap;">
                    <?php
                    $id = 0;
                    $sql = "SELECT *FROM blogs WHERE email = '$e'";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id=$row['id'];
                            echo "
                                <div style='margin:10px' class='blog-card'>
                                <h3>title: $row[type]</h3>
                                <h5>Date: $row[created_at]</h5>
                                </br>
                                <p>$row[content]</p>
                                </br>
                                <button
                                    style='margin-right: 170px; background-color: #007BB6;padding: 10px 20px;border: none;border-radius: 20px; '><a
                                    style='text-decoration: none; color: white;' href='delete_blog.php?id=$id'> Delete
                                </a></button>
                                <button style='
                                    background-color: #007BB6;padding: 10px 20px;border: none;border-radius: 20px;'><a
                                    style='text-decoration: none; color: white; ' href='edit_blog.php?id=$id'> Edit
                                </a></button>
                                </div>
                        ";
                        }
                    } else {
                        echo "not exit blog yet";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-bottom">
            &copy; Book Planet. All Rights Reserved.
        </div>
    </footer>

</body>

</html>