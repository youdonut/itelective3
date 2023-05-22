<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <?php include 'includes/landingpage/head.php' ?>
    <title>Mang Inasal</title>
</head>

<body>
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">

            <?php include 'includes/landingpage/navbar.php' ?>

            <!-- Page content here -->
            <div class="hero min-h-screen hero-bg">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <div class="cup-wrap">
                        <div class="cup">
                            <img src="dist/img/landingpage/MI-PM1Paa-2019.webp" alt="cup">
                        </div>

                        <div class="smoke-wrap">
                            <img class="smoke" src="dist/img/landingpage/smoke.png" alt="smoke">
                        </div>
                        <div class="smoke-wrap">
                            <img class="smoke2" src="dist/img/landingpage/smoke.png" alt="smoke">
                        </div>
                        <div class="smoke-wrap">
                            <img class="smoke3" src="dist/img/landingpage/smoke.png" alt="smoke">
                        </div>
                    </div>
                    <div>
                        <h1 class="text-5xl text-center lg:text-start font-bold">The Grill Expert!</h1>
                        <p class="text-center lg:text-start py-6">Get your fill of the Philippines' finest grill with
                            Mang Inasal - serving smiles one plate at a time.</p>

                        <div class="flex flex-row justify-center lg:justify-start">
                            <button class="btn btn-accent">
                                <p class="text-base-100">ORDER NOW</p>
                            </button>
                            <button class="btn btn-ghost">VIEW MENU</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>

                <div class="container mx-auto py-16">

                    <div class="flex flex-wrap flex-col gap-7 justify-center items-stretch lg:flex-row ">
                        <div class="grow min-w-full">
                            <div class="flex flex-col justify-center items-center">
                                <h1 class="text-5xl font-bold text-center">Our Top Menu</h1>
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
                        $sql = "SELECT * FROM product WHERE product_rating >= 8 ORDER BY product_rating DESC LIMIT 5;";
                        if ($result = $pdo->query($sql)) {
                            if ($result->rowCount() > 0) {
                                while ($row = $result->fetch()) {
                                    ?>
                                    <div class="card glass card-compact rounded-none w-100 lg:w-60 lg:rounded-xl shadow-xl">
                                        <figure><img class="w-full" src="<?= $row['product_image']; ?>" alt="" /></figure>
                                        <div class="card-body">
                                            <h2 class="card-title">
                                                <?= $row['product_name']; ?>
                                            </h2>
                                            &nbsp;
                                            <div class="card-actions justify-end">
                                                <button class="btn btn-accent">
                                                    <p class="text-base-100">ORDER NOW</p>
                                                </button>
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

                        <!-- End of Featured Product -->
                        <div class="grow min-w-full">
                            <div class="flex flex-col justify-center items-center">
                                <a href="menu.php" class="btn btn-wide btn-outline">View More</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto  mb-4">

                <div class="card glass lg:card-side">
                    <figure class="lg:w-1/2"><img class="w-full h-full"
                            src="dist/img/landingpage/Mang-Inasal-National-Halo-Halo-Blowout_homepage-min-1.jpg"
                            alt="Album" /></figure>
                    <div class="w-full lg:w-1/2 card-body">
                        <h2 class="card-title text-error">SAVE THE DATE: APRIL 16 IS MANG INASAL NATIONAL HALO-HALO
                            BLOWOUT
                        </h2>
                        <div class="divider"></div>
                        <p>Mang Inasal, the country’s Grill Expert, is calling all halo-halo lovers to join the biggest
                            Halo-Halo...</p>
                        <div class="divider"></div>

                        <div class="card-actions justify-end">
                            <button class="btn btn-ghost">READ MORE</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container  mx-auto mb-4">
                <div class="carousel w-full rounded-xl">
                    <div id="slide1" class="carousel-item relative w-full">
                        <img src="dist/img/landingpage/Banner-min-egifts_1920x600-min-web-mobile.jpg" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#slide4" class="btn btn-circle">❮</a>
                            <a href="#slide2" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                    <div id="slide2" class="carousel-item relative w-full">
                        <img src="dist/img/landingpage/halo-halo-min.jpeg" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#slide1" class="btn btn-circle">❮</a>
                            <a href="#slide3" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                    <div id="slide3" class="carousel-item relative w-full">
                        <img src="dist/img/landingpage/MI-Proj-Harry-min-web-mobile.jpg" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#slide2" class="btn btn-circle">❮</a>
                            <a href="#slide4" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                    <div id="slide4" class="carousel-item relative w-full">
                        <img src="dist/img/landingpage/Sizzling-Liempo-Web-Carousel-min.jpg" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#slide3" class="btn btn-circle">❮</a>
                            <a href="#slide1" class="btn btn-circle">❯</a>
                        </div>
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