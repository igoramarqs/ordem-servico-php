    <script src="<?=$CONFIGURATION['site_url'] . 'vendor/jquery/jquery.min.js';?>"></script>
    <script src="<?=$CONFIGURATION['site_url'] . 'vendor/bootstrap/js/bootstrap.bundle.min.js';?>"></script>    
    <script src="<?=$CONFIGURATION['site_url'] . 'vendor/jquery-easing/jquery.easing.min.js';?>"></script>
    <script src="<?=$CONFIGURATION['site_url'] . 'js/main.min.js';?>"></script>

    <!-- PARA EXLUIR DIRETO DA TABELA -->
    <script>
        $('#confirm-delete-user').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#confirm-delete-customer').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#confirm-delete-order').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
        $('#confirm-delete-princing').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
    <!-- PARA EXLUIR DIRETO DA TABELA -->

    <!-- PARA TABELAS/GRÁFICOS -->
    <script src="<?= $CONFIGURATION['site_url'] . 'vendor/chart.js/Chart.min.js';?>"></script>
    <script src="<?= $CONFIGURATION['site_url'] . 'vendor/datatables/jquery.dataTables.min.js'; ?>"></script>
    <script src="<?= $CONFIGURATION['site_url'] . 'vendor/datatables/dataTables.bootstrap4.min.js'; ?>"></script>
    <script src="<?= $CONFIGURATION['site_url'] . 'js/demo/datatables-demo.js'; ?>"></script>    

    <script>
        $(document).ready(function() {
            $('#tabela-usuarios').dataTable({
                "language": {
                    "search": "Procurar:",
                    "sZeroRecords": "Nenhum registro encontrado.",
                    "sInfo": "Exibindo _START_ de _TOTAL_ registro(s)",
                    "sLengthMenu": "Exibir _MENU_ registros",
                    "sInfoEmpty": "Exibindo 0 registros de 0",
                    "paginate": {
				        "next": "Próximo",
                        "previous": "Anterior"
				    }   
                }                
            });
        });
        $(document).ready(function() {
            $('#tabela-clientes').dataTable({
                "language": {
                    "search": "Procurar:",
                    "sZeroRecords": "Nenhum registro encontrado.",
                    "sInfo": "Exibindo _START_ de _TOTAL_ registro(s)",
                    "sLengthMenu": "Exibir _MENU_ registros",
                    "sInfoEmpty": "Exibindo 0 registros de 0",
                    "paginate": {
				        "next": "Próximo",
                        "previous": "Anterior"
				    }   
                }                
            });
        });
        $(document).ready(function() {
            $('#tabela-os').dataTable({
                "language": {
                    "search": "Procurar:",
                    "sZeroRecords": "Nenhum registro encontrado.",
                    "sInfo": "Exibindo _START_ de _TOTAL_ registro(s)",
                    "sLengthMenu": "Exibir _MENU_ registros",
                    "sInfoEmpty": "Exibindo 0 registros de 0",
                    "paginate": {
				        "next": "Próximo",
                        "previous": "Anterior"
				    }   
                }                
            });
        });
        $(document).ready(function() {
            $('#tabela-precificacao').dataTable({
                "language": {
                    "search": "Procurar:",
                    "sZeroRecords": "Nenhum registro encontrado.",
                    "sInfo": "Exibindo _START_ de _TOTAL_ registro(s)",
                    "sLengthMenu": "Exibir _MENU_ registros",
                    "sInfoEmpty": "Exibindo 0 registros de 0",
                    "paginate": {
				        "next": "Próximo",
                        "previous": "Anterior"
				    }   
                }                
            });
        });
    </script>
    <!-- PARA TABELAS -->