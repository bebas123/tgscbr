<?php
	include_once 'admin.session.php';
?>


<div class="container">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
            <!-- Komponen navbar -->	
			<ul class="nav pull-left">
				<li class="active"><a href="home.php"><span class="icon-home"></span><b class="text-error"> Sistem Pakar</b></a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-info-sign"></span><b> Kelola </b><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="gejala.php?hal=1"><span class="icon-info-sign"></span><b> Gejala</b></a></li>
						<li><a href="penyakit.php?hal=1"><span class="icon-info-sign"></span><b> Penyakit</b></a></li>
                        
					</ul>
				</li>
				
				<li><a href="informasi.php?hal=1"><span class="icon-info-sign"></span><b> Informasi</b></a></li>
                <li><a href="hasil.konsultasi.php?hal=1"><span class="icon-info-sign"></span><b> Hasil Konsultasi Pasien</b></a></li>
				
			</ul>
			<ul class="nav pull-right">
				<li><a href="logout.php"><span class="icon-bar icon-off"></span><b> Logout</b></a></li>
			</ul>
		</div>
	</div>
</div>