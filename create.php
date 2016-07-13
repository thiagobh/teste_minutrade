<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		$nameError = null;
		$emailError = null;
		$cpfError = null;
		$phoneError = null;
		$addressError = null;
		$maritalstatusError = null;
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cpf = $_POST['cpf'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$maritalstatus = $_POST['maritalstatus'];
		
		
		$valid = true;
		if (empty($name)) {
			$nameError = 'Por favor entre com um nome';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Por favor entre em contato com email';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Por favor entre com um email válido';
			$valid = false;
		}

		if (empty($cpf)) {
			$cpfError = 'Por favor entre com cpf';
			$valid = false;
		}
		
		if (empty($phone)) {
			$phoneError = 'Entre com o telefone';
			$valid = false;
		}

		if (empty($address)) {
			$addressError = 'Entre com o endereco';
			$valid = false;
		}

		if (empty($maritalstatus)) {
			$maritalstatusError = 'Entre com o estado civil';
			$valid = false;
		}
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO client (name,email,cpf,phone,address,maritalstatus) values(?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$cpf,$phone,$address,$maritalstatus));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Adicionar Cliente</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">

					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Nome</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Nome" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Email </label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
						
					  <div class="control-group <?php echo !empty($cpfError)?'error':'';?>">
					    <label class="control-label">CPF</label>
					    <div class="controls">
					      	<input name="cpf" type="text"  placeholder="CPF" value="<?php echo !empty($cpf)?$cpf:'';?>">
					      	<?php if (!empty($cpfError)): ?>
					      		<span class="help-inline"><?php echo $cpfError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
					    <label class="control-label">Telefone</label>
					    <div class="controls">
					      	<input name="phone" type="text"  placeholder="Telefone" value="<?php echo !empty($phone)?$phone:'';?>">
					      	<?php if (!empty($phoneError)): ?>
					      		<span class="help-inline"><?php echo $phoneError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
						
					  <div class="control-group <?php echo !empty($addressError)?'error':'';?>">
					    <label class="control-label">Endereço</label>
					    <div class="controls">
					      	<input name="address" type="text"  placeholder="Endereço" value="<?php echo !empty($address)?$address:'';?>">
					      	<?php if (!empty($addressError)): ?>
					      		<span class="help-inline"><?php echo $addressError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($maritalstatusError)?'error':'';?>">
					    <label class="control-label">Estado Civil</label>
					    <div class="controls">
					      	<input name="maritalstatus" type="text"  placeholder="Estado Civil" value="<?php echo !empty($maritalstatus)?$maritalstatus:'';?>">
					      	<?php if (!empty($maritalstatusError)): ?>
					      		<span class="help-inline"><?php echo $maritalstatusError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Adicionar</button>
						  <a class="btn" href="index.php">Voltar</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>