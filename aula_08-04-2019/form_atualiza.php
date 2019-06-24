<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulário de pesquisa</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
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
						print "<p>{$registro['matricula']} - {$registro['nome']}</p>";
					}
											
				}catch(PDOException $e){
					print "Erro ocorrido:" . $e->getMessage();					
					}
		
		}else if ($_GET['excluir'])
		
		?>    
    </fieldset>
    </div> 
         
    <div id="rodape">
    </div>
</div>
</body>
</html>