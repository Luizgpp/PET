<?php
	session_start();
    include '../action/conexao.php';                        	
		$sql ="SELECT venprod from produtos where idprod =".$_POST['idproduto']."";				
		$resultado_prod = mysqli_query($mysqli, $sql);
        $row_prod = mysqli_fetch_assoc($resultado_prod);                                   
		$valorunitario = $row_prod['venprod'];		
?>
<script language="javascript" type="text/javascript">
    //todo código aqui será executad
	document.getElementById("svalorunit").value = '<?php echo $valorunitario ?>';		
</script>