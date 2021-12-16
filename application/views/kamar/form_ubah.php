<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>

     <!-- Content Row -->
 <div class="row justify-content-lg-center">
	<div class="col-lg-8">

        <div class="mb-3">
            <a href="<?=base_url('kamar')?>" class="btn btn-warning btn-sm">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>

		<div class="card shadow mb-4">
            <h5 class="text-center text-dark font-weight-bold mt-3 mb-2">Maintenence Kamar</h5>
			<div class="collapse show" id="collapseCardExample">

            <?php 
                foreach ($kamar as $row) { ?>
				<div class="card-body">
                <?= form_open('kamar/UpdateStatus');?>

                    <div class="form-group">
                        <label>Nomor Kamar *</label>
                        <input type="text" name="nomor_kamar" value="<?=$row->nomor_kamar?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tipe *</label>
                        <input type="text" name="tipe" value="<?=$row->tipe?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Lantai *</label>
                        <input type="text" name="lantai" value="<?=$row->lantai?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="maintenence" name="status">
                    </div>

                    <div class="form-group">
                    <label >Keterangan Kamar</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                    </div>

                    <hr>

                    <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fa fa-paper-plane"></i> Ubah
                    </button>

                    <button type="Reset" class="btn btn-outline-secondary btn-sm">
                    Reset
                    </button>
                    </div>
                </form>
				</div>
                <?php } ?>
			</div>
		</div>
	</div>
</div>
    
</body>
</html>