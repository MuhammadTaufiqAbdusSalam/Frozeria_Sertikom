@push('js')

<script>

function editKategori(id,nama,deskripsi){

    Swal.fire({

        title: 'Edit kategori',

        html:
            `
            <input id="swalNama"
                   class="swal2-input"
                   placeholder="Nama kategori"
                   value="${nama}">

            <textarea id="swalDeskripsi"
                      class="swal2-textarea"
                      placeholder="Deskripsi">${deskripsi ?? ''}</textarea>
            `,

        showCancelButton: true,
        confirmButtonText: 'Simpan',

        preConfirm: () => {

            return {

                nama: $('#swalNama').val(),
                deskripsi: $('#swalDeskripsi').val()

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

                    location.reload();

                }

            });

        }

    });

}

</script>

@endpush