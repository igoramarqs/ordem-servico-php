<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar cliente</h1>
    </div>    

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg-edit-customer'])) {
                    echo $_SESSION['msg-edit-customer'];
                    unset($_SESSION['msg-edit-customer']);
                }
                ?>

                <span>Preencha corretamente todos os campos.</span>
                <p class="mb-3">Os campos marcados com * são obrigatórios.</p>

                <form method="post" action="<?=$CONFIGURATION['site_url'].'backend/functions/customers/edit_customer.php?id='.$customer_infos['id'];?>">                    
                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações Pessoais</strong></h6>
                    <div class="form-group">
                        <label for="inputNomeCompleto">Nome completo <strong>*</strong></label>
                        <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" value="<?=$customer_infos['nome_completo'];?>" required minlength="3" maxlength="128">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email <strong>*</strong></label>
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?=$customer_infos['email'];?>" required minlength="3" maxlength="128">
                        </div>   
                        <div class="form-group col-md-3">
                            <label for="inputEndereco">Endereço</label>
                            <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" value="<?= $customer_infos['endereco']; ?>" minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTelefone">WhatsApp <strong>*</strong></label>
                            <input type="text" class="form-control" name="inputTelefone" id="inputTelefone" value="<?= $customer_infos['whatsapp']; ?>" required min="3" max="128">
                        </div>                                             
                    </div> 
                    
                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Documentos</strong></h6>
                    <div class="form-row mb-2">
                        <label for="inputTipoPessoa">Tipo de pessoa <strong>*</strong></label>
                        <select id="inputTipoPessoa" class="form-control" name="optionsTipoPessoa">
                            <?php if ($customer_infos['pessoa_tipo'] == 0): ?>
                                <option value="0" selected>Selecione aqui</option>
                            <?php else : ?>
                                <option value="0">Selecione aqui</option>
                            <?php endif; ?>

                            <?php if ($customer_infos['pessoa_tipo'] == 1): ?>
                                <option value="1" selected>Pessoa física</option>
                            <?php else : ?>
                                <option value="1">Pessoa física</option>
                            <?php endif; ?>

                            <?php if ($customer_infos['pessoa_tipo'] == 2): ?>
                                <option value="2" selected>Pessoa jurídica</option>
                            <?php else : ?>
                                <option value="2">Pessoa jurídica</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputRG">RG</label>
                            <input type="text" class="form-control" name="inputRG" id="inputRG" value="<?= $customer_infos['rg']; ?>" minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCPF">CPF</label>
                            <input type="text" class="form-control" name="inputCPF" id="inputCPF" value="<?= $customer_infos['cpf']; ?>" minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCNPJ">CNPJ</label>
                            <input type="text" class="form-control" name="inputCNPJ" id="inputCNPJ" value="<?= $customer_infos['cnpj']; ?>" min="3" max="128">
                        </div>
                    </div>                    

                    <a class="btn btn-primary" href="<?=$CONFIGURATION['site_url'] . 'panel/customers/list-customers';?>" style="text-decoration:none;color:#fff">
                        &larr;Voltar
                    </a>
                    <button type="submit" name="edit_customer" class="btn btn-success">Editar cliente</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>