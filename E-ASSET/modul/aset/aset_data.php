
<?php

include "../../inc/config.php";


$tes=$dtable->get("as_aset", "as_aset.kode_barang", array('as_aset.kode_barang','as_aset.nm_barang','as_aset.merk','as_aset.tipe','as_aset.tahun','as_golongan.nm_golongan','as_subgolongan.nm_subgolongan',"as_aset.kode_barang")," inner join as_golongan on as_aset.kode_golongan=as_golongan.kode_golongan inner join as_subgolongan on as_aset.sub_golongan=as_subgolongan.sub_golongan");


?>