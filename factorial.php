<!DOCTYPE html>
<html>

<head>
    <title>Factorial Calculation</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .result {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="result">
        <?php
        $number = 5;
        $factorial = 1;
        $factorialProcess = '';

        for ($i = $number; $i >= 1; $i--) {
            if ($i === 1) {
                $factorialProcess .= $i . " (base case)";
            } else {
                $factorialProcess .= $i . " * ";
            }

            $factorial *= $i;
        }

        echo "The factorial of $number is:<br>";
        echo "$factorialProcess = $factorial";
        ?>

    </div>
</body>

</html>