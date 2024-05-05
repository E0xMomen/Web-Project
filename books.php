<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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

        .book-count {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #666;
        }

        .book-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .book-table th,
        .book-table td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .book-table th {
            background-color: #007BA7;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .book-table tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .book-table tr:hover {
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

        .book-actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .book-actions button {
            background-color: #007BA7;
            color: #fff;
            padding: 14px 24px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .book-actions button:hover {
            background-color: #007BA7;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        #addBookBtn a {
            color: rgb(255, 255, 255);
            text-decoration: none;
        }
    </style>
</head>
<?php
$num_books = 0;
require_once "conect.php";
$sql = "SELECT * FROM books ";
$sql_books = "SELECT COUNT(*) from books ";
$res_num_books = $con->query($sql_books);

if ($res_num_books->num_rows > 0) {
    $row = $res_num_books->fetch_assoc();
    $num_books = $row['COUNT(*)'];
}
?>

<body>
    <div class="container">
        <h1>Books</h1>

        <div class="book-count">Total Books: <?php echo $num_books ?></div>

        <div class="book-actions">
            <button id="addBookBtn">
                <a href="Dashboard.php">Back</a>
            </button>
        </div>
        <div class="book-actions">
            <button id="addBookBtn">
                <a href="Add-book.php">Add Book </a>
            </button>
        </div>

        <table class="book-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Pages Number</th>
                    <th>Category</th>
                    <th>Level</th>
                    <th>Link</th>
                    <th>Date & Time Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php
                $id = "";
                $name = "";
                $image = "";
                $type = "";
                $num_pages = "";
                $level = "";
                $added_at = "";
                $link = "";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td> $row[id]</td>
                            <td> $row[name] </td>
                            <td> <img width = 50px height =50px src='./images/$row[image]' alt='not exist in database'> </td>
                            <td>$row[number_page]  </td>
                            <td>$row[type] </td>
                            <td>$row[level] </td>  
                            <td><a href='$row[link]'>Download</a></td>
                            <td> $row[create_at] </td>
                            <td>
                            <a href='./Bookform.php?id=$row[id]'><button>Edit</button></a>
                            <a href='./delete_book.php?id=$row[id]'><button>Delete</button></a>
                            </td>
                        </tr>
                        ";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>