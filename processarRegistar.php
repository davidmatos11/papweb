<?php
	//verficar se os campos do login estão preenchidos
	if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['nome']) 
		OR empty($_POST['email']) OR empty($_POST['senha']) OR empty($_POST['resenha']))) {
		header("Location: login.php");
		exit;
	}
	//Connect To Database
	
	$servidor="localhost";
	$utilizador="root";
	$password="";
	$basedados="aeblivros";
	
	$ligacao = mysqli_connect($servidor,$utilizador,$password,$basedados) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	
	mysqli_select_db($ligacao, $basedados);
	
	//definir variáveis para escrever no registo
	$userlogin = $_POST['login'];
	$usernome = $_POST['nome'];
	$email = $_POST['email'];
	$password = $_POST['senha'];
	$repassword = $_POST['resenha'];
	$query_select = "SELECT login FROM utilizadores WHERE login = '$userlogin'";
	$select = mysqli_query($ligacao, $query_select);
	$array = mysqli_fetch_array($select, MYSQLI_BOTH);
	$logarray = $array['login'];
	
	if($userlogin == "" || $userlogin == null){
  
    }else{
      if($logarray === $userlogin){

        echo"<script language='javascript' type='text/javascript'>alert('Esse utilizador já está registado!');window.location.href='registar.php';</script>";
        die();
		

      }else{
		
		//vou verificar se já existe o email
		$sql = mysqli_query($ligacao, "SELECT * FROM utilizadores WHERE email = '{$email}'") or print mysqli_error();
		
		#Se o retorno for maior do que zero, diz que já existe um.
		if(mysqli_num_rows($sql)>0) {
			echo"<script language='javascript' type='text/javascript'>alert('Esse email já está registado!');window.location.href='registar.php';</script>";
			die();
			
		}
		else {
			#vamos tentar guardar o registo
			$query = "INSERT INTO utilizadores (Login, Nome, Senha, Email) VALUES ('$userlogin','$usernome','$password','$email')";
			
			$insert = mysqli_query($ligacao, $query);
			if($insert){
				echo"<script language='javascript' type='text/javascript'>alert('Utilizador registado com sucesso!');window.location.href='login.php'</script>";
			} else {
				echo"<script language='javascript' type='text/javascript'>alert('Não foi possível registar esse utilizador');window.location.href='registar.php'</script>";
			}
		}
      }
    }
	
	# Verificar se o registo existe
	
	/* $consulta = "INSERT INTO utilizadores (Login, Nome, Senha, Email) VALUES ('$userlogin','$usernome','$password','$email')";
	$resultado = mysqli_query($ligacao, $consulta);
	if (($resultado) !=1) {
		//caso não tenha sido inseridos com sucesso os dados
		header("Location: registar.php");
		exit;
	}
	else {
		header("Location: index.php");
		exit;
	}
	mysqli_free_result($resultado);
	mysqli_close($ligacao);
 */
 ?>