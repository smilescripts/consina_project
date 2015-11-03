<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	
	case "simpan_mutasi":

	if(isset($_POST["IDD"])){
	$IDD = $_POST["IDD"];
	$TGL = date('Y-m-d');
	$ISI = "0000-00-00";
	$ISII = "-";
	$STATUS = "Proses Mutasi";
	
	
    $data = array("KODE_MUTASI"=>$_POST["IDD"],"TANGGAL_KELUAR"=>$TGL,"TANGGAL_DITERIMA"=>$ISI,"ID_PTGS_KELUAR"=>$_POST["PETUGAS"],"ID_PTGS_TERIMA"=>$ISII,"STATUS"=>$STATUS,);
    $in_sales = $db->insert("head_mutasi_prod",$data);
    
			$gettmpjual=$db->fetch_custom("select * from tmp_mutasi_prd where KODE_MUTASI = '$IDD'");
			foreach ($gettmpjual as $isitmp){
			$tmpinput = array("KODE_MUTASI"=>$isitmp->KODE_MUTASI,"KODE_BARANG"=>$isitmp->KODE_BARANG,"JUMLAH"=>$isitmp->JML_BARANG,);
			
			$inok = $db->insert("detail_mutasi_prod",$tmpinput);	
			}
			$truncate=$db->fetch_custom("delete from tmp_mutasi_prd where KODE_MUTASI='$IDD'");
			header('location:../../index.php/mutasi-barang');
			
		} 
		break;
	
	case "deletebarang":
		$delete=$db->delete("tmp_mutasi_prd","URUT",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/mutasi-barang/tambah');
		} else {
			return false; 
		}
		break;
	
	case "ubahtampung":
		foreach ($_POST["ID"] as $bahanubah=>$value) {
		$JUMLAHUBAH=$_POST["JUMLAH_UBAH"][$bahanubah];

		$datajumlah = array("JML_BARANG"=>$JUMLAHUBAH,);
		
	    $upa = $db->update("tmp_mutasi_prd",$datajumlah, "URUT",$value);

		
		if ($upa=true) {
			header('location:../../index.php/mutasi-barang/tambah');
		} else {
			return false; 
		}
		}
		break;
		
	case "tampung":
		$KD_MUTASI = $_POST["kode_mutasi"];
		$KD_BRG = $_POST["kode"];
		$JML = $_POST["jumlah"];

		
			$simpan = "INSERT INTO `tmp_mutasi_prd` (`URUT`,`KODE_MUTASI`,`KODE_BARANG`,`JML_BARANG`)
				values('','$KD_MUTASI','$KD_BRG','$JML')";
			$fix= mysql_query($simpan);
		echo "<script>;window.location='../../index.php/mutasi-barang/tambah'</script>";
		break;
		
		case "batalmutasi":

			$truncate=$db->fetch_custom("delete from tmp_mutasi_prd where KODE_MUTASI='$_GET[IDD]'");
		if ($in_sales=true) {
			header('location:../../index.php/mutasi-barang');
		} else {
			return false;
		}
		
		break;
		
		
	default:
		# code...
		break;
}

?>