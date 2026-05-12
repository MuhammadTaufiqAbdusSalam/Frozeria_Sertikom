@push('js')

<script>

function hapus(id) {

    Swal.fire({

        title: 'Yakin?',
        text: 'Data barang akan dihapus',
        icon: 'warning',

        showCancelButton: true,
        confirmButtonText: 'Ya, hapus'

    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({

                url: '/barang/' + id,
                type: 'DELETE',

                success: function() {

                    location.reload();

                }

            });

        }

    });

}

</script>

@endpush