<?php
	session_start();
	include_once '../lib/database.php';
	include_once 'header.php';
	$id = $_GET['id'];
	$konsultasi = $_GET['konsultasi'];			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hasil Konsultasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(../img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>	

<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="text-error">
                	<a href="../konsultasi/"><button class="btn btn-danger btn-medium" title="Keluar dan konsultasi sebagai User yang lain"><span class="icon-off icon-white"></span> Keluar</button></a>
                </div>
                <div class="text-error" style="margin-top:20px;">
                	<?php
						$sql_user = mysql_query("select * from user where id_user='$id'");
						$detail_user = mysql_fetch_array($sql_user);
						if(mysql_num_rows($sql_user) > 0){
							$nama	= $detail_user['nama'];
							$umur	= $detail_user['umur'];
							$tgl_konsultasi	= $detail_user['tgl_konsultasi'];
							
							echo   "Nama : <b class='text-info'>$nama</b>
									<br>
									Usia : <b class='text-info'>$umur Tahun</b>
									<br>
									Konsultasi Pada : <b class='text-info'>$tgl_konsultasi</b>";
						}
					?>
                </div>
                <div style="margin-top:20px">
                    <form name="form1" method="post" action="">
                        <div class="span4 navbar-inner"><h5 class="text-left text-error">Gejala Yang Dipilih :</h5>
                    <?php
                        //GEJALA YANG DIPILIH USER
                        $sk = mysql_query("select id_gejala from hasil_konsultasi where konsultasi='$konsultasi'") or die(mysql_error());
                        $rk = mysql_num_rows($sk);
                        
                        while($dk = mysql_fetch_array($sk)){
                            $sg = mysql_query("select * from gejala where id_gejala='$dk[id_gejala]'") or die(mysql_error());
                            $dg = mysql_fetch_array($sg);
                            echo "<font face='Comic Sans MS, cursive' class='text-info text-left'><h5>* $dg[nama_gejala]</h5></font>";
                        }
						?>
                        </div>
                        <div class="span4 navbar-inner">
						<?php
                        //PROSES PENYAKIT P01
                        $s1 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P01%') AND konsultasi=$konsultasi");
                        $r1 = mysql_num_rows($s1);
                        
                        $ssum1 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j1
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P01%')")
                                                or die(mysql_error());
                        $dsum1 = mysql_fetch_array($ssum1);
                        $proses1 = $dsum1['j1']/29;
                        
                        //PROSES PENYAKIT P02
                        $s2 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P02%') AND konsultasi=$konsultasi");
                        $r2 = mysql_num_rows($s2);
                        
                        $ssum2 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j2
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P02%')")
                                                or die(mysql_error());
                        $dsum2 = mysql_fetch_array($ssum2);
                        $proses2 = $dsum2['j2']/20;
                        
                        //PROSES PENYAKIT P03
                        $s3 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P03%') AND konsultasi=$konsultasi");
                        $r3 = mysql_num_rows($s3);
                        
                        $ssum3 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j3
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P03%')")
                                                or die(mysql_error());
                        $dsum3 = mysql_fetch_array($ssum3);
                        $proses3 = $dsum3['j3']/21;
                        
                        //PROSES PENYAKIT P04
                        $s4 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P04%') AND konsultasi=$konsultasi");
                        $r4 = mysql_num_rows($s4);
                        
                        $ssum4 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j4
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P04%')")
                                                or die(mysql_error());
                        $dsum4 = mysql_fetch_array($ssum4);
                        $proses4 = $dsum4['j4']/17;
                        
                        //PROSES PENYAKIT P05
                        $s5 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P05%') AND konsultasi=$konsultasi");
                        $r5 = mysql_num_rows($s5);
                        
                        $ssum5 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j5
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P05%')")
                                                or die(mysql_error());
                        $dsum5 = mysql_fetch_array($ssum5);
                        $proses5 = $dsum5['j5']/13;
                        
                        //PROSES PENYAKIT P06
                        $s6 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P06%') AND konsultasi=$konsultasi");
                        $r6 = mysql_num_rows($s6);
                        
                        $ssum6 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j6
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P06%')")
                                                or die(mysql_error());
                        $dsum6 = mysql_fetch_array($ssum6);
                        $proses6 = $dsum6['j6']/41;
                        
                        //PROSES PENYAKIT P07
                        $s7 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P07%') AND konsultasi=$konsultasi");
                        $r7 = mysql_num_rows($s7);
                        
                        $ssum7 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j7
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P07%')")
                                                or die(mysql_error());
                        $dsum7 = mysql_fetch_array($ssum7);
                        $proses7 = $dsum7['j7']/15;
                        
                        //PROSES PENYAKIT P08
                        $s8 = mysql_query("select * from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P08%') AND konsultasi=$konsultasi");
                        $r8 = mysql_num_rows($s8);
                        
                        $ssum8 = mysql_query("select sum(if(a.konsultasi=$konsultasi, a.bobot,0)) as j8
                                                from hasil_konsultasi a where a.id_gejala IN (select b.id_gejala from penyakit_gejala b where b.kode_penyakit like 'P08%')")
                                                or die(mysql_error());
                        $dsum8 = mysql_fetch_array($ssum8);
                        $proses8 = $dsum8['j8']/24;
                        
                        //MEMBANDINGKAN NILAI SIMILARITY DAN MENGAMBIL NILAI YANG PALING TINGGI
                        $MAX = max($proses1, $proses2, $proses3, $proses4, $proses5, $proses6, $proses7, $proses8);
                         echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Perbandingan Nilai <b class='text-error'><br>Scarlet Fever : $proses1<br>Campak : $proses2<br>Rubela : $proses3<br>Campak Atipik : $proses4<br>Meningococcemia : $proses5<br>Hand-Foot-Mouth Disease (HFMD): $proses6</b></font></div>";
                        //MENAMPILKAN HASIL AKHIR
                        if($MAX==$proses1){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P01%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses2){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P02%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses3){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P03%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses4){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P04%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                        else if($MAX==$proses5){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P05%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }else if($MAX==$proses6){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P06%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }else if($MAX==$proses7){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P07%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }else if($MAX==$proses8){
                            $sp = mysql_query("select * from penyakit where kode_penyakit LIKE 'P08%'") or die(mysql_error());
                            $dp = mysql_fetch_array($sp);
                            $spas =  mysql_query("select * from user where id_user='$id'") or die(mysql_error());
                            $dpas = mysql_fetch_array($spas);
                            
                            
                            echo "<div class='text-info' style='margin-top:10px;'><font face='Comic Sans MS, cursive'>Anda Terdiagnosa Penyakit <b class='text-error'><u>$dp[nama_penyakit]</u></b></font></div>";
                            echo "<div style='margin-top:10px;'><font face='Comic Sans MS, cursive'>$dp[ket]</font></div>";
							echo "<div class='text-success' style='margin-top:40px;'><font face='Comic Sans MS, cursive'><b>Solusi :</b><br>$dp[solusi]</font></div>";
                            $ket = mysql_query("insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kode_penyakit) values ('$konsultasi', '$dpas[nama]', NOW(), '$MAX', '$dp[kode_penyakit]')");
                        }
                    ?>
                    </div>
                    </form>
				</div>
			</div>
		</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>