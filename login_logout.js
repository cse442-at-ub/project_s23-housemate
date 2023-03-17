// Function to handle form submission
function handleSubmit(event) {
    event.preventDefault();
  
    // Get form values
    const emailInput = document.querySelector("#email");
    const passwordInput = document.querySelector("#password");
  
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();
  
    // Check if email and password are not empty
    if (!email || !password) {
      alert("Please enter your email and password.");
      return;
    }
  
  
    // Clear input fields
    emailInput.value = "";
    passwordInput.value = "";
  
    alert("Login successful!");
  
    // Redirect to dashboard page
    window.location.href = "index.html";
  }
  
 
  
  // Attach event listener to form submit button
  const form = document.getElementById("regForm");
  form.addEventListener("submit", handleSubmit);
  
