<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab09c - Photos from Ontario</title>
    <style>
        body {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-image: url(resources/bgc.jpg);
            background-position: center;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .photo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .photo {
            margin: 30px;
        }

        img {
            max-width: 400px;
        }

        .caption {
            margin-top: 5px;
            font-size: 20px;
        }

        h1 {
            font-size: 45px;
        }
    </style>
</head>
<body>
        <h1>My Photos from Ontario</h1>
    <?php
    $servername = "localhost";
    $username = "avallipu";
    $password = "s2MVU8IM";
    $dbname = "avallipu";

    $connect = new mysqli($servername, $username, $password, $dbname);

    if (!$connect) {
        print("Connection Failed");
    }

    $sql = "SELECT * FROM photographs WHERE LOWER(location) = 'ontario'";
    $result = mysqli_query($connect, $sql);

    if ($result->num_rows > 0) {
        echo "<div class='photo-container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='photo'>";
            echo "<img src='{$row['picture_url']}' alt='Photograph'>";
            echo "<div class='caption'>Subject: {$row['subject']}<br>Location: {$row['location']}</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No photos from Ontario found.</p>";
    }

    mysqli_close($connect);
    ?>
</body>
</html>
