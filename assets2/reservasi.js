$(document).ready(function() {
    $("#form").change(function () {
        if ( ($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
            var oneDay = 24*60*60*1000;
            var firstDate = new Date($("#tgl_masuk").val());
            var secondDate = new Date($("#tgl_keluar").val());
            var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
            
            $("#selisih").val(diffDays);
            //batas
            var harga_kamar = $('#tipe_kamar option:selected').data('harga');
            var harga_paket = $('#paket option:selected').data('paket');

            $("#harga_kamar").val(harga_kamar);
            $("#harga_paket").val(harga_paket);

            //batas
            var paket  = $("#harga_paket").val();
            var tipe  = $("#harga_kamar").val();
            var selisih = $("#selisih").val();
            

            //batas          
            var hasil = parseInt(tipe) + parseInt(paket);
            var total = parseInt(selisih) * parseInt(hasil);

            $("#total").val(total);
        }
    });

    $("#total_semua, #form").change(function() {
        var tes  = $("#total").val();
        $("#total_semua").val(tes);

    });

//----------------------------------------------------------------------------------------------------------------------------------->
//----------------------------------------------------------------------------------------------------------------------------------->
});

