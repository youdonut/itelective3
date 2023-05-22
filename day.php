<!DOCTYPE html>
<html>

<head>
    <title>Convert Number to Day of Week</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            /* Increase font size */
        }

        .result {
            font-weight: bold;
            /* Apply bold font weight */
            text-align: center;
            /* Center horizontally */
        }
    </style>
</head>

<body>
    <div class="result">
        <?php
        function convertToDayOfWeek($number)
        {
            $daysOfWeek = [
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                7 => 'Sunday'
            ];

            if ($number >= 1 && $number <= 7) {
                return $daysOfWeek[$number];
            } else {
                return 'Invalid day';
            }
        }

        // Usage example:
        $number = 3;
        $dayOfWeek = convertToDayOfWeek($number);
        echo "The number $number corresponds to $dayOfWeek.";
        ?>
    </div>
</body>

</html>