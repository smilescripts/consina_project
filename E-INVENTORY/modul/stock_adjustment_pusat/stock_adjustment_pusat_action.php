<?php
session_start();
include "../../inc/config.php";
session_check();
$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
switch ($_GET["act"]) {
	case "in":
  
	$query1 = "SELECT MAX(id) as max FROM penyesuaian_stok_pusat";
	$hasil1 = mysql_query($query1);
	$data1  = mysql_fetch_array($hasil1);
	$kodeAdjust = $data1['max'];
	$noUrut1 = (int) substr($kodeAdjust, 4, 10);
	$noUrut1++;
	$char="AJP";
	$newID1 = $char .sprintf("%07s", $noUrut1);
	
	$tambah=0;
	$kurang=0;
	if($_POST['jenis']=="Penambahan"){
		$tambah=$_POST['jumlah'];
		$kurang=0;
	}
	if($_POST['jenis']=="Pengurangan"){
		$tambah=0;
		$kurang=$_POST['jumlah'];
	}
	$data = array("id"=>$newID1,"tanggal"=>date("Y-m-d"),"no_penyesuaian"=>$_POST["no_penyesuaian"],"id_barang"=>$_POST["id_barang"],"tambah"=>$tambah,"kurang"=>$kurang,"keterangan"=>$_POST["keterangan"],"user_posting"=>$userpost,);
  
  
  
   
		$in = $db->insert("penyesuaian_stok_pusat",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("penyesuaian_stok_pusat","id",$_GET["id"]);
		break;
	case "up":
	 $data = array("tanggal"=>$_POST["tanggal"],"no_penyesuaian"=>$_POST["no_penyesuaian"],"id_barang"=>$_POST["id_barang"],"tambah"=>$_POST["tambah"],"kurang"=>$_POST["kurang"],"keterangan"=>$_POST["keterangan"],"user_posting"=>$_POST["user_posting"],);
   
   
   

    
		$up = $db->update("penyesuaian_stok_pusat",$data,"id",$_POST["id"]);
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