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

    <script src="<?=base_url()?>assets2/reservasi.js"></script>

    <title><?=$title?></title>
</head>
<body>


<script>
$(document).ready(function() {
    var x = 0;
    $("#btn-tambah-form").click(function(){   
        x++;    
        $("#col1").after(
            '<div class="col-lg-6" id="col2">'+
                '<div class="card shadow mb-4">'+
                    '<h5 class="text-center text-dark font-weight-bold mt-3">Pesan Kamar'+x+'</h5>'+

                    '<hr>'+
                    '<div class="collapse show" id="collapseCardExample">'+
                        "<div class='card-body ml-2 mr-2' id='form"+x+"'>"+
                            '<input type="hidden" class="form-control" name="nama_karyawan[]" value="<?=$sesi['username']?>" readonly>'+

                            '<div class="form-group row">'+
                                '<label class="col-lg-4 col-form-label">Nama Tamu</label>'+
                                '<div class=" col-lg-8">'+
                                    '<?php foreach ($tamu as $row) { ?>'+
                                    '<input type="text" name="nama[]" value="<?=$row->nama?>" class="form-control" readonly>'+
                                    '<input type="hidden" name="nik[]" value="<?=$row->nik?>">'+
                                    '<input type="hidden" name="alamat[]" value="<?=$row->alamat?>" >'+
                                    '<input type="hidden" name="telpon[]" value="<?=$row->telpon?>" >'+
                                    '<?php } ?>'+
                                '</div>'+
                            '</div>'+

                            '<div class="form-group row">'+
                                '<label class="col-lg-4 col-form-label">Tanggal Masuk</label>'+
                                '<div class="col-lg-8">'+
                                '<input type="date" name="tgl_masuk[]" class="form-control" id="tgl_masuk'+x+'">'+
                                '</div>'+
                            '</div>'+

                            '<div class="form-group row">'+
                                '<label class="col-lg-4 col-form-label">Tanggal Keluar</label>'+
                                '<div class=" col-lg-8">'+
                                '<input type="date" name="tgl_keluar[]" class="form-control" id="tgl_keluar'+x+'">'+
                                '</div>'+
                            '</div>'+

                            '<div class="form-group row">'+
                                '<label class="col-lg-4 col-form-label" readonly>Lama Inap</label>'+
                                '<div class="col-lg-8">'+
                                '<input type="text" name="lama[]" class="form-control" id="lama_inap'+x+'">'+
                                '</div>'+
                            '</div>'+

                            '<div class="form-group row">'+
                                '<label class="col-lg-4 col-form-label">Tipe Kamar</label>'+
                                '<div class="col-lg-8">'+
                                    '<select name="tipe[]" id="tipe_kamar'+x+'" class="form-control" required>'+
                                        '<option value="">- Pilih Tipe Kamar -</option>'+
                                        '<option value="Standar" data-harga="250000">Standar</option>'+
                                        '<option value="Superior" data-harga="450000">Superior</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+

                            '<input type="hidden" class="form-control" id="harga_kamar'+x+'">'+
                            '<input type="hidden" name="chekin" value="chekin">'+

                            '<div class="form-group row">'+
                                '<label class="col-lg-4 col-form-label">Paket</label>'+
                                '<div class="col-lg-8">'+
                                    '<select name="paket[]" id="paket_kamar'+x+'" class="form-control" required>'+
                                        '<option value="" disabled>- pilih Paket -</option>'+
                                        '<?php foreach ($paket as $pak) { ?>'+
                                        '<option data-paket="<?=$pak->harga?>" value="<?=$pak->paket?>"><?=$pak->paket?></option>'+
                                        '<?php } ?>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+

                            '<input type="hidden" class="form-control" id="harga_paket'+x+'">'+

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
                                '<h5  class="">Total : Rp.<input class="text-danger" name="total[]" style="border: none;" id="total_harga'+x+'" readonly></h5>'+
                            '</div>'+

                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );

            $("#form1").change(function () {
                if ( ($("#tgl_masuk1").val() != "") && ($("#tgl_keluar1").val() != "")) {
                var oneDay = 24*60*60*1000;
                var firstDate = new Date($("#tgl_masuk1").val());
                var secondDate = new Date($("#tgl_keluar1").val());
                var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
                
                $("#lama_inap1").val(diffDays);
                //batas
                var tipe_kamar = $('#tipe_kamar1 option:selected').data('harga');
                var tipe_paket = $('#paket_kamar1 option:selected').data('paket');

                $("#harga_kamar1").val(tipe_kamar);
                $("#harga_paket1").val(tipe_paket);

                //batas
                var harga_paket  = $("#harga_paket1").val();
                var harga_kamar  = $("#harga_kamar1").val();
                var lama_inap = $("#lama_inap1").val();
                

                //batas          
                var sub_total = parseInt(harga_kamar) + parseInt(harga_paket);
                var total_fix = parseInt(lama_inap) * parseInt(sub_total);

                $("#total_harga1").val(total_fix); 
                } 
            });

            $("#form2").change(function () {
                if ( ($("#tgl_masuk2").val() != "") && ($("#tgl_keluar2").val() != "")) {
                var oneDay = 24*60*60*1000;
                var firstDate = new Date($("#tgl_masuk2").val());
                var secondDate = new Date($("#tgl_keluar2").val());
                var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
                
                $("#lama_inap2").val(diffDays);
                //batas
                var tipe_kamar = $('#tipe_kamar2 option:selected').data('harga');
                var tipe_paket = $('#paket_kamar2 option:selected').data('paket');

                $("#harga_kamar2").val(tipe_kamar);
                $("#harga_paket2").val(tipe_paket);

                //batas
                var harga_paket  = $("#harga_paket2").val();
                var harga_kamar  = $("#harga_kamar2").val();
                var lama_inap = $("#lama_inap2").val();
                

                //batas          
                var sub_total = parseInt(harga_kamar) + parseInt(harga_paket);
                var total_fix = parseInt(lama_inap) * parseInt(sub_total);

                $("#total_harga2").val(total_fix); 
                } 
            });

            $("#form3").change(function () {
                if ( ($("#tgl_masuk3").val() != "") && ($("#tgl_keluar3").val() != "")) {
                var oneDay = 24*60*60*1000;
                var firstDate = new Date($("#tgl_masuk3").val());
                var secondDate = new Date($("#tgl_keluar3").val());
                var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
                
                $("#lama_inap3").val(diffDays);
                //batas
                var tipe_kamar = $('#tipe_kamar3 option:selected').data('harga');
                var tipe_paket = $('#paket_kamar3 option:selected').data('paket');

                $("#harga_kamar3").val(tipe_kamar);
                $("#harga_paket3").val(tipe_paket);

                //batas
                var harga_paket  = $("#harga_paket3").val();
                var harga_kamar  = $("#harga_kamar3").val();
                var lama_inap = $("#lama_inap3").val();
                

                //batas          
                var sub_total = parseInt(harga_kamar) + parseInt(harga_paket);
                var total_fix = parseInt(lama_inap) * parseInt(sub_total);

                $("#total_harga3").val(total_fix); 
                } 
            });

        });
        

    $("#btn-reset-form").click(function(){
        $("#col2").last().remove(""); 
    });
});
</script>

<?= form_open('pesan/pesanKamar');?>
<!-- Content Row -->
<div class="row">

    <div class="col-lg-6" id="col1">
        <div class="card shadow mb-4">
        <h5 class="text-center text-dark font-weight-bold mt-3">Pesan Kamar</h5>
        <hr>
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body ml-2 mr-2" id="form">

                    <input type="hidden" class="form-control" name="nama_karyawan[]" value="<?=$sesi['username']?>" readonly>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Nama Tamu</label>
                        <div class=" col-lg-8">
                        <?php foreach ($tamu as $row) { ?>
                            <input type="text" name="nama[]" value="<?=$row->nama?>" class="form-control" readonly>
                            <input type="hidden" name="nik[]" value="<?=$row->nik?>" >
                            <input type="hidden" name="alamat[]" value="<?=$row->alamat?>" >
                            <input type="hidden" name="telpon[]" value="<?=$row->telpon?>" >
                        <?php } ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-lg-8">
                        <input type="date" name="tgl_masuk[]" class="form-control" id="tgl_masuk">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Tanggal Keluar</label>
                        <div class=" col-lg-8">
                        <input type="date" name="tgl_keluar[]" class="form-control" id="tgl_keluar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" readonly>Lama Inap</label>
                        <div class="col-lg-8">
                            <input type="text" name="lama[]" class="form-control" id="selisih">
                        </div>  
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Tipe Kamar</label>
                        <div class="col-lg-8">
                            <select name="tipe[]" id="tipe_kamar" class="form-control" required>
                                <option value="">- Pilih Tipe Kamar -</option>
                                <option value="Standar" data-harga="250000">Standar</option>
                                <option value="Superior" data-harga="450000">Superior</option>
                            </select>
                        </div>
                    </div> 
                    
                    <input type="hidden" class="form-control" id="harga_kamar">
                    <input type="hidden" name="chekin" value="chekin">

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Paket</label>
                        <div class="col-lg-8">
                            <select name="paket[]" id="paket" class="form-control" required>
                                <option value="" disabled>- pilih Paket -</option>
                                <?php foreach ($paket as $pak) { ?>
                                <option data-paket="<?=$pak->harga?>" value="<?=$pak->paket?>"><?=$pak->paket?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="harga_paket">

                    <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Pilih Kamar</label>
                        <div class="col-lg-8">
                            <select name="nomor_kamar[]" class="form-control">
                                <option value="">- Pilih Nomor Kamar -</option>
                                <?php foreach ($kamar as $key) { ?>
                                <option value="<?=$key->nomor_kamar?>"><?=$key->nomor_kamar?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <div>
                        <textarea name="request[]" class="form-control" placeholder="Request Tamu"></textarea>
                        </div>
                    </div>

                    <div>
                        <h5  class="">Total : Rp.<input class="text-danger" name="total[]" style="border: none;" id="total" readonly></h5>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="form-group mt-1">
    <button type="submit" class="btn btn-outline-primary">
    <i class="fa fa-paper-plane"></i> Pesan
    </button>

    <button type="Reset" class="btn btn-outline-secondary">
    Kosongkan
    </button>

    <div style="float: right">
    <button type="button" class="btn btn-success" id="btn-tambah-form"><i class="fa fa-plus"></i>  Tambah Pesanan</button>
    <button type="button" class="btn btn-secondary" id="btn-reset-form"><i class="fa fa-undo"></i></button>
    </div>

    </div> 

</div>

</form>   

</body>
</html>