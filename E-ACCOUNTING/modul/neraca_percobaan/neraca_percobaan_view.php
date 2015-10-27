
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Neraca Percobaan
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>neraca-percobaan">Neraca Percobaan</a></li>
                        <li class="active">Daftar Neraca Percobaan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                  <h1 class="headingtable"><span>Neraca Percobaan</span></h1>
							
							   <!-- /.box-header -->
                                <div class="box-body table-responsive">
                             
	<div class="post">
	<div class="entry">
		
			<p>
			<table class="table table-bordered" border="1">
			<tr>
			  <th rowspan="2" style="text-align:center">Kode Rekening</th>
			  <th rowspan="2" style="text-align:center">Nama Rekening</th>
			  <th colspan="2" style="text-align:center">Awal</th>
			  <th colspan="2" style="text-align:center">Mutasi</th>
			  <th colspan="2" style="text-align:center">Sisa</th>
			  </tr>
			<tr>
				<th style="text-align:center">Debet</th>
				<th style="text-align:center">Kredit</th><th style="text-align:center">Debet</th><th style="text-align:center"> Kredit</th><th style="text-align:center">Debet</th><th style="text-align:center">Kredit</th>
			</tr>
			<?php
			$query_mutasi=mysql_query("select * from tabel_master order by kode_rekening asc");
			$total=mysql_fetch_array(mysql_query("select sum(awal_debet) as tot_awal_debet, sum(awal_kredit) as tot_awal_kredit, sum(mut_debet) as tot_mut_debet,  sum(mut_kredit) as tot_mut_kredit,
								sum(sisa_debet) as tot_sisa_debet, sum(sisa_kredit) as tot_sisa_kredit from tabel_master order by kode_rekening asc"));
			
			while($row_mut=mysql_fetch_array($query_mutasi)){
			
				$awal_debet=$row_mut['awal_debet'];
				$awal_kredit=$row_mut['awal_kredit'];
				$mutasi_debet=$row_mut['mut_debet'];
				$mutasi_kredit=$row_mut['mut_kredit'];
				$sisa_debet=$row_mut['sisa_debet'];
				$sisa_kredit=$row_mut['sisa_kredit'];
			
				?>
				<tr>
					<td><div align="center"><?php echo $row_mut['kode_rekening'];?></div></td>
					<td><?php echo $row_mut['nama_rekening'];?></td>
					
					<td align="right"><?php echo number_format($awal_debet,2,'.',','); ?></td>
					<td align="right"><?php echo number_format($awal_kredit,2,'.',','); ?></td>	
					
					<td align="right"><?php echo number_format($mutasi_debet,2,'.',','); ?></td>
					<td align="right"><?php echo number_format($mutasi_kredit,2,'.',','); ?></td>	
					
					<td align="right"><?php echo number_format($sisa_debet,2,'.',','); ?></td>
					<td align="right"><?php echo number_format($sisa_kredit,2,'.',','); ?></td>					
				</tr>
				<?php
			}
			?>
			<tr>
				<td colspan="2"><div align="center"><strong>TOTAL TRANSAKSI</strong></div></td>
				<td><div align="right"><strong><?php echo number_format($total['tot_awal_debet'],2,'.',','); ?></strong></div></td><td><div align="right"><strong><?php echo number_format($total['tot_awal_kredit'],2,'.',','); ?></strong></div></td>
				<td><div align="right"><strong><?php echo number_format($total['tot_mut_debet'],2,'.',','); ?></strong></div></td><td><div align="right"><strong><?php echo number_format($total['tot_mut_kredit'],2,'.',','); ?></strong></div></td>
				<td><div align="right"><strong><?php echo number_format($total['tot_sisa_debet'],2,'.',','); ?></strong></div></td>
				<td><div align="right"><strong><?php echo number_format($total['tot_sisa_kredit'],2,'.',','); ?></strong></div></td>
			</tr>
			</table>
			</p>
	</div>
	</div>

							 </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
  
                </section><!-- /.content -->
        
