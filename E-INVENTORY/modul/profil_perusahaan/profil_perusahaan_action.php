<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "up":
	 $data = array("NAMA_PERUSAHAAN"=>$_POST["NAMA_PERUSAHAAN"],"EMAIL"=>$_POST["EMAIL"],"PHONE_1"=>$_POST["PHONE_1"],"PHONE_2"=>$_POST["PHONE_2"],"KOTA"=>$_POST["KOTA"],"FAXIMILI"=>$_POST["FAXIMILI"],"ALAMAT"=>$_POST["ALAMAT"],"NEGARA"=>$_POST["NEGARA"],"STATE_ID"=>$_POST["STATE_ID"],"COLOR"=>$_POST["COLOR"],);
   
                         if(isset($_FILES["logo"]["name"])) {
                        if (!preg_match("/.(jpg|png|gif|jpeg|bmp)$/i", $_FILES["logo"]["name"]) ) {

							echo "pastikan file yang anda pilih jpg|png|gif|jpeg|bmp";
							exit();

						} else {
							$filename = $_FILES["logo"]["name"];
							$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
							$ex = explode(".", $filename); // split filename
							$fileExt = end($ex); // ekstensi akhir
							 $filename = "logo.".$fileExt;//rename nama file';
							$db->deleteDirectory("../../".$db->fetch_single_row("sys_profil_perusahaan","id",$_POST["id"])->logo);
							move_uploaded_file($_FILES["logo"]["tmp_name"], "../../".$filename);
							$logo = array("logo"=>$filename);
							$data = array_merge($data,$logo);
						}

                         }
   
   

    
		$up = $db->update("sys_profil_perusahaan",$data,"id",$_POST["id"]);
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