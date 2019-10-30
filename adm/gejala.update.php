<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= mysql_query("select * from gejala where kode_gejala='$kode'");
	$data	= mysql_fetch_array($sql);
	if(mysql_num_rows($sql) > 0){
		$nama	= $data['nama_gejala'];
		$bobot	= $data['bobot'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Gejala</title>
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
			<div class="modal-header">
            	<h3>Edit Gejala</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="kode">Kode Gejala</label>
                        <div class="controls">
                            <input name="kode" type="text" id="kode" class="input-small" value='<?php echo "$kode";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="nama">Nama Gejala</label>
                        <div class="controls">
                        	<input name="nama" type="text" id="nama" class="input-xxlarge" value='<?php echo "$nama";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="bobot">Bobot</label>
                        <div class="controls">
                            <select class="input-small" name="bobot">
                           
                                <option value="<?php echo $bobot ?>"><?php echo $bobot ?></option>
                           
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="update"></label>
                        <div class="controls">
	                    	<input name="update" type="submit" id="update" value="Update" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php }
						if(isset($_POST['update'])){
							mysql_query("update gejala set
											kode_gejala= '$_POST[kode]',
											nama_gejala= '$_POST[nama]',
											bobot='$_POST[bobot]' 
											where kode_gejala='$kode'") or die(mysql_error);
								
							echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='gejala.php?hal=1';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='gejala.php?hal=1';
								</script>";
							exit;
						}
					?>
                </form>
			</div>
    	</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>