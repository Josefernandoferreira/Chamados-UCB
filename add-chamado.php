<?php 
include('verifica_login_user.php');
include_once('config.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}elseif($matricula==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}
	elseif($categoria==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}
	elseif($descricao==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
		exit;
	}else{
		
		$userCount	=	$db->getQueryCount('users','id');
		if($userCount[0]['total']<5000){
			$data	=	array(
							'status'=>$status,
							'matricula'=>$matricula,
							'username'=>$username,
							'useremail'=>$useremail,
							'userphone'=>$userphone,
							'categoria'=>$categoria,
							'descricao'=>$descricao,
							
						);
			$insert	=	$db->insert('users',$data);
			if($insert){
				header('location:consulta.php?msg=ras');
				exit;
			}else{
				header('location:browse-users.php?msg=rna');
				exit;
			}
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
			exit;
		}
	}
}
?>

<!doctype html>

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

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<script>

	  (adsbygoogle = window.adsbygoogle || []).push({

		google_ad_client: "ca-pub-6724419004010752",

		enable_page_level_ads: true

	  });

	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>

	<script>

	  window.dataLayer = window.dataLayer || [];

	  function gtag(){dataLayer.push(arguments);}

	  gtag('js', new Date());

	  gtag('config', 'UA-131906273-1');

	</script>

</head>

<body style="background:#dee2e6;">
	<div class="bg-light border-bottom shadow-sm sticky-top">
		<div class="container">
			<header class="blog-header py-1">
				<nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand text-muted p-0 m-0" href="https://learncodeweb.com"><img src="img/UCB.png" width="200px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						</ul>
					</div>
				</nav>
			</header>
		</div> <!--/.container-->
	</div>
	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo top banner -->
		<script>

		(adsbygoogle = window.adsbygoogle || []).push({});

		</script>

	</div>

   	<div class="container">
		<hr>
			<h1>NTE - Solicitação | <a href="logout.php">Sair</a></h1>
		<hr>
		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Exclua um usuário e tente novamente. Definimos um limite por razões de segurança!</strong></div>';

		}

		?>

		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-user"></i> <?php echo $_SESSION['usuario'];?>  <a href="consulta.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-arrow-left"></i> Voltar</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Campos com <span class="text-danger">*</span> são obrigatórios</h5>

					<form method="post">
					
						<div class="form-group">

							<input type="hidden" name="status" id="status" value="Pendente"class="form-control">

						</div>
					
						<div class="form-group">

							<label>Matrícula: <span class="text-danger">*</span></label>

							<input type="text" name="matricula" id="matricula" class="form-control" placeholder="Infome sua matrícula" required>

						</div>

						<div class="form-group">

							<label>Nome: <span class="text-danger">*</span></label>

							<input type="text" name="username" id="username" class="form-control" value="<?php echo $_SESSION['usuario'];?>" readonly>

						</div>

						<div class="form-group">

							<label>Email: <span class="text-danger">*</span></label>

							<input type="email" name="useremail" id="useremail" class="form-control" placeholder="Informe seu email" required>

						</div>

						<div class="form-group">

							<label>Telefone:<span class="text-danger">*</span></label>

							<input type="tel"  class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" placeholder="Informe seu telefone" required></textarea>

						</div>
						
						<div class="form-group">

							<label>Categoria:<span class="text-danger">*</span></label>

							<select class="tel form-control" name="categoria" id="categoria" x-autocompletetype="tel" placeholder="Selecione a categoria" required>
								<option value="Importação"> Importação de Conteúdo</option>
								<option value="Espelhamento">Junção de Turmas</option>
								<option value="Acesso"> Acessos</option>
								
							</select>

						</div>
						
						<div class="form-group">

							<label>Descrição:<span class="text-danger">*</span></label>

							<textarea  type="text" rows="4" attern=".{14,14}" class="tel form-control" name="descricao" id="descricao" x-autocompletetype="tel" placeholder="Informe a mensagem" required></textarea>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Enviar Solicitação</button>

						</div>

					</form>

				</div>

			</div>

		</div>
		
		<hr>

	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>

    

</body>

</html>