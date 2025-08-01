<!DOCTYPE html>
<html lang="es" class="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel Administrador - Biblioteca</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 dark:text-white min-h-screen">
  
  <!-- Header -->
  <header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
      <h1 class="text-2xl font-bold">📚 Panel de Administración</h1>
      <a href="index_user.html" class="hover:underline text-sm">← Volver al Inicio</a>
    </div>
  </header>

  <!-- Sección principal -->
  <main class="p-4 sm:p-8 max-w-6xl mx-auto">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
      <h2 class="text-2xl font-semibold text-blue-800 dark:text-blue-300">Gestión de Libros</h2>
      <button id="btnAgregar"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition w-full sm:w-auto">
        ➕ Agregar Libro
      </button>
    </div>

    <!-- Tabla de libros -->
    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded shadow">
      <table class="min-w-full table-auto text-sm">
        <thead class="bg-blue-100 dark:bg-blue-950 text-gray-800 dark:text-gray-200">
          <tr class="text-left">
            <th class="px-4 py-2">Título</th>
            <th class="px-4 py-2">Autor</th>
            <th class="px-4 py-2">Descripción</th>
            <th class="px-4 py-2">Acciones</th>
          </tr>
        </thead>
        <tbody id="tablaLibros" class="text-gray-700 dark:text-gray-100">
          <!-- Libros se llenan con JS -->
        </tbody>
      </table>
    </div>
  </main>

  <!-- Modal -->
  <div id="modalLibro"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden px-4">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-md">
      <h3 id="modalTitulo" class="text-xl font-bold mb-4 dark:text-white">Agregar Libro</h3>
      <form id="formLibro" class="space-y-4" method="post" action="libros.php">
        <input type="hidden" id="libroId" />

        <div>
          <label class="block text-sm font-medium dark:text-gray-300">Título</label>
          <input 
            type="text" 
            id="titulo" 
            name="titulo"
            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            required />
        </div>

        <div>
          <label class="block text-sm font-medium dark:text-gray-300">Autor</label>
          <input 
            type="text"  
            id="autor" 
            name="autor"
            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            required />
        </div>

        <div>
          <label class="block text-sm font-medium dark:text-gray-300">Descripción</label>
          <textarea 
            id="descripcion" 
            name="descripcion"
            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            required></textarea>
        </div>

        <div class="flex justify-end gap-2">
          <button type="button" id="cancelar"
            class="text-sm text-gray-600 dark:text-gray-300 hover:underline">Cancelar</button>
          <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        </div>
      </form>
    </div>
  </div>

  <script src="../js/admin.js"></script>
</body>

</html>
