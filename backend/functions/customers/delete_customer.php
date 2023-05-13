<?php


    include_once "../../core.php";    


    if(isset($_GET['id']) && isset($_GET['a'])){
        $action = $_GET['a'];

        if($action == 'delete'){
            $id = $_GET['id'];            

            global $mysqli;
            global $tabela_clientes;

            $sql = "DELETE FROM $tabela_clientes WHERE `id` = $id";
            $query = $mysqli->query($sql);

            if($query){
                $_SESSION['msg-delete-customer'] = ShowSessionMessage("success", "Cliente excluído com sucesso.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/customers/list-customers');
            } else {
                $_SESSION['msg-delete-customer'] = ShowSessionMessage("error", "Ocorreu um erro ao tentar excluir o cliente.");
                header("Location: " . $CONFIGURATION['site_url'] . 'panel/customers/list-customers');
            }
        }

    }


?>