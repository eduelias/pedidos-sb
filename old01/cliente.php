<?
	include "classe/conexao.php";
	include "classe/comboFromDb.class.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Solbrilhante - Pedidos</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script>
	function testaCampos() {
		if (document.form1.idCliente.value == 0 ) {
			alert("Voce deve escolher o cliente");
			document.form1.idCliente.focus();
		}
		
		document.form1.submit();
	}
</script>
</head>

<body>
	<form name="form1" action="pedidoNovo.php" method="get" onsubmit="testaCampos()">
	<?
        $idPromotor = $_GET['idPromotor'];
        $sql = "select id, nome from promotor where id = $idPromotor";
        $ret = mysql_fetch_array( mysql_query($sql));	
    
        echo 'Promotor: '.$ret['nome'].'<br><br>';
		echo 'Escolha o cliente:'.'<br>';
        $objPromotor = new comboFromDb("cliente c, promotor_cliente pc ", "id", "concat(codfilial,' - ',razaoSocial)", "", "where c.id = idCliente and pc.idPromotor=".$idPromotor, "idCliente","","class='combo'","class='combo'"); 
        $objPromotor->getFromDb();
        $objPromotor->displayCombo();
		echo '<br><br>';
		echo '<label>Data p/ Entrega</label><br>';		
		echo '<select name="diaDataEntrega">';
		for ($i=1; $i<=31; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		echo '</select>&nbsp;&nbsp;';
		
		echo '<select name="mesDataEntrega">';
		for ($i=1; $i<=12; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		echo '</select>&nbsp;&nbsp;';

		echo '<select name="anoDataEntrega">';		
		for ($i=2008; $i<=2012; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
		echo '</select>&nbsp;&nbsp';				
		
		echo '<br><br>';
		echo '<label>N&ugrave;mero do Pedido do Cliente</label><br>';
        echo '<input type="text" name="numeroPedidoCliente" maxlenght="17" size="15">';
		echo '<br><br>';
		
    ?>
        <input type="hidden" name="nomePromotor" value="<?=$ret['nome']?>" style="" />
        <input type="hidden" name="idPromotor" value="<?=$idPromotor?>" />
		<input type="button" value="Continuar >>>" name="acao"  onclick="testaCampos()" style="font-family:Tahoma; font-size:9px">        
	</form>

</body>


</html>
