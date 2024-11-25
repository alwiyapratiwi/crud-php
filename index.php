<!DOCTYPE html>
<html>
<head>
    <title>Alwiya Pratiwi</title>

    <style>
        a {
            text-decoration: none;
            font-weight: bold;
            color: black;
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <br>
    <h4><center>DAFTAR PESERTA PELATIHAN</center></h4>
    <br>
    <button><a href="create.php">Tambah Data</a></button>
    <br> <br>

<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_peserta'])) {
        $id_peserta=htmlspecialchars($_GET["id_peserta"]);

        $sql="delete from peserta where id_peserta='$id_peserta' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div> Data Gagal dihapus.</div>";

            }
        }
?>

<center>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>

<?php
include "koneksi.php";
$sql="select * from peserta order by id_peserta desc";

$hasil=mysqli_query($kon,$sql);
$no=0;
while ($data = mysqli_fetch_array($hasil)) {
    $no++;

?>

    <tbody>
    <tr>
        <td><?php echo $no;?>               </td>
        <td><?php echo $data["nama"];    ?> </td>
        <td><?php echo $data["sekolah"]; ?> </td>
        <td><?php echo $data["jurusan"]; ?> </td>
        <td><?php echo $data["no_hp"];   ?> </td>
        <td><?php echo $data["alamat"];  ?> </td>
        <td>
            <button><a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" >Update</a></button>
            <button><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" >Delete</a></button>
        </td>
    </tr>
    </tbody>

<?php
}
?>
</table>
</center>

</div>


</body>
</html>
