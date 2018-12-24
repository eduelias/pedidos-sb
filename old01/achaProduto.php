<?

	$codProduto = $_GET['codProduto'];
	$nomeInput = $_GET['nomeInput'];
	include "classe/conexao.php";
    include "classe/comboFromDb.class.php";	
	
	$sql = "select e.id from produto p, embalagem e where p.idEmbalagem = e.id and p.codigo = '$codProduto'";
	$ret= mysql_fetch_array(mysql_query($sql));
	
	
    $objPromotor = new comboFromDb("embalagem", "id", "descricao", $ret['id'], "", "emb".$nomeInput,"","class='combo'","class='combo'"); 
    $objPromotor->getFromDb();
    $objPromotor->displayCombo();

	
?>
