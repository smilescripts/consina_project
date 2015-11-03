
                <!-- Content Header (Page header) -->
                <section class="content-header">
                   
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>setup-perkiraan">Setup Perkiraan</a></li>
                        <li class="active">Daftar Setup Perkiraan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               <h1 class="headingtable"><span>Account Receivable</span></h1>
							
							<?php 
								 foreach ($db->fetch_all("sys_menu") as $isi) {
							if ($path_url==$isi->url) {
							if ($role_act["insert_act"]=="Y") {
							?>
						
							<div class="btnbantuan" style="margin-top: -55px;">
							<a href="<?=base_index();?>setup-perkiraan/tambah" style="border-radius:20px" class="btn btn-primary btn-flat"><i class="glyphicon glyphicon-plus-sign"></i>Tambah</a>
							</div>
                            <?php
                            } 
							} 
							}
							?>
                                <div class="box-body table-responsive">
                              <table class="table table-bordered">
			<tr>
				<th>Kode Rekening</th><th>Nama Rekening</th><th>Awal Debet</th><th>Awal Kredit</th><th>Posisi</th><th>Normal</th>
			</tr>
			<?php
			$total=mysql_fetch_array(mysql_query("select sum(awal_debet) as tot_awal_debet,sum(awal_kredit) as tot_awal_kredit from tabel_master order by kode_rekening asc"));
			$query=mysql_query("select * from tabel_master order by kode_rekening asc");
			while($row=mysql_fetch_array($query)){
				?>
				<tr>
					<td align="center"><?php echo $row['kode_rekening'];?></td><td><?php echo $row['nama_rekening'];?></td>
					<td align="right"><?php echo $row['awal_debet'];?></td><td align="right"><?php echo $row['awal_kredit'];?></td>
					<td><?php echo $row['posisi'];?></td><td><?php echo $row['normal'];?></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td colspan="2" align="center"><strong>JUMLAH</strong></td>
				<td align="right"><strong><?php echo number_format($total['tot_awal_debet'],2,'.',','); ?></strong></td>
				<td align="right"><strong><?php echo number_format($total['tot_awal_kredit'],2,'.',','); ?></strong></td>
				<td colspan="2" align="center">
				<?php
				//untuk menghitung balance
				if(!empty($total['tot_awal_debet']) || !empty($total['tot_awal_kredit'])){
					if($total['tot_awal_debet']==$total['tot_awal_kredit']){
						echo "<font color='#0033FF'>Balance</font>";
					}else{
						echo "<font color=red>Not Balance : ".abs($total['tot_awal_debet']-$total['tot_awal_kredit'])."</font>";
					}
				}
				?>
				</td>
			</tr>
			</table>
			  </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
      
                </section><!-- /.content -->
        
