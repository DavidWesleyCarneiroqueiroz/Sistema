<?php
   
    $link = mysql_connect('localhost:3306', 'root', ''); 

  if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
  }
 
	$statos_emprestimo_consulta = $_POST['statos_con'];
 
   mysql_select_db("dbemprestimo", $link);
   
   $sql_matricula = mysql_query("select * from emprestimo where statos_emprestimo = $statos_emprestimo_consulta" ); 
  
	$row_matricula = mysql_num_rows($sql_matricula);
			if($row_matricula > 0) {
				echo"----------------------------------------------------------------------------------------------------------------------------------------------";
			while($linha_maticula = mysql_fetch_array($sql_matricula)){
				
				echo "<br>";
				echo "matricula emprestimo: ".$linha_maticula["matricula_emprestimo"] ." | ";
				echo "Patrimonio ".$linha_maticula["patrimonio_emprestimo"] ." | ";
				echo "data saida: ".$linha_maticula["data_emprestimo_saida"] ." | ";
				echo "data entrega".$linha_maticula["data_emprestimo_entregue"] ." | ";
				echo "Status: ".$linha_maticula["statos_emprestimo"];
				echo"<br>";			
				echo"--------------------------------------------------------------------------------------------------------------------------------------------------------";

			}
		}
		else {
					mysql_close($link);
					echo "fazer cadastro solicitante"; 
					echo "<br>";
					die('tente novamento pos o cadastro' . mysql_error());

				}
		
		echo "<h1> consulta empretimo!";
		echo "<br>"	;
		echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";