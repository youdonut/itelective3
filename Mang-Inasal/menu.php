<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <?php include 'includes/landingpage/head.php' ?>
    <title>Menu | Mang Inasal</title>
</head>

<body>
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">

            <?php include 'includes/landingpage/navbar.php' ?>

            <!-- Page content here -->
            <div>

                <div class="container mx-auto py-16">

                    <div class="flex flex-wrap flex-col gap-7 justify-center items-stretch lg:flex-row ">
                        <div class="grow min-w-full">
                            <div class="flex flex-col justify-center items-center">
                                <h1 class="text-5xl font-bold">Menu</h1>
                                <p class="text-center px-6 pt-6">Discover the rich and flavorful traditions of the
                                    Philippines with Mang Inasal - the Grill Expert. From our succulent chicken to our
                                    savory sauces, every bite is a celebration of our country's unique and vibrant
                                    cuisine. Come sizzle with us and experience the taste of the Philippines, only at
                                    Mang Inasal.</p>

                            </div>
                        </div>
                        <!-- Featured Product -->

                        <?php
                        require_once "config.php";
                        $sql = "SELECT * FROM product ORDER BY product_rating ASC;";
                        if ($result = $pdo->query($sql)) {
                            if ($result->rowCount() > 0) {
                                while ($row = $result->fetch()) {
                                    ?>
                                    <div class="card glass card-compact rounded-none w-100 lg:w-60 lg:rounded-xl shadow-xl">
                                        <figure><img class="w-full" src="<?= $row['product_image']; ?>" alt="" /></figure>
                                        <div class="card-body">
                                            <h2 class="card-title">
                                                ₱
                                                <?= $row['product_price']; ?>
                                            </h2>
                                            <p>
                                                <?= $row['product_name']; ?>
                                            </p>
                                            <div class="card-actions justify-end">
                                                <button class="btn btn-outline">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                unset($result);
                            } else {
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        // Close connection
                        unset($pdo);

                        ?>

                    </div>
                </div>
            </div>
            <!--Footer-->
            <?php include 'includes/landingpage/footer.php' ?>


        </div>

        <?php include 'includes/landingpage/drawer.php' ?>
    </div>


</body>

</html>