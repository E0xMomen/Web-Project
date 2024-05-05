<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
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
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center horizontally */
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 40px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            width: 100%;
            /* Make the form full width */
            max-width: 400px;
            /* Limit form width */
        }

        label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2196F3;
        }

        button {
            background-color: #007BA7;
            color: #fff;
            padding: 14px 24px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 20px;
            /* Add some top margin */
        }

        button:hover {
            background-color: #1976D2;
        }
    </style>
</head>
<?php
require_once "conect.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $name = "";
    $email = "";
    $password = "";
    $type = "";
    $created_at = "";
    $sql = "SELECT * FROM admin WHERE id='$id'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $type = $row['type'];
            $created_at = $row['created_at'];
        }
    }
}
?>

<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h1>Edit Admin</h1>
            <div>
                <label for="i">ID</label>
                <input type="text" value="<?php ini_set('display_errors', '0');
                echo $id ?>" name="id" id="i" readonly>
            </div>
            <div>
                <label for="n">Admin Name</label>
                <input type="text" value="<?php echo $name ?>" name="name" id="n">
            </div>
            <div>
                <label for="e">Admin Email</label>
                <input type="email" value="<?php echo $email ?>" name="email" id="e">
            </div>
            <div>
                <label for="p">Password</label>
                <input type="text" value="<?php echo $password ?>" name="password" id="p">
            </div>
            <div>
                <label for="ty"> super or admin </label>
                <input type="text" value="<?php echo $type ?>" name="type" id="ty">
            </div>
            <div>
                <label for="p">created at</label>
                <input type="text" value="<?php echo $created_at ?>" name="created_at" id="p">
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $n = $_POST['name'];
                $e = $_POST['email'];
                $p = $_POST['password'];
                $t = $_POST['type'];
                $c = $_POST['created_at'];

                $sql = "UPDATE admin SET name='$n', email='$e', password='$p' , type='$t' , created_at= '$c' WHERE id='$id' ";
                $result = $con->query($sql);

                if ($result) {
                    echo "Updated successfuly";
                } else {
                    echo "cannot Updated";
                }
            }
            ?>
            <button type="submit">Update</button>
            <button><a style="color: white; text-decoration: none;" href="Admin-info.php">Cancel</a></button>
        </form>
    </div>
</body>

</html>