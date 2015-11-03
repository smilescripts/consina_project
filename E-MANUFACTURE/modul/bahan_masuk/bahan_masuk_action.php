<?php
session_start();
include "../../inc/config.php";
session_check();
$GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLET=$GETUSER->KODE_OUTLET;
$NAMA_OUTLET=$GETUSER->NAMA_OUTLET;
$LOKASI=$GETUSER->LOKASI;
$ALAMAT=$GETUSER->ALAMAT;
$NO_TELEPON=$GETUSER->NO_TELEPON;
switch ($_GET["act"]) {

		
	case "simpan_bahan":

	if(isset($_POST["NO_NOTA_BAHAN"])){
	$NO_NOTA_BAHAN = $_POST["NO_NOTA_BAHAN"];
	$STATUS = "Proses Pembelian";
	
	
	$total_harga = mysql_fetch_object(mysql_query("SELECT SUM(HARGA) as totalharga FROM tmp_detail_bahan WHERE NO_NOTA_BAHAN = '$NO_NOTA_BAHAN'"));
    $data = array("ID_BHN_MASUK"=>$_POST["NO_NOTA_BAHAN"],"ID_PETUGAS"=>$_POST["OPERATOR_bahan_masuk"],"TGL_PEMBELIAN"=>$_POST["TANGGAL"],"TOTAL_HARGA"=>$total_harga->totalharga,"STATUS"=>$STATUS,);
    $in_sales = $db->insert("head_bhn_masuk",$data);
    
			$gettmpjual=$db->fetch_custom("select * from tmp_detail_bahan where NO_NOTA_BAHAN='$NO_NOTA_BAHAN'");
			foreach ($gettmpjual as $isitmp){
			$tmpinput = array("DET_ID_BHN_MASUK"=>$isitmp->NO_NOTA_BAHAN,"DET_ID_BAHAN"=>$isitmp->ID_BAHAN,"HARGA_BAHAN"=>$isitmp->HARGA,"JUMLAH_BAHAN"=>$isitmp->JUMLAH,);
			
			$inok = $db->insert("detail_bhn_masuk",$tmpinput);	
			}
			$truncate=$db->fetch_custom("delete from tmp_detail_bahan where NO_NOTA_BAHAN='$NO_NOTA_BAHAN'");
			header('location:../../index.php/bahan-masuk');
			
		} 
		break;
		
		case "batal_penjualan":

			$truncate=$db->fetch_custom("delete from tmp_detail_bahan where NO_NOTA_BAHAN='$_GET[NO_NOTA_BAHAN]'");
		if ($in_sales=true) {
			header('location:../../index.php/bahan-masuk');
		} else {
			return false;
		}
		
		break;
		
	case "deletebahan":
		$delete=$db->delete("tmp_detail_bahan","ID_TMP_BAHAN",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/bahan-masuk/tambah');
		} else {
			return false; 
		}
		break;
		
	case "deletebahanedit":
		$ubah = $_GET["tampil"];
		$delete=$db->delete("detail_bhn_masuk","URUT",$_GET["id"]);
		
		if ($delete=true) {
			header('location:../../index.php/bahan-masuk/edit?ubah='.$ubah.'');
		} else {
			return false; 
		}
		break;
		
	case "delete":
		$delete=$db->delete("head_bhn_masuk","ID_BHN_MASUK",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/bahan-masuk');
		} else {
			return false; 
		}
		break;
	 
		
	case "input_scanner":
		$AS=$_POST["ID_BAHAN"];

		
		$data = array("NO_NOTA_BAHAN"=>$_POST["NO_NOTA_BAHAN"],"ID_BAHAN"=>$_POST["ID_BAHAN"],"JUMLAH"=>$_POST["JUMLAH"],"HARGA"=>$_POST["HARGA"]);
		$in = $db->insert("tmp_detail_bahan",$data);	
		
		break;
		
	case "ubahbahanedit":
		foreach ($_POST["ID"] as $bahanubah=>$value) {
		$JUMLAHUBAH = $_POST["JUMLAH_UBAH"][$bahanubah];
		$HARGAUBAH = $_POST["HARGA_UBAH"][$bahanubah];
		
		$datajumlah = array("JUMLAH_BAHAN"=>$JUMLAHUBAH,);
		$dataharga = array("HARGA_BAHAN"=>$HARGAUBAH,);

		$upa = $db->update("detail_bhn_masuk",$datajumlah, "URUT",$value);
		$upadua = $db->update("detail_bhn_masuk",$dataharga, "URUT",$value);
	
		if ($upa=true) {
			echo "<script>;window.location='../../index.php/bahan-masuk/edit?ubah=$_POST[kembali]'</script>";
		} else {
			return false; 
		}
		}
		break;
		
	case "ubah_scanner":
		foreach ($_POST["ID_TMP_BAHAN"] as $bahanubah=>$value) {
		$JUMLAHUBAH=$_POST["JUMLAH_UBAH"][$bahanubah];
		$HARGAUBAH=$_POST["HARGA_UBAH"][$bahanubah];


		$datajumlah = array("JUMLAH"=>$JUMLAHUBAH,);
		$dataharga  = array("HARGA"=>$HARGAUBAH,);
		
	    $upa = $db->update("tmp_detail_bahan",$datajumlah, "ID_TMP_BAHAN",$value);
	    $upa2 = $db->update("tmp_detail_bahan",$dataharga, "ID_TMP_BAHAN",$value);

		
		if ($upa=true) {
			header('location:../../index.php/bahan-masuk/tambah');
		} else {
			return false; 
		}
		}
		break;
		
	case "tambahedit":
		$HEAD_ID = $_POST["HEAD_ID"];
		$ID_BAHAN = $_POST["ID_BAHAN"];
		$JUMLAH = $_POST["JUMLAH"];
		$HARGA = $_POST["HARGA"];
		
			$simpan = "INSERT INTO `detail_bhn_masuk` (`URUT`,`DET_ID_BHN_MASUK`,`DET_ID_BAHAN`,`HARGA_BAHAN`,`JUMLAH_BAHAN`,`JUMLAH_MASUK`,`JUMLAH_SELISIH`,`HARGA_SELISIH`,`KERUGIAN`)
				values('','$HEAD_ID','$ID_BAHAN','$HARGA','$JUMLAH','','','','')";
			$fix= mysql_query($simpan);
		echo "<script>;window.location='../../index.php/bahan-masuk/edit?ubah=$_POST[HEAD_ID]'</script>";
		break;
		
		
	default:
		# code...
		break;
		
	default:
		# code...
		break;
}

?>