<style>
body {
  background: rgb(204,204,204); 
}
page[size="A4"] {
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
@media print {
  body, page[size="A4"] {
    margin: 0;
    box-shadow: 0;
  }
}
</style>
<body>

<?php 
include "config.php";	
$BARCODE=$_GET["barcode"];
$JUMLAH=$_GET["jumlah"];
$HARGA = $db->fetch_single_row("barang_pusat","KODE_BARANG",$BARCODE);	 
?>
<page size="A4">	

                  <?php 
				  for($cetak=0;$cetak<$JUMLAH;$cetak++){
					  
					echo '
				
					
					<img style="padding-top:10px;padding-left:20px" src="barcode.php?codetype=Code128&size=40&text='.$BARCODE.'"/>
					
				
				
					';  
					  
					  
				  }
				  
				  ?>
			
	
</page>



</body>