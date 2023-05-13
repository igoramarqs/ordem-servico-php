<?php

$function_delete_order = $CONFIGURATION['site_url'] .'backend/functions/orders/delete_order';

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Listar ordens de serviço</h1>
        <button type="submit" class="btn btn-dark btn-sm px-3">
            <a href="<?=$CONFIGURATION['site_url'] . 'panel/orders/add-order';?>" style="text-decoration:none;color:#fff">
                <i class="fas fa-plus"></i> Adicionar nova ordem de serviço
            </a>
        </button>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow col-lg-12">            
            <div class="card-body">
            
                <?php
                    if(isset($_SESSION['msg-delete-order'])){
                        echo $_SESSION['msg-delete-order'];
                        unset($_SESSION['msg-delete-order']);
                    }                    
                    if (isset($_SESSION['msg-edit-order'])) {
                        echo $_SESSION['msg-edit-order'];
                        unset($_SESSION['msg-edit-order']);
                    }
                    if (isset($_SESSION['msg-order-not-found-print'])) {
                        echo $_SESSION['msg-order-not-found-print'];
                        unset($_SESSION['msg-order-not-found-print']);
                    }
                    if (isset($_SESSION['msg-order-not-found-view'])) {
                        echo $_SESSION['msg-order-not-found-view'];
                        unset($_SESSION['msg-order-not-found-view']);
                    }
                ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="tabela-os" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ref. OS</th>
                                <th>Data de abertura</th>
                                <th>Cliente</th>
                                <th>Contato</th>
                                <th>Data de conclusão</th>
                                <th>Téc. Responsável</th>
                                <th>Desconto</th>
                                <th>Valor total</th>
                                <th>Forma pagamento</th>
                                <th>Parcelas (?)</th>
                                <th>Status</th>
                                <th>Criado em</th>
                                <th>Editado em</th>
                                <th>Último editor</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                                <th>Visualizar</th>
                                <th>Imprimir</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Ref. OS</th>
                                <th>Data de abertura</th>
                                <th>Cliente</th>
                                <th>Contato</th>
                                <th>Data de conclusão</th>
                                <th>Téc. Responsável</th>
                                <th>Desconto</th>
                                <th>Valor total</th>
                                <th>Forma pagamento</th>
                                <th>Parcelas (?)</th>
                                <th>Status</th>
                                <th>Criado em</th>
                                <th>Editado em</th>
                                <th>Último editor</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                                <th>Visualizar</th>
                                <th>Imprimir</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $sql_orders = "SELECT * FROM $tabela_os ORDER BY `id` DESC";
                            $query_orders = $mysqli->query($sql_orders) or die($mysqli->error . __LINE__);
                            $resultados = $query_orders->num_rows;

                            if ($resultados > 0) {
                                while ($row = $query_orders->fetch_assoc()) {
                                    if ($row["refDataAbertura"] == 0) {
                                        $refDataAbertura = "Sem registro";                                    
                                    } else {
                                        $refDataAbertura = FormatDateTimeFromTimestamp($row["refDataAbertura"], 0);
                                    }
                                    if ($row["refDataConclusao"] == 0) {
                                        $refDataConclusao = "Sem registro";                                    
                                    } else {
                                        $refDataConclusao = FormatDateTimeFromTimestamp($row["refDataConclusao"], 0);
                                    }
                                    if ($row["refFormaPagamento"] == 0) {
                                        $refFormaPagamento = "PGTO. PENDENTE";                                    
                                    } elseif ($row["refFormaPagamento"] == 1) {
                                        $refFormaPagamento = "PGTO. DINHEIRO";
                                    } elseif ($row["refFormaPagamento"] == 2) {
                                        $refFormaPagamento = "PGTO. CARTÃO DÉBITO";
                                    } elseif ($row["refFormaPagamento"] == 3) {
                                        $refFormaPagamento = "PGTO. CARTÃO CRÉDITO";
                                    } else {                                        
                                        $refFormaPagamento = "Sem registro";
                                    }
                                    if ($row["refStatus"] == 0) {
                                        $refStatus = "Em aberto";                                    
                                    } elseif ($row["refStatus"] == 1) {
                                        $refStatus = "Finalizado";
                                    } elseif ($row["refStatus"] == 2) {
                                        $refStatus = "Cancelado";                                    
                                    } else {                                        
                                        $refStatus = "Sem registro";
                                    }
                                    if ($row["refCriadoEm"] == 0) {
                                        $refCriadoEm = "Sem registro";                                    
                                    } else {
                                        $refCriadoEm = FormatDateTimeFromTimestamp($row["refCriadoEm"], 0);
                                    }
                                    if ($row["refEditadoEm"] == 0) {
                                        $refEditadoEm = "Sem registro";                                    
                                    } else {
                                        $refEditadoEm = FormatDateTimeFromTimestamp($row["refEditadoEm"], 0);
                                    }
                                    if ($row["refValorTotal"] == "") {
                                        $refValorTotal = "R$ 0,00";
                                    } else {
                                        $refValorTotal = formatReal($row["refValorTotal"]);
                                    }

                                    if ($row["refParcelas"] == "") {
                                        $refParcelas = "0x";
                                    } else {
                                        $refParcelas = $row["refParcelas"] . "x";
                                    }
                                    echo '
								    <tr>
									    <td>' . $row["id"] . '</td>
										<td>' . $row["refOs"] . '</td>
										<td>' . $refDataAbertura . '</td>
										<td>' . $row["refCliente"] . '</td>                                                                            
										<td>' . formatPhoneNumber($row["refContato"]) . '</td>
                                        <td>' . $refDataConclusao . '</td>
                                        <td>' . $row["refTecnico"] . '</td>
                                        <td>' . $row["refDesconto"] . '%</td>
                                        <td>' . $refValorTotal. '</td>
                                        <td>' . $refFormaPagamento . '</td>
                                        <td>' . $refParcelas . '</td>
                                        <td>' . $refStatus . '</td>
                                        <td>' . $refCriadoEm . '</td>
                                        <td>' . $refEditadoEm . '</td>
                                        <td>' . getUsernameFromID($row["refUltimoEditor"]) . '</td>
                                        <td>                                        
                                            <a class="btn btn-dark btn-sm px-3" href="'. $CONFIGURATION['site_url'] .'panel/orders/order?id=' . $row["id"] . '&a=edit" style="text-decoration:none;color:#fff">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm px-3" data-href="'. $function_delete_order . '?id=' . $row["id"] . '&a=delete" data-toggle="modal" data-target="#confirm-delete-user">
                                            <i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td>                                        
                                            <a class="btn btn-dark btn-sm px-3" href="'. $CONFIGURATION['site_url'] .'panel/orders/view-order?id=' . $row["id"] . '&a=view"" style="text-decoration:none;color:#fff">
                                            <i class="fas fa-eye"></i></a>
                                        </td>
                                        <td>                                        
                                            <a class="btn btn-dark btn-sm px-3" href="'.$CONFIGURATION['site_url'].'os_impressao?id='.$row['id'].'" target="_blank" style="text-decoration:none;color:#fff">
                                            <i class="fas fa-print"></i></a>
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