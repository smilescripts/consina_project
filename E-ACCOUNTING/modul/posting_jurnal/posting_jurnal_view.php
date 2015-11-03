
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kelola Posting Jurnal
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="glyphicon glyphicon-home"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>posting-jurnal">Posting Jurnal</a></li>
                        <li class="active">Daftar Posting Jurnal</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <h1 class="headingtable"><span>Posting Jurnal</span></h1>
							
                                <div class="box-body table-responsive">
								
	<div class="post">
	<div class="entry">
			<p>
		<table class="table table-bordered" border="1">
		<tr>
			<th>Tanggal</th><th>Kode Rekening</th><th>Keterangan</th><th>Debet</th><th>Kredit</th><th>Keterangan</th>
		</tr>
		<?php
		$query_transaksi=mysql_query("select * from tabel_transaksi order by tanggal_transaksi asc");
		while($row_tran=mysql_fetch_array($query_transaksi)){
			$debet=$row_tran['debet'];
			$kredit=$row_tran['kredit'];
			
			?>
			<tr>
				<td><div align="center"><?php echo $row_tran['tanggal_transaksi'];?></div></td>
				<td><div align="center"><?php echo $row_tran['kode_rekening'];?></div></td>
				<td><?php echo $row_tran['keterangan_transaksi'];?></td>
				<td align="right"><?php echo number_format($debet,2,'.',','); ?></td>
				<td align="right"><?php echo number_format($kredit,2,'.',','); ?></td>
				<td align="center"><?php echo $row_tran['keterangan_posting'];?></td>
			</tr>
			<?php
		}
		?>
		</table>
		</p>
	</div>
	</div>



	<div class="post">
	<div class="entry">
		<p>
		<table border="0" align="center">
		<tr>
			<td width="72" align="center">
			<!---untuk mengakhiri posting dan memberi tanda posting-->
			<?php 
			$cek=mysql_query("select * from tabel_transaksi where keterangan_posting=''");
			$cek_posting=mysql_num_rows($cek);
			if($cek_posting!==0){
				?>
				<form action="<?=base_index();?>posting-jurnal" method="post" name="postform">
				<input type="submit" onclick="return confirm('Apakah Anda Yakin?')" name="posting" value="POSTING JURNAL" class="btn btn-primary btn-flat" />
				</form>
			<?php
			}
			?>
		  </td>
		</tr>
		<tr>
			<td width="601" align="center">
			<font face="verdana" color="#666666">
			<?php
			//untuk mendecode url yang di enrypsi
			//$var=decode($_SERVER['REQUEST_URI']);
			//pecahkan nilai array
			if(isset($_GET['status'])){
				echo $page=$_GET['status'];
			}
			?>
			</font>			
			</td>
		</tr>
		</table>
		</p>
	</div>
	</div>

	
	<?php
	if(isset($_POST['posting'])){
	
		///////////////////////// HITUNG MUTASI /////////////////////
		$query_hitung_mutasi=mysql_query("select kode_rekening from tabel_transaksi where keterangan_posting=''");
		while($row_hit_mut=mysql_fetch_array($query_hitung_mutasi)){
			$kode_rekening=$row_hit_mut['kode_rekening'];	
			$update_mutasi=mysql_query("update tabel_master set mut_debet=mut_debet+(SELECT debet FROM tabel_transaksi WHERE kode_rekening ='$kode_rekening' and keterangan_posting=''), mut_kredit=mut_kredit+(SELECT kredit FROM tabel_transaksi WHERE kode_rekening ='$kode_rekening' and keterangan_posting='') where kode_rekening='$kode_rekening'");
		}
		
		
		if($query_hitung_mutasi){
			$query_hitung_sisa=mysql_query("select  * from tabel_master");
			
			while($row_hit_sisa=mysql_fetch_array($query_hitung_sisa)){
			
				$normal=$row_hit_sisa['normal'];
				$kode_rekening=$row_hit_sisa['kode_rekening'];
				
				$awal_debet=$row_hit_sisa['awal_debet'];
				$awal_kredit=$row_hit_sisa['awal_kredit'];
				
				$mutasi_debet=$row_hit_sisa['mut_debet'];
				$mutasi_kredit=$row_hit_sisa['mut_kredit'];
					
			
				if($normal=="debet"){
					$hitung_sisa_debet=($awal_debet+$mutasi_debet)-$mutasi_kredit;
					
					if($hitung_sisa_debet<0){
						$positif_sisa_kredit=abs($hitung_sisa_debet);
						$update_mutasi=mysql_query("update tabel_master set sisa_debet=0, sisa_kredit='$positif_sisa_kredit' where kode_rekening='$kode_rekening'");
					}else{
						$update_mutasi=mysql_query("update tabel_master set sisa_debet='$hitung_sisa_debet', sisa_kredit='0' where kode_rekening='$kode_rekening'");
					}	
								
				}
				
				if($normal=="kredit"){
					$hitung_sisa_kredit=($awal_kredit-$mutasi_debet)+$mutasi_kredit;
					
					if($hitung_sisa_kredit<0){
						$positif_sisa_debet=abs($hitung_sisa_kredit);
						$update_mutasi=mysql_query("update tabel_master set sisa_debet='$positif_sisa_debet', sisa_kredit='0' where kode_rekening='$kode_rekening'");
					}else{
						$update_mutasi=mysql_query("update tabel_master set sisa_debet=0, sisa_kredit='$hitung_sisa_kredit' where kode_rekening='$kode_rekening'");
					}		
				}
			}
		}
		
		
		////////////////////////// UBAH STATUS POSTING //////////////////////////////
		$selesai=mysql_query("update tabel_transaksi set tanggal_posting='$tanggal', keterangan_posting='Post' where keterangan_posting=''");
		
		if($selesai){
			?><script language="javascript">document.location.href="<?=base_index();?>posting-jurnal"</script><?php
		}else{
			echo mysql_error();
		} 
		
							
	}else{
		unset($_POST['posting']);
	}
	?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
     
                </section><!-- /.content -->
        
