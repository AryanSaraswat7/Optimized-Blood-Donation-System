// Toggle the display of the register section.
function toggleRegisterSection() {
    var registerSection = document.querySelector(".register-section");
    if (registerSection.style.display === "none") {
        registerSection.style.display = "block";
    } else {
        registerSection.style.display = "none";
    }
}

// Add an event listener to the login button.
document.querySelector(".login-form button").addEventListener("click", toggleRegisterSection);
