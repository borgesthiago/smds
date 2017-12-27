<?php session_start();?>
<!DOCTYPE html>
<html>
<?php require "head.php";?>

<script type="text/javascript">
function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function cpf(v){

    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")

    if (v.length <= 14) { //CPF

        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")

        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2")

        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

    } 

    return v
}
</script>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    Painel <b> SMDS</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  
	<?php
		unset(	$_SESSION['usuarioId'],
				$_SESSION['usuarioNome'],
				$_SESSION['usuarioNivelAcesso'],
				$_SESSION['usuarioNum_Auto']);
	?>
 
                        <form class="form-signin" method="POST" action="gestor.php" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Digite seu CPF, apenas números" onkeypress='mascaraMutuario(this,cpf)' name="login" onblur='clearTimeout()' id="cpfcnpj"  type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password" >
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <button type='submit' class='btn btn-lg btn-success btn-block'>Entrar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	  <?php 
		//$link = "../iop/primeiro_acesso.php";
	  ?>
		  <!--	<div align="center"><a href="<?php //echo $link;?>" target="_blank" >Clique Aqui</a></div>-->
		<p class="text-center text-danger">
			<?php
				if(isset($_SESSION['loginErro'])){
					echo $_SESSION['loginErro'];
					unset ($_SESSION['loginErro']); #destroi a variável depois do erro
				}
			?>
		</p>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
