@extends('layouts.template')

@section('content')
    <div class="container-fluid pt-4">

        <!-- HEADER -->
        <div class="help-header mb-5">

            <div class="d-flex align-items-center">

                <div class="help-icon mr-3">

                    <i class="fas fa-book-open"></i>

                </div>

                <div>

                    <h2 class="font-weight-bold text-dark mb-1">
                        Panduan Penggunaan Sistem
                    </h2>

                </div>

            </div>

        </div>

        <!-- STEP CARDS -->
        <div class="row">

            <!-- CARD 1 -->
            <div class="col-lg-4 mb-4">

                <div class="card modern-card h-100">

                    <div class="card-body">

                        <div class="step-icon bg-primary-gradient">

                            <i class="fas fa-box-open"></i>

                        </div>

                        <h5 class="font-weight-bold mt-4 mb-4">
                            Cara Menambah Barang
                        </h5>

                        <div class="step-item">

                            <div class="step-number">
                                1
                            </div>

                            <div class="step-text">
                                Buka halaman Dashboard lalu klik tombol
                                <b>Tambah Barang</b>.
                            </div>

                        </div>

                        <div class="step-item">

                            <div class="step-number">
                                2
                            </div>

                            <div class="step-text">
                                Isi data barang seperti nama, kategori,
                                stok, harga, dan foto produk.
                            </div>

                        </div>

                        <div class="step-item mb-0">

                            <div class="step-number">
                                3
                            </div>

                            <div class="step-text">
                                Klik <b>Simpan Barang</b>,
                                data akan otomatis masuk ke dashboard.
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CARD 2 -->
            <div class="col-lg-4 mb-4">

                <div class="card modern-card h-100">

                    <div class="card-body">

                        <div class="step-icon bg-success-gradient">

                            <i class="fas fa-edit"></i>

                        </div>

                        <h5 class="font-weight-bold mt-4 mb-4">
                            Update Stok Barang
                        </h5>

                        <div class="step-item">

                            <div class="step-number">
                                1
                            </div>

                            <div class="step-text">
                                Cari barang melalui fitur pencarian
                                atau filter kategori.
                            </div>

                        </div>

                        <div class="step-item">

                            <div class="step-number">
                                2
                            </div>

                            <div class="step-text">
                                Klik tombol <b>Edit</b>
                                pada barang yang dipilih.
                            </div>

                        </div>

                        <div class="step-item mb-0">

                            <div class="step-number">
                                3
                            </div>

                            <div class="step-text">
                                Ubah jumlah stok kemudian klik
                                <b>Simpan Barang</b>.
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CARD 3 -->
            <div class="col-lg-4 mb-4">

                <div class="card modern-card h-100">

                    <div class="card-body">

                        <div class="step-icon bg-danger-gradient">

                            <i class="fas fa-tags"></i>

                        </div>

                        <h5 class="font-weight-bold mt-4 mb-4">
                            Kelola Kategori
                        </h5>

                        <div class="step-item">

                            <div class="step-number">
                                1
                            </div>

                            <div class="step-text">
                                Buka menu <b>Kategori</b>
                                pada navigasi utama.
                            </div>

                        </div>

                        <div class="step-item">

                            <div class="step-number">
                                2
                            </div>

                            <div class="step-text">
                                Tambahkan, edit,
                                atau hapus kategori sesuai kebutuhan.
                            </div>

                        </div>

                        <div class="step-item mb-0">

                            <div class="step-number">
                                3
                            </div>

                            <div class="step-text">
                                Barang tetap aman meskipun kategori dihapus.
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- INFO ALERT -->
        <div class="info-box mt-2 mb-5">

            <div class="d-flex align-items-start">

                <div class="info-icon mr-3">

                    <i class="fas fa-info-circle"></i>

                </div>

                <div>

                    <h6 class="font-weight-bold mb-1">
                        Informasi Tambahan
                    </h6>

                    <p class="mb-0 text-muted">

                        Satuan barang dapat diisi sesuai kebutuhan seperti:
                        <b>pcs</b>, <b>box</b>, <b>kg</b>, <b>liter</b>,
                        dan satuan lainnya.

                    </p>

                </div>

            </div>

        </div>

        <!-- DEVELOPER -->
        <div class="card developer-card border-0">

            <div class="card-body p-0">

                <div class="row no-gutters">

                    <!-- LEFT -->
                    <div class="col-lg-4 developer-left">

                        <div class="developer-profile">

                            <div class="developer-avatar">

                                <i class="fas fa-user"></i>

                            </div>

                            <h4 class="font-weight-bold mt-3 mb-1">
                                Muhammad Taufiq Abdus Salam
                            </h4>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-8 bg-white">

                        <div class="p-4">

                            <h5 class="font-weight-bold mb-4">
                                Informasi Pengembang
                            </h5>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <div class="info-item">

                                        <small>NIM</small>

                                        <h6>2241760040</h6>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="info-item">

                                        <small>Kelas</small>

                                        <h6>SIB-4D</h6>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="info-item">

                                        <small>Alamat</small>

                                        <h6>Malang, Jawa Timur</h6>

                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="info-item">

                                        <small>No. Telepon</small>

                                        <h6>083166441802</h6>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="info-item">

                                        <small>Email</small>

                                        <h6>
                                            muhammadtaufiqabdussalam12@gmail.com
                                        </h6>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection

@push('css')
    <style>
        body {
            background: #f4f7fb;
        }

        .content-wrapper {
            padding-top: 35px !important;
            background: #f4f7fb;
        }


        .help-header {
            padding: 10px 5px;
        }

        .help-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }


        .modern-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
            transition: 0.3s ease;
            overflow: hidden;
        }

        .modern-card:hover {
            transform: translateY(-6px);
        }

        .step-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
        }

        .bg-success-gradient {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .bg-danger-gradient {
            background: linear-gradient(135deg, #ef4444, #f87171);
        }


        .step-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .step-number {
            min-width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 14px;
        }

        .step-text {
            color: #475569;
            line-height: 1.7;
        }

        .info-box {
            background: white;
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .developer-card {
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.06);
            margin-bottom: 40px;
        }

        .developer-left {
            background: linear-gradient(135deg, #111827, #1f2937);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .developer-profile {
            text-align: center;
            color: white;
        }

        .developer-avatar {
            width: 95px;
            height: 95px;
            border-radius: 24px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            margin: auto;
            box-shadow: 0 10px 24px rgba(37, 99, 235, 0.35);
        }

        .info-item {
            background: #f8fafc;
            border-radius: 16px;
            padding: 18px;
        }

        .info-item small {
            color: #64748b;
            display: block;
            margin-bottom: 5px;
        }

        .info-item h6 {
            margin: 0;
            font-weight: 700;
            color: #111827;
        }

        @media (max-width: 768px) {

            .content-wrapper {
                padding-top: 20px !important;
            }

            .developer-left {
                padding: 35px 20px;
            }

        }
    </style>
@endpush
