<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
	
	$data = array("MAN_ID_MANUFACTURING"=>$_POST["MAN_ID_MANUFACTURING"],"MAN_KODE_BARANG"=>$_POST["MAN_KODE_BARANG"],);
		$in = $db->insert("manufacturing",$data);

		
		$ID_MAN = $_POST["MAN_ID_MANUFACTURING"];
		$querycari = mysql_query("SELECT * FROM tampung_manufacturing where ID_MAN = '$ID_MAN'");
		while($querysimpan=mysql_fetch_array($querycari))
		{
			$ID_MANUFACTURING = $querysimpan["ID_MAN"];
			$DET_ID_BAHAN = $querysimpan["ID_BAHAN"];
			$DET_JUMLAH_BAHAN = $querysimpan["JUMLAH_BAHAN"];
			
			$query = "INSERT INTO detail_manufacturing (DET_MAN_ID_MAN,DET_ID_BAHAN,DET_JUMLAH_BAHAN) VALUES ('$ID_MANUFACTURING','$DET_ID_BAHAN','$DET_JUMLAH_BAHAN')";
			$simpann = mysql_query($query);
		}

			echo "<script>;window.location='../../index.php/manufacturing'</script>";

		break;
		
		
	case "tampung":
		$ID_MAN = $_POST["MAN_ID"];
		$ID_BARANG = $_POST["ID_BARANG"];
		$KODE_BARANG = $_POST["KODE_BARANG"];
		$ID_BAHAN = $_POST["ID_BAHAN"];
		$NAMA_BAHAN = $_POST["NAMA_BAHAN"];
		$SATUAN = $_POST["SATUAN"];
		$JUMLAH = $_POST["JUMLAH"];
		
			$simpan = "INSERT INTO `tampung_manufacturing` (`URUT`,`ID_MAN`,`ID_BARANG`,`KODE_BARANG`,`ID_BAHAN`,`NAMA_BAHAN`,`SATUAN`,`JUMLAH_BAHAN`)
				values('','$ID_MAN','$ID_BARANG','$KODE_BARANG','$ID_BAHAN','$NAMA_BAHAN','$SATUAN','$JUMLAH')";
			$fix= mysql_query($simpan);
		echo "<script>;window.location='../../index.php/manufacturing/tambah'</script>";
		break;
		
	case "delete":
		$delete=$db->delete("tampung_manufacturing","URUT",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/manufacturing/tambah');
		} else {
			return false; 
		}
		break;
	
	case "up":
	 $data = array("MAN_ID_BARANG"=>$_POST["MAN_ID_BARANG"],);
   
		$up = $db->update("manufacturing",$data,"MAN_ID_MANUFACTURING",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
	default:
		# code...
		break;
	
	case "ubah":
		foreach ($_POST["ID"] as $bahanubah=>$value) {
		$JUMLAHUBAH=$_POST["JUMLAH_UBAH"][$bahanubah];
		
		$datajumlah = array("JUMLAH"=>$JUMLAHUBAH,);

		$upa = $db->update("tampung_manufacturing",$datajumlah, "urut",$value);
	
		if ($upa=true) {
			header('location:../../index.php/manufacturing/tambah');
		} else {
			return false; 
		}
		}
		break;
		
		
		
	case "batal_simpan":
		
		$hapus = "DELETE FROM tampung_manufacturing";
		$aksi = mysql_query($hapus);
		header('location:../../index.php/manufacturing');
	
		break;
		
	default:
		# code...
		break;
}

?>