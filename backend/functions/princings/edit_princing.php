<?php


    include_once "../../core.php";    


    if(isset($_POST['edit_princing'])){

        $id = $_GET['id'];

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_servicos;

        $msg = "msg-edit-princing";
                
        $nome               = $mysqli->real_escape_string($_POST['inputNomeServico']);
        $valor              = $mysqli->real_escape_string($_POST['inputValorServico']);        

        if(empty($nome)
        && empty($valor))
        {
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha todos os campos antes de prosseguir com a edição desta precificação de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/princing?id='. $id .'&a=edit');
        } elseif (empty($nome)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome' antes de prosseguir com a edição desta precificação de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/princing?id='. $id .'&a=edit');
        } elseif (empty($valor)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Valor' antes de prosseguir com a edição desta precificação de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/princing?id='. $id .'&a=edit');
        } else {  
            $sql = "UPDATE $tabela_servicos SET
                    `nome` = '$nome',
                    `valor` = '$valor',
                    WHERE `id`      = $id;                        
                ";                        
            $query = $mysqli->query($sql) or die($mysqli.__LINE__);
            if($query){
                $_SESSION[$msg] = ShowSessionMessage("success", "Precificação de serviço editada com sucesso.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/list-princings');
            } else {
                $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar editar a precificação de serviço.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/princing?id='. $id .'&a=edit');
            }
        }
    }


?>