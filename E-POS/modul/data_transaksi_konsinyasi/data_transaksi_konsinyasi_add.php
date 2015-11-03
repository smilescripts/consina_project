
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Data Transaksi Konsinyasi
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i>Beranda</a></li>
                        <li><a href="<?=base_index();?>data-transaksi-konsinyasi">Data Transaksi Konsinyasi</a></li>
                        <li class="active">Tambah Data Transaksi Konsinyasi</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Data Transaksi Konsinyasi</h3>
                                   
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/data_transaksi_konsinyasi/data_transaksi_konsinyasi_action.php?act=in">
                      <div class="form-group">
                        <label for="No.Nota Konsinyasi" class="control-label col-lg-2">No.Nota Konsinyasi</label>
                        <div class="col-lg-10">
                          <input type="text" name="NO_NOTA_KONSINYASI" placeholder="No.Nota Konsinyasi" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tanggal" class="control-label col-lg-2">Tanggal</label>
                        <div class="col-lg-10">
                          <input type="text" name="TANGGAL" placeholder="Tanggal" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Kasir" class="control-label col-lg-2">Kasir</label>
                        <div class="col-lg-10">
                          <input type="text" name="OPERATOR_KASIR" placeholder="Kasir" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Total" class="control-label col-lg-2">Total</label>
                        <div class="col-lg-10">
                          <input type="text" name="SUB_TOTAL_PENJUALAN" placeholder="Total" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tipe Pembayaran" class="control-label col-lg-2">Tipe Pembayaran</label>
                        <div class="col-lg-10">
                          <input type="text" name="TIPE_PEMBAYARAN" placeholder="Tipe Pembayaran" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Diskon Transaksi" class="control-label col-lg-2">Diskon Transaksi</label>
                        <div class="col-lg-10">
                          <input type="text" name="DISKON_PENJUALAN" placeholder="Diskon Transaksi" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Dibayar" class="control-label col-lg-2">Dibayar</label>
                        <div class="col-lg-10">
                          <input type="text" name="UANG_BAYAR" placeholder="Dibayar" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Sisa" class="control-label col-lg-2">Sisa</label>
                        <div class="col-lg-10">
                          <input type="text" name="UANG_KEMBALI" placeholder="Sisa" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Catatan" class="control-label col-lg-2">Catatan</label>
                        <div class="col-lg-10">
                          <input type="text" name="CATATAN" placeholder="Catatan" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Outlet" class="control-label col-lg-2">Outlet</label>
                        <div class="col-lg-10">
                          <input type="text" name="OUTLET" placeholder="Outlet" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Jatuh Tempo" class="control-label col-lg-2">Jatuh Tempo</label>
                        <div class="col-lg-10">
                          <input type="text" name="JATUH_TEMPO" placeholder="Jatuh Tempo" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Biaya Kirim" class="control-label col-lg-2">Biaya Kirim</label>
                        <div class="col-lg-10">
                          <input type="text" name="BIAYA_KIRIM" placeholder="Biaya Kirim" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="Simpan"> &nbsp;
						   <a href="<?=base_index();?>data-transaksi-konsinyasi" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i>Kembali</a>
						  
                        </div>
                      </div><!-- /.form-group -->
                    </form>

          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            