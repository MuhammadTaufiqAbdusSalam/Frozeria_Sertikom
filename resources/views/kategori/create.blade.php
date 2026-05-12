<!-- MODAL CREATE -->
<div class="modal fade" id="modalKategori">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Tambah Kategori
                </h5>

                <button
                    type="button"
                    class="close"
                    data-dismiss="modal">

                    &times;

                </button>

            </div>

            <form
                id="formKategori"
                method="POST"
                action="{{ route('kategori.store') }}">

                @csrf

                <div class="modal-body">

                    <!-- NAMA KATEGORI -->
                    <div class="form-group">

                        <label>Nama kategori</label>

                        <input
                            type="text"
                            name="nama"
                            id="nama"
                            class="form-control"
                            required>

                        <div class="invalid-feedback">
                            Nama kategori wajib diisi
                        </div>

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea
                            name="deskripsi"
                            id="deskripsi"
                            rows="4"
                            class="form-control"></textarea>

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

                        Simpan Kategori

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- SCRIPT VALIDASI -->
<script>

    // VALIDASI SUBMIT
    $('#formKategori').submit(function(e){

        let valid = true;

        // hapus error sebelumnya
        $('.form-control').removeClass('is-invalid');

        // VALIDASI NAMA
        if($('#nama').val().trim() == ''){

            $('#nama').addClass('is-invalid');

            valid = false;
        }

        // jika ada field kosong
        if(valid == false){

            e.preventDefault();

            return false;
        }

    });

    // HILANGKAN GARIS MERAH SAAT MENGETIK
    $('.form-control').on('keyup change', function(){

        $(this).removeClass('is-invalid');

    });

</script>