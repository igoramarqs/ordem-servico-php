<?php

$function_delete_customer = $CONFIGURATION['site_url'] .'backend/functions/customers/delete_customer';

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Listar clientes</h1>
        <button type="submit" class="btn btn-dark btn-sm px-3">
            <a href="<?=$CONFIGURATION['site_url'] . 'panel/customers/add-customer';?>" style="text-decoration:none;color:#fff">
                <i class="fas fa-plus"></i> Adicionar novo cliente
            </a>
        </button>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow col-lg-12">            
            <div class="card-body">
            
                <?php
                    if(isset($_SESSION['msg-delete-customer'])){
                        echo $_SESSION['msg-delete-customer'];
                        unset($_SESSION['msg-delete-customer']);
                    }                    
                    if (isset($_SESSION['msg-edit-customer'])) {
                        echo $_SESSION['msg-edit-customer'];
                        unset($_SESSION['msg-edit-customer']);
                    }
                ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="tabela-clientes" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>                                
                                <th>Nome completo</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Tipo Pessoa</th>
                                <th>RG</th>
                                <th>CPF</th>
                                <th>CNPJ</th>
                                <th>WhatsApp</th>
                                <th>Data Cadastro</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>                                
                                <th>Nome completo</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Tipo Pessoa</th>
                                <th>RG</th>
                                <th>CPF</th>
                                <th>CNPJ</th>
                                <th>WhatsApp</th>
                                <th>Data Cadastro</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $sql_customers = "SELECT * FROM $tabela_clientes ORDER BY `id` DESC";
                            $query_customers = $mysqli->query($sql_customers) or die($mysqli->error . __LINE__);
                            $resultados = $query_customers->num_rows;

                            if ($resultados > 0) {
                                while ($row = $query_customers->fetch_assoc()) {
                                    if ($row["data_cadastro"] == 0) {
                                        $data_cadastro = "Sem registro";                                    
                                    } else {
                                        $data_cadastro = FormatDateTimeFromTimestamp($row["data_cadastro"], 0);
                                    }

                                    if ($row["pessoa_tipo"] == 0) {
                                        $pessoa_tipo = "Sem registro";                                    
                                    } elseif ($row["pessoa_tipo"] == 1){
                                        $pessoa_tipo = "Pessoa física";
                                    } else {
                                        $pessoa_tipo = "Pessoa jurídica";
                                    }
                                    echo '
								    <tr>
									    <td>' . $row["id"] . '</td>
										<td>' . $row["nome_completo"] . '</td>
										<td>' . $row["email"] . '</td>										
										<td>' . $row["endereco"] . '</td>
                                        <td>' . $pessoa_tipo . '</td>
                                        <td>' . formatRG($row["rg"]) . '</td>
                                        <td>' . formatCPF($row["cpf"]) . '</td>
                                        <td>' . formatCNPJ($row["cnpj"]) . '</td>
                                        <td>' . formatPhoneNumber($row["whatsapp"]) . '</td>
										<td>' . $data_cadastro . '</td>                                        
                                        <td>                                        
                                            <a class="btn btn-dark btn-sm px-3" href="'. $CONFIGURATION['site_url'] .'panel/customers/customer?id=' . $row["id"] . '&a=edit" style="text-decoration:none;color:#fff">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm px-3" data-href="'. $function_delete_customer . '?id=' . $row["id"] . '&a=delete" data-toggle="modal" data-target="#confirm-delete-customer">
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