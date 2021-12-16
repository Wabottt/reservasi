$(document).ready(function() {
    $('#tgl_masuk, #tgl_keluar, #paket').change(function () {
        if ( ($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
            var oneDay = 24*60*60*1000;
            var firstDate = new Date($("#tgl_masuk").val());
            var secondDate = new Date($("#tgl_keluar").val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
            $("#selisih").val(diffDays);
        }
    });

    $("#paket, #selisih, #tipe").change(function() {
        var selisih = $("#selisih").val();
        var paket  = $("#paket").val();
        var tipe  = $("#tipe").val();
        
        var hasil = parseInt(tipe) + parseInt(paket);
        var total = parseInt(selisih) *  parseInt(hasil);
        $("#total").val(total);
    });

    $("#btn-tambah-form").click(function(){
        
      $("#insert-form").append(
		"<div class='card shadow mb-4'>" +
            "<h5 class='text-center text-dark font-weight-bold mt-3 mb-2'>Pesan Kamar</h5>" +
			"<div class='collapse show' id='collapseCardExample'>" +
				"<div class='card-body'>" +

                "<div class='row mb-3'>" +
                    "<label class='col-lg-4 col-form-label'>Nama_karyawan</label>" +
                    "<div class='col-lg-8'>" +
                    "<input type='text' class='form-control' name='nama_karyawan[]' value='<?=$sesi['username']?>' readonly>" +
                    "</div>" +
                "</div>" +

                "<div class='row mb-3'>"+
                    "<label class='col-lg-4 col-form-label'>Nama Tamu</label>" +
                    "<div class='col-lg-8'>" +
                    "<?php foreach ($tamu as $row) { ?> "+
                        "<input type='text' name='nama[]' value='<?=$row->nama?>' class='form-control' readonly>" +
                        "<input type='hidden' name='nik[]' value='<?=$row->nik?>'>"+
                        "<input type='hidden' name='alamat[]' value='<?=$row->alamat?>' >"+
                        "<input type='hidden' name='telpon[]' value='<?=$row->telpon?>'' >"+
                    "<?php } ?>"+
                    "</div>"+
                "</div>"+

                "<div class='row mb-3'>"+
                    "<label class='col-lg-4 col-form-label'>Tanggal Masuk</label>"+
                    "<div class='col-lg-8'>"+
                    "<input type='date' name='tgl_masuk[]' class='form-control' id='tgl1'>"+ 
                    "</div>"+
                "</div>"+

                "<div class='row mb-3'>"+
                    "<label class='col-lg-4 col-form-label'>Tanggal Keluar</label>"+
                    "<div class='col-lg-8'>"+
                    "<input type='date' name='tgl_keluar[]' class='form-control' id='tgl2'>"+
                    "</div>"+
                "</div>"+

                "<div class='row mb-3'>"+
                    "<label class='col-lg-4 col-form-label'>Lama Inap</label>"+
                    "<div class='col-lg-8'>"+
                    "<input type='text' name='lama[]' class='form-control' id='selisih'>"+
                    "</div>"+
                "</div>"+

                "<div class='row mb-3'>"+
                    "<label class='col-lg-4 col-form-label'>Tipe Kamar</label>"+
                    "<div class='col-lg-8'>"+
                        "<select name='tipe[]' id='tipe' class='form-control'>"+
                            "<option value='' disabled>- Pilih Tipe Kamar -</option>"+
                            
                            "<?php foreach ($kamar as $key) { ?>"+
                            "<option value='<?=$key->harga?>'><?=$key->tipe?></option>"+
                            "<?php } ?>"+
                        "</select>"+
                    "</div>"+
                "</div>"+ 

                "<div class='row mb-3'>"+
                    "<label class='col-lg-4 col-form-label'>Pilih Kamar</label>"+
                    "<div class='col-lg-8'>"+
                        "<select name='nomor_kamar[]' class='form-control'>"+
                            "<option value='' disabled>- Nomor Kamar -</option>"+
                            
                            "<?php foreach ($kamar as $key) { ?>"+
                            "<option value='<?=$key->nomor_kamar?>'><?=$key->nomor_kamar?></option>"+
                            "<?php } ?>"+
                        "</select>"+
                    "</div>"+
                "</div>"+ 

                '<input type="hidden" name="chekout" value="chekout">'+

                "<div class='row mb-3'>"+
                    "<label class='col-lg-4 col-form-label'>Paket</label>"+
                    "<div class='col-lg-8'>"+
                        "<select name='paket[]' id='paket' class='form-control'>"+
                            "<option value='' disabled>- pilih Paket -</option>"+
                            
                            "<?php foreach ($paket as $pak) { ?>"+
                            "<option value='<?=$pak->harga?>'><?=$pak->paket?></option>"+
                            "<?php } ?>"+
                        "</select>"+
                    "</div>"+
                "</div>"+

                "<div class='form-group'>"+
                    "<label class='control-label col-xs-3'>Request Tamu</label>"+
                    "<div class='col-xs-8'>"+
                    "<textarea name='request[]' class='form-control'></textarea>"+
                    "</div>"+
                "</div>"+

                "<div class='form-group'>"+
                    "<label >Total Harga</label>"+
                    "<input name='total[]' class='form-control' id='total'>"+
                "</div>"+

				"</div>"+
			"</div>"+
		"</div>");
      
    });
    
    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); 
    });
});