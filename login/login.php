<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <?php include "../header-footer/header.php" ?>

    <main><br><br>
        <div id="main-container">
            <div id="forms-title">
                <h3>Sign in as:</h3>
            </div>

            <div id="login-title">
                <div>
                    <ul>
                        <li id="customer-login-button">CUSTOMER</li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li id="restaurant-login-button">RESTAURANT</li>
                    </ul>
                </div>
            </div><br><br>


            <form action="../login/log-me-in.php" autocomplete="on" method="post">

                <div id="login-form">

                    <div>
                        <label class="required" for="customer-emailaddress">Email Address</label><br>
                        <input class="input-box" type="email" name="email" id="customer-emailaddress" required><br><br>
                    </div>

                    <div>
                        <label class="required" for="customer-password">Password</label><br>
                        <input class="input-box" type="password" name="password" id="customer-password" required><br><br>
                    </div>

                    <div>
                        <button class="sign-buttons" type="submit">Sign in</button>
                    </div> <br><br>
                </div>

            </form>



            <form action="../login/restau_login.php" autocomplete="on" method="post">
                <div id="restau-login">

                    <div>
                        <label class="required" for="customer-emailaddress">Email Address</label><br>
                        <input class="input-box" type="email" name="email" id="customer-emailaddress" required><br><br>
                    </div>

                    <div>
                        <label class="required" for="customer-password">Password</label><br>
                        <input class="input-box" type="password" name="password" id="customer-password" required><br><br>
                    </div>

                    <div>
                        <button class="sign-buttons" type="submit">Sign in</button>
                    </div> <br><br>
                </div>


            </form>


            <div id="register-form-login">
                <h3>Not yet a member?</h3>
                <p>Signup now and start tracking your live orders as it reaches you. Experience the next level of
                    food ordering.</p>
                <button class="sign-buttons"><a id="form-signup" href="../pages/registration-form.php">Signup Now!</a></button>
            </div>
        </div>

    </main>

    <?php include "../header-footer/footer.html" ?>
    <script src="../js/login.js"></script>
</body>

</html>