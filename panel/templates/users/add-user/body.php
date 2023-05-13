<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Adicionar usuário</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card shadow col-lg-12">
            <div class="card-body">

                <?php
                if (isset($_SESSION['msg-create-user'])) {
                    echo $_SESSION['msg-create-user'];
                    unset($_SESSION['msg-create-user']);
                }
                ?>

                <span>Preencha corretamente todos os campos.</span>
                <p class="mb-3">Os campos marcados com * são obrigatórios.</p>

                <form method="post" action="<?=$CONFIGURATION['site_url'].'backend/functions/users/create_user.php';?>">
                    <h6 style="text-align: center;display: block;" class="mb-3"><strong>Informações de Login</strong></h6>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNomeUsuario">Nome de usuário <strong>*</strong></label>                            
                            <?php if(isset($_SESSION['SAVEDnome_usuario'])): ?>
                                <input type="text" class="form-control" name="inputNomeUsuario" id="inputNomeUsuario" value="<?=$_SESSION['SAVEDnome_usuario'];?>" required minlength="3" maxlength="128">
                            <?php else: ?>
                                <input type="text" class="form-control" name="inputNomeUsuario" id="inputNomeUsuario" placeholder="ex: johndoe" required minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSenha">Senha de acesso <strong>*</strong></label>
                            <?php if(isset($_SESSION['SAVEDsenha'])): ?>
                                <input type="password" class="form-control" name="inputSenha" id="inputSenha" value="<?=$_SESSION['SAVEDsenha'];?>" required minlength="3" maxlength="128">
                            <?php else: ?>
                                <input type="password" class="form-control" name="inputSenha" id="inputSenha" placeholder="Senha" required minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>
                    </div>

                    <h6 style="text-align: center;display: block;" class="mb-3 mt-3"><strong>Informações Pessoais</strong></h6>
                    <div class="form-group">
                        <label for="inputNomeCompleto">Nome completo <strong>*</strong></label>
                        <?php if(isset($_SESSION['SAVEDnome_completo'])): ?>
                            <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" value="<?=$_SESSION['SAVEDnome_completo'];?>" required minlength="3" maxlength="128">
                        <?php else: ?>
                            <input type="text" class="form-control" name="inputNomeCompleto" id="inputNomeCompleto" placeholder="ex: John Doe" required minlength="3" maxlength="128">
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputFotoPerfil">Link de sua foto de perfil</label>
                        <?php if(isset($_SESSION['SAVEDfoto_perfil'])): ?>
                            <input type="text" class="form-control" name="inputFotoPerfil" id="inputFotoPerfil" value="<?=$_SESSION['SAVEDfoto_perfil'];?>" minlength="3" maxlength="1000">
                        <?php else: ?>
                            <input type="text" class="form-control" name="inputFotoPerfil" id="inputFotoPerfil" placeholder="https://dominio.com/foto.png" minlength="3" maxlength="1000">
                        <?php endif; ?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail">Email <strong>*</strong></label>
                            <?php if(isset($_SESSION['SAVEDemail'])): ?>
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?=$_SESSION['SAVEDemail'];?>" required minlength="3" maxlength="128">
                            <?php else: ?>
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="seuemail@provedor.com" required minlength="3" maxlength="128">
                            <?php endif; ?>
                        </div>                        
                    </div>                                        
                    <a class="btn btn-primary" href="<?=$CONFIGURATION['site_url'] . 'panel/users/list-users';?>" style="text-decoration:none;color:#fff">
                        &larr;Voltar
                    </a>
                    <button type="submit" name="create_user" class="btn btn-success">Registrar usuário</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Row -->

</div>