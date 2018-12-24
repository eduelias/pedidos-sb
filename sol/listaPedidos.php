<?
	include "../classe/conexao.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-'" />
<title>Sol Brilhante - Administracao</title>
<script type="text/javascript" src="../js/funcao.js"></script>
<script>
	function buscaPedido(sdiv) {

		document.getElementById('p62').innerHTML = "<div id='p62' class='pedido'>...<div>";	
	
		pagina = "http://ped.solbrilhante.ind.br/sol/teste.php";
		temp = "document.getElementById('p"+sdiv+"').innerHTML";
		ajaxGet(pagina,temp,true);	
	}


</script>
<style>
.pedido { margin:0 0 0 0; padding:0 0 0 0}
</style>
</head>
<body>
<table>
	<tr>
		<td>Coordenador</td>
	</tr>
<?

	$antes = '';
	$sql = "select * from coordenador order by nome";
	$res=mysql_query($sql);	
	while ($ret = mysql_fetch_array($res)) {
		echo '<tr><td>';
		echo '<a href="mostraPedidos.php?id='.$ret['id'].')">'.$ret['nome'].'</a>';
		echo '<div id="p'.$ret['id'].'" class="pedido">...</div>';
		echo '</td></tr>';
	}	
?>

</table>

</body>
</html>
