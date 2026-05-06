@extends('layouts.template')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between mb-3">
        <h4><b>Dashboard</b></h4>
        
    </div>

    <!-- CARD -->
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $totalBarang }}</h3>
                    <p>Total barang</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $totalKategori }}</h3>
                    <p>Total kategori</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $stokMenipis }}</h3>
                    <p>Stok menipis</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>{{ $stokHabis }}</h3>
                    <p>Stok habis</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FILTER -->
    <form method="GET" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control mr-2"
               placeholder="Cari nama barang..." value="{{ request('search') }}">

        <select name="kategori" class="form-control mr-2" style="max-width:200px;">
            <option value="">Semua kategori</option>
            @foreach($kategoris as $k)
                <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-secondary">Cari</button>
    </form>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body">

            <table id="tableBarang" class="table table-bordered table-hover text-sm">
                <thead class="bg-light">
                    <tr>
                        <th>Nama barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga jual</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $b)
                    <tr>
                        <td>{{ $b->nama }}</td>
                        <td>
                            <span class="badge badge-secondary">
                                {{ $b->kategori->nama }}
                            </span>
                        </td>
                        <td>{{ $b->stok }}</td>
                        <td>{{ $b->satuan }}</td>
                        <td>Rp {{ number_format($b->harga,0,',','.') }}</td>
                        <td>
                            <button class="btn btn-sm btn-secondary"
                                onclick="showDetail('{{ $b->nama }}','{{ $b->kategori->nama }}','{{ $b->stok }}','{{ number_format($b->harga,0,',','.') }}')">
                                Detail
                            </button>

                            <button class="btn btn-sm btn-primary"
                                onclick="editData({{ $b->id }},'{{ $b->nama }}',{{ $b->kategori_id }},{{ $b->stok }},'{{ $b->satuan }}',{{ $b->harga }})">
                                Edit
                            </button>

                            <button class="btn btn-sm btn-danger"
                                onclick="hapus({{ $b->id }})">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- MODAL FORM -->
<div class="modal fade" id="modalForm">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Form Barang</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form id="formBarang">
                <div class="modal-body">

                    <input type="hidden" id="id">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select id="kategori_id" class="form-control">
                            @foreach($kategoris as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" id="stok" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" id="satuan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" id="harga" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection


@push('js')
<script>
$(function () {

    $("#tableBarang").DataTable({
        "responsive": true,
        "autoWidth": false,
        "lengthChange": false,
        "pageLength": 5
    });

});

// EDIT
function editData(id,nama,kategori,stok,satuan,harga){
    $('#modalForm').modal('show');

    $('#id').val(id);
    $('#nama').val(nama);
    $('#kategori_id').val(kategori);
    $('#stok').val(stok);
    $('#satuan').val(satuan);
    $('#harga').val(harga);
}

// SUBMIT
$('#formBarang').submit(function(e){
    e.preventDefault();

    let id = $('#id').val();
    let url = id ? '/barang/'+id : '/barang';
    let method = id ? 'PUT' : 'POST';

    $.ajax({
        url: url,
        type: method,
        data: {
            nama: $('#nama').val(),
            kategori_id: $('#kategori_id').val(),
            stok: $('#stok').val(),
            satuan: $('#satuan').val(),
            harga: $('#harga').val(),
        },
        success: function(){
            location.reload();
        }
    });
});

// HAPUS (SweetAlert)
function hapus(id){
    Swal.fire({
        title: 'Yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/barang/'+id,
                type: 'DELETE',
                success: function(){
                    location.reload();
                }
            });
        }
    });
}

// DETAIL
function showDetail(nama,kategori,stok,harga){
    Swal.fire({
        title: nama,
        html:
            "Kategori: "+kategori+"<br>"+
            "Stok: "+stok+"<br>"+
            "Harga: Rp "+harga,
        icon: 'info'
    });
}
</script>
@endpush