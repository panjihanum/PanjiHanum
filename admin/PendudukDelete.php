
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Penduduk</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/uniform.css" />
    <link rel="stylesheet" href="../css/select2.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    
  </ul>
</div>

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
  <ul>
	  <li><a href="index.php"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li><a href="PendudukData.php"><i class="icon icon-home"></i> <span>Data Penduduk</span></a> </li>
    <li><a href="DaerahData.php"><i class="icon icon-home"></i> <span>Data Daerah</span></a> </li>
    <li><a href="#"><i class="icon icon-home"></i> <span>About Us</span></a> </li>
  </ul>
</div>

<!-- Content -->

<?php
    session_start();
    if($_SESSION['status']!="login")
    {
        header("location:../index.php?pesan=belum_login");
    }
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Delete Penduduk</h1>
    </div>
    <div class="container-fluid">
      <?php
        if(isset($_GET['pesan']))
        {
          if($_GET['pesan']== "gagalDelete")
          {
            echo"Delete Data Gagal, Data sudah ada";
          }
          else
          {
            echo"Mohon Lengkapi Data terlebih dahulu";
          }
        }
      ?>
      <hr>
      <div class='row-fluid'> 
        <div class='span12'>
          <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='icon-th'></i> </span>
              <h5>static tables</h5>
            </div>
            <div class='widget-content nopadding'>
              <form class='form-horizontal' method='post' action='ControllerPenduduk.php' name='add_users_validate' id='add_users_validate' novalidate='novalidate'>
                <div class='control-group'>
                  <label class='control-label'>ID</label>
                  <div class='controls'>
                    <input type='text' name='id' id='nama_users'>
                  </div>
                </div>
              <div class='form-actions'>
                <input type='submit' value='Delete' class='btn btn-success' name='submitDelete'>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>


<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; <a href="index.php">www.panjihanum.com</a> </div>
</div>
<!--end-Footer-part-->
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.form_validation.js"></script>

<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script>
</body>
</html>
