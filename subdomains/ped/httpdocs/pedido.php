<?
	include "classe/conexao.php";
	include "classe/comboFromDb.class.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8559-1" />
<title>Sol Brilhante - Pedido</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script>
	function alerta() {
		document.pedido.embalagem1.value ='Cx';
	}
</script>
</head>

<body>
<?
    $idPromotor = $_GET['idPromotor'];
	$nomePromotor = $_GET['nomePromotor'];
	$idCliente = $_GET['idCliente'];
	$sql = "select codFilial, razaoSocial, id from cliente where id = $idCliente";
	$ret=mysql_fetch_array(mysql_query($sql));
	
	echo 'Promotor: '.$nomePromotor.'<br>';
	echo 'Cliente: '.$ret['razaoSocial'].'<br>';	
?>
<form name="pedido">
<table border="" bgcolor="#0099FF" cellpadding="0" cellspacing="0">
  <tr>
    <td>Produto</td>
    <td>Embalagem</td>
    <td>Quant</td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5"  onblur="alerta()" /></td>
    <td><input type="text" name="embalagem1" id="embalagem1" value="" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5" /></td>
    <td><input type="text" name="textfield" id="textfield" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5"/></td>
    <td><input type="text" name="textfield" id="textfield" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5"/></td>
    <td><input type="text" name="textfield" id="textfield" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5"/></td>
    <td><input type="text" name="textfield" id="textfield" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5"/></td>
    <td><input type="text" name="textfield" id="textfield" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5"/></td>
    <td><input type="text" name="textfield" id="textfield" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" id="textfield" width="100px" maxlength="5" size="5"/></td>
    <td><input type="text" name="textfield" id="textfield" width="100px" /></td>
    <td><input type="text" name="textfield" id="textfield" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr> 
  	<td colspan="3">
    	<hr />
    </td>
  </tr>
  
  <tr>
    <td colspan="3">
    	<input type="button" name="textfield" id="textfield" value="Ver Pedido" width="100px" maxlength="5" size="5"/>&nbsp;
		<input type="button" name="textfield" id="textfield" value="Abandonar" width="100px" maxlength="5" size="5"/>&nbsp;    
		<input type="button" name="textfield" id="textfield" value="Gravar" width="100px" maxlength="5" size="5"/>&nbsp;        
    
    </td>
  </tr>
  
  
</table>



</form>
</body>
</html>
