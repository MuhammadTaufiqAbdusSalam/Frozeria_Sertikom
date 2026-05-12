@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <!-- HEADER -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

            <div>
                <h2 class="font-weight-bold mb-1 text-dark">
                    Dashboard Barang
                </h2>
            </div>

        </div>

        <!-- CARD STATISTIK -->
        <div class="row">

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="card border-0 shadow-sm h-100 card-dashboard">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    Total Barang
                                </p>

                                <h2 class="font-weight-bold text-dark">
                                    {{ $totalBarang }}
                                </h2>

                            </div>

                            <div class="icon-card bg-success">
                                <i class="fas fa-box"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="card border-0 shadow-sm h-100 card-dashboard">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    Total Kategori
                                </p>

                                <h2 class="font-weight-bold text-dark">
                                    {{ $totalKategori }}
                                </h2>

                            </div>

                            <div class="icon-card bg-primary">
                                <i class="fas fa-tags"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="card border-0 shadow-sm h-100 card-dashboard">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    Stok Menipis
                                </p>

                                <h2 class="font-weight-bold text-warning">
                                    {{ $stokMenipis }}
                                </h2>

                            </div>

                            <div class="icon-card bg-warning">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="card border-0 shadow-sm h-100 card-dashboard">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    Stok Habis
                                </p>

                                <h2 class="font-weight-bold text-danger">
                                    {{ $stokHabis }}
                                </h2>

                            </div>

                            <div class="icon-card bg-danger">
                                <i class="fas fa-times-circle"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- FILTER -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                <form method="GET">

                    <div class="row align-items-end">

                        <div class="col-md-5 mb-3">

                            <label class="font-weight-semibold">
                                Cari Barang
                            </label>

                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                </div>

                                <input type="text" name="search" class="form-control border-left-0"
                                    placeholder="Cari nama barang..." value="{{ request('search') }}">

                            </div>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="font-weight-semibold">
                                Filter Kategori
                            </label>

                            <select name="kategori" class="form-control">

                                <option value="">
                                    Semua kategori
                                </option>

                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}"
                                        {{ request('kategori') == $k->id ? 'selected' : '' }}>

                                        {{ $k->nama }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-3 mb-3">

                            <button class="btn btn-dark btn-block shadow-sm">

                                <i class="fas fa-filter mr-1"></i>
                                Filter Data

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- TABLE -->
        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white border-0 pt-4 pb-0">

                <h5 class="font-weight-bold text-dark">
                    Data Barang
                </h5>

            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table id="tableBarang" class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>Foto</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga Jual</th>
                                <th class="text-center" width="220">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($barangs as $b)
                                <tr>

                                    <td width="90">

                                        @if ($b->foto)
                                            <img src="{{ asset('storage/' . $b->foto) }}" class="img-barang">
                                        @else
                                            <div class="foto-kosong">

                                                <i class="fas fa-image"></i>

                                            </div>
                                        @endif

                                    </td>

                                    <td>

                                        <div class="font-weight-bold text-dark">
                                            {{ $b->nama }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $b->berat_ukuran }}
                                        </small>

                                    </td>

                                    <td>

                                        <span class="badge badge-pill badge-secondary px-3 py-2">

                                            {{ $b->kategori->nama }}

                                        </span>

                                    </td>

                                    <td>

                                        @if ($b->stok <= 0)
                                            <span class="badge badge-danger badge-pill px-3 py-2">
                                                {{ $b->stok }} {{ $b->satuan }}
                                            </span>
                                        @elseif ($b->stok <= $b->stok_minimum)
                                            <span class="badge badge-warning badge-pill px-3 py-2 text-dark">
                                                {{ $b->stok }} {{ $b->satuan }}
                                            </span>
                                        @else
                                            <span class="badge badge-success badge-pill px-3 py-2">
                                                {{ $b->stok }} {{ $b->satuan }}
                                            </span>
                                        @endif

                                    </td>

                                    <td>

                                        <span class="font-weight-bold text-success">

                                            Rp {{ number_format($b->harga_jual, 0, ',', '.') }}

                                        </span>

                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('barang.show', $b->id) }}"
                                            class="btn btn-info btn-sm rounded-pill px-3">

                                            <i class="fas fa-eye"></i>

                                        </a>

                                        <button class="btn btn-primary btn-sm rounded-pill px-3"
                                            onclick="editData(
                                                {{ $b->id }},
                                                '{{ $b->nama }}',
                                                '{{ $b->kategori_id }}',
                                                '{{ $b->stok }}',
                                                '{{ $b->stok_minimum }}',
                                                '{{ $b->satuan }}',
                                                '{{ $b->harga_jual }}',
                                                '{{ $b->harga_beli }}',
                                                '{{ $b->berat_ukuran }}',
                                                '{{ $b->lokasi_simpan }}',
                                                '{{ $b->deskripsi }}'
                                            )">

                                            <i class="fas fa-edit"></i>

                                        </button>

                                        <button class="btn btn-danger btn-sm rounded-pill px-3"
                                            onclick="hapus({{ $b->id }})">

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

    @include('barang.create')
    @include('barang.edit')
    @include('barang.delete')
@endsection

@push('css')
    <style>
        body {
            background-color: #f4f6f9;
        }

        /* SPACE DARI HEADER */
        .content-wrapper {
            padding-top: 18px;
        }

        .card-dashboard {
            border-radius: 18px;
            transition: 0.3s ease;
        }

        .card-dashboard:hover {
            transform: translateY(-4px);
        }

        .icon-card {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            border-top: none;
            border-bottom: 2px solid #f1f1f1;
            color: #6c757d;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            vertical-align: middle !important;
        }

        .img-barang {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 14px;
            border: 2px solid #f1f1f1;
        }

        .foto-kosong {
            width: 65px;
            height: 65px;
            border-radius: 14px;
            background: #f1f3f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #adb5bd;
            font-size: 22px;
        }

        .badge-pill {
            font-size: 12px;
        }

        .btn {
            border-radius: 10px;
        }

        .card {
            border-radius: 18px;
        }

        .form-control,
        .input-group-text {
            height: 45px;
            border-radius: 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #007bff !important;
            color: white !important;
            border: none !important;
            border-radius: 8px;
        }
    </style>
@endpush

@push('js')
    <script>
        $(function() {

            $("#tableBarang").DataTable({
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
