@push('js')

<script>

function hapusKategori(id){

    Swal.fire({

        title: 'Yakin?',
        text: 'Kategori akan dihapus',
        icon: 'warning',

        showCancelButton: true,
        confirmButtonText: 'Ya, hapus'

    }).then((result)=>{

        if(result.isConfirmed){

            $.ajax({

                url: '/kategori/' + id,
                type: 'DELETE',

                success: function(){

                    location.reload();

                }

            });

        }

    });

}

</script>

@endpush