<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>

<!-- Page Heading -->

    <a href="<?=base_url('kamar/form')?>" class="btn btn-primary btn-sm pull-right mt-2 mb-4">
    <i class="fa fa-user-plus"></i>Tambah Kamar</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Kamar</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center font-weight-bold text-dark ">
                        <th>Nomor_Kamar</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Lantai</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($kamar as $row) {?>

                    <tr class="text-center">
                        <td><?=$row->nomor_kamar; ?></td>
                        <td><?=$row->tipe; ?></td>
                        <td><?=$row->harga; ?></td>
                        <td><?=$row->lantai; ?></td>
                        <td><?=$row->status; ?></td>
                        <td>
                            <a href="<?=base_url('Kamar/hapus/'.$row->nomor_kamar)?>" class="">Fasilitas</a> | 
                            <a href="<?=base_url('Kamar/ubah_password/'.$row->nomor_kamar)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i>   Ubah</a> 
                        </td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


</body>
</html>