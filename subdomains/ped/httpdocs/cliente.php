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
</head>

<body>
	<form action="pedido.php" method="get">
	<?
        $idPromotor = $_GET['idPromotor'];
        $sql = "select id, nome from promotor where id = $idPromotor";
        $ret = mysql_fetch_array( mysql_query($sql));	
    
        echo 'Promotor: '.$ret['nome'].'<br>';
        $objPromotor = new comboFromDb("cliente c, promotor_cliente pc ", "id", "concat(codfilial,' - ',razaoSocial)", "", "where c.id = idCliente and pc.idPromotor=".$idPromotor, "idCliente","","class='combo'","class='combo'"); 
        $objPromotor->getFromDb();
        $objPromotor->displayCombo();
        
    ?>
        <input type="hidden" name="nomePromotor" value="<?=$ret['nome']?>" />
        <input type="hidden" name="idPromotor" value="<?=$idPromotor?>" />
		<input type="submit" value="Ok" name="acao" style="font-family:Tahoma; font-size:9px">        
	</form>

</body>
</html>
