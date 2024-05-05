<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admins</title>
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

        .admin-count {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #666;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .admin-table th,
        .admin-table td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .admin-table th {
            background-color: #007BA7;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .admin-table tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .admin-table tr:hover {
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

        .admin-actions {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
        }

        .admin-actions button {
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

        .admin-actions button:hover {
            background-color: #007BA7;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        #addadminbutt {
            background-color: #007BA7;
            color: #fff;
            padding: 14px 24px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-bottom: 10px;
        }

        #addadminbutt:hover {
            background-color: #1976D2;
        }

        #addadminbutt a {
            text-decoration: none;
        }
    </style>
</head>
<?php
$num_books = 0;
require_once "conect.php";
$sql_books = "SELECT COUNT(*) from admin ";
$res_num_books = $con->query($sql_books);

if ($res_num_books->num_rows > 0) {
    $row = $res_num_books->fetch_assoc();
    $num_books = $row['COUNT(*)'];
}
?>

<body>
    <div class="container">
        <h1>Admins</h1>
        <div class="admin-actions">
        </div>
        <div class="admin-count">Total Admins:<?php echo $num_books ?></div>
        <a href="Dashboard.php"><button id="addadminbutt">Back</button></a>

        <?php
        if ($_SESSION["type"] == "super") {
            echo '<a href="Add-admin.php"><button id="addadminbutt">Add admin</button></a>';
        } else {
            echo " ";
        }
        ?>


        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Admin Type</th>
                    <th>Date & Time Added</th>
                    <?php
                    if ($_SESSION["type"] == "super") {
                        echo "<th>Actions</th>";
                    } else {
                        echo "";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $check = "";
                    $sql = "SELECT * FROM admin";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            if ($_SESSION["type"] == "super") {
                                $check = "<td>
                                    <a href='delete_admin.php?id=$row[id]'><button>Delete</button></a>
                                    <a href='Edit-admin.php?id=$row[id]'><button>Edit</button></a>
                                </td>";
                            } else {
                                $check = "";
                            }
                            echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[email]</td>
                                <td>$row[password]</td>
                                <td>$row[type]</td>
                                <td>$row[created_at]</td>
                                $check
                            </tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>