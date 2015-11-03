
<?php

include "../../inc/config.php";


$tes=$dtable->get("jenis_barang", "jenis_barang.ID", array('jenis_barang.KODE_JENIS','jenis_barang.NAMA_JENIS','jenis_barang.KETERANGAN','kategori.NAMA_KATEGORI',"jenis_barang.ID")," inner join kategori on jenis_barang.KODE_GOLONGAN=kategori.KODE_KATEGORI");


?>