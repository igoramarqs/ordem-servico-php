<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="card col-lg-6 o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Autenticação</h1>
                    </div>
                    <form class="user" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Seu nome de usuário" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Sua senha" required>
                        </div>

                        <?php
                        if (isset($_SESSION['errorLoginMsg']) && !empty($_SESSION['errorLoginMsg'])) {
                            echo $_SESSION['errorLoginMsg'];
                            unset($_SESSION['errorLoginMsg']);
                        }
                        ?>

                        <button type="submit" name="verify-login" class="btn btn-primary btn-user btn-block">Entrar como administrador</button>                                        
                    </form>
                    <div class="w-full text-center mt-3">
                        <button type="submit" class="btn btn-dark btn-sm px-3">
                            <a href="<?=$CONFIGURATION['site_url'] . 'customer';?>" style="text-decoration:none;color:#fff">
                                <i class="fas fa-user"></i> &nbsp; Sou um cliente
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>