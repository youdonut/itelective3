<!DOCTYPE html>
<html>

<head>
    <title>Student Grade</title>
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
        $marks = 85; // set the student's marks
        $grade = ''; // initialize the grade variable
        
        if ($marks >= 60) {
            $grade = 'First Division';
        } elseif ($marks >= 45) {
            $grade = 'Second Division';
        } elseif ($marks >= 33) {
            $grade = 'Third Division';
        } else {
            $grade = 'Fail';
        }

        echo "The student's marks are: $marks<br>";
        echo "The student's grade is: $grade<br>";
        ?>
    </div>
</body>

</html>