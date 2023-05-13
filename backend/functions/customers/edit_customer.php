<?php


    include_once "../../core.php";    


    if(isset($_POST['edit_customer'])){

        $id = $_GET['id'];

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_clientes;

        $msg = "msg-edit-customer";        

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
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/customer?id='. $id .'&a=edit');
        } elseif (empty($nome_completo)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome completo' antes de prosseguir com a criação deste cliente.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/customer?id='. $id .'&a=edit');
        } elseif (empty($pessoa_tipo) && $pessoa_tipo == 0){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, selecione o campo 'Tipo pessoa' antes de prosseguir com a criação deste cliente.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/customer?id='. $id .'&a=edit');
        } elseif (empty($whatsapp)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'WhatsApp' antes de prosseguir com a criação deste cliente.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/customer?id='. $id .'&a=edit');
        } else { 
            $sql = "UPDATE $tabela_clientes SET
                    `nome_completo` = '$nome_completo',                                          
                    `email`         = '$email',
                    `endereco`      = '$endereco',
                    `rg`            = '$rg',
                    `cpf`           = '$cpf',
                    `cnpj`          = '$cnpj',
                    `pessoa_tipo`   = $pessoa_tipo,
                    `whatsapp`      = '$whatsapp'                    
                    WHERE `id`      = $id;                        
                ";                        
            $query = $mysqli->query($sql) or die($mysqli.__LINE__);
            if($query){
                $_SESSION[$msg] = ShowSessionMessage("success", "Cliente editado com sucesso.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/list-customers');
            } else {
                $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar editar o cliente.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/customers/customer?id='. $id .'&a=edit');
            }
        }
    }


?>