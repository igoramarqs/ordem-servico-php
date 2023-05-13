<?php

$function_delete_user = $CONFIGURATION['site_url'] .'backend/functions/users/delete_user';

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Listar usuários</h1>
        <button type="submit" class="btn btn-dark btn-sm px-3">
            <a href="<?=$CONFIGURATION['site_url'] . 'panel/users/add-user';?>" style="text-decoration:none;color:#fff">
                <i class="fas fa-plus"></i> Adicionar novo usuário
            </a>
        </button>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow col-lg-12">            
            <div class="card-body">
            
                <?php
                    if(isset($_SESSION['msg-delete-user'])){
                        echo $_SESSION['msg-delete-user'];
                        unset($_SESSION['msg-delete-user']);
                    }                    
                    if (isset($_SESSION['msg-edit-user'])) {
                        echo $_SESSION['msg-edit-user'];
                        unset($_SESSION['msg-edit-user']);
                    }
                ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="tabela-usuarios" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome de usuário</th>
                                <th>Nome completo</th>
                                <th>Email</th>
                                <th>Último login</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome de usuário</th>
                                <th>Nome completo</th>
                                <th>Email</th>                                
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $meu_nome = $_SESSION['usuario'];

                            $sql_users = "SELECT * FROM $tabela_usuarios WHERE `usuario` != '$meu_nome' ORDER BY `id` DESC";
                            $query_users = $mysqli->query($sql_users) or die($mysqli->error . __LINE__);
                            $resultados = $query_users->num_rows;

                            if ($resultados > 0) {
                                while ($row = $query_users->fetch_assoc()) {                                    
                                    echo '
								    <tr>
									    <td>' . $row["id"] . '</td>
										<td>' . $row["usuario"] . '</td>
										<td>' . $row["nome_completo"] . '</td>										
										<td>' . $row["email"] . '</td>                                                                            										
                                        <td>                                        
                                            <a class="btn btn-dark btn-sm px-3" href="'. $CONFIGURATION['site_url'] .'panel/users/user?id=' . $row["id"] . '&a=edit" style="text-decoration:none;color:#fff">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm px-3" data-href="'. $function_delete_user . '?id=' . $row["id"] . '&a=delete" data-toggle="modal" data-target="#confirm-delete-user">
                                            <i class="fas fa-trash-alt"></i></button>
                                        </td>
									</tr>
									';
                                }
                            } else {
                                echo '
                                <div class="w-full text-center p-t-25">
                                    <div class="alert alert-warning" role="alert">
                                        <strong>ATENÇÃO:</strong> Nenhum registro foi encontrado.<br><span class="mt-1">Para editar suas informações clique <a href="'.$CONFIGURATION['site_url'] .'panel/account/settings">aqui</a></span>.
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