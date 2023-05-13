<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar precificação de serviço</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg-edit-princing'])) {
                    echo $_SESSION['msg-edit-princing'];
                    unset($_SESSION['msg-edit-princing']);
                }
                ?>

                <span>Preencha corretamente todos os campos.</span>
                <p class="mb-3">Os campos marcados com * são obrigatórios.</p>

                <form method="post" action="<?= $CONFIGURATION['site_url'] . 'backend/functions/princings/edit_princing.php?id='.$princing_infos['id'];?>">                    
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="inputNomeServico">Nome completo do cliente <strong>*</strong></label>
                            <input type="text" class="form-control" name="inputNomeServico" id="inputNomeServico" value="<?= $princing_infos['nome']; ?>" required minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputValorServico">WhatsApp <strong>*</strong></label>
                            <input type="text" class="form-control" name="inputValorServico" id="inputValorServico" value="<?= $princing_infos['valor']; ?>" required min="3" max="128">
                        </div>                        
                    </div>                    
                    
                    <a class="btn btn-primary" href="<?= $CONFIGURATION['site_url'] . 'panel/princings/list-princings'; ?>" style="text-decoration:none;color:#fff">
                        &larr;Voltar
                    </a>
                    <button type="submit" name="edit_princing" class="btn btn-success">Salvar alterações</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>