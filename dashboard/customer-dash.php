<?php
session_start();
// Check if the customer is not logged in
if (!isset($_SESSION["customerId"])) {
    // Redirect to the login page
    header("Location: ../login/login.php");
    exit(); // Terminate the script
}

$customerId = $_SESSION["customerId"];
require_once "../login/connection.php";

// Prepare a query to retrieve all orders for the current restaurant
$orderQuery = $connection->prepare("SELECT * FROM `orders` WHERE `customerId` = ?");
$orderQuery->bind_param("i", $customerId);
$orderQuery->execute();

// Get the result of the orders query
$orderResult = $orderQuery->get_result();
?>

<?php
// Prepare a query to retrieve customer name for the current customer
$customerQuery = $connection->prepare("SELECT `customerFname` FROM `customer` WHERE `customerId` = ?");
$customerQuery->bind_param("i", $customerId);
$customerQuery->execute();

// Get the result of the restaurant query
$customerResult = $customerQuery->get_result();
$customerData = $customerResult->fetch_assoc();
$customerFname = $customerData['customerFname'];
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
                        <div><button class="dash-buttons">Profile</button></div><br>
                        <div><button class="dash-buttons">Orders</button></div><br>
                        <div><button class="dash-buttons" onclick="window.location.href='../login/logout.php'">Logout</button></div><br>
                    </div>
                </aside>
            </div>




            <div class="right-dash">

                <div class="welcome">
                    <h2>Welcome to your dashboard, <?php echo $customerFname; ?>!</>
                </div>

                <!-- <div class="add-meal">
                    <button id="add-meal">Add Meal</button>
                </div>

                <div id="add-meal-div" class="popup">
                    <h3>Fill the form below to add a new meal to you menu</h3>

                    <form action="add-meal.php" method="POST" enctype="multipart/form-data">
                        <div class="popup-content">

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
                </div> -->

                <div class="meal-list">
                    <?php if ($orderResult->num_rows > 0) { ?>
                        <?php while ($order = $orderResult->fetch_assoc()) { ?>
                            <div class="meal">
                                <div><h3>Meal number: </h3><p><?php echo $order['orderId']; ?></p></div>
                                <div><h3>Description: </h3><p><?php echo $meal['mealDescription']; ?></p></div>
                                <div><h3>Price: </h3><p><?php echo $meal['mealPrice']; ?>€</p></div>
                                <div><img src="<?php echo 'uploads/' . $meal['mealImage']; ?>" alt="Meal Image" style="width: 250px;"></div>
                            </div><br><br>
                        <?php } ?>
                    <?php } else { ?>
                        <p>You currently have no orders.</p>
                    <?php } ?>
                </div>


                



            </div>
    </main>
    <?php include "../header-footer/footer.html" ?>
    <script src="../js/restau-dash.js"></script>
</body>

</html>