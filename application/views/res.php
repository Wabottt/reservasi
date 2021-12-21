'<div class="col-lg-6">'+
'<div class="card shadow mb-4">'+
'<h5 class="text-center text-dark font-weight-bold mt-3">Pesan Kamar</h5>'+
'<hr>'+
'<div class="collapse show" id="collapseCardExample">'+
'<div class="card-body ml-2 mr-2" id="form">'+
'<input type="hidden" class="form-control" name="nama_karyawan[]" value="<?=$sesi['username']?>" readonly>'+
'<div class="form-group row">'+
'<label class="col-lg-4 col-form-label">Nama Tamu</label>'+
'<div class=" col-lg-8">'+
'<?php foreach ($tamu as $row) { ?>'+
'<input type="text" name="nama[]" value="<?=$row->nama?>" class="form-control" readonly>'+
'<input type="hidden" name="nik[]" value="<?=$row->nik?>" >'+
'<input type="hidden" name="alamat[]" value="<?=$row->alamat?>" >'+
'<input type="hidden" name="telpon[]" value="<?=$row->telpon?>" >'+
'<?php } ?>'+
'</div>'+
'</div>'+
'<div class="form-group row">'+
'<label class="col-lg-4 col-form-label">Tanggal Masuk</label>'+
'<div class="col-lg-8">'+
'<input type="date" name="tgl_masuk[]" class="form-control" id="tgl_masuk">'+
'</div>'+
'</div>'+
'<div class="form-group row">'+
'<label class="col-lg-4 col-form-label">Tanggal Keluar</label>'+
'<div class=" col-lg-8">'+
'<input type="date" name="tgl_keluar[]" class="form-control" id="tgl_keluar">'+
'</div>'+
'</div>'+
'<div class="form-group row">'+
'<label class="col-lg-4 col-form-label" readonly>Lama Inap</label>'+
'<div class="col-lg-8">'+
'<input type="text" name="lama[]" class="form-control" id="selisih">'+
'</div>'+
'</div>'+
'<div class="form-group row">'+
'<label class="col-lg-4 col-form-label">Tipe Kamar</label>'+
'<div class="col-lg-8">'+
'<select name="tipe[]" id="tipe_kamar" class="form-control" required>'+
'<option value="">- Pilih Tipe Kamar -</option>'+
'<option value="Standar" data-harga="250000">Standar</option>'+
'<option value="Superior" data-harga="450000">Superior</option>'+
'</select>'+
'</div>'+
'</div>'+
'<input type="hidden" class="form-control" id="harga_kamar">'+
'<input type="hidden" name="chekin" value="chekin">'+
'<div class="form-group row">'+
'<label class="col-lg-4 col-form-label">Paket</label>'+
'<div class="col-lg-8">'+
'<select name="paket[]" id="paket" class="form-control" required>'+
'<option value="" disabled>- pilih Paket -</option>'+
'<?php foreach ($paket as $pak) { ?>'+
'<option data-paket="<?=$pak->harga?>" value="<?=$pak->paket?>"><?=$pak->paket?></option>'+
'<?php } ?>'+
'</select>'+
'</div>'+
'</div>'+
'<input type="hidden" class="form-control" id="harga_paket">'+
'<div class="form-group row">'+
'<label class="col-lg-4 col-form-label">Pilih Kamar</label>'+
'<div class="col-lg-8">'+
'<select name="nomor_kamar[]" class="form-control">'+
'<option value="">- Pilih Nomor Kamar -</option>'+
'<?php foreach ($kamar as $key) { ?>'+
'<option value="<?=$key->nomor_kamar?>"><?=$key->nomor_kamar?></option>'+
'<?php } ?>'+
'</select>'+
'</div>'+
'</div>'+
'<br>'+
'<div class="form-group">'+
'<div>'+
'<textarea name="request[]" class="form-control" placeholder="Request Tamu"></textarea>'+
'</div>'+
'</div>'+
'<div>'+
'<h5  class="text-danger">Total : Rp.<input name="total[]" style="border: none;" id="total" readonly></h5>'+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
'</div>'+
