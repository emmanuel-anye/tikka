const customerButton = document.getElementById("customer-button");
const restaurantButton = document.getElementById("restaurant-button");
const customerForm = document.getElementById("customer-form");
const restaurantForm = document.getElementById("restaurant-form");

// Add click event listeners to the buttons
customerButton.addEventListener("click", () => {
    customerForm.style.display = "flex";
    restaurantForm.style.display = "none";
    customerButton.style.backgroundColor = "#F5F5F5";
    restaurantButton.style.backgroundColor = "";
});

restaurantButton.addEventListener("click", () => {
    restaurantForm.style.display = "flex";
    customerForm.style.display = "none";
    restaurantButton.style.backgroundColor = "#F5F5F5";
    customerButton.style.backgroundColor = "transparent";

});



const customerPassword = document.getElementById("customer-password");
const customerRetypedPassword = document.getElementById("customer-cpassword");
const restaurantPassword = document.getElementById("restaurant-password");
const restaurantRetypedPassword = document.getElementById("restaurant-cpassword");

let customerPasswordValid = false;
let customerRetypedPasswordValid = false;
let restaurantPasswordValid = false;
let restaurantRetypedPasswordValid = false;


customerRetypedPassword.addEventListener("blur", () => {
    if (customerRetypedPassword.value === customerPassword.value) {
        customerRetypedPasswordValid = true;
        customerRetypedPassword.classList.remove("error");
    } else {
        customerRetypedPasswordValid = false;
        customerRetypedPassword.classList.add("error");
    }

});

restaurantRetypedPassword.addEventListener("blur", () => {
    if (restaurantRetypedPassword.value === restaurantPassword.value) {
        restaurantRetypedPasswordValid = true;
        restaurantRetypedPassword.classList.remove("error");
    } else {
        restaurantRetypedPasswordValid = false;
        restaurantRetypedPassword.classList.add("error");
    }

});


