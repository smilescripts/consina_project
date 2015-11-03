<?php
error_reporting(0);
session_start();
include "../../inc/config.php";
include "../../inc/excel_reader2.php";
session_check();
$userpost=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username);
switch ($_GET["act"]) {
	case "in":
  
	$query1 = "SELECT MAX(id) as max FROM head_ofname_pusat";
	$hasil1 = mysql_query($query1);
	$data1  = mysql_fetch_array($hasil1);
	$kodeAdjust = $data1['max'];
	$noUrut1 = (int) substr($kodeAdjust, 4, 10);
	$noUrut1++;
	$char="STO";
	$newID1 = $char. $noUser .sprintf("%07s", $noUrut1);
  
	$data = array("id"=>$newID1,"tanggal"=>date("Y-m-d"),"user_posting"=>$userpost,);
	
	$in = $db->insert("head_ofname_pusat",$data);
	
	$data = new Spreadsheet_Excel_Reader($_FILES['kartustok']['tmp_name']);
	$hasildata = $data->rowcount($sheet_index=0);
	for ($i=2; $i<=$hasildata; $i++)
	{
		$ID_BARANG = $data->val($i,1); 
		$STOK_FISIK = $data->val($i,4);
		$data_edit1 = $db->fetch_custom_single("select * from barang_pusat where ID_BARANG='$ID_BARANG'");
		$STOK_APL=$data_edit1->STOK;
		$selisih=0;
		$selisih=$STOK_APL-$STOK_FISIK;
				
		$data1 = array("id_head"=>$newID1,"id_barang"=>$ID_BARANG,"stok_apl"=>$STOK_APL,"stok_fisik"=>$STOK_FISIK,"selisih"=>$selisih,);
		$in2 = $db->insert("detail_ofname_pusat",$data1);
							
	}
  
		
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("head_ofname_pusat","id",$_GET["id"]);
		break;
	case "up":
	 $data = array("tanggal"=>$_POST["tanggal"],"user_posting"=>$_POST["user_posting"],"outlet"=>$_POST["outlet"],);
   
   
   

    
		$up = $db->update("head_ofname_pusat",$data,"id",$_POST["id"]);
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