<?php
include_once('config.php');
include('verifica_login_admin.php');
?>
 
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>NTE - UCB</title>

	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
	
	<?php

	$condition	='';

	if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
		$condition	.=	' AND username LIKE "%'.$_REQUEST['username'].'%" ';
	}
	if(isset($_REQUEST['matricula']) and $_REQUEST['matricula']!=""){
		$condition	.=	' AND matricula LIKE "%'.$_REQUEST['matricula'].'%" ';
	}
	if(isset($_REQUEST['categoria']) and $_REQUEST['categoria']!=""){
		$condition	.=	' AND categoria LIKE "%'.$_REQUEST['categoria'].'%" ';
	}
	if(isset($_REQUEST['status']) and $_REQUEST['status']!=""){
		$condition	=	' AND status LIKE "%'.$_REQUEST['status'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){
		$condition	=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';
	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){
		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';
	}
	
	$userData	=	$db->getAllRecords('users','*',$condition,'ORDER BY id desc');


	

					
					
	?>
   	<div class="container">
		<hr>
		<h1>NTE - Solicitações Pendentes | <a href="logouta.php">Sair</a> | <a href="grafico.php">Dashboard</a></h1>
		<hr>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-user"></i> <strong> <?php echo $_SESSION['usuario'];?></strong> <a href="add-chamado-admin.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Registrar Solicitação</a></div>
			
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Solicitação concluída com sucesso!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Busca de Solicitações</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Nome</label>
									<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" >
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Matrícula</label>
									<input type="text" name="matricula" id="matricula" class="form-control" value="<?php echo isset($_REQUEST['matricula'])?$_REQUEST['matricula']:''?>" >
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Categoria</label>
									<select type="text" name="categoria" id="categoria" class="form-control" value="<?php echo isset($_REQUEST['categoria'])?$_REQUEST['categoria']:''?>">
										<option value="">Selecione</option>
										<option value="Espelhamento">Espelhamento</option>
										<option value="Acesso">Acesso</option>
										<option value="Importação">Importação</option>
									</select>
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>Por Status</label>
									<select type="text" name="status" id="status" class="form-control" value="<?php echo isset($_REQUEST['status'])?$_REQUEST['status']:''?>">
										<option value="">Selecione</option>
										<option value="Pendente">Pendente</option>
										<option value="Concluído">Concluído</option>
									</select>
								</div>
							</div>

				
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Buscar</button>
									    </div>
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										 <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Limpar</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>SLA</th>
						<th>N° Chamado</th>
						<th>Status</th>
						<th>Matricula</th>
						<th>Data de Abertura</th>
						<th class="text-center">Categoria</th>
						<th class="text-center">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;

						//$date1=date('d',strtotime($val['dt']));
						//$date2=date('d');
						//$diff1=$date1 - $date2;
						
						//$date1=date("Y-m-d",strtotime($val['dt']));
						//$date2=date_create(date('Y-m-d'));
						//$diff=date_diff($date1,$date2);
						//echo $diff;
						
						$data1 = new DateTime($val['dt']);
						$data2 = new DateTime();

						$intervalo = $data1->diff( $data2 );

						?>

					<tr>
					
					<?php
						if($val['status']=="Pendente"){

							if($intervalo->format('%d days')==0){	
							?>							
								<td align="center"><?php echo '<img src="img/0dia.png" name="branco" value="branco" id="branco">';?></td>
							<?php
							}
							
							if($intervalo->format('%d days')==1){	
							?>							
								<td align="center"><?php echo '<img src="img/0dia.png" name="branco" value="branco" id="branco">';?></td>
							<?php
							}

							if($intervalo->format('%d days')==2){	
							?>							
								<td align="center"><?php echo '<img src="img/2dia.png" name="amarelo" value="amarelo" id="amarelo">';?></td>
							<?php
							}
							
							if($intervalo->format('%d days')==3){	
							?>							
								<td align="center"><?php echo '<img src="img/3dia.png" name="laranja" value="laranja" id="laranja">';?></td>
							<?php
							}
							
							if($intervalo->format('%d days')>=4){	
							?>							
								<td align="center"><?php echo '<img src="img/4dia.png" name="vermelho" value="vermelho" id="vermelho">';?></td>
							<?php
							}
							
							?>
					<?php		
						}
						if($val['status']=="Concluído"){
					?>
						<td align="center"><?php echo '<img src="img/ok.png">';?></td>
					<?php
						}
					?>
						
						<td><?php echo $val['id'];?></td>
						<td><?php echo $val['status'];?></td>
						<td><?php echo $val['matricula'];?></td>
						<td align="center"><?php echo date('d-m-Y',strtotime($val['dt']));?></td>
						<td><?php echo $val['categoria'];?></td>
						<td align="center">
						<a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Ver Solicitação</a>
						
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="7" align="center">Nada a ser mostrado!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		<hr>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			jQuery(function($){
				  var input = $('[type=tel]')
				  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
				  input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				  })
			 });
			 
			 //From, To date range start
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			//From, To date range End here	
			
		});
	</script>
</body>
</html>
