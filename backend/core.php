<?php

    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

    @ob_start();
    session_start();

    $mode = "dev";

    if($mode == "prod"){
        $root = $_SERVER['DOCUMENT_ROOT'];
        $page = basename($_SERVER['PHP_SELF']);
        if(!(file_exists($_SERVER['DOCUMENT_ROOT'] . "/config.ini"))) die('Erro 0x2');
        $CONFIGURATION = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
        $configFile = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
    } elseif ($mode == "dev") {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $page = basename($_SERVER['PHP_SELF']);
        $project_name = "ordem_servico";
        $CONFIGURATION = parse_ini_file($root . '/' . $project_name . '/config.ini');
        $configFile = file_get_contents($root . '/' . $project_name . '/config.ini');
    }

    include "mysql.php";
    $tabela_usuarios    = '`usuarios`';
    $tabela_clientes    = '`clientes`';
    $tabela_os          = '`os`';
    $tabela_servicos    = '`servicos`';

    function generatePasswordEncrypted($pass)
    {
        $options = [
            'cost' => 11,
        ];
        $senha_criptografada = password_hash($pass, PASSWORD_BCRYPT, $options);
        return $senha_criptografada;
    }

    function actuallyPage($actually_page)
    {
        global $page;
        if($actually_page == $page){
            echo "active";
        }
    }

    function GetTimestamp()
    {
        return time() + date("Z");
    }

    function FormatDateFromTimestamp($timestamp)
    {
        return gmdate("d/m/Y", $timestamp); //11/01/2002
    }

    function FormatTimeFromTimestamp($timestamp, $with_seconds)
    {
        if ($with_seconds == 1) {
            return gmdate("H:i:s", $timestamp);
        } else {
            return gmdate("H:i", $timestamp);
        }
    }

    function FormatDateTimeFromTimestamp($timestamp, $with_seconds)
    {
        if ($with_seconds == 1) {
            return gmdate("d/m/Y", $timestamp) . ' às ' . gmdate("H:i:s", $timestamp);
        } else {
            return gmdate("d/m/Y", $timestamp) . ' às ' . gmdate("H:i", $timestamp);
        }
    }

    function getUsernameFromID($id)
    {
        global $mysqli;
        global $tabela_usuarios;
        $sql = "SELECT * FROM $tabela_usuarios WHERE `id` = $id";
        $query = $mysqli->query($sql);

        if ($query) {
            if($query->num_rows > 0){
                $usuario = $query->fetch_assoc();
                return $usuario['usuario'];
            } else {
                return "Sem registro";
            }            
        }
    }

    function getFullnameFromID($id)
    {
        global $mysqli;
        global $tabela_usuarios;
        $sql = "SELECT * FROM $tabela_usuarios WHERE `id` = $id";
        $query = $mysqli->query($sql);

        if ($query) {
            $usuario = $query->fetch_assoc();
            return $usuario['nome_completo'];
        }
    }

    function getIDFromUsername($username)
    {
        global $mysqli;
        global $tabela_usuarios;
        $sql = "SELECT * FROM $tabela_usuarios WHERE `usuario` = '$username'";
        $query = $mysqli->query($sql);

        if ($query) {
            $usuario = $query->fetch_assoc();
            return $usuario['id'];
        }
    }

    function getCustomerFullNameFromID($id)
    {
        global $mysqli;
        global $tabela_clientes;
        $sql = "SELECT * FROM $tabela_clientes WHERE `id` = $id";
        $query = $mysqli->query($sql);

        if ($query) {
            $cliente = $query->fetch_assoc();
            return $cliente['nome_completo'];
        }
    }

    function ShowSessionMessage($type, $message)
    {
        if ($type == "info") {
            return "<div class='w-full text-center p-t-25'><div class='alert alert-info' role='alert'><strong>INFO:</strong> " . $message . "</div></div>";
        } elseif ($type == "success") {
            return "<div class='w-full text-center p-t-25'><div class='alert alert-success' role='alert'><strong>SUCESSO:</strong> " . $message . "</div></div>";
        } elseif ($type == "warning") {
            return "<div class='w-full text-center p-t-25'><div class='alert alert-warning' role='alert'><strong>ATENÇÃO:</strong> " . $message . "</div></div>";
        } elseif ($type == "error") {
            return "<div class='w-full text-center p-t-25'><div class='alert alert-danger' role='alert'><strong>ERRO:</strong> " . $message . "</div></div>";
        } else {
            return "<div class='w-full text-center p-t-25'><div class='alert alert-dark' role='alert'>" . $message . "</div></div>";
        }
    }

    function CountUsersRegistred()
    {
        global $tabela_usuarios;
        global $mysqli;
        $sql = "SELECT * FROM $tabela_usuarios";
        $query = $mysqli->query($sql);
        return $query->num_rows;
    }

    function CountCustomersRegistred()
    {
        global $tabela_clientes;
        global $mysqli;
        $sql = "SELECT * FROM $tabela_clientes";
        $query = $mysqli->query($sql);
        return $query->num_rows;
    }

    function CountOrdersOpenedRegistred()
    {
        global $tabela_os;
        global $mysqli;
        $sql = "SELECT * FROM $tabela_os WHERE `refStatus` = 0";
        $query = $mysqli->query($sql);
        return $query->num_rows;
    }

    function formatPhoneNumber($n)
    {
        $tam = strlen(preg_replace("/[^0-9]/", "", $n));
        
        if ($tam == 13)
        {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
            return "+".substr($n, 0, $tam-11)." (".substr($n, $tam-11, 2).") ".substr($n, $tam-9, 5)."-".substr($n, -4);
        }
        if ($tam == 12)
        {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
            return "+".substr($n, 0, $tam-10)." (".substr($n, $tam-10, 2).") ".substr($n, $tam-8, 4)."-".substr($n, -4);
        }
        if ($tam == 11)
        {
            // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return " (".substr($n, 0, 2).") ".substr($n, 2, 5)."-".substr($n, 7, 11);
        }
        if ($tam == 10)
        {
            // COM CÓDIGO DE ÁREA NACIONAL
            return " (".substr($n, 0, 2).") ".substr($n, 2, 4)."-".substr($n, 6, 10);
        }
        if ($tam <= 9)
        {
            // SEM CÓDIGO DE ÁREA
            return substr($n, 0, $tam-4)."-".substr($n, -4);
        }
    }
      
    function formatCPF($cpf) 
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $cpf = str_pad($cpf, 11, "0", STR_PAD_LEFT);
        $cpf = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
        return $cpf;
    }
      
    function formatCNPJ($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
        $cnpj = str_pad($cnpj, 14, "0", STR_PAD_LEFT);
        $cnpj = substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
        return $cnpj;
    }
      
    function formatRG($rg)
    {
        $rg = preg_replace('/[^0-9]/', '', $rg);
        $rg = str_pad($rg, 9, "0", STR_PAD_LEFT);
        $rg = substr($rg, 0, 2) . '.' . substr($rg, 2, 3) . '.' . substr($rg, 5, 3);
        return $rg;
    }

    function generateNumSO()
    {
        global $tabela_os;
        global $mysqli;
        $num_so = 'YBOS-'.mt_rand(10000000, 99999999);
        $sql = "SELECT * FROM $tabela_os WHERE `refOs` = '$num_so'";
        $query = $mysqli->query($sql);
        if($query->num_rows == 0){
            return $num_so;
        }        
    }

    function formatReal($valor)
    {
        $valor = number_format($valor, 2, ',', '.');
        return "R$ ".$valor;
    }      

?>