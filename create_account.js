const users = new Map(); // Hashmap to store username and password

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault();

  // Get form values
  const emailInput = document.querySelector("#email");
  const usernameInput = document.querySelector("#username");
  const passwordInput = document.querySelector("#password");
  const confirmPasswordInput = document.querySelector("#confirm-password");

  const email = emailInput.value.trim();
  const username = usernameInput.value.trim();
  const password = passwordInput.value.trim();
  const confirmPassword = confirmPasswordInput.value.trim();

  // Check if password and confirm password match
  if (password !== confirmPassword) {
    alert("Passwords do not match. Please try again.");
    return;
  }

  // Check if the password follows the security contraints
  //if (!isPasswordStrong) {
   // alert("Your password is not strong enough. Please choose a stronger password that does not contain your username, and must include at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*(),.?\":{}|<>), and must be at least 8 characters long.");
    //return;
  //}

  // Check if username is unique
  if (users.has(username)) {
    alert("Username is already taken. Please choose a different username.");
    return;
  }

  // Store username and password in hashmap
  users.set(username, password);

  // Clear input fields
  emailInput.value = "";
  usernameInput.value = "";
  passwordInput.value = "";
  confirmPasswordInput.value = "";

  alert("Account created successfully!");

  // Redirect to login page
  window.location.href = "account_created.html";
}

// Function to check if a password is strong enough
function isStrongPassword(username, password) {
  // Regular expressions to check if the password meets certain criteria
  const hasUppercase = /[A-Z]/.test(password);
  const hasLowercase = /[a-z]/.test(password);
  const hasNumber = /\d/.test(password);
  const hasUsername = !username || !password.toLowerCase().includes(username.toLowerCase());
  const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);
 
  // Check if the password meets all the criteria and does not contain the username
  const isStrong = hasUppercase && hasLowercase && hasNumber && hasSpecialChar && password.length >= 8 && hasUsername;

  return isStrong;
}

// Attach event listener to form submit button
const form = document.getElementById("regForm");
form.addEventListener("submit", handleSubmit);
