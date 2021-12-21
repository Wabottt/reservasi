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
<!-- DataTales Example -->

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('#form-bulan, #form-tahun').hide();
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '2'){ // Jika filter nya 1 (per tanggal)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }
            else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

<h2>Data Transaksi</h2><hr>
    <form method="get" action="">
        <div class="row">
            <label>Filter Berdasarkan</label><br>
            <select name="filter" id="filter" class="form-control col-lg-2">
                <option value="">Pilih</option>
                <option value="2">Per Bulan</option>
                <option value="3">Per Tahun</option>
            </select>
        </div>
        <br /><br />
        <div class="row" id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan" class="form-control col-lg-2">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
        <div class="row" id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun" class="form-control col-lg-2">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
        </div><br /><br />
        <button type="submit">Tampilkan</button>
    </form>
    <hr />


<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center font-weight-bold text-dark">
                        <th >No</th>
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
                foreach($transaksi as $row) {?>
<!-- $tgl_masuk = date('d-m-Y', strtotime($row->tgl_masuk));  -->
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

</body>
</html>