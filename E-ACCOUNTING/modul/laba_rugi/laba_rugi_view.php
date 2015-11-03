
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Laba Rugi
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>laba-rugi">Laba Rugi</a></li>
                        <li class="active">Daftar Laba Rugi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               <h1 class="headingtable"><span>Laba Rugi</span></h1>
							
                                <div class="box-body table-responsive">
                              
<div class="post">
		<div class="entry">
			<?php
			//untuk ID perusahaan
			$periode=mysql_fetch_array(mysql_query("select tanggal_awal from tabel_rugi_laba where kode_rekening='VII'"));
			?>
			<h2 align="center"><strong>Rugi Laba</strong></h2>
			<p align="center"><font color="#333333"><?php echo "Periode : ".$periode['tanggal_awal'];?></font></p>
			<p align="center">&nbsp;</p>
			<p>
			<table class="table table-bordered">
			<tr><th>Kode Perkiraan</th><th>Uraian</th><th>Pengeluaran</th><th>Pendapatan</th></tr>
			<tr><td align="center">I.</td><td><font color="#333333">SUMBER PENGHASILAN</font></td>
			<td></td><td></td></tr>
			<?php
			$penghasilan=mysql_query("select * from tabel_rugi_laba where kode_rekening between '411.01' and '414.01'");
			while($row=mysql_fetch_array($penghasilan)){
			?>
				<tr><td align="center"><?php echo $row['kode_rekening'];?></td><td><?php echo $row['nama_rekening'];?></td>
				<td align="right"><?php echo number_format($row['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($row['rl_kredit'],2,'.',','); ?></td></tr>
			<?php
			}
			?>
			<tr><td colspan="4"></tr>
			<tr><td align="center">II.</td><td><font color="#333333">BIAYA UMUM DAN ADMINISTRASI</font></td>
			<td></td><td></td></tr>
			<tr><td></td><td><font color="#333333">BIAYA UMUM</font></td>
			<td></td><td></td></tr>
			<?php
			$biaya_umum=mysql_query("select * from tabel_rugi_laba where kode_rekening between '511.02' and '521.99'");
			while($row_umum=mysql_fetch_array($biaya_umum)){
			?>
				<tr><td align="center"><?php echo $row_umum['kode_rekening'];?></td><td><?php echo $row_umum['nama_rekening'];?></td>
				<td align="right"><?php echo number_format($row_umum['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($row_umum['rl_kredit'],2,'.',','); ?></td></tr>
			<?php
			}
			?>
			
			<tr><td></td><td><font color="#333333">BIAYA ADMINISTRASI</font></td>
			<td></td><td></td></tr>
			<?php
			$biaya_admin1=mysql_query("select * from tabel_rugi_laba where kode_rekening between '522.01' and '522.99'");
			while($row_biaya1=mysql_fetch_array($biaya_admin1)){
			?>
				<tr><td align="center"><?php echo $row_biaya1['kode_rekening'];?></td><td><?php echo $row_biaya1['nama_rekening'];?></td>
				<td align="right"><?php echo number_format($row_biaya1['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($row_biaya1['rl_kredit'],2,'.',','); ?></td></tr>
			<?php
			}
			?>
			<?php
			$biaya_admin2=mysql_query("select * from tabel_rugi_laba where kode_rekening between '711.01' and '811.99'");
			while($row_biaya2=mysql_fetch_array($biaya_admin2)){
			?>
				<tr><td align="center"><?php echo $row_biaya2['kode_rekening'];?></td><td><?php echo $row_biaya2['nama_rekening'];?></td>
				<td align="right"><?php echo number_format($row_biaya2['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($row_biaya2['rl_kredit'],2,'.',','); ?></td></tr>
			<?php
			}
			?>
			
			<tr><td colspan="4"></tr>
			<?php
			$pendapatan=mysql_fetch_array(mysql_query("select * from tabel_rugi_laba where nama_rekening='JUMLAH PENDAPATAN'"));
			?>
			<tr><td></td><td><font color="#333333">JUMLAH PENDAPATAN</font></td>
			<td align="right"><?php echo number_format($pendapatan['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($pendapatan['rl_kredit'],2,'.',','); ?></td></tr>
			
			
			<?php
			$jumlah_biaya=mysql_fetch_array(mysql_query("select * from tabel_rugi_laba where nama_rekening='JUMLAH BIAYA'"));
			?>
			<tr><td></td>
			<td><font color="#333333">JUMLAH BIAYA </font></td>
			<td align="right"><?php echo number_format($jumlah_biaya['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($jumlah_biaya['rl_kredit'],2,'.',','); ?></td></tr>
			
			
			<tr><td colspan="4"></tr>
			<?php
			$shu_berjalan=mysql_fetch_array(mysql_query("select * from tabel_rugi_laba where nama_rekening='Sisa Hasil Usaha Tahun Berjalan'"));
			?>
			<tr><td></td><td><font color="#333333">Sisa Hasil Usaha Tahun Berjalan</font></td>
			<td align="right"><?php echo number_format($shu_berjalan['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($shu_berjalan['rl_kredit'],2,'.',','); ?></td></tr>
			
			
			<tr><td colspan="4"></tr>
			<?php
			$total_balance=mysql_fetch_array(mysql_query("select * from tabel_rugi_laba where nama_rekening='Total Balance'"));
			?>
			<tr><td></td><td><font color="#333333">Total Balance</font></td>
			<td align="right"><?php echo number_format($total_balance['rl_debet'],2,'.',','); ?></td><td align="right"><?php echo number_format($total_balance['rl_kredit'],2,'.',','); ?></td></tr>
			</table>
			
			</p>
		</div>
	</div>

							  </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
     
                </section><!-- /.content -->
        
