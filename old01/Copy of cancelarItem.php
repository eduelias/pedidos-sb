<?
    session_start();
	include "bloqueio.php";
	include "classe/conexao.php";
	$idPedido = $_GET['idPedido'];
	$arr=$_GET['escolha'];
	$c = count($arr);
	for ($i = 0; $i < $c; $i++) {
		$x = $arr[$i];
		$sql = "update itemPedido set status = 'C' where id = $x";
		mysql_query($sql);
	}
	
	header("location:mostraPedido.php?id=$idPedido");


?>