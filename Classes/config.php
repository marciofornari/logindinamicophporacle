<?php
$usuario = "usuario_banco";
$senha = "senha_banco";
$host = "host_banco";
$objConnect = oci_connect($usuario, $senha, $host);
if (!$objConnect) {
	echo "N�o foi poss�vel conectar ao Banco: " . var_dump( oci_error() );
	die();
}
?>