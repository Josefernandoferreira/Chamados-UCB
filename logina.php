<?php
session_start();
include('conexao.php');
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
 
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
 
$query = "select usuario from login where usuario = '{$usuario}' and senha = '{$senha}'";
 
$result = mysqli_query($conexao, $query);
 
$row = mysqli_num_rows($result);
 
if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nome'] = $nome;
	header('Location: browse-users.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: login_admin.php');
	exit();
}
?>