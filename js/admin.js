const libros = [
  {
    id: 1,
    titulo: "El Principito",
    autor: "Antoine de Saint-Exupéry",
    descripcion: "Un clásico sobre un niño que viaja por el universo."
  },
  {
    id: 2,
    titulo: "1984",
    autor: "George Orwell",
    descripcion: "Distopía sobre el control totalitario."
  }
];

const tabla = document.getElementById("tablaLibros");
const modal = document.getElementById("modalLibro");
const form = document.getElementById("formLibro");
const modalTitulo = document.getElementById("modalTitulo");

function renderTabla() {
  tabla.innerHTML = "";
  libros.forEach((libro) => {
    tabla.innerHTML += `
      <tr>
        <td class="px-4 py-2">${libro.titulo}</td>
        <td class="px-4 py-2">${libro.autor}</td>
        <td class="px-4 py-2">${libro.descripcion}</td>
        <td class="px-4 py-2 space-x-2">
          <button onclick="editarLibro(${libro.id})" class="text-yellow-600 hover:underline">Editar</button>
          <button onclick="eliminarLibro(${libro.id})" class="text-red-600 hover:underline">Eliminar</button>
        </td>
      </tr>
    `;
  });
}

document.getElementById("btnAgregar").addEventListener("click", () => {
  form.reset();
  document.getElementById("libroId").value = "";
  modalTitulo.textContent = "Agregar Libro";
  modal.classList.remove("hidden");
});

document.getElementById("cancelar").addEventListener("click", () => {
  modal.classList.add("hidden");
});

function editarLibro(id) {
  const libro = libros.find((l) => l.id === id);
  document.getElementById("libroId").value = libro.id;
  document.getElementById("titulo").value = libro.titulo;
  document.getElementById("autor").value = libro.autor;
  document.getElementById("descripcion").value = libro.descripcion;
  modalTitulo.textContent = "Editar Libro";
  modal.classList.remove("hidden");
}

function eliminarLibro(id) {
  if (confirm("¿Estás seguro de eliminar este libro?")) {
    const index = libros.findIndex((l) => l.id === id);
    libros.splice(index, 1);
    renderTabla();
  }
}

renderTabla();
