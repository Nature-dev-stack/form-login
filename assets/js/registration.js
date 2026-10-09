document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registerForm");
  const alertBox = document.getElementById("registerAlert");
  // const password = document.getElementById("registerPassword");
  // const strengthBar = document.getElementById("strengthBar");
  // const strengthText = document.getElementById("strengthText");

  document.querySelectorAll(".password-toggle").forEach(button => {
    button.addEventListener("click", () => {
      const input = document.getElementById(button.dataset.target);
      if (!input) return;
      // input.type = input.type === "password" ? "text" : "password";
      if (input.type === "password") {
        button.innerHTML = `<i class="fa-regular fa-eye"></i>`
        input.type = "text"
      } else {
        button.innerHTML = `<i class="fa-regular fa-eye-slash"></i>`
        input.type = "password"
      }
    });
  });

  // password strength 
  // password.addEventListener("input", () => {
  //   const value = password.value;
  //   let score = 0;
  //   if (value.length >= 8) score++;
  //   if (/[A-Z]/.test(value)) score++;
  //   if (/[0-9]/.test(value)) score++;
  //   if (/[^A-Za-z0-9]/.test(value)) score++;

  //   // turn the score into a visual 
  //   const widths = ["0%", "25%", "50%", "75%", "100%"];
  //   const labels = [
  //     "Use at least 8 characters",
  //     "Weak password",
  //     "Fair password",

  //     "Good password",
  //     "Strong password"
  //   ];

  //   strengthBar.style.width = widths[score];
  //   strengthText.textContent = labels[score];
  // });

  // form.addEventListener("submit", event => {
  //   event.preventDefault();

  //   const name = document.getElementById("fullName").value.trim();
  //   const email = document.getElementById("registerEmail").value.trim();
  //   const pass = password.value;
  //   const confirm = document.getElementById("confirmPassword").value;
  //   const terms = document.getElementById("terms").checked;

  //   alertBox.className = "alert hidden";
  //   alertBox.textContent = "";

  //   if (name.length < 2) {
  //     alertBox.className = "alert alert-danger";
  //     alertBox.textContent = "Please enter your full name.";
  //     return;
  //   }

  //   if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
  //     alertBox.className = "alert alert-danger";
  //     alertBox.textContent = "Please enter a valid email address.";
  //     return;
  //   }

  //   if (pass.length < 8) {
  //     alertBox.className = "alert alert-danger";
  //     alertBox.textContent = "Your password must contain at least 8 characters.";
  //     return;
  //   }

  //   if (pass !== confirm) {
  //     alertBox.className = "alert alert-danger";
  //     alertBox.textContent = "The passwords do not match.";
  //     return;
  //   }

  //   if (!terms) {
  //     alertBox.className = "alert alert-danger";
  //     alertBox.textContent = "Please accept the terms to continue.";
  //     return;
  //   }

  //   // redirect to login 
  //   // window.location.href = "login.html";
  // });
});
