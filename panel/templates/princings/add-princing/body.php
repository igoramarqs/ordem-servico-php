<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Adicionar precificação de serviço</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg-create-princing'])) {
                    echo $_SESSION['msg-create-princing'];
                    unset($_SESSION['msg-create-princing']);
                }
                ?>

                <span>Preencha corretamente todos os campos.</span>
                <p class="mb-3">Os campos marcados com * são obrigatórios.</p>

                <form method="post" action="<?= $CONFIGURATION['site_url'] . 'backend/functions/princings/create_princing.php'; ?>">                    
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="inputNomeServico">Nome do serviço <strong>*</strong></label>
                            <?php if (isset($_SESSION['SAVEDnome_servico'])) : ?>
                                <input type="text" class="form-control" name="inputNomeServico" id="inputNomeServico" value="<?= $_SESSION['SAVEDnome_servico']; ?>" required minlength="3" maxlength="128">
                            <?php else : ?>
                                <input type="text" class="form-control" name="inputNomeServico" id="inputNomeServico" placeholder="ex: Limpeza" required minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="inputValorServico">Valor <strong>*</strong></label>
                            <?php if (isset($_SESSION['SAVEDvalor_servico'])) : ?>
                                <input type="text" class="form-control" name="inputValorServico" id="inputValorServico" value="<?= $_SESSION['inputValorServico']; ?>" required min="3" max="128">
                            <?php else : ?>
                                <input type="text" class="form-control" name="inputValorServico" id="inputValorServico" placeholder="ex: 10.50" required min="3" max="128">
                            <?php endif; ?>
                        </div>                        
                    </div>                    
                    
                    <a class="btn btn-primary" href="<?= $CONFIGURATION['site_url'] . 'panel/princings/list-princings'; ?>" style="text-decoration:none;color:#fff">
                        &larr;Voltar
                    </a>
                    <button type="submit" name="create_princing" class="btn btn-success">Registrar precificação</button>
                </form>
            </div>
        </div>
    </div>    

    <!-- Content Row -->

</div>