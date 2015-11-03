
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_inventarisasi", "as_inventarisasi.kode_inventarisasi", array('as_aset.nm_barang','as_cabang.nm_cabang','as_unit_kerja.nm_unit','as_ruangan.nm_ruangan','SUM(as_inventarisasi.jumlah)',"as_inventarisasi.kode_inventarisasi")," inner join as_aset on as_inventarisasi.kode_barang=as_aset.kode_barang inner join as_cabang on as_inventarisasi.kode_cabang=as_cabang.kode_cabang inner join as_unit_kerja on as_inventarisasi.kode_unit=as_unit_kerja.kode_unit inner join as_ruangan on as_inventarisasi.kode_ruangan=as_ruangan.kode_ruangan group by as_inventarisasi.kode_barang,as_inventarisasi.kode_cabang,as_inventarisasi.kode_ruangan,as_inventarisasi.kode_unit");


?>