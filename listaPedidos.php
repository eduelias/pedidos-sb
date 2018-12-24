<?
	session_start();
	include "bloqueio.php";
	include "classe/conexao.php";
	$idCoordenador = $_SESSION['idCoordenador'];	
	$order = $_GET['order'];
	if ($order == '' ) {
		$order = 'id';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sol Brilhante - Pedidos</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
<h3>Lista dos 100 últimos pedidos</h3>
<table cellpadding="0" cellspacing="0" width="450px">
	<tr>
    	<td><a href="listaPedidos.php?order=p.id">Pedido</a></td><td><a href="listaPedidos.php?order=p.dataPedido">Data</a></td><td><a href="listaPedidos.php?order=c.razaoSocial">Cliente</a></td>        
    </tr>
    <tr>
    	<td colspan="3"><hr /></td>
    </tr>
<?

	$sql = "select distinct p.id, p.dataPedido, c.codFilial, c.razaoSocial  
	          from cabPedido p, cliente c where p.idCliente = c.id and p.idCoordenador = $idCoordenador order by $order desc limit 0,100"; // group by p.id, p.dataPedido, c.codFilial, c.razaoSocial";
	$res = mysql_query($sql);
	while ($ret = mysql_fetch_array($res)) {
		echo '<tr>';
    	echo '<td><a href="mostraPedido.php?id='.$ret['id'].'">'.$ret['id'].'</a></td><td>'.date('d/m/Y H:i',strtotime($ret['dataPedido'])).'</td>';
		echo '<td>';
		echo '<table cellpadding="0" cellspacing="0" width="100%">';
		echo '<tr><td width="30px" align="right">'.$ret['codFilial'].'-</td><td>'.$ret['razaoSocial'].'</td></tr>';
		echo '</table>';
		echo '</td>';
		echo '</tr>';
		
	}
?>    
        	
</table>
<br />
<br />
<input type="button" name="acao" value="Voltar p/ o Menu" onclick="javascript:document.location='index.php'" />

</body>
</html>
