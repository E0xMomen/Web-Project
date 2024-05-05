<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url("./images/login1.jpg") no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      overflow: hidden;
    }

    .login-container {
      width: 450px;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 50px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      animation: fadeIn 1s;
      position: relative;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(-20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h2 {
      text-align: center;
      color: #333;
      animation: slideIn 1s;
    }

    @keyframes slideIn {
      0% {
        transform: translateX(-100%);
      }

      100% {
        transform: translateX(0);
      }
    }

    input {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #555;
      outline: none;
    }

    button {
      width: 100%;
      background-color: #555;
      color: #fff;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #333;
    }

    .register-link {
      text-align: center;
      margin-top: 20px;
    }

    .register-link a {
      color: red;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>
    <form id="loginForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text" id="username" name="username" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <?php
      include "conect.php";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email="";
        $name = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
        $sqla = "SELECT * FROM admin WHERE name = '$name' AND password = '$password'";
        $result = $con->query($sql);
        $resulta = $con->query($sqla);
        if ($result->num_rows > 0) {
          $id = 0;
          while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $email=$row["email"];
          }
          $_SESSION["type"] = "user";
          $_SESSION["name"] = $name;
          $_SESSION["id"] = $id;
          $_SESSION["email"]= $email;
          header("Location:AfterLogin.php");
          exit();
        } elseif ($resulta->num_rows > 0) {
          $type = "";
          while ($row = $resulta->fetch_assoc()) {
            $type = $row['type'];
          }
          $_SESSION["id"] = $id;
          $_SESSION["name"] = $name;
          $_SESSION["type"] = $type;
          header("Location: Dashboard.php");
          exit();
        } else {
          echo "Invalid username or password.";
        }
      }

      // Close the database connection
      $con->close();
      ?>

    </form>
    <div class="register-link">
      Don't have an account. <a href="register-page.php">Register</a>
    </div>
  </div>


</body>

</html>