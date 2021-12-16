<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
<div class="mb-3">
    <a href="<?=base_url('kamar')?>" class="btn btn-warning btn-sm">
        <i class="fa fa-undo"></i> Back
    </a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Maintenance</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered mt-3" width="100%">
                <thead>
                    <tr class="text-center font-weight-bold text-dark ">
                        <th>Nomor_Kamar</th>
                        <th>Lantai</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach($kamar as $row) {?>

                    <tr class="text-center">
                        <td><?=$row->nomor_kamar; ?></td>
                        <td><?=$row->lantai; ?></td>
                        <td><?=$row->status; ?></td>
                        <td><?=$row->keterangan; ?></td>
                        <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#ready"  class="btn btn-success btn-sm">Ready</button>
                        </td>
                    </tr>


                    <!-- Modal -->
                    <div class="modal fade" id="ready" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-center text-dark" id="exampleModalLabel">Siapkan Kamar ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="text center text-dark">Pastikan Kamar Siap digunakan</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                            <a href="<?=base_url('Kamar/Upkamar/'.$row->nomor_kamar)?>" class="btn btn-primary btn-sm">Ubah</a>
                        </div>
                        </div>
                    </div>
                    </div>

                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


</body>
</html>