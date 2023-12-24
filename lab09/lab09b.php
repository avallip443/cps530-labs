<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab09b - Photographs By Date</title>
    <style>
        body {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-image: url(resources/bgb.jpg);
            background-position: center;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #efefef;
            padding: 10px;
        }

        th {
            background-color: #cda191;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #e3e6db;
        }

        tr:nth-child(odd) {
            background: #fbf8f4;
        }

        h1 {
            font-size: 45px;
        }
    </style>
</head>
<body>
    <h1>My Gallery Sorted By Date</h1>
<?php
$servername = "localhost";
$username = "avallipu";
$password = "s2MVU8IM";
$dbname = "avallipu";

$connect = new mysqli($servername, $username, $password, $dbname);

if (!$connect) {
    print("Connection Failed");
}

$sql = "SELECT * FROM photographs ORDER BY date_taken DESC";

$result = mysqli_query($connect, $sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Picture Number</th><th>Subject</th><th>Location</th><th>Date Taken</th><th>Picture URL</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['picture_number']}</td>";
        echo "<td>{$row['subject']}</td>";
        echo "<td>{$row['location']}</td>";
        echo "<td>{$row['date_taken']}</td>";
        echo "<td><img src='{$row['picture_url']}' alt='Photograph' style='max-width: 300px; max-height: 300px;'></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($connect);
?>
</body>
</html>
