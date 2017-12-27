<?php
require_once ("conf.php");

$ADODB_FETCH_MODE = 2;

ini_set("ibase.timestampformat", '%d/%m/%Y');
ini_set("ibase.dateformat", '%d/%m/%Y');

$id = $_SESSION['usuarioId'];
$user = $_SESSION["usuarioNome"];
$n_user = $_SESSION['usuarioNivelAcesso'];

		$server = $_SERVER['SERVER_NAME'];

		$endereco = $_SERVER ['REQUEST_URI'];

		$link =  "http://" . $server . $endereco;
		
		$link2 = '/../sair.php';
		
include_once("conexao.php");
$dados = $conecta->query("SELECT * FROM avisos ");
$dados->execute(); 
$count= $dados->rowCount();	

$dados_u = $conecta->query("SELECT * FROM autorizatarios");
$dados_u->execute(); 
$count_user= $dados_u->rowCount();	

		
		$link = @$_GET["link"];
		try{
	
		$consulta = $conecta->prepare('SELECT * FROM login where id= :id');
		$consulta->bindParam(':id', $idpessoa,PDO::PARAM_STR);
		$consulta->execute();
		 
		} catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
		}
	
		require_once("consulta_geral.php");
		
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
				
				<h3>Cadastrar Processo</h3>
			 
			  <div class="row espaco">		
			  </div><br />
			  <div class="row">
			<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="processa/proc_cad_processo.php" enctype="multipart/form-data">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Nº Autorizatário:</label>
		<div class="col-sm-3">
		  <input type="text" class="form-control" name="num_auto" autofocus >
		</div>
	  </div> 
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Nº do Processo:</label>
		<div class="col-sm-3">
		  <input type="text" class="form-control" name="num_proc" >
		</div>
	  </div>	
	  
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Data Entrada:</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" name="data_proc" placeholder="Data do documento">
			</div>
	   </div>
	    <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Tipo:</label>
			<div class="col-sm-5">
				  <select class="form-control" name="tipo_proc">
				  <option>Selecione</option>
				  <?php $consulta_taxa = $conecta->query("SELECT * FROM taxas ");
					while($taxa = $consulta_taxa->fetch(PDO::FETCH_ASSOC)){
						?>
						<option value="<?php echo $taxa['descricao'];?>"><?php echo $taxa['descricao'];?></option>
					<?php
					}
					?>
				</select>
			</div>
		</div>
	  
	  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Fiscal:</label>
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
	  
	  
	</div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-success">Cadastrar</button><p>
		</div><br />
	  </div>
	</form>
			</div>     
			</div>
  
			</div> <!-- /container -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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