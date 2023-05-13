<?php

$function_delete_princing = $CONFIGURATION['site_url'] .'backend/functions/princings/delete_princing';

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Listar precificação de serviços</h1>
        <button type="submit" class="btn btn-dark btn-sm px-3">
            <a href="<?=$CONFIGURATION['site_url'] . 'panel/princings/add-princing';?>" style="text-decoration:none;color:#fff">
                <i class="fas fa-plus"></i> Adicionar nova precificação de serviço
            </a>
        </button>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow col-lg-12">            
            <div class="card-body">
            
                <?php
                    if(isset($_SESSION['msg-delete-princing'])){
                        echo $_SESSION['msg-delete-princing'];
                        unset($_SESSION['msg-delete-princing']);
                    }                    
                    if (isset($_SESSION['msg-edit-princing'])) {
                        echo $_SESSION['msg-edit-princing'];
                        unset($_SESSION['msg-edit-princing']);
                    }
                ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="tabela-precificacao" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Valor</th>                                
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Valor</th>                                
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $sql_princings = "SELECT * FROM $tabela_servicos ORDER BY `id` DESC";
                            $query_princings = $mysqli->query($sql_princings) or die($mysqli->error . __LINE__);
                            $resultados = $query_princings->num_rows;

                            if ($resultados > 0) {
                                while ($row = $query_princings->fetch_assoc()) {                                    
                                    echo '
								    <tr>
									    <td>' . $row["id"] . '</td>
										<td>' . $row["nome"] . '</td>
										<td>' . formatReal($row["valor"]) . '</td>                                        
                                        <td>                                        
                                            <a class="btn btn-dark btn-sm px-3" href="'. $CONFIGURATION['site_url'] .'panel/princings/princing?id=' . $row["id"] . '&a=edit" style="text-decoration:none;color:#fff">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm px-3" data-href="'. $function_delete_princing . '?id=' . $row["id"] . '&a=delete" data-toggle="modal" data-target="#confirm-delete-princing">
                                            <i class="fas fa-trash-alt"></i></button>
                                        </td>
									</tr>
									';
                                }
                            } else {
                                echo '
                                <div class="w-full text-center p-t-25">
                                    <div class="alert alert-warning" role="alert">
                                        <strong>ATENÇÃO:</strong> Nenhum registro foi encontrado.
                                    </div>
                                </div>
							    ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>

    <!-- Content Row -->   

</div>