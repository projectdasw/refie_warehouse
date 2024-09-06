// SERVER SIDE PROCESSING
$('#datamaster_aktivitas').DataTable({
    serverSide: true,
    processing: true,
    ajax: {
        url: 'inc/datamaster_aktivitas.php',
        type: 'post'
    },
    order: [[0, 'desc']],
    columnDefs: [
        {
            target: 0,
            visible: false,
        },
    ]
});

$('#datamaster_barangmasuk').DataTable({
    serverSide: true,
    processing: true,
    ajax: {
        url: 'inc/datamaster_barangmasuk.php',
        type: 'post'
    },
    order: [[0, 'desc']],
    columnDefs: [
        {
            target: 0,
            visible: false,
        },
    ]
});

$('#datamaster_barangkeluar').DataTable({
    serverSide: true,
    processing: true,
    ajax: {
        url: 'inc/datamaster_barangkeluar.php',
        type: 'post'
    },
    order: [[0, 'desc']],
    columnDefs: [
        {
            target: 0,
            visible: false,
        },
    ]
});

$('#datamaster_barang').DataTable({
    serverSide: true,
    processing: true,
    ajax: {
        url: 'inc/datamaster_barang.php',
        type: 'post'
    },
    order: false,
});

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

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
})()

$( '#nama_barang_select' ).select2( {
    theme: 'bootstrap-5',
    allowClear: true
} );

$( '#kategori_select' ).select2( {
    theme: 'bootstrap-5',
    allowClear: true
} );

$( '#kondisi_select' ).select2( {
    theme: 'bootstrap-5',
    allowClear: true
} );

$( '#level_edit' ).select2( {
    theme: 'bootstrap-5',
    allowClear: true,
} );

$( '#level_add' ).select2( {
    theme: 'bootstrap-5',
    allowClear: true,
    dropdownParent: $('#modal_tambahakun')
} );

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
        statusFoto.innerHTML =
            "<i class='fa-solid fa-check text-light me-2 text-light'></i><span class='text-light'>Foto telah terpilih</span>";
        statusFoto.style.backgroundColor = "#304D30";
        showhideFoto.style.display = "flex";
    }
}

function hapusFoto() {
    var fileInput = document.getElementById('foto');
    var statusFoto = document.getElementById('statusFoto');
    var showhideFoto = document.getElementById('showhideFoto');

    fileInput.value = null;
    statusFoto.innerHTML = "Pilihan Foto telah dihapus";
    statusFoto.removeAttribute("style")
    showhideFoto.style.display = "none";
}

function formatUang(input){
    let value = input.value.replace(/[^0-9]/g, '');
    value = new Intl.NumberFormat({ style: 'currency', currency: 'IDR' }).format(value);
    input.value = value;
}

function ambil_detail(){
    var id_barang = document.getElementById("id_barang");
    var nama_barang = document.getElementById("nama_barang");
    var kategori = document.getElementById("kategori");
    var harga = document.getElementById("harga");

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
                else{
                    id_barang.value = null;
                    kategori.value = null;
                    harga.value = null;
                }
            }
        }
    }
}