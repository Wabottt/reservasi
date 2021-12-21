
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>assets2/jquery-ui.css">
    <script src="<?=base_url()?>assets2/moment-with-locales.js"></script>
    <script src="<?=base_url()?>assets2/jquery-1.8.3.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <title><?=$title?></title>
</head>
<body>


<h2>Data Transaksi</h2><hr>
    <form method="get" action="">
        <div class="form-group row" id="form-tanggal">
            <label class="col-lg-2 col-form-label">Filter Tanggal</label>
            <div class="col-lg-4">
            <input type="date" name="tanggal" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-sm">Tampilkan</button>
    </form>
<hr />

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3"  width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center font-weight-bold text-dark ">
                        <th>No</th>
                        <th>Nama Tamu</th>
                        <th>Nomor Kamar</th>
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
                foreach($transaksi as $row) { ?> 

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

<a href="<?php echo $url_cetak; ?>" target="blank" class="btn btn-primary shadow-sm">
<i class="fas fa-download fa-sm text-white-50"></i>Cetak</a>

</body>
</html>