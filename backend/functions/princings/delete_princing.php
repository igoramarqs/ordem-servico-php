<?php


    include_once "../../core.php";    


    if(isset($_GET['id']) && isset($_GET['a'])){
        $action = $_GET['a'];

        if($action == 'delete'){
            $id = $_GET['id'];            

            global $mysqli;
            global $tabela_servicos;

            $sql = "DELETE FROM $tabela_servicos WHERE `id` = $id";
            $query = $mysqli->query($sql);

            if($query){
                $_SESSION['msg-delete-princing'] = ShowSessionMessage("success", "Precificação de serviço excluída com sucesso.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/princings/list-princings');
            } else {
                $_SESSION['msg-delete-princing'] = ShowSessionMessage("error", "Ocorreu um erro ao tentar excluir a precificação de serviço.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/princings/list-princings');
            }
        }

    }


?>