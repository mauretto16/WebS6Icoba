<?php  
include "header.php";
include_once 'includes/mekanik.inc.php';
$pro = new Mekanik($db);
$stmt = $pro->readAll();
$count = $pro->countAll();

if(isset($_POST['hapus-contengan'])){
    $imp = "('".implode("','",array_values($_POST['checkbox']))."')";
    $result = $pro->hapusell($imp);
    if($result){
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showSuccessToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
            };
            </script>
            <?php
    } else{
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showErrorToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
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
	  <li class="active"><span class="fa fa-users"></span> Data Mekanik</li>
	</ol>
<form method="post">
    <div class="row">
        <div class="col-md-6 text-left">
            <strong style="font-size:18pt;"><span class="fa fa-users"></span> Data Mekanik</strong>
        </div>
        <div class="col-md-6 text-right">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Yang Ditandai</button>
            <button type="button" onclick="location.href='mekanik-baru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</button>
        </div>
    </div>
    <br/>
    <table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
                <th>Nama Mekanik</th>
                <th>Umur</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>
               <tbody>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td style="vertical-align:middle;"><input type="checkbox" value="<?php echo $row['id_mekanik'] ?>" name="checkbox[]" /></td>
    	    <td style="vertical-align:middle;"><?php echo $row['nama_mekanik'] ?></td>
            <td style="vertical-align:middle;"><?php echo $row['umur'] ?></td>

            <td class="text-center" style="vertical-align:middle;">
    		  <a href="mekanik-ubah.php?id=<?php echo $row['id_mekanik'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
    		  <a href="mekanik-hapus.php?id=<?php echo $row['id_mekanik'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    	    </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    </form> 
</div>
</div>	
<?php include "footer.php"; ?>
