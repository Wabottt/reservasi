<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
</head>
<body>


<div class="my-2"></div>
<button type="button" class="btn btn-primary btn-icon-split mb-4" data-toggle="modal" 
data-target="#exampleModal" data-whatever="@mdo">
	<span class="icon text-white-50">
		<i class="fas fa-plus"></i>
	</span>
	<span class="text font-weight-bold">Pesan Kamar</span>
</button>


	<div class="row mb-3">
		<div class="col-lg-3">
			<div class="card border-left-primary ">
			
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<?php foreach ($status1 as $key) { ?>
				<h7> <h7 class="text-primary">Ready</h7>  : <?=$key->total?> </h7>
				<br>
				<a href="<?=base_url('kamar/status1')?>">Lihat   <i class="fas fa-arrow-right"></i></a>
				<?php } ?>
				</div>
			</div>

			</div>
		</div>

		<div class="col-lg-3">
			<div class="card border-left-success ">
			<?php foreach ($status2 as $key) { ?>
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<h7> <h7 class="text-success">Check in</h7>  : <?=$key->total?> </h7>
				<br>
				<a href="<?=base_url('kamar/status2')?>">Lihat   <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card border-left-secondary ">
			<?php foreach ($status3 as $key) { ?>
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<h7> <h7 class="text-secondary">Check out</h7> : <?=$key->total?> </h7>
				<br>
				<a href="<?=base_url('kamar/status3')?>">Lihat   <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card border-left-danger ">
			<?php foreach ($status4 as $key) { ?>
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<h7 class="mb-2"> <h7 class="text-danger">Maintenence</h7> : <?=$key->total?> </h7>
				<br>
				<a href="<?=base_url('kamar/status4')?>">Lihat   <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>
	</div>


<!-- Content Row -->

 <div class="row justify-content-lg-center">
	<!-- Area Chart -->
	<div class="col-xl-9">
		<div class="card shadow mb-3">
			<!-- Card Body -->
			<div class="card-body">

				<div class="row">
					<?php foreach ($kamar as $row) { ?>
						<div class="col-md-6 mb-2">
							<div class="card shadow">
								<img class="" style="filter:brightness(50%)" 
								src="<?=$row->foto?>">
								<div class="card-img-overlay">
									<div style="top: 40%; padding: 15%;">
									<h4 class="card-title text-center text-light">Tipe</h4>
									<h2 class="card-text text-center text-light">
									<?=$row->tipe?></h2>
									</div>
								</div>    
							
								<div class="card-body font-weight-bold text-dark">
									<h4> >> Tersedia : <?=$row->total?></h4>   
								</div>

							</div>
						</div>
					<?php } ?> 
				</div>

			</div>
		</div>
	</div>
</div>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data Pengunjung</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?=form_open('pesan')?>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="recipient-name" placeholder="Masukkan Nama Tamu">
          </div>

		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">NIK</label>
            <input type="text" name="nik" class="form-control" id="recipient-name" placeholder="Masukkan NIK">
          </div>

		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="recipient-name" placeholder="Masukkan Alamat">
          </div>

		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Telpon</label>
            <input type="text" name="telpon" class="form-control" id="recipient-name" placeholder="Nomor Telpon">
          </div>

		  <input type="hidden" name="role" value="1">

		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Input</button>
		</div>

        </form>
      </div>

    </div>
  </div>
</div>
	
</body>
</html>