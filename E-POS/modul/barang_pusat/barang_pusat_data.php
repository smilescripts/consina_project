
<?php

include "../../inc/config.php";


$tes=$dtable->get("barang_pusat", "barang_pusat.ID_BARANG", array('barang_pusat.KODE_BARANG','barang_pusat.BARCODE','barang_pusat.NAMA_BARANG','barang_pusat.HARGA_JUAL','barang_pusat.STOK','kategori.NAMA_KATEGORI','satuan_barang.NAMA_SATUAN',"barang_pusat.ID_BARANG")," inner join kategori on barang_pusat.ID_KATEGORI=kategori.ID_KATEGORI inner join satuan_barang on barang_pusat.ID_SATUAN=satuan_barang.KODE_SATUAN");


?>