<?

  include "classe/conexao.php";
//    $sql = "select numeroPedidoClientee, dataPedido, dataEntrega from cabPedido p where dataPedido between '2011-03-10 00:00:00' and '2011-03-10 23:59:59' order by dataPedido desc";
    $sql = "select numeroPedidoCliente, dataPedido, dataEntrega from cabPedido p where dataPedido between '2011-03-10 00:00:00' and '2011-03-10 23:59:59' order by dataPedido desc";
	$ret = mysql_query($sql);

	while ($reg = mysql_fetch_array($ret)) {

	  echo $reg['numeroPedidoCliente']. '***'. $reg['dataPedido'].' / '.$reg['dataEntrega'].'<br>';	
	
	}
	
?>	