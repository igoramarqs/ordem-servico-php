<?php


    include_once "../../core.php";    


    if(isset($_POST['edit_os'])){

        $id = $_GET['id'];

        global $CONFIGURATION;
        global $mysqli;
        global $tabela_os;
        $user = $_SESSION['id'];
        $timestamp = GetTimestamp();

        $msg = "msg-edit-order";
                
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

        if(empty($os)
        && empty($cliente)
        && empty($tecnico)
        && empty($telefone)
        && empty($total))
        {
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha todos os campos antes de prosseguir com a edição desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/order?id='. $id .'&a=edit');
        } elseif (empty($os)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Ref OS' antes de prosseguir com a edição desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/order?id='. $id .'&a=edit');
        } elseif (empty($cliente)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Nome completo do cliente' antes de prosseguir com a edição desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/order?id='. $id .'&a=edit');
        } elseif (empty($tecnico)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'Técnico responsável' antes de prosseguir com a edição desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/order?id='. $id .'&a=edit');
        } elseif (empty($telefone)){
            SaveAllInputs();
            $_SESSION[$msg] = ShowSessionMessage("error", "Por favor, preencha o campo 'WhatsApp' antes de prosseguir com a edição desta ordem de serviço.");
            header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/order?id='. $id .'&a=edit');
        } else { 
            $sql = "UPDATE $tabela_os SET
                    `refCliente` = '$cliente',
                    `refContato` = '$telefone',
                    `refDescricaoDefeito` = '$defeito',
                    `refDataConclusao` = '$dtconclusao',
                    `refTecnico` = '$tecnico',
                    `refObservacoes` = '$observacoes',
                    `refItens` = '$itens',
                    `refDesconto` = $desconto,
                    `refValorTotal` = '$total',
                    `refFormaPagamento` = $pagamento,
                    `refParcelas` = '$parcelas',
                    `refStatus` = $status,
                    `refEditadoEm` = $timestamp,
                    `refUltimoEditor` = $user
                    WHERE `id`      = $id;                        
                ";                        
            $query = $mysqli->query($sql) or die($mysqli.__LINE__);
            if($query){
                $_SESSION[$msg] = ShowSessionMessage("success", "Ordem de serviço editada com sucesso.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/list-orders');
            } else {
                $_SESSION[$msg] = ShowSessionMessage("error", "Ocorreu um erro ao tentar editar a ordem de serviço.");
                header('Location:' . $CONFIGURATION['site_url'] . 'panel/orders/order?id='. $id .'&a=edit');
            }
        }
    }


?>