<?php

session_start();

//bikin koneksi
$con= mysqli_connect('localhost','root','','kasir');

//fungsi login
if(isset($_POST['login'])){
    //inisiasi variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($con,"SELECT*FROM user WHERE username='$username' AND password='$password'");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //jika datanya di temukan
        //berhasil login

        $_SESSION['login'] = 'True';
        header('location:index.php');
    } else {
        //jika datanya tidak ditemukan 
        //gagal login
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="login.php"
        </script>
        ';
    }
}


if(isset($_POST['tambahbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];
    
    $insert = mysqli_query($con,"insert into barang(namabarang,deskripsi,harga,stock) values('$namabarang','$namabarang','$harga','$stock')");

    if($insert){
        header('location:stock.php');
    } else {
        echo '
        <script>alert("Gagal menambah barang baru");
        window.location.href="stock.php"
        </script>
        ';  
    }

}

?>