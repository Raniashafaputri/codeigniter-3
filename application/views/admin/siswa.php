<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

<body>
    <div class="flex">
    <div class="navbar"> 
        <span class="openbtn" onclick="openNav()">&#9776;</span> 
        <h3 class="text-center text-white">Data Siswa</h3> 
        <div class="search-container"> 
            <input type="text" class="search-box" placeholder="Cari..."> 
            <button type="submit">Cari</button> 
        </div> 
    </div> 
 
    <!-- Side Navbar (Samping) --> 
    <div class="sidenav" id="mySidenav"> 
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; tutup</a> 
        <a href="<?php echo base_url('admin') ?>">Beranda</a> 
        <a href="<?php echo base_url('admin/siswa') ?>">Siswa</a> 
        
    </div>

<div class="content">
        <div class="container mt-12">
            <div class="overflow-x-auto">
                <table class="divide-y-2 divide-gray-200 bg-white text-sm w-full px-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                No
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                Nama Siswa
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                NISN
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                Gender
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                Kelas
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                Aksi
                            </th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <?php $no=0; foreach($siswa as $row): $no++ ?>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $no ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                <?php echo $row->nama_siswa ?>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nisn ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->gender ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                <?php echo tampil_full_kelas_byid($row->id_kelas) ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-center">
                                <a href="#"
                                    class="inline-block rounded bg-sky-600 px-4 py-2 text-xs font-medium text-white hover:bg-sky-700">
                                    Ubah
                                </a>
                                <button onclick="hapus(<?php echo $row->id_siswa ?>)"
                                    class="inline-block rounded bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <button class="btn btn-sm btn-warning"><a href="Tambah_siswa" class="btn text-primary">Tambah</a> 
            </button>

            </div>
        </div>
    </div>
    </div>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('admin/hapus_siswa/')?>" + id;
        }
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
