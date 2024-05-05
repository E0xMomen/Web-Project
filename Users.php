<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #007BA7, #008080);
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
            max-width: 1200px;
            width: 100%;
        }

        h1 {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 60px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .user-count {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #666;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .user-table th,
        .user-table td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .user-table th {
            background-color: #007BA7;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .user-table tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .user-table tr:hover {
            background-color: #e0e0e0;
            animation: row-highlight 0.3s ease-in-out;
        }

        @keyframes row-highlight {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }

            100% {
                transform: scale(1);
            }
        }

        .user-actions {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
        }

        .user-actions button {
            background-color: #007BA7;
            color: #fff;
            padding: 14px 24px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: 10px;
        }

        .user-actions button:hover {
            background-color: #007BA7;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
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
    <?php
    include_once "conect.php";
    $name = "";
    $email = "";
    $pass = "";
    $phone = "";
    $gender = "";
    $date = "";
    $i = "";
    ?>
    <div class="container">
        <h1>Users</h1>
        <div class="user-actions">
        </div>
        <div class="form-actions">
            <a href="Dashboard.php"><button type="button">Back</button></a>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Date & time Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM user";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[email]</td>
                                <td>$row[password]</td>
                                <td>$row[phone]</td>
                                <td>$row[gender]</td>
                                <td>$row[create_at]</td>
                                <td>
                                    <a href='userform.php?id=$row[id]'><button>Edit</button></a>
                                    <a href='delete_user.php?id=$row[id]'><button>Delete</button></a>
                                </td>
                            </tr>";
                        $i++;
                    }
                    echo "<div class='user-count'>Total Users:$i </div>";
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>