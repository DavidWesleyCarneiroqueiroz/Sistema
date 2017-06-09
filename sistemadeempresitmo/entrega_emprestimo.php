  <?php
   
    $link = mysql_connect('localhost:3306', 'root', ''); // conexão sql

  if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
  }
  
	$matricula_emprestimo_entrega = $_POST['matricula_emprestimo_entrega'];
	$patrimonio_emprestimo_entrega = $_POST['patrimonio_emprestimo_entrega'];
	$data_entrega = "now()";
	$statos_emprestimo_entrega = "entregue";
 
   mysql_select_db("dbemprestimo", $link); // conexão com o banco 

  $sql_matricula_entrega = mysql_query("select matricula_emprestimo from emprestimo where matricula_emprestimo =  $matricula_emprestimo_entrega"); // validação matricula
	
	$row_matricula_entrega = mysql_num_rows($sql_matricula_entrega);
		
		if($row_matricula_entrega > 0) {

			$aux_matricula_entrega = 0;

			while($linha_matricula_entrega = mysql_fetch_array($sql_matricula_entrega)){

			$linha_matricula_entrega["matricula_emprestimo"];
							
			 $aux_matricula_entrega += 1;
				
				 
			}
		}
		else {
					mysql_close($link);
					echo "fazer cadastro solicitante"; 
					echo "<br>";
					die('tente novamento pos o cadastro' . mysql_error());

				}
				
 $sql_patrimonio_entrega = mysql_query("select patrimonio_emprestimo from emprestimo where patrimonio_emprestimo = $patrimonio_emprestimo_entrega");	// validação patrimonio	
  
  $row_patrimonio_entrega = mysql_num_rows($sql_patrimonio_entrega);
		
		if($row_patrimonio_entrega > 0) { 

			$aux_patrimonio_entrega = 0;
		
			while($linha_patrimonio_entrega = mysql_fetch_array($sql_patrimonio_entrega)){
				
				 $linha_patrimonio_entrega["patrimonio_emprestimo"];
				 "<br>";
				  $aux_patrimonio_entrega += 1; 
				
			}
		}
		else {
					mysql_close($link);
					echo "fazer cadastro Equipamento"; 
					echo "<br>";
					die('tente novamento pos o cadastro' . mysql_error());
		}
		
	$sql_matricula_emprestimo_entrega = mysql_query("select numero_emprestimo from emprestimo where (matricula_emprestimo = $matricula_emprestimo_entrega and patrimonio_emprestimo = $patrimonio_emprestimo_entrega) and statos_emprestimo = 'saida'"); // validação matricula
	
		$row_matricula_emprestimo_entrega  = mysql_num_rows($sql_matricula_emprestimo_entrega);
	
		$aux_matricula_emprestimo_entrega  = 0;
		
		if($row_matricula_emprestimo_entrega  > 0) {
			while($linha_maticula_emprestimo_entrega  = mysql_fetch_array($sql_matricula_emprestimo_entrega )){
				
				$aux_matricula_emprestimo_entrega  += 1;
				 
			}
		}
		
		
		if($aux_matricula_emprestimo_entrega <= 0 ) {
			echo "Devolução ja foi feita ou não teve o emprestimo";
			echo "<br>"		;
			echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
		}
		
		else{
				
	if (($aux_matricula_entrega >= 1)  and ($aux_patrimonio_entrega >= 1) )	{
		
		$sql_numero_entrega = mysql_query("select numero_emprestimo from emprestimo where patrimonio_emprestimo = $patrimonio_emprestimo_entrega");
		$row_numero_entrega = mysql_num_rows($sql_numero_entrega);
		
		if($row_numero_entrega > 0) {

		while($linha_numero_entrega = mysql_fetch_array($sql_numero_entrega)){

				 $linha_numero_entrega ["numero_emprestimo"];
				 "<br>";
				
		 }
		}
		else {
					mysql_close($link);
					echo "fazer cadastro solicitante"; 
					echo "<br>";
					die('tente novamento pos o cadastro' . mysql_error());

				}
		
		mysql_query("update emprestimo set data_emprestimo_entregue = $data_entrega where patrimonio_emprestimo = $patrimonio_emprestimo_entrega ");
		mysql_query("update emprestimo set statos_emprestimo = '$statos_emprestimo_entrega' where patrimonio_emprestimo = $patrimonio_emprestimo_entrega");

		}
							
		else { mysql_close($link);}
		
		echo "<h1> Devolução Feito com sucesso!";
		echo "<br>"	;
		echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
		
		}
 
?>