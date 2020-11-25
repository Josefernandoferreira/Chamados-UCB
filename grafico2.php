<?php
 $con = mysqli_connect('localhost','root','','users');
?>

<style>
	table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
</style>

<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="refresh" content="20">
 <title>Gráficos</title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		 google.load("visualization", "1", {packages:["corechart"]});
		 google.setOnLoadCallback(drawChart);
		 function drawChart() {
		
		 var data = google.visualization.arrayToDataTable([

		 ['atendente','count(atendente)'],
		 <?php 
				$query = "select atendente, count(atendente)from users WHERE ATENDENTE IS NOT NULL group by atendente having count(atendente);";

				$exec = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($exec)){

				echo "['".$row['atendente']."',".$row['count(atendente)']."],";
				}
			?> 
		 
		 ]);9498

		 var options = {
		 title: 'Atendimento por Colaborador',
		 backgroundColor: '#f0f0f2',
		 color: 'white',
		 fontSize: 10,
		 pieHole: 0,
		 width: 650,
		 height: 500,		 
				  pieSliceTextStyle: {
					color:'#fff',
					bold: true,
					fontSize: 10,
				  }, 
				  
		 };

		 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart11"));
		 chart.draw(data,options);

		 }
			
    </script>
	
    <script type="text/javascript">
		 google.load("visualization", "1", {packages:["corechart"]});
		 google.setOnLoadCallback(drawChart);
		 function drawChart() {
		
		 var data = google.visualization.arrayToDataTable([

		 ['id','count(id)'],
			<?php 
			
			
				$query = "select dt,concat( monthname(dt), id), count(id) from users group by concat( monthname(dt)) ORDER BY dt ASC;";

			    $exec = mysqli_query($con,$query);
				 while($row = mysqli_fetch_array($exec)){

			   	echo "['".$row['concat( monthname(dt), id)']."',".$row['count(id)']."],";
				 	 }
			?> 
					 
			]);

		 var options = {
		 title: 'Atendimento por Mês',
		 backgroundColor: '#f0f0f2', 
		 bold: true,
		 fontSize: 16,
		 pieHole: 0,
		 width: 650,
		 height: 500,
				  pieSliceTextStyle: {
					color:'#fff',
					bold: true,
					fontSize: 18,
				  },  
		 };
		 
		 var chart = new google.visualization.LineChart(document.getElementById("columnchart14"));
		 chart.draw(data,options);

		 }
			
    </script>
	
	</head>
	<body style="background:#fff;">

	   <link rel="stylesheet" href="css/w33.css">

		<div class="w3-container">
	 
		  <div class="w3-panel w3-blue w3-round-xlarge" align="center">
			<br>
			<p align="center"><h1><b>Gráficos Analíticos - NTE</b></h1></p>
			<br>
		  </div>
		</div>
		
	<div class="container-fluid">
		
		<center>

			<div id="columnchart11"  style="width: 50%; height: 500px; aling:center; float:left"></div>

			<div id="columnchart14" style="width: 50%; height: 500px; height: 500px;float:right"></div>
	
		</center>
	</div>
	
		<div class="w3-container">
		  <div class="w3-panel w3-blue w3-round-xlarge" align="center">
			<br>
			<p align="center"><h1><b>Quantitativo de Atendimentos</b></h1></p>
			<br>
		  </div>
		</div>
		
	</body>
</html>


