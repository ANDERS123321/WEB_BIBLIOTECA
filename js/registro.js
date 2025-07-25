document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registroForm");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const nombre = document.getElementById("nombre").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    // Validar campos vacíos
    if (!nombre || !email || !password || !confirmPassword) {
      alert("Por favor, completa todos los campos.");
      return;
    }

    // Validar coincidencia de contraseñas
    if (password !== confirmPassword) {
      alert("Las contraseñas no coinciden.");
      return;
    }

    // Validar longitud mínima
    if (password.length < 6) {
      alert("La contraseña debe tener al menos 6 caracteres.");
      return;
    }

    // Aquí puedes agregar envío a servidor si deseas
    alert("¡Registro exitoso!");
    form.reset();
  });
});
