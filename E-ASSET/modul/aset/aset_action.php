<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
	
	$iduser=$_SESSION['id_user'];
	$noUser=sprintf("%03s", $iduser);
	$query = "SELECT MAX(kode_barang) as max FROM as_aset where  SUBSTRING(`kode_barang`,4,3)='$noUser'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$kodeBarang = $data['max'];
		$noUrut = (int) substr($kodeBarang, 7, 10);
		$noUrut++;
		$char = "AST";
		$newID = $char . $noUser . sprintf("%04s", $noUrut);
	
  if (!is_dir("../../../upload/aset")) {
							mkdir("../../../upload/aset");
						}
  
  if(isset($_FILES["poto"]["name"])) {
		$ext = pathinfo($_FILES["poto"]["name"], PATHINFO_EXTENSION);
		$newname=$newID.".".$ext;
	}
	
	$data = array("kode_barang"=>$newID,"nm_barang"=>$_POST["nm_barang"],"kode_golongan"=>$_POST["kode_golongan"],"sub_golongan"=>$_POST["sub_golongan"],"merk"=>$_POST["merk"],"tipe"=>$_POST["tipe"],"tahun"=>$_POST["tahun"],"volume"=>$_POST["volume"],"tgl_entry"=>$_POST["tgl_entry"],"user_posting"=>$_POST["user_posting"],"total_unit"=>$_POST["total_unit"],"masa_servis"=>$_POST["masa_servis"],);
					
					if(isset($_FILES["poto"]["name"])) {
                    if (!preg_match("/.(jpg|png)$/i", $_FILES["poto"]["name"]) ) {

							echo "pastikan file yang anda pilih jpg|png";
							exit();

						} else {
							$ext = pathinfo($_FILES["poto"]["name"], PATHINFO_EXTENSION);
							move_uploaded_file($_FILES["poto"]["tmp_name"], "../../../upload/aset/".$newname);
							$poto = array("poto"=>$newname);
							$data = array_merge($data,$poto);
						}
					}
  
  
   
		$in = $db->insert("as_aset",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    $db->deleteDirectory("../../../upload/aset/".$db->fetch_single_row("as_aset","kode_barang",$_POST["id"])->poto);
		$db->delete("as_aset","kode_barang",$_GET["id"]);
		break;
	case "up":
	 if (!is_dir("../../../upload/aset")) {
							mkdir("../../../upload/aset");
						}
	if(isset($_FILES["poto"]["name"])) {
		$ext = pathinfo($_FILES["poto"]["name"], PATHINFO_EXTENSION);
		$newname=$_POST["id"].".".$ext;
	}
	 $data = array("nm_barang"=>$_POST["nm_barang"],"kode_golongan"=>$_POST["kode_golongan"],"sub_golongan"=>$_POST["sub_golongan"],"merk"=>$_POST["merk"],"tipe"=>$_POST["tipe"],"tahun"=>$_POST["tahun"],"volume"=>$_POST["volume"],"tgl_entry"=>$_POST["tgl_entry"],"user_posting"=>$_POST["user_posting"],"total_unit"=>$_POST["total_unit"],"masa_servis"=>$_POST["masa_servis"],);
   
                         if(isset($_FILES["poto"]["name"])) {
                        if (!preg_match("/.(jpg|png)$/i", $_FILES["poto"]["name"]) ) {

							echo "pastikan file yang anda pilih jpg|png";
							exit();

						} else {
							
							$db->deleteDirectory("../../../upload/aset/".$db->fetch_single_row("as_aset","kode_barang",$_POST["id"])->poto);
							move_uploaded_file($_FILES["poto"]["tmp_name"], "../../../upload/aset/".$newname);
							$poto = array("poto"=>$newname);
							$data = array_merge($data,$poto);
						}

                         }
   
   

    
		$up = $db->update("as_aset",$data,"kode_barang",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
	default:
		# code...
		break;
}

?>