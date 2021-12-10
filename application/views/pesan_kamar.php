<!-- Content Row -->
 <div class="row justify-content-lg-center">
	<div class="col-lg-8">

		<div class="card shadow mb-4">
            <h5 class="text-center text-dark font-weight-bold mt-3 mb-2">Pesan Kamar</h5>
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
                <?= form_open('pesan/pesanKamar');?>

                    <div class="form-group">
                        <label>Nama_karyawan</label>
                        <input type="text" class="form-control" name="nama_karyawan" value="<?=$sesi['username']?>" >
                    </div>

                    <div class="form-group">
                        <label>Nama Tamu</label>
                        <?php foreach ($tamu as $row) { ?>
                        <input type="text" name="nama" value="<?=$row->nama?>" class="form-control" required>
                        <input type="hidden" name="nik" value="nik" >
                        <input type="hidden" name="alamat" value="alamat" >
                        <input type="hidden" name="telpon" value="telpon" >
                        <?php } ?>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Tipe Kamar*</label>
                            <select name="tipe" class="form-control">
                                <option value="" disabled>- Pilih Tipe Kamar -</option>
                                
                                <?php foreach ($kamar as $key) { ?>
                                <option value="<?=$key->tipe?>"><?=$key->tipe?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label>Nomor Kamar *</label>
                            <select name="nomor_kamar" class="form-control">
                                <option value="" disabled>- Nomor Kamar -</option>
                                <?php foreach ($kamar as $key) { ?>
                                <option value="<?=$key->nomor_kamar?>"><?=$key->nomor_kamar?></option>
                                <?php } ?>
                            </select>
                        </div>
                    

                        <div class="col-sm-4">
                            <label>Paket *</label>
                            <select name="paket" class="form-control" required>
                                <option value="" disabled>- Lantai Kamar -</option>
                                <?php foreach ($paket as $pak) { ?>
                                <option value="<?=$pak->harga?>"><?=$pak->paket?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label>Tanggal Masuk *</label>
                                <input type="date" name="tgl_masuk" class="form-control">
                        </div>

                        <div class="col-sm-4">
                            <label>Tanggal Keluar *</label>
                                <input type="date" name="tgl_keluar" class="form-control">
                        </div>

                        <div class="col-sm-4">
                            <label>Lama Inap</label>
                                <input type="text" name="lama" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Request Tamu</label>
                        <textarea name="request" class="form-control">

                        </textarea>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fa fa-paper-plane"></i> Tambah
                    </button>

                    <button type="Reset" class="btn btn-outline-secondary btn-sm">
                    Reset
                    </button>
                    </div>

                </form>

				</div>
			</div>
		</div>
	</div>
</div>