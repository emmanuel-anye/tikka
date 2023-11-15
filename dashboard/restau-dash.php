<?php
session_start();

// Check if the restaurant is not logged in
if (!isset($_SESSION["restaurantId"])) {
    // Redirect to the login page
    header("Location: ../login/login.php");
    exit(); // Terminate the script
}

$restaurantId = $_SESSION["restaurantId"];
require_once "../login/connection.php";

// Prepare a query to retrieve all meals for the current restaurant
$mealQuery = $connection->prepare("SELECT * FROM `meal` WHERE `restaurantId` = ?");
$mealQuery->bind_param("i", $restaurantId);
$mealQuery->execute();

// Get the result of the meal query
$mealResult = $mealQuery->get_result();
?>

<?php
// Prepare a query to retrieve restaurant name for the current restaurant
$restaurantQuery = $connection->prepare("SELECT `restaurantName` FROM `restaurant` WHERE `restaurantId` = ?");
$restaurantQuery->bind_param("i", $restaurantId);
$restaurantQuery->execute();

// Get the result of the restaurant query
$restaurantResult = $restaurantQuery->get_result();
$restaurantData = $restaurantResult->fetch_assoc();
$restaurantName = $restaurantData['restaurantName'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>

    <?php include "../header-footer/header.php" ?>

    <main>
        <div class="dash-container">
            <div class="left-dash">
                <aside>
                    <div>
                        <div><button class="dash-buttons">Menus</button></div><br>
                        <div><button class="dash-buttons">Orders</button></div><br>
                        <div><button class="dash-buttons" onclick="window.location.href='../login/logout.php'">Logout</button></div><br>
                    </div>
                </aside>
            </div>




            <div class="right-dash">

                <div class="welcome">
                    <h2>Welcome to your dashboard, <?php echo $restaurantName; ?>!</>
                </div>

                <div class="add-meal">
                    <button id="add-meal">Add Meal</button>
                </div>

                <div id="add-meal-div" class="popup">


                    <form action="add-meal.php" method="POST" enctype="multipart/form-data">
                        <div class="popup-content">
                            <h3>Fill the form below to add a new meal to you menu</h3>

                            <div>
                                <label for="mealName">Meal Name:</label>
                                <input type="text" name="mealName" required><br>
                            </div>

                            <div>
                                <label for="mealPrice">Meal Price:</label>
                                <input type="number" name="mealPrice" step="0.01" required><br>
                            </div>

                            <div>
                                <label for="mealDescription">Meal Description:</label>
                                <textarea name="mealDescription" rows="4" required></textarea><br>
                            </div>

                            <div>
                                <label for="mealImage">Meal Image:</label>
                                <input type="file" name="mealImage" accept="image/*" required><br>
                            </div>

                            <div>
                                <input type="submit" value="Add Meal">
                            </div> <br><br>
                            <button id="close-popup">Close</button>
                        </div>
                    </form>
                </div>

                <div class="meal-list">
                    <?php if ($mealResult->num_rows > 0) { ?>
                        <?php while ($meal = $mealResult->fetch_assoc()) { ?>
                            <div class="meal">
                                <div>
                                    <h3>Meal name: </h3>
                                    <p><?php echo $meal['mealName']; ?></p>
                                </div>
                                <div>
                                    <h3>Description: </h3>
                                    <p><?php echo $meal['mealDescription']; ?></p>
                                </div>
                                <div>
                                    <h3>Price: </h3>
                                    <p><?php echo $meal['mealPrice']; ?>€</p>
                                </div>
                                <div><img src="<?php echo 'uploads/' . $meal['mealImage']; ?>" alt="Meal Image" style="width: 250px;"></div>
                            </div><br><br>
                        <?php } ?>
                    <?php } else { ?>
                        <p>You currently have no meals added.</p>
                    <?php } ?>
                </div>






            </div>
    </main>
    <?php include "../header-footer/footer.html" ?>
    <script src="../js/restau-dash.js"></script>
</body>

</html>