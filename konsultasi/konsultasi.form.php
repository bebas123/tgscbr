<?php
	session_start();
	include_once '../lib/database.php';
	include_once 'header.php';
	$id = $_GET['id'];				
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Konsultasi</title>
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
            	<div class="text-error input-prepend pull-left">
                	<h4>Checklist Gejala Apa Saja Yang Dirasakan</h4>
                </div>
                <div class="input-prepend pull-right">
                	<a href="../konsultasi/"><button class="btn btn-danger btn-medium" title="Keluar dan konsultasi sebagai User yang lain"><span class="icon-off icon-white"></span> Keluar</button></a>
                </div>
                <div style="margin-top:10px">
                    <form name="form1" method="post" action="">
                        <table class="table table-condensed table-hover">
                            <?php 
                                $sg = mysql_query("select * from gejala");
                                while($dg = mysql_fetch_array($sg)){
                                    echo
                                    "<tr>
                                        <td class='text-center' width='2%'><input type='checkbox' name='item[]' id_gejala='item[]' value='$dg[id_gejala]'></td>
                                        <td class='text-left text-error' width='98%'>$dg[nama_gejala]</td>		
                                    </tr>";
                                }
                            ?>
                        </table>
                        <div>
                            <input type="submit" class="btn btn-success" name="periksa" id="periksa" value="Periksa Konsultasi"> <input type="reset" class="btn btn-warning" value="Ulangi">
                        </div>
                            
                        <?php
							if(isset($_POST['periksa'])){
								$jumlah = count($_POST["item"]);
								
								if($jumlah<7){
									echo "<script language=javascript>
											alert('Minimal Inputkan 7 Gejala. Mohon Diulangi Kembali');
											window.location='konsultasi.form.php?id=$id'</script>";
								}else if($jumlah>=7){
								$sk = mysql_query("select * from hasil_konsultasi group by waktu desc limit 1");
								$dk = mysql_fetch_array($sk);
								$k=$dk['konsultasi'];
								$konsultasi=$k+1;
								
									for($i=0; $i < $jumlah; $i++){
										$gejala = $_POST["item"][$i];
										
										$sb = mysql_query("select * from gejala where id_gejala=$gejala");
										$rb = mysql_fetch_array($sb);
										$bobot = $rb['bobot'];
										
										$q=mysql_query("insert into hasil_konsultasi(id_user, konsultasi, id_gejala, bobot, waktu) value ('$id', $konsultasi, '$gejala', '$bobot', NOW())") or die(mysql_error());
										
										if ($q){
											$nk = mysql_query("select * from hasil_konsultasi group by waktu desc limit 1");
											$r = mysql_fetch_array($nk);
											echo "<script language=javascript>
													alert('Lihat Hasil');
													window.location='hasil.php?id=$id&konsultasi=$r[konsultasi]';
													</script>";
										}
										else{
											echo "Konsultasi Gagal";
											echo "Silahkan <a href = 'konsultasi.form.php?id=$id'>Ulangi Disini</a>";
										}
									}                            
								}
							}
                        ?>
                    </form>
				</div>
			</div>
		</div>
</div>

<br><br><br><br>

<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>