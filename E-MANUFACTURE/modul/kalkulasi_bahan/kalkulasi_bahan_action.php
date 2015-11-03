<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("TGL_KALKULASI"=>$_POST["TGL_KALKULASI"],"STATUS"=>$_POST["STATUS"],"KETERANGAN"=>$_POST["KETERANGAN"],);
  
  
  
   
		$in = $db->insert("head_kalkulasi_produksi",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("head_kalkulasi_produksi","ID_KALKULASI",$_GET["id"]);
		break;
	case "up":
	 $data = array("TGL_KALKULASI"=>$_POST["TGL_KALKULASI"],"STATUS"=>$_POST["STATUS"],"KETERANGAN"=>$_POST["KETERANGAN"],);
   
   
   

    
		$up = $db->update("head_kalkulasi_produksi",$data,"ID_KALKULASI",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
		
	case "input_scanner":
		
		/* $ASKODEbahan = $db->fetch_single_row("bahan_outlet","BARCODE",$AS);
		
		$KODE_bahan=$ASKODEbahan->KODE_bahan; */
		$KD_BARANG = $_POST["KODE_BARANG"];
		$KD_REL = $_POST["KAL_ID_BARANG"];
		$JMLPROD = $_POST["JUMLAH"];
		$HEAD = $_POST["TAM_HEAD"];
		
		$data = array("TAM_HEAD"=>$_POST["TAM_HEAD"],"TAM_KODE_BARANG"=>$_POST["KODE_BARANG"],"TAM_NAMA_BARANG"=>$_POST["NAMA_BARANG"],"TAM_JML_PROD"=>$_POST["JUMLAH"],"TAM_KAL_BAHAN"=>$_POST["KAL_ID_BARANG"]);
		$in = $db->insert("tampung_kalkulasi",$data);	
		

		
		$detail = mysql_query("SELECT manufacturing.* , detail_manufacturing.* FROM manufacturing INNER JOIN detail_manufacturing ON manufacturing.MAN_ID_MANUFACTURING = detail_manufacturing.DET_MAN_ID_MAN WHERE manufacturing.MAN_KODE_BARANG = '$KD_BARANG'");
		while ($hasill=mysql_fetch_array($detail)){
			
			$ID_BAHAN = $hasill["DET_ID_BAHAN"];
			$JML_PCS = $hasill["DET_JUMLAH_BAHAN"];
			$JML_TOTAL = $JML_PCS * $JMLPROD ;
						
						$ambilbahan = mysql_query ("SELECT * FROM bahan WHERE ID_BAHAN = '$ID_BAHAN'");
							$hasilbahan = mysql_fetch_array($ambilbahan);
						

			$NAMA_BAHAN = $hasilbahan["NAMA_BAHAN"];
			$SATUAN = $hasilbahan["SATUAN"];
			
			
			$insertdetail = "INSERT INTO `tampung_kalkulasi_detail` (`TAM_KAL_BAHAN`,`ID_KALKULASI`,`ID_BAHAN`,`NAMA_BAHAN`,`SATUAN`,`JML_PCS`,`JML_TOTAL`)
								values('$KD_REL','$HEAD','$ID_BAHAN','$NAMA_BAHAN','$SATUAN','$JML_PCS','$JML_TOTAL')";
				$eksekusiinsert = mysql_query($insertdetail);

		}
		header('location:../../index.php/kalkulasi-bahan/tambah');
		
		break;

		
		case "deletetampung":
			
			$deletetampung=$db->delete("tampung_kalkulasi","URUT",$_GET["id"]);
			if ($deletetampung=true) {
				header('location:../../index.php/kalkulasi-bahan/tambah');
			} else {
				return false; 
			}
			
		break;
		
		
	case "batal_kalkulasi":

		$truncate=$db->fetch_custom("delete from tampung_kalkulasi");
		$truncatedua=$db->fetch_custom("delete from tampung_kalkulasi_detail");
		if ($truncatedua=true) {
			header('location:../../index.php/kalkulasi-bahan');
		} else {
			return false;
		}
		
		break;
		
	case "produksi":

		$TAM_HEAD = $_GET["id"];
		$TGL = date('Y-m-d');
		$PETUGAS = $_POST["PETUGAS"];
		
		$cekhead = "INSERT INTO `head_kalkulasi_produksi` (`ID_KALKULASI`,`TGL_KALKULASI`,`STATUS`) VALUES ('$TAM_HEAD','$TGL','PRODUKSI')";
		$simpanhead = mysql_query($cekhead) OR die (mysql_error());
		
		$cekdetailbarang = mysql_query ("SELECT * FROM `tampung_kalkulasi` WHERE `TAM_HEAD` = '$TAM_HEAD'");
		while ($tampungbarang=mysql_fetch_array($cekdetailbarang)) {
			$KODE_BARANG = $tampungbarang["TAM_KODE_BARANG"];
			$JML_PROD = $tampungbarang["TAM_JML_PROD"];
			$ID_KAL_BAHAN = $tampungbarang["TAM_KAL_BAHAN"];
			
			$simpandetailbarang = mysql_query ("INSERT INTO `detail_kalkulasi_barang` (`ID_KALKULASI`,`KODE_BARANG`,`JML_PROD`)
													VALUES ('$TAM_HEAD','$KODE_BARANG','$JML_PROD')");
		}
		
		
		$cekawal = mysql_query ("SELECT distinct(ID_BAHAN) FROM `tampung_kalkulasi_detail` WHERE `ID_KALKULASI` = '$TAM_HEAD'");
		while ($tampungawal=mysql_fetch_array($cekawal)){
			
				$ID_BAHAN = $tampungawal["ID_BAHAN"];
				$RELASI = $TAM_HEAD . $ID_BAHAN;
				
						$cekdetail = mysql_fetch_object(mysql_query("SELECT SUM(JML_TOTAL) as JML_TOTAL FROM `tampung_kalkulasi_detail` WHERE `ID_BAHAN` = '$ID_BAHAN' AND `ID_KALKULASI` = '$TAM_HEAD'"));
						$JML_TOTAL = $cekdetail->JML_TOTAL;

							$simpandetailbahan = mysql_query ("INSERT INTO `detail_kalkulasi_bahan` (`ID_KALKULASI`,`ID_BAHAN`,`JML_TOTAL`,`ANGSUR`)
													VALUES ('$TAM_HEAD','$ID_BAHAN','$JML_TOTAL','$RELASI')");

		}
		
		$updatebahan = mysql_query("SELECT * FROM `detail_kalkulasi_bahan` WHERE `ID_KALKULASI` = '$TAM_HEAD'");
		while($loopupdate=mysql_fetch_array($updatebahan)) {
			
			$IDDDD = $loopupdate["ID_BAHAN"];
			$JMLL = $loopupdate["JML_TOTAL"];
			
			$cekstock = mysql_fetch_object(mysql_query("SELECT `STOCK_BAYANGAN` FROM `bahan` WHERE `ID_BAHAN` = '$IDDDD'"));
			$ambilll = $cekstock->STOCK_BAYANGAN;
			$STOCK = ($ambilll - $JMLL);
			
			$myqry = "UPDATE `bahan` SET `STOCK_BAYANGAN` = '$STOCK' where ID_BAHAN='$IDDDD'";
			$simpanakhir = mysql_query($myqry) OR die (mysql_error());
			
		}
		
							$hapustampung = mysql_query ("DELETE FROM tampung_kalkulasi");
		
		if ($in_sales=true) {
			header('location:../../index.php/kalkulasi-bahan');
		} else {
			return false;
		}
		
		break;
		
	case "acc_selisih":
		
		$TAM_HEAD = $_POST["ID_PROD"];
		$TGL = date('Y-m-d');
		$PETUGAS = $_POST["PETUGAS"];
		
		// Simpan Detail Barang
		
		$itemCount = count($_POST["KODE_BARANG"]);
		$itemValues=0;

		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["KODE_BARANG"][$i]) || !empty($_POST["JML_PROD"][$i])) {
				
				$query = "UPDATE detail_kalkulasi_barang SET JML_PROD_FINAL = '".$_POST["JML_PROD"][$i]."' WHERE KODE_BARANG = '".$_POST["KODE_BARANG"][$i]."' AND ID_KALKULASI = '$TAM_HEAD'";
				$exsecute = mysql_query($query);
			}
		}

		// Simpan Detail Bahan
		
		$itemCountdua = count($_POST["ANGSUR"]);
		$itemValuesdua=0;

		for($i=0;$i<$itemCountdua;$i++) {
			
			if(!empty($_POST["ANGSUR"][$i]) || !empty($_POST["JML_FINAL"][$i])|| !empty($_POST["ID_BAHAN"][$i])) {
					
					$querydua = "UPDATE detail_kalkulasi_bahan SET JML_FINAL = '".$_POST["JML_FINAL"][$i]."' WHERE ANGSUR = '".$_POST["ANGSUR"][$i]."'";
					$exsecutedua = mysql_query($querydua);
					
					$cekkalkulasi = mysql_query("SELECT * FROM detail_kalkulasi_bahan WHERE ANGSUR = '".$_POST["ANGSUR"][$i]."'");
					$tampungcek = mysql_fetch_array($cekkalkulasi); 
					
					if($tampungcek["JML_DIPAKAI"] < $_POST["JML_FINAL"][$i] ){
						
					//simpan penyesuaian
					$JML_SESUAI = ($tampungcek["JML_FINAL"] - $tampungcek["JML_DIPAKAI"]);
					$PEPE = $TAM_HEAD . $tampungcek["ID_BAHAN"];
					
					$penyesuaian = "INSERT INTO `detail_kalkulasi_penyesuaian` (`PENYESUAIAN`,`TANGGAL`,`ID_PETUGAS`,`JUMLAH_PENYESUAIAN`,ID_KALKULASI) VALUES ('".$PEPE."','".$TGL."','".$PETUGAS."','".$JML_SESUAI."','".$TAM_HEAD."')";
						$simpanpenyesuaian = mysql_query($penyesuaian) OR die (mysql_error());
						
					}

	
					$querydua = "UPDATE detail_kalkulasi_bahan SET JML_FINAL = '".$_POST["JML_FINAL"][$i]."' WHERE ANGSUR = '".$_POST["ANGSUR"][$i]."'";
					$exsecutedua = mysql_query($querydua);
					
					$cekkalkulasi = mysql_query("SELECT * FROM detail_kalkulasi_bahan WHERE ANGSUR = '".$_POST["ANGSUR"][$i]."'");
					$tampungcek = mysql_fetch_array($cekkalkulasi); 
					

					// Update Stock 					
					if($tampungcek["JML_TOTAL"] < $tampungcek["JML_FINAL"]) {
						
							if($tampungcek["JML_FINAL"] > $tampungcek["JML_DIPAKAI"]){
								
								$lihatt = mysql_query("SELECT * FROM BAHAN WHERE ID_BAHAN = '".$_POST["ID_BAHAN"][$i]."'");
								 $ambil = mysql_fetch_array($lihatt);
								 
								 $a = ($tampungcek["JML_FINAL"] - $tampungcek["JML_DIPAKAI"]);
								 
								 $SF = $ambil["STOCK"];
								 $SB = $ambil["STOCK_BAYANGAN"];
								 
								 $RUMUSFISIK = ($SF - $a);
								 $RUMUSBAYANGAN = ($SB - $a);
								 
								 $RUMUSLEBIH = ($tampungcek["JML_LEBIH"] + $a);
								 
								 $UPDATERUMUS = "UPDATE bahan SET STOCK = '".$RUMUSFISIK."' , STOCK_BAYANGAN = '".$RUMUSBAYANGAN."' WHERE ID_BAHAN = '".$_POST["ID_BAHAN"][$i]."'";
									$EXRUMUS = mysql_query($UPDATERUMUS);
									
								$UPDATELEBIH = "UPDATE detail_kalkulasi_bahan SET JML_LEBIH = '".$RUMUSLEBIH."' WHERE ANGSUR = '".$_POST["ANGSUR"][$i]."'";
									$EXLEBIH = mysql_query($UPDATELEBIH);
									
									
							}
					}
					
					if($tampungcek["JML_TOTAL"] > $tampungcek["JML_FINAL"]) {
						
						$F = ($tampungcek["JML_TOTAL"] - $tampungcek["JML_DIPAKAI"]);
						$FB = ($tampungcek["JML_FINAL"] - $tampungcek["JML_DIPAKAI"]);
						
						$HASILBAYANGAN = ($F - $FB);
						
						$lihatt = mysql_query("SELECT * FROM BAHAN WHERE ID_BAHAN = '".$_POST["ID_BAHAN"][$i]."'");
							 $ambil = mysql_fetch_array($lihatt);
							 
						$RUMUSFISIK = ($ambil["STOCK"] - $FB);
						$RUMUSBAYANGAN = ($ambil["STOCK_BAYANGAN"] + $HASILBAYANGAN);
						
						$UPDATERUMUS = "UPDATE bahan SET STOCK = '".$RUMUSFISIK."' , STOCK_BAYANGAN = '".$RUMUSBAYANGAN."' WHERE ID_BAHAN = '".$_POST["ID_BAHAN"][$i]."'";
							$EXRUMUS = mysql_query($UPDATERUMUS);
						
						
					} //---------------------------------------------
					
				}
	
			}
		
		
		// Update Head Kalkulasi Produksi
		$myqry= "UPDATE head_kalkulasi_produksi SET TGL_BERES_PROD =' $TGL' WHERE ID_KALKULASI = '$TAM_HEAD'";
					mysql_query($myqry) or die(mysql_error());
					
		$querylagi = "UPDATE head_kalkulasi_produksi SET STATUS = 'SELESAI PRODUKSI' WHERE ID_KALKULASI = '$TAM_HEAD'";
				$exsecutelagi = mysql_query($querylagi);
		
				$updatekalkulasi = mysql_query("UPDATE `head_kalkulasi_produksi` SET `STATUS` = 'SELESAI PRODUKSI' WHERE `ID_KALKULASI` = '$TAM_HEAD'");
		
		
		// Update Gudang Produksi
		$cariii = mysql_query("SELECT * FROM detail_kalkulasi_barang WHERE ID_KALKULASI = '$TAM_HEAD'");
		while($hasilll=mysql_fetch_array($cariii)){
			
			$JML_PRONYA = $hasilll["JML_PROD_FINAL"];
			$KODE_NYA = $hasilll["KODE_BARANG"];
			$carilagi = mysql_fetch_object(mysql_query("SELECT PRD_KODE_BARANG FROM gudang_produksi WHERE PRD_KODE_BARANG = '$KODE_NYA'"));
			if (empty($carilagi->PRD_KODE_BARANG)) {
				
				$simpandata = "INSERT INTO `gudang_produksi` (`PRD_KODE_BARANG`,`PRD_BARCODE`,`PRD_NAMA_BARANG`,`KATEGORI`,`PRD_STOCK`,`PRD_STOCK_BAYANGAN`,`STATUS`) VALUES ('$KODE_NYA','-','-','-','$JML_PRONYA','$JML_PRONYA','-')";
				$cekdata = mysql_query($simpandata) OR die (mysql_error());
			}
			else {
				
				$c = mysql_query("SELECT * FROM gudang_produksi WHERE PRD_KODE_BARANG = '$KODE_NYA'");
				$aaa = mysql_fetch_array($c);
				
				$STF = $aaa["PRD_STOCK"];
				$STB = $aaa["PRD_STOCK_BAYANGAN"];
				
				$HSTF = ($STF + $JML_PRONYA);
				$HSTB = ($STB + $JML_PRONYA);
				
				$updatedata = mysql_query("UPDATE `gudang_produksi` SET `PRD_STOCK` = '$HSTF' , `PRD_STOCK_BAYANGAN` = '$HSTB' WHERE `PRD_KODE_BARANG` = '$KODE_NYA'");

				
			}
	
		}
			
		header('location:../../index.php/kalkulasi-bahan');	
		break;
			
	case "angsur_bahan":
		
	
		$TAM_HEAD = $_POST["ID_PROD"];
		$PETUGAS = $_POST["PETUGAS"];
		$TANGGAL = date('Y-m-d');
		$itemCountdua = count($_POST["ID_BAHAN"]);
		$itemValuesdua =0;
		$querydua = "INSERT INTO detail_kalkulasi_angsur (ANGSUR,TANGGAL,ID_PETUGAS,JUMLAH_ANGSUR,ANGSUR_KE,ID_KALKULASI) VALUES ";
		
			$CEKANGSUR = mysql_fetch_object(mysql_query("SELECT distinct(JML_ANGSURAN) as HASIL FROM detail_kalkulasi_bahan WHERE ID_KALKULASI = '$TAM_HEAD'"));
				$AMBILANGSUR = $CEKANGSUR->HASIL;
			$ANGSURKE = ($AMBILANGSUR + 1);

		$queryValuedua = "";
		for($j=0;$j<$itemCountdua;$j++) {
			if(!empty($_POST["JML_ANGSUR"][$j])) {
				$itemValuesdua++;
				if($queryValuedua!="") {
					$queryValuedua .= ",";
				}
				$ANGSUR = $TAM_HEAD . $_POST["ID_BAHAN"][$j];
				echo $ANGSUR; echo'<br>';
				$queryValuedua .= "('" . $ANGSUR . "' , '" . $TANGGAL . "', '" . $PETUGAS . "', '" . $_POST["JML_ANGSUR"][$j] . "', '" . $ANGSURKE . "', '" . $TAM_HEAD . "')";
				
				
				
				
				
				
				
				
				$BAHAN = $_POST["ID_BAHAN"][$j];
				$ANGSURJML = $_POST["JML_ANGSUR"][$j];
				
					$ambilstock = mysql_fetch_object(mysql_query("SELECT STOCK FROM bahan WHERE ID_BAHAN = '$BAHAN'"));
					
				$STOCK = (($ambilstock->STOCK) - $ANGSURJML);
				
					$ambilangsurlist = mysql_fetch_object(mysql_query("SELECT JML_DIPAKAI FROM detail_kalkulasi_bahan WHERE ID_BAHAN = '$BAHAN' AND ID_KALKULASI = '$TAM_HEAD'"));
				
				$angsurlist = (($ambilangsurlist->JML_DIPAKAI) + $ANGSURJML);  
				
				$cekkalkulasip =  mysql_fetch_object(mysql_query("SELECT SUM(JML_TOTAL) as sumnya FROM detail_kalkulasi_bahan WHERE ID_BAHAN = '$BAHAN' AND ID_KALKULASI='$TAM_HEAD'"));
				
				
				
				

				
				if($angsurlist > $cekkalkulasip->sumnya) {
									
				$ceklebih = mysql_fetch_object(mysql_query("SELECT SUM(JML_LEBIH) as sumnyadua FROM detail_kalkulasi_bahan WHERE ID_BAHAN = '$BAHAN' AND ID_KALKULASI='$TAM_HEAD'"));
				
				
				
				$cekbayangan = mysql_fetch_object(mysql_query("SELECT STOCK_BAYANGAN as stockbayangan FROM bahan WHERE ID_BAHAN='$BAHAN'"));
				
				$input = (($angsurlist - $ceklebih->sumnyadua) - $cekkalkulasip->sumnya);
				$inputdua = ($input + $ceklebih->sumnyadua);
				$inputfix = ($cekbayangan->stockbayangan - $input);
				
					$myqry= "UPDATE bahan SET STOCK='$STOCK' WHERE ID_BAHAN = '$BAHAN'";
					mysql_query($myqry) or die(mysql_error());
					
					$myqrylima= "UPDATE bahan SET STOCK_BAYANGAN='$inputfix' WHERE ID_BAHAN = '$BAHAN'";
					mysql_query($myqrylima) or die(mysql_error());
				
					$myqrytiga= "UPDATE detail_kalkulasi_bahan SET JML_DIPAKAI =' $angsurlist' ,JML_LEBIH = '$inputdua' WHERE ID_BAHAN = '$BAHAN' AND ID_KALKULASI = '$TAM_HEAD'";
					mysql_query($myqrytiga) or die(mysql_error());
				}
				
				else {
				   $myqry= "UPDATE bahan SET STOCK='$STOCK' WHERE ID_BAHAN = '$BAHAN'";
					mysql_query($myqry) or die(mysql_error());
					
					$myqrytiga= "UPDATE detail_kalkulasi_bahan SET JML_DIPAKAI =' $angsurlist' WHERE ID_BAHAN = '$BAHAN' AND ID_KALKULASI = '$TAM_HEAD'";
					mysql_query($myqrytiga) or die(mysql_error());
				}
						
			}
		}
		
		
					$mysqrydua = "UPDATE detail_kalkulasi_bahan SET JML_ANGSURAN='$ANGSURKE' WHERE ID_KALKULASI = '$TAM_HEAD'";
				      mysql_query($mysqrydua) or die(mysql_error());
					  
		$sqldua = $querydua.$queryValuedua;
		if($itemValuesdua!=0) {
			$resultdua = mysql_query($sqldua);
			if(!empty($resultdua)) $messagedua = "Added Successfully.";
		}
		
		header('location:../../index.php/kalkulasi-bahan');
	break;
	
	
	case "batalkalkulasi":
		$truncate=$db->fetch_custom("delete from tampung_kalkulasi");
		$truncatedua=$db->fetch_custom("delete from tampung_kalkulasi_detail");
	header('location:../../index.php/kalkulasi-bahan');
	break;
		
	default:
		# code...
		break;
}

?>