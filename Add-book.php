<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2E7D32, #4CAF50);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 60px;
            max-width: 1200px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .container:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 0, rgba(255, 255, 255, 0.1), transparent 50%);
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .container:hover:before {
            opacity: 1;
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 60px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 30px;
            align-items: center;
            justify-content: center;
        }

        input,
        select {
            background-color: #f8f8f8;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 16px;
            font-size: 16px;
            width: 100%;
            border: none;
        }

        input:focus,
        select:focus {
            outline: none;
            box-shadow: 0 4px 8px rgba(0, 127, 0, 0.2);
        }

        label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }

        /* Add styles for the save button */
        .submit {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 30px;
            margin-left: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add a New Book</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Book Name</label>
                <input type="text" id="name" name="name" placeholder="Enter book name">
            </div>
            <div>
                <label for="category">Book Category</label>
                <select id="category" name="category">
                    <option value="soc">soc</option>
                    <option value="pentesting">penetration testing</option>
                    <option value="network-security">Network Security</option>
                    <option value="cryptograph">cryptography</option>

                </select>
            </div>
            <div>
                <label for="cover-image">Book Cover Image</label>
                <input type="file" id="cover-image" name="cover-image">
            </div>
            <div>
                <label for="page-count">Number of Pages</label>
                <input type="number" id="page-count" name="page-count" placeholder="Enter page count">
            </div>
            <div>
                <label for="level">Book Level</label>
                <select id="Level" name="level">
                    <option value="Beginner">Beginner</option>
                    <option value="Medium">Medium</option>
                    <option value="advanced ">advanced</option>
                </select>
            </div>
            <div>
                <label for="link of Book">link of Book</label>
                <input type="text" id="link of Book" name="link" placeholder="Enter link of Book">
            </div>
            <button type="submit" name="save">Add Book</button>


            <?php
            include "conect.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['save'])) {
                    $p_img = @$_FILES['cover-image']['name'];
                    $p_img_tmp = @$_FILES['cover-image']['tmp_name'];


                    if (move_uploaded_file($p_img_tmp, 'images/' . $p_img)) {
                        echo '<script>alert("image is saved in the file and database");</script>';
                    } else {
                        echo '<script>alert("image is not saved");</script>';
                    }
                }

                $name = $_POST['name'];
                $category = $_POST['category'];
                $count = $_POST['page-count'];
                $level = $_POST['level'];
                $link = $_POST['link'];


                $sql = "INSERT INTO books ( name , type ,image ,number_page , level , link ) VALUES
                        ('$name','$category','$p_img',' $count','$level' , '$link')";
                $con->query($sql);
                if ($con) {
                    echo "insert Successfuly";

                } else {
                    echo "insert UNSuccessfuly";
                }
                mysqli_close($con);
            }
            ?>
        </form>
        <a href="Books.php"><button style="margin-top: 15px;">Back</button></a>
        <!-- Add the save button below the form -->
    </div>
</body>

</html>