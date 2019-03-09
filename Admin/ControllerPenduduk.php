<?php
include '../config/config.php';

if(isset($_POST['submitInsert']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $region = $_POST['regions'];
    $alamat = $_POST['alamat'];
    $gaji = $_POST['gaji'];
    $time= date('Y-m-d');
    $username="1001";

    $sql = mysqli_query($koneksi, "SELECT * FROM person WHERE id='$id'") or die(mysqli_error());
    if(mysqli_num_rows($sql) > 0)
    {
        header('location:PendudukInsert.php?pesan=gagalInsert');
    }
    else
    {

        $result = mysqli_query($koneksi, "INSERT INTO person VALUES('$id','$name','$region','$alamat','$gaji','$time','$username')");

        if($id != 0 &&  $name !="" && $region !="" && $alamat !="" && $gaji !="")
        {
            if($result)
            {
                header('location:PendudukData.php');
            }
            else
            {
                header('location:PendudukInsert.php?pesan=gagalInsert');
            }    
        }
        else{
            header('location:PendudukInsert.php?pesan=gagalInsert2');
        }
    }
}

else if(isset($_POST['submitUpdate']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $region = $_POST['regions'];
    $alamat = $_POST['alamat'];
    $gaji = $_POST['gaji'];
    
    $sql = mysqli_query($koneksi, "SELECT * FROM person WHERE id='$id'") or die(mysqli_error());
    if(mysqli_num_rows($sql) > 0)
    {
        if($id != 0 &&  $name !="" && $region !="" && $alamat !="" && $gaji !="")
        {
            $result = mysqli_query($koneksi, "UPDATE person SET name='$name', region_id='$region', address='$alamat', income='$gaji' WHERE id='$id'");
            if($result)
            {
                header('location:PendudukData.php');
            }
            else
            {
                header('location:PendudukUpdate.php?pesan=gagalUpdate');
            }
        }
        else
        {
            header('location:PendudukUpdate.php?pesan=gagalUpdate2');
        }
    }
    else
    {
        header('location:PendudukUpdate.php?pesan=gagalUpdate');
    }
}

else if(isset($_POST['submitDelete']))
{
    $id=$_POST['id'];

    $sql = mysqli_query($koneksi, "SELECT * FROM person WHERE id='$id'") or die(mysqli_error());
    if(mysqli_num_rows($sql) > 0)
    {
        if($id != 0)
        {
            $result = mysqli_query($koneksi, "DELETE FROM person WHERE id='$id'");
            if($result)
            {
                header('location:PendudukData.php');
            }
            else
            {
                header('location:PendudukDelete.php?pesan=gagalDelete');
            }
        }
        else
        {
            header('location:PendudukDelete.php?pesan=gagalDelete2');
        }
    }
    else
    {
        header('location:PendudukDelete.php?pesan=gagalDelete');
    }

}
?>