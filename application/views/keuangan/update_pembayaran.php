<!DOCTYPE html>
<html>
<title>Update</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<body>
<div class="d-flex">
<div class="container w-100">
        <div class="min-vh-100">
          <div class='card w-75 m-auto p-3'>
        <h3 class="text-center ">Update Data Siswa</h3>
        <?php foreach($pembayaran as $data_pembayaran): ?>
        <form class="row" action="<?php echo base_url('keuangan/aksi_update_pembayaran'); ?>" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id" value="<?php echo $data_pembayaran->id ?>">
            <div class="mb-3 col-6">
                <label for="siswa" class="form-label">Nama Siswa</label>
                <select name="id_siswa" class="form-select">
                    <option selected value="<?php echo $data_pembayaran->id_siswa ?>"><?php echo tampil_nama_siswa($data_pembayaran->id_siswa) ?>
                    <?php foreach($siswa as $row): ?>
                    <option value="<?php echo $row->id_siswa ?>">
                        <?php echo $row->nama_siswa ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                <select class="form-select" aria-label="Default select example" name="jenis_pembayaran">
                    <option selected value="<?php echo $data_pembayaran->jenis_pembayaran ?>"><?php echo $data_pembayaran->jenis_pembayaran ?></option>
                    <option value="SPP">SPP</option>
                    <option value="Uang Gedung">Uang Gedung</option>
                    <option value="Seragam">Seragam</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                <input type="text" class="form-control" id="total_pembayaran" name="total_pembayaran" value="<?php echo $data_pembayaran->total_pembayaran ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        <?php endforeach ?>
    </div>
          </div>
</div>
</div>
</body>
</html>