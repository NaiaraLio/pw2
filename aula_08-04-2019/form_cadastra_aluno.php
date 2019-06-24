<?php // Tag de abertura <?php, que diz ao PHP para iniciar a interpretação do código.

 if(isset($_GET['cadastrar'])){
	 	 try{
		$conexao = new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$id = 0;
		$nome = $_GET['nome'];
		$login = $_GET['login'];
		$senha = md5($_GET['senha']);
		$tipo = $_GET['tipo']; 

		$comando_sql = "INSERT INTO tabela_usuario(login,senha,nome,tipo)VALUES(?,?,?,?)";
		$stmt = $conexao->prepare($comando_sql);

		$stmt->bindParam(1,$nome);
		$stmt->bindParam(2,$login);
		$stmt->bindParam(3,$senha);
		$stmt->bindParam(4,$tipo);
		
		$rs = $stmt->execute();		
		if($rs){
			echo "<script>alert('Dados gravados com sucesso!');</script>";	
		}else{
			
			echo var_dump($stmt->errorInfo());	
		}
			
		 } catch(PDOException $e) 
		 	{			 
			 	echo "Erro:" . $e->getMessage();
			} 
 }
 
?>

<!doctype html>
<html><head>
<meta charset="utf-8">
<title>Cadastro de Usuário</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
    	<h1>CADASTRO DE USUÁRIO</h1>
    </header>
    <nav>
    	<ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#news">News</a></li>
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
            <div class="dropdown-content">
              <a href="#">Link 1</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>
          </li>
        </ul>
       </nav>
	<main>
    <section>
      <fieldset>
      <legend>Cadastro de Usuário:</legend>
		<form action="#" method="get">  
                             
            <p><label>Nome:</label></p>
            <p><input type="text" name="nome" size="50"	required></p>
            
            <p><label>Login:</label></p>
            <p><input type="text" name="login" size="50"	required></p> 
            
            <p><label>Senha:</label></p>
            <p><input type="text" name="senha" size="15"	required></p>
		 	
            <select name="tipo">
            <option value="m">Usuário Master</option>
            <option value="s">Super Usuário</option>
            <option value="c">Usuário Comum</option>
                                
            <p><input type="submit" value="Cadastrar Usuário" name="cadastrar"></p>    
        </form>
       </fieldset>
    </section>
    </main>
    <footer>
    	<p></p>
    </footer>
</body>
</html>