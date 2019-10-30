<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Informasi</title>
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
		include_once 'menu.php';
	include_once 'header.php';
?>
<div class="container">
	<div class="navbar-inner" style="border:0px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:45px; margin-left:auto; margin-right:auto;">
		<?php
			include_once 'lib/database.php';
			$i = 1;
			$jml_per_halaman = 3; // jumlah data yg ditampilkan perhalaman
			$jml_data = mysql_num_rows(mysql_query("select * from informasi where ket='Show'"));
			$jml_halaman = ceil($jml_data / $jml_per_halaman);
		
			if(isset($_GET['hal'])){
				$hal = $_GET['hal'];
				$i = ($hal - 1) * $jml_per_halaman  + 1;
				$s = mysql_query("select * from informasi where ket='Show' order by id_informasi desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
				
			}else{
				$s = mysql_query("select * from informasi where ket='Show' order by id_informasi desc limit 0, $jml_per_halaman")
						or die(mysql_error());
			}
		?>
		
		<ul class="breadcrumb" style="margin:0; background-color:transparent;">
			<li><a href="informasi.php?hal=1">Home</a>
				<span class="devider">&raquo;</span></li>
			<li class="active">Informasi</li>
		</ul>
		
		<div class="modal-header">
			<h3>Informasi Terbaru</h3>
		</div>
		
		<?php if(mysql_num_rows($s) != 0){ ?>
		
		<div style="margin-top:5px;">
			<form id="form1" name="form1" method="post" action="">
				<?php while($data = mysql_fetch_array($s)){ ?>
				
					<div class="navbar-inner" style="border:1px solid #bbb;border-radius:10px;padding:20px; margin-left:30px; margin-top:10px">
						<div class="control-group text-left text-error">
							<h4><?php echo "$data[judul]"; ?></h4>
						</div>
						<div class="text-info">
							<h6>Pada : <?php echo $data['tgl'] ?></h6>
						</div>
						<div class="text-warning">
							<?php echo $data['isi'] ?>
						</div>
					</div>
				<?php $i++; } ?>
				<div class="pagination pagination-centered">
					<ul>
						<?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
							<li><a href="informasi.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<?php
					}else{
						echo "<h3 class='text-error text-center'>Belum Ada Informasi..</h3>";
					}
				?>
			</form>
		</div>
	</div>
</div>

<br><br><br><br>



<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>