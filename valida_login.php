<?php
session_start();

$login = $_POST['login'];
$senha = sha1($_POST['senha']);
//echo $logint.' - '.$senhat;

require ("conexao.php");
#include_once("conexao.php");
try{
	
$consulta = $conecta->prepare('SELECT * FROM usuarios where login=:login and senha = :senha');
$consulta->bindParam(':login', $login,PDO::PARAM_STR);
$consulta->bindParam(':senha', $senha,PDO::PARAM_STR);
$consulta->execute();
 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
foreach($consulta as $linha) {
     $nome = $linha['nome'];
 }
if(empty($linha)){
	#mensagem de error
	$_SESSION['loginErro'] = "Usuário ou Senha inválido";
	
	#Redireciona para página de Login
	header("Location:login.php");
}else{
	#Define os valores atribuidos na sessao do usuario
	$_SESSION['usuarioId'] 			= $linha['id'];
	$_SESSION['usuarioNome'] 		= $linha['nome'];
	$_SESSION['usuarioNivelAcesso'] = $linha['nivel_acesso_id'];
	$_SESSION["usuarioNum_Auto"] = $linha['num_auto'];
		
if($_SESSION['usuarioNivelAcesso'] ==1){
	
	header("Location:../sup/administrativo.php");
}	else{
if($_SESSION['usuarioNivelAcesso'] ==2){
	
	header("Location:../usu/administrativo.php");
}}
	
}
?>
