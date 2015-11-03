<?php
session_start();
include "../../inc/config.php";
session_check();
$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
switch ($_GET["act"]) {
	case "in":
  
  $iduser=$_SESSION['id_user'];
		$noUser=sprintf("%03s", $iduser);
		$query1 = "SELECT MAX(id_pemeliharaan) as max FROM as_maintenance where  SUBSTRING(`id_pemeliharaan`,4,3)='$noUser'";
		$hasil1 = mysql_query($query1);
		$data1  = mysql_fetch_array($hasil1);
		$kodeMutasi = $data1['max'];
		$noUrut1 = (int) substr($kodeMutasi, 7, 16);
		$noUrut1++;
		$char="PML";
		$newID1 = $char . $noUser .sprintf("%010s", $noUrut1);
  
	$data = array("id_pemeliharaan"=>$newID1,"kode_inventarisasi"=>$_POST["kode_inventarisasi"],"tgl_servis"=>$_POST["tgl_servis"],"tgl_servis_berikutnya"=>$_POST["tgl_servis_berikutnya"],"tempat_servis"=>$_POST["tempat_servis"],"keluhan"=>$_POST["keluhan"],"keterangan_pem"=>$_POST["keterangan_pem"],"tgl_posting"=>date("Y-m-d"),"user_posting"=>$userpost,"biaya_servis"=>$_POST["biaya_servis"],"flag"=>$_POST["flag"],);
  
  
  
   
		$in = $db->insert("as_maintenance",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_maintenance","id_pemeliharaan",$_GET["id"]);
		break;
	case "up":
	 $data = array("kode_inventarisasi"=>$_POST["kode_inventarisasi"],"tgl_servis"=>$_POST["tgl_servis"],"tgl_servis_berikutnya"=>$_POST["tgl_servis_berikutnya"],"tempat_servis"=>$_POST["tempat_servis"],"keluhan"=>$_POST["keluhan"],"keterangan_pem"=>$_POST["keterangan_pem"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],"biaya_servis"=>$_POST["biaya_servis"],"flag"=>$_POST["flag"],);
   
   
   

    
		$up = $db->update("as_maintenance",$data,"id_pemeliharaan",$_POST["id"]);
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