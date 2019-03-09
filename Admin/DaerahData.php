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
    <title>Data Daerah</title>
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
    <h1>Data Daerah</h1>
    </div>
    <div class="container-fluid">
      <hr>
      <div class='row-fluid'>
        <div class='span12'>
          <a href='DaerahInsert.php' class='btn btn-primary'>Add Data</a>
          <a href='DaerahUpdate.php' class='btn btn-primary'>Update Data</a>
          <a href='DaerahDelete.php' class='btn btn-primary'>Delete Data</a>
          <div class='widget-box'>
            <div class='widget-title'> <span class='icon'> <i class='icon-th'></i> </span>
              <h5>Static table</h5>
            </div>
            <div class='widget-content nopadding'>
              <table class='table table-bordered table-striped'>
                <?php
                  include '../config/config.php';
                  $query = mysqli_query($koneksi, "select * from regions");
                ?>
                <thead>
                  <tr>
                  <th> id </th>
                    <th> Nama Daerah </th>
                    <th> Jumlah Penduduk </th>
                    <th> Total pendapatan </th>
                    <th> Rata-Rata pendapatan </th>
                    <th> Status</th>
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
                <td><?php echo $data['id'];?></td>
                    <td><?php echo $data['name'];?></td>
                        
                        <?php
                            $id = $data['id'];
                            $query2 = mysqli_query($koneksi, "SELECT COUNT(id) FROM PERSON WHERE region_id =$id");
                            $count = mysqli_fetch_array($query2);
                        ?>
                    <td><?php echo $count['COUNT(id)']?></td>
                        
                        <?php
                            $query3 = mysqli_query($koneksi, "SELECT SUM(income) as jumlah FROM PERSON WHERE region_id=$id");
                            $jumlah = mysqli_fetch_array($query3);
                        ?>

                    <td><?php echo rupiah($jumlah['jumlah'])?></td>
                        
                        <?php
                            $query4 = mysqli_query($koneksi, "SELECT AVG(income) as ratarata FROM PERSON WHERE region_id=$id");
                            $rata = mysqli_fetch_array($query4);
                            
                        ?>

                    <td><?php echo rupiah($rata['ratarata'])?></td>
                        
                        <?php
                            $result;
                            if($rata['ratarata'] < 1700000)
                            {   
                                $result = "red";
                            }
                            else if($rata['ratarata'] > 1700000 && $rata['ratarata'] <2200000)
                            {
                                $result = "yellow";
                            }
                            else
                            {
                                $result = "Green";
                            }
                        ?>
                    <td><hr size=10 color=<?php echo $result?>></td>
                    <?php }?>
                    <?php } ?>
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
