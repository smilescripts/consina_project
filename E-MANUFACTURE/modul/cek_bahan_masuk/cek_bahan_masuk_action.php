<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("ID_PETUGAS"=>$_POST["ID_PETUGAS"],"TGL_MASUK"=>$_POST["TGL_MASUK"],"STATUS"=>$_POST["STATUS"],);
  
  
  
   
		$in = $db->insert("head_bhn_masuk",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("head_bhn_masuk","ID_BHN_MASUK",$_GET["id"]);
		break;
	case "up":
	 $data = array("ID_PETUGAS"=>$_POST["ID_PETUGAS"],"TGL_MASUK"=>$_POST["TGL_MASUK"],"STATUS"=>$_POST["STATUS"],);
   
   
   

    
		$up = $db->update("head_bhn_masuk",$data,"ID_BHN_MASUK",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
		
	case "acc":
		
	if(isset($_GET["id"])){
	$id = $_GET["id"];
	$STATUS = "Masuk (ACC)";
	$ptgs = $_GET["ptgs"];
	$TGL_MASUK = date('Y-m-d H:i:s');
	    
			$gettmpjual=mysql_query("select * from head_bhn_masuk JOIN detail_bhn_masuk ON detail_bhn_masuk.DET_ID_BHN_MASUK = head_bhn_masuk.ID_BHN_MASUK WHERE head_bhn_masuk.ID_BHN_MASUK = '$id'");
				while ($loop=mysql_fetch_array($gettmpjual)) {
					
					
							
							$ID_BAHAN = $loop["DET_ID_BAHAN"];
							$JUMLAH = $loop["JUMLAH_BAHAN"];
							$URUT = $loop["URUT"];
							
							 $validasistok=mysql_query("SELECT * from bahan where ID_BAHAN='$ID_BAHAN'");
							 $getstok=mysql_fetch_object($validasistok);
							 
							 $proseskurang = $getstok->STOCK + $JUMLAH ;
							 $prseskurangdua = $getstok->STOCK_BAYANGAN + $JUMLAH ;
							 
							 mysql_query("UPDATE `bahan` SET `STOCK` = '$proseskurang' , `STOCK_BAYANGAN` = '$prseskurangdua' WHERE `ID_BAHAN` = '$ID_BAHAN'");
							 mysql_query("UPDATE `detail_bhn_masuk` SET `JUMLAH_MASUK` = '$JUMLAH' WHERE `URUT` = '$URUT' ");
					
					
					
				}
			
			
				$ubahstatus = mysql_query("UPDATE `head_bhn_masuk` SET `ID_PETUGAS_PENERIMA` = '$ptgs',`TGL_MASUK` = '$TGL_MASUK' , `STATUS` = '$STATUS' WHERE `ID_BHN_MASUK` ='$id'");
				
			header('location:../../index.php/cek-bahan-masuk');
			
		} 
		
		
		break;
		
	case "acc_selisih":
		
		$ID = $_POST["id"]; 
		$PEGAWAI = $_POST["petugas"];
		$TANGGAL = $_POST["TGL_MASUK_GUDANG"];
		
		$itemCount = count($_POST["JUMLAH_BAHAN"]);
		for ($i=0;$i<=$itemCount;$i++){
			
			$URUT = $_POST["urut"][$i];
			$JUMLAH_MASUK = $_POST["JUMLAH_BAHAN"][$i];
			
			$JML = mysql_fetch_object(mysql_query("SELECT * FROM detail_bhn_masuk WHERE URUT = $URUT"));
			
			$JUMLAH_SELISIH = ($JML->JUMLAH_BAHAN - $JUMLAH_MASUK);
			$TAMPUNG_HARGA = ($JML->HARGA_BAHAN / $JML->JUMLAH_BAHAN);
			$ID_BAHAN = $JML->DET_ID_BAHAN;
			
			$HARGA_SELISIH = ($TAMPUNG_HARGA * $JUMLAH_MASUK);
			$KERUGIAN =  ($JML->HARGA_BAHAN - $HARGA_SELISIH);
			
			$updateselisih = "UPDATE detail_bhn_masuk SET JUMLAH_MASUK ='$JUMLAH_MASUK' , JUMLAH_SELISIH = '$JUMLAH_SELISIH' , HARGA_SELISIH = '$HARGA_SELISIH', KERUGIAN = '$KERUGIAN' where URUT='$URUT'";
            mysql_query($updateselisih) or die(mysql_error());
			
			$STK = mysql_fetch_object (mysql_query("SELECT * FROM bahan WHERE ID_BAHAN = '$ID_BAHAN'"));
			
			$UPSTOCK = ($STK->STOCK + $JUMLAH_MASUK);
			
			$updatestock = "UPDATE bahan SET STOCK = '$UPSTOCK' WHERE ID_BAHAN = '$ID_BAHAN'";
			mysql_query($updatestock) or die(mysql_error());


		}
		
			$updatestatus = "UPDATE head_bhn_masuk SET ID_PETUGAS_PENERIMA = '$PEGAWAI' ,TGL_MASUK = '$TANGGAL' , STATUS = 'Selisih (ACC Masuk)' WHERE ID_BHN_MASUK = '$ID'";
			$simpanfinal=mysql_query($updatestatus) or die(mysql_error());
			
		header('location:../../index.php/cek-bahan-masuk');
		break;
		
		
		
	default:
		# code...
		break;
}

?>