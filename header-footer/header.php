<link rel="stylesheet" href="../css/header-footer.css">

<header>
    <div id="header">
        <div class="headerbar">
            <div id="logo"><a href="../pages/index.php"> <img width="300px" src="../images/logo.png" alt="Home"></a></div>

            <div class="menu">
                <button id="headerbutton1"><a href="../login/login.php">LOGIN</a></button>
                <button id="headerbutton2"><a href="../pages/registration-form.php">REGISTER</a></button><br>
                <?php
                
                if (isset($_SESSION["customerId"]) && !empty($_SESSION["customerId"])) {
            // Assuming you have a database connection established
            $customerId = $_SESSION["customerId"];
            $customerQuery = $connection->query("SELECT `customerFname` FROM `customer` WHERE `customerId` = $customerId");
            
            // Check if the query was successful and fetch the customer's name
            if ($customerQuery) {
                $customerData = $customerQuery->fetch_assoc();
                $customerName = $customerData['customerFname'];
                echo '<div class="user-info">Welcome, ' . $customerName . '!  <button id="logout-button"><a href="../login/logout.php">LOGOUT</a></button></div>';
            }
        }
        ?>
            </div>
        </div>

        <div class="menubar">
            <nav class="menu">
                <a href="../pages/index.php">Home</a>
                <a href="../pages/restaurants.php">Restaurants</a>
                <a href="../pages/about.php">About Us</a>
                <a href="../pages/cart.php">Cart</a>
            </nav>
        </div>
    </div>
</header>