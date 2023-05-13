<?php


    include_once "../../core.php";    


    if(isset($_GET['id']) && isset($_GET['a'])){
        $action = $_GET['a'];

        if($action == 'delete'){
            $id = $_GET['id'];

            if($_SESSION['id'] == $id){
                $_SESSION['msg-delete-user'] = ShowSessionMessage("error", "Você não pode excluir essa conta.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/users/list-users');
                return;
            }

            global $mysqli;
            global $tabela_usuarios;

            $sql = "DELETE FROM $tabela_usuarios WHERE `id` = $id";
            $query = $mysqli->query($sql);

            if($query){
                $_SESSION['msg-delete-user'] = ShowSessionMessage("success", "Usuário excluído com sucesso.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/users/list-users');
            } else {
                $_SESSION['msg-delete-user'] = ShowSessionMessage("error", "Ocorreu um erro ao tentar excluir o usuário.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/users/list-users');
            }
        }

    }


?>