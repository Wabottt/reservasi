<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Daftar Tamu</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center font-weight-bold text-dark ">
                        <th>Nomor</th>
                        <th>Nama Tamu</th>
                        <th>Nomor Kamar</th>
                        <th>Paket</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Total Bayar</th>
                        <th>FO</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $no=1;
                foreach($tamu as $row) {?>

                    <tr class="text-center">
                        <td><?=$no++;?>.</td>
                        <td><?=$row->nama; ?></td>
                        <td><?=$row->nomor_kamar; ?></td>
                        <td><?=$row->paket; ?></td>
                        <td><?=$row->tgl_masuk; ?></td>
                        <td><?=$row->tgl_keluar; ?></td>
                        <td><?=$row->total_bayar; ?></td>
                        <td><?=$row->nama_karyawan; ?></td>
                        <td>
                            <a href="<?=base_url('Kamar/hapus/'.$row->id_pesanan)?>" class="">Lihat</a> | 
                            <a href="<?=base_url('Data_pesanan/chekout/'.$row->id_pesanan . '/'. $row->nama . '/' . $row->nomor_kamar)?>" class="btn btn-success btn-sm">Chekout</a> 
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