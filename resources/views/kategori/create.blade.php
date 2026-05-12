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

            <form method="POST"
                  action="{{ route('kategori.store') }}">

                @csrf

                <div class="modal-body">

                    <div class="form-group">

                        <label>Nama kategori</label>

                        <input type="text"
                               name="nama"
                               class="form-control"
                               required>

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea
                            name="deskripsi"
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

                    <button class="btn btn-success">
                        Simpan Kategori
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>