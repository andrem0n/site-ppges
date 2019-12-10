<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>
	<div class="card text-center"  style="width: 24rem; border-radius:3%; border-color:#096a18; margin-left: 35%; margin-top: 10%; margin-bottom: 1%;">
        <div class="card-header" style=" border-color:#096a18;">
				<span >
					<img src="ppg.png" style="width: 12rem; margin-bottom: 1%;" >
				</span>
        </div>
        <div class="card-body">
             <h5 class="card-title">LOGIN</h5>
							
                    <form method="POST" action="php/valida.php" >
                        <?php
								if(isset($_SESSION['msg'])){
									echo $_SESSION['msg'];
									unset($_SESSION['msg']);
								}
								
							?>
                    				
					<div class=" validate-input" data-validate = "Insira seu User">
						<input class="form-control" style=" margin-bottom: 3%;" stype="text" name="email" placeholder="Email">
					</div>
                        
					<div class="validate-input" data-validate="Insira sua senha">
						<input class="form-control" type="password" name="senha" placeholder="senha">
					
					</div>
             
                        <br>
					 <input type="submit" name="btnLogin" value="Entrar" class="btn btn-light" style=" border-color:#096a18; ">
						
                        <br>
                        <br>

				</form>
			</div>
		</div>

        
    </body>
    
</html>