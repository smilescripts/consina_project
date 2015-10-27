<?php
	error_reporting(0);
    include_once "panel/include/koneksi.php";
	$profil=mysql_fetch_object(mysql_query("SELECT * FROM profil_perusahaan"));
?>


	

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="panel/<?php echo $profil->logo; ?>">



    <title>Consina</title>

    <title><?php echo $profil->NAMA_PERUSAHAAN; ?></title>



    <title><?php echo $profil->NAMA_PERUSAHAAN; ?></title>

	
    <!-- Bootstrap core CSS -->
    <link href="panel/bootstrap/docs/dist/css/bootstrap.min.css" rel="stylesheet">
	 <!-- Bootstrap theme -->
    <link href="panel/bootstrap/docs/dist/css/bootstrap-theme.min.css" rel="stylesheet">
	
    <!-- JQuery -->
    <script src="panel/js/jquery-1.11.1.min.js"></script>
    <script src="panel/js/jquery-migrate-1.2.1.min.js"></script>
	
   
	<!-- Custom styles for this template -->
    <link href="panel/bootstrap/docs/examples/theme/theme.css" rel="stylesheet">
    <link href="panel/bootstrap/docs/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="panel/css/backend.css" />
	
  </head>
  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-custom  navbar-fixed-top" style="background-image: linear-gradient(to bottom, #E8E8E8 0px, #F5F5F5 100%);
	background-repeat: repeat-x;
	border-color: #DCDCDC;
	box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.05) inset, 0px 1px 0px rgba(255, 255, 255, 0.1);">
        <div class="container">
            <table width="100%">
                <tr>
                    <td class="col-sm-1" rowspan="2"><img alt="Brand" src="panel/<?php echo $profil->logo; ?>" style="width:75px; height:75;"/></td>
                    <td class="col-sm-12" style="border-bottom:1pt solid green;">
                        <h3 style="color:<?php echo $profil->COLOR; ?>;"><?php echo $profil->NAMA_PERUSAHAAN; ?></h3>
                    </td>
				</tr>
				<tr>
                    <td class="col-sm-12">
                        <h4 style="color:<?php echo $profil->COLOR; ?>;">Consina Project</h4>
                    </td>
				</tr>
            </table>
        </div>
	 </nav>	


    <div class="container theme-showcase" role="main" style="margin-top:40px">
		<div class="row">
			<div class="col-md-4"><a style="color:<?php echo $profil->COLOR; ?>" target="_blank" href="E-HRD" ><center><img style="color:<?php echo $profil->COLOR; ?>" src="panel/1.png" width="150px"><br/><h4>HRD & GA</h4></a></center></div>
			<div class="col-md-4"><a style="color:<?php echo $profil->COLOR; ?>" target="_blank" href="E-ACCOUNTING"><center><img src="panel/3.png" width="150px"><br/><h4>FINANCE ACCOUNTING</h4></a></center></div>
			<div class="col-md-4"><a style="color:<?php echo $profil->COLOR; ?>" href="E-POS" target="_blank"><center><img src="panel/4.png"width="150px"><br/><h4>SALES</h4></a></center></div>
			
			<div class="col-md-4"><a style="color:<?php echo $profil->COLOR; ?>" target="_blank" href="E-ASSET" ><center><img src="panel/2.png"  width="150px"><br/><h4>ASSETS</h4></a></center></div>
			
			
			<div class="col-md-4"><a style="color:<?php echo $profil->COLOR; ?>" href="E-INVENTORY" target="_blank" ><center><img src="panel/6.png" width="150px"><br/><h4>INVENTORY</h4></a></center></div>
			<div class="col-md-4"><a style="color:<?php echo $profil->COLOR; ?>"  target="_blank" href="E-MANUFACTURE" ><center><img src="panel/5.png" width="150px"><br/><h4>MANUFACTURING</h4></a></center></div>
		</div>
	</div> <!-- /container -->
	
    <footer class="footer">
		<div class="container">
			<p class="pull-right"><a style="color:<?php echo $profil->COLOR; ?>" href="#"><span class="glyphicon glyphicon-triangle-top"></span> Back to top <span class="glyphicon glyphicon-triangle-top"></span></a></p>
			<p class="text-muted">&copy; <?php echo date('Y');?>  - <a href="" style="color:<?php echo $profil->COLOR; ?>"><?php echo $profil->NAMA_PERUSAHAAN; ?></a> - All Rights Reserved. </p>
		</div>
    </footer>
	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	
	<!-- bootstrap -->
    <script src="panel/bootstrap/docs/dist/js/bootstrap.min.js"></script>
	 
	 <!-- datepicker -->
    <!-- formvalidation -->
   <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="panel/bootstrap/docs/assets/js/vendor/holder.js"></script>
    <script src="panel/bootstrap/docs/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="panel/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
	
    <!-- data tables -->
  
  </body>
</html>