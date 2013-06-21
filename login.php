<?php
ob_start();
session_start();
   include_once('Classes/config.php');
 
   	  $is_ajax = $_REQUEST['is_ajax'];
   	  if (isset($is_ajax)&& $is_ajax){
   	  	
   	  	$username = $_REQUEST['username'];
   	  	$password = $_REQUEST['password'];
	     
       //Minha query para verificar o usuário e a senha no Banco
		$query .= "SELECT  ROWNUM, U.NOME_USUARIO, U.SENHA_USUARIO, U.LOGIN_USUARIO FROM A_USUARIOS U "; 
		$query .="INNER JOIN ";
		$query .="A_USU_APLIC AP ON U.ID = AP.ID WHERE U.LOGIN_USUARIO = '$username'AND U.SENHA_USUARIO = '$password' AND AP.COD_APLIC = '2'";
 
		
		$parse = ociparse($objConnect, $query);
		
		//mando executar minha instrucao
		$result = ociexecute($parse);
 		//coloco o resultado em um array
		$dbarray = oci_fetch_array($parse);
		
		//Se o ROWNUM foi maior que zero significa que o usuário e a senha estão corretos.
		if($dbarray["ROWNUM"] > 0)
		{
			//alimento as variaveis com o resultado da array
			$nome = $dbarray["NOME_USUARIO"];
			$password = $dbarray["SENHA_USUARIO"];
			$aplicacao = $dbarray["COD_APLIC"];
				
			$_SESSION["nome"]= $nome;
			$_SESSION["valida"] = 1;
			echo 'success';			
		}
   	  }

?>