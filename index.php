<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>Teste Minutrade</h3>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Adicionar</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Name</th>
		                  <th>Email Address</th>
		                  <th>CPF</th>
		                  <th>Telefone</th>
		                  <th>Endereço</th>
		                  <th>Estado Civil</th>
		                  <th>Ação</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM client ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['email'] . '</td>';
							   	echo '<td>'. $row['cpf'] . '</td>';
							   	echo '<td>'. $row['phone'] . '</td>';
							   	echo '<td>'. $row['address'] . '</td>';
							   	echo '<td>'. $row['maritalstatus'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="read.php?id='.$row['id'].'">Ver</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Atualizar</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Deletar</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>