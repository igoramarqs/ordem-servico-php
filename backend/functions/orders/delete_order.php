<?php


    include_once "../../core.php";    


    if(isset($_GET['id']) && isset($_GET['a'])){
        $action = $_GET['a'];

        if($action == 'delete'){
            $id = $_GET['id'];            

            global $mysqli;
            global $tabela_os;

            $sql = "DELETE FROM $tabela_os WHERE `id` = $id";
            $query = $mysqli->query($sql);

            if($query){
                $_SESSION['msg-delete-order'] = ShowSessionMessage("success", "Ordem de serviço excluída com sucesso.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/orders/list-orders');
            } else {
                $_SESSION['msg-delete-order'] = ShowSessionMessage("error", "Ocorreu um erro ao tentar excluir a ordem de serviço.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/orders/list-orders');
            }
        }

    }


?>