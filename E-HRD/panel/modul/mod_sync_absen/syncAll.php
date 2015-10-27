<?php
	include_once "../../include/koneksi.php";
	include_once "../../include/zklib/zklib.php";
	error_reporting(0);
    session_start();
	include "../../include/catat.php";
	$user=$_SESSION['KODE_PETUGAS'];
	$aksi="Melakukan Sinkronisasi Absen Mesin";
	catat($user,$aksi);
	
	$start=$_POST['startall'];
	$end=$_POST['endall'];
	
?>

<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title"> Proses Sinkronisasi Absen Mesin</h3>
    </div>
    <div class="panel-body">
		<div class="well">
			<table id="example" class="table table-bordered">
				<thead>
					<tr>
						<th>Nama Mesin</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$attendance = array();
						$jalan=0;
						
						$getmachine=mysql_query("select * from mesin_absensi");
						while($datamachine=mysql_fetch_object($getmachine)){
						$ip=$datamachine->IP_ADDRESS;
						$port=$datamachine->PORT_COM;
					?>
					<tr>
						<td><?php echo $datamachine->NAMA_MESIN; ?></td>
						<?php
							if(!fsockopen($ip, $port)){
						?>
						<td><b style="color:red;">Disconnected</b></td>
						<?php
							}else{
						?>
						<td id="data-syncA<?php echo $datamachine->KODE_MESIN; ?>" class="data-syncA<?php echo $datamachine->KODE_MESIN; ?>"><b style="color:green;">Connected</b></td>
						<?php
								$zk = new ZKLib($ip, $port);
	
								
								$jmldatamsk=0;
								$jmldataklr=0;
								$jmldl=0;
								
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
									echo '<script>$(".data-syncA'.$datamachine->KODE_MESIN.'").html("'.count($attendance1).'-Sync Jumlah Data").show();</script>';
								}
							}
						?>
					</tr>
					<?php
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
										$ckTGL=date("Y-m-d", strtotime($DATE));
										$OUTLET="";
										
										if($ckTGL>=$start && $ckTGL<=$end){
											if($NIP!=""){
												
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
													
												if($hasil==""){
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
													
													//if($state==$tampiljam->KODE_MASUK){
														mysql_query("INSERT INTO absensi VALUES(NULL,'$KODE_JAM_KERJA','$NIP','$tmptanggal','$smenit','00:00:00','')");
														//header('Content-Type: application/json');
														//echo json_encode(array('cek' => 'true','nip'=>$NIP));
														$jmldatamsk++;
													//}
													
													/* if($state==$tampiljam->KODE_KELUAR){
														mysql_query("INSERT INTO absensi VALUES(NULL,'$KODE_JAM_KERJA','$NIP','$tmptanggal','00:00:00','$TIME','')");
														//header('Content-Type: application/json');
														//echo json_encode(array('cek' => 'true','nip'=>$NIP));
														$jmldataklr++;
													} */
													
												}
													
												if($hasil!=""){
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
													
													/* $tahansemua2=mysql_query("select NIP_PEGAWAI from absensi where TANGGAL='$tmptanggal' and NIP_PEGAWAI='$NIP' and JAM_MASUK ='00:00:00'");
													$getsemua2=mysql_fetch_object($tahansemua2);
													$hasilgetsemua2=$getsemua2->NIP_PEGAWAI; */
													
													if($hasilgetsemua1!=""/*  && $state==$tampiljam->KODE_KELUAR */){
														//$jamkeluar=date('H:i:s');
														mysql_query("UPDATE `absensi` SET `KODE_JAM_KERJA` = '$KODE_JAM_KERJA2', `JAM_KELUAR` = '$TIME' WHERE `NIP_PEGAWAI` ='$NIP' and TANGGAL='$tmptanggal' ");	
														$jmldataklr++;
													}/* else if($hasilgetsemua2!="" && $state==$tampiljam->KODE_MASUK){
														//$jamkeluar=date('H:i:s');
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
														$ckmenit3=date('i', strtotime($DATE));
														$ckmenit4=date('i', strtotime($tmenit1->VALUE));
														
														if($ckmenit3<=$ckmenit4){
															$smenit1=date('H:i:s', strtotime($tampiljam->JAM_DATANG));
														}else{
															$smenit1=date('H:i:s', strtotime($DATE));
														}
													
														mysql_query("UPDATE `absensi` SET `JAM_MASUK` = '$smenit1' WHERE `NIP_PEGAWAI` ='$NIP' and TANGGAL='$tmptanggal' ");	
														$jmldatamsk++;
													}else{
														$jmldl++;
													} */
												}
													
											}
										}
												
									}
									
								}
						
					?>
				</tbody>
			</table>
		</div>
    </div>
</div>
