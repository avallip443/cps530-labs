<?php
$servername = "localhost";
$username = "avallipu";
$password = "s2MVU8IM";
$dbname = "avallipu";

$connect = new mysqli($servername, $username, $password, $dbname);

if ($connect) {
    print("Connection Established Successfully");
} else {
    print("Connection Failed");
}

// Checks if the table already exists 
$tableName = 'photographs';
$ifExist = false;

$sql = "SHOW TABLES";
$result = mysqli_query($connect, $sql); 

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $currTable = $row["Tables_in_$dbname"];

        if ($tableName == $currTable) {
            $ifExist = true;
        } 
    }
} 

if (!$ifExist) {
    $newDB = "CREATE TABLE photographs (
        picture_number INT PRIMARY KEY,
        subject VARCHAR(255),
        location VARCHAR(255),
        date_taken DATE,
        picture_url VARCHAR(255)
    );";

    $created = mysqli_query($connect, $newDB);

    insertPhotograph($connect, 1, "Basilica", "Italy", "2012-04-21", "resources/basilica.jpg");
    insertPhotograph($connect, 2, "Garden", "USA", "1982-05-01", "resources/garden.jpg");
    insertPhotograph($connect, 3, "Swimming", "Germany", "2007-07-24", "resources/swimming.jpg");
    insertPhotograph($connect, 4, "Street", "USA", "1999-02-17", "resources/street.jpg");
    insertPhotograph($connect, 5, "Commuter", "Ontario", "1989-04-02", "resources/commuter.jpg");
    insertPhotograph($connect, 6, "Intersection", "Ontario", "1953-05-02", "resources/intersection.jpg");
    insertPhotograph($connect, 7, "Drinks", "France", "1973-10-12", "resources/drinks.jpg");
    insertPhotograph($connect, 8, "Watch", "Spain", "2003-07-09", "resources/watch.jpg");
    insertPhotograph($connect, 9, "Driving", "Iran", "1990-02-01", "resources/close-up.jpg");
    insertPhotograph($connect, 10, "Birthday Bear", "Ontario", "1994-09-19", "resources/birthday.jpg");
}

echo "<br>Table created successfully<br>";

function insertPhotograph($connect, $picture_number, $subject, $location, $date_taken, $picture_url) {
    $sql = "INSERT INTO photographs (picture_number, subject, location, date_taken, picture_url) VALUES ('$picture_number', '$subject', '$location', '$date_taken', '$picture_url')";

    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully<br>";
    } else {
        echo "Error inserting record: " . $sql . " <br>";
        mysqli_error($connect);
    }
}

mysqli_close($connect);
?>

