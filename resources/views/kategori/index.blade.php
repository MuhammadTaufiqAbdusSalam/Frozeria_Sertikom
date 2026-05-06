@extends('layouts.template')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h4><b>Daftar Kategori</b></h4>
    </div>

    <div class="mb-3">
        <input id="searchKategori" type="text" class="form-control" placeholder="Cari kategori..." value="{{ request('search') }}">
    </div>

    <div class="card">
        <div class="card-body">

            <table id="tableKategori" class="table table-bordered table-hover text-sm">
                <thead class="bg-light">
                    <tr>
                        <th>Nama kategori</th>
                        <th>Jumlah barang</th>
                        <th>Dibuat</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $k)
                    <tr>
                        <td>{{ $k->nama }}</td>
                        <td>
                            <a href="{{ url('/') }}?kategori={{ $k->id }}" class="text-primary">
                                {{ $k->barang_count }} barang
                            </a>
                        </td>
                        <td>{{ optional($k->created_at)->translatedFormat('j M Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary" onclick="editKategori({{ $k->id }}, @js($k->nama))">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="hapusKategori({{ $k->id }})">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- MODAL TAMBAH KATEGORI -->
<div class="modal fade" id="modalKategori">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="{{ route('kategori.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama kategori</label>
                        <input type="text" name="nama" class="form-control" required>
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
    let table = $("#tableKategori").DataTable({
        responsive: true,
        autoWidth: false,
        lengthChange: false,
        pageLength: 5,
        dom: 't<"d-flex justify-content-between mt-2"ip>'
    });

    // Apply initial search from server-side query string
    let initialSearch = $("#searchKategori").val();
    if (initialSearch) {
        table.search(initialSearch).draw();
    }

    // Custom search box to match UI
    $("#searchKategori").on('keyup', function () {
        table.search(this.value).draw();
    });
});

function editKategori(id, nama) {
    Swal.fire({
        title: 'Edit kategori',
        input: 'text',
        inputValue: nama,
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        preConfirm: (value) => {
            if (!value || !value.trim()) {
                Swal.showValidationMessage('Nama kategori wajib diisi');
                return false;
            }
            return value.trim();
        }
    }).then((result) => {
        if (!result.isConfirmed) return;

        $.ajax({
            url: '/kategori/' + id,
            type: 'PUT',
            data: { nama: result.value },
            success: function () {
                location.reload();
            }
        });
    });
}

function hapusKategori(id) {
    Swal.fire({
        title: 'Yakin?',
        text: 'Kategori dan barang di dalamnya akan terhapus!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (!result.isConfirmed) return;

        $.ajax({
            url: '/kategori/' + id,
            type: 'DELETE',
            success: function () {
                location.reload();
            }
        });
    });
}
</script>
@endpush
