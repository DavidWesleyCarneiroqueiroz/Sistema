  <?php
   
    $link = mysql_connect('localhost:3306', 'root', ''); // conexão sql

  if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
  }
  
  $matricula_emprestimo = $_POST['matricula_emprestimo'];
  $patrimonio_emprestimo = $_POST['patrimonio_emprestimo'];
  $data_emprestimo_saida = "now()";
  $statos_emprestimo = "saida";

 
   mysql_select_db("dbemprestimo", $link); // conexão com o banco 

  $sql_matricula = mysql_query("select matricula from solicitante where matricula = $matricula_emprestimo"); // validação matricula
	
	$row_matricula = mysql_num_rows($sql_matricula);
		
		if($row_matricula > 0) {
			$aux_matricula = 0;

			while($linha_maticula = mysql_fetch_array($sql_matricula)){
				
				$aux_matricula += 1;
				 
			}
		}
		else {
					mysql_close($link);
					echo "fazer cadastro solicitante"; 
					echo "<br>";
					die('tente novamento pos o cadastro' . mysql_error());

				}
				
 $sql_patrimonio = mysql_query("select patrimonio from equipamento where patrimonio = $patrimonio_emprestimo");	// validação patrimonio	
  
  $row_patrimonio = mysql_num_rows($sql_patrimonio);
		
		if($row_patrimonio > 0) { 

			$aux_patrimonio = 0;
		
			while($linha_patrimonio = mysql_fetch_array($sql_patrimonio)){
				
				  $aux_patrimonio += 1; 
				
			}
		}
		else {
					mysql_close($link);
					echo "fazer cadastro Equipamento"; 
					echo "<br>";
					die('tente novamento pos o cadastro' . mysql_error());
		}
		

		
	$sql_matricula_emprestimo = mysql_query("select numero_emprestimo from emprestimo where (matricula_emprestimo = $matricula_emprestimo or patrimonio_emprestimo = $patrimonio_emprestimo) and statos_emprestimo = '$statos_emprestimo'"); // validação matricula
	
	$row_matricula_emprestimo  = mysql_num_rows($sql_matricula_emprestimo );
	
		$aux_matricula_emprestimo  = 0;
		
		if($row_matricula_emprestimo  > 0) {
			while($linha_maticula_emprestimo  = mysql_fetch_array($sql_matricula_emprestimo )){
				
				$aux_matricula_emprestimo  += 1;
				 
			}
		}
		
		
		if($aux_matricula_emprestimo >= 1) {
			echo "matricula ou patrimonio ja esta com emprestimo ativo";
			echo "<br>"		;
			echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
		}
		
		else{
		
mysql_query("insert into emprestimo (numero_emprestimo) value (default)");
		
	$sql_emprestimo = mysql_query("select numero_emprestimo from emprestimo order by numero_emprestimo desc limit 1;
");

	while($linha_emprestimo = mysql_fetch_array($sql_emprestimo)){

			$numero_emprestimo = $linha_emprestimo["numero_emprestimo"];
			
		}
				
	if (($aux_matricula >= 1)  and ($aux_patrimonio >= 1) )	{
		
	mysql_query("update emprestimo set data_emprestimo_saida = $data_emprestimo_saida where numero_emprestimo = $numero_emprestimo");
	mysql_query("update emprestimo set statos_emprestimo = '$statos_emprestimo' where numero_emprestimo = $numero_emprestimo");
					
}
							
		else { mysql_close($link); }

			mysql_query("update emprestimo set matricula_emprestimo = $matricula_emprestimo where numero_emprestimo = $numero_emprestimo");		
			mysql_query("update emprestimo set patrimonio_emprestimo = $patrimonio_emprestimo where numero_emprestimo = $numero_emprestimo");		
			
		mysql_close($link);
		
		echo "<h1> Emprestimo Feito com sucesso!";
		echo "<br>"		;
		echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
		
		}
		
		
?>