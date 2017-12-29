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
//autorizatarios ativo
$resultado=$conecta->query("SELECT * FROM processos WHERE status ='1' ORDER BY 'num_auto' ASC");
$resultado->execute(); 
$count_at= $resultado->rowCount();

		//autorizatarios inativos
$dados_i = $conecta->query("SELECT * FROM processos WHERE status='0'");
$dados_i->execute(); 
$count_in= $dados_i->rowCount();	

		
		$link = @$_GET["link"];
		try{
	
		$consulta = $conecta->prepare('SELECT * FROM login where id= :id');
		$consulta->bindParam(':id', $idpessoa,PDO::PARAM_STR);
		$consulta->execute();
		 
		} catch(PDOException $e) {
		  echo 'Error: ' . $e->getMessage();
		}
	
		//require_once("consulta_geral.php");			
				
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
	<h3>Lista de Processos</h3>
  </div>
  <div class="row espaco">	 
	
  </div><br />
  <div class="row">
	<div class="col-md-12">
	<a href="#">Ativos <span class="badge"><?php print $count_at;?></span></a> 
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#inativos">Excluídos <span class="badge"><?php print $count_in;?></span></button>
	  <table class="table">
		<thead>
		  <tr>
			<th><center>Nº Auto.</center></th>	
			<th>Nº Processo</th>	
			<th>Selo</th>	
			<th>Data Processo</th>	
			<th>Tipo Processo</th>	
			<th>Resultado</th>	
			<th>Fiscal Resp.</th>	
			<th>Ações</th>
		  </tr>
		</thead>
		<tbody>
		<?php
		$resultado=$conecta->query("SELECT * FROM processos WHERE status='1' ORDER BY num_auto ASC");
			while($linhas = $resultado->fetch(PDO::FETCH_ASSOC)){
				echo "<tr>";
					echo " <td><center>".$linhas['num_auto']."</center></td>";
					echo " <td>".$linhas['num_proc']."</td>";					
					echo " <td>".$linhas['selo']."</td>";					
					echo " <td>".date('d/m/Y', strtotime($linhas['data_proc']))."";
					echo " <td>".$linhas['tipo_proc']."</td>";	
					echo " <td>".$linhas['resultado']."</td>";	
					echo " <td>".$linhas['fiscal']."</td>";					
					?> 	<td>
							<a href='administrativo.php?link=7&id_p=<?php echo $linhas['id'];?>'><button type='button' class='btn btn-xs btn-info'>Visualizar</button></a>
							<a href='administrativo.php?link=8&id=<?php echo $linhas['id'];?>'><button type='button' class='btn btn-xs btn-warning'>Editar</button></a>
							<a href='processa/proc_apagar_p.php?id=<?php echo $linhas['id'];?>'><button type='button' class='btn btn-xs btn-danger'>Apagar</button></a>
							
							</td><?php echo "
				</tr>";
			}
		?>
		</tbody>
	  </table>
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
	<!-- Modal -->
						<div id="inativos" class="modal fade" role="dialog">
						  <div class="modal-dialog modal-lg">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Lista de Processos Excluídos</h4>
							  </div>
							  <div class="modal-body">
							<table class="table">
							<thead>
							  <tr>
								<th><center>Nº Auto.</center></th>	
								<th>Nº Processo</th>	
								<th>Selo</th>	
								<th>Data Processo</th>	
								<th>Tipo Processo</th>	
								<th>Fiscal Resp.</th>	
								<th>Ações</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							$resultado=$conecta->query("SELECT * FROM processos WHERE status='0' ORDER BY num_auto ASC");
								while($linhas = $resultado->fetch(PDO::FETCH_ASSOC)){
									echo "<tr>";
										echo " <td><center>".$linhas['num_auto']."</center></td>";
										echo " <td>".$linhas['num_proc']."</td>";					
										echo " <td>".$linhas['selo']."</td>";					
										echo " <td>".date('d/m/Y', strtotime($linhas['data_proc']))."";
										echo " <td>".$linhas['tipo_proc']."</td>";	
										echo " <td>".$linhas['fiscal']."</td>";					
										?> 	<td>							  
							<a href='administrativo.php?link=7&id_p=<?php print $linhas['id'];?>'><button type='button' class='btn btn-xs btn-info'>Visualizar</button></a><!--consultar no GPRO-->							
							</td><?php echo "
							</tr>";			}									
								?>
								</tbody>
							  </table>
							</div>									
							  
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
						</div>
						</div>
						</div><!--fim modal-->	
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