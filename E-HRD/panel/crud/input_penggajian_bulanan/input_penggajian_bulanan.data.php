<?php
    include_once "../../include/koneksi.php";
    session_start();
?>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "sDom": 'C<"top"flt>rt<"bottom"ip><"clear">',
        });
    });
</script>

<div class="table-responsive">
    <table id="example" class="table table-bordered">
	<thead>
            <tr>
		<th>No</th>
		<th>Foto</th>
		<th>NIP</th>
		<th>Nama</th>
		<th>Jabatan</th>
		<th>Departemen</th>
		<th>Telepon</th>
		<th>Aksi</th>
            </tr>
	</thead>
	<tbody>
	<?php
            $querypetugas=mysql_query("SELECT * FROM pegawai") or die (mysql_error());
            $no = 1;
            while($objectdata=mysql_fetch_object($querypetugas)){
                $queryjabatan=mysql_query("SELECT * FROM jabatan WHERE KODE_JABATAN=".$objectdata->KODE_JABATAN) or die (mysql_error());
                $tampiljabatan=mysql_fetch_object($queryjabatan);
                $querydepartemen=mysql_query("SELECT * FROM departemen WHERE KODE_DEPARTEMEN=".$objectdata->KODE_DEPARTEMEN) or die (mysql_error());
                $tampildepartemen=mysql_fetch_object($querydepartemen);
                echo'
            <tr>
		<td>'.$no.'</td>
		<td>';
                if($objectdata->FOTO_PEGAWAI!=""){
                    echo '<img src="foto/pegawai/'.$objectdata->FOTO_PEGAWAI.'" style="width:50px">';
                }else{
                    echo '<img src="user.png" style="width:50px">';
                }
                echo '
                </td>
		<td>'.$objectdata->NIP_PEGAWAI.'</td>
		<td>'.$objectdata->NAMA_PEGAWAI.'</td>
		<td>'.$tampiljabatan->NAMA_JABATAN.'</td>
		<td>'.$tampildepartemen->NAMA_DEPARTEMEN.'</td>
		<td>'.$objectdata->NOMOR_TELEPON.'</td>
		<td>
                    <a href="#dialog-pegawai" id="'.$objectdata->KODE_PEGAWAI.'" alt="Ubah" title="Ubah" class="glyphicon ubah-pegawai glyphicon-edit" data-toggle="modal"></a>&nbsp; 
                    <a href="#" id="'.$objectdata->KODE_PEGAWAI.'" alt="Hapus" title="Hapus" class="glyphicon hapus-pegawai glyphicon-trash"></a>
		</td>
            </tr>';
		$no++;
            }
	?>
	</tbody>
    </table>
</div>

