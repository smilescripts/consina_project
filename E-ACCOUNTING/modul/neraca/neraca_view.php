
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Neraca
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>neraca">Neraca</a></li>
                        <li class="active">Daftar Neraca</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                 <h1 class="headingtable"><span>Laba Rugi</span></h1>
							
                                <div class="box-body table-responsive">
                              <?php 
							  error_reporting(0);
							 $tanggal=date("d/m/Y");
							  $query_tanggal=mysql_fetch_array(mysql_query("select min(tanggal_posting) as tanggal_pertama from tabel_transaksi"));
								$tanggal_pertama=$query_tanggal['tanggal_pertama'];
?>

	<div class="post">
	<div class="entry">
		<form action="<?=base_index();?>neraca" method="post" name="postform">
		  <table width="715" border="0" class="table table-bordered">
			<tr>
			  <td width="51"><strong>Periode</strong></td>
			  <td colspan="2"><input type="text" name="tanggal1" size="15" value="<?php if(empty($_POST['tanggal1'])){ echo $tanggal;}else{ echo $_POST['tanggal1']; }?>"/>
			  <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal1);return false;" ><img src="../inc/calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a></td>
			  <td width="25"><strong>S/D</strong></td>
			  <td colspan="2"><input type="text" name="tanggal2" size="15" value="<?php if(empty($_POST['tanggal2'])){ echo $tanggal;}else{ echo $_POST['tanggal2']; }?>"/>
			  <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal2);return false;" ><img src="../inc/calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a></td>
			  <td width="126">
			  <select name="neraca">
					<option value="aktiva">Neraca Aktiva</option>
					<option value="pasiva">Neraca Pasiva</option>
			  </select>
			  </td>
			  <td width="157"><input type="submit" name="report" value="Tampilkan" /></td>
			</tr>
		  </table>
		</form>
	</div>
	</div>


	<div class="post">
		<div class="entry">
		<p>
		<?php
		//untuk menyelesaikan transaksi
		if(isset($_POST['report'])){
			
			//tanggal periode laporan
			$tanggal1=$_POST['tanggal1'];
			$tanggal2=$_POST['tanggal2'];
			$neraca=$_POST['neraca'];
			
			function aktiva(){

				///////////////////HITUNG AKTIVA////////////////////
				//hapus table semporial yang lama
				$hapus_neraca_temporial=mysql_query("delete from tabel_neraca");
				
				if($hapus_neraca_temporial){
					//Query aktiva LANCAR
					$query_kas=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS kas FROM tabel_master WHERE kode_rekening LIKE '111%'"));
					$query_bank1=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS bank1 FROM tabel_master WHERE kode_rekening LIKE '112%'"));
					$query_bank2=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS bank2 FROM tabel_master WHERE kode_rekening LIKE '221%'"));
					$query_piutang_anggota=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS piutang_anggota FROM tabel_master WHERE kode_rekening between '113' and '114'"));
					$query_piutang_no_anggota=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS piutang_no_anggota FROM tabel_master WHERE kode_rekening like '115%' or kode_rekening ='123.01'"));
					$query_pendapatan_ymh=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS pendapatan_ymh FROM tabel_master WHERE kode_rekening like '119%'"));
					$query_persediaan_toko=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS persediaan_toko FROM tabel_master WHERE kode_rekening like '117%'"));
					
					//Array Query
					$kas=$query_kas['kas'];
					$bank1=$query_bank1['bank1'];
					$bank2=$query_bank2['bank2'];
					$piutang_anggota=$query_piutang_anggota['piutang_anggota'];
					$piutang_no_anggota=$query_piutang_no_anggota['piutang_no_anggota'];
					$pendapatan_ymh=$query_pendapatan_ymh['pendapatan_ymh'];
					$persediaan_toko=$query_persediaan_toko['persediaan_toko'];
					
					
					//Proses Query
					$bank=$bank1+$bank2;
					
					//menghitung saldo akhir aktiva lancar
					$aktiva_lancar=$kas+$bank+$piutang_anggota+$piutang_no_anggota+$pendapatan_ymh+$persediaan_toko;
					
					//Query aktiva TETAP
					$query_mesin=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS mesin FROM tabel_master WHERE kode_rekening LIKE '133%'"));
					$query_kendaraan=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS kendaraan FROM tabel_master WHERE kode_rekening LIKE '134%'"));
					$query_pertoko=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS pertoko FROM tabel_master WHERE kode_rekening='135.01'"));
					$query_perabot=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS perabot FROM tabel_master WHERE kode_rekening='135.02'"));
					$query_porsekot=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS porsekot FROM tabel_master WHERE kode_rekening='118.01'"));		
					$query_susut_mesin=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS susut_mesin FROM tabel_master WHERE kode_rekening like '136.3%'"));
					$query_susut_kendaraan=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS susut_kendaraan FROM tabel_master WHERE kode_rekening like '136.4%'"));
					$query_susut_perabot=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS susut_perabot FROM tabel_master WHERE kode_rekening='136.502'"));
					$query_susut_toko=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS susut_toko FROM tabel_master WHERE kode_rekening='136.501'"));
					
					//Array Query
					$mesin=$query_mesin['mesin'];
					$kendaraan=$query_kendaraan['kendaraan'];
					$pertoko=$query_pertoko['pertoko'];
					$perabot=$query_perabot['perabot'];
					$porsekot=$query_porsekot['porsekot'];
					$susut_mesin=$query_susut_mesin['susut_mesin'];
					$susut_kendaraan=$query_susut_kendaraan['susut_kendaraan'];
					$susut_perabot=$query_susut_perabot['susut_perabot'];
					$susut_toko=$query_susut_toko['susut_toko'];
					
					//Perhitungan
					$total_susut=$susut_mesin+$susut_kendaraan+$susut_toko+$susut_perabot;
					$aktiva_tetap=($mesin+$kendaraan+$pertoko+$perabot)-$total_susut;
					$aktiva_lain=$porsekot;
			
					$jumlah_aktiva=$aktiva_lancar+$pkpri+$aktiva_tetap+$aktiva_lain;
					
					
					//Tahap penginputan Data
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('0','<b>AKTIVA LANCAR</b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('1','Kas', '$kas')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('2','Bank', '$bank')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('3','Piutang Anggota', '$piutang_anggota')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('4','Piutang Bukan Anggota', '$piutang_no_anggota')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('5','Pendapatan yang masih harus diterima', '$pendapatan_ymh')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('6','Persediaan Barang Toko', '$persediaan_toko')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('7','break')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('8','<b>TOTAL AKTIVA LANCAR</b>', '$aktiva_lancar')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('9','break')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('10','<b>PENYERTAAN PKPRI</b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('11','Penyertaan PKPRI', '$pkpri')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('12','break')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('13','<b>AKTIVA TETAP</b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('14','Mesin-mesin', '$mesin')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('15','Kendaraan', '$kendaraan')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('16','Perlengkapan Toko', '$pertoko')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('17','Perabot', '$perabot')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('18','Penyusutan Mesin', '$susut_mesin')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('19','Penyusutan Kendaraan', '$susut_kendaraan')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('20','Penyusutan Perlengkapan Toko', '$susut_toko')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('21','Penyusutan Perabot', '$susut_perabot')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('22','Total Aktiva Tetap', '$aktiva_tetap')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening) values('23')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('24','<b>AKTIVA LAINNYA<b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('25','Piutang Sementara', '$porsekot')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('26','break')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('27','<b>JUMLAH AKTIVA</b>', '$jumlah_aktiva')");
					
					$query_report=mysql_query("select * from tabel_neraca");
					
					?>
					<h4 align="left"><b>Neraca (Balance Sheet)</b></h4><br />
					<font color="#333333">Periode : <?php echo $tanggal2=$_POST['tanggal2']; ?></font>
					<h4 align="right"><b>AKTIVA</b></h4><br />
					<table class="table table-bordered">
					<tr><th>URAIAN</th><th>NILAI</th></tr>
					<?php
					while($row=mysql_fetch_array($query_report)){
						$nama_rekening=$row['nama_rekening'];
						$awal_debet=number_format($row['awal_debet'],2,'.',',');
						
						if($nama_rekening=='break'){
							?><tr><td colspan="2"></td></tr><?php
						}else{
							?><tr><td><?php echo $nama_rekening ?></td><td align="right"><?php echo $awal_debet;?></td></tr><?php
						}
					}
					?>
					</table>
					<?php
					
				}else{
					echo mysql_error();
				}
			}
				 
			function pasiva(){
				///////////////////HITUNG PASIVA////////////////////
				//hapus table semporial yang lama
				$hapus_neraca_temporial=mysql_query("delete from tabel_neraca");
				
				if($hapus_neraca_temporial){
					 //Hutang jangka pendek
					$query_hutang_usaha=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS hutang_usaha FROM tabel_master WHERE kode_rekening LIKE '211%' or kode_rekening='223.03' or kode_rekening='114.03'"));
					$query_biaya_ymh=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS biaya_ymh FROM tabel_master WHERE kode_rekening='214.01' or kode_rekening LIKE '216%'"));
					$query_mana_suka=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS mana_suka FROM tabel_master WHERE kode_rekening='212.01'"));
					$query_khusus=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS khusus FROM tabel_master WHERE kode_rekening='212.02'"));
					$query_shu_lalu=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS shu_lalu FROM tabel_master WHERE kode_rekening='313.02' or kode_rekening ='313.05'"));
					$query_dana_dana=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS dana_dana FROM tabel_master WHERE kode_rekening like '213%'"));
					
					//Hutang jangka panjang
					$query_deposit_anggota=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS deposit_anggota FROM tabel_master WHERE kode_rekening='221.02'"));
					$query_hutang_dipo=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS hutang_dipo FROM tabel_master WHERE kode_rekening='223.02'"));
					$query_hutang_niaga=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS hutang_niaga FROM tabel_master WHERE kode_rekening='223.01'"));
					$query_hutang_bni=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS hutang_bni FROM tabel_master WHERE kode_rekening like '222%'"));
						
					//menghitung modal
					$query_swkp=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS swkp FROM tabel_master WHERE kode_rekening='212.03'"));
					$query_s_pokok=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS s_pokok FROM tabel_master WHERE kode_rekening='311.01'"));
					$query_s_wajib=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS s_wajib FROM tabel_master WHERE kode_rekening='311.02'"));
					$query_cadangan=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS cadangan FROM tabel_master WHERE kode_rekening='312.01'"));
					$query_donasi=mysql_fetch_array(mysql_query("SELECT sum(sisa_kredit) AS donasi FROM tabel_master WHERE kode_rekening='313.01'"));
					
					//menghitung SHU
					$query_pajak=mysql_fetch_array(mysql_query("SELECT sum(sisa_debet) AS pajak FROM tabel_master WHERE kode_rekening='522.07' or kode_rekening='522.09' or kode_rekening='522.10' or kode_rekening='811.01'"));
					$query_shu_ap=mysql_fetch_array(mysql_query("SELECT sum(nrc_kredit) AS shu_ap FROM tabel_master WHERE kode_rekening LIKE '314%'"));
					
					//Array Query
					$hutang_usaha=$query_hutang_usaha['hutang_usaha'];
					$biaya_ymh=$query_biaya_ymh['biaya_ymh'];
					$mana_suka=$query_mana_suka['mana_suka'];
					$khusus=$query_khusus['khusus'];
					$shu_lalu=$query_shu_lalu['shu_lalu'];
					$dana_dana=$query_dana_dana['dana_dana'];
					
					//Array Query
					$deposit_anggota=$query_deposit_anggota['deposit_anggota'];
					$hutang_dipo=$query_hutang_dipo['hutang_dipo'];
					$hutang_niaga=$query_hutang_niaga['hutang_niaga'];
					$hutang_bni=$query_hutang_bni['hutang_bni'];
	
					//Array Query
					$swkp=$query_swkp['swkp'];
					$s_pokok=$query_s_pokok['s_pokok'];
					$s_wajib=$query_s_wajib['s_wajib'];
					$cadangan=$query_cadangan['cadangan'];
					$donasi=$query_donasi['donasi'];
					
					//Array Query
					$pajak=$query_pajak['pajak'];
					$shu_ap=$query_shu_ap['shu_ap'];	
					
					//Proses Perhitungan
					$hjp_1=$hutang_usaha+$biaya_ymh+$mana_suka+$khusus+$shu_lalu+$dana_dana;
					$hjp_2=$deposit_anggota+$hutang_dipo+$hutang_niaga+$hutang_bni;
					$modale=$swkp+$s_pokok+$s_wajib+$cadangan+$donasi;
					$shu_bp=$shu_ap+$pajak;
					$total_pasiva=$hjp_1+$hjp_2+$modale+$shu_ap;	
					
					
					//Tahap penginputan Data
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('0','<b>HUTANG JANGKA PENDEK</b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('1','Hutang Usaha/Titipan', '$hutang_usaha')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('2','Biaya yang masih harus dibayar', '$biaya_ymh')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('3','Simpanan Manasuka', '$mana_suka')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('4','Simpanan Khusus', '$khusus')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('5','SHU Tahun lalu belum dibagi', '$shu_lalu')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('6','Dana-dana', '$dana_dana')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('7','break')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('8','<b>HUTANG JANGKA PANJANG</b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('9','Deposit Anggota', '$deposit_anggota')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('10','Hutang PT.Dipo', '$hutang_dipo')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('11','Hutang Bank Niaga', '$hutang_niaga')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('12','Hutang Bank BNI', '$hutang_bni')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('13','break')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('14','<b>MODAL</b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('15','SWKP', '$swkp')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('16','Simpanan Pokok Anggota', '$s_pokok')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('17','Simpanan Wajib Anggota', '$s_wajib')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('18','Cadangan', '$cadangan')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('19','Donasi', '$donasi')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('20','break')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('21','<b>SISA HASIL USAHA</b>')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('22','Sisa Hasil Usaha sebelum Pajak', '$shu_bp')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('23','Pajak Penghasilan', '$pajak')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('24','Sisa Hasil Usaha setelah Pajak', '$shu_ap')");
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening) values('25','break')");				
					mysql_query("INSERT INTO tabel_neraca(kode_rekening, nama_rekening, awal_debet) values('26','JUMLAH PASIVA', '$total_pasiva')");

					$query_report=mysql_query("select * from tabel_neraca");
					
					?>
					<h4 align="left"><b>Neraca (Balance Sheet)</b></h4><br />
					<font color="#333333">Periode : <?php echo $tanggal2=$_POST['tanggal2']; ?></font>
					<h4 align="right"><b>PASIVA</b></h4><br />
					<table class="table table-bordered">
					<tr><th>URAIAN</th><th>NILAI</th></tr>
					<?php
					while($row=mysql_fetch_array($query_report)){
						$nama_rekening=$row['nama_rekening'];
						$awal_debet=number_format($row['awal_debet'],2,'.',',');
						
						if($nama_rekening=='break'){
							?><tr><td colspan="2"></td></tr><?php
						}else{
							?><tr><td><?php echo $nama_rekening ?></td><td align="right"><?php echo $awal_debet;?></td></tr><?php
						}
					}
					?>
					</table>
					
				<?php
				}else{
					echo mysql_error();
				}
			}
				 
			//tampilkan profil perusahaan
			
			if($neraca=='aktiva'){
				 aktiva();
			}else if($neraca=='pasiva'){
				pasiva();
			}
			
			
			
		}else{	
			unset($_POST['report']);
		}
		?>
		
		</p>
		</div>
	</div>
	
	
	<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

							  </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
</section><!-- /.content -->
        
