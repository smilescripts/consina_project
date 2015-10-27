<?php
		
	$koneksi=mysql_connect("localhost","root","");
	mysql_select_db("e-pegawai",$koneksi);
	$tanggal=date('Y-m-d H:i:s');
	//mysql_query("insert into restore_data values(NULL,'$tanggal','')");
	$nama_file=$_FILES['file']['name'][0];
	$ukuran=$_FILES['file']['size'][0];
	$start=$_POST['start'];
	$end=$_POST['end'];
	error_reporting(0);
	
	include "../../fungsi/excel_reader2.php";
// file yang tadinya di upload, di simpan di temporary file PHP, file tersebut yang kita ambil
// dan baca dengan PHP Excel Class
$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name'][0]);
$hasildata = $data->rowcount($sheet_index=0);
// default nilai 
$sukses = 0;
$gagal = 0;
$jmldataklr = 0;
	$jmldatamsk = 0;
	$jmldl = 0;

for ($i=1; $i<=$hasildata; $i++)
	{
		$data1 = ""; 
		$data2 = "";
		$data3 = "";
		$tmp = "";
		$tmptanggal = "";
		$TIME = "";
		
		$data1 = $data->val($i,1); 
		$data2 = $data->val($i,2);
		$data3 = $data->val($i,4);
 
		
		$tmp=str_replace("/","-",$data2);
		$tmptanggal=date("Y-m-d", strtotime($tmp));
		$tmptanggal1=date("Y-m-d H:i:s", strtotime($tmp));
		
		$tahan=mysql_query("select NIP_PEGAWAI from absensi where TANGGAL='$tmptanggal' and NIP_PEGAWAI='$data1'");
			$get=mysql_fetch_object($tahan);
			$hasil=$get->NIP_PEGAWAI;
			$TIME=date("H:i:s", strtotime($tmptanggal1));
			//echo $TIME.'</br>';
			
			$OUTLET="";
					$querypegawai=mysql_query("SELECT * FROM pegawai WHERE KODE_PEGAWAI='$data1'");
					$tpegawai=mysql_fetch_object($querypegawai);
					$OUTLET=$tpegawai->OUTLET;
					
					if($OUTLET=="YA"){
						$idpengaturan=2;
						$queryjam2=mysql_query("SELECT * FROM jam_kerja WHERE KODE_JAM_KERJA='3'");
						$tampiljam2 = mysql_fetch_object($queryjam2);
						
						$tbatasjam=date('H', strtotime($tampiljam2->JAM_DATANG)-60*1);
						$tbatasjam1=$tbatasjam.":00:00";
						
						if($TIME>=$tbatasjam1){
							$KODE_JAM_KERJA1=3;
						}else{
							$KODE_JAM_KERJA1=2;
						}
						
					}else{
						$KODE_JAM_KERJA1=1;
						if($STATUS_PEGAWAI=="Tetap"){
							$idpengaturan=2;
						}
						if($STATUS_PEGAWAI=="Kontrak Bekasi"){
							$idpengaturan=16;
						}
						if($STATUS_PEGAWAI=="Kontrak"){
							$idpengaturan=15;
						}
					}
					
			$queryjam=mysql_query("SELECT * FROM jam_kerja WHERE KODE_JAM_KERJA='$KODE_JAM_KERJA1'");
		$tampiljam = mysql_fetch_object($queryjam);
		
			
			$qpeg=mysql_query("select STATUS_PEGAWAI from pegawai where KODE_PEGAWAI='$data1'");
			$tpeg=mysql_fetch_object($qpeg);
			$cekcek=$get->STATUS_PEGAWAI;
			
			
		if($tmptanggal>=$start && $tmptanggal<=$end){
			
			if($hasil==""){
				/* if($cekcek=="Kontrak"){
					$qmenit=mysql_query("select VALUE from pengaturan_penggajian where ID='15'");
				}
				if($cekcek=="Kontrak Bekasi"){
					$qmenit=mysql_query("select VALUE from pengaturan_penggajian where ID='16'");
				}
				if($cekcek=="Tetap"){
					$qmenit=mysql_query("select VALUE from pengaturan_penggajian where ID='2'");
				}
				
				$tmenit=mysql_fetch_object($qmenit);
				$ckmenit1=date('i', strtotime($data2));
				$ckmenit2=date('i', strtotime($tmenit->VALUE));
												
				if($ckmenit1<=$ckmenit2){
					$smenit=date('H:i:s', strtotime($tampiljam->JAM_DATANG));
				}else{
					$smenit=date('H:i:s', strtotime($data2));
				} */
														
				//if($data3==$tampiljam->KODE_MASUK){
					mysql_query("INSERT INTO absensi VALUES(NULL,'$KODE_JAM_KERJA1','$data1','$tmptanggal','$TIME','00:00:00','')");
					//header('Content-Type: application/json');
					//echo json_encode(array('cek' => 'true','nip'=>$NIP));
					$jmldatamsk++;
				//}
														
/* 				if($data3==$tampiljam->KODE_KELUAR){
					mysql_query("INSERT INTO absensi VALUES(NULL,'$tampiljam->KODE_JAM_KERJA','$data1','$tmptanggal','00:00:00','$TIME','')");
					//header('Content-Type: application/json');
					//echo json_encode(array('cek' => 'true','nip'=>$NIP));
					$jmldataklr++;
				} */
			}
														
			if($hasil!=""){
				$tahansemua1=mysql_query("select * from absensi where TANGGAL='$tmptanggal' and NIP_PEGAWAI='$data1'");
				$getsemua1=mysql_fetch_object($tahansemua1);
				$hasilgetsemua1=$getsemua1->NIP_PEGAWAI;
													
				/* $tahansemua2=mysql_query("select NIP_PEGAWAI from absensi where TANGGAL='$tmptanggal' and NIP_PEGAWAI='$data1' and JAM_MASUK ='00:00:00'");
				$getsemua2=mysql_fetch_object($tahansemua2);
				$hasilgetsemua2=$getsemua2->NIP_PEGAWAI; */
				
				if($OUTLET=="YA"){
							$queryjam4=mysql_query("SELECT * FROM jam_kerja WHERE KODE_JAM_KERJA='3'");
							$tampiljam4 = mysql_fetch_object($queryjam4);
							
							$tbatasjam2=date('H', strtotime($tampiljam4->JAM_DATANG)-60*1);
							$tbatasjam3=$tbatasjam2.":00:00";
							
							if($getsemua1->JAM_MASUK>=$tbatasjam3){
								$KODE_JAM_KERJA2=3;
							}else{
								$KODE_JAM_KERJA2=2;
							}
						
						}else{
							$KODE_JAM_KERJA2=1;
						}
				
														
				if($hasilgetsemua1!=""/*  && $data3==$tampiljam->KODE_KELUAR */){
					//$jamkeluar=date('H:i:s');
					mysql_query("UPDATE `absensi` SET `KODE_JAM_KERJA` = '$KODE_JAM_KERJA2', `JAM_KELUAR` = '$TIME' WHERE `NIP_PEGAWAI` ='$data1' and TANGGAL='$tmptanggal' ");	
					$jmldataklr++;
				}/* else if($hasilgetsemua2!="" && $data3==$tampiljam->KODE_MASUK){
					/* //$jamkeluar=date('H:i:s');
					if($cekcek=="Kontrak"){
						$qmenit1=mysql_query("select VALUE from pengaturan_penggajian where ID='15'");
					}
					if($cekcek=="Kontrak Bekasi"){
						$qmenit1=mysql_query("select VALUE from pengaturan_penggajian where ID='16'");
					}
					if($cekcek=="Tetap"){
						$qmenit1=mysql_query("select VALUE from pengaturan_penggajian where ID='2'");
					}
					
					$tmenit1=mysql_fetch_object($qmenit1);
					$ckmenit3=date('i', strtotime($data2));
					$ckmenit4=date('i', strtotime($tmenit1->VALUE));
															
					if($ckmenit3<=$ckmenit4){
						$smenit1=date('H:i:s', strtotime($tampiljam->JAM_DATANG));
					}else{
						$smenit1=date('H:i:s', strtotime($data2));
					}
														
					mysql_query("UPDATE `absensi` SET `JAM_MASUK` = '$TIME' WHERE `NIP_PEGAWAI` ='$data1' and TANGGAL='$tmptanggal' ");	
					$jmldatamsk++;
				}else{
					$jmldl++;
				} */
			}

			if ($hasildata) $sukses++;
			else $gagal++;
		}
	}
	header('Content-Type: application/json');
	echo json_encode(array('jmldt' => $sukses,'dtggl'=>$gagal,'dtmsk'=>$jmldatamsk,'dtklr'=>$jmldataklr));
?>

