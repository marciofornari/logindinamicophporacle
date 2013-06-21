<?php
header('Content-Type: text/html; charset=iso-8859-1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico" />
<meta http-equiv="content-language" content="pt-br" />
<!-- Título do Site -->
<title>TÍTULO</title>
<link href='Css/default.css' rel='stylesheet' type='text/css'>
<script type='text/javascript' src='Js/jquery.js'></script>
<script type="text/javascript">
 $(document).ready(function(){
	$("#login").click(function(){
	$('div.loader').show();
	var action = $("#frmLogin").attr("action");
	var form_data = {
		username: $("#username").val(),
		password: $("#password").val(),
		is_ajax: 1
		};
    $.ajax({
		type: "POST",
		url: action,
		//async: false,
		data: form_data,
		success: function(response)
		{
			if(response == "success")
			{
				$(location).attr('href', 'principal/index.php');
			}else{
				$("#message").html('<p class="error">Usuário ou senha inválidos</p>');
				$('div.loader').hide();
				}
		}
     });
		
		return false;
	});		
	 
  });
</script>
</head>
<body>
	<div class="engloba">
		<div class="cabecalho">
			<div class="logo">
				<img src="logo.jpg" alt="Home" title="Home" />
			</div>
			<div class="nomesistema">SISTEMA</div>
		</div>
		<div class="centro">
			<h1>Identifique-se</h1>
			<form id="frmLogin" action="login.php" method="post">
				<div class="label">
					<label for="codigo">Usuário:</label>
				</div>
				<input name="username" id="username" class="campos" type="text"	maxlength="10" /><br />
				<div class="label">
					<label for="senha">Senha:</label>
				</div>
				<input name="password" id="password" class="campos" type="password"	maxlength="10" /><br />
				<button type="submit" class="btnenviar" id="login" name="login">Entrar</button>
				<div class="loader" style="display: none;">
					<img src="img/loader.gif" alt="Carregando" />
				</div>
				<div id="message"></div>
			</form>

		</div>
	</div>
	<div class="rodape">
		<!-- Bloco rodape -->
		&copy;2013 - Todos os direitos reservados
	</div>
</body>
</html>
