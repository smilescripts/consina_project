<?php
    include_once "../../include/koneksi.php";
    session_start();
	$profil=mysql_fetch_object(mysql_query("SELECT * FROM profil_perusahaan"));
	include "../../include/catat.php";
	$user=$_SESSION['KODE_PETUGAS'];
	$aksi="Mengakses halaman master pemulihan basis data";
	catat($user,$aksi);
?>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "sDom": '<"top"Cflt<"clear">>rt<"bottom"ip<"clear">>',
        });
    });
</script>

<ol class="breadcrumb">
  <li><a href="#" id="beranda" class="beranda"><span class="glyphicon glyphicon-home"> Beranda</a></li>
  <li class="active"><span class="glyphicon glyphicon-user"></li>
</ol>



<div class="panel panel-warning">
  <h1 class="headingtable" style="margin-top:0px" ><span>Pemulihan</span> Basis Data</h1>
    <div class="btnbantuan" style="margin-top:-55px;">
						 <a href="#dialog-restore" id="0" class="btn tambah-restore btn-danger" data-toggle="modal" >Pulihkan Data</a> 
							</div>
    <div class="panel-body">
	
	
		<div class="well">
            <div id="data-restore"></div>
		</div>
    </div>
</div>

<div class="modal fade" id="dialog-restore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 id="myModalLabel">Form Data restore</h3>
      </div>
      <div id="isiForm" class="isiForm"></div>
    </div>
  </div>
</div>
<script>var logo='<?php echo $profil->logo; ?>';</script>
<script src="crud/restore/aplikasi.js"></script>

           