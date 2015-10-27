<?php
  
		include_once "config.php";
		if(isset($_POST['queryString'])) {
			$queryString = $_POST['queryString'];
			
			if(strlen($queryString) >0) {

				$query = mysql_query("SELECT nama_rekening,kode_rekening FROM tabel_master WHERE kode_rekening LIKE '$queryString%'");
				
				if($query) {
				echo '<ul>';
					while ($result = mysql_fetch_object($query)) {
	         			echo '<li onClick="fill(\''.addslashes($result->nama_rekening).'\'); fill2(\''.addslashes($result->kode_rekening).'\');">'.$result->kode_rekening.'&nbsp;&nbsp;'.$result->nama_rekening.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}

?>