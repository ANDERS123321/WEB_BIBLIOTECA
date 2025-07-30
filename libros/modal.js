// Cargar el HTML del modal desde modal.html
fetch("modal.html")
  .then(res => res.text())
  .then(html => {
    document.getElementById("modalContainer").innerHTML = html;
  });

const libros = [
  {
    titulo: "El Principito",
    autor: "Antoine de Saint-Exupéry",
    descripcion: "Un clásico que mezcla filosofía y fantasía sobre un niño que viaja por el universo.",
    imagen: "../assets/img/el_principito.webp",
  },
  {
    titulo: "Cien Años de Soledad",
    autor: "Gabriel García Márquez",
    descripcion: "Una obra maestra del realismo mágico que narra la historia de la familia Buendía.",
    imagen: "../assets/img/cien_anos_soledad.jpg",
  },
  {
    titulo: "1984",
    autor: "George Orwell",
    descripcion: "Una novela distópica sobre el control totalitario y la vigilancia extrema.",
    imagen: "../assets/img/1984.jpg",
  },
];

function abrirModal(index) {
  const libro = libros[index];
  const modal = document.getElementById("modalLibro");

  if (modal) {
    document.getElementById("modalTitulo").textContent = libro.titulo;
    document.getElementById("modalAutor").textContent = libro.autor;
    document.getElementById("modalDescripcion").textContent = libro.descripcion;
    document.getElementById("modalImagen").src = libro.imagen;

    modal.classList.remove("hidden");
    modal.classList.add("flex");
  }
}

function cerrarModal() {
  const modal = document.getElementById("modalLibro");
  if (modal) {
    modal.classList.remove("flex");
    modal.classList.add("hidden");
  }
}
