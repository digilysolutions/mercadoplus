<footer class="iq-footer">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-6 text-right">
                        <p class="mb-md-0 text-center text-md-left text-secondary">
                            © <a class="text-primary" href="#">Mercado PLUS.</a> Todos los derechos reservados.
                            <a class="text-primary" href="https://digilysolutions.com">LY Digi-Solutions</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Backend Bundle JavaScript -->
<script src="{{ asset('admin/js/backend-bundle.min.js') }}"></script>

<!-- Table Treeview JavaScript -->
<script src="{{ asset('admin/js/table-treeview.js') }}"></script>

<!-- Chart Custom JavaScript -->
<script src="{{ asset('admin/js/customizer.js') }}"></script>

<!-- Chart Custom JavaScript -->
<script async src="{{ asset('admin/js/chart-custom.js') }}"></script>

<!-- app JavaScript -->
<script src="{{ asset('admin/js/app.js') }}"></script>
<script>
   document.addEventListener("DOMContentLoaded", function() {
    // Verifica si hay un menú colapsable
    const toggleItems = document.querySelectorAll('.data-toggle');

    toggleItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el enlace navegue inmediatamente
            const submenu = this.nextElementSibling; // El siguiente elemento que debe ser el submenú
            if (submenu) {
                submenu.classList.toggle('show'); // Alterna la clase 'show' del submenú
                const isActive = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isActive); // Cambia el estado aria-expanded
            }
        });
    });
});
</script>
