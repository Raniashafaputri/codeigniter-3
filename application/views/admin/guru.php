<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex">
        <div>
            <?php $this->load->view('components/sidebar')?>
        </div>

        <div class="container mt-12">
            <?php $this->load->view('components/navbar')?>
            <div class="overflow-x-auto">
                <table class="divide-y-2 divide-gray-200 bg-white text-sm w-full px-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                No
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                Nama Guru
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                NIK
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                Gender
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">
                                mapel
                            </th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <?php $no=0; foreach($guru as $row): $no++ ?>
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $no ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                <?php echo $row->nama_guru ?>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nik ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->gender ?></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo tampil_full_mapel_byid($row->id_mapel) ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('admin/hapus_guru/')?>" + id;
        }
    }
    </script>
</body>

</html>
