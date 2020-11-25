<?php
include('verifica_login_admin.php');
include_once('config.php');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'Modalidade'=>$Modalidade,
					'feedback'=>$feedback,
					'df_final'=>$df_final,
					'atendente'=>$atendente,
					'status'=>$status,
					'matricula'=>$matricula,
					'username'=>$username,
					'useremail'=>$useremail,
					'userphone'=>$userphone,
					'categoria'=>$categoria,
					'descricao'=>$descricao,
					);
					
	$update	=	$db->update('users',$data,array('id'=>$editId));
	if($update){
		header('location: browse-users.php?msg=rus');
		exit;
	}else{
		header('location: browse-users.php?msg=rnu');
		exit;
	}
}
	date_default_timezone_set('America/Sao_Paulo');
	$date = date_create();
	$data=date_format($date, 'Y-m-d H:i:s');

?>

<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
</head>

<body style="background:#dee2e6;">
	
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
				<nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand text-muted p-0 m-0" href="browse-users.php"><img src="img/UCB.png" width="200px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						</ul>		
					</div>
				</nav>
			</header>
		</div> <!--/.container-->
	</div>
	
   	<div class="container">
		<hr>
		<h1>Consulta de Solicitação</h1>
		<hr>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-user"></i>  <?php echo $_SESSION['usuario'];?><a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-arrow-left"></i> Voltar</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					
					<form method="post">
					<hr>
						<div class="form-group">
							<input type="hidden" name="atendente" id="atendente" class="form-control" value=<?php echo $_SESSION['usuario'];?>  readonly>
						</div>
						<div class="form-group">
							<label> <b>Status:</b> <span class="text-danger"><b><?php echo $row[0]['status']; ?></b></span></label>
							<input type="hidden" name="status" id="status" class="form-control" value="<?php echo $row[0]['id']; ?>"  readonly>
							
							<?php
								$temps=$row[0]['status']; 
							?>

							<?php
								
								if($temps == "Concluído"){
							?>
							
						</div>
						
						<div class="form-group">
							<label> <b>Concluído por:</b> <span class="text-danger"><b><?php echo $row[0]['atendente']; ?></b></span></label>
						</div>
						
						<div class="form-group">
							<label> <b>Modalidade</b> <span class="text-danger"><b><?php echo $row[0]['Modalidade']; ?></b></span></label>
						</div>
						
						<div class="form-group">
							<label> <b>Data de Abertura</b> <span class="text-danger"><b><?php echo $row[0]['dt']; ?></b></span></label>
						</div>
						
						<div class="form-group">
							<label> <b>Data de Conclusão</b> <span class="text-danger"><b><?php echo $row[0]['df_final']; ?></b></span></label>
						</div>
						
						<div class="form-group">
							<label> Matrícula <span class="text-danger">*</span></label>
							<input type="text" name="matricula" id="matricula" class="form-control" value="<?php echo $row[0]['matricula']; ?>"  readonly >
						</div>
						<div class="form-group">
							<label> Nome <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" value="<?php echo $row[0]['username']; ?>" readonly >
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo $row[0]['useremail']; ?>"   readonly>
						</div>
						<div class="form-group">
							<label>Telefone <span class="text-danger">*</span></label>
							<input type="tel" name="userphone" id="userphone" class="form-control" value="<?php echo $row[0]['userphone']; ?>"   readonly>
						</div>
						<div class="form-group">
							<label>Categoria <span class="text-danger">*</span></label>
							<input type="text" name="categoria" id="categoria" maxlength="12" class="form-control" value="<?php echo $row[0]['categoria']; ?>"  readonly>
						</div>
						<div class="form-group">
							<label>Descrição do Usuário <span class="text-danger">*</span></label><br>
							<textarea  cols="100" rows="10" name="descricao" id="descricao" rows="4"  value="<?php echo $row[0]['descricao']; ?>" readonly ><?php echo $row[0]['descricao']; ?></textarea>
						</div>
						<div class="form-group">
							<label>Feedback <span class="text-danger">*</span></label><br>
							<textarea  cols="100" rows="10" name="feedback" id="feedback" rows="4"  value="<?php echo $row[0]['feedback']; ?> " readonly ><?php echo $row[0]['feedback']; ?></textarea>
						</div>
						
						<div class="form-group">
							<a href="browse-users.php"><button type="button"  name="button" value="button" id="button" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Voltar</button></a>
						</div>
						
						<?php
								
						}else{
								
						?>
						</div>
						
						
						
						<div class="form-group">
							<input type="hidden" name="df_final" id="df_final" class="form-control" value="<?php echo $data; ?>"  readonly>
						</div>
						<div class="form-group">
							<label> <b>N° da Solicitação:</b> <span class="text-danger"><b><?php echo $row[0]['id']; ?></b></span></label>
							<input type="hidden" name="status" id="status" class="form-control" value="Concluído"  readonly>
						</div>

						<hr>
						
						<div class="form-group">
							<label> Matrícula <span class="text-danger">*</span></label>
							<input type="text" name="matricula" id="matricula" class="form-control" value="<?php echo $row[0]['matricula']; ?>"  readonly >
						</div>
						<div class="form-group">
							<label> Nome <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" value="<?php echo $row[0]['username']; ?>" readonly >
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo $row[0]['useremail']; ?>"   readonly>
						</div>
						<div class="form-group">
							<label>Telefone <span class="text-danger">*</span></label>
							<input type="tel" name="userphone" id="userphone" class="form-control" value="<?php echo $row[0]['userphone']; ?>"   readonly>
						</div>
						<div class="form-group">
							<label>Categoria <span class="text-danger">*</span></label>
							<input type="text" name="categoria" id="categoria" maxlength="12" class="form-control" value="<?php echo $row[0]['categoria']; ?>"  readonly>
						</div>
						<div class="form-group">
							<label>Descrição <span class="text-danger">*</span></label><br>
							<textarea  cols="100" rows="10" name="descricao" id="descricao" rows="4"  value="<?php echo $row[0]['descricao']; ?>" readonly ><?php echo $row[0]['descricao']; ?></textarea>
						</div>
						<div class="form-group">
							<label>Feedback <span class="text-danger">*</span></label><br>
							<textarea  cols="100" rows="10" name="feedback" id="feedback" rows="4"  value="<?php echo $row[0]['feedback']; ?> " <?php echo $row[0]['feedback']; ?>></textarea>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit"  name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Concluir Solicitação</button>
						</div>
						<?php	
						}
						?>	
					
					</form>
				</div>
			</div>
		</div>
		<hr>
	</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>