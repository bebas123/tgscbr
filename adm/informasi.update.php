<?php
	session_start();
	include_once('admin.session.php');
	$inf	= $_GET['inf'];
	$sql	= mysql_query("select * from informasi where id_informasi='$inf'");
	$data	= mysql_fetch_array($sql);
	if(mysql_num_rows($sql) > 0){
		$judul	= $data['judul'];
		$isi	= $data['isi'];
		$ket	= $data['ket'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Informasi</title>
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
            	<h3>Edit Informasi</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="judul">Judul</label>
                        <div class="controls">
                            <input name="judul" type="text" id="judul" class="input-xxlarge" value='<?php echo "$judul";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="isi">Isi</label>
                        <div class="controls">
                        	<textarea name="isi" type="text" id="isi" rows="5" class="input-xxlarge"><?php echo "$isi";?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="ket">Keterangan</label>
                        <div class="controls">
                            <select class="input-small" name="ket">
                           
                                <option value="<?php echo $ket ?>"><?php echo $ket ?></option>
                           
                                <option value=""></option>
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
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
							mysql_query("update informasi set
											judul	= '$_POST[judul]',
											isi		= '$_POST[isi]',
											tgl		= NOW(),
											ket		= '$_POST[ket]'
											where id_informasi='$inf'") or die(mysql_error);
								
							echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='informasi.php?hal=1';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='informasi.php?hal=1';
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