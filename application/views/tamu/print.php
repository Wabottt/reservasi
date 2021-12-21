<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Print Laporan</title>
</head>
<body>

<!-- DataTales Example -->
    <div class="container-center">
    <div class="card" style="border: none;">
    <div class="card-body">
        <table class="table table-bordered mt-3 table-sm"  width="50%">
            <thead>
                <tr class="text-center font-weight-bold text-dark ">
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Kamar</th>
                    <th>Paket</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Total Bayar</th>
                    <th>FO</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            $no=1;
            foreach($transaksi as $row){ ?> 
                <tr class="text-center">
                    <td><?=$no++;?>.</td>
                    <td><?=$row->nama; ?></td>
                    <td><?=$row->nomor_kamar; ?></td>
                    <td><?=$row->paket; ?></td>
                    <td><?=$row->tgl_masuk; ?></td>
                    <td><?=$row->tgl_keluar; ?></td>
                    <td><?=$row->total; ?></td>
                    <td><?=$row->nama_karyawan; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script>
    window.print();
    </script>

</body>
</html>