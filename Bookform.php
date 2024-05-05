<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #007BA7, #1976D2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 60px;
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 40px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-label {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
        }

        .form-input:focus {
            outline: none;
            border-color: #2196F3;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
        }

        .form-actions button {
            background-color: #007BA7;
            color: #fff;
            padding: 14px 24px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-right: 20px;
        }

        .form-actions button:hover {
            background-color: #1976D2;
        }
    </style>
</head>
<?php require_once "conect.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];

    $name = "";
    $image = "";
    $type = "";
    $num_pages = "";
    $level = "";
    $link = "";
    $created_at = "";

    $sql = "SELECT * FROM books WHERE id='$id'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $image = $row['image'];
            $type = $row['type'];
            $num_pages = $row['number_page'];
            $level = $row['level'];
            $link = $row['link'];
            $created_at = $row['create_at'];
        }
    }
}
?>

<body>
    <div class="container">
        <h1>Edit Book</h1>
        <form id="book-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id" class="form-label">ID</label>
                <input type="text" value="<?php ini_set('display_errors', '0');
                echo $id ?>" id="id" name="id" class="form-input" readonly>
            </div>
            <div class="form-group">
                <label for="book-name" class="form-label">Book Name</label>
                <input type="text" value="<?php echo isset($name) ? "$name" : " "; ?>" id="book-name" name="book-name"
                    class="form-input" required>
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image URL</label>
                <input type="file" id="image" name="image" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="type" class="form-label">type</label>
                <input type="text" value="<?php echo $type ?>" id="type" name="type" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="page-number" class="form-label">Number_of_pages</label>
                <input type="number" value="<?php echo $num_pages ?>" id="page-number" name="number_pages"
                    class="form-input" required>
            </div>

            <div class="form-group">
                <label for="page-number" class="form-label">Level</label>
                <input type="text" value="<?php echo $level ?>" id="level" name="level" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="time-created" class="form-label">link</label>
                <input type="text" value="<?php echo $link ?>" id="time-created" name="link" class="form-input"
                    required>
            </div>

            <div class="form-group">
                <label for="time-created" class="form-label">Date and Time Created</label>
                <input type="text" value="<?php echo $created_at ?>" id="time-created" name="time-created"
                    class="form-input" required>
            </div>

            <div class="form-actions">
                <a href="books.php"><button type="button">Cancel</button></a>
                <button value="save" type="submit">Update</button>
            </div>

            <?php
            $p_img = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $p_img = @$_FILES['image']['name'];
                $p_img_tmp = @$_FILES['image']['tmp_name'];
                if (move_uploaded_file($p_img_tmp, 'images/' . $p_img)) {
                    echo '<script>alert("image is saved in th file and database");</script>';
                } else {
                    echo '<script>alert("image is not saved");</script>';
                }

                $current_id = $_POST['id'];
                $n = $_POST['book-name'];
                $t = $_POST['type'];
                $n_pages = $_POST['number_pages'];
                $l = $_POST['level'];
                $Link = $_POST['link'];
                $Created_at = $_POST['time-created'];

                $sql = "UPDATE books SET name='$n', image = '$p_img' ,type='$t', number_page='$n_pages',level='$l' , link='$Link' ,create_at='$Created_at' WHERE id= '$current_id' ";

                $con->query($sql);
                if ($con) {
                    echo "Updated Successfuly";
                } else {
                    echo "cannot Update";
                }
                mysqli_close($con);
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