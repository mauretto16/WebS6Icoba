<?php
include_once 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/pembelian.inc.php';
$eks = new Pembelian($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->id_mekanik = $_POST['id_mekanik'];
	$eks->id_pelanggan = $_POST['id_pelanggan'];
	$eks->id_sparepart = $_POST['id_sparepart'];
	$eks->qty = $_POST['qty'];
	$eks->harga_jasa = $_POST['harga_jasa'];
	$eks->tgl_beli = $_POST['tgl_beli'];



	
	if($eks->update()){
		echo "<script>location.href='pembelian.php'</script>";
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
			  <li><a href="nilai.php"><span class="fa fa-gears"></span> Data Sparepart</a></li>
			  <li class="active"><span class="fa fa-pencil"></span> Ubah Data</li>
			</ol>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Data Sparepart</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
				<form method="post">
			    	
				  <div class="form-group">
				    <label for="nama">nama</label>
				    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $eks->nama; ?>">
				  </div>
				  <div class="form-group">
				    <label for="harga_jasa">harga_jasa</label>
				    <input type="text" class="form-control" id="harga_jasa" name="harga_jasa" value="<?php echo $eks->harga_jasa; ?>">
				  </div>
				  <div class="form-group">
				    <label for="harga">harga</label>
				    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $eks->harga; ?>">
				  </div>
				
				  <button type="submit" class="btn btn-warning"><span class="fa fa-edit"></span> Ubah</button>
				  <button type="button" onclick="location.href='sparepart.php'" class="btn btn-success"><span class="fa fa-history"></span> Kembali</button>
				</form>
			  
		  </div></div></div>
		  <div class="col-xs-12 col-sm-12 col-md-2">
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>