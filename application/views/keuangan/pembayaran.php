<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- Bootstrap CSS -->
      <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style> 
    .card { 
        background-color: #20B2AA; 
        border: 1px solid #ccc; 
        border-radius: 2px; 
        padding: 10px; 
        margin: 5px; 
        width: 150px; 
        display: inline-block; 
        color: white; 
        margin-left: 0; 
        transition: margin-left 0.5s; 
    } 
 
    body { 
        font-family: Arial, sans-serif; 
        margin: 0; 
        padding: 0; 
    } 
 
    .login-button { 
        display: inline-block; 
        padding: 10px 20px; 
        background-color: #008B8B; 
        color: #fff; 
 
        text-decoration: none; 
        text-align: center; 
        font-size: 10px; 
        border: none; 
 
        width: 100px; 
    } 
 
    .navbar { 
        background-color: #333; 
        color: #fff; 
        padding: 10px; 
        position: fixed; 
        top: 0; 
        width: 100%; 
        z-index: 1; 
    } 
 
    /* CSS Untuk Side Navbar (Samping) */ 
    .sidenav { 
        height: 100%; 
        width: 0; 
        position: fixed; 
        z-index: 2; 
        top: 0; 
        left: 0; 
        background-color: #333; 
        overflow-x: hidden; 
        transition: 0.5s; 
        padding-top: 0px; 
    } 
 
    .sidenav a { 
        padding: 5px 10px; 
        text-decoration: none; 
        font-size: 18px; 
        color: #fff; 
        display: block; 
        transition: 0.3s; 
    } 
 
    .sidenav a:hover { 
        background-color: #555; 
    } 
 
    /* CSS Untuk Konten */ 
    .content { 
        margin-left: 0; 
        padding: 20px; 
        transition: margin-left 0.5s; 
    } 
 
    /* CSS Umum */ 
    body { 
        font-family: Arial, sans-serif; 
        margin: 0; 
        padding: 0; 
    } 
 
    /* Tombol untuk membuka side navbar */ 
    .openbtn { 
        background-color: #333; 
        color: #fff; 
        padding: 10px 15px; 
        border: none; 
        cursor: pointer; 
        margin-left: 0; 
        transition: margin-left 0.5s; 
    } 
 
    .openbtn:hover { 
        background-color: #555; 
    } 
 
    .search-container { 
        float: right; 
    } 
 
    .search-box { 
        padding: 2px; 
        border: none; 
        border-radius: 5px; 
    } 
 
    .navbar h1 { 
        margin: 0; 
    } 
 
    .table-container { 
        margin-top: 80px; 
        /* Membuat ruang antara navbar dan tabel */ 
        padding: 20px; 
    } 
    </style>

</head>

<body class="min-vh-100 d-flex align-items-center bg-dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('pembayaran') ?>">Beranda</a> 
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('keuangan/pembayaran') ?>">pembayaran</a> 
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
        <div class="container">
            <a href="<?php echo base_url('Keuangan/tambah_pembayaran'); ?>" class="btn btn-outline-success mb-2">Tambah</a>
            <table class="table table-dark table-hover">
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>jenis pembayaran</td>
                    <td>total pembayaran</td>
                    <td>Aksi</td>
                </tr>
                <?php $no=0; foreach($pembayaran as $row): 
                    $no++ ?>
                <tr>    
                    <td>
                    <?php echo $no?>
                    </td>
                    <td>
                        <?php echo tampil_nama_siswa($row->id_siswa)?>
                    </td>
                    <td>
                        <?php echo $row->jenis_pembayaran?>
                    </td>
                    <td>
                        <?php echo convRupiah($row->total_pembayaran) ?>
                    </td>
                    <td>
                    <button onclick="hapus_data(<?php echo $row->id?>)" class="btn-danger">Hapus</button>
                        <a href="<?php echo base_url('keuangan/update_pembayaran/'). $row->id; ?>" class="btn btn-warning">Update</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>

        <script>
    function hapus_data(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Keuangan/hapus_data/')?>" + id;
        }
        return false; // tambahkan return false agar tautan tidak mengikuti href
    }
</script>
     <script> 
    function openNav() { 
        document.getElementById("mySidenav").style.width = "250px"; 
        document.getElementsByClassName("content")[0].style.marginLeft = "250px"; 
    } 
    function closeNav() { 
        document.getElementById("mySidenav").style.width = "0"; 
        document.getElementsByClassName("content")[0].style.marginLeft = "0"; 
    } 
    </script> 
</body>
</html>
