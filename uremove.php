<?php
session_start();
if(isset($_REQUEST["rid"]))
{
	if(isset($_SESSION["cart"]))
	{
		unset($_SESSION["cart"][$_REQUEST["rid"]]);
	
		sort($_SESSION["cart"]);
		echo "<script>window.location.href='ucart.php'</script>";
	}
	
}


?>