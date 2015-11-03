
<?php

include "../../inc/config.php";


$tes=$dtable->get("sys_profil_perusahaan", "sys_profil_perusahaan.id", array('sys_profil_perusahaan.NAMA_PERUSAHAAN','sys_profil_perusahaan.EMAIL','sys_profil_perusahaan.PHONE_1','sys_profil_perusahaan.PHONE_2','sys_profil_perusahaan.KOTA','sys_profil_perusahaan.FAXIMILI','sys_profil_perusahaan.ALAMAT','sys_profil_perusahaan.NEGARA','sys_profil_perusahaan.logo','sys_profil_perusahaan.COLOR','sys_state.STATE_NAME',"sys_profil_perusahaan.id")," inner join sys_state on sys_profil_perusahaan.STATE_ID=sys_state.STATE_ID");


?>