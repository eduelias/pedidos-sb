<?php
class GestorDeProdutosService
{
	function GestorDeProdutosService ()
	{
		$this->conn = mysql_connect('localhost','solbrilhante','789e987');
		mysql_select_db ('solbrilhante');	
	}

	function getProdutos()
	{
	    return mysql_query("SELECT * FROM produto");
	}
}

?>