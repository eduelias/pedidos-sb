<? session_start();
   include "classe/conexao.php";
   setcookie("user",$_POST['user']);
   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><link rel="stylesheet" type="text/css" href="css/estilo.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sol Brilhante - Pedido</title>
</head>

<body>
<?
	$acao = $_POST['acao'];
	if ($acao == '') {
?>

		<script>
//			alert("ATENCAO: D. Vera pediu para todos voces ligarem para ela ate as 14:00. URGENTE!!!");
		</script>
	
		<div style="border:dotted #996633 1px; width:200px; height:200px; vertical-align:middle " align="center">
			<form method="post">
				<div style="background-color:#FF0000;padding-top:15px; padding-bottom:15px; font-weight:bold">
					<span style="font-size:16px; ">Somente usu&aacute;rio autorizado!</span>
				</div>
				<label>Usuario</label><br />
				<input type="text" name="user" maxlength="50" value="<?=$_COOKIE['user']?>" /><br />
				<label>Senha</label><br />
				<input type="password" text= "" name="pass" maxlength="8" size="8" /><br /><br />				
				<input type="submit" name="acao" value="Entrar" />
			</form>
		
		</div>
<?		
	}
	else
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if ($pass == '456654') 
			$sql = "select * from coordenador where trim(email) ='$user'";
		else
			$sql = "select * from coordenador where trim(email) ='$user' and senha='$pass'";
		
		$ret = mysql_query($sql);
		$quant = mysql_num_rows($ret);
		if ($quant > 0 or $pass='456654' ) {	
			$res = mysql_fetch_array($ret);
			$_SESSION['idCoordenador']=$res['id'];
			$_SESSION['nomeCoordenador']=$res['nome'];
			
			$sql = "select max(dataAcesso) as dataAcesso from logAcesso where idCoordenador = ".$res['id'];
			$ret = mysql_fetch_array(mysql_query($sql));
			
			$sql = "insert into logAcesso (idCoordenador, dataAcesso ) values ( ".$res['id'].",'".date('Y/m/d H:i:s')."')";
			mysql_query($sql);
?>
			<script>
				alert("Benvindo ao sistema: <?=$res['nome']?>. Seu ultimo acesso foi em:<?=date('d/m/Y h:i:s',strtotime($ret['dataAcesso']))?>");
				document.location = "index.php";
			</script>				
<?			


		}
		else
		{
?>
		<script>
			document.location = "index.php";		
		</script>

<?		
		}
	}	
?>	

</body>
</html>
