<!DOCTYPE html>
<html>
<head>
    <title>Chessboard</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .chessboard {
            width: 400px;
            height: 400px;
            display: flex;
            flex-wrap: wrap;
        }

        .square {
            width: 50px;
            height: 50px;
        }

        .black {
            background-color: #b58863;
        }

        .white {
            background-color: #f0d9b5;
        }
    </style>
</head>
<body>
    <div class="chessboard">
        <?php
        $chessboardSize = 8;
        $isBlack = false;

        for ($row = 0; $row < $chessboardSize; $row++) {
            for ($col = 0; $col < $chessboardSize; $col++) {
                $isBlack = !$isBlack;
                $colorClass = $isBlack ? "black" : "white";
                echo "<div class='square $colorClass'></div>";
            }
            $isBlack = !$isBlack; // switch color for the next row
        }
        ?>
    </div>
</body>
</html>
