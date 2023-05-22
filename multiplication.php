<!DOCTYPE html>
<html>

<head>
    <title>Multiplication Table</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>