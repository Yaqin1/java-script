@extends('layout.app')

@section('title')
Kelas
@endsection

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kelas</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Kelas</h3>
            <div class="card-tools">

                <button type="button" onclick="addForm('{{route('kelas.store')}}')" class="btn btn-tool">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>

                </thead>
            </div>
        </table>
            
    </div>


</section>
@includeIf('kelas.form')
@endsection

@push('script')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autowitdh: false,
            ajax: {
                url: '{{ route('kelas.data') }}'
            },
            columns: [{
                    data: 'DT_RowIndex'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'aksi'
                }
            ]
        });
    })

    $('#modalForm').on('submit', function (e) {
        if (!e.preventDefault()) {
            $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
                .done((response) => {
                    $('#modalForm').modal('hide');
                    table.ajax.reload();
                    iziToast.success({
                    title: 'sukses',
                    message: 'Data Berhasil Disimpan',
                    position: 'topRight'
                    })
                })
                .fail((errors) => {
                    iziToast.error({
                    title: 'error',
                    message: 'Data gagal disimpan',
                    position: 'topRight'
                    })
                })
        }
    })

    function addForm(url) {
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Data Kelas');

        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
    }

    function editData(url) {
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Data Kelas');

        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm form [nama=_method]').val('put');

        $.get(url)
            .done((response) => {
                $('#modalForm [name=nama]').val(response.nama);
            })
            .fail((errors) => {
                alert('Tidak Dapat Menampilkan Data');
                return;
            })
    }

    function deleteData(url) {

        swal({
                title: "Yakin ingin menghapus Data Ini?",
                text: "jika Anda klik ok! Maka Data akan Terhapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.post(url, {
                            '_token': $('[name=csrf-token]').attr('content'),
                            '_method': 'delete'
                        })
                        .done((response) => {
                            swal({
                                title: "Sukses",
                                icon: "success",
                                text: "Data Berhasil Dihapus",
                            });
                            return;
                        })
                        .fail((errors) => {
                            swal({
                                title: "Gagal",
                                icon: "error",
                                text: "Data Gagal Dihapus",
                            });
                            return;
                        })
                    table.ajax.reload();
                }
            });
    }
</script>
@endpush