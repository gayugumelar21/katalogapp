<!-- mengimpor file master.blade.php sebagai kerangka tampilan -->
@extends('admin.layout.master')

@push('css')
<!-- CSS tambahan halaman dashboard jika ada -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Akun</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button onclick="#" type="button" class="btn btn-outline-secondary">Buat Akun</button>
        </div>
      </div>

      <div class="table table-striped table-sm table-responsive">
            <table id="postTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Password</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
      </div>

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
            'url': "{{ url('admin/api.akun') }}",
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
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "role" },
                    { "data": "password" },
                    { "data": "created_at" },
                    { "data": "updated_at" },
                    { "data": "id",
                            "render": function (data) {
                                return '<a onclick="#" class="btn btn-sm btn-outline-info">'+'Detail'+'</a>'
                                + '<a onclick="#" class="btn btn-sm btn-outline-warning">'+'Edit'+'</a>'
                                + '<a onclick="#" class="btn btn-sm btn-outline-danger">'+'Delete'+'</a>';
                            }
                    }
                ]
            });
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