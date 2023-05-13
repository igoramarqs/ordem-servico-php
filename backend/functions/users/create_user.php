<?php


    include_once "../../core.php";    


    if(isset($_POST['create_user'])){

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_usuarios;

        $msg = "msg-create-user";

        $nome_usuario       = $mysqli->real_escape_string($_POST['inputNomeUsuario']);
        $senha              = $mysqli->real_escape_string($_POST['inputSenha']);
        $nome_completo      = $mysqli->real_escape_string($_POST['inputNomeCompleto']);
        $foto_perfil        = $mysqli->real_escape_string($_POST['inputFotoPerfil']);
        $email              = $mysqli->real_escape_string($_POST['inputEmail']);        

        if(empty($nome_usuario)
         && empty($senha) 
         && empty($nome_completo) 
         && empty($email))
        {
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha todos os campos antes de prosseguir com a criação deste usuário.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
        } elseif (empty($nome_usuario)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome de usuário' antes de prosseguir com a criação deste usuário.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
        } elseif (empty($senha)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Senha' antes de prosseguir com a criação deste usuário.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
        } elseif (empty($nome_completo)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome completo' antes de prosseguir com a criação deste usuário.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
        } elseif (empty($email)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Email' antes de prosseguir com a criação deste usuário.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
        } else {

            /* Verificar duplicidade de nome de usuário */

            $sql_verifica = "SELECT * FROM $tabela_usuarios WHERE `usuario` = '$nome_usuario'";
            $query_verifica = $mysqli->query($sql_verifica);
            $resultados = $query_verifica->num_rows;

            if($resultados == 0){

                /* Criptografa a senha digitada */
                    $senha_criptografada = generatePasswordEncrypted($senha);
                /* Criptografa a senha digitada */
                
                /* Insere o usuário */
                $sql = "INSERT INTO $tabela_usuarios (`usuario`, `senha`, `nome_completo`, `foto_perfil`, `email`) VALUES ('$nome_usuario', '$senha_criptografada', '$nome_completo', '$foto_perfil', '$email')";
                $query = $mysqli->query($sql);
                if($query){
                    ClearAllSaved();
                    $_SESSION[$msg] = ShowSessionMessage("success", "Usuário registrado com sucesso.");
                    header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
                } else {
                    SaveAllInputs();
                    $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar registrar o usuário.");
                    header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
                }

            } else {
                SaveAllInputs();
                $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, escolha outro nome de usuário.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/users/add-user');
            }
        }
    }

    function SaveAllInputs(){
        $_SESSION['SAVEDnome_usuario'] = $_POST['inputNomeUsuario'];
        $_SESSION['SAVEDsenha'] = $_POST['inputSenha'];
        $_SESSION['SAVEDnome_completo'] = $_POST['inputNomeCompleto'];
        $_SESSION['SAVEDfoto_perfil'] = $_POST['inputFotoPerfil'];
        $_SESSION['SAVEDemail'] = $_POST['inputEmail'];        
    }

    function ClearAllSaved(){
        unset($_SESSION['SAVEDnome_usuario']);
        unset($_SESSION['SAVEDsenha']);
        unset($_SESSION['SAVEDnome_completo']);
        unset($_SESSION['SAVEDfoto_perfil']);
        unset($_SESSION['SAVEDemail']);        
    }


?>