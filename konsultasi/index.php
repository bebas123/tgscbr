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
<?php
	include_once '../lib/database.php';
	include_once 'menu.php';
	include_once 'header.php';
?>
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="modal-header">
                	<h3>Input Biodata</h3>
                </div>
                <div style="margin-top:10px">
                    <form name="form1" method="post" action="" enctype="multipart/form-data">
                        <div class="control-group">
                            <div class="controls">
                                <input name="nama" type="text" id="nama" class="input-large" placeholder="Nama..">
                            </div>
						</div>
                        <div class="control-group">
                            <div class="controls">
                                <input name="umur" type="text" id="umur" class="input-large" placeholder="Usia..">
                            </div>
						</div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="next" id="next" value="Next" class="btn btn-success">
                               <a href="../" class="btn btn-warning">Back</a> 
							</div>
						</div>
                        
						<?php
                            if(isset($_POST['next'])){
                                $query = mysql_query("insert into user (nama, umur, tgl_konsultasi) values ('$_POST[nama]', '$_POST[umur]', NOW())") or die(mysql_error());
                                if($query){
                                    
                                    $s = mysql_query("select * from user order by id_user desc") or die(mysql_error());
                                    $r = mysql_fetch_array($s);
                                    $_SESSION['nama']	= "$r[nama]";
                                    $_SESSION['id']		= "$r[id_user]";
									echo "<script language=javascript>
											window.location='konsultasi.form.php?id=$_SESSION[id]';
											</script>";
									exit;
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