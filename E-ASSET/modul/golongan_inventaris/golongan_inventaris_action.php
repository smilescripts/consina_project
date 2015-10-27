<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":

		$query = "SELECT MAX(kode_golongan) as max FROM as_golongan ";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$kodeBarang = $data['max'];
		$noUrut = (int) $kodeBarang ;
		$noUrut++;
		$newID = sprintf($noUrut); 
  
  
	$data = array("kode_golongan"=>$newID,"kode_harta"=>$_POST["kode_harta"],"nm_golongan"=>$_POST["nm_golongan"],"keterangan"=>$_POST["keterangan"],"persen_susut"=>$_POST["persen_susut"],"masa_manfaat"=>$_POST["masa_manfaat"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],);
  
  
  
   
		$in = $db->insert("as_golongan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_golongan","kode_golongan",$_GET["id"]);
		break;
	case "up":
	 $data = array("kode_harta"=>$_POST["kode_harta"],"nm_golongan"=>$_POST["nm_golongan"],"keterangan"=>$_POST["keterangan"],"persen_susut"=>$_POST["persen_susut"],"masa_manfaat"=>$_POST["masa_manfaat"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],);
   
   
   

    
		$up = $db->update("as_golongan",$data,"kode_golongan",$_POST["id"]);
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