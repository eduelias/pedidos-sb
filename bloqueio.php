<?
	if (!session_is_registered("idCoordenador")) {
?>
		<script>
			document.location = "login.php";
		</script>
<?		
	
	}
	$idCoordeandor = $_SESSION['idCoordenador'];	
?>
