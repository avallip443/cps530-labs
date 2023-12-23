<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab08 - PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-align: center;
        }

        .top-img {
            width: 100%;
            text-align: center;
        }
        
        .p1 .time-container {
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 400px;
        }
                
        #greeting {
            font-size: 40px;
            color: #ffffff;
            background-color: #92a1a4;
            padding: 20px 40px;
            border-radius: 15px;
        }

        .p2 .user-form {
            background-color: #f9f1da;
            color: #92a1a4;
            box-shadow: #222 4px 4px;
            border-radius: 15px;
            border: #222 double 12px;
        }

        #hit-counter {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container p4-img text-center">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 mx-auto my-3 text-center">
                    <h1>Lab08 - PHP</h1>
                </div>
                <div class="col-2">
                    <?php
                        if (isset($_GET['image'])) {
                            $imageName = $_GET['image'];
                            $imagePath = 'resources/' . $imageName;

                            echo '<img id="halloweenImage" src="' . $imagePath . '" alt="Halloween Image" style="opacity: 0.7;">';
                        }
                    ?>
                </div>
            </div>
    </div>
    
    <section class="p1">
            <?php
                $currentHour = date('G');

                if ($currentHour >= 5 && $currentHour < 12) {
                    $backgroundImage = 'resources/morning.jpg';
                    $greeting = 'Good morning!';
                } elseif ($currentHour >= 12 && $currentHour < 17) {
                    $backgroundImage = 'resources/afternoon.webp';
                    $greeting = 'Good afternoon!';
                } elseif ($currentHour >= 17 && $currentHour < 20) {
                    $backgroundImage = 'resources/evening.avif';
                    $greeting = 'Good evening!';
                } else {
                    $backgroundImage = 'resources/night.jpg';
                    $greeting = 'Good night!';
                }
            ?>

            <div class="time-container d-flex justify-content-center align-items-center" style="background-image: url('<?php echo $backgroundImage; ?>');">
                <div id="greeting">
                    <?php echo $greeting; ?>
                </div>
            </div>
    </section>

    <section class="p2 my-5">
            <div class="container d-flex justify-content-center align-items-center">
                <div class="user-form p-5">
                    <h2>Create a Multiplication Table!</h2>
                    <h5>Enter two integer numbers between 3 and 12</h5>

                    <form action="lab08b.php" method="post" class="mt-4">
                        <div class="row my-3">
                            <div class="col text-right">
                                <label for="num1">Number 1:</label>
                                <input type="number" name="num1" id="num1" min="3" max="12" required>
                            </div>
                            <div class="col text-left">
                                <label for="num2">Number 2:</label>
                                <input type="number" name="num2" id="num2" min="3" max="12" required>
                            </div>
                        </div>
                        <input type="submit" value="Generate Table">
                    </form>
                </div>
            </div>
    </section>

    <section class="p4">
            <div class="container">
                <?php
                    if (isset($_GET['image'])) {
                        echo '<p style="text-align: center; color: #fff; background-color: #92a1a4; padding: 50px; margin: 20px 0; border-radius: 15px">Halloween image is ' . $imageName . '</p>';
                    }
                ?>
            </div>
    </section>

    <?php
        if (!isset($_COOKIE['hit_counter'])) {
            $counter = 1;
            setcookie('hit_counter', $counter, time() + (60*60^24));
        } else {
            $counter = ++$_COOKIE['hit_counter'];
            setcookie('hit_counter', $counter, time() + (60*60*24));
        }
    ?>

    <div class="d-flex justify-content-end align-items-end my-5">
        <div id="hit-counter" onclick="alert('Total Website Hits: <?php echo $counter; ?>' ">
            Hits: <?php echo $counter; ?>
        </div>
    </div>
</body>
</html>