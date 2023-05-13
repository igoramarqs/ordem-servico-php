<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ordem de serviço</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">
                <form method="post" action="<?= $CONFIGURATION['site_url'] . 'backend/functions/orders/edit_order.php?id='.$order_infos['id'];?>">
                    <div class="form-group">
                        <label for="inputHiddenRefOS">Ref. OS <strong>*</strong></label>
                        <input type="text" class="form-control" name="inputHiddenRefOS" id="inputHiddenRefOS" value="<?=$order_infos['refOs'];?>" disabled minlength="3" maxlength="128">
                        <input type="hidden" name="inputRefOS" id="inputRefOS" value="">
                    </div>
                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações da ordem de serviço</strong></h6>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="inputNomeCompleto">Nome completo do cliente <strong>*</strong></label>
                            <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" value="<?= $order_infos['refCliente']; ?>" disabled minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputTecnicoResponsavel">Técnico responsável <strong>*</strong></label>
                            <input type="text" class="form-control" name="inputTecnicoResponsavel" id="inputTecnicoResponsavel" value="<?= $order_infos['refTecnico']; ?>" disabled minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputTelefone">WhatsApp <strong>*</strong></label>
                            <input type="text" class="form-control" name="inputTelefone" id="inputTelefone" value="<?= $order_infos['refContato']; ?>" disabled min="3" max="128">
                        </div>                        
                    </div>                    
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="inputDescDefeito">Descrição do defeito</label>
                            <textarea type="text" class="form-control" name="inputDescDefeito" id="inputDescDefeito" maxlength="2000" disabled><?= $order_infos['refDescricaoDefeito']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="inputItens">Itens para troca/reparo</label>
                            <textarea type="text" class="form-control" name="inputItens" id="inputItens" maxlength="2000" disabled><?= $order_infos['refItens']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label>Serviços:</label>
                            <div id="servicos-container">
                                <textarea type="text" class="form-control" id="servicos-selecionados" name="servicos-selecionados" disabled><?=$order_infos['refServicos'];?></textarea>
                            </div>  
                        </div>
                    </div>                    

                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações de pagamentos</strong></h6>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <label for="inputValorTotal">Valor total</label>                            
                            <input type="text" class="form-control" name="inputHiddenValorTotal" id="inputHiddenValorTotal" value="<?=$order_infos['refValorTotal'];?>" disabled maxlength="128">
                            <input type="hidden" name="inputValorTotal" id="inputValorTotal" value="">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputDesconto">Desconto <small>(em %)</small></label>                            
                            <input type="text" class="form-control" name="inputDesconto" id="inputDesconto" value="<?=$order_infos['refDesconto'];?>" maxlength="128" disabled>                            
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="inputFormaPagamento">Forma de pagamento <strong>*</strong></label>
                            <select id="inputFormaPagamento" class="form-control" name="optionsFormaPagamento" disabled>
                                <?php if ($order_infos['refFormaPagamento'] == 0): ?>
                                    <option value="0" selected>Pagamento pendente</option>
                                <?php else : ?>
                                    <option value="0">Pagamento pendente</option>
                                <?php endif; ?>                                

                                <?php if ($order_infos['refFormaPagamento'] == 1): ?>
                                    <option value="1" selected>Pagamento dinheiro</option>
                                <?php else : ?>
                                    <option value="1">Pagamento dinheiro</option>
                                <?php endif; ?>

                                <?php if ($order_infos['refFormaPagamento'] == 2): ?>
                                    <option value="2" selected>Pagamento cartão débito</option>
                                <?php else : ?>
                                    <option value="2">Pagamento cartão débito</option>
                                <?php endif; ?>

                                <?php if ($order_infos['refFormaPagamento'] == 3): ?>
                                    <option value="3" selected>Pagamento cartão crédito</option>
                                <?php else : ?>
                                    <option value="3">Pagamento cartão crédito</option>
                                <?php endif; ?>
                            </select>
                        </div> 
                        <div class="form-group col-lg-3">
                            <label for="inputParcelas">Parcelado? <small>(parcelas)</small></label>
                            <input type="text" class="form-control" name="inputParcelas" id="inputParcelas" value="<?= $order_infos['refParcelas']; ?>" disabled min="3" max="128">
                        </div>
                    </div>
                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações de conclusão</strong></h6>  
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="inputDataConclusao">Data de conclusão</label>
                            <input type="text" class="form-control" name="inputDataConclusao" id="inputDataConclusao" value="<?= $order_infos['refDataConclusao']; ?>" disabled min="3" max="10">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control" name="optionsStatus" disabled>
                                <?php if ($order_infos['refStatus'] == 0): ?>
                                    <option value="0" selected>Em aberto</option>
                                <?php else : ?>
                                    <option value="0">Em aberto</option>
                                <?php endif; ?>

                                <?php if ($order_infos['refStatus'] == 1): ?>
                                    <option value="1" selected>Finalizado</option>
                                <?php else : ?>
                                    <option value="1">Finalizado</option>
                                <?php endif; ?>

                                <?php if ($order_infos['refStatus'] == 2): ?>
                                    <option value="2" selected>Cancelado</option>
                                <?php else : ?>
                                    <option value="2">Cancelado</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Outras informações</strong></h6>

                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="inputObservacoes">Observações</label>
                            <textarea type="text" class="form-control" name="inputObservacoes" id="inputObservacoes" maxlength="2000" disabled><?= $order_infos['refObservacoes']; ?></textarea>
                        </div>
                    </div>

                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informar cliente</strong></h6>

                    <div style="display: flex; justify-content: center;">
                        <div class="form-group col-lg-3" style="display: inline-block;">
                            <a class="btn btn-success" href="https://wa.me/<?=$order_infos['refContato'];?>?text=<?=urlencode("Sua ordem de serviço (".$order_infos['refOs'].") está concluída.");?>" target="_blank" style="text-decoration:none;color:#fff">
                            <i class="fa-solid fa-check"></i> Informar OS finalizada
                            </a>
                        </div>
                        <div class="form-group col-lg-3" style="display: inline-block;">
                            <a class="btn btn-dark" href="https://wa.me/<?=$order_infos['refContato'];?>?text=<?=urlencode("Sua ordem de serviço (".$order_infos['refOs'].") está em andamento.");?>" target="_blank" style="text-decoration:none;color:#fff">
                            <i class="fa-solid fa-wrench"></i> Informar OS em andamento
                            </a>
                        </div>
                        <div class="form-group col-lg-3" style="display: inline-block;">
                            <a class="btn btn-danger" href="https://wa.me/<?=$order_infos['refContato'];?>?text=<?=urlencode("Sua ordem de serviço (".$order_infos['refOs'].") está cancelada.");?>" target="_blank" style="text-decoration:none;color:#fff">
                            <i class="fa-solid fa-cancel"></i> Informar OS cancelada
                            </a>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a class="btn btn-primary" href="<?= $CONFIGURATION['site_url'] . 'panel/orders/list-orders'; ?>" style="text-decoration:none;color:#fff">
                            &larr;Voltar
                        </a>
                        <a class="btn btn-dark" href="<?=$CONFIGURATION['site_url'].'os_impressao?id='.$order_infos['id'];?>" target="_blank" style="text-decoration:none;color:#fff">
                            <i class="fa-solid fa-print"></i> Imprimir
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>