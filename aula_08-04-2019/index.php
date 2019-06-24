<?php
 session_start();
if((!isset($_SESSION['login']) == true)
    and (!isset ($_SESSION['senha']) == true))
 {
  	unset($_SESSION['login']);
  	unset($_SESSION['senha']);
  	header('location:index.html');
  }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Página Principal</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
    	<h1><img src="imagens/logo_etec_2019.png"></h1>
    </header>
    <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="form_cadastra_professor.php">Cadastrar Professor</a></li>
      <li><a href="form_cadastra_usuarios.php">Cadastrar Usuarios</a></li>
      <li><a href="form_busca.php">Buscar</a></li>   
      <li><a href="form_cadastra_professores.php">Exibir</a></li> 
	</ul>
    </nav>
    <main>
    <section style="height:300px;">
    
    </section>
    </main>
    <footer>
    	By Adri@ano Virgílio
    </footer>
</body>
</html>