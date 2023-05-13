<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar usuário</h1>
    </div>    

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg-edit-user'])) {
                    echo $_SESSION['msg-edit-user'];
                    unset($_SESSION['msg-edit-user']);
                }
                ?>

                <span>Preencha corretamente todos os campos.</span>
                <p class="mb-3">Os campos marcados com * são obrigatórios.</p>

                <form method="post" action="<?=$CONFIGURATION['site_url'].'backend/functions/users/edit_user.php?id='.$users_infos['id'];?>">                    
                    <h6 style="text-align: center;display: block;" class="mb-3"><strong>Informações de Login</strong></h6>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNomeUsuario">Nome de usuário <strong>*</strong></label>                            
                            <input type="text" class="form-control" name="inputNomeUsuario" id="inputNomeUsuario" value="<?=$users_infos['usuario'];?>" required minlength="3" maxlength="128">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNovaSenha">Nova senha de acesso</label>
                            <input type="password" class="form-control" name="inputNovaSenha" id="inputNovaSenha" placeholder="Digite uma nova senha" minlength="3" maxlength="64">
                        </div>
                    </div>

                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações Pessoais</strong></h6>
                    <div class="form-group">
                        <label for="inputNomeCompleto">Nome completo <strong>*</strong></label>
                        <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" value="<?=$users_infos['nome_completo'];?>" required minlength="3" maxlength="128">
                    </div>
                    <div class="form-group">
                        <label for="inputFotoPerfil">Link de sua foto de perfil</label>
                        <input type="text" class="form-control" name="inputFotoPerfil" id="inputFotoPerfil" value="<?=$users_infos['foto_perfil'];?>" minlength="3" maxlength="1000">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail">Email <strong>*</strong></label>
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?=$users_infos['email'];?>" required minlength="3" maxlength="128">
                        </div>                        
                    </div>                    
                    <a class="btn btn-primary" href="<?=$CONFIGURATION['site_url'] . 'panel/users/list-users';?>" style="text-decoration:none;color:#fff">
                        &larr;Voltar
                    </a>
                    <button type="submit" name="edit_user" class="btn btn-success">Editar usuário</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>