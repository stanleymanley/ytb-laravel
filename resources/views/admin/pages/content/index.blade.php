@extends('admin.layouts.base')
@section('title','Daftar Konten')
@section('content')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('/assets/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}"/>
@endpush

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Konten</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                {{-- <div class="dropdown-header">Dropdown Header:</div> --}}
                <a class="dropdown-item" href="{{url('/admin/content/add')}}">Tambah</a>
            </div>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="list_data" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="mdl-remove-konten">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Hapus Konten</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Anda yakin akan menghapus konten '<span id="mdl-param-name"></span>'</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <form id="form-mdl-remove-konten" method="POST" action="">
                @csrf
                <button type="submit" class="btn btn-primary">Hapus</button>
            </form>
        </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{asset('/assets/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
var table;
$(function(){
    $('#list_data').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: `{{url('/admin/content/list')}}`, // URL to fetch data from server
            type: 'GET', // or 'GET' depending on your server-side implementation
            data: function(d) {
                // Additional data to be sent to the server (optional)
                // You can add extra parameters, filters, etc.
            },
        },
        "language": {
            // 'loadingRecords': '&nbsp;',
            'lengthMenu': '_MENU_',
        },
        columns: [
            {
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data:"title"
            },
            {
                data:"status"
            },
        ],
        order: [
            // [6, 'desc'],
        ],
        "columnDefs": [
            {
                "targets": 0,
                "orderable": false
            },

            {
                "targets": 3,
                "orderable": false,
                "className": "text-center",
                "render": function(data, type, row, meta) {
                    var str =`
                        <div class="dropdown">
                            <a href="#" id="actionDropdown-${row.id}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="actionDropdown-${row.id}">
                                <a class="dropdown-item" href="{{url('/admin/content/update/')}}/${row.id}"><i class="fas fa-edit"></i> Edit</a>
                                <a class="dropdown-item" onclick="showRemove('${row.id}','${row.title}')" href="#remove-konten"><i class="fas fa-trash"></i> Hapus</a>
                                <!-- Add more actions here -->
                            </div>
                        </div>
                    `;
                    return str;
                },
            },
        ]
    });
});

function showRemove(id,name){
    $('#mdl-param-name').text(name);
    $('#form-mdl-remove-konten').attr('action',`{{url('/admin/content/remove')}}/`+id)
    $('#mdl-remove-konten').modal('show');
}
</script>
@endpush
@endsection
