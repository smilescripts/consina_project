<?php
session_start();
error_reporting(0);
include "../../inc/config.php";
session_check();
$GETUSER = $db->fetch_single_row("outlet","KODE_OUTLET",$_SESSION["OUTLET_KODE"]);
$KODEOUTLET=$GETUSER->KODE_OUTLET;
$NAMA_OUTLET=$GETUSER->NAMA_OUTLET;
$LOKASI=$GETUSER->LOKASI;
$NAMALOKASI = $db->fetch_single_row("sys_state","STATE_ID",$LOKASI);
$VNAMALOKASI=$NAMALOKASI->STATE_NAME;
$ALAMAT=$GETUSER->ALAMAT;
$NO_TELEPON=$GETUSER->NO_TELEPON;

$printer = $db->fetch_single_row("printer_config","OUTLET",$KODEOUTLET);
$IP_ADRRESS=$printer->IP_ADRRESS;
$PRINTER_NAME=$printer->PRINTER_NAME;
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"PELANGGAN"=>$_POST["PELANGGAN"],"CATATAN"=>$_POST["CATATAN"],);
  
  
  
   
		$in = $db->insert("penjualan",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
		
		case "simpan_penjualan":
	if($_POST["SUB_TOTAL_PENJUALAN"]==0){
		echo "<script>alert('Belum ada barang yang dipilih');window.location='../../index.php/kasir'</script>";
		
	}
	if($_POST["SUB_TOTAL_PENJUALAN"]!=0){
    $data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"TAX_SALES"=>$_POST["TAX_SALES"],"UANG_BAYAR"=>$_POST["UANG_BAYAR"],"UANG_KEMBALI"=>$_POST["UANG_KEMBALI"],"PELANGGAN"=>$_POST["PELANGGAN"],"CATATAN"=>$_POST["CATATAN"],"STATUS"=>$_POST["STATUS"],"DISKON_PELANGGAN"=>$_POST["DISKON_PELANGGAN"],"NAMA_BANK"=>$_POST["NAMA_BANK"],"NO_KARTU"=>$_POST["NO_KARTU"],"OUTLET"=>$KODEOUTLET,);
    $in_sales = $db->insert("penjualan",$data);
    
			$gettmpjual=$db->fetch_custom("select * from tmp_detail_penjualan where NO_NOTA_PENJUALAN='$_POST[NO_NOTA_PENJUALAN]'");
			foreach ($gettmpjual as $isitmp){
			$tmpinput = array("NO_NOTA_PENJUALAN"=>$isitmp->NO_NOTA_PENJUALAN,"KODE_BARANG"=>$isitmp->KODE_BARANG,"HARGA_BARANG"=>$isitmp->HARGA_BARANG,"DISKON"=>$isitmp->DISKON,"JUMLAH"=>$isitmp->JUMLAH,"GRAND_PRICE"=>$isitmp->GRAND_PRICE,);
			
			$validasistok=mysql_query("select STOK from barang_outlet where KODE_BARANG='$isitmp->KODE_BARANG' and OUTLET='$KODEOUTLET' ");
			$getstok=mysql_fetch_object($validasistok);
			$proseskurang=$getstok->STOK - $isitmp->JUMLAH;
			mysql_query("UPDATE `barang_outlet` SET `STOK` = '$proseskurang' WHERE `KODE_BARANG` = '$isitmp->KODE_BARANG' and OUTLET='$KODEOUTLET' ");
				
			
			$inok = $db->insert("detail_penjualan",$tmpinput);	
			}
			$truncate=$db->fetch_custom("delete from tmp_detail_penjualan where NO_NOTA_PENJUALAN='$_POST[NO_NOTA_PENJUALAN]'");
		if ($in_sales=true) {
			
			
$GETKASIR = $db->fetch_single_row("sys_users","id",$_POST["OPERATOR_KASIR"]);
$KASIR=$GETKASIR->first_name;			
$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
$handle = fopen($file, 'w');
$condensed = Chr(27) . Chr(33) .Chr(4);
$bold1 = Chr(27) . Chr(69);
$bold0 = Chr(27) . Chr(70);
$initialized = chr(27).chr(64);
$condensed1 = chr(15);
$condensed0 = chr(18);
$Data  = $initialized;
$Data .= $condensed1;
$Data .= "".$bold1."    CONSINA ".$NAMA_OUTLET."".$bold0."\n";
$Data .= "        ".$ALAMAT."\n";
$Data .= "          ".$VNAMALOKASI."\n";
$Data .= "=======================================\n";
$Data .= "".$_POST["NO_NOTA_PENJUALAN"]."-".$KASIR."\n";
$Data .= "=======================================\n";
$getitem=$db->fetch_custom("select * from detail_penjualan where NO_NOTA_PENJUALAN='$_POST[NO_NOTA_PENJUALAN]'");
foreach ($getitem as $isiitem){
$tot=$isiitem->HARGA_BARANG * $isiitem->JUMLAH;
$GETBARANG = $db->fetch_single_row("barang_outlet","KODE_BARANG",$isiitem->KODE_BARANG);
$Data .= "".$GETBARANG->NAMA_BARANG."\n";
$Data .= "".$isiitem->HARGA_BARANG."- X".$isiitem->JUMLAH." ".$tot."\n";
}
$Data .= "\n";
$Data .= "Sub-total :Rp.".number_format($_POST["SUB_TOTAL_PENJUALAN"])." \n";
$Data .= "Bayar :Rp.".number_format($_POST["UANG_BAYAR"])." \n";
$Data .= "Kembali:Rp.".number_format($_POST["UANG_KEMBALI"])." \n";
$Data .= "--------------------------------------\n";
$Data .="Tgl ".$_POST["TANGGAL"]."";
$Data .= "\n";
$Data .= "Telp:".$NO_TELEPON." \n";
$Data .= "Fax:".$NO_TELEPON."  \n";
$Data .= "Email:shop@consina-adventure.com \n";
$Data .= "Facebook:Consina The Outdoor Lifestyle\n";
$Data .= "Twitter: @ConsinaShop \n";
$Data .= "Ym:consina_cs_2@yahoo.com\n";
$Data .= "Nikmati kemudahan belanja secara online\n";
$Data .= "shop.consina-adventure.com/\n";
$Data .= "Barang yang sudah dibeli tidak dapat ditukar/\n";
$Data .= "--------------------------\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
fwrite($handle, $Data);
fclose($handle);
copy($file, "//".$IP_ADRRESS."/".$PRINTER_NAME."");  # Lakukan cetak
unlink($file);
echo "<script>alert('Penjualan Berhasil');window.location='../../index.php/kasir'</script>";
		}
		}
		else {
			return false;
		}
		break;
	case "delete":
		$delete=$db->delete("tmp_detail_penjualan","ID_TMP_PENJUALAN",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/kasir');
			
		} else {
			return false; 
		}
		break;
		
		case "batal_penjualan":

			$truncate=$db->fetch_custom("delete from tmp_detail_penjualan where NO_NOTA_PENJUALAN=
			'$_GET[NO_NOTA_PENJUALAN]'");
		if ($in_sales=true) {
			header('location:../../index.php/kasir');
		} else {
			return false;
		}
		break;
	case "delete":
		$delete=$db->delete("tmp_detail_penjualan","ID_TMP_PENJUALAN",$_GET["id"]);
		if ($delete=true) {
			header('location:../../index.php/kasir');
		} else {
			return false; 
		}
		break;
	 case "up":
	 $data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"TANGGAL"=>$_POST["TANGGAL"],"OPERATOR_KASIR"=>$_POST["OPERATOR_KASIR"],"SUB_TOTAL_PENJUALAN"=>$_POST["SUB_TOTAL_PENJUALAN"],"TIPE_PEMBAYARAN"=>$_POST["TIPE_PEMBAYARAN"],"DISKON_PENJUALAN"=>$_POST["DISKON_PENJUALAN"],"PELANGGAN"=>$_POST["PELANGGAN"],"CATATAN"=>$_POST["CATATAN"],);
   
   
   

    
		$up = $db->update("penjualan",$data,"ID_PENJUALAN",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
		
	case "input_scanner":
		$AS=$_POST["KODE_BARANG"];
		/* $ASKODEBARANG = $db->fetch_single_row("barang_outlet","BARCODE",$AS);
		
		$KODE_BARANG=$ASKODEBARANG->KODE_BARANG; */
		$JUMLAH=0;
		$cek=$db->fetch_custom("select * from barang_outlet where BARCODE='$_POST[KODE_BARANG]' and OUTLET='$KODEOUTLET'");
		foreach ($cek as $barang) {
		if($_POST["JUMLAH"]==""){
			$JUMLAH=1;
			}
		if($_POST["JUMLAH"]!=""){
			$JUMLAH=$_POST["JUMLAH"];
		}
		
		$diskon=$barang->DISKON/100 * $barang->HARGA_JUAL;
		$jadi=($barang->HARGA_JUAL-$diskon) * $_POST["JUMLAH"];
		$data = array("NO_NOTA_PENJUALAN"=>$_POST["NO_NOTA_PENJUALAN"],"KODE_BARANG"=>$barang->KODE_BARANG,"HARGA_BARANG"=>$barang->HARGA_JUAL,"DISKON"=>$barang->DISKON,"JUMLAH"=>$JUMLAH,"SESSION_PENJUALAN"=>0,"GRAND_PRICE"=>$jadi,);
		$in = $db->insert("tmp_detail_penjualan",$data);	
		  
		 } 
		break;
		
		case "ubah_scanner":
		foreach ($_POST["ID_TMP_PENJUALAN"] as $barangubah=>$value) {
		$JUMLAHUBAH=$_POST["JUMLAH_UBAH"][$barangubah];
		$STOK_UBAH=$_POST["STOK_UBAH"][$barangubah];
		if($JUMLAHUBAH > $STOK_UBAH){
			echo "<script>alert('Stok Tidak mencukupi');window.location='../../index.php/kasir'</script>";
		}
		else{
		$itemchange = $db->fetch_single_row("tmp_detail_penjualan","ID_TMP_PENJUALAN",$value);
		$diskon=$itemchange->DISKON/100 * $itemchange->HARGA_BARANG;
		$jadi=($itemchange->HARGA_BARANG-$diskon) * $JUMLAHUBAH;
		$data = array("JUMLAH"=>$JUMLAHUBAH,"GRAND_PRICE"=>$jadi);
	    $upa = $db->update("tmp_detail_penjualan",$data,"ID_TMP_PENJUALAN",$value);
		if ($upa=true) {
			header('location:../../index.php/kasir');
		} else {
			return false; 
		}
		}
		}
		break;
	default:
		# code...
		break;
}

?>