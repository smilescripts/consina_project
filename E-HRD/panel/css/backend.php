<?php 
header("Content-type: text/css"); 
include_once "../include/koneksi.php";
$profil=mysql_fetch_object(mysql_query("SELECT * FROM profil_perusahaan"));

?>

.datepicker {
    color: white;
}
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;border:none;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-hy62{background-color:#c0c0c0}
.tg .tg-4eph{background-color:#f9f9f9}
.ColVis {
  margin-bottom: 1em; 

}
.dataTables_length { 

}
.dataTables_filter {
float:right; 

}


a {
  color:<?php echo $profil->COLOR; ?>;
  text-decoration: none;
}
a:hover {
  color: #000000;
  text-decoration: none;
}
a:focus {
  color: #000000;
  text-decoration: none;
}

body {
  padding-top: 160px;
}

.navbar {
  margin-bottom:0px;
}

.navbar-custom {
background:<?php echo $profil->COLOR; ?>; 
 -webkit-box-shadow: 0 0 30px #666;
    -moz-box-shadow: 0 0 30px #666;
    box-shadow: 0 0 30px #666;
}
.navbar-custom .navbar-brand {
  color: #ffffff;
}
.navbar-custom .navbar-brand:hover,
.navbar-custom .navbar-brand:focus {
  color: #e6e6e6;
  background-color: transparent;
}
.navbar-custom .navbar-text {
  color: #ffffff;
}
.navbar-custom .navbar-nav > li > a {
  color: #ffffff;
}
.navbar-custom .navbar-nav > li > a:hover,
.navbar-custom .navbar-nav > li > a:focus {

background:<?php echo $profil->COLOR; ?>; 
}
.navbar-custom .navbar-nav > .active > a,
.navbar-custom .navbar-nav > .active > a:hover,
.navbar-custom .navbar-nav > .active > a:focus {

background:<?php echo $profil->COLOR; ?>; 
}
.navbar-custom .navbar-nav > .disabled > a,
.navbar-custom .navbar-nav > .disabled > a:hover,
.navbar-custom .navbar-nav > .disabled > a:focus {
  color: #cccccc;
  background-color: transparent;
}
.navbar-custom .navbar-toggle {
  border-color: #dddddd;
}
.navbar-custom .navbar-toggle:hover,
.navbar-custom .navbar-toggle:focus {
  background-color: #dddddd;
}
.navbar-custom .navbar-toggle .icon-bar {
  background-color: #cccccc;
}
.navbar-custom .navbar-collapse,
.navbar-custom .navbar-form {
  border-color: #5ef518;
}
.navbar-custom .navbar-nav > .dropdown > a:hover .caret,
.navbar-custom .navbar-nav > .dropdown > a:focus .caret {
  border-top-color: #000000;
  border-bottom-color: #000000;
}
.navbar-custom .navbar-nav > .open > a,
.navbar-custom .navbar-nav > .open > a:hover,
.navbar-custom .navbar-nav > .open > a:focus {
  background-color:grey;
  color: #000000;
}
.navbar-custom .navbar-nav > .open > a .caret,
.navbar-custom .navbar-nav > .open > a:hover .caret,
.navbar-custom .navbar-nav > .open > a:focus .caret {
  border-top-color: #000000;
  border-bottom-color: #000000;
}
.navbar-custom .navbar-nav > .dropdown > a .caret {
  border-top-color: #ffffff;
  border-bottom-color: #ffffff;
}
@media (max-width: 767) {
  .navbar-custom .navbar-nav .open .dropdown-menu > li > a {
    color: #ffffff;
  }
  .navbar-custom .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-custom .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #000000;
    background-color: transparent;
  }
  .navbar-custom .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #000000;
    background-color: #eb6b00;
  }
  .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #cccccc;
    background-color: transparent;
  }
}
.navbar-custom .navbar-link {
  color: #ffffff;
}
.navbar-custom .navbar-link:hover {
  color: #000000;
}

.dropdown-menu { 

background:<?php echo $profil->COLOR; ?>; 
}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-color: #FFFFFF}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-image: none; }
.dropdown-menu>li>a { color: #FFFFFF}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { 
background: grey;

  }
.navbar-custom .navbar-nav>.dropdown>a .caret { border-top-color: #FFFFFF}
.navbar-custom .navbar-nav>.dropdown>a:hover .caret { border-top-color: #333333}
.navbar-custom .navbar-nav>.dropdown>a .caret { border-bottom-color: #FFFFFF}
.navbar-custom .navbar-nav>.dropdown>a:hover .caret { border-bottom-color: #333333}

.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active     >     a:focus {
background: grey;
}


.panel-warning>.panel-heading {
background:<?php echo $profil->COLOR; ?>; /* Old browsers */
color:white;

}

.panel-warning {
  border-color:<?php echo $profil->COLOR; ?>;
  border-bottom: 1px solid <?php echo $profil->COLOR; ?>;
   -webkit-box-shadow: 0 0 10px #666;
    -moz-box-shadow: 0 0 10px #666;
    box-shadow: 0 0 10px #666;
}

.headingtable {
    background: <?php echo $profil->COLOR ?>;
    border: 1px solid #3d8bbd;
    padding: 15px;
	padding-bottom:-20px
	
    width: auto;
	
    padding-left: 20px;
    border-radius: 5px 5px 0 0;
    position: relative;
    z-index: 2;
    -webkit-box-shadow: 0 0 10px #666;
    -moz-box-shadow: 0 0 10px #666;
    box-shadow: 0 0 10px #666;
    color: #FFF;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 15px;
    text-transform: capitalize;
}
.btnbantuan {
    float: right;
    margin-top: -40px;
    margin-right: 15px;
    position: relative;
    z-index: 2;
	
}