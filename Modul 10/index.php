<?php
    session_start();
    require("function.php");
    
    // if(!isset($_SESSION['login'])){
    //     header("Location:login.php");
    //     exit;
    // }
    
    
    
    //tekan tombol cari
    if(isset($_POST['cari'])){
        $mahasiswa = cari($_POST['keyword']);
    } else {
        $mahasiswa = query("SELECT * from mahasiswa");
    }
        
?>

<html>
<head>
    <title>Jarot Setiwan L200190247</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container">
    <h1 class="text-center mt-4">Daftar Mahaiswa</h1>
    <a href="logout.php" class="text-decoration-none text-danger fw-bold float-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
  <path d="M7.5 1v7h1V1h-1z"/>
  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
</svg>Log out</a>
    <br>
    <br>
    <a href="tambah.php" class="text-decoration-none bg-primary text-white p-2">Tambah Data Mahasiswa</a>
    <br>
    <br>
    <form action="" method="post" class="text-center">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan kata pencarian" autocomplete="off" id="keyword" readonly>
        <button type="submit" name="cari" id="tombolCari" class="bg-warning border boder-0 py-1 px-2 text-white fw-bold" disabled>Cari</button>
        <a href="cetak.php" target="_blank" class="bg-success border boder-0 py-1 px-2 text-white fw-bold text-decoration-none">Cetak</a>
    </form>

    <br>
    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0" class="text-center mx-auto table table-striped">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td><?= $i ?>.</td>
            <td><a href="edit.php?id=<?= $row['id'] ?>" class="text-primary text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>edit</a> | <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')" class="text-danger text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>delete</a></td>
            <td><?= $row["nim"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["jurusan"] ?></td>
            <td><img src="asset/img/<?= $row["gambar"] ?>" width="50"></td>
            <?php $i++ ?>
        </tr>
        <?php endforeach ?>
    </table>
    </div>
<script type="text/javascript" src="js/script.js">
    
</script>
</body>
</html>