(function($) {
    $(document).ready(function(e) {
		var id = 0;
		var logo1 = logo;
		var main = "crud/restore/restore.data.php";

		$("#data-restore").load(main);
	
		$('.ubah-restore, .tambah-restore').live("click", function(){
            var url = "crud/restore/import.form.php";
            id = this.id;
			
            if(id != 0) {
				$("#myModalLabel").html("<img alt='Brand' src='"+logo1+"' style='width:50px; height:50px;'/>&nbsp;&nbsp;&nbsp;Ubah Data restore");
            } else {
				$("#myModalLabel").html("<img alt='Brand' src='"+logo1+"' style='width:50px; height:50px;'/>&nbsp;&nbsp;&nbsp;Tambah Data restore");
            }

            $.post(url, {id: id} ,function(data) {
				$(".isiForm").html(data).show();
            });
		});
		
		$('.import').live("click", function(){
            var url = "crud/restore/import.form.php";
            $("#myModalLabel").html("<img alt='Brand' src='"+logo1+"' style='width:50px; height:50px;'/>&nbsp;&nbsp;&nbsp;Import Data restore");
            $.post(url, "" ,function(data) {
				$(".isiForm").html(data).show();
            });
		});

		$('.hapus-restore').live("click", function(){
            var url = "crud/restore/restore.input.php";
            id = this.id;
            var answer = confirm("Apakah anda ingin mengghapus data ini?");

            if (answer) {
				$.post(url, {hapus: id} ,function() {
                    $("#data-restore").load(main);
				});
            }
		});
		
		$('#dialog-restore').on('hidden.bs.modal', function () {
            $("#data-restore").load(main);
            $("#myModalLabel").html("<img alt='Brand' src='"+logo1+"' style='width:50px; height:50px;'/>&nbsp;&nbsp;&nbsp;Tambah Data restore");
		});
    });
}) (jQuery);
