	    <!-- date picker -->
    <link href="<?=base_admin();?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<section class="content-header">
                    <h1>
                     &nbsp;
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Home</a></li>
                        <li><a href="<?=base_index();?>laporan">Laporan Divisi Produksi</a></li>
                        <li class="active"></li>
                    </ol>
                </section>

                <!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Laporan Divisi Produksi</h3>
                                   
                                 </div>

                  <div class="box-body">

<div class="panel panel-warning">
   <h1 class="headingtable" style="margin-top:0px" ></h1>
	
    <div class="panel-body">
		<div class="well">
            <form class="form-horizontal laporan_gajiForm" id="laporan_gajiForm" action="<?=base_index();?>laporan-produksi/tambah" method="POST">
                <div class="form-group">
                    <label for="AWAL" class="col-sm-1 control-label">&nbsp;</label>
                    <div class="col-sm-3">
                        <div class="input-group date" id="datePicker1">
                            <input type="text" class="form-control" id="AWAL" name="AWAL" placeholder="Periode Awal"  required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group date" id="datePicker">
                            <input type="text" class="form-control" id="AKHIR" name="AKHIR" placeholder="Periode Akhir"  required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>

					<div class="col-sm-3">

						<select id="jenis" name="jenis" class="form-control" required> 
                        <option value="">&bull; &nbsp; Pilih Jenis Laporan</option>
                        <option value="Laporan Terima Bahan Masuk">&bull; &nbsp; Laporan Terima Bahan Masuk</option>
                        <option value="Laporan Produksi Barang">&bull; &nbsp; Laporan Produksi Barang</option>
                        <option value="Laporan Mutasi Barang">&bull; &nbsp; Laporan Mutasi Barang</option>
						  
						</select>

				
                    </div>
                    <button type="submit"  class="btn btn-success">Tampil</button>
                </div>
            </form>
			
	
			<script type="text/javascript">
				$(document).ready(function() {
					$('#datePicker').datepicker({
						format: "yyyy-m-d",
						minViewMode: 4,
						orientation: "top center",
						autoclose: true
					});
					$('#datePicker1').datepicker({
						format: "yyyy-m-d",
						minViewMode: 4,
						orientation: "top center",
						autoclose: true
					});
				});
			</script>
  
		</div>
		</div>
	</div>
	</div>
</div>
</section>
    <!-- date-picker -->
        <script src="<?=base_admin();?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
		<!-- datepicker -->
    <script src="<?=base_admin();?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
