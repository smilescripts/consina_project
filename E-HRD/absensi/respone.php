<?php
	include_once "../panel/include/koneksi.php";
	include("../panel/include/zklib/zklib.php");
	error_reporting(0);
	$ip=$_SERVER['REMOTE_ADDR'];
	$mac_string = shell_exec("arp -a $ip");
	$mac_array = explode(" ",$mac_string);
	$mac = $mac_array[3];
	
	$attendance = array();
	$jalan=0;
	$getmachine=mysql_query("select * from mesin_absensi");/* where MAC_ADDRESS='$ip' */
	while($datamachine=mysql_fetch_object($getmachine)){
		$ip=$datamachine->IP_ADDRESS;
		$port=$datamachine->PORT_COM;
		$zk = new ZKLib($ip, $port);
		
		if($zk !=""){
			
			$ret = $zk->connect();
			$attendance1 = array();
			$attendance1 = $zk->getAttendance();
			$attendance = array_merge($attendance,$attendance1);
			$jalan=1;				
			$now=date('Y-m-d');
			
			//$zk->clearattendance();				
			$zk->getTime();
			$zk->enableDevice();
			$zk->disconnect();
		}
	}
		if($jalan==1){
			usort(
				$attendance,
				function($a, $b) {
					return (date('H:i:s', strtotime($a[3])) < date('H:i:s', strtotime($b[3]))) ? -1 : 1;
				}
			);

			while(list($idx, $attendancedata) = each($attendance) ) {
				$NIP=$attendancedata[1];
				$state=$attendancedata[2];
				$DATE=$attendancedata[3];
				$TIME=date("H:i:s", strtotime($attendancedata[3]));
						
				if($NIP!=""){
					$OUTLET="";
					$querypegawai=mysql_query("SELECT * FROM pegawai WHERE KODE_PEGAWAI='$NIP'");
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
					
					if($tampiljam->JAM_DATANG<=$tampiljam->JAM_PULANG){
						$KODE_JAM_KERJA = $tampiljam->KODE_JAM_KERJA;
						$tmptanggal=date("Y-m-d", strtotime($DATE));
					}else{
						$KODE_JAM_KERJA = $tampiljam->KODE_JAM_KERJA;
						$ckdate1=date("Y-m-d");
						$ckdate2=date("Y-m-d", strtotime($DATE));
						if($ckdate1>$ckdate2){
							$date1 = str_replace('-', '/', $DATE);
							$tmptanggal = date('Y-m-d',strtotime($date1 . "-1 days"));
						}else{
							$tmptanggal=date("Y-m-d", strtotime($DATE));
						}
					}
						
					$tahan=mysql_query("select NIP_PEGAWAI from absensi where TANGGAL='$tmptanggal' and NIP_PEGAWAI='$NIP'");
					$get=mysql_fetch_object($tahan);
					$hasil=$get->NIP_PEGAWAI;
						
					if($hasil=="" /* && $state==$tampiljam->KODE_MASUK */){
						/* $qmenit=mysql_query("select VALUE from pengaturan_penggajian where ID='$idpengaturan'");
						$tmenit=mysql_fetch_object($qmenit);
						$tmenit2=explode(",",$tmenit->VALUE);
						$ckmenit1=date('H:i', strtotime($DATE));
						$ckmenit3=date('H', strtotime($DATE));
						$ckmenit4=date('i', strtotime($DATE)+60*$tmenit2[0]);
						$ckmenit2=$ckmenit3.":".$ckmenit4;
						
						if($ckmenit1<=$ckmenit2){
							$smenit=date('H:i:s', strtotime($tampiljam->JAM_DATANG));
						}else{ */
							$smenit=date('H:i:s', strtotime($DATE));
						//}
						header('Content-Type: application/json');
						echo json_encode(array('cek' => 'true','nip'=>$NIP));	
						mysql_query("INSERT INTO absensi VALUES(NULL,'$KODE_JAM_KERJA','$NIP','$tmptanggal','$smenit','00:00:00','')");
					}
						
					if($hasil!="" /* && $state==$tampiljam->KODE_KELUAR */){
						$tahansemua1=mysql_query("select * from absensi where TANGGAL='$tmptanggal' and NIP_PEGAWAI='$NIP'");
						$getsemua1=mysql_fetch_object($tahansemua1);
						$hasilgetsemua1=$getsemua1->NIP_PEGAWAI;
						
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
						
						if($hasilgetsemua1!="" ){
							//$jamkeluar=date('H:i:s');
							mysql_query("UPDATE `absensi` SET `KODE_JAM_KERJA` = '$KODE_JAM_KERJA2', `JAM_KELUAR` = '$TIME' WHERE `NIP_PEGAWAI` ='$NIP' and TANGGAL='$tmptanggal' ");	
								
						}
					}
						
				}
						
			}
		}	
?>