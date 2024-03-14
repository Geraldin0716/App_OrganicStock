<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla_id').DataTable({
                "language": {
                    "search": "Buscar:",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrados de _MAX_ registros totales)",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>

<script>
    function borrar(id){

        Swal.fire({
  title: "¿Desea borrar el registro?",
  showCancelButton: true,
  confirmButtonText: "Si",
}).then((result) => {
  if (result.isConfirmed) {
   window.location="index.php?txtID="+id;
  }
});

       
    }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>
</html>