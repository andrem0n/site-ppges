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

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <script src="ckeditor/ckeditor.js"></script>
         
        
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a> 
                    <a class="brand" href="adm.php">PPGES ADMINISTRATIVO</a>
                </div>
            </div>
        </div>
        
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="adm.php"> Home</a></li>
                                <li><a href="activity.html"> Informes </a></li>
                                <li><a href="message.html"> Coordenação </a></li>
                                <li><a href="task.html"> Professores</a></li>
                                <li><a href="ui-button-icon.html"> Disciplinas </a></li>
                                <li><a href="ui-typography.html"> Alunos </a></li>
                                <li><a href="form.html"> Eventos </a></li>
                                <li><a href="table.html">Seminários e Palestras </a></li>
                                <li><a href="charts.html"> Publicações </a></li>
                            </ul>
                        </div>
                    </div>
                    
                    
                   
				<div class="span9">
					<div class="content">
						<div class="module">
							<div class="module-head">
								<h3>Home</h3>
							</div>
							<div class="module-body">
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
                                            <td><?php echo mb_strimwidth($rows_Home['apresentacao'], 0, 100,"...");?></td>
                                           
                                            <td>  

                                                <button type="button"  class="btn btn-success dropdown-toggle" data-toggle="modal" data-target="#confirm<?php echo $rows_Home['idhome']; ?>"><span class="menu-icon icon-pencil" ></span></button> 
                                                
                                                <div class="modal fade" id="confirm<?php echo $rows_Home['idhome']; ?>" role="dialog ">
                                                      <div class="modal-dialog ">
                                                        <div class="modal-content modal-lg">
                                                          <div class="modal-body">
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
                                                <button type="button" class="btn btn-default dropdown-toggle"><a href="../pgcontadm.php?idhome=<?php echo $rows_Home['idhome']; ?>" style="color:black" ><span class="menu-icon icon-plus" ></span></a></button> 						
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
                                            <td><?php echo mb_strimwidth($rows_Home['sobre'], 0, 10,"...");?></td>
                                            <td>  

                                                
                                                <button type="button"  class="btn btn-success dropdown-toggle" data-toggle="modal" data-target="#confirms<?php echo $rows_Home['idhome']; ?>"><span class="menu-icon icon-pencil" ></span></button>  
                                                
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


                                                <button type="button" class="btn btn-default dropdown-toggle"><a href="../pgcontadm.php?idConteudo=<?php echo $rows_Home['idhome']; ?>" style="color:black" ><span class="menu-icon icon-plus" ></span></a></button> 						
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

                                                <button type="button"  class="btn btn-success dropdown-toggle" data-toggle="modal" data-target="#confirmo<?php echo $rows_Home['idhome']; ?>"><span class="menu-icon icon-pencil" ></span></button>  
                                                
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



                                                <button type="button" class="btn btn-default dropdown-toggle"><a href="../pgcontadm.php?idConteudo=<?php echo $rows_Home['idhome']; ?>" style="color:black" ><span class="menu-icon icon-plus" ></span></a></button> 						
                                           </td>
                                        </tr>
                                    <?php }?>
								  </tbody>
								</table>
							</div>
						</div>
                    </div>
                  </div>  
                </div>
            </div>
        </div>
        
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 - Universidade Federal do Pampa - UNIPAMPA </b>
            </div>
        </div>
        
        <script src="bootstrap/jquery-2.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
    </head>