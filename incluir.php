<?
	include "classe/conexao.php";
	include "classe/comboFromDb.class.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Sol Brilhante - Sistema de Pedidos</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script>
	function testaCampos() {
		if (document.form1.idPromotor.value == 0 ) {
			alert("Voce deve escolher o promotor");
			document.form1.acao.focus();
		}
		else
		{
		  document.form1.submit();
		}
	}
	
</script>
</head>
<body>
<form method="get" action="cliente.php" name="form1">

	   Escolha o Promotor:<br>
<?

		$idPromotor = $_GET['idPromotor'];

		$objPromotor = new comboFromDb("promotor", "id", "nome",$idPromotorx, "", "idPromotor","","class='combo'","class='combo'"); 
		$objPromotor->getFromDb();
		$objPromotor->displayCombo();
?>



    <input type="button" value="Pr&oacute;ximo" name="acao" onClick="testaCampos()" style="font-family:Tahoma; font-size:9px">
	</span>	
</form> 
</body>
</html>
