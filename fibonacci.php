<!DOCTYPE html>
<html>

<head>
    <title>Fibonacci Sequence</title>
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
        function fibonacci($numTerms)
        {
            $fibSequence = [0, 1]; // Starting Fibonacci sequence
        
            // Calculate Fibonacci terms
            for ($i = 2; $i < $numTerms; $i++) {
                $fibSequence[$i] = $fibSequence[$i - 1] + $fibSequence[$i - 2];
            }

            return $fibSequence;
        }

        // Usage example:
        $numTerms = 10; // Number of Fibonacci terms to generate
        $fibonacciSequence = fibonacci($numTerms);

        // Display the Fibonacci sequence
        echo "The Fibonacci sequence up to $numTerms terms is: ";
        echo implode(", ", $fibonacciSequence);
        ?>
    </div>
</body>

</html>