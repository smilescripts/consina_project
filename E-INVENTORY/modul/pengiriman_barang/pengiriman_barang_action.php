<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("ID_PENGIRIMAN"=>$_POST["ID_PENGIRIMAN"],"OUTLET"=>$_POST["OUTLET"],"TANGGAL_PENGIRIMAN"=>$_POST["TANGGAL_PENGIRIMAN"],"PENGIRIM"=>$_POST["PENGIRIM"],"STATUS_PENGIRIMAN"=>$_POST["STATUS_PENGIRIMAN"],"KETERANGAN"=>$_POST["KETERANGAN"],);
			$in = $db->insert("pengiriman_barang",$data);
			$gettmp=$db->fetch_custom("select * from tmp_pengiriman_barang where ID_PENGIRIMAN='$_POST[ID_PENGIRIMAN]'");
			foreach ($gettmp as $isitmp) {
			$tmpinput = array("ID_PENGIRIMAN"=>$isitmp->ID_PENGIRIMAN,"KODE_BARANG"=>$isitmp->KODE_BARANG,"JUMLAH"=>$isitmp->JUMLAH,);
			$inok = $db->insert("detail_pengiriman_barang",$tmpinput);	
			}
			$truncate=$db->fetch_custom("delete from tmp_pengiriman_barang where ID_PENGIRIMAN='$_POST[ID_PENGIRIMAN]'");
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
		
		case "input_scanner":
		$AS=$_POST["KODE_BARANG"];
		$ASKODEBARANG = $db->fetch_single_row("barang_pusat","BARCODE",$AS);
		
		$KODE_BARANG=$ASKODEBARANG->KODE_BARANG;
		$cek=$db->fetch_custom("select * from barang_pusat where KODE_BARANG='$KODE_BARANG'");
		foreach ($cek as $barang) {
		/* 	if($_POST["JUMLAH"] > $_POST["STOK"]){
			echo "<script>alert('Stok Tidak mencukupi');window.location='../../index.php/kasir'</script>";
			}
		else{ */
		$data = array("NO_NOTA_PENGIRIMAN"=>$_POST["NO_NOTA_PENJUALAN"],"KODE_BARANG"=>$barang->KODE_BARANG,"HARGA_BARANG"=>$barang->HARGA_JUAL,"DISKON"=>$barang->DISKON,"JUMLAH"=>$_POST["JUMLAH"],"SESSION_PENJUALAN"=>0,);
		$in = $db->insert("tmp_pengiriman_barang",$data);	
		/* } */
		}
		break;
		
	case "simpan_pengiriman":
    $data = array("ID_PENGIRIMAN"=>$_POST["ID_PENGIRIMAN"],"OUTLET"=>$_POST["OUTLET"],"TANGGAL_PENGIRIMAN"=>$_POST["TANGGAL_PENGIRIMAN"],"TANGGAL_PENERIMAAN"=>$_POST["TANGGAL_PENERIMAAN"],"PENERIMA"=>$_POST["PENERIMA"],"PENGIRIM"=>$_POST["PENGIRIM"],"STATUS_PENGIRIMAN"=>$_POST["STATUS_PENGIRIMAN"],"KETERANGAN"=>$_POST["KETERANGAN"],"DISKON"=>$_POST["DISKON"],);
    $in_send = $db->insert("pengiriman_barang",$data);
    
			$gettmpkirim=$db->fetch_custom("select * from tmp_pengiriman_barang where NO_NOTA_PENGIRIMAN='$_POST[ID_PENGIRIMAN]' ");
			foreach ($gettmpkirim as $isitmpkirim){
			$tmpinputok = array("NO_NOTA_PENGIRIMAN"=>$isitmpkirim->NO_NOTA_PENGIRIMAN,"KODE_BARANG"=>$isitmpkirim->KODE_BARANG,"HARGA_BARANG"=>$isitmpkirim->HARGA_BARANG,"DISKON"=>$isitmpkirim->DISKON,"JUMLAH"=>$isitmpkirim->JUMLAH,);
			$inok = $db->insert("detail_pengiriman_barang",$tmpinputok);	
			}
			$truncate1=$db->fetch_custom("delete from tmp_pengiriman_barang where NO_NOTA_PENGIRIMAN='$_POST[ID_PENGIRIMAN]'");
		if ($truncate1=true) {
		echo "<script>alert('Pengiriman berhasil');window.location='../../index.php/pengiriman-barang/'</script>";
		} else {
			return false;
		}
		break;
	case "delete":
		$delete=$db->delete("tmp_pengiriman_barang","ID_TMP_PENGIRIMAN",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/pengiriman-barang/tambah');
			
		} else {
			return false; 
		}
		break;
	case "batal_penjualan":

			$truncate=$db->fetch_custom("delete from tmp_pengiriman_barang where NO_NOTA_PENGIRIMAN='$_GET[NO_NOTA_PENJUALAN]'");
		if ($truncate=true) {
			header('location:../../index.php/pengiriman-barang');
		} else {
			return false;
		}
		break;
	
	case "ubah_scanner":
		foreach ($_POST["ID_TMP_PENGIRIMAN"] as $barangubah=>$value) {
		$JUMLAHUBAH=$_POST["JUMLAH_UBAH"][$barangubah];
		$STOK_UBAH=$_POST["STOK_UBAH"][$barangubah];
		if($JUMLAHUBAH > $STOK_UBAH){
			echo "<script>alert('Stok Tidak mencukupi');window.location='../../index.php/pengiriman-barang/tambah'</script>";
		}
		else{
		$data = array("JUMLAH"=>$JUMLAHUBAH,);
	    $upa = $db->update("tmp_pengiriman_barang",$data,"ID_TMP_PENGIRIMAN",$value);
		if ($upa=true) {
			header('location:../../index.php/pengiriman-barang/tambah');
		} else {
			return false; 
		}
		}
		}
		break;
		
	case "insert_barang":
  
  
  
	$data = array("ID_PENGIRIMAN"=>$_POST["ID_PENGIRIMAN"],"KODE_BARANG"=>$_POST["KODE_BARANG"],"JUMLAH"=>$_POST["JUMLAH"],);
	$insert_barang = $db->insert("tmp_pengiriman_barang",$data);	
		header('Content-Type: application/json');
		echo json_encode(array('cek' => 'true'));
	
		break;
		case "delete":
		$delete=$db->delete("tmp_pengiriman_barang","ID_TMP_PENGIRIMAN",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/pengiriman-barang/tambah');
		} else {
			return false; 
		}
		break;
		
		
	 case "up":
	 $data = array("ID_PENGIRIMAN"=>$_POST["ID_PENGIRIMAN"],"OUTLET"=>$_POST["OUTLET"],"TANGGAL_PENERIMAAN"=>date('Y-m-d'),"PENERIMA"=>$_SESSION["id_user"],"PENGIRIM"=>$_POST["PENGIRIM"],"STATUS_PENGIRIMAN"=>"DITERIMA","KETERANGAN"=>$_POST["KETERANGAN"],);
     $up = $db->update("pengiriman_barang",$data,"ID",$_POST["id"]);
	 $moveitem=$db->fetch_custom("select * from detail_pengiriman_barang where NO_NOTA_PENGIRIMAN='$_POST[ID_PENGIRIMAN]' ");
			foreach ($moveitem as $move){
			$getbarang = $db->fetch_single_row("barang_pusat","KODE_BARANG",$move->KODE_BARANG);	
			$savemove = array("KODE_BARANG"=>$getbarang->KODE_BARANG,"BARCODE"=>$getbarang->BARCODE,"NAMA_BARANG"=>$getbarang->NAMA_BARANG,"KETERANGAN"=>$getbarang->KETERANGAN,"HARGA_MODAL"=>$getbarang->HARGA_MODAL,"HARGA_JUAL"=>$getbarang->HARGA_JUAL,"STOK"=>$move->JUMLAH,"ID_KATEGORI"=>$getbarang->ID_KATEGORI,"DISKON"=>$getbarang->DISKON,"ID_SATUAN"=>$getbarang->ID_SATUAN,"OUTLET"=>$_POST["OUTLET"],);
			$inok = $db->insert("barang_outlet",$savemove);	
			}
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