@push('js')

<script>

function editKategori(id, nama, deskripsi){

    Swal.fire({

        title: 'Edit kategori',

        html:
            `
            <input
                id="swalNama"
                class="swal2-input"
                placeholder="Nama kategori"
                value="${nama}">

            <div
                id="errorNama"
                style="
                    display:none;
                    color:#dc3545;
                    font-size:13px;
                    margin-top:-10px;
                    margin-bottom:10px;
                    text-align:left;
                ">

                Nama kategori wajib diisi

            </div>

            <textarea
                id="swalDeskripsi"
                class="swal2-textarea"
                placeholder="Deskripsi">${deskripsi ?? ''}</textarea>
            `,

        showCancelButton: true,

        confirmButtonText: 'Simpan',

        focusConfirm: false,

        preConfirm: () => {

            let nama = $('#swalNama').val().trim();

            let deskripsi = $('#swalDeskripsi').val();

            // RESET ERROR
            $('#swalNama').css('border', '1px solid #d9d9d9');

            $('#errorNama').hide();

            // VALIDASI
            if(nama == ''){

                $('#swalNama').css('border', '1px solid #dc3545');

                $('#errorNama').show();

                return false;
            }

            return {

                nama: nama,
                deskripsi: deskripsi

            };

        }

    }).then((result) => {

        if(result.isConfirmed){

            $.ajax({

                url: '/kategori/' + id,

                type: 'PUT',

                data: {

                    nama: result.value.nama,

                    deskripsi: result.value.deskripsi

                },

                success: function(){

                    Swal.fire({

                        icon: 'success',

                        title: 'Berhasil',

                        text: 'Kategori berhasil diupdate',

                        timer: 1500,

                        showConfirmButton: false

                    });

                    setTimeout(() => {

                        location.reload();

                    }, 1500);

                }

            });

        }

    });

}

// HILANGKAN BORDER MERAH SAAT MENGETIK
$(document).on('keyup', '#swalNama', function(){

    $(this).css('border', '1px solid #d9d9d9');

    $('#errorNama').hide();

});

</script>

@endpush