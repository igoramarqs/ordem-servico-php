<?php


    include_once('../../../core.php');


    if (isset($_POST['edit_profile'])) {

        $id = $_SESSION['id'];

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_usuarios;

        $msg = "msg-edit-profile";

        $nome_usuario       = $mysqli->real_escape_string($_POST['inputNomeUsuario']);
        $nova_senha         = $mysqli->real_escape_string($_POST['inputNovaSenha']);
        $nome_completo      = $mysqli->real_escape_string($_POST['inputNomeCompleto']);
        $foto_perfil        = $mysqli->real_escape_string($_POST['inputFotoPerfil']);
        $email              = $mysqli->real_escape_string($_POST['inputEmail']);        

        if (
            empty($nome_usuario)
            && empty($nome_completo)
            && empty($email)            
        ) {
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha todos os campos antes de prosseguir com o salvamento das alterações.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/account/settings');
        } elseif (empty($nome_usuario)) {
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome de usuário' antes de prosseguir com o salvamento das alterações.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/account/settings');
        } elseif (empty($nome_completo)) {
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome completo' antes de prosseguir com o salvamento das alterações.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/account/settings');
        } elseif (empty($email)) {
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Email' antes de prosseguir com o salvamento das alterações.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/account/settings');
        } else {
            /* Verificar duplicidade de nome de usuário */

            $sql_verifica = "SELECT * FROM $tabela_usuarios WHERE `usuario` = '$nome_usuario' AND `id` != $id";
            $query_verifica = $mysqli->query($sql_verifica) or die($mysqli . __LINE__);
            $resultados = $query_verifica->num_rows;

            if ($resultados == 0) {

                if (isset($nova_senha) && !empty($nova_senha)) {
                    $nova_senha_criptografada = generatePasswordEncrypted($nova_senha);
                    $sql = "UPDATE $tabela_usuarios SET
                                `usuario`       = '$nome_usuario',
                                `senha`         = '$nova_senha_criptografada', 
                                `nome_completo` = '$nome_completo',
                                `foto_perfil`   = '$foto_perfil',                                
                                `email`         = '$email'                                
                                WHERE `id`      = $id;                        
                            ";                
                } else {
                    $sql = "UPDATE $tabela_usuarios SET
                            `usuario`       = '$nome_usuario',                    
                            `nome_completo` = '$nome_completo',
                            `foto_perfil`   = '$foto_perfil',                            
                            `email`         = '$email'
                            WHERE `id`      = $id;                        
                        ";
                }


                $query = $mysqli->query($sql) or die($mysqli . __LINE__);
                if ($query) {                
                    $_SESSION[$msg] = ShowSessionMessage("success", "As alteações foram salvas com sucesso.");
                    unset($_SESSION['usuario']);
                    unset($_SESSION['senha_encriptada']);
                    unset($_SESSION['senha_descriptada']);
                    unset($_SESSION['nome_completo']);
                    unset($_SESSION['foto_perfil']);                    
                    unset($_SESSION['email']);
                    
                    $_SESSION['usuario'] = $nome_usuario;
                    $_SESSION['senha_encriptada'] = $nova_senha_criptografada;
                    $_SESSION['senha_descriptada'] = $nova_senha;
                    $_SESSION['nome_completo'] = $nome_completo;
                    $_SESSION['foto_perfil'] = $foto_perfil;                    
                    $_SESSION['email'] = $email;
                    header('Location:' . $CONFIGURATION['site_url'] . 'panel/account/settings');
                } else {
                    $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar salvar estas informações, tente novamente.");
                    header('Location:' . $CONFIGURATION['site_url'] . 'panel/account/settings');
                }
            } else {
                $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, escolha outro nome de usuário.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/account/settings');
            }
        }

    }