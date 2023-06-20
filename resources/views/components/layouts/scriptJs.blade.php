<script>
    // Obtener referencia al botón del menú móvil
const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');

// Obtener referencia al menú móvil
const mobileMenu = document.getElementById('mobile-menu');

// Agregar evento de clic al botón del menú móvil
mobileMenuButton.addEventListener('click', function() {
  // Alternar la clase 'hidden' en el menú móvil al hacer clic en el botón
  mobileMenu.classList.toggle('hidden');
});
// Obtener referencia al botón del menú de usuario
const userMenuButton = document.getElementById('user-menu-button');

// Obtener referencia al menú desplegable de usuario
const userMenu = document.querySelector('[aria-labelledby="user-menu-button"]');

// Agregar evento de clic al botón del menú de usuario
userMenuButton.addEventListener('click', function() {
  // Alternar la clase 'hidden' en el menú desplegable de usuario al hacer clic en el botón
  userMenu.classList.toggle('hidden');
});
</script>
