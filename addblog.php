<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/addblog.css">
    <title>Add Blog</title>
</head>
<?php require_once "conect.php"; ?>

<body>
    <div class="container">
        <h1>Add Blog</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="" id="Name" name="name" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="mail" class="form-label">Mail</label>
                <input type="text" id="Mail" name="email" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="type" class="form-label">Type</label>
            </div>
            <select class="form-input" name="category">
                <option value="soc">soc</option>
                <option value="pentesting">penetration testing</option>
                <option value="network-security">Network Security</option>
                <option value="cryptograph">cryptography</option>
            </select>

            <div class="form-group">
                <label for="phone-number" class="form-label">Phone Number</label>
                <input type="text" value="" id="phone-number" name="phone" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="c" class="form-label">Content</label>
                <textarea id="c" cols="100" rows="10" name="content" class="form-input" required></textarea>
            </div>

            <div class="form-group">
                <a href="Afterlogin.php"><button
                        style="color: white; margin: 5px; ;padding: 10px 20px; border-radius: 10px; background-color: #2196F3; border: none; "
                        type="button">Cancel</button></a>
                <input value="add blog"
                    style="color: white; margin: 5px; ;padding: 10px 20px; border-radius: 10px; background-color: #2196F3; border: none; "
                    type="submit">
                <a href="blogs.php"><button
                        style="color: white; margin: 5px; ;padding: 10px 20px; border-radius: 10px; background-color: #2196F3; border: none; "
                        type="button">Show all Blogs</button></a>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $type = $_POST['category'];
                $content = $_POST['content'];
                $sql = "INSERT INTO blogs (name, email, phone, type, content) VALUES('$name','$email','$phone','$type','$content')";
                $result = $con->query($sql);
                if ($result) {
                    echo "INSERTED successfuly";
                } else {
                    echo "cannot INSERTED the Blog";
                }
            }
            ?>
        </form>
    </div>
    <script>
        document.querySelector('.form-actions a').addEventListener('click', function () {
            window.location.href = this.getAttribute('href');
        });

    </script>
</body>

</html>