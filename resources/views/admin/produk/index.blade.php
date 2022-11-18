<!-- mengimpor file master.blade.php sebagai kerangka tampilan -->
@extends('admin.layout.master')

@push('css')
<!-- CSS tambahan halaman dashboard jika ada -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Produk</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button onclick="addPost()" type="button" class="btn btn-outline-secondary">Buat Produk</button>
        </div>
      </div>

      <div class="table table-striped table-sm table-responsive">
            <table id="postTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Nama Umkm</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok Produk</th>
                        <th>Gambar Produk</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
      </div>
      @include('admin.produk.detail')
      @include('admin.produk.create')

</main>
@endsection

@push('js')
<!-- JS tambahan halaman dashboard jika ada -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.22/dataRender/ellipsis.js"></script>
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script type="text/javascript">



    loadData();
    // ==========================================================================================
    function loadData(){
        $.ajax({
            'url': "{{ url('admin/api.produk') }}",
            'method': "GET",
            'contentType': 'application/json'
        }).done ( function(data) {
            $('#postTable').dataTable( {
                columnsDefs: [{
                targets: [3],
                render: $.fn.dataTable.render.ellipsis(20)
            }],
            
                destroy: true,
                "aaData": data,
                "columns": [
                    { "data": "id" },
                    { "data": "nama" },
                    { "data": "nama_umkm" },
                    { "data": "nama_produk" },
                    { "data": "deskripsi_produk" },
                    { "data": "harga_produk" },
                    { "data": "stok_produk" },
                    { "data": "gambar_produk",
                              "render": function (data) {
                        return '<img src="/img_produk_upload/'+ data + '" width="150" height="75"/>';
                              } },
                    { "data": "created_at" },
                    { "data": "updated_at" },
                    { "data": "id",
                            "render": function (data) {
                                return '<a onclick="showPost('+data+')" class="btn btn-sm btn-outline-info">'+'Detail'+'</a>'
                                + '<a onclick="editPost('+data+')" class="btn btn-sm btn-outline-warning">'+'Edit'+'</a>'
                                + '<a onclick="deletePost('+data+')" class="btn btn-sm btn-outline-danger">'+'Delete'+'</a>';
                            }
                    }
                ]
            });
        })
    }

    // ==========================================================================================
    function addPost(){
        save_method = 'addPostMethod';
        $('input[name=_method]').val('POST');
        $('#createModal').modal('show');
        $('#createModal form')[0].reset();
        $('.modal-title').text('Buat Produk');
        CKEDITOR.instances.de.setData('');
        $("#gambar_produk").attr('required', '');
    }
    // ==========================================================================================

    function createPost(){
        var id = $('#id').val();
        if (save_method == 'addPostMethod') url = "{{ url('admin/produk') }}";
        else url = "{{ url('admin/produk') . '/' }}" + id;

        for ( instance in CKEDITOR.instances ){
            CKEDITOR.instances[instance].updateElement();
        }

        $.ajax({
            url : url,
            type: "POST",
            data: new FormData($("#createModal form")[0]),
            contentType: false,
            processData: false,
            success:function(data){
                Swal.fire(
                    'Sukses!',
                    data.message,
                    'success'
                );
                $('#createModal').modal('hide');
                loadData();
            },
            error: function() {
                alert("Gagal Buat Produk!");
            }
        })
    }
    // ==========================================================================================

    function showPost(id) {
        $('#detailModal').modal('show');
        $('.modal-title').text('Detail Produk');
        $.ajax({
            url: "{{ url('admin/produk') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#i').text(data.id);
                $('#img_produk').attr('src', '/img_produk_upload/'+data.gambar_produk);
                $('#kate').text(data.nama);
                $('#nm_umkm').text(data.nama_umkm);
                $('#nm_produk').text(data.nama_produk);
                $('#hrg_produk').text(data.harga_produk);
                $('#stk_produk').text(data.stok_produk);
                $('#des_produk').text(data.deskripsi_produk);
                $('#ca').text(data.created_at);
                $('#ua').text(data.updated_at);
            },
            error: function() {
                alert("Tidak Ada Data");
            }
        })
    }

    // ==========================================================================================

    function editPost(id) {
        save_method = 'editPostMethod';
        $('input[name=_method]').val('PATCH');
        $('#createModal').modal('show');
        $('#createModal form')[0].reset();
        $('.modal-title').text('Perbaharui Produk');
        $("#gambar_produk").removeAttr('required');
        
        $.ajax({
            url: "{{ url('admin/produk') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#id').val(data.id);
                $('#kat').val(data.kategori_id);
                $('#nama_umkm').val(data.nama_umkm);
                $('#nama_produk').val(data.nama_produk);
                $('#harga_produk').val(data.harga_produk);
                $('#stok_produk').val(data.stok_produk);
                CKEDITOR.instances.de.setData(data.deskripsi_produk);
            },
            error : function() {
                alert("Tidak Ada Data!");
            }
        });
    }

    // ==========================================================================================
    function deletePost(id) {
        
        Swal.fire({
            title: 'Apakah Kamu Ingin Menghapus?',
            text: "Data Yang Dihapus Tidak Dapat Kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url : "{{ url('admin/produk') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        Swal.fire(
                            'Dihapus!',
                            data.message,
                            'success'
                        )
                        loadData();
                    },
                    error : function() {
                        alert("Tidak Ada Data!");
                    }
                });
            }
        }) 
    }
    // ==========================================================================================
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form){
                form.addEventListener('submit', function(event) {
                    if(form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } form.classList.add('was-validated');
                    if (form.checkValidity() === true) {
                        createPost();
                        event.preventDefault();
                    }
                }, false);
            });
        }, false);
    })();
    
</script>
@endpush