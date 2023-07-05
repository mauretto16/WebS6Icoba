<?php
include_once 'header.php';
include_once 'includes/user.inc.php';
$eks = new User($db);

$eks->id = $_SESSION['id_pengguna'];

$eks->readOne();

if($_POST){

    $eks->nama_pengguna = $_POST['nama_pengguna'];
    $eks->username = $_POST['username'];
    $eks->password = $_POST['password'];
    
    if($eks->update()){
?>
<script type="text/javascript">
window.onload=function(){
  showStickySuccessToast();
};
</script>
<?php
    } else{
?>
<script type="text/javascript">
window.onload=function(){
  showStickyErrorToast();
};
</script>
<?php
    }
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-2">
		  	<?php
			include_once 'sidebar.php';
			?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-10">
	<ol class="breadcrumb">
	  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
	  <li class="active"><span class="fa fa-user"></span> Profil</li>
	</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Profil</strong>
		  	</p>
                <form method="post">
                  <div class="form-group">
                    <label for="nl">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $eks->nama_pengguna; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="un">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $eks->username; ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="pw">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $eks->password; ?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span> Ubah</button>
                </form>
              
          </div>
        </div>
        <?php
include_once 'footer.php';
?>