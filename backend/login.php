<?php

    include "core.php";

    if(isset($_POST['verify-login'])){
        if(isset($_POST['username']) && isset($_POST['password'])){
            $usuario_login = $mysqli->real_escape_string($_POST['username']);
            $senha = $mysqli->real_escape_string($_POST['password']);

            $sql = "SELECT * FROM $tabela_usuarios WHERE `usuario` = '$usuario_login'";
            $query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);
            $result = $query->num_rows;
            if($result == 1){
                $usuario = $query->fetch_assoc();
                if(password_verify($senha, $usuario['senha'])){
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['usuario'] = $usuario['usuario'];
                    $_SESSION['senha_encriptada'] = $usuario['senha'];
                    $_SESSION['senha_descriptada'] = $senha;
                    $_SESSION['nome_completo'] = $usuario['nome_completo'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['foto_perfil'] = $usuario['foto_perfil'];                    
                    $_SESSION['errorLoginMsg'] = "";                        

                    header('Location: ' . $CONFIGURATION['url'] . 'panel/index');                       
                } else {
                    $_SESSION['errorLoginMsg'] = "<div id='erro-login' class='w-full text-center p-t-25'><div class='alert alert-danger' role='alert'>Falha ao tentar realizar a autenicação. Por favor, verifique os campos e tente novamente.</div></div>";
                }                
            } else {
                $_SESSION['errorLoginMsg'] = "<div id='erro-login' class='w-full text-center p-t-25'><div class='alert alert-danger' role='alert'>Falha ao tentar realizar a autenicação. Por favor, verifique os campos e tente novamente.</div></div>";
            }
        }
    }

?>