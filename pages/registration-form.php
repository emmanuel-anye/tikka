<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../css/registration-form.css">
</head>

<body>
    <?php include "../header-footer/header.php" ?>

    <main>
        <div id="entire-registration-form">


            <div id="customer-main-form">
                <div id="forms-title">
                    <div>
                        <ul>
                            <li id="customer-button">CUSTOMER</li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li id="restaurant-button">RESTAURANT</li>
                        </ul>
                    </div>
                </div>

                <form action="../login/customer_signup.php" autocomplete="on" method="post">

                    <div id="customer-form">

                        <div class="form-fields">
                            <label class="required" for="customer-fname">First Name</label><br>
                            <input class="input-box" type="text" name="customerFname" id="customer-fname" placeholder="First Name" required><br><br>
                            <label class="required" for="customer-lname">Last Name</label><br>
                            <input class="input-box" type="text" name="customerLname" id="customer-lname" placeholder="Last Name" required><br><br>
                        </div>

                        <div class="form-fields">
                            <label class="required" for="customer-emailaddress">Email Address</label><br>
                            <input class="input-box" type="email" name="customerEmail" id="customer-emailaddress" required><br><br>
                            <label class="required" for="customer-phonenumber">Phone Number</label><br>
                            <input class="input-box" type="tel" name="customerPhonenumber" id="customer-phonenumber" required><br><br>
                        </div>


                        <div class="form-fields">
                            <label class="required" for="customer-password">Password</label><br>
                            <input class="input-box" type="password" name="customerPassword" id="customer-password" required><br><br>
                            <label class="required" for="customer-cpassword">Confirm Password</label><br>
                            <input class="input-box" type="password" name="customerCpassword" id="customer-cpassword" required><br><br>
                        </div>

                        <div>
                            <input type="checkbox" name="customer-agreement" id="">
                            <label for="customer-agreement">I Agree To The Terms And Conditions And Privacy Policy</label><br><br>
                            <input type="submit" value="Register" id="customer-register-button">

                        </div>
                    </div>

                </form>


                <form action="../login/restau_signup.php" autocomplete="on" method="post">
                    <div id="restaurant-form">


                        <div class="form-fields">

                            <label class="required" for="owner-fname">Owner First Name</label><br>
                            <input class="input-box" type="text" name="ownerFname" id="owner-fname" placeholder="First Name" required><br><br>
                            <label class="required" for="owner-lname">Owner Last Name</label><br>
                            <input class="input-box" type="text" name="ownerLname" id="owner-lname" placeholder="Last Name" required><br><br>
                        </div>

                        <div class="form-fields">
                            <label class="required" for="restaurant-name">Restaurant Name</label><br>
                            <input class="input-box" type="text" name="restaurantName" id="restaurant-name" required><br><br>
                            <label class="required" for="restaurant-email">Email Address</label><br>
                            <input class="input-box" type="email" name="restaurantEmail" id="restaurant-email" required><br><br>

                        </div>

                        <div class="form-fields">
                            <label class="required" for="restaurant-phonenumber">Phone Number</label><br>
                            <input class="input-box" type="tel" name="restaurantPhonenumber" id="restaurant-phonenumber" required><br><br>
                            <label class="required" for="restaurant-address">City</label><br>
                            <input class="input-box" type="text" name="restaurantAddress" id="restaurant-address" required><br><br>
                        </div>

                        <div class="form-fields">
                            <label class="required" for="restaurant-password">Password</label><br>
                            <input class="input-box" type="password" name="restaurantPassword" id="restaurant-password" required><br><br>
                            <label class="required" for="restaurant-cpassword">Confirm Password</label><br>
                            <input class="input-box" type="password" name="restaurantCpassword" id="restaurant-cpassword" required><br><br>
                        </div>
                        <div>
                            <input type="checkbox" name="customer-agreement" id="">
                            <label for="customer-agreement">I Agree To The Terms And Conditions And Privacy Policy</label><br><br>
                            <input type="submit" value="Register" id="customer-register-button">
                        </div>


                    </div>
                </form>




                <div id="register-form-login">
                    <h3>Already a member?</h3>
                    <p>Login now and start tracking your live orders as it reaches you. Experience the next level of
                        food ordering.</p>
                    <button><a id="form-loginnow" href="../user-login/login.php">Login Now!</a></button>
                </div><br><br>
            </div>

        </div>





    </main>

    <?php include "../header-footer/footer.html" ?>

    <script src="../js/registration-form.js"></script>
</body>

</html>