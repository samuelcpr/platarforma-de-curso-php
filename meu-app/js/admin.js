document.addEventListener("DOMContentLoaded", function () {
  const registerForm = document.getElementById("registerForm");
  const loginForm = document.getElementById("loginForm");

  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const username = document.getElementById("registerUsername").value;
      const password = document.getElementById("registerPassword").value;

      fetch("register.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ username, password }),
      })
        .then((response) => response.json())
        .then((data) => {
          const message = document.getElementById("registerMessage");
          message.textContent = data.message;
        });
    });
  }

  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const username = document.getElementById("loginUsername").value;
      const password = document.getElementById("loginPassword").value;

      fetch("login.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ username, password }),
      })
        .then((response) => response.json())
        .then((data) => {
          const message = document.getElementById("loginMessage");
          message.textContent = data.message;
          if (data.success) {
            window.location.href = "Home.php"; // Redireciona para index.php após o login
          }
        });
    });
  }
});
