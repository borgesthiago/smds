<?php
require_once ("conf.php");

$ADODB_FETCH_MODE = 2;

ini_set("ibase.timestampformat", '%d/%m/%Y');
ini_set("ibase.dateformat", '%d/%m/%Y');

$id = $_SESSION['usuarioId'];
$user_old = $_SESSION["usuarioNome"];
$n_user = $_SESSION['usuarioNivelAcesso'];

		$server = $_SERVER['SERVER_NAME'];

		$endereco = $_SERVER ['REQUEST_URI'];

		$link =  "http://" . $server . $endereco;
		
		$link2 = '/../sair.php';
		
include_once("conexao.php");

		
		$link = @$_GET["link"];
		try{
	
		$consulta = $conecta->prepare('SELECT * FROM login where id= :id');
		$consulta->bindParam(':id', $idpessoa,PDO::PARAM_STR);
		$consulta->execute();
		 
		} catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
		}
		$id_p = $_GET['id_p'];
	$consulta_proc = $conecta->query("SELECT * FROM processos where id= '$id_p'");
	foreach($consulta_proc as $row_p)	{}
				
function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="THSI">

    <title>Painel Administrativo</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

<?php include('nav.php');
 include("modal_nav.php");?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Painel</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              
			  <div class="page-header">
				<h3>Dados do Processo</h3>
			  </div>
			  <?php 
			  if($row_p['fiscal']==$_SESSION["usuarioNome"]){
			  	print "<a href='#&n=".$row_p['id']."' data-toggle=\"modal\" data-target=\"#transf\"><button type=\'button\' class=\'button\'>Transferir Responsável</button></a>";
				 echo "  <button data-toggle='collapse' data-target='#demo'>Visualizar Processo</button>";
			  }else{
				  echo "<h5><font color=\"red\">O Processo não está sob sua responsabilidade.</font></h5>";
				  echo '<button data-toggle="collapse" data-target="#demo" class=\"button\">Visualizar Processo</button>';
			  }
			  ?><p>
			  <div class="row espaco"><div id="demo" class="collapse">	 
				<div class="col-md-3"><b>Status:</b></div>
				<?php if($row_p['status']=='1'){
					 echo "<div class=\"col-md-9\"><font color=\"green\"><i class=\"fa fa-check-circle-o\" aria-hidden=\"true\"></i></font></div>";
				}else{
					 echo "<div class=\"col-md-9\"><font color=\"red\"><i class=\"fa fa-times-circle\" aria-hidden=\"true\"></i></font></div>";
				}; ?><div >
			</div>
				<div class="col-md-3"><b>Nº Autorizatário:</b></div>
				<div class="col-md-9"><?php echo $row_p['num_auto']; ?></div>				
				<div class="col-md-3"><b>Nº Processo:</b></div>
				<div class="col-md-9"><?php echo $row_p['num_proc']; ?></div>
				<div class="col-md-3"><b>Tipo Processo:</b></div>
				<div class="col-md-9"><?php echo $row_p['tipo_proc']; ?></div>
				<div class="col-md-3"><b>Data:</b></div>
				<div class="col-md-9"><?php echo date('d/m/Y', strtotime($row_p['data_proc'])); ?></div>
				<div class="col-md-3"><b>Selo:</b></div>
				<div class="col-md-9"><?php if($row_p['selo']==''){ 
										//echo "Aguardando";
										 if($row_p['fiscal']!=$_SESSION["usuarioNome"]){
										 echo"Não é possível adicionar.";}else{
											echo "<a href=\'#&id=". $row_p['id']."' data-toggle=\"modal\" data-target=\"#proc\"> 
												<button type=\'button\' class=\'btn btn-xs btn-success\'>Adicionar</button></a>";
											}
										}else{ 
										echo $row_p['selo'];
										}; 	 
				?></div>
				<div class="col-md-3"><b>Resultado:</b></div>
				<div class="col-md-9"><?php if($row_p['resultado']==''){
										 if($row_p['fiscal']!=$_SESSION["usuarioNome"]){
										 echo"Não é possível adicionar.";}else{
										echo "<a href=\'#&id=". $row_p['id']."' data-toggle=\"modal\" data-target=\"#result\"> 
												<button type=\'button\' class=\'btn btn-xs btn-success\'>Adicionar</button></a>";
										}
										}else{ 
										echo $row_p['resultado'];
										}; ?></div>
				<div class="col-md-3"><b>Observação:</b></div>
				<div class="col-md-9"><?php if($row_p['observacao']==''){ 
										echo "Sem Observação";}
										else{ 
										echo $row_p['observacao'];
										}; ?></div>										
				<div class="col-md-3"><b>Fiscal Atual:</b></div>
				<div class="col-md-9"><?php echo $row_p['fiscal']; ?></div>
				<div class="col-md-3"><b>Data da Transferência:</b></div>
				<div class="col-md-9"><?php 
				if($row_p['data_transfere']==NULL or $row_p['data_transfere']=='0000-00-00 00:00:00'){ 
						echo "Não transferido";
						}else{
							echo date("d/m/Y", strtotime($row_p['data_transfere']));
							} ?></div>
				
				<div class="col-md-3"><b>Fiscal Anterior:</b></div>
				<div class="col-md-9"><?php 
					if($row_p['fiscal_anterior']=='' or $row_p['fiscal_anterior']==NULL){
						echo "Não transferido";
					}else{
						echo $row_p['fiscal_anterior']; 
					}?></div>
			  </div><br />
			  <div class="row">
				<div class="col-md-12">
				  
				</div>     
			</div>
			</div>
			</div> <!-- /container -->

                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->	
<!-- Modal -->
						<div id="proc" class="modal fade" role="dialog">
						  <div class="modal-dialog">		
	<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Inserir Nº do Selo</h4>
									  </div>
										<div class="modal-body">
										<form class="form-horizontal" method="POST" action="processa/proc_cad_selo.php" enctype="multipart/form-data">
											  <div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Selo Nº:</label>
												<div class="col-sm-5">
												  <input type="text" class="form-control" name="selo" autofocus >
												</div>
											  </div> 
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Nº Processo:</label>
												<div class="col-sm-5">
												 <input type="hidden" class="form-control" name="id_p" value="<?php echo $row_p['id'];?>">
												 <input type="text" class="form-control" name="num_proc" value="<?php echo $row_p['num_proc'];?>" readonly>
												</div>
											  </div> 											
											  <div class="form-group">
											<div class="col-sm-offset-2 col-sm-3">
											  <button type="submit" class="btn btn-success">Cadastrar</button><p>
											</div><br />
										  </div>
										</form>
										</div>	
									
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>	</div>
							  </div>
							</div>			<!--fim modal-->
							
<!-- Modal -->
						<div id="transf" class="modal fade" role="dialog">
						  <div class="modal-dialog">		
	<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Transferir Processo</h4>
									  </div>
										<div class="modal-body">
										<form class="form-horizontal" method="POST" action="processa/proc_edit_fiscal.php" enctype="multipart/form-data">
											  <div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Novo Responsável:</label>
												<div class="col-sm-5">												
												  <select class="form-control" name="fiscal">
													  <option>Selecione</option>
													  <?php $resultado_f = $conecta->query("SELECT * FROM funcionarios");
														while($func = $resultado_f->fetch(PDO::FETCH_ASSOC)){
															?>
															<option value="<?php echo $func['nome'];?>"><?php echo $func['nome'];?></option>
														<?php
														}
														?>
													</select>
												</div>
											  </div> 
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Nº Processo:</label>
												<div class="col-sm-5">
												 <input type="hidden" class="form-control" name="fiscal_anterior" value="<?php echo $row_p['fiscal'];?>">
												 <input type="hidden" class="form-control" name="id_p" value="<?php echo $row_p['id'];?>">
												 <input type="text" class="form-control" name="num_proc" value="<?php echo $row_p['num_proc'];?>" readonly>
												</div>
											  </div> 											
											  <div class="form-group">
											<div class="col-sm-offset-2 col-sm-3">
											  <button type="submit" class="btn btn-success">Cadastrar</button><p>
											</div><br />
										  </div>
										</form>
										</div>	
									
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>	</div>
							  </div>
							</div>			<!--fim modal-->
							<!-- Modal -->
						<div id="result" class="modal fade" role="dialog">
						  <div class="modal-dialog">		
							<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Informar Resultado do Processo</h4>
									  </div>
										<div class="modal-body">
										<form class="form-horizontal" method="POST" action="processa/proc_cad_resultado.php" enctype="multipart/form-data">
											  <div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Resultado:</label>
												<div class="col-sm-5">
												  <select class="form-control" name="resultado">
													<option value="DEFERIDO">DEFERIDO</option>
													<option value="INDEFERIDO">INDEFERIDO</option>
												  </select>
												</div>
											  </div> 
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Observação:</label>
												<div class="col-sm-5">
												 <textarea class="form-control" rows="10" name="observacao"></textarea>											 
												</div>
											  </div><input type="hidden" class="form-control" name="num_proc" value="<?php echo $row_p['num_proc'];?>"> 											
											  <div class="form-group">
											<div class="col-sm-offset-2 col-sm-3">
											  <button type="submit" class="btn btn-success">Cadastrar</button><p>
											</div><br />
										  </div>
										</form>
										</div>	
									
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>	</div>
							  </div>
							</div>			<!--fim modal-->
    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
    function action1() 
    {
        $.ajax({
           type: "POST",
           url: "administrativo.php?link=11",
           data: $("cod").val(),
           success: //do something,
           dataType: //return dataType
        }); 
    }

    function action1() 
    {
        $.ajax({
           type: "POST",
           url: "consulta_darm.php",//other URL,
           data: $("cod").val(),
           success: //do something else,
           dataType: //return dataType
        }); 
    }
</script>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>
<div align='center'>
	<?php include_once("rodape.php");?>
    </div>
</html>