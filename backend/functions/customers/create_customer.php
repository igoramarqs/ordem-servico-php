<?php


    include_once "../../core.php";    


    if(isset($_POST['create_customer'])){

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_usuarios;
        $timestamp = GetTimestamp();

        $msg = "msg-create-customer";
                
        $nome_completo      = $mysqli->real_escape_string($_POST['inputNomeCompleto']);
        $email              = $mysqli->real_escape_string($_POST['inputEmail']);
        $endereco           = $mysqli->real_escape_string($_POST['inputEndereco']);        
        $rg                 = $mysqli->real_escape_string($_POST['inputRG']);
        $cpf                = $mysqli->real_escape_string($_POST['inputCPF']);
        $cnpj               = $mysqli->real_escape_string($_POST['inputCNPJ']);
        $pessoa_tipo        = $mysqli->real_escape_string($_POST['optionsTipoPessoa']);
        $whatsapp           = $mysqli->real_escape_string($_POST['inputTelefone']);

        if(empty($nome_completo)
        && empty($pessoa_tipo) && $pessoa_tipo == 0
         && empty($whatsapp))
        {
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha todos os campos antes de prosseguir com a criação deste cliente.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/add-customer');
        } elseif (empty($nome_completo)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome completo' antes de prosseguir com a criação deste cliente.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/add-customer');
        } elseif (empty($pessoa_tipo) && $pessoa_tipo == 0){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, selecione o campo 'Tipo pessoa' antes de prosseguir com a criação deste cliente.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/add-customer');
        } elseif (empty($whatsapp)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'WhatsApp' antes de prosseguir com a criação deste cliente.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/add-customer');
        } else {            

            $sql = "INSERT INTO $tabela_clientes 
                (
                    `nome_completo`, 
                    `email`, 
                    `endereco`, 
                    `rg`, 
                    `cpf`, 
                    `cnpj`, 
                    `pessoa_tipo`, 
                    `whatsapp`, 
                    `data_cadastro`
                ) VALUES 
                (
                    '$nome_completo',
                    '$email',
                    '$endereco',
                    '$rg',
                    '$cpf',
                    '$cnpj',
                    $pessoa_tipo,
                    '$whatsapp',
                    $timestamp
                )";
            $query = $mysqli->query($sql);
            if($query){
                ClearAllSaved();
                $_SESSION[$msg] = ShowSessionMessage("success", "Cliente registrado com sucesso.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/add-customer');
            } else {
                SaveAllInputs();
                $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar registrar o cliente.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/add-customer');
            }
        }
    }

    function SaveAllInputs(){                
        $_SESSION['SAVEDnome_completo'] = $_POST['inputNomeCompleto'];        
        $_SESSION['SAVEDemail'] = $_POST['inputEmail'];        
        $_SESSION['SAVEDendereco'] = $_POST['inputEndereco'];        
        $_SESSION['SAVEDtelefone'] = $_POST['inputTelefone'];   
        $_SESSION['SAVEDTipoPessoa'] = $_POST['optionsTipoPessoa']; 
        $_SESSION['SAVEDrg'] = $_POST['inputRG'];   
        $_SESSION['SAVEDcpf'] = $_POST['inputCPF'];   
        $_SESSION['SAVEDcnpj'] = $_POST['inputCNPJ'];   
    }

    function ClearAllSaved(){
        unset($_SESSION['SAVEDnome_completo']);
        unset($_SESSION['SAVEDemail']);
        unset($_SESSION['SAVEDendereco']);
        unset($_SESSION['SAVEDtelefone']);
        unset($_SESSION['SAVEDTipoPessoa']);
        unset($_SESSION['SAVEDrg']);
        unset($_SESSION['SAVEDcpf']);
        unset($_SESSION['SAVEDcnpj']);
    }


?>