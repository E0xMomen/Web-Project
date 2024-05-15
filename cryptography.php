<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cryptography</title>
    <link rel="stylesheet" href="./CSS/cryptography.css">
</head>
<?php require_once "conect.php";?>

<body>
    <script type="text/javascript">
        window.addEventListener("scroll", function () {
            var header = document.querySelector("header")
            header.classList.toggle("sticky", window.scrollY > 0)
        })
    </script>
    <header>
        <img src="./images/logo.png" alt="">
        <span>Book Planet</span>
        <ul>
            <li><a href="afterlogin.php">Home</a></li>
            <li><a href="#AboutUs">About Website</a></li>
            <li><a href="#Category">Category</a></li>
            <li><a href="#">Contact Us</a></li>
            
        </ul>
    </header>
    <section class="banner"></section>
    <div class="slider-thumb"></div>
    <div class="container">
        <h1 class="cryptography">cryptography</h1>
        <div class="content">
            <pre class="brief">                        <span style="font-size: 50px;color: brown;">cryptography</span>    
                is the practice of developing and 
                using coded algorithms to protect 
                and obscure transmitted information
                 so that it may only be read by
                  those with the permission and 
                  ability to decrypt it. .</pre>
        </div>
        <table class="contain">
            <thead>
                <tr>
                    <td> id </td>
                    <td> name </td>
                    <td> image </td>
                    <td> type</td>
                    <td> num_pages </td>
                    <td>level</td>
                    <td>added at</td>
                    <td>Download</td>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM books WHERE type='cryptograph'";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td> $row[id]</td>
                            <td> $row[name] </td>
                            <td> <img width='40px' height='40px' src='./images/$row[image]' alt='not exist in database'> </td>
                            <td>$row[type] </td>
                            <td>$row[number_page]  </td>
                            <td>$row[level] </td>
                            <td> $row[create_at] </td>
                            <td><button class='botn'><span class='text'><a href='$row[link]'>Download</a></span></button></td>
                        </tr>
                        ";
                    }
                } else {
                    echo "0 results";
                }

                ?>

        </table>
        <form>
            <button style="
            margin: 50px;
            padding: 30px 50px;
            border: black 2px solid;
            border-radius: 20px;
            ">
                <a style="font-size: 20px; text-decoration: none; color: black; "
                    href="addblog.php">add blog</a>
            </button>
        </form>
    </div>
    <footer>
        <div class="footer-bottom">
            &copy; Book Planet. All Rights Reserved.
        </div>
    </footer>
</body>

</html>