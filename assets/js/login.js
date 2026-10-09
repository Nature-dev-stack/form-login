document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");
  const alertBox = document.getElementById("loginAlert");

  document.querySelectorAll(".password-toggle").forEach(button => {
    button.addEventListener("click", () => {
      const input = document.getElementById(button.dataset.target);
      if (!input) return;
      input.type = input.type === "password" ? "text" : "password";
      
    });
  });

  form.addEventListener("submit", event => {
    event.preventDefault();

    const email = document.getElementById("loginEmail").value.trim();
    const password = document.getElementById("loginPassword").value;

    alertBox.className = "alert hidden";
    alertBox.textContent = "";

    if (!email) {
      alertBox.className = "alert alert-danger";
      alertBox.textContent = "Please enter your email address.";
      return;
    }

    // emali validity 
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      alertBox.className = "alert alert-danger";
      alertBox.textContent = "Please enter a valid email address.";
      return;
    }

    if (!password) {
      alertBox.className = "alert alert-danger";
      alertBox.textContent = "Please enter your password.";
      return;
    }

    // redirecting to the dashboard 
    // window.location.href = "dashboard.html";
  });
});
