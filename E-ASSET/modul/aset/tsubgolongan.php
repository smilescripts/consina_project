 <script type="text/javascript">
    $(function(){
    //chosen select
    $(".chzn-select2").chosen();
    $(".chzn-select-deselect2").chosen({
        allow_single_deselect: true
    });

    });
</script>
<?php
include "../../inc/config.php";

$kode_golongan=$_POST['kode_golongan'];

  echo '
  <select name="sub_golongan" data-placeholder="Pilih Sub Golongan ..." class="form-control chzn-select2" tabindex="2" required>
             
  <option value="">Pilih Sub Golongan ...</option>';
                foreach ($db->fetch_custom("select * from as_subgolongan where kode_golongan='$kode_golongan'") as $isi) {
					
               		echo "<option value='$isi->sub_golongan'>$isi->nm_subgolongan</option>";
               }
	echo '</select>';
?>