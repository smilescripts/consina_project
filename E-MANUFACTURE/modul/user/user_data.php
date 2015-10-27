
<?php

include "../../inc/config.php";


$tes=$dtable->get("sys_pelanggan", "sys_pelanggan.KODE_PELANGGAN", array('sys_pelanggan.NAMA_PELANGGAN','sys_pelanggan.NO_TELEPON','sys_pelanggan.TANGGAL_TERDAFTAR','sys_pelanggan.ALAMAT','sys_pelanggan.STATUS_AKTIF','sys_pelanggan.DISKON_BELANJA',"sys_pelanggan.KODE_PELANGGAN"),"");


?>