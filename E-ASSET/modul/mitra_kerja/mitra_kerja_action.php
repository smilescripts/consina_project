<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
	
		$iduser=$_SESSION['id_user'];
		$noUser=sprintf("%03s", $iduser);
		$query = "SELECT MAX(kode_suplier) as max FROM as_suplier where  SUBSTRING(`kode_suplier`,3,3)='$noUser'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$kodeBarang = $data['max'];
		$noUrut = (int) substr($kodeBarang, 6, 8);
		$noUrut++;
		$char = "SP";
		$newID = $char . $noUser . sprintf("%03s", $noUrut);
  
		$data = array("kode_suplier"=>$newID,"nm_suplier"=>$_POST["nm_suplier"],"alamat"=>$_POST["alamat"],"kota"=>$_POST["kota"],"telepon"=>$_POST["telepon"],);
  
  
  
   
		$in = $db->insert("as_suplier",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_suplier","kode_suplier",$_GET["id"]);
		break;
	case "up":
	 $data = array("nm_suplier"=>$_POST["nm_suplier"],"alamat"=>$_POST["alamat"],"kota"=>$_POST["kota"],"telepon"=>$_POST["telepon"],);
   
   
   

    
		$up = $db->update("as_suplier",$data,"kode_suplier",$_POST["id"]);
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