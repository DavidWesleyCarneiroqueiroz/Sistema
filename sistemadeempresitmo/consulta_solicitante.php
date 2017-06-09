<?php
   
    $link = mysql_connect('localhost:3306', 'root', ''); 

  if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
  }
  
   mysql_select_db("dbemprestimo", $link);

  $sql_matricula = mysql_query("select * from solicitante" ); 
  
	$row_matricula = mysql_num_rows($sql_matricula);
			if($row_matricula > 0) {
				echo"----------------------------------------------------------------------------------------------------------------------------------------------";
			while($linha_maticula = mysql_fetch_array($sql_matricula)){
				
				echo "<br>";
				echo "mateicula: ".$linha_maticula["matricula"] ." | ";
				echo "nome: ".$linha_maticula["nome"] ." | ";
				echo "email: ".$linha_maticula["email"];
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
		
		echo "<h1> consulta solicitante!";
		echo "<br>"	;
		echo "<h2><a href=sistema_de_emprestimo.html>Voltar</a></h2>";
		
		
?>