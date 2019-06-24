<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulário de pesquisa</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">

<script language="Javascript">
function confirmacao(matricula) {
     var resposta = confirm("Deseja remover esse registro?");
 
     if (resposta == true) {
          window.location.href = "form_busca.php?excluir&matricula="+matricula;
     }
}
</script>


</head>

<body>
<div id="todoconteudo">
	
    <div id="cabecalho">    
    </div>
    
    <div id="menu">    
    </div>
    
    <div id="corpo">
	<fieldset>
    <legend>Formulário de Pesquisa</legend>
	<form action="#" method="get">
    <p><label>Digite o nome do professor que deseja buscar:</label></p>
 	<p><input type="text" name="valor_de_busca" size="50" required> </p>
 	<p><input type="submit" name="buscar" value="Pesquisar"></p>
    </form>
    <?php
		if(isset($_GET['buscar'])){
			$valor = $_GET['valor_de_busca'];
			try{
				$con = new PDO('mysql:host=localhost:3307;dbname=banco_apm','root','usbw');			
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$comando_sql = "SELECT * FROM tabela_professores WHERE nome LIKE '%$valor%'";
				$consulta = $con->query($comando_sql);
				print "<p>Resultado:</p>";
				while($registro = $consulta->fetch(PDO::FETCH_ASSOC))
					{
						print "<p>
						    {$registro['matricula']} - {$registro['nome']} - <img src='fotos/{$registro['fotos']}' width='40' height='50'>
							
							<a href=\"javascript:func()\" onclick=\"confirmacao('{$registro['matricula']}')\">
							<img src='icones/excluir.png' title='Excluir Registro'></a>
							
							<a href='form_editar.php?matricula={$registro['matricula']}'>
							<img src='icones/editar.png' title='Editar Registro'></a>
																 
						    </p>";
					}
											
				}catch(PDOException $e){
					print "Erro ocorrido:" . $e->getMessage();					
					}
		
		}
		else if(isset($_GET['excluir']))
		{	
			$matricula = $_GET['matricula'];
			$con = new PDO('mysql:host=localhost:3307;
			dbname=banco_apm','root','usbw');		
			$comando_sql = "DELETE FROM tabela_professores WHERE 
			matricula = :valor";
			$stmt = $con->prepare($comando_sql);
			$stmt->bindParam(':valor',$matricula);
			$stmt->execute();
			$rs = $stmt->rowCount();	
			if($rs)
			{
				echo "<script>alert('Registro apagado com sucesso!');</script>";	
			}else{
				echo "<script>alert('Não foi possível excluir!');</script>";		
			}
			
		}
	?>    
    </fieldset>
    </div> 
         
    <div id="rodape">
    </div>
</div>
</body>
</html>