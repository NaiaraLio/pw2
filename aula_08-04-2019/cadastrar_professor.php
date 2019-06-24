<?php // Tag de abertura <?php, que diz ao PHP para iniciar a interpretação do código.
 if(isset($_GET['cadastrar'])){
	 
	 try{
		 
		$conexao = new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');
		$conexao->exec("SET CHARACTER SET utf8");		
		$matricula = $_GET['matricula'];
		
		$nome = $_GET['nome']; 
		
		$comando_sql = "INSERT INTO tabela_professores(matricula, nome)VALUES(:parametro1,:parametro2)";
		
		$stmt = $conexao->prepare($comando_sql);
		
		$stmt->bindParam(':parametro1',$matricula);
		
		$stmt->bindParam(':parametro2',$nome);
		
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
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Professor</title>
</head>
<body>


	<form action="#" method="get">
    <p><label>Matrícula:</label></p>
    <p><input type="number" name="matricula" size="5" required></p>                    
    <p><label>Nome do Professor(a):</label></p>
    <p><input type="text" name="nome" size="50"	required></p>
                    
    <p><input type="submit" value="Cadastrar Professor(a)" name="cadastrar"></p>    
    </form>
</body>
</html>