 <!-- Content Row -->
<div class="row justify-content-lg-center">
	<div class="col-lg-7">

        <div class="mb-3">
            <a href="<?=base_url('kamar')?>" class="btn btn-warning btn-sm">
                <i class="fa fa-undo"></i> Back
            </a>
        </div>

		<div class="card shadow mb-4">
            <h5 class="text-center text-dark font-weight-bold mt-3 mb-2">TAMBAH KAMAR</h5>
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">

                <?= form_open('kamar/tambah');?>
                    <div class="form-group">
                        <label>Nomor Kamar *</label>
                        <input type="text" name="nomor_kamar" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tipe *</label>
                        <select name="tipe" class="form-control">
                            <option value="" disabled>- Pilih Tipe Kamar -</option>
                            <option value="Standar">Standar</option>
                            <option value="Superior">Superior</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga *</label>
                        <select name="harga" class="form-control">
                            <option value="" disabled>- Harga Kamar -</option>
                            <option value="250000">250000</option>
                            <option value="400000">400000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lantai *</label>
                        <select name="lantai" class="form-control" required>
                            <option value="" disabled>- Lantai Kamar -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" value="ready" name="status" class="form-control" required>
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