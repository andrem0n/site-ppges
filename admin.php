<?php
session_start();

	if(!empty($_SESSION['idAdm'])){
		
	}
	else{
		
		$_SESSION['msg'] = "Email ou senha Incorretos";
		header("Location: login.php");	
	}
include_once ("php/conect.php");
header("Content-type: text/html; charset=utf-8"); 

$sql="SELECT * from home";
$Home=mysqli_query ($conn, $sql);
?>

<!DOCTYPE>
<html>
    <head>
        <title>Informes</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        
    </head>
    
    <body>
        <div class="menu" style="height:10%">
            <br>
            <a  href="admin.php" style="font-size:24px; color: black; margin-left: 3%; text-decoration:none; "> PPGES ADMINISTRATIVO </a> 
           
        </div> 
       
        
        <nav class="navbar navbar-expand-lg navbar-light bg-white"  id="navbar-example3" style="max-width: 18rem; float:left; margin-top: 3%; margin-left: 3%; border-radius: none;  "   >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupporteContent" aria-controls="navbarSupporteContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupporteContent">
                <nav class="nav flex-column">
                   
                        <a  class="card-header bg-transparent border-success" style="color:  #000;" >MENU</a>
                        
                        <a class="nav-link" style="color:  #000;"  href="index.html">Home</a>
                      
                        <a class="nav-link" style="color:  #000;"  href="informes.html">Informes</a>
                     
                        <a class="nav-link" style="color:  #000;"  href="coord_edit.php">Coordenação</a>
                      
                        <a class="nav-link" style="color:  #000;"  href="">Professores Orientadores</a>
                                            
                        <a class="nav-link" style="color:  #000;"  href="eventos.html">Eventos</a>
                       
                        <a class="nav-link" style="color:  #000;"  href="ciclo.html">Ciclo de Seminários e Palestras</a>
                    
                        <a class="nav-link" style="color:  #000;"  href="disc.html">Disciplinas do Mestrado</a>
                        
                        <a class="nav-link" style="color:  #000;"  href="aluno.html">Alunos</a>
                      
                        <a class="nav-link" style="color:  #000;" href="publi.html">Publicações </a>
                    
                        <a class="nav-link" style="color:  #000;" href="publi.html">Bolsista </a>
                        
                </nav>
            </div>
        </nav>
        
        
        <div data-spy="scroll" data-target="#navbar-example3" data-offset="0">
            <div class="container" style="max-width: 72.5%;  margin-left: 25.7%; padding-top: 2%; margin-bottom: 3%;" >
                <table class="table" >
									<thead>
									<tr>
                                         
									  <th>Apresentação</th>
                                      <th>Opções </th>
									</tr>
								  </thead>
								  <tbody >
                                    <?php while ($rows_Home=mysqli_fetch_assoc($Home)) {?>
                                        <tr >
                                            <td><?php echo mb_strimwidth($rows_Home['apresentacao'], 0, 160,"...");?></td>
                                           
                                            <td>  

                                                <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#confirm<?php echo $rows_Home['idhome']; ?>"><span class="oi oi-pencil"></span></button> 
                                                
                                                <div class="modal fade" id="confirm<?php echo $rows_Home['idhome']; ?>" role="dialog ">
                                                      <div class="modal-dialog ">
                                                        <div class="modal-content ">
                                                          <div class="modal-body"  >
                                                              <form method="POST" action="php/edit_Home.php">
								

                                                                <div class="form-group">
                                                                    <label><b>Descrição</b></label>
                                                                    <textarea type="text"  name="apresentacao" id="apresentacao" placeholder="Digite a descrição" class="form-control" name="tx_mensagem"class="formbutton" id="tx_mensagem"><?php echo $rows_Home['apresentacao']; ?></textarea>	
                                                                    <script>
                                                                    CKEDITOR.replace( 'apresentacao' );
                                                                    </script>

									                           </div>
                                        
                                                                <br><br>
                                                                <center>
                                                                    <input type="hidden" name="idhome" value="<?php echo $rows_Home['idhome']; ?>">
                                                                    
                                                                    <input type="hidden" name="sobre" value="<?php echo $rows_Home['sobre']; ?>">
                                                                    
                                                                    <input type="hidden" name="objetivo" value="<?php echo $rows_Home['objetivo']; ?>">
                                                                    
                                                                    <input type="submit" value="Alterar " class="btn btn-success btn"><br><br>
                                                              
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                                                </center>
                                                            </form>
							                             </div>
					                                   </div>
                                                    </div>
                                                </div>
                                                	
                                                <button type="button"  class="btn btn-default " data-toggle="modal" data-target="#confirma<?php echo $rows_Home['idhome']; ?>"><span class="oi oi-plus" ></span></button> 
                                                
                                                <div class="modal fade" id="confirma<?php echo $rows_Home['idhome']; ?>" role="dialog ">
                                                    <div class="modal-dialog ">
                                                        <div class="modal-content modal-lg">
                                                            <div class="modal-body">
                                                               <h4>Descrição: </h4>
                                                                 <p><?php echo $rows_Home['apresentacao']; ?></p>                               
                                                                <br><br>
                                                                <center>
                                                                    
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Voltar</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>			
                                           </td>
                                        </tr>
								  </tbody>
								</table>
                                <table class="table" >
									<thead>
									<tr>
									  <th>Sobre o Curso</th>
                                      <th>Opções </th>
									</tr>
								  </thead>
								  <tbody >
                                        <tr>
                                            <td><?php echo mb_strimwidth($rows_Home['sobre'], 0, 115,"...");?></td>
                                            <td>  

                                                
                                                <button type="button"  class="btn btn-success " data-toggle="modal" data-target="#confirms<?php echo $rows_Home['idhome']; ?>"><span class="oi oi-pencil"></span>    </button>
                                                
                                                <div class="modal fade" id="confirms<?php echo $rows_Home['idhome']; ?>" role="dialog ">
                                                      <div class="modal-dialog ">
                                                        <div class="modal-content modal-lg">
                                                          <div class="modal-body">
                                                              <form method="POST" action="php/edit_Home.php">
								

                                                                <div class="form-group">
                                                                    <label><b>Descrição</b></label>
                                                                    <textarea type="text"  name="sobre" id="sobre" placeholder="Digite a descrição" class="form-control" name="tx_mensagem"class="formbutton" id="tx_mensagem"><?php echo $rows_Home['sobre']; ?></textarea>	
                                                                    <script>
                                                                    CKEDITOR.replace( 'sobre' );
                                                                    </script>

									                           </div>
                                        
                                                                <br><br>
                                                                <center>
                                                                    <input type="hidden" name="apresentacao" value="<?php echo $rows_Home['apresentacao']; ?>">
                                                                    
                                                                    <input type="hidden" name="idhome" value="<?php echo $rows_Home['idhome']; ?>">
                                                                    
                                                                     <input type="hidden" name="objetivo" value="<?php echo $rows_Home['objetivo']; ?>">
                                                                    
                                                                     <input type="submit" value="Alterar " class="btn btn-success btn"><br><br>
                                                              
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                                                </center>
                                                            </form>
							                             </div>
					                                   </div>
                                                    </div>
                                                </div>


                                                <button type="button"  class="btn btn-default " data-toggle="modal" data-target="#confirmas<?php echo $rows_Home['idhome']; ?>"><span class="oi oi-plus"></span></button> 
                                                
                                                <div class="modal fade" id="confirmas<?php echo $rows_Home['idhome']; ?>" role="dialog ">
                                                    <div class="modal-dialog ">
                                                        <div class="modal-content modal-lg">
                                                            <div class="modal-body">
                                                               <h4>Sobre  Curso: </h4>
                                                                 <p><?php echo $rows_Home['sobre']; ?></p>                               
                                                                <br><br>
                                                                <center>
                                                                    
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Voltar</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                           </td>
                                        </tr>
								  </tbody>
								</table>
                                <table class="table" >
									<thead>
									<tr>
									  <th>Objetivo</th>
                                      <th>Opções </th>
									</tr>
								  </thead>
								  <tbody >
                                        <tr accept-charset="utf-8">
                                            <td><?php echo mb_strimwidth($rows_Home['objetivo'], 0, 100,"...");?></td>
                                            <td>  

                                                <button type="button"  class="btn btn-success " data-toggle="modal" data-target="#confirmo<?php echo $rows_Home['idhome']; ?>"><span class="oi oi-pencil" ></span></button>  
                                                
                                                <div class="modal fade" id="confirmo<?php echo $rows_Home['idhome']; ?>" role="dialog ">
                                                      <div class="modal-dialog ">
                                                        <div class="modal-content modal-lg">
                                                          <div class="modal-body">
                                                              <form method="POST" action="php/edit_Home.php">
								

                                                                <div class="form-group">
                                                                    <label><b>Descrição</b></label>
                                                                    <textarea type="text"  name="objetivo" id="objetivo" placeholder="Digite a descrição" class="form-control" name="tx_mensagem"class="formbutton" id="tx_mensagem"><?php echo $rows_Home['objetivo']; ?></textarea>	
                                                                    <script>
                                                                    CKEDITOR.replace( 'objetivo' );
                                                                    </script>

									                           </div>
                                        
                                                                <br><br>
                                                                <center>
                                                                    <input type="hidden" name="apresentacao" value="<?php echo $rows_Home['apresentacao']; ?>">
                                                                    
                                                                    <input type="hidden" name="idhome" value="<?php echo $rows_Home['idhome']; ?>">
                                                                    
                                                                     <input type="hidden" name="sobre" value="<?php echo $rows_Home['sobre']; ?>">
                                                                    
                                                                     <input type="submit" value="Alterar " class="btn btn-success btn"><br><br>
                                                              
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                                                </center>
                                                            </form>
							                             </div>
					                                   </div>
                                                    </div>
                                                </div>


                                                <button type="button"  class="btn btn-default " data-toggle="modal" data-target="#confirmao<?php echo $rows_Home['idhome']; ?>"><span class="oi oi-plus" ></span></button> 
                                                
                                                <div class="modal fade" id="confirmao<?php echo $rows_Home['idhome']; ?>" role="dialog ">
                                                    <div class="modal-dialog ">
                                                        <div class="modal-content modal-lg">
                                                            <div class="modal-body">
                                                               <h4>Objetivo do Curso: </h4>
                                                                 <p><?php echo $rows_Home['objetivo']; ?></p>                               
                                                                <br><br>
                                                                <center>
                                                                    
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Voltar</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 						
                                           </td>
                                        </tr>
                                    <?php }?>
								  </tbody>
								</table>
            </div>  
        </div>
        
        
        <br> <br> <br> <br>
        
        <div class="rodape">
            <nav class="navbar navbar-white bg-white">
                <span class="navbar">© 2014 Universidade Federal do Pampa - UNIPAMPA</span>
            </nav>
        </div>
    </body>
</html>
