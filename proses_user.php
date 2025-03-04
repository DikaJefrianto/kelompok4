<?php
require 'koneksi.php';
if(($_GET['proses']) == 'simpan') {
    if (isset($_POST['submit'])) {
        $nama_lengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        //Cek NIM sudah ada atau belum
        /*$cekNIM = mysqli_query($db,"SELECT nim FROM mahasiswa WHERE nim ='$nim' ");
        if (mysqli_num_rows($cekNIM) > 0) {
            echo "<script>alert('Data gagal disimpan!!! NIM sudah terdaftar');window.location='index.php?page=mahasiswa&aksi=create'</script>";
            exit();
        }
        */

        $query = mysqli_query($db, "INSERT INTO user (nama_lengkap, email, password, level) VALUES ('$nama_lengkap','$email','$password','$level')"); 
        
        if ($query){
            echo "<script>alert('Data berhasil disimpan');window.location='index.php?page=user'</script>";
        } else{
            echo "<script>alert('Data gagal disimpan!!!');window.location='index.php?page=user&aksi=create'</script>";
        }
    }
}
if(($_GET['proses']) == 'edit') {
    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $query = mysqli_query($db, "UPDATE user SET email = '$email', nama_lengkap = '$nama_lengkap', level = '$level', password = '$password' where id=$id");
        if ($query){
            echo "<script>alert('Data berhasil disimpan');window.location='index.php?page=user'</script>";
        } else{
            echo "<script>alert('Data gagal disimpan!!!');window.location='index.php?page=user&aksi=create'</script>";
        }

}
if(($_GET['proses']) == 'hapus') {
    $id = $_GET['id'];
    $query = mysqli_query($db, "DELETE FROM user WHERE id=$id");
    if ($query){
        echo "<script>alert('Data berhasil dihapus');window.location='index.php?page=user'</script>";
    } else{
        echo "<script>alert('Data gagal dihapus');window.location='index.php?page=user'</script>";
    }
}

?>