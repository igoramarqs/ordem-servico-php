<?php


    include_once "../../core.php";    


    if(isset($_POST['create_princing'])){

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_servicos;
        $timestamp = GetTimestamp();

        $msg = "msg-create-princing";
                
        $nome               = $mysqli->real_escape_string($_POST['inputNomeServico']);
        $valor              = $mysqli->real_escape_string($_POST['inputValorServico']);        

        if(empty($nome)
        && empty($valor))
        {
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha todos os campos antes de prosseguir com a criação desta precificação de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/add-princing');
        } elseif (empty($nome)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome' antes de prosseguir com a criação desta precificação de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/add-princing');
        } elseif (empty($valor)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Valor' antes de prosseguir com a criação desta precificação de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/add-princing');
        } else {            

            $sql = "INSERT INTO $tabela_servicos 
                (
                    `nome`, 
                    `valor`                    
                ) VALUES 
                (
                    '$nome',
                    '$valor'                    
                )";
            $query = $mysqli->query($sql);
            if($query){
                ClearAllSaved();
                $_SESSION[$msg] = ShowSessionMessage("success", "Precificação de serviço registrada com sucesso.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/add-princing');
            } else {
                SaveAllInputs();
                $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar registrar a precificação de serviço.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/princings/add-princing');
            }
        }
    }

    function SaveAllInputs(){                
        $_SESSION['SAVEDnome_servico'] = $_POST['inputNomeServico'];        
        $_SESSION['SAVEDvalor_servico'] = $_POST['inputValorServico'];
    }

    function ClearAllSaved(){
        unset($_SESSION['SAVEDnome_servico']);
        unset($_SESSION['SAVEDvalor_servico']);
    }


?>