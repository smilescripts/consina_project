<?php
session_start();
include "../../inc/config.php";
session_check();
$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
$hasil=0;
$jumlah=0;
switch ($_GET["act"]) {
	case "in":
  
	$jumlah=$_POST['jumlah'];
	$sisa_jumlah=$_POST['sisa_jumlah'];
	$kode_barang=$_POST['kode_barang'];
  
	$data = array("kode_pengadaan"=>$_POST["kode_pengadaan"],"kode_barang"=>$kode_barang,"kode_suplier"=>$_POST["kode_suplier"],"no_polisi"=>$_POST["no_polisi"],"no_bpkb"=>$_POST["no_bpkb"],"no_sertifikat"=>$_POST["no_sertifikat"],"no_faktur"=>$_POST["no_faktur"],"tgl_beli"=>$_POST["tgl_beli"],"harga_beli"=>$_POST["harga_beli"],"jumlah"=>$jumlah,"sisa_jumlah"=>$sisa_jumlah,"user_posting"=>$userpost,"luas"=>$_POST["luas"],);
   
		$in = $db->insert("as_pengadaan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_pengadaan","",$_GET["id"]);
		break;
	case "up":
	// $data = array("kode_pengadaan"=>$_POST["kode_pengadaan"],"kode_barang"=>$_POST["kode_barang"],"kode_suplier"=>$_POST["kode_suplier"],"no_polisi"=>$_POST["no_polisi"],"no_bpkb"=>$_POST["no_bpkb"],"no_sertifikat"=>$_POST["no_sertifikat"],"no_faktur"=>$_POST["no_faktur"],"tgl_beli"=>$_POST["tgl_beli"],"harga_beli"=>$_POST["harga_beli"],"jumlah"=>$_POST["jumlah"],"sisa_jumlah"=>$_POST["sisa_jumlah"],"user_posting"=>$_POST["user_posting"],"luas"=>$_POST["luas"],);
   
		$kode_barang=$_POST['kode_barang'];
		$kode_barang1=$_POST['kode_barang1'];
		
		if($kode_barang==$kode_barang1){
			$jumlah=$_POST['jumlah'];
			$sisa_jumlah=$_POST['sisa_jumlah1'];
			
			$hasil=$sisa_jumlah+$jumlah;
			$data1 = array("total_unit"=>$hasil,);
		}else{
			$data2 = array("total_unit"=>$_POST['sisa_jumlah1'],);
			$upda2 = $db->update("as_aset",$data2,"kode_barang",$kode_barang1);
			
			$jumlah=$_POST['jumlah'];
			$sisa_jumlah=$_POST['sisa_jumlah'];
			
			$hasil=$sisa_jumlah+$jumlah;
			$data1 = array("total_unit"=>$hasil,);
		}
		
		$upda = $db->update("as_aset",$data1,"kode_barang",$kode_barang);
   

		$up=mysql_query("update as_pengadaan set kode_barang='$kode_barang', kode_suplier='$_POST[kode_suplier]', no_polisi='$_POST[no_polisi]',no_bpkb='$_POST[no_bpkb]', no_sertifikat='$_POST[no_sertifikat]', no_faktur='$_POST[no_faktur]', tgl_beli='$_POST[tgl_beli]', harga_beli='$_POST[harga_beli]', jumlah='$jumlah', sisa_jumlah='$sisa_jumlah', user_posting='$userpost', luas='$_POST[luas]' where kode_pengadaan='$_POST[kode_pengadaan]' and kode_barang='$kode_barang1'");
		//$up = $db->update("as_pengadaan",$data,"",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
	default:
		# code...
		break;
}

?>