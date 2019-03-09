<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        
        <div id="loginbox">   
        <p>
        <?php
            if(isset($_GET['pesan']))
            {
            if($_GET['pesan'] == "gagal")
                {
                    echo"Login gagal! username dan password salah";
                }
                else if($_GET['pesan'] == "logout")
                {
                    echo"Anda telah berhasil logout";
                }
                else if($_GET['pesan'] == "belum_login")
                {
                    echo"Anda harus login untuk mengakses halaman";
                }
            }
        ?>
        </p>         
            <form id="loginform" method="post" class="form-vertical" action="login.php">
				<div class="control-group normal_text"> <h3>LOGIN</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input name="username" type="text" placeholder="ID" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">

                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login"></span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script>

    </body>

</html>
