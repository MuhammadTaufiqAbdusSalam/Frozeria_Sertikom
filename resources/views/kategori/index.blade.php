@extends('layouts.template')

@section('content')

<div class="container-fluid pt-4">

    <!-- HEADER -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>

            <h2 class="font-weight-bold text-dark mb-1">
                Daftar Kategori
            </h2>

        </div>

    </div>

    <!-- CARD TABLE -->
    <div class="card border-0 shadow-modern">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table id="tableKategori"
                       class="table table-hover align-middle modern-table">

                    <thead>

                        <tr>

                            <th>Nama kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah barang</th>
                            <th>Dibuat</th>
                            <th width="180" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($kategoris as $k)

                        <tr>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="kategori-icon mr-3">

                                        <i class="fas fa-tags"></i>

                                    </div>

                                    <div>

                                        <div class="font-weight-bold text-dark">
                                            {{ $k->nama }}
                                        </div>

                                        <small class="text-muted">
                                            Kategori produk
                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="text-muted">

                                    {{ $k->deskripsi ?? 'Tidak ada deskripsi' }}

                                </span>

                            </td>

                            <td>

                                <span class="badge badge-modern">

                                    {{ $k->barang_count }} barang

                                </span>

                            </td>

                            <td>

                                <span class="text-dark font-weight-500">

                                    {{ $k->created_at->translatedFormat('d M Y') }}

                                </span>

                            </td>

                            <td class="text-center">

                                <button
                                    class="btn btn-action btn-edit"
                                    onclick="editKategori(
                                        {{ $k->id }},
                                        '{{ $k->nama }}',
                                        '{{ $k->deskripsi }}'
                                    )">

                                    <i class="fas fa-edit"></i>

                                </button>

                                <button
                                    class="btn btn-action btn-delete"
                                    onclick="hapusKategori({{ $k->id }})">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@include('kategori.create')
@include('kategori.edit')
@include('kategori.delete')

@endsection

@push('css')

<style>

    body {
        background: #f4f7fb;
    }

    /* SPACE DARI HEADER */
    .content-wrapper {
        padding-top: 18px;
    }

    .shadow-modern {
        border-radius: 22px;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .card {
        border: none;
    }

    .modern-table thead th {
        border-top: none !important;
        border-bottom: 2px solid #eef2f7;
        color: #64748b;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 18px 14px;
        background: #f8fafc;
    }

    .modern-table tbody td {
        padding: 18px 14px;
        vertical-align: middle !important;
        border-color: #f1f5f9;
    }

    .modern-table tbody tr {
        transition: all 0.25s ease;
    }

    .modern-table tbody tr:hover {
        background: #f8fbff;
        transform: scale(1.002);
    }

    .kategori-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .badge-modern {
        background: rgba(37, 99, 235, 0.12);
        color: #2563eb;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .btn-modern {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        border: none;
        color: white;
        padding: 10px 18px;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s ease;
        box-shadow: 0 4px 14px rgba(37, 99, 235, 0.25);
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 6px 18px rgba(37, 99, 235, 0.35);
    }

    .btn-action {
        width: 38px;
        height: 38px;
        border: none;
        border-radius: 12px;
        color: white;
        transition: 0.25s ease;
        margin: 0 2px;
    }

    .btn-edit {
        background: linear-gradient(135deg, #0ea5e9, #38bdf8);
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.25);
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #f87171);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
    }

    .btn-action:hover {
        transform: translateY(-2px) scale(1.03);
        color: white;
    }

    .font-weight-500 {
        font-weight: 500;
    }

    /* DATATABLE */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: linear-gradient(135deg, #2563eb, #3b82f6) !important;
        color: white !important;
        border: none !important;
        border-radius: 10px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #eff6ff !important;
        color: #2563eb !important;
        border: none !important;
    }

    .dataTables_filter input {
        border-radius: 12px !important;
        border: 1px solid #dbe2ea !important;
        padding: 8px 12px !important;
    }

    .dataTables_info {
        color: #64748b !important;
    }

</style>

@endpush

@push('js')

<script>

$(function(){

    $("#tableKategori").DataTable({
        responsive: true,
        autoWidth: false,
        lengthChange: false,
        pageLength: 5,
        language: {
            search: "Cari:",
            paginate: {
                previous: "←",
                next: "→"
            },
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data"
        }
    });

});

</script>

@endpush