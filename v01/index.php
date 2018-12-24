<?
	session_start();
	include "bloqueio.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script>
	function novoPedido() {
		document.location = "incluir.php";
	}
	
	function listaPedido() {
		document.location = "listaPedidos.php";
	}
	
	function sair(){
		document.location = "sair.php";		
	}
	
</script>
</head>


<body>
<table width="100px">
<tr align="center">
	<td align="center">
		<input type="button" name="escolha" value="NOVO PEDIDO" onclick="novoPedido()" style="width:150px; height:50px;font-size:12px" /><br />
		<input type="button" name="escolha" value="LISTAR PEDIDOS" onclick="listaPedido()" style="width:150px; height:50px;font-size:12px"  /><br />
		<input type="button" name="escolha" value="SAIR" onclick="sair()" style="width:150px; height:50px;font-size:12px"  />		
    </td>
</tr>
</table>  
</body>
</html>
