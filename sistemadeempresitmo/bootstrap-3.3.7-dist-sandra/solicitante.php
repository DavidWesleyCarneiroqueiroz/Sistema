  <?php
    $link = mysql_connect('localhost:3306', 'root', '');

  if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
  }
    
  $matricula = $_POST['matricula'];
  $nome = $_POST['nome'];
  $unidade = $_POST['unidade'];
  $categoria = $_POST['categoria'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];

  mysql_select_db("dbemprestimo", $link);

  mysql_query("INSERT INTO solicitante (matricula, nome, unidade, categoria, telefone, email) VALUES ('$matricula', '$nome', '$unidade', '$categoria', '$telefone','$email')");

  mysql_close($link);
  
		echo "<h1> Solicitante cadastrado com sucesso!";
		echo "<br>"		;
		echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
?>