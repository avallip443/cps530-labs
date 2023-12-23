<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab08b - Multipication Table</title>

    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: #92a1a4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .table {
            color: #333;
            background-color: #f9f1da;
        }

    </style>
</head>
<body>
    <?php
        if (isset($_POST['num1']) && isset($_POST['num2'])) {
            $num1 = (int)$_POST['num1'];
            $num2 = (int)$_POST['num2'];

            if ($num1 >= 3 && $num1 <= 12 && $num2 >= 3 && $num2 <= 12) {
                $table = '<table border="4" cellpadding="30" cellspacing="5">';
                    
                for ($i = 1; $i <= $num1; $i++) {
                    $table .= '<tr>';
                    for ($j = 1; $j <= $num2; $j++) {
                        $table .= '<td>' . ($i * $j) . '</td>';
                    }
                    $table .= '</tr>';
                }            
                $table .= '</table>';
            }  else {
                echo 'Please enter two integer numbers between 3 and 12.';
            }
        }
    ?>

    <h1>Multiplication Table</h1>
    <div class="table">
        <?php echo $table; ?>
    </div>
    
</body>
</html>