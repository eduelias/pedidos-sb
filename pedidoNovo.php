<?
	session_start();
	

	include "bloqueio.php";
	$idCoordenador = $_SESSION['idCoordenador'];
	$idPromotor = $_SESSION['idPromotor'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sol Brilhante - Pedido</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body>
<?

	include "classe/conexao.php";

	$nomePromotor        = $_GET['nomePromotor'];
	$idCliente           = $_GET['idCliente'];
	$quant816            = $_GET['quant816'];
	$acao                = $_GET['acao'];	
	$anoDataEntrega      = $_GET['anoDataEntrega'];
	$mesDataEntrega      = $_GET['mesDataEntrega']; 
	$diaDataEntrega      = $_GET['diaDataEntrega'];
	$numeroPedidoCliente = $_GET['numeroPedidoCliente'];
	
	if ($acao == 'Gravar') {
		
		$sql = "select codFilial, razaoSocial, id, idRede from cliente where id = $idCliente";
		$ret=mysql_fetch_array(mysql_query($sql));
		
//		echo 'Promotor: '.$nomePromotor.'<br>';
		echo 'Cliente: '.$ret['razaoSocial'].'<br>';
		
		$idRede = $ret['idRede'];

		echo '<form action="index.php" method="GET" name="formGrava">';
		echo '<table border="0">';
		echo '<tr>';
		echo '<td>Quant</td><td align="right">$</td><td>Und</td><td>Tp</td><td>Descricao</td>'; 
		echo '</tr>';
		
		$dataEntrega = $_GET['anoDataEntrega'].'-'.$_GET['mesDataEntrega'].'-'.$_GET['diaDataEntrega'];
    	$dataEntrega = $anoDataEntrega.'-'. substr((string)(100+(int)$mesDataEntrega),1,2).'-'.substr((string)(100+(int)$diaDataEntrega),1,2);		

		$sql = "insert into cabPedido (idCoordenador, idPromotor, idCliente, dataPedido, dataEntrega, numeroPedidoCliente, tipo) 
				values ($idCoordenador, $idPromotor, $idCliente,'".date('Y-m-d H:i:s')."','$dataEntrega', '$numeroPedidoCliente', 'V')";
		mysql_query($sql);
		$idCabPedido=mysql_insert_id();
		
	$sql = "select p.codigo, p.descricao as descProduto, e.descricao as codEmbalagem, p.id as idProduto, t.preco 
	     from produto p, tabelaPreco t, embalagem e
		where p.id = t.idproduto
		  and p.idEmbalagem = e.id
		  and t.idrede = $idRede		  
    	  order by p.codigo";
    	$ret=mysql_query($sql);
		while ( $res = mysql_fetch_array($ret)) {
			$qtProduto  = "quant".$res['codigo'];
			$tipoPedido = "tipo".$res['codigo'];
			
			$idProduto = $res['idProduto'];
			$sql = "select preco from promocao p
					 where p.idrede = $idRede
					   and p.idfilial = $idCliente
					   and p.idProduto = $idProduto
					   and '$dataEntrega' between p.datainicio and p.datafim
					   order by preco asc limit 1";

			$resPromocao = mysql_query($sql);
			$preco = mysql_fetch_array($resPromocao);
			

			
			if (mysql_num_rows($resPromocao) == 0) {
				$precoProduto = $res['preco'];
			}
			else
			{
				$precoProduto = $preco['preco'];
			}
			
			$$qtProduto = $_GET[$qtProduto];			
			$$tipoPedido = $_GET[$tipoPedido];
			if ( $$qtProduto != '' ) {
				echo '<tr>';
				echo '<td>'.$$qtProduto.'</td>';
				echo '<td align="right">'.$precoProduto.'</td>';				
				echo '<td>'.$res['codEmbalagem'].'</td>';
				echo '<td>'.$$tipoPedido.'</td>';				
				echo '<td>'.$res['descProduto'].'</td>';
				echo '</tr>';
				
				$quant = $$qtProduto;
				$tipo = 'V';
				
				$sql = "insert into itemPedido (idCabPedido, idProduto, quantidade, preco, tipo)
						values ( $idCabPedido,$idProduto, $quant, $precoProduto, '$tipo')";
						
				mysql_query($sql);			
				
			}
		}
		
		echo '</table>';
?>
		<script>
			alert("O seu pedido foi gravado com sucesso! N. Pedido: <?=$idCabPedido?> ");
		</script>
<?		
		echo '<br />';
		echo '<br />';
		echo '<input type="submit" name="acao" value="Novo Pedido" />&nbsp;&nbsp;';
    	echo '</form>';
	}
	else
	{

?>

<form action="" method="get">
	<input type="hidden" name="idPromotor" value="<?=$idPromotor?>" />
    <input type="hidden" name="idCliente" value="<?=$idCliente?>"/>
    <input type="hidden" name="anoDataEntrega" value="<?=$anoDataEntrega?>" />
    <input type="hidden" name="mesDataEntrega" value="<?=$mesDataEntrega?>" />
    <input type="hidden" name="diaDataEntrega" value="<?=$diaDataEntrega?>" />        
    <input type="hidden" name="numeroPedidoCliente" value="<?=$numeroPedidoCliente?>" />            
	
	<table cellpadding="0" cellspacing="0" width="500">
	<tr>
    	<td width="31">Quant</td>
        <td width="25px">CD</td>
        <td width="25px" align="right">$</td>
        <td width="35px">&nbsp;Emb</td>
        <td width="314">Descri&ccedil;&atilde;o</td>
    </tr>
    
<?    

	$sql = "select codFilial, razaoSocial, id, idRede from cliente where id = $idCliente";
	$ret=mysql_fetch_array(mysql_query($sql));
	
	echo 'Promotor: '.$nomePromotor.'<br>';
	echo 'Cliente: '.$ret['razaoSocial'].'<br>';
	
	$idRede = $ret['idRede'];
	$dataEntrega = $anoDataEntrega.'-'. substr((string)(100+(int)$mesDataEntrega),1,2).'-'.substr((string)(100+(int)$diaDataEntrega),1,2);

	$sql = "select *,p.id as idProduto, p.descricao as descProduto, e.descricao as codEmbalagem from produto p, tabelaPreco t, embalagem e
		where p.id = t.idproduto
		  and p.idEmbalagem = e.id
		  and t.idrede = $idRede		  
    	  order by p.codigo";
	  
	$ret=mysql_query($sql); 	
	while ( $res = mysql_fetch_array($ret)) {
		$idProduto = $res['idProduto'];
		$sql = "select preco from promocao p
				 where p.idrede = $idRede
				   and p.idfilial = $idCliente
				   and p.idProduto = $idProduto
				   and '$dataEntrega' between p.datainicio and p.datafim
				   order by preco asc limit 1";
		$resPromocao = mysql_query($sql);
		$preco = mysql_fetch_array($resPromocao);
	
		if (mysql_num_rows($resPromocao) == 0) {
			$precoProduto = $res['preco'];
			$cor = 'Normal';
		}
		else
		{
			$precoProduto = $preco['preco'];
			$cor = 'style="color:#CC0000;font-weight:bold"';
		}
		
?>
		<tr>
        	<td><input type="text" maxlength="4" size="4" name="quant<?=$res['codigo']?>" /></td>
            <td><?=$res['codigo']?></td>
            <td align="right" <?=$cor?>><?=$precoProduto?></td>
            <td>&nbsp;<?=$res['codEmbalagem'];?></td>
            <td><?=$res['descProduto']?></td>
        </tr> 

<?			
	
	}	
?>	
	</table>
    
  <input type="submit" name="acao" value="Gravar" />
</form>    
<? } ?>
</body>
</html>
