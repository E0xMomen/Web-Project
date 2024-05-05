<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .dashboard {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 40px;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .nav-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav-button {
            background-color: #4CAF50;
            color: #fff;
            padding: 16px 24px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            width: 80%;
            max-width: 300px;
            position: relative;
            overflow: hidden;
        }

        .nav-button:hover {
            background-color: #45a049;
            transform: translateY(-4px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .nav-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            transform: skewX(-30deg);
            transition: all 0.5s ease-in-out;
        }

        .nav-button:hover::before {
            left: 100%;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <h1>Library Admin Dashboard</h1>
        <div class="nav-buttons">
            <a href="books.php" class="nav-button">Books</a>
            <a href="users.php" class="nav-button">Users</a>
            <a href="Admin-Info.php" class="nav-button">Admins</a>
            <a href="AfterLogin.php" class="nav-button">Home Page</a>
            <a href="blogs.php" class="nav-button">The Blog</a>
        </div>
    </div>
</body>

</html>