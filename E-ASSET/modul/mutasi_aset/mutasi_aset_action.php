<?php
session_start();
include "../../inc/config.php";
session_check();
$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
switch ($_GET["act"]) {
	case "in":
  
  
	$kode_cabang=$_POST['kode_cabang_baru'];
	$kode_barang=$_POST['kode_aset'];
	$kode_ruangan=$_POST['ruang_baru'];
	$kode_unit=$_POST['unit_baru'];
	$tampung=$kode_cabang.'-'.$kode_barang.'-'.$kode_ruangan.'-'.$kode_unit.'-';
	$query = "SELECT MAX(kode_inventarisasi) as max FROM as_inventarisasi where  SUBSTRING(`kode_inventarisasi`,1,30)='$tampung'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$kodeInventaris = $data['max'];
		$noUrut = (int) substr($kodeInventaris, 31, 40);
		$noUrut++;
		$newID = $tampung . sprintf("%010s", $noUrut);
		
		$iduser=$_SESSION['id_user'];
		$noUser=sprintf("%03s", $iduser);
		$query1 = "SELECT MAX(id_mutasi) as max FROM as_mutasi where  SUBSTRING(`id_mutasi`,4,3)='$noUser'";
		$hasil1 = mysql_query($query1);
		$data1  = mysql_fetch_array($hasil1);
		$kodeMutasi = $data1['max'];
		$noUrut1 = (int) substr($kodeMutasi, 7, 16);
		$noUrut1++;
		$char="MTS";
		$newID1 = $char . $noUser .sprintf("%010s", $noUrut1);
	
	$data = array("id_mutasi"=>$newID1,"tgl_mutasi"=>date("Y-m-d"),"kode_cabang_lama"=>$_POST["kode_cabang_lama"],"kode_cabang_baru"=>$_POST["kode_cabang_baru"],"kode_inventarisasi"=>$_POST["kode_inventarisasi"],"kode_inventarisasi_baru"=>$newID,"kode_aset"=>$_POST["kode_aset"],"ruang_lama"=>$_POST["ruang_lama"],"ruang_baru"=>$_POST["ruang_baru"],"unit_lama"=>$_POST["unit_lama"],"unit_baru"=>$_POST["unit_baru"],"jumlah"=>'1',"user_posting"=>$userpost,"keterangan"=>$_POST["keterangan"],);
  
  
  
   
		$in = $db->insert("as_mutasi",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_mutasi","id_mutasi",$_GET["id"]);
		break;
	case "up":
	 $data = array("tgl_mutasi"=>$_POST["tgl_mutasi"],"kode_cabang_lama"=>$_POST["kode_cabang_lama"],"kode_cabang_baru"=>$_POST["kode_cabang_baru"],"kode_inventarisasi"=>$_POST["kode_inventarisasi"],"kode_inventarisasi_baru"=>$_POST["kode_inventarisasi_baru"],"kode_aset"=>$_POST["kode_aset"],"ruang_lama"=>$_POST["ruang_lama"],"ruang_baru"=>$_POST["ruang_baru"],"unit_lama"=>$_POST["unit_lama"],"unit_baru"=>$_POST["unit_baru"],"jumlah"=>$_POST["jumlah"],"user_posting"=>$_POST["user_posting"],"keterangan"=>$_POST["keterangan"],);
   
   
   

    
		$up = $db->update("as_mutasi",$data,"id_mutasi",$_POST["id"]);
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