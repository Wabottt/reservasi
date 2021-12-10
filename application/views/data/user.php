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

    <a href="<?=base_url('auth/register')?>" class="btn btn-primary btn-sm pull-right mt-2 mb-4">
    <i class="fa fa-user-plus"></i> Register User</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Data Login Karyawan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center font-weight-bold text-dark">
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1; foreach($user as $row) {?>

                    <tr>
                        <td><?=$no?></td>
                        <td><?=$row->id_karyawan; ?></td>
                        <td><?=$row->nama_karyawan; ?></td>
                        <td><?=$row->email; ?></td>
                        <td><?=$row->keterangan; ?></td>
                        <td  class="text-center">
                            <a href="<?=base_url('User/ubah_password/'.$row->id_karyawan)?>" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i>   Ubah Password</a>
                            <a href="<?=base_url('User/hapus/'.$row->id_karyawan)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>   Hapus</a>
                        </td>
                    </tr>

                <?php $no++; } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


</body>
</html>