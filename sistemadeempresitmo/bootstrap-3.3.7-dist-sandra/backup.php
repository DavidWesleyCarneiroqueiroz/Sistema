  <?php
    $link = mysql_connect('localhost:3306', 'root', '');

  if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
  }
    
  $matricula_emprestimo = $_POST['matricula_emprestimo'];
  $patrimonio_emprestimo = $_POST['patrimonio_emprestimo'];
 
   mysql_select_db("dbemprestimo", $link);

  mysql_query("INSERT INTO emprestimobackup (patrimonio, matricula) VALUES ('$matricula_emprestimo', '$patrimonio_emprestimo')");

  mysql_close($link);
?>