$(document).ready( function () {
    $('#table-barang').DataTable();
    $('#table-barang-masuk').DataTable({
        order: [[ 0, 'desc' ]],
    });
    $('#table-barang-keluar').DataTable({
        order: [[ 0, 'desc' ]],
    });
    $('#table-kategori').DataTable();
    $('#table-kondisi').DataTable();
    $('#table-laporan').DataTable({
        order: [[ 0, 'desc' ]],
    });
    $('#table-stok-barang').DataTable();
    $('#track-add').DataTable({
        order: [[ 0, 'desc' ]],
    });
    $('#table-akun').DataTable();
    $('#cetak-laporan1').DataTable({
        order: [[ 0, 'desc' ]],
        paging: false,
        bFilter: false,
        ordering: false,
    });
    $('#cetak-laporan2').DataTable({
        order: [[ 0, 'desc' ]],
        paging: false,
        bFilter: false,
        ordering: false,
    });
});

setTimeout(() => {
    var alert = document.getElementById('alert-animation');
    alert.style.display = "none";
}, 3500);

var admin_bars = document.getElementById("admin-bars");
var admin_list = document.getElementById("admin-list");
admin_bars.addEventListener("click", function(){
    if(admin_list.style.display === "none"){
        admin_list.style.display = "flex";
    }
    else{
        // admin_list.removeAttribute("style");
        admin_list.style.display = "none";
    }
});

function checkFileSelection() {
    var fileInput = document.getElementById('foto');
    var statusFoto = document.getElementById('statusFoto');
    var showhideFoto = document.getElementById('showhideFoto');

    if (fileInput.files.length > 0) {
        statusFoto.innerHTML = "<i class='fa-solid fa-check'></i>Foto telah terpilih";
        statusFoto.style.backgroundColor = "#304D30";
        showhideFoto.style.display = "flex";
    } else {
        statusFoto.innerHTML = "Pilih Foto";
        showhideFoto.style.display = "none";
    }
}

function hapusFoto() {
    var fileInput = document.getElementById('foto');
    var statusFoto = document.getElementById('statusFoto');
    var showhideFoto = document.getElementById('showhideFoto');

    fileInput.value = null;
    statusFoto.innerHTML = "Foto telah dihapus";
    statusFoto.removeAttribute("style")
    showhideFoto.style.display = "none";
}

function formatUang(input){
    let value = input.value.replace(/[^0-9]/g, '');
    value = new Intl.NumberFormat({ style: 'currency', currency: 'IDR' }).format(value);
    input.value = value;
}

function ambil_detail_masuk(){
    var id_barang = document.getElementById("id_barang");
    var nama_barang = document.getElementById("nama_barang");
    var kategori = document.getElementById("kategori");
    var kondisi = document.getElementById("kondisi");
    var harga = document.getElementById("harga_jual");

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "inc/onchange.php", true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText);
            console.log(data);

            for(var a = 0; a < data.length; a++){
                var id = data[a].id_barang;
                var nm = data[a].nama_barang;
                var cat = data[a].kategori;
                var knd = data[a].kondisi;
                var hrg = data[a].harga;

                if(nama_barang.value === nm){
                    id_barang.value = id;
                    kategori.value = cat;
                    kondisi.value = knd;
                    harga.value = hrg;
                }
            }
        }
    }
}

function ambil_detail_keluar(){
    var id_barang = document.getElementById("id_barang");
    var nama_barang = document.getElementById("nama_barang");
    var kategori = document.getElementById("kategori");
    var harga = document.getElementById("harga_jual");

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "inc/onchange.php", true);
    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText);
            console.log(data);

            for(var a = 0; a < data.length; a++){
                var id = data[a].id_barang;
                var nm = data[a].nama_barang;
                var cat = data[a].kategori;
                var hrg = data[a].harga;

                if(nama_barang.value === nm){
                    id_barang.value = id;
                    kategori.value = cat;
                    harga.value = hrg;
                }
            }
        }
    }
}