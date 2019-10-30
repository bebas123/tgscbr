<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistem Pakar Diagnosa Penyakit Akibat Virus Eksantema</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="img/favicon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>

<?php
	include_once 'lib/database.php';
	include_once('menu.php');
	include_once 'header.php';
	
	
?>
<div class="container">
	<div class="navbar-inner" style="border:0px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:45px; margin-left:auto; margin-right:auto;">
		
		<ul class="breadcrumb" style="margin:0; background-color:transparent;">
			
				<li  class="active">Home
				<span class="devider">&raquo;</span></li>
			
			
		</ul>
		
		<div class="modal-header">
			<h4>Selamat Datang</h4>
		</div>
		
		<div style="margin-top:5px;">
			<form id="form1" name="form1" method="post" action="">
				
					<div class="navbar-inner" style="border:1px solid #bbb;border-radius:10px;padding:20px; margin-left:30px; margin-top:10px">
						<div class="control-group text-left text-error">
							<h4>NAMA ANGGOTA</h4>
						</div>
						<div class="text-warning" style="font-size:20px;">
								<ul>
										<li>Abdul Aziz Fikri (11170383)</li>
										<li>Adi Kurniawan (11170384)</li>
										<li>Ana Suryaningsih (11170386)</li>
										<li>Hidayatul Azizah (11170390)</li>
										<li>Ilham Royani (11170391)</li>
										<li>Intan Hidayah (11170392)</li>
										<li>Nindya Putri Sholihah (11170396)</li>
										<li>Susi Trihandayani (11170398)</li>
								</ul>
						</div>
					</div>

				
				
			</form>
		</div>
	</div>
</div>

<br><br><br><br>



<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>