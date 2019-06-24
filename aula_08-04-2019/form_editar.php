<?php
if(isset($_GET['matricula'])){
  $matricula = $_GET['matricula'];
  $conexao = new PDO('mysql:host=localhost:3307;
  									dbname=banco_apm','root','usbw');
  $sql = "SELECT * FROM tabela_professores WHERE matricula=?";
  $busca = $conexao->prepare($sql);
  $busca->bindParam(1,$matricula);
  $busca->execute();
  $registro = $busca->fetch(PDO::FETCH_ASSOC);
} 

	if(isset($_POST['atualizar'])){
		$matricula = $_POST['matricula'];
		$nome = $_POST['nome']; 
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$celular = $_POST['celular'];
		$valor = $_POST['valor'];
		$data = $_POST['data_nascimento'];
		
		// Recebendo dados do arquivo
		$arquivo = $_FILES['arquivo'];
		$fotos = $_FILES['arquivo']['name'];
		$extensao = explode(".",$fotos);
		$nome_final = md5(time()) . ".". $extensao[1];
		$pasta = "fotos/";
		$cmd_atualiza = "UPDATE tabela_professores SET
						nome = ?,
						email = ?,
						telefone = ?,
						celular = ?,
						data = ?,
						valor = ?,
						fotos = WHERE matricula = ?";
						
											
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Professor</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/estilo_do_menu.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
    	<h1>EDITAR PROFESSOR</h1>
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
      <legend>Editar Professor:</legend>
		<form action="#" method="POST" enctype="multipart/form-data">
            <p><label>Matrícula:</label></p>
            <p><input type="number" name="matricula" size="5" value="<?php echo $registro['matricula'];?>"required></p>   
                             
            <p><label>Nome do Professor(a):</label></p>
            <p><input type="text" name="nome" size="50"	value="<?php echo $registro['nome'];?>"required></p>
            
            <p><label>Selecionar arquivo</label></p>
            <p><img src="fotos/<?php echo $registro['fotos']; ?>" width="20%" height="20%" id="visualizar_imagem"></p>
            <p><input type="file" name="arquivo" id="arquivo"></p>
            <script>
              function carregaImagem() {
              if (this.files && this.files[0]) {
                  var file = new FileReader();
                  file.onload = function(e) {
                    document.getElementById("visualizar_imagem").src = e.target.result;
                    };
                  file.readAsDataURL(this.files[0]);
                  }
                }         
            document.getElementById("arquivo").addEventListener("change", carregaImagem, false);
      </script>           
                       
                       
            <p><label>E-mail:</label></p>
            <p><input type="text" name="email" size="50" value="<?php echo $registro['email']; ?>"</p> 
            
            <p><label>Telefone:</label></p>
            <p><input type="tel" name="telefone" size="15" value="<?php echo $registro['telefone']; ?>"</p>
            
            <p><label>Celular:</label></p>
            <p><input type="tel" name="celular" size="15" value="<?php echo $registro['celular']; ?>"</p>
            
            <p><label>Data de contribuição:</label></p>
            <p><input type="date" name="data_nascimento" value="<?php echo $registro['data_nascimento']; ?>"</p>
            
            <p><label>Valor da contribuição:</label></p>
            <p><input type="text" name="valor" size="10" value="<?php echo $registro['valor']; ?>"</p>
            
                               
            <p><input type="submit" value="Editar Professor(a)" name="atualizar"></p>    
        </form>
       </fieldset>
    </section>
    </main>
    <footer>
    	<p></p>
    </footer>
</body>
</html>