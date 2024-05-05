<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users Edit</title>
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
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form id="user-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

        <?php
            include_once "conect.php";
            if($_SERVER['REQUEST_METHOD']=='GET'){
                ini_set('display_errors', '0');
                $id = $_GET['id'];
                
                $sql = "SELECT * FROM user WHERE id = '$id'"; 
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row['name'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $phone = $row['phone'];
                        $gender = $row['gender'];
                        $create_at = $row['create_at'];
                    }
                }    
                
            }      
        ?>   
            <div class="form-group">
                <label for="id" class="form-label">ID</label>
                <input type="text" id="id" name="id" value ="<?php ini_set('display_errors', '0'); echo $id;?>" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value ="<?php ini_set('display_errors', '0'); echo $name;?>" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value ="<?php echo $email?>" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" value ="<?php echo $password?>" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" id="phone" name="phone" value ="<?php echo $phone?>" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="gender" class="form-label">Gender</label>
                <select id="gender" name="gender" value ="<?php echo $gender?>" class="form-input" required style="width: 626px;">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time-created" class="form-label">Time Created</label>
                <input type="datetime-local" id="time-created" name="time-created" value ="<?php echo $create_at?>" class="form-input" required>
            </div>
            <div class="form-actions">
                <a href="Users.php"><button type="button">Cancel</button></a>
                <a href="Users.php"><button type="submit" name = "submit">Update</button</a>
            </div>

            <?php
                include_once "conect.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['submit'])){
                        $id = $_POST["id"];
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $phone = $_POST["phone"];
                        $gender = $_POST["gender"];
                        $create_at = $_POST["create_at"];

                        $sql = "UPDATE user set name='$name' , 
                        email='$email' , password ='$password',
                        phone = '$phone' , gender = '$gender',
                        create_at = '$create_at' WHERE id='$id' ";
                        $con->query($sql);

                        if($con){
                            echo "Updated Successfuly";
                        }else{
                            echo "Updated UNSuccessfuly";
                        }
                        $con->close();
                    }
                }
            ?>

        </form>
    </div>
    <script>
        document.querySelector('.form-actions a').addEventListener('click', function() {
            window.location.href = this.getAttribute('href');
        });

    </script>
</body>
</html>
