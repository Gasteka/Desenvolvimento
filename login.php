<!doctype>
<html lang="pt-br">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<head>
<title>Login</title>

<style>
#login{
	width: 200px;
	heigth: 250px;
}
</style>

<?php
session_start(); 

include "conexao.php";

if(isset($_POST["entrar"]))
{
	$login=base64_decode($_REQUEST["login"]);
	$senha=base64_decode($_REQUEST["senha"]);
	echo"<script>alert('O valor de senha crypto...: , $senha')
		location.href='login.php'</script>";
	die();
	
	$logar=mysqli_query($conexao,"select * from usuario where email='$login' and senha='$senha'");
	
	$linha=mysqli_fetch_array($logar);
	
	if(!$linha)
	{
		echo"<script>alert('Erro ao logar.')
		location.href='login.php'</script>";
	}
	else
	{
		$_SESSION["login"]=$login;
		$_SESSION["senha"]=$senha;
		
		echo"<script>alert('Bem-vindo, $login')
		location.href='cliente.php'</script>";
	}
}
?>

</head>

<body>
<div class="container">
<h1>Tela de Login</h1>
<br>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" >
<fieldset id="login">
<legend>Segurança</legend>
<label>Login:</label>
<input type="text" maxlength="50" size="50" name="login"/><br><br>
<label>Senha:</label>
<input type="password" maxlength="10" size="10" name="senha"/><br><br>
<input type="submit" name="entrar" value="Entrar"/>
<input type="submit" name="cancelar" value="Cancelar"/>
</fieldset>
<br>
<a href="cadastrologin.php"><button type="button"><i class="material-icons">&#xe7fe;</i></button></a>


</form>
</div>
</body>
</html>