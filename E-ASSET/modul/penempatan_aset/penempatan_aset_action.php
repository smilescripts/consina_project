<?php
session_start();
include "../../inc/config.php";
session_check();
$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
switch ($_GET["act"]) {
	case "in":
  
  
  for($x=0; $x<$_POST['jumlah']; $x++){
	$kode_cabang=$_POST['kode_cabang'];
	$kode_barang=$_POST['kode_barang'];
	$kode_ruangan=$_POST['kode_ruangan'];
	$kode_unit=$_POST['kode_unit'];
	$tampung=$kode_cabang.'-'.$kode_barang.'-'.$kode_ruangan.'-'.$kode_unit.'-';
	$query = "SELECT MAX(kode_inventarisasi) as max FROM as_inventarisasi where  SUBSTRING(`kode_inventarisasi`,1,30)='$tampung'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$kodeInventaris = $data['max'];
		$noUrut = (int) substr($kodeInventaris, 31, 40);
		$noUrut++;
		$newID = $tampung . sprintf("%010s", $noUrut);
	  
	$data = array("kode_inventarisasi"=>$newID,"kode_barang"=>$kode_barang,"kode_cabang"=>$kode_cabang,"kode_unit"=>$kode_unit,"kode_ruangan"=>$kode_ruangan,"jumlah"=>'1',"kondisi"=>$_POST["kondisi"],"tgl_posting"=>date("Y-m-d"),"user_posting"=>$userpost,"status"=>'0',);
   
		$in = $db->insert("as_inventarisasi",$data);
  }
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("as_inventarisasi","kode_inventarisasi",$_GET["id"]);
		break;
	case "up":
	 $data = array("kode_barang"=>$_POST["kode_barang"],"kode_cabang"=>$_POST["kode_cabang"],"kode_unit"=>$_POST["kode_unit"],"kode_ruangan"=>$_POST["kode_ruangan"],"jumlah"=>$_POST["jumlah"],"kondisi"=>$_POST["kondisi"],"tgl_posting"=>$_POST["tgl_posting"],"user_posting"=>$_POST["user_posting"],"status"=>$_POST["status"],);
   
   
   

    
		$up = $db->update("as_inventarisasi",$data,"kode_inventarisasi",$_POST["id"]);
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