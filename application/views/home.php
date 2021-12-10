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


	<div class="row mb-4">
		<div class="col-lg-3">
			<div class="card border-left-primary ">
			<?php foreach ($kamar as $key) { ?>
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<h7> On Cleaning : <?=$key->total?> </h7>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card border-left-primary ">
			<?php foreach ($kamar as $key) { ?>
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<h7> On Cleaning : <?=$key->total?> </h7>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card border-left-primary ">
			<?php foreach ($kamar as $key) { ?>
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<h7> On Cleaning : <?=$key->total?> </h7>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card border-left-primary ">
			<?php foreach ($kamar as $key) { ?>
			<div class="card-body shadow py-3">
				<div  class="text-center text-dark font-weight-bold">
				<h8 class="">Status Kamar</h8><br>
				<h7> On Cleaning : <?=$key->total?> </h7>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>
	</div>


<!-- Content Row -->

 <div class="row">
	<!-- Area Chart -->
	<div class="col-xl-8 col-lg-7">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Kamar Tersedia</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-out"
						aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Dropdown Header:</div>
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body">

				<div class="row justify-content-lg-center">
					<?php foreach ($detail as $row) { ?>
						<div class="col-md-6 mb-2">
							<div class="card shadow">
								<img class="" style="filter:brightness(50%)" 
								src="<?=$row->foto?>">
								<div class="card-img-overlay">
									<div style="top: 30%; padding: 10%;">
									<h5 class="card-title text-center text-light">
									Tipe</h5>
									<h3 class="card-text text-center text-light">
									<?=$row->tipe?></h1>
									</div>
								</div>    
							
								<div class="card-body font-weight-bold text-dark">
									<h5>Kamar Tersedia  : <?=$row->total?></h5>   
								</div>

							</div>
						</div>
					<?php } ?> 
				</div>

			</div>
		</div>
	</div>

	<!-- Pie Chart -->
	<div class="col-xl-4 col-lg-5">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div
				class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
						aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Dropdown Header:</div>
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				............................
			</div>
		</div>
	</div>
</div>

 <!-- Content Row -->
<div class="row">
	<div class="col">
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
				role="button" aria-expanded="true" aria-controls="collapseCardExample">
				<h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					This is a collapsable card example using Bootstrap's built in collapse
					functionality. <strong>Click on the card header</strong> to see the card body
					collapse and expand!
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