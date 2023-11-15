const customerLoginButton = document.getElementById("customer-login-button");
const restaurantLoginButton = document.getElementById("restaurant-login-button");
const customerLoginForm = document.getElementById("login-form");
const restaurantLoginForm = document.getElementById("restau-login");

// Add click event listeners to the buttons
customerLoginButton.addEventListener("click", () => {
    customerLoginForm.style.display = "flex";
    restaurantLoginForm.style.display = "none";
    customerLoginButton.style.backgroundColor = "#F5F5F5";
    restaurantLoginButton.style.backgroundColor = "";
});

restaurantLoginButton.addEventListener("click", () => {
    restaurantLoginForm.style.display = "flex";
    customerLoginForm.style.display = "none";
    restaurantLoginButton.style.backgroundColor = "#F5F5F5";
    customerLoginButton.style.backgroundColor = "transparent";

});





