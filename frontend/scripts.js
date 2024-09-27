const registerButton = document.getElementById("register-button"); // Correct method
const loginButton = document.getElementById("sign-in"); // Correct method 

registerButton.addEventListener("click", function() {
    // Use window.location.href to navigate to another HTML page
    window.location.href = './pages/registerP.html'; // Replace with the correct path
});

loginButton.addEventListener("click", function() {
    // Use window.location.href to navigate to another HTML page
    window.location.href = './pages/login.html'; // Replace with the correct path
});
