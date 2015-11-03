<?php
session_start();
include "../../inc/config.php";
session_check_adm();
switch ($_GET["act"]) {
	case 'reset':
	$data = array('password'=>md5($_POST['password_baru']));
			$up = $db->update("sys_users",$data,"id",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
	case "in":
		$data = array('username'=>$_POST['username']);
	$check = $db->check_exist('sys_users',$data);
		if ($check==true) {
			echo "false";
			exit();
		}

	$data = array("first_name"=>$_POST["first_name"],"last_name"=>$_POST["last_name"],"username"=>$_POST["username"],"password"=>md5($_POST["password_baru"]),"email"=>$_POST["email"],"id_group"=>$_POST["id_group"],"state_id"=>$_POST["state_id"],"date_created"=>date('Y-m-d'),"outlet"=>$_POST["outlet"]);
  

                    if (!preg_match("/.(jpg|jpeg)$/i", $_FILES["foto_user"]["name"]) ) {

							echo "pastikan file yang anda pilih png|jpg|jpeg|gif";

							exit();

						} else {
						$filename = $_FILES["foto_user"]["name"];
						$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
						$ex = explode(".", $filename); // split filename
						$fileExt = end($ex); // ekstensi akhir
						 $filename = time().rand().".".$fileExt;//rename nama file';
$db->compressImage($_FILES["foto_user"]["type"],$_FILES["foto_user"]["tmp_name"],"../../assets/profil_foto/",$filename,200,200);
$foto_user = array("foto_user"=>$filename);
							$data = array_merge($data,$foto_user);

						}
  
		$in = $db->insert("sys_users",$data);
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
		$db->deleteDirectory("../../assets/profil_foto/".$db->fetch_single_row("sys_users","id",$_POST["id"])->foto_user);
		$db->delete("sys_users","id",$_GET["id"]);
		break;
	case "up":
	 $data = array("first_name"=>$_POST["first_name"],"last_name"=>$_POST["last_name"],"email"=>$_POST["email"],"id_group"=>$_POST["id_group"],"state_id"=>$_POST["state_id"],"outlet"=>$_POST["outlet"],);

	if(isset($_FILES["foto_user"]["name"])) {
                        if (!preg_match("/.(jpg|jpeg)$/i", $_FILES["foto_user"]["name"]) ) {

							echo "pastikan file yang anda pilih gambar";
							exit();

						} else {
						$filename = $_FILES["foto_user"]["name"];
						$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
						$ex = explode(".", $filename); // split filename
						$fileExt = end($ex); // ekstensi akhir
						 $filename = time().rand().".".$fileExt;//rename nama file';
$db->compressImage($_FILES["foto_user"]["type"],$_FILES["foto_user"]["tmp_name"],"../../assets/profil_foto/",$filename,200,200);
$db->deleteDirectory("../../assets/profil_foto/".$db->fetch_single_row("sys_users","id",$_POST["id"])->foto_user);
							$foto_user = array("foto_user"=>$filename);
							$data = array_merge($data,$foto_user);
						}

                         }
   

    
		$up = $db->update("sys_users",$data,"id",$_POST["id"]);
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