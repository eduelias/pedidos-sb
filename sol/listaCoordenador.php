<?
	include "../classe/conexao.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<title>Sol Brilhante - Administracao</title>
</head>

<body>
<?
	$antes = '';
	$sql = "select * from logAcesso l, coordenador c where l.idCoordenador = c.id order by c.nome, dataAcesso";
	$res=mysql_query($sql);
	while ($ret = mysql_fetch_array($res)) {
		if ($antes != $ret['nome']) {
			echo '<hr>';
		    $antes = $ret['nome'];
			echo '<strong>'.$ret['nome'].'</strong><br>';
			echo 'Data Acesso<br>';
			echo $ret['dataAcesso'].'<br>';			
			
		}
		else
			echo $ret['dataAcesso'].'<br>';			
	}
	
?>

</body>
</html>
