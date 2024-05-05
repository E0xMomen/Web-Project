<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .report-section {
            margin-bottom: 40px;
        }

        .report-section h2 {
            margin-bottom: 10px;
        }

        .report-data {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .report-data table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-data th,
        .report-data td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .report-data th {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reports</h1>

        <div class="report-section">
            <h2>Book Lending Statistics</h2>
            <div class="report-data">
                <table>
                    <tr>
                        <th>Book Title</th>
                        <th>Number of downloads</th>
                    </tr>
                    <tr>
                        <td>Book Title 1</td>
                        <td>345</td>
                    </tr>
                    <tr>
                        <td>Book Title 2</td>
                        <td>289</td>
                    </tr>
                    <!-- Add more rows here -->
                </table>
            </div>
        </div>

        <div class="report-section">
            <h2>User Activity</h2>
            <div class="report-data">
                <table>
                    <tr>
                        <th>User Name</th>
                        <th>Books Downloaded</th>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>8</td>
                    </tr>
                    <!-- Add more rows here -->
                </table>
            </div>
        </div>

        <!-- Add more report sections here -->

    </div>
</body>
</html>