<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url("./images/login2.jpg") no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      overflow: hidden;
    }

    .registration-form {
      background: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      animation: slideUp 1s ease-in-out;
    }

    h1 {
      color: #00796b;
      margin-bottom: 24px;
      animation: fadeIn 1s ease-in-out;
    }

    label {
      color: #333;
      margin-bottom: 8px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"],
    select {
      padding: 12px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
      transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    input[type="tel"]:focus,
    select:focus {
      border-color: #00796b;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 119, 107, 0.5);
    }

    button {
      padding: 12px;
      background-color: #00796b;
      color: white;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
      width: 100%;
      margin: 0 auto;
      animation: fadeIn 1s ease-in-out;
    }

    button:hover {
      background-color: #00695c;
      transform: scale(1.05);
    }

    .icon {
      margin-right: 10px;
      background-color: #00796b;
      border-radius: 50%;
      padding: 5px;
      color: white;
      animation: bounce 0.5s infinite alternate;
    }

    .icon.lock {
      margin-left: 0;
      margin-right: 10px;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    @keyframes slideUp {
      0% {
        transform: translateY(100%);
        opacity: 0;
      }

      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes bounce {
      0% {
        transform: scale(1);
      }

      100% {
        transform: scale(1.2);
      }
    }
  </style>
</head>

<body>
  <div class="registration-form">
    <h1>User Registration</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div>
        <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
        <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
      </div>
      <input type="email" id="email" name="email" placeholder="Email" required>
      <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
      <div>
        <input type="password" id="password" name="password" placeholder="Password" required>
      </div>
      <div>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
      </div>

      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <button type="submit">Register</button>
      <button style="margin-top: 10px;" type="submit"><a style="color: white;text-decoration: none;"
          href="Login-page.php">Login</a></button>


      <?php
      include "conect.php";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST['first-name'];
        $lnum = $_POST['last-name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $cpass = $_POST['confirm-password'];
        $name = $num . " " . $lnum;

        if ($password == $cpass) {
          $sql = "INSERT INTO user ( name , email , password , phone , gender ) VALUES
                ('$name',' $email','$password',' $phone','$gender')";
          $con->query($sql);
          if ($con) {
            echo "insert Successfuly";

          } else {
            echo "insert UNSuccessfuly";
          }
          mysqli_close($con);
          header("Location:home.php");
        } else {
          echo "<br>";
          echo "password not match";
        }
      }
      ?>
    </form>
  </div>

  <script>
    // Animations
    const registrationForm = document.querySelector('.registration-form');
    const heading = document.querySelector('h1');
    const icons = document.querySelectorAll('.icon');

    window.addEventListener('load', () => {
      registrationForm.style.animation = 'slideUp 1s ease-in-out';
      heading.style.animation = 'fadeIn 1s ease-in-out';
      icons.forEach((icon, index) => {
        setTimeout(() => {
          icon.style.animation = 'bounce 0.5s infinite alternate';
        }, index * 200);
      });
    });
  </script>
</body>

</html>