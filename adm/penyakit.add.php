<?php
	session_start();
	include_once('admin.session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tambah Penyakit</title>
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
            	<h3>Tambah Penyakit</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="kode">Kode Penyakit</label>
                        <div class="controls">
                            <input name="kode" type="text" id="kode" class="input-small">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="nama">Nama Penyakit</label>
                        <div class="controls">
                        	<input name="nama" type="text" id="nama" class="input-xxlarge">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="ket">Keterangan</label>
                        <div class="controls">
                        	<textarea name="ket" id="ket" class="input-xxlarge" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="solusi">Solusi</label>
                        <div class="controls">
                        	<textarea name="solusi" id="solusi" class="input-xxlarge" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="simpan"></label>
                        <div class="controls">
	                    	<input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php
						if(isset($_POST['simpan'])){
							mysql_query("insert into penyakit (kode_penyakit, nama_penyakit, ket, solusi) values ('$_POST[kode]', '$_POST[nama]', '$_POST[ket]', '$_POST[solusi]')")
							or die(mysql_error);
								
							echo "<script language=javascript>
								window.alert('Simpan Berhasil');
								window.location='penyakit.php?hal=1';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='penyakit.php?hal=1';
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