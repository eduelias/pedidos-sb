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
<script type="text/javascript" src="js/funcao.js"></script>
<script>
	function buscaProduto(sdiv, cod) {
		pagina = "achaProduto.php?codProduto="+cod+"&nomeInput="+sdiv;
		temp = "document.getElementById('emb"+sdiv+"').innerHTML";
		ajaxGet(pagina,temp,false);	
		
		quant = document.getElementById("quant"+sdiv)		
		quant.setfocus();	
	
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
    <td><input type="text" name="prod1" id="Prod1" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd1"></div></td>
    <td><input type="text" name="quantProd1" id="quantProd1" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="prod2" id="Prod2" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd2"></div></td>
    <td><input type="text" name="quantProd2" id="quantProd2" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="prod3" id="Prod3" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd3"></div></td>
    <td><input type="text" name="quantProd3" id="quantProd3" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="prod4" id="Prod4" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd4"></div></td>
    <td><input type="text" name="quantProd4" id="quantProd4" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="prod5" id="Prod5" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd5"></div></td>
    <td><input type="text" name="quantProd5" id="quantProd5" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="prod6" id="Prod6" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd5"></div></td>
    <td><input type="text" name="quantProd6" id="quantProd6" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="prod7" id="Prod7" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd7"></div></td>
    <td><input type="text" name="quantProd7" id="quantProd7" width="20px" maxlength="3" size="3" /></td>
  </tr>
  <tr>
    <td><input type="text" name="prod8" id="Prod8" width="100px" maxlength="5" size="5"  onblur="buscaProduto(this.id,this.value)" /></td>
    <td><div id="embProd8"></div></td>
    <td><input type="text" name="quantProd8" id="quantProd8" width="20px" maxlength="3" size="3" /></td>
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
