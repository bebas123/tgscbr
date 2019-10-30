<?php
	session_start();
	include_once('admin.session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pakar</title>
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

<?php
	include_once('menu.php');
?>
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="modal-header">
                	<h3>List Pakar</h3>
                </div>
            	<div style="margin-top:10px" class="text-right">
            		<a href="pakar.add.php"><input name="tambah" type="submit" id="tambah" value="Tambah Data" class="btn btn-danger"></a>
                </div>
                <div style="margin-top:10px">
                    <table class="table table-condensed table-bordered table-hover">
                        <thead>
                            <td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
                            <td width="25%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Penyakit</h5></font></td>
                            <td width="65%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Gejala</h5></font></td>
                            <td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><span class="icon-wrench"></span></h5></font></td>
                        </thead>
                        <?php
                            $i = 1;
                            $spg = mysql_query("select * from penyakit_gejala group by kode_penyakit desc");
                            while($dpg = mysql_fetch_array($spg)){
                                $sp = mysql_query("select * from penyakit where kode_penyakit='$dpg[kode_penyakit]'");
                                $dp = mysql_fetch_array($sp);
                        ?>
                        <tbody>
                        	<td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo $i;?></h5></font></td>
                            <td><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>
                                <?php echo "$dp[nama_penyakit] ($dpg[kode_penyakit])";?>
                                </h5></font>
                            </td>
                            <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5>
                                <?php
                                    $sg = mysql_query("select * from penyakit_gejala where kode_penyakit='$dpg[kode_penyakit]'");
                                    
                                    while($dg = mysql_fetch_array($sg)){
                                        $sp1 = mysql_query("select * from gejala where id_gejala='$dg[id_gejala]'");
                                        $dp1 = mysql_fetch_array($sp1);
                                        echo "* $dp1[nama_gejala]<br>";
                                    }
                                ?>
                                </h5></font>
                            </td>
                            <td>
                        	<font face="Comic Sans MS, cursive" class="text-info text-center"><h5>
                                <a class="tip" href="pakar.update.php?kode=<?php echo $dpg['kode_penyakit'];?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Edit"><span class="icon-pencil"></span></a>
                                <a class="tip" href="pakar.delete.php?kode=<?php echo $dpg['kode_penyakit'];?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Hapus"><span class="icon-remove"></span></a>
							</h5></font>
						</td>
                        </tbody>
                        <?php $i++; } ?>    
                    </table>
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