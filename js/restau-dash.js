// const addMealButton = document.getElementById("add-meal");
// const addMealForm = document.getElementById("add-meal-div");

// // Add click event listeners to the buttons
// addMealButton.addEventListener("click", () => {
//     addMealForm.style.display = "flex";
    
// });





const addMealButton = document.getElementById("add-meal");
const addMealForm = document.getElementById("add-meal-div");
const closePopupButton = document.getElementById("close-popup");

// Function to show the popup
function showPopup() {
    addMealForm.style.display = "flex";
}

// Function to close the popup
function closePopup() {
    addMealForm.style.display = "none";
}

// Add click event listeners to the buttons
addMealButton.addEventListener("click", showPopup);
closePopupButton.addEventListener("click", closePopup);