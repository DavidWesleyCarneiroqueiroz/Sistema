  <?php
    $link = mysql_connect('localhost:3306', 'root', '');

  if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
  }
    
  $equipamento = $_POST['equipamento'];
  $patrimonio = $_POST['patrimonio'];
  $numero_serie = $_POST['numero_serie'];
  
  mysql_select_db("dbemprestimo", $link);

$sql_matricula_entrega = mysql_query("select patrimonio from equipamento where patrimonio =  $patrimonio"); // validação matricula
	
	$row_matricula_entrega = mysql_num_rows($sql_matricula_entrega);
		
		if($row_matricula_entrega > 0) {

			while($linha_matricula_entrega = mysql_fetch_array($sql_matricula_entrega)){

			                mysql_close($link);
					echo "equipamento ja cadastrador"; 
					echo "<br>";
					echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
				 
			}
		}
		else {
					

				

  mysql_query("INSERT INTO equipamento (patrimonio,numero_serie, nome_equipamento) VALUES ('$patrimonio', '$numero_serie', '$equipamento')");
		
		echo "<h1> Equipamento cadastrado com sucesso!";
		echo "<br>"		;
		echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
		
  mysql_close($link);

}
?>