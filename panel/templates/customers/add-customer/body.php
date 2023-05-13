<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Adicionar cliente</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg-create-customer'])) {
                    echo $_SESSION['msg-create-customer'];
                    unset($_SESSION['msg-create-customer']);
                }
                ?>

                <span>Preencha corretamente todos os campos.</span>
                <p class="mb-3">Os campos marcados com * são obrigatórios.</p>

                <form method="post" action="<?= $CONFIGURATION['site_url'] . 'backend/functions/customers/create_customer.php'; ?>">
                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações pessoais</strong></h6>
                    <div class="form-group">
                        <label for="inputNomeCompleto">Nome completo <strong>*</strong></label>
                        <?php if (isset($_SESSION['SAVEDnome_completo'])) : ?>
                            <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" value="<?= $_SESSION['SAVEDnome_completo']; ?>" required minlength="3" maxlength="128">
                        <?php else : ?>
                            <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" placeholder="ex: John Doe" required minlength="3" maxlength="128">
                        <?php endif; ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email <strong>*</strong></label>
                            <?php if (isset($_SESSION['SAVEDemail'])) : ?>
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?= $_SESSION['SAVEDemail']; ?>" required minlength="3" maxlength="128">
                            <?php else : ?>
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="seuemail@provedor.com" required minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEndereco">Endereço</label>
                            <?php if (isset($_SESSION['SAVEDendereco'])) : ?>
                                <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" value="<?= $_SESSION['SAVEDendereco']; ?>" minlength="3" maxlength="128">
                            <?php else : ?>
                                <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTelefone">WhatsApp <strong>*</strong></label>
                            <?php if (isset($_SESSION['SAVEDtelefone'])) : ?>
                                <input type="text" class="form-control" name="inputTelefone" id="inputTelefone" value="<?= $_SESSION['SAVEDtelefone']; ?>" required min="3" max="128">
                            <?php else : ?>
                                <input type="text" class="form-control" name="inputTelefone" id="inputTelefone" placeholder="55DD900000000" required min="3" max="128">
                            <?php endif; ?>
                        </div>

                    </div>

                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Documentos</strong></h6>
                    <div class="form-row mb-2">
                        <label for="inputTipoPessoa">Tipo de pessoa <strong>*</strong></label>
                        <select id="inputTipoPessoa" class="form-control" name="optionsTipoPessoa">
                            <?php if (isset($_SESSION['SAVEDTipoPessoa']) && $_SESSION['SAVEDTipoPessoa'] == 0) : ?>
                                <option value="0" selected>Selecione aqui</option>
                            <?php else : ?>
                                <option value="0">Selecione aqui</option>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['SAVEDTipoPessoa']) && $_SESSION['SAVEDTipoPessoa'] == 1) : ?>
                                <option value="1" selected>Pessoa física</option>
                            <?php else : ?>
                                <option value="1">Pessoa física</option>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['SAVEDTipoPessoa']) && $_SESSION['SAVEDTipoPessoa'] == 2) : ?>
                                <option value="2" selected>Pessoa jurídica</option>
                            <?php else : ?>
                                <option value="2">Pessoa jurídica</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputRG">RG</label>
                            <?php if (isset($_SESSION['SAVEDrg'])) : ?>
                                <input type="text" class="form-control" name="inputRG" id="inputRG" value="<?= $_SESSION['SAVEDrg']; ?>" minlength="3" maxlength="128">
                            <?php else : ?>
                                <input type="text" class="form-control" name="inputRG" id="inputRG" placeholder="000000000" minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCPF">CPF</label>
                            <?php if (isset($_SESSION['SAVEDcpf'])) : ?>
                                <input type="text" class="form-control" name="inputCPF" id="inputCPF" value="<?= $_SESSION['SAVEDcpf']; ?>" minlength="3" maxlength="128">
                            <?php else : ?>
                                <input type="text" class="form-control" name="inputCPF" id="inputCPF" placeholder="00000000000" minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCNPJ">CNPJ</label>
                            <?php if (isset($_SESSION['SAVEDcnpj'])) : ?>
                                <input type="text" class="form-control" name="inputCNPJ" id="inputCNPJ" value="<?= $_SESSION['SAVEDcnpj']; ?>" min="3" max="128">
                            <?php else : ?>
                                <input type="text" class="form-control" name="inputCNPJ" id="inputCNPJ" placeholder="XXXXXXXX0001XX" min="3" max="128">
                            <?php endif; ?>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="<?= $CONFIGURATION['site_url'] . 'panel/customers/list-customers'; ?>" style="text-decoration:none;color:#fff">
                        &larr;Voltar
                    </a>
                    <button type="submit" name="create_customer" class="btn btn-success">Registrar cliente</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>