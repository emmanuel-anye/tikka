<?php 
session_start();
include "../login/connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php include "../header-footer/header.php" ?>


    <main>
        <section>
            <div class="homecover">
                <div class="homecoverleft">
                    <h1>WELCOME TO</h1>
                    <h1>TIKAA FOOD DELIVERY</h1>
                    <h4>Select a Restaurant and order for us to deliver while it's still hot.</h3>

                </div>
                <div class="homecoverright">
                    <img id="cover-pic" src="../images/cover 1.png" alt="">
                </div>
            </div>
        </section>
        <section class="sections">

            <div id="icons-section">
                <div class="icon-divs">
                    <img class="icons" src="../images/pizza-icon.png" alt="phone icon"><br>
                    <h4>Best Quality</h4>
                    <p>We provide the best quality food in the market</p>
                </div>
                <div class="icon-divs">
                    <img class="icons" src="../images/chef-cap.png" alt="restau icon"><br>
                    <h4>Master Chef</h4>
                    <p>Our master chefs have some magic in their hands</p>
                </div>
                <div class="icon-divs">
                    <img class="icons" src="../images/food-plate.png" alt="delivery icon"><br>
                    <h4>Taste Food</h4>
                    <p>We are known for our tasty food in the market</p>
                </div>
            </div>

        </section>

        <section>
            <div id="banners">
                <div id="snacks">
                    <div>
                        Snacks
                    </div>
                    <div>
                        <h3>Fried Chicken <br>
                            & Fries</h3>
                    </div>
                    <div><a href="">Order Now</a></div>
                </div>

                <div id="seafood">
                    <div>
                        Seafood
                    </div>
                    <div>
                        <h3>Delicious Exotic <br>
                            Seafood</h3>
                    </div>
                    <div><a href="">Order Now</a></div>
                </div>
            </div>
        </section>

        <section class="meals-section">
            <h2>Featured Meals</h2>

            <div class="meal-cards">
                <?php
                // Assuming you have a database connection established
                $featuredMealsQuery = $connection->query("SELECT * FROM `meal` ORDER BY RAND() LIMIT 4");

                while ($meal = $featuredMealsQuery->fetch_assoc()) {
                    // Fetch restaurant name for the current meal
                    $restaurantId = $meal['restaurantId'];
                    $restaurantQuery = $connection->query("SELECT `restaurantName` FROM `restaurant` WHERE `restaurantId` = $restaurantId");
                    $restaurantData = $restaurantQuery->fetch_assoc();
                    $restaurantName = $restaurantData['restaurantName'];
                ?>
                    <div class="meal-card">
                        <h3><?php echo $meal['mealName']; ?></h3>
                        <p>Restaurant: <?php echo $restaurantName; ?></p>
                        <img class="meal-image" src="<?php echo '..//dashboard/uploads/' .  $meal['mealImage']; ?>" alt="<?php echo $meal['mealName']; ?>">
                        <p>Description: <?php echo $meal['mealDescription']; ?></p>
                        <p>Price: $<?php echo $meal['mealPrice']; ?></p>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                <?php } ?>
            </div>
        </section>
    </main>


    <?php include "../header-footer/footer.html" ?>


    <script src="../cart.js"></script>
</body>

</html>