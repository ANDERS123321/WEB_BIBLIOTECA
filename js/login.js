document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();

  if (email === "" || password === "") {
    alert("Por favor, completa todos los campos.");
    return;
  }

  // Simulación de login (sin backend)
  if (email === "123@biblioteca.com" && password === "123456") {
    alert("Inicio de sesión exitoso ✅");
    // Redireccionar o abrir página principal
    window.location.href = "../index_admin.html";
  } else {
    alert("Correo o contraseña incorrectos ❌");
  }
});
