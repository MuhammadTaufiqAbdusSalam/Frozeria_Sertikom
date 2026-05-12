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

                    <div class="form-group">

                        <label>Foto barang</label>

                        <input
                            type="file"
                            id="foto"
                            class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Nama barang</label>

                        <input
                            type="text"
                            id="nama"
                            class="form-control">

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Kategori</label>

                                <select
                                    id="kategori_id"
                                    class="form-control">

                                    @foreach ($kategoris as $k)

                                        <option value="{{ $k->id }}">
                                            {{ $k->nama }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Satuan</label>

                                <input
                                    type="text"
                                    id="satuan"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Jumlah stok</label>

                                <input
                                    type="number"
                                    id="stok"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Stok minimum</label>

                                <input
                                    type="number"
                                    id="stok_minimum"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Harga jual</label>

                                <input
                                    type="number"
                                    id="harga_jual"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Harga beli</label>

                                <input
                                    type="number"
                                    id="harga_beli"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Berat / ukuran</label>

                                <input
                                    type="text"
                                    id="berat_ukuran"
                                    class="form-control">

                            </div>

                        </div>

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

                    <button class="btn btn-success">
                        Simpan Barang
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>