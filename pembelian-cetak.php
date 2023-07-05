<?php
session_start();
if(!isset($_SESSION['nama_pengguna'])){
	echo "<script>location.href='login.php'</script>";
}
if(isset($_GET['id_pembelian'])){
	$id_pembelian = $_GET['id_pembelian'];
}
?>
<?php
 //KONEKSI
$host="localhost"; //isi dengan host anda. contoh "localhost"
$user="root"; //isi dengan username mysql anda. contoh "root"
$password=""; //isi dengan password mysql anda. jika tidak ada, biarkan kosong.
$database="bengkel";//isi nama database dengan tepat.
$konek = mysqli_connect($host,$user,$password,$database);

?>


<style type="text/css">
p{
	text-align:right;
	font-style:bold;
	font-size:12px
}
h4, h1, h5, h2{
	text-align:center;
	padding-top:inherit;
	
}
table {
   border-collapse:collapse;
   width:100%;
}
 
table, td, th {
   border:1px solid black;
}
 
tbody tr:nth-child(odd) {
   background-color: #ccc;
}
</style>
<h2>Rancang Bangun Sistem Perawatan dan Perbaikan Kendaraan BUS</h2>
<h5>PO. Harapan Jaya</h5>
<hr>

</tr>
</table>

<?php
$sql=mysqli_query($konek,"SELECT * FROM 213_pembelian JOIN 213_mekanik ON 213_pembelian.id_mekanik=213_mekanik.id_mekanik 
JOIN 213_sparepart ON 213_pembelian.id_sparepart=213_sparepart.id_sparepart 
JOIN 213_pelanggan ON 213_pelanggan.id_pelanggan = 213_pembelian.id_pelanggan
where 213_pembelian.id_pembelian = '$id_pembelian'");
$nm_pelanggan = mysqli_fetch_array($sql);

// print($nm_pelanggan['nama']);
?>

<h4> Kwitansi ( No Service: <?php echo $nm_pelanggan['id_pembelian'] ?> )</h4>
<p align="left">Nama Kasir: <?php echo $_SESSION['nama_pengguna'] ?></p>
<p align="left">Tanggal: <?php date_default_timezone_set("Asia/Jakarta"); echo $date = date('Y-m-d |  H:i:s') ?> </p>
<p align="left">Nama Pelanggan: <?php echo $nm_pelanggan['nama'] ?> </p>

<table >
<thead>
<tr>
<th>Nama Mekanik</td>
<th>Sparepart</td>
<th>Qty</td>
<th>Harga Sparepart</td>
<th>Harga Jasa</td>
<th>Jumlah</td>
<th>Tanggal</td>


</tr>
</thead>
<?php 
$sql=mysqli_query($konek,"SELECT * FROM 213_pembelian JOIN 213_mekanik ON 213_pembelian.id_mekanik=213_mekanik.id_mekanik 
JOIN 213_sparepart ON 213_pembelian.id_sparepart=213_sparepart.id_sparepart 
JOIN 213_pelanggan ON 213_pelanggan.id_pelanggan = 213_pembelian.id_pelanggan
where 213_pembelian.id_pembelian = '$id_pembelian'
ORDER BY id_pembelian ASC");
while($row=mysqli_fetch_assoc($sql)){
?>
<tbody>
<tr>
<td><?php echo $row['nama_mekanik']?></td>
<td><?php echo $row['sparepart']?></td>
<td><?php echo $row['qty']?></td>
<td><?php echo $row['harga']?></td>
<td><?php echo $row['harga_jasa']?></td>
<td>
<?php 
	$hs= $row['harga'];
	$qt= $row['qty'];
	$hj= $row['harga_jasa'];
	$tot = ($hs * $qt) + $hj;
	echo"$tot";

			
			?>
</td>
<td><?php echo $row['tgl_beli']?></td>
</tr></tbody>
<?php
}
?>
</table>
	<script>
		window.print();
	</script>
	