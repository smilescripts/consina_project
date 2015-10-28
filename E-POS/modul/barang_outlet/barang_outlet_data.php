
<?php
session_start();
include "../../inc/config.php";
$GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLET=$GETUSER->KODE_OUTLET;
$NAMA_OUTLET=$GETUSER->NAMA_OUTLET;
$LOKASI=$GETUSER->LOKASI;

<<<<<<< HEAD
$tes=$dtable->get("barang_outlet", "barang_outlet.KODE_BARANG", array('barang_outlet.KODE_BARANG','barang_outlet.BARCODE','barang_outlet.NAMA_BARANG','barang_outlet.HARGA_JUAL','barang_outlet.STOK','kategori.NAMA_KATEGORI','satuan_barang.NAMA_SATUAN',"barang_outlet.KODE_BARANG")," inner join kategori on barang_outlet.ID_KATEGORI=kategori.ID_KATEGORI inner join satuan_barang on barang_outlet.ID_SATUAN=satuan_barang.KODE_SATUAN where barang_outlet.OUTLET='$KODEOUTLET'");
=======
$tes=$dtable->get("barang_outlet", "barang_outlet.KODE_BARANG", array('barang_outlet.KODE_BARANG','barang_outlet.BARCODE','barang_outlet.NAMA_BARANG','barang_outlet.WARNA','barang_outlet.UKURAN','barang_outlet.HARGA_JUAL','barang_outlet.STOK_MINIMAL','barang_outlet.STOK','kategori.NAMA_KATEGORI','satuan_barang.NAMA_SATUAN',"barang_outlet.KODE_BARANG")," inner join kategori on barang_outlet.ID_KATEGORI=kategori.ID_KATEGORI inner join satuan_barang on barang_outlet.ID_SATUAN=satuan_barang.KODE_SATUAN where barang_outlet.OUTLET='$KODEOUTLET'");
>>>>>>> origin/master


?>