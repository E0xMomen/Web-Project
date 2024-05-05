<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/addblog.css">
    <title>Edit Blog</title>
</head>
<?php require_once "conect.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];
    $name = "";
    $email = "";
    $phone = "";
    $type = "";
    $content = "";
    $sql = "SELECT * FROM blogs WHERE id='$id'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $type = $row['type'];
            $content = $row['content'];
        }

    }
}
?>

<body>
    <div class="container">
        <h1>Edit Blog</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="hidden" name="id" value="<?php ini_set('display_errors', '0');
            echo htmlspecialchars($id); ?>">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="<?php echo htmlspecialchars($name); ?>" id="Name" name="name"
                    class="form-input" readonly>
            </div>
            <div class="form-group">
                <label for="mail" class="form-label">Mail</label>
                <input type="text" value="<?php echo htmlspecialchars($email); ?>" id="Mail" name="email"
                    class="form-input" required>
            </div>
            <div class="form-group">
                <label for="type" class="form-label">Type</label>
            </div>
            <select class="form-input" name="type">
                <option value="soc" <?php if ($type == 'soc')
                    echo 'selected'; ?>>soc</option>
                <option value="pentesting" <?php if ($type == 'pentesting')
                    echo 'selected'; ?>>penetration testing
                </option>
                <option value="network-security" <?php if ($type == 'network-security')
                    echo 'selected'; ?>>Network
                    Security
                </option>
                <option value="cryptograph" <?php if ($type == 'cryptograph')
                    echo 'selected'; ?>>cryptography</option>
            </select>

            <div class="form-group">
                <label for="phone-number" class="form-label">Phone Number</label>
                <input type="text" value="<?php echo htmlspecialchars($phone); ?>" id="phone-number" name="phone"
                    class="form-input" required>
            </div>

            <div class="form-group">
                <label for="c" class="form-label">Content</label>
                <textarea id="c" cols="100" rows="10" name="content" class="form-input"
                    required><?php echo htmlspecialchars($content); ?></textarea>
            </div>

            <div class="form-group">
                <a href="Afterlogin.php"><button
                        style="color: white; margin: 5px; ;padding: 10px 20px; border-radius: 10px; background-color: #2196F3; border: none; "
                        type="button">Cancel</button></a>
                <input value="Update"
                    style="color: white; margin: 5px; ;padding: 10px 20px; border-radius: 10px; background-color: #2196F3; border: none; "
                    type="submit">
                <a href="blogs.php"><button
                        style="color: white; margin: 5px; ;padding: 10px 20px; border-radius: 10px; background-color: #2196F3; border: none; "
                        type="button">Show all Blogs</button></a>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $type = $_POST['type'];
                $content = $_POST['content'];
                $sql = "UPDATE blogs SET name='$name', email='$email', phone='$phone' , type='$type' , content= '$content' WHERE id='$id' ";
                $result = $con->query($sql);
                if ($result) {
                    echo "Updated successfuly";
                    header("Location:Personal.php");
                } else {
                    echo "cannot Updated";
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