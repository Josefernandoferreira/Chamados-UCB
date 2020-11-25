<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>NTE - UCB</title>

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	 <link rel="stylesheet" href="css/w3.css" >
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
					</div>
				</nav>
			</header>
		</div> <!--/.container-->
	</div>
	
   	<div class="container">
		<hr>
		<h1>Núcleo de Tecnologias Educacionais</h1>
		<hr>
		<div class="card">
			<div class="card-header"> <strong> </strong>
			
				<a href="login_user.php" class="float-right btn btn-primary btn-sm"><i class="fa fa-fw fa-user"></i> Login</a>

				Nome - Teste
			</div>
			
		<div class="w3-content" style="max-width:1200px">
		  <img class="mySlides" src="img/2.jpg" style="width:100%;display:none">
		  <img class="mySlides" src="img/1.jpg" style="width:100%">
		  <img class="mySlides" src="img/3.png" style="width:100%;display:none">

		  <div class="w3-row-padding w3-section">
			<div class="w3-col s4">
			  <img class="demo w3-opacity w3-hover-opacity-off" src="img/2.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
			</div>
			<div class="w3-col s4">
			  <img class="demo w3-opacity w3-hover-opacity-off" src="img/1.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
			</div>
			<div class="w3-col s4">
			  <img class="demo w3-opacity w3-hover-opacity-off" src="img/3.png" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
			</div>
		  </div>
		</div>		
		</div>	
		
		<hr>
		</div>	
		
		<center><a href="login_admin.php" class="float-center btn  btn-sm"><i class="fa fa-fw fa-user"></i> Administrador</a></center>
		<br>
		<script>
			function currentDiv(n) {
			  showDivs(slideIndex = n);
			}

			function showDivs(n) {
			  var i;
			  var x = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("demo");
			  if (n > x.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = x.length}
			  for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
			  }
			  x[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " w3-opacity-off";
			}
		</script>
		
</body>
</html>
