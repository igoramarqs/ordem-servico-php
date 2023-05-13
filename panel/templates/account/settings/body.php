<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seu perfil</h1>
    </div>    

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg-edit-profile'])) {
                    echo $_SESSION['msg-edit-profile'];
                    unset($_SESSION['msg-edit-profile']);
                }
                ?>

                <span>Preencha corretamente todos os campos.</span>
                <p class="mb-3">Os campos marcados com * são obrigatórios.</p>

                <form method="post" action="<?=$CONFIGURATION['site_url'].'backend/functions/account/settings/edit_profile.php?id='.$user_info['id'];?>">
                    <h6 style="text-align: center;display: block;" class="mb-3"><strong>Informações de Login</strong></h6>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNomeUsuario">Nome de usuário <strong>*</strong></label>                            
                            <input type="text" class="form-control" name="inputNomeUsuario" id="inputNomeUsuario" value="<?=$user_info['usuario'];?>" required minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNovaSenha">Nova senha de acesso</label>
                            <input type="password" class="form-control" name="inputNovaSenha" id="inputNovaSenha" placeholder="Digite uma nova senha" minlength="3" maxlength="64">
                        </div>
                    </div>

                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações Pessoais</strong></h6>
                    <div class="form-group">
                        <label for="inputNomeCompleto">Nome completo <strong>*</strong></label>
                        <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" value="<?=$user_info['nome_completo'];?>" required minlength="3" maxlength="128">
                    </div>
                    <div class="form-group">
                        <label for="inputFotoPerfil">Link de sua foto de perfil</label>
                        <input type="text" class="form-control" name="inputFotoPerfil" id="inputFotoPerfil" value="<?=$user_info['foto_perfil'];?>" minlength="3" maxlength="1000">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail">Email <strong>*</strong></label>
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?=$user_info['email'];?>" required minlength="3" maxlength="128">
                        </div>
                    </div>                    
                    <a class="btn btn-primary" href="#" onclick="history.back();" style="text-decoration:none;color:#fff">
                        &larr;Voltar
                    </a>
                    <button type="submit" name="edit_profile" class="btn btn-success">Salvar alterações</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>