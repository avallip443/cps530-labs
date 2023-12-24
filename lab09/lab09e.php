<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab09e - Random Image</title>
    <style>
        body {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
            background-image: url(resources/bge.jpg);
            background-position: center;
        }

        .photo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .photo {
            margin: 30px;
        }

        .caption {
            margin-top: 5px;
            font-size: 20px;
        }

        img {
            max-width: 400px;
        }

        h1 {
            font-size: 45px;
        }

        p {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>A Random Image From My Gallery</h1>
    <?php
    $servername = "localhost";
    $username = "avallipu";
    $password = "s2MVU8IM";
    $dbname = "avallipu";

    $connect = new mysqli($servername, $username, $password, $dbname);

    if (!$connect) {
        print("Connection Failed");
    }

    $countSql = "SELECT COUNT(*) AS total FROM photographs";
    $countResult = $connect->query($countSql);

    if ($countResult) {
        $totalCount = $countResult->fetch_assoc()['total'];
        echo "<h2>Total number of images in the database: $totalCount<br></h2>";
    } else {
        echo "Error getting total count: " . $connect->error . "<br>";
    }

    $randomSql = "SELECT * FROM photographs ORDER BY RAND() LIMIT 1";
    $randomResult = $connect->query($randomSql);

    if ($randomResult->num_rows > 0) {
        $randomImage = $randomResult->fetch_assoc();
        $caption = "Picture Number: {$randomImage['picture_number']}<br> Subject: {$randomImage['subject']}<br> Location: {$randomImage['location']}<br> Date Taken: {$randomImage['date_taken']}<br>";

        echo "<img src='{$randomImage['picture_url']}' alt='Random Image'>";
        echo "<p>$caption</p>";
    } else {
        echo "No images found in the database";
    }

    $connect->close();
    ?>
</body>
</html>
