<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab09d - Image Search</title>
    <style>
        body {
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
            background-image: url(resources/bgd.jpg);
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
    </style>
</head>
<body>
        <h1>Image Search</h1>
        <h3>Select Location and/or Year</h3>
<?php
$servername = "localhost";
$username = "avallipu";
$password = "s2MVU8IM";
$dbname = "avallipu";

$connect = new mysqli($servername, $username, $password, $dbname);

if (!$connect) {
    print("Connection Failed");
}

$selectLocation = $connect->query("SELECT DISTINCT location FROM photographs");
$selectYear = $connect->query("SELECT DISTINCT YEAR(date_taken) as year FROM photographs");
?>

<form method="post" action="">
    <label for="location">Select Location:</label>
    <select name="location">
        <option value="" disabled selected>Select Location</option>
        <?php
        while ($row = $selectLocation->fetch_assoc()) {
            echo "<option value='{$row['location']}'>{$row['location']}</option>";
        }
        ?>
    </select>
    <br><br>
    <label for="year">Select Year:</label>
    <select name="year">
    <option value="" disabled selected>Select Year</option>
        <?php
        while ($row = $selectYear->fetch_assoc()) {
            echo "<option value='{$row['year']}'>{$row['year']}</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST["location"];
    $year = $_POST["year"];

    $sql = "SELECT * FROM photographs WHERE 
            ('$location' = '' OR LOWER(location) = LOWER('$location')) AND
            ('$year' = '' OR YEAR(date_taken) = '$year')";

    $result = mysqli_query($connect, $sql);

    if ($result === false) {
        printf("Error: %s\n", mysqli_error($connect));
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Search Results</h2>";
        echo "<div class='photo-container'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='photo'>";
            echo "<img src='{$row['picture_url']}' alt='Photograph'>";
            echo "<div class='caption'>Subject: {$row['subject']}<br>Location: {$row['location']}<br>Date Taken: {$row['date_taken']}</div>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No photos found for the selected criteria.</p>";
    }
}
?>
</body>
</html>
