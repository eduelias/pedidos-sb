<?
	session_start();
	include "bloqueio.php";
	include "classe/conexao.php";
	$idCoordenador = $_SESSION['idCoordenador'];	
	$idPedido = $_GET['id'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>Sol Brilhante - Pedido</title>
<script>
	function ativaBotao(){
		document.getElementById('cancela').style.visibility="visible";
	}
	
</script>
</head>

<body>
<?
	$sql = "SELECT pd.codigo as codigoProduto,
				   pd.descricao as descricaoProduto,
				   pd.unidade as unidadeProduto,
				   i.quantidade as quantidadeItem,
				   i.tipo as tipoItem,
				   c.codFilial as codigoFilial,
				   c.razaoSocial as razaoSocial,
				   pr.nome as nomePromotor,
				   p.id as numeroPedido,
				   p.dataPedido as dataPedido,
				   p.status as statusPedido,
				   i.status as statusItem,
				   i.id as idItem,
				   p.dataEntrega,
				   p.numeroPedidoCliente
			  FROM cabPedido p left join promotor pr on p.idPromotor = pr.id,
				   itemPedido i,
				   produto pd,
				   cliente c

			where p.id = i.idCabPedido
			  and p.idCoordenador = $idCoordeandor
			  and i.idProduto = pd.id
			  and p.idCliente = c.id
			  and p.id = $idPedido";
			  
			  
	$res = mysql_query($sql);
	$cab = 'S';
echo '<form method="GET" action="cancelarItem.php">';	
    while($ret = mysql_fetch_array($res)){
		if ($cab == 'S') {
			echo '<input type="hidden" name="idPedido" value="'.$idPedido.'"';
			echo 'Promotor : '.$ret['nomePromotor'].'<br>';
			echo ' Cliente : '.$ret['codigoFilial'].' - '.$ret['razaoSocial'].'<br>';
			echo 'Pedido N.: '.$ret['numeroPedido'].' Status: '.$ret['statusPedido'].'<br>';			
			echo 'Data Prev. Entrega: '.date('d/m/Y',strtotime($ret['dataEntrega'])).' N.Ped.Cliente: '.$ret['numeroPedidoCliente'];
			echo '<hr>';
			echo '<table>';
	        $cab = 'N';
		}
		if ($ret['statusItem']== 'A') {
			echo '<tr>';
			echo '<td><input type="checkbox" id="escolha" name="escolha[]" value="'.$ret['idItem'].'" onClick="ativaBotao()"></td><td align="right">'.$ret['quantidadeItem'].'</td><td>'.$ret['unidadeProduto'].'</td><td>'.$ret['tipoItem'].'<td>'.$ret['statusItem'].'</td><td>'.$ret['codigoProduto'].'</td><td>'.$ret['descricaoProduto'].'</td>';
			echo '</tr>';
		}
		else
		{
			echo '<tr style="color:#CCCCCC">';
			echo '<td>&nbsp;</td><td align="right">'.$ret['quantidadeItem'].'</td><td>'.$ret['unidadeProduto'].'</td><td>'.$ret['tipoItem'].'<td>'.$ret['statusItem'].'</td><td>'.$ret['codigoProduto'].'</td><td>'.$ret['descricaoProduto'].'</td>';
			echo '</tr>';
		
		}
		
	}
	echo '</table>';
	echo '<hr>';	
	if ($statusPedido == "S") {
		
	}
?>
	<input type="button" name="acao" value="Voltar p/ o Menu" onclick="javascript:document.location='index.php'" />
	<input type="submit" id="cancela" name="cancela" value="Cancelar itens marcardos" style="visibility:hidden" />	
</form>	
</body>
</html>
