<?php
include '../config/config.php';
if(isset($_POST['submitUpdate']))
{
    $id=$_POST['id'];
    $daerah=$_POST['daerah'];
    $sql = mysqli_query($koneksi, "SELECT id FROM regions WHERE id='$id'") or die(mysqli_error());
    if(mysqli_num_rows($sql) > 0){
        $result = mysqli_query($koneksi, "UPDATE regions SET name='$daerah' WHERE id='$id'");
        if($id != 0)
        {
            if($result)
            {
                header('location:DaerahData.php');
            }
            else
            {
                header("location:DaerahUpdate.php?pesan=gagalUpdate");
            }
        }
        else
        {   
            header("location:DaerahUpdate.php?pesan=gagalUpdate");
        }
    }
    else{
        header('location:DaerahUpdate.php?pesan=gagalUpdate2');
    }
}

    else if(isset($_POST['submitInsert']))
    {
        $id=$_POST['id'];
        $name=$_POST['daerah'];
        $time= date('Y-m-d');
        $username="1001";
        $sql = mysqli_query($koneksi, "SELECT id FROM regions WHERE id='$id'") or die(mysqli_error());
        if(mysqli_num_rows($sql) > 0){
            header('location:DaerahInsert.php?pesan=gagalInsert');
        }
        else{
            $result = mysqli_query($koneksi, "INSERT INTO regions VALUES('$id','$name','$time','$username')");
            if($id != 0 &&  $name !="")
            {
                if($result)
                {
                    header('location:DaerahData.php');
                }
                else
                {
                    header('location:DaerahInsert.php?pesan=gagalInsert');
                }
            }
            else
            {   
                header('location:DaerahInsert.php?pesan=gagalInsert2');
            }
        }
    }

    if(isset($_POST['submitDelete']))
    {
        $id=$_POST['id'];
        $sql = mysqli_query($koneksi, "SELECT id FROM regions WHERE id='$id'") or die(mysqli_error());
        if(mysqli_num_rows($sql) > 0){
            $result = mysqli_query($koneksi, "DELETE FROM regions WHERE id='$id'");
            if($id != 0)
            {
                if($result)
                {
                    header('location:DaerahData.php');
                }
                else
                {
                    header('location:DaerahDelete.php?pesan=gagalDelete');
                }
            }
            else
            {   
                header('location:DaerahDelete.php?pesan=gagalDelete2');
            }
        }
        else{
            header('location:DaerahDelete.php?pesan=gagalDelete');
        }
    }

?>
