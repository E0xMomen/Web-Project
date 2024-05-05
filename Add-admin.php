<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
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
    </style>
</head>
<?php require_once "conect.php" ?>

<body>
    <div class="container">
        <h1>Add a New Admin</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div>
                <label for="n">Admin Name</label>
                <input type="text" name="name" id="n" placeholder="Enter admin name">
            </div>
            <div>
                <label for="e">Admin Email</label>
                <input type="email" name="email" id="e" placeholder="Enter admin email">
            </div>
            <div>
                <label for="p">password</label>
                <input type="password" name="password" id="p" placeholder="Enter admin password">
            </div>
            <div>
                <label for="access">Accessability</label>
                <select id="access" name="access">
                    <option value="super">Super admin</option>
                    <option value="admin">admin</option>
                </select>
            </div>
            <button type="submit">Add Admin</button>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $access = $_POST['access'];
                $sql = "INSERT INTO admin ( name , email  , password  , type ) VALUES
                        ('$name',' $email','$password' , '$access')";
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
        <a href="Admin-info.php"><button style="margin-top: 15px;">Back</button></a>
    </div>
</body>

</html>