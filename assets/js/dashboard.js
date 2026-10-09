const logoutButton = document.getElementById("logoutBtn");
  if (logoutButton) {
    logoutButton.addEventListener("click", () => {

      // redirect to login 
      window.location.href = "login.html";
    });
  }

