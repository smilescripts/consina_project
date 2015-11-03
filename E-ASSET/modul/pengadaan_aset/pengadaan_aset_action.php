<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
	
	$iduser=$_SESSION['id_user'];
	$noUser=sprintf("%03s", $iduser);
	$query = "SELECT MAX(kode_pengadaan) as max FROM as_head_pengadaan ";
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
	$kodeBarang = $data['max'];
	$noUrut = (int) substr($kodeBarang, 8, 18);
	$noUrut++;
	$char = "BRS";
	$newID = $char ."-".$noUser."-".sprintf("%010s", $noUrut);
	
	$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
	$data = array("kode_pengadaan"=>$newID,"tanggal_pengadaan"=>$_POST["tanggal_pengadaan"],"user_posting"=>$userpost,);
  
   
		$in = $db->insert("as_head_pengadaan",$data);
		
		
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_head_pengadaan","kode_pengadaan",$_GET["id"]);
		break;
	case "up":
	 $data = array("tanggal_pengadaan"=>$_POST["tanggal_pengadaan"],"user_posting"=>$_POST["user_posting"],);
   
   
   

    
		$up = $db->update("as_head_pengadaan",$data,"kode_pengadaan",$_POST["id"]);
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