<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

<div class="content"> 
        <div class="d-flex"> 
 
            <div class="container"> 
 
                <div class="min-vh-100"> 
                    <div class='card w-75 m-auto p-3'> 
                        <h3 class="text-center ">Ubah Data Guru</h3> 
                        <?php foreach($guru as $data_guru): ?> 
                        <form class="row" action="<?php echo base_url('admin/aksi_ubah_guru'); ?>" 
                            enctype="multipart/form-data" method="post"> 
                            <input type="hidden" name="id" value="<?php echo $data_guru->id ?>"> 
                            <div class="mb-3 col-6"> 
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama"> 
                                    Nama Guru
                                </label> 
                                <input 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="nama" name="nama" type="text" placeholder="Nama" 
                                    value="<?php echo $data_guru->nama_guru ?>"> 
                            </div> 
                            <div class="mb-3 col-6"> 
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nik"> 
                                    NIK 
                                </label> 
                                <input 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                    id="nik" name="nik" type="number" placeholder="nik" 
                                    value="<?php echo $data_guru->nik ?>"> 
                            </div> 
                            <div class="mb-3 col-6"> 
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender"> 
                                    Gender 
                                </label> 
                                <select name="gender" id="gender" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> 
                                    <option selected value="<?php echo $data_guru->gender ?>"> 
                                        <?php echo $data_guru->gender ?></option> 
                                    <option value="Laki-laki">Laki-laki</option> 
                                    <option value="Perempuan">Perempuan</option> 
                                </select> 
                            </div> 
                            <div class="mb-3 col-6">
                            <label for="mapel" class="form-label">Mapel</label>
                            <select name="id_mapel" class="form-select">
                                    <option selected value="<?php echo $data_guru->id_mapel ?>"><?php echo tampil_mapel($data_guru->id_mapel) ?></option>
                                    <?php echo tampil_mapel($data_guru->id_mapel) ?>
                                    </option>
                                    <?php foreach($mapel as $row): ?>
                                    <option value="<?php echo $row->id ?>">
                                        <?php echo $row->nama_mapel ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div>
                                <input type="hidden" name="id" value="<?php echo $data_guru->id; ?>">
                                <button type="submit" class="btn btn-primary"  class="btn">Ubah</button>
                            </div> 
                        </form> 
 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
 
    <?php endforeach ?>
    
</body>

</html>
