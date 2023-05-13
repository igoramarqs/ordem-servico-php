	
	
	<?php
	
		global $mysqli;
		global $tabela_os;

		require 'vendor/autoload.php';		
		
		$id_os = $_GET['id'];

		$sql_os 	= "SELECT * FROM $tabela_os WHERE `id` = $id_os";
		$query_os 	= $mysqli->query($sql_os);		

		if($query_os->num_rows > 0)
		{
			$dados_os = $query_os->fetch_assoc();

			if($dados_os['refDataConclusao'] == 0)
			{
				$dataConclusao = "??/??/????";
			} else {
				$dataConclusao = FormatDateTimeFromTimestamp($dados_os['refDataConclusao'],0);
			}

			if($dados_os['refDesconto'] == "")
			{
				$Desconto = "0%";
			} else {
				$Desconto = $dados_os['refDesconto'] . '%';
			}

			if($dados_os['refValorTotal'] == "")
			{
				$ValorTotal = "R$ 0,00";
			} else {
				$ValorTotal = formatReal($dados_os['refValorTotal']);
			}

			if ($dados_os["refStatus"] == 0) {
				$Status = "Em aberto";                                    
			} elseif ($dados_os["refStatus"] == 1) {
				$Status = "Finalizado";
			} elseif ($dados_os["refStatus"] == 2) {
				$Status = "Cancelado";                                    
			} else {                                        
				$Status = "Sem registro";
			}

			if ($dados_os["refFormaPagamento"] == 0) {
				$FormaPagamento = "PGTO. PENDENTE";                                    
			} elseif ($dados_os["refFormaPagamento"] == 1) {
				$FormaPagamento = "PGTO. DINHEIRO";
			} elseif ($dados_os["refFormaPagamento"] == 2) {
				$FormaPagamento = "PGTO. CARTÃO DÉBITO";
			} elseif ($dados_os["refFormaPagamento"] == 3) {
				$FormaPagamento = "PGTO. CARTÃO CRÉDITO";
			} else {                                        
				$FormaPagamento = "Sem registro";
			}

			if($dados_os['refParcelas'] == "")
			{
				$Parcelas = "0x";
			} else {
				$Parcelas = $dados_os['refParcelas'] . 'x';
			}

			if($dados_os['refServicos'] == "")
			{
				$Servicos = "Nenhum serviço.";
			} else {
				$Servicos = $dados_os['refServicos'];
			}

			$operador = getFullnameFromID($_SESSION['id']);

			$dados_impressao = 
			"
			<!DOCTYPE html>
			<html lang='pt-br'>
			<head>
					<meta charset='utf-8'>
					<link rel='stylesheet' href='css/os.css'>
			</head>
			<body>
				<div style='padding: 10px; text-align: center;'>
					<h2>".$CONFIGURATION['site_name']."</h2>
					<p>Ordem de serviço <strong>".$dados_os['refOs']."</strong></p>
					<p>Acompanhe o andamento de sua ordem de serviço em <a href='".$CONFIGURATION['site_url']."' target='_blank'>".$CONFIGURATION['site_url']."</a>
				</div>
				<div class='container'>
					<table>
						<tr>
						<th>Ref. OS</th>
						<td>".$dados_os['refOs']."</td>
						<th>Data de abertura da OS</th>
						<td>".FormatDateTimeFromTimestamp($dados_os['refDataAbertura'],0)."</td>
						</tr>
						<tr>
						<th>Cliente</th>
						<td>".$dados_os['refCliente']."</td>
						<th>Contato</th>
						<td>".formatPhoneNumber($dados_os['refContato'])."</td>
						</tr>
						<tr>
						<th>Descrição do defeito</th>
						<td colspan='3'>".$dados_os['refDescricaoDefeito']."</td>
						</tr>
						<tr>
						<th>Data de conclusão</th>
						<td>".$dataConclusao."</td>
						<th>Técnico responsável</th>
						<td>".$dados_os['refTecnico']."</td>
						</tr>
						<tr>
						<th>Observações</th>
						<td colspan='3'>".$dados_os['refObservacoes']."</td>
						</tr>
						<tr>
						<th>Itens a serem trocados</th>
						<td colspan='3'>".$dados_os['refItens']."</td>
						</tr>
						<tr>
						<th>Serviços</th>
						<td colspan='3'>".$Servicos."</td>
						</tr>
						<tr>
						<th>Desconto</th>
						<td>".$Desconto."</td>
						<th>Valor total</th>
						<td>".$ValorTotal."</td>
						</tr>
						<tr>
						<th>Forma de pagamento</th>
						<td>".$FormaPagamento."</td>
						<th>Parcelas</th>
						<td>".$Parcelas."</td>
						</tr>
						<tr>
						<th>Status</th>
						<td>".$Status."</td>
						<th>Documento gerado em</th>
						<td>".date("d/m/Y")." às ".date("H:i")."</td>
						</tr>
					</table>
					<table style='width:100%'>
					<tr>
						<td style='width:50%; text-align:center'>
						<p>Assinatura do técnico</p>
						<br>
						<br>
						<strong>_______________________________________</strong>
						</td>
						<td style='width:50%; text-align:center'>
						<p>Assinatura do cliente</p>
						<br>
						<br>
						<strong>_______________________________________</strong>			            
						</td>
					</tr>
					</table>
					<table>
						<tr>
						<td style='width:50%; text-align:center'>
						<p>Operador</p><br>
						".$operador."
						</td>
						<td style='width:50%; text-align:center'>
						<p>Data de emissão</p><br>
						".date("d/m/Y")." às ".date("H:i")."
						</td>
					</tr>
					</table>
					<footer class='mt-2' style='padding: 10px; text-align: center;'>
						<p>Para quaisquer dúvidas:</p>
						<p>Telefone: ".$CONFIGURATION['contato_telefone']."</p>
						<p>Email: ".$CONFIGURATION['contato_email']."</p>
						<p>Instagram: ".$CONFIGURATION['contato_instagram']."</p>
						<p>Endereço: ".$CONFIGURATION['contato_endereco']."</p>
						<p>CNPJ: ".$CONFIGURATION['contato_cnpj']."</p>
					</footer>
				</div>
			</body>
			</html>
			";				
			
			$mpdf = new \Mpdf\Mpdf([
				'mode' => 'utf-8',
				'orientation' => 'P',
				'format' => 'A4'
			]);			
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->WriteHTML($dados_impressao);			
			$mpdf->Output($dados_os['refOs'] . '.pdf', 'I');

		} else {
		    $_SESSION['msg-order-not-found-print'] = ShowSessionMessage("warning", "Ordem de serviço não encontrada.");
			header("Location: " . $CONFIGURATION['site_url'] . 'panel/orders/list-orders');
		}

	?>