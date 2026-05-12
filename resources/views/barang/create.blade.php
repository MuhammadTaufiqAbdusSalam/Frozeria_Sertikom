<!-- MODAL -->
<div class="modal fade" id="modalForm">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Form Barang
                </h5>

                <button
                    type="button"
                    class="close"
                    data-dismiss="modal">

                    &times;

                </button>

            </div>

            <form
                id="formBarang"
                enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <input type="hidden" id="id">

                    <!-- FOTO -->
                    <div class="form-group">

                        <label>Foto barang</label>

                        <input
                            type="file"
                            id="foto"
                            class="form-control">

                    </div>

                    <!-- NAMA -->
                    <div class="form-group">

                        <label>Nama barang</label>

                        <input
                            type="text"
                            id="nama"
                            class="form-control"
                            required>

                        <div class="invalid-feedback">
                            Nama barang wajib diisi
                        </div>

                    </div>

                    <div class="row">

                        <!-- KATEGORI -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Kategori</label>

                                <select
                                    id="kategori_id"
                                    class="form-control"
                                    required>

                                    <option value="">
                                        -- Pilih kategori --
                                    </option>

                                    @foreach ($kategoris as $k)

                                        <option value="{{ $k->id }}">
                                            {{ $k->nama }}
                                        </option>

                                    @endforeach

                                </select>

                                <div class="invalid-feedback">
                                    Kategori wajib dipilih
                                </div>

                            </div>

                        </div>

                        <!-- SATUAN -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Satuan</label>

                                <input
                                    type="text"
                                    id="satuan"
                                    class="form-control"
                                    required>

                                <div class="invalid-feedback">
                                    Satuan wajib diisi
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <!-- STOK -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Jumlah stok</label>

                                <input
                                    type="number"
                                    id="stok"
                                    class="form-control"
                                    required>

                                <div class="invalid-feedback">
                                    Jumlah stok wajib diisi
                                </div>

                            </div>

                        </div>

                        <!-- STOK MINIMUM -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Stok minimum</label>

                                <input
                                    type="number"
                                    id="stok_minimum"
                                    class="form-control"
                                    required>

                                <div class="invalid-feedback">
                                    Stok minimum wajib diisi
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <!-- HARGA JUAL -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Harga jual</label>

                                <input
                                    type="number"
                                    id="harga_jual"
                                    class="form-control"
                                    required>

                                <div class="invalid-feedback">
                                    Harga jual wajib diisi
                                </div>

                            </div>

                        </div>

                        <!-- HARGA BELI -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Harga beli</label>

                                <input
                                    type="number"
                                    id="harga_beli"
                                    class="form-control"
                                    required>

                                <div class="invalid-feedback">
                                    Harga beli wajib diisi
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <!-- BERAT -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Berat / ukuran</label>

                                <input
                                    type="text"
                                    id="berat_ukuran"
                                    class="form-control">

                            </div>

                        </div>

                        <!-- LOKASI -->
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Lokasi simpan</label>

                                <input
                                    type="text"
                                    id="lokasi_simpan"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea
                            id="deskripsi"
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

                    <button
                        type="submit"
                        class="btn btn-success">

                        Simpan Barang

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- SCRIPT VALIDASI -->
<script>

    // VALIDASI SUBMIT
    $('#formBarang').submit(function(e){

        let valid = true;

        // hapus semua error dulu
        $('.form-control').removeClass('is-invalid');

        // VALIDASI NAMA
        if($('#nama').val().trim() == ''){

            $('#nama').addClass('is-invalid');

            valid = false;
        }

        // VALIDASI KATEGORI
        if($('#kategori_id').val() == ''){

            $('#kategori_id').addClass('is-invalid');

            valid = false;
        }

        // VALIDASI SATUAN
        if($('#satuan').val().trim() == ''){

            $('#satuan').addClass('is-invalid');

            valid = false;
        }

        // VALIDASI STOK
        if($('#stok').val() == ''){

            $('#stok').addClass('is-invalid');

            valid = false;
        }

        // VALIDASI STOK MINIMUM
        if($('#stok_minimum').val() == ''){

            $('#stok_minimum').addClass('is-invalid');

            valid = false;
        }

        // VALIDASI HARGA JUAL
        if($('#harga_jual').val() == ''){

            $('#harga_jual').addClass('is-invalid');

            valid = false;
        }

        // VALIDASI HARGA BELI
        if($('#harga_beli').val() == ''){

            $('#harga_beli').addClass('is-invalid');

            valid = false;
        }

        // JIKA ADA YANG KOSONG
        if(valid == false){

            e.preventDefault();

            return false;
        }

    });

    // HILANGKAN GARIS MERAH SAAT DIKETIK
    $('.form-control').on('keyup change', function(){

        $(this).removeClass('is-invalid');

    });

</script>