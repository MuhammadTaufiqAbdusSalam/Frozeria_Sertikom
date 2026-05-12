@push('js')

<script>

function editData(
    id,
    nama,
    kategori,
    stok,
    stok_minimum,
    satuan,
    harga_jual,
    harga_beli,
    berat_ukuran,
    lokasi_simpan,
    deskripsi
) {

    $('#modalForm').modal('show');

    $('#id').val(id);
    $('#nama').val(nama);
    $('#kategori_id').val(kategori);
    $('#stok').val(stok);
    $('#stok_minimum').val(stok_minimum);
    $('#satuan').val(satuan);
    $('#harga_jual').val(harga_jual);
    $('#harga_beli').val(harga_beli);
    $('#berat_ukuran').val(berat_ukuran);
    $('#lokasi_simpan').val(lokasi_simpan);
    $('#deskripsi').val(deskripsi);

}

// SUBMIT
$('#formBarang').submit(function(e) {

    e.preventDefault();

    let id = $('#id').val();

    let url = id
        ? '/barang/' + id
        : '/barang';

    let formData = new FormData();

    formData.append('nama', $('#nama').val());
    formData.append('kategori_id', $('#kategori_id').val());
    formData.append('stok', $('#stok').val());
    formData.append('stok_minimum', $('#stok_minimum').val());
    formData.append('satuan', $('#satuan').val());
    formData.append('harga_jual', $('#harga_jual').val());
    formData.append('harga_beli', $('#harga_beli').val());
    formData.append('berat_ukuran', $('#berat_ukuran').val());
    formData.append('lokasi_simpan', $('#lokasi_simpan').val());
    formData.append('deskripsi', $('#deskripsi').val());

    if ($('#foto')[0].files[0]) {

        formData.append(
            'foto',
            $('#foto')[0].files[0]
        );

    }

    if (id) {

        formData.append('_method', 'PUT');

    }

    $.ajax({

        url: url,
        type: 'POST',
        data: formData,

        processData: false,
        contentType: false,

        success: function() {

            location.reload();

        }

    });

});

</script>

@endpush