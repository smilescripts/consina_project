<?php
    include_once "../../include/koneksi.php";
    session_start();
	$profil=mysql_fetch_object(mysql_query("SELECT * FROM profil_perusahaan"));
	include "../../include/catat.php";
	$user=$_SESSION['KODE_PETUGAS'];
	$aksi="Mengakses halaman Sinkronisasi Absen Mesin";
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
  <li class="active"><span class="glyphicon glyphicon-user"> Sinkronisasi</li>
</ol>

<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Sinkronisasi Absen Mesin</h3>
    </div>
    <div class="panel-body">
		
		
		<form style="margin-top:20px;" class="form-inline syncAllForm" id="syncAllForm" action="modul/mod_sync_absen/syncAll.php" type="POST">
				 <div class="col-sm-6">
                       <div class="input-daterange input-group" id="datepicker">
							<input type="text" class="input-sm form-control" id="startall" name="startall" readonly />
							<span class="input-group-addon">to</span>
							<input type="text" class="input-sm form-control" id="endall" name="endall" readonly />
						</div>
                    </div>
				<button type="submit" class="btn btn-success">Proses Semua Mesin</button>
		</form>
		<audio id="audio">
    <source src="sound/pleasewait.mp3" type="audio/mp3" />
</audio>
<audio id="audiofail">
    <source src="sound/fail.mp3" type="audio/mp3" />
</audio>
<audio id="audiosucces">
    <source src="sound/succes.mp3" type="audio/mp3" />
</audio>
		<script type="text/javascript">
			var audio = document.getElementById('audio');
	var audiofail = document.getElementById('audiofail');
	var audiosucces = document.getElementById('audiosucces');
			$(document).ready(function() {
				$('#datepicker').datepicker({
						format: "yyyy-mm-dd",
						orientation: "top right",
						autoclose: true,
						todayHighlight: true
					}).on('changeDate', function(e) {
						// Revalidate the date field
						$('#syncAllForm').formValidation('revalidateField', 'endall');
					});
				$('#syncAllForm')
			
				.on('success.form.fv', function(e) {
					e.preventDefault();
					var $form = $(e.target),
						fv    = $form.data('formValidation');

					$.ajax({
						url: $form.attr('action'),
						type: 'POST',
						data: $form.serialize(),
						beforeSend: function(){
						audio.play();
						$('#tutor').hide();
						$('#loadingDiv').show();
						$('#penggajian_berhasil').hide();
						$('#penggajian_gagal').hide();
						},
						success: function(html) {
							$('#loadingDiv').hide(0);
							audiosucces.play();
							$('#penggajian_berhasil').show();
							$(".data-sync").html(html).show();
						}
					});
				})
				.on('init.field.fv', function(e, data) {

					var $icon      = data.element.data('fv.icon'),
						options    = data.fv.getOptions(), 
						validators = data.fv.getOptions(data.field).validators; 

					if (validators.notEmpty && options.icon && options.icon.required) {
						$icon.addClass(options.icon.required).show();
					}
				})
				.formValidation({
					message: 'This value is not valid',
					icon: {
						required: 'glyphicon glyphicon-asterisk',
						valid: 'glyphicon glyphicon-ok',
						invalid: 'glyphicon glyphicon-remove',
						validating: 'glyphicon glyphicon-refresh'
					},
					fields: {
						endall: {
							validators: {
								notEmpty: {
									message: 'The is required'
								}
							}
						},
					}
				})
				.on('success.field.fv', function(e, data) {
					if (data.fv.getSubmitButton()) {
						data.fv.disableSubmitButtons(false);
					}
				});
			});
		</script>
		
    </div>
</div>

<div id="data-sync" class="data-sync"></div>
<center>
		<div id="penggajian_berhasil" style="display:none" >
		<div class="alert alert-success" role="alert"><h3 ><b>Proses Singkronisasi Absen Berhasil</b></h3></div>
		</div>
		
		<div id="loadingDiv" style="display:none" >
		<p><b>Proses Singkronisasi Absen Sedang Berlangsung Mohon Tunggu</b></p>
		<img src='img/gif-load.gif'/>
		<p><div class="alert alert-danger" role="alert"><b><span class="glyphicon glyphicon-alert"></span>&nbsp;Peringatan:Jangan Tutup Browser Selama Proses Singkronisasi Absen Sedang Berlangsung&nbsp;<span class="glyphicon glyphicon-alert"></span></b></div></p>
		</div> 
		</center>