<?php


    include_once "../../core.php";    


    if(isset($_POST['create_os'])){

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_os;
        $timestamp = GetTimestamp();

        $msg = "msg-create-order";
                
        $os             = $mysqli->real_escape_string($_POST['inputRefOS']);
        $cliente        = $mysqli->real_escape_string($_POST['inputNomeCompleto']);
        $tecnico        = $mysqli->real_escape_string($_POST['inputTecnicoResponsavel']);        
        $telefone       = $mysqli->real_escape_string($_POST['inputTelefone']);
        $defeito        = $mysqli->real_escape_string($_POST['inputDescDefeito']);
        $itens          = $mysqli->real_escape_string($_POST['inputItens']);
        $total          = $mysqli->real_escape_string($_POST['inputValorTotal']);
        $desconto       = $mysqli->real_escape_string($_POST['inputDesconto']);
        $pagamento      = $mysqli->real_escape_string($_POST['optionsFormaPagamento']);
        $parcelas       = $mysqli->real_escape_string($_POST['inputParcelas']);
        $dtconclusao    = $mysqli->real_escape_string($_POST['inputDataConclusao']);
        $status         = $mysqli->real_escape_string($_POST['optionsStatus']);
        $observacoes    = $mysqli->real_escape_string($_POST['inputObservacoes']);
        $servicos       = $mysqli->real_escape_string($_POST['servicos-selecionados']);

        if(empty($os)
        && empty($cliente)
        && empty($tecnico)
        && empty($telefone)
        && empty($total))
        {
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha todos os campos antes de prosseguir com a criação desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/add-order');
        } elseif (empty($os)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Ref OS' antes de prosseguir com a criação desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/add-order');
        } elseif (empty($cliente)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome completo do cliente' antes de prosseguir com a criação desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/add-order');
        } elseif (empty($tecnico)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Técnico responsável' antes de prosseguir com a criação desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/add-order');
        } elseif (empty($telefone)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'WhatsApp' antes de prosseguir com a criação desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/add-order');
        } else {            

            $sql = "INSERT INTO $tabela_os 
                (
                    `refOs`, 
                    `refDataAbertura`, 
                    `refCliente`, 
                    `refContato`, 
                    `refDescricaoDefeito`, 
                    `refDataConclusao`, 
                    `refTecnico`, 
                    `refObservacoes`, 
                    `refItens`,
                    `refServicos`,
                    `refDesconto`,
                    `refValorTotal`,
                    `refFormaPagamento`,
                    `refParcelas`,
                    `refStatus`,
                    `refCriadoEm`,
                    `refEditadoEm`,
                    `refUltimoEditor`
                ) VALUES 
                (
                    '$os',
                    $timestamp,
                    '$cliente',
                    '$telefone',
                    '$defeito',
                    '$dtconclusao',
                    '$tecnico',
                    '$observacoes',
                    '$itens',
                    '$servicos',
                    '$desconto',
                    '$total',
                    '$pagamento',
                    '$parcelas',
                    '$status',
                    $timestamp,
                    0,
                    0
                )";
            $query = $mysqli->query($sql);
            if($query){
                ClearAllSaved();
                $_SESSION[$msg] = ShowSessionMessage("success", "Ordem de serviço registrada com sucesso.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/add-order');
            } else {
                SaveAllInputs();
                $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar registrar a ordem de serviço.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/add-order');
            }
        }

        if (isset($_POST['servicos'])) {
            $selecionados = array();
            foreach ($_POST['servicos'] as $valor) {
                if (in_array($valor, $_POST['servicos'])) {
                    $selecionados[] = $valor;
                }
            }
            if (!empty($selecionados)) {
                echo 'Os seguintes serviços foram selecionados: ' . implode(', ', $selecionados);
            } else {
                echo 'Nenhum serviço foi selecionado';
            }
        }

    }

    function SaveAllInputs(){                
        $_SESSION['SAVEDnome_completo'] = $_POST['inputNomeCompleto'];        
        $_SESSION['SAVEDtec_responsavel'] = $_POST['inputTecnicoResponsavel'];        
        $_SESSION['SAVEDdesc_defeito'] = $_POST['inputDescDefeito'];        
        $_SESSION['SAVEDtelefone'] = $_POST['inputTelefone'];   
        $_SESSION['SAVEDitens'] = $_POST['inputItens']; 
        $_SESSION['SAVEDvalor_total'] = $_POST['inputValorTotal'];   
        $_SESSION['SAVEDdesconto'] = $_POST['inputDesconto'];   
        $_SESSION['SAVEDFormaPagamento'] = $_POST['optionsFormaPagamento'];   
        $_SESSION['SAVEDparcelas'] = $_POST['inputParcelas'];   
        $_SESSION['SAVEDdata_conclusao'] = $_POST['inputDataConclusao'];   
        $_SESSION['SAVEDstatus'] = $_POST['optionsStatus'];   
        $_SESSION['SAVEDobservacoes'] = $_POST['inputObservacoes'];  
    }

    function ClearAllSaved(){
        unset($_SESSION['SAVEDnome_completo']);
        unset($_SESSION['SAVEDtec_responsavel']);
        unset($_SESSION['SAVEDdesc_defeito']);
        unset($_SESSION['SAVEDtelefone']);
        unset($_SESSION['SAVEDitens']);
        unset($_SESSION['SAVEDvalor_total']);
        unset($_SESSION['SAVEDdesconto']);
        unset($_SESSION['SAVEDFormaPagamento']);
        unset($_SESSION['SAVEDparcelas']);
        unset($_SESSION['SAVEDdata_conclusao']);
        unset($_SESSION['SAVEDstatus']);
        unset($_SESSION['SAVEDobservacoes']);
    }


?>