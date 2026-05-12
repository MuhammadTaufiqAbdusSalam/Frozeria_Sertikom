@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <a href="{{ url('/') }}"
               class="btn btn-light border mb-2">

                ← Kembali

            </a>

            <h4>
                <b>Detail Barang</b>
            </h4>

        </div>

    </div>

    <!-- CARD -->
    <div class="card shadow-sm">

        <div class="card-body">

            <!-- TOP -->
            <div class="row mb-4">

                <div class="col-md-2">

                    @if($barang->foto)

                        <img
                            src="{{ asset('storage/' . $barang->foto) }}"
                            class="img-thumbnail"
                            style="
                                width:120px;
                                height:120px;
                                object-fit:cover;
                            ">

                    @else

                        <div
                            class="border d-flex align-items-center justify-content-center"
                            style="
                                width:120px;
                                height:120px;
                            ">

                            Tidak ada foto

                        </div>

                    @endif

                </div>

                <div class="col-md-10">

                    <h3>
                        <b>{{ $barang->nama }}</b>
                    </h3>

                    <span class="badge badge-secondary">
                        {{ $barang->kategori->nama }}
                    </span>

                </div>

            </div>

            <!-- DETAIL -->
            <div class="row">

                <div class="col-md-6 mb-3">

                    <div class="border p-3 h-100">

                        <small class="text-muted">
                            Jumlah stok
                        </small>

                        <h5 class="mb-0 mt-1">

                            <b>
                                {{ $barang->stok }}
                                {{ $barang->satuan }}
                            </b>

                        </h5>

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <div class="border p-3 h-100">

                        <small class="text-muted">
                            Stok minimum
                        </small>

                        <h5 class="mb-0 mt-1">

                            <b>
                                {{ $barang->stok_minimum }}
                                {{ $barang->satuan }}
                            </b>

                        </h5>

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <div class="border p-3 h-100">

                        <small class="text-muted">
                            Harga jual
                        </small>

                        <h5 class="mb-0 mt-1">

                            <b>
                                Rp {{ number_format($barang->harga_jual,0,',','.') }}
                            </b>

                        </h5>

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <div class="border p-3 h-100">

                        <small class="text-muted">
                            Harga beli
                        </small>

                        <h5 class="mb-0 mt-1">

                            <b>
                                Rp {{ number_format($barang->harga_beli,0,',','.') }}
                            </b>

                        </h5>

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <div class="border p-3 h-100">

                        <small class="text-muted">
                            Berat / ukuran
                        </small>

                        <h5 class="mb-0 mt-1">

                            <b>
                                {{ $barang->berat_ukuran }}
                            </b>

                        </h5>

                    </div>

                </div>

                <div class="col-md-6 mb-3">

                    <div class="border p-3 h-100">

                        <small class="text-muted">
                            Lokasi simpan
                        </small>

                        <h5 class="mb-0 mt-1">

                            <b>
                                {{ $barang->lokasi_simpan }}
                            </b>

                        </h5>

                    </div>

                </div>

                <div class="col-md-12">

                    <div class="border p-3">

                        <small class="text-muted">
                            Deskripsi
                        </small>

                        <p class="mb-0 mt-2">

                            {{ $barang->deskripsi }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modalForm">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Edit Barang

                </h5>

                <button
                    type="button"
                    class="close"
                    data-dismiss="modal">

                    &times;

                </button>

            </div>

            <form id="formBarang"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <input type="hidden" id="id">

                    <div class="form-group">

                        <label>Nama barang</label>

                        <input type="text"
                               id="nama"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Jumlah stok</label>

                        <input type="number"
                               id="stok"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Stok minimum</label>

                        <input type="number"
                               id="stok_minimum"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Satuan</label>

                        <input type="text"
                               id="satuan"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Harga jual</label>

                        <input type="number"
                               id="harga_jual"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Harga beli</label>

                        <input type="number"
                               id="harga_beli"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Berat / ukuran</label>

                        <input type="text"
                               id="berat_ukuran"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Lokasi simpan</label>

                        <input type="text"
                               id="lokasi_simpan"
                               class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea id="deskripsi"
                                  class="form-control"
                                  rows="4"></textarea>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                        Batal

                    </button>

                    <button class="btn btn-success">

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

@push('js')

<script>

// EDIT
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
){

    $('#modalForm').modal('show');

    $('#id').val(id);
    $('#nama').val(nama);
    $('#stok').val(stok);
    $('#stok_minimum').val(stok_minimum);
    $('#satuan').val(satuan);
    $('#harga_jual').val(harga_jual);
    $('#harga_beli').val(harga_beli);
    $('#berat_ukuran').val(berat_ukuran);
    $('#lokasi_simpan').val(lokasi_simpan);
    $('#deskripsi').val(deskripsi);

}

// UPDATE
$('#formBarang').submit(function(e){

    e.preventDefault();

    let id = $('#id').val();

    let formData = new FormData();

    formData.append('_method', 'PUT');

    formData.append('nama', $('#nama').val());
    formData.append('kategori_id', '{{ $barang->kategori_id }}');
    formData.append('stok', $('#stok').val());
    formData.append('stok_minimum', $('#stok_minimum').val());
    formData.append('satuan', $('#satuan').val());
    formData.append('harga_jual', $('#harga_jual').val());
    formData.append('harga_beli', $('#harga_beli').val());
    formData.append('berat_ukuran', $('#berat_ukuran').val());
    formData.append('lokasi_simpan', $('#lokasi_simpan').val());
    formData.append('deskripsi', $('#deskripsi').val());

    $.ajax({

        url: '/barang/' + id,
        type: 'POST',
        data: formData,

        processData: false,
        contentType: false,

        success: function(){

            location.reload();

        }

    });

});

// HAPUS
function hapus(id){

    Swal.fire({

        title: 'Yakin?',
        text: 'Barang akan dihapus',
        icon: 'warning',

        showCancelButton: true,
        confirmButtonText: 'Ya, hapus'

    }).then((result)=>{

        if(result.isConfirmed){

            $.ajax({

                url: '/barang/' + id,
                type: 'DELETE',

                success: function(){

                    window.location.href = '/';

                }

            });

        }

    });

}

</script>

@endpush