<?php
    session_start();
    if($_SESSION['status']!="login")
    {
        header("location:../index.php?pesan=belum_login");
    }
?>

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

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Data Penduduk</h1>
    </div>
    <div class="container-fluid">
      <FORM ACTION="" METHOD="POST">
        <input type="radio" name="pilihan" value="All"  />Semua<br>
        <input type="radio" name="pilihan" value="NotAll" />Region<br>
        <div class='control-group'>
                <div class='controls'>
                  <select name="pilih" id="level">
                  
                    <?php 
                      include '../config/config.php';
                      $getndaerah = mysqli_query($koneksi, "SELECT name FROM regions");
                      while($row = mysqli_fetch_assoc($getndaerah))
                      {  
                    ?>
        
                    <option value="<?php echo($row['name']) ?>"><?php echo($row['name']) ?></option>
        
                    <?php
                      } 
                    ?>
        
                  </select>
                </div>
              </div>
        
          <input type="submit" name="submits" value="Tampilkan">
      </FORM>
      <hr>
      <div class='row-fluid'>
        <div class='span12'>
          <a href='PendudukInsert.php' class='btn btn-primary'>Add Data</a>
          <a href='PendudukUpdate.php' class='btn btn-primary'>Update Data</a>
          <a href='PendudukDelete.php' class='btn btn-primary'>Delete Data</a>
          <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='icon-th'></i> </span>
              <h5>Tambah Data</h5>
            </div>
            <div class='widget-content nopadding'>
                
                <?php
                    $query = mysqli_query($koneksi, "select * from view_person");
                    if(isset($_POST['submits']))
                    {
                        $pilihan = $_POST['pilihan'];
                        $pilih = $_POST['pilih'];
                        if($pilihan=='All')
                        {
                            $query = mysqli_query($koneksi, "select * from view_person");
                        }
                        else
                        {
                             $query = mysqli_query($koneksi, "select * from view_person WHERE nama_daerah='$pilih'");
                        }
                    }
                ?>              
              </p>
              <table class='table table-bordered table-striped'>
                <thead>
                  <tr>
                    <th> id </th>
                    <th> Nama Penduduk </th>
                    <th> Gaji </th>
                    <th> Daerah </th>
                  </tr>
                </thead>
                <?php
                    if(mysqli_num_rows($query) > 0)
                    {
                ?>
                <?php
                    while($data = mysqli_fetch_array($query))
                    {
                    
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo rupiah($data['income']);?></td>
                    <td><?php echo $data['nama_daerah']?></td>
                    <?php }}?>
                  </tr>
                </tbody>
              </table>
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
