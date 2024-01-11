@extends('index')

@section('konten')
<section class="content" style="height: 87.1vh;">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @include('partials.judul')
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="body">
                        <div class="table-responsive" style="overflow-x:hidden;">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="btn-group m-l-15">
                                        <button id="adddata" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
                                    </div>
                                </div>
                            </div>
                            <table id="dataTable" class="table table-bordered table-striped table-hover" style="width:100%;">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modals -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModal">Form {{$judul}}</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" role="form" id="form-add" enctype="multipart/form-data">
                                @csrf
                                <span id="peringatan"></span>
                                <input type="hidden" id="id" name="id">
                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>
                                <label for="username">Username</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username">
                                    </div>
                                </div>
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>
                                <label for="status">Status</label>
                                <div class="form-group default-select select2Style">
                                    <select id="status" name="status" class="form-control select2" data-placeholder="Select">
                                        <option value="#" selected>-- PLEASE SELECT --</option>
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="NONACTIVE">NONACTIVE</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="save" type="button" class="btn btn-info waves-effect">Save</button>
                            <button id="cancel" onclick='reset_from()' type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modals -->
        </div>
    </div>
</section>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $(function() {
        var oTable = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            "responsive": true,
            "lengthChange": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "autoWidth": true,
            "columnDefs": [{
                "className": "text-center",
                "targets": [0, 3], // table ke 1
            }, ],
            ajax: {
                url: '{{ route("dataTableUser")}}'
            },
            "fnCreatedRow": function(row, data, index) {
                $('td', row).eq(0).html(index + 1);
            },
            columns: [{
                    data: 'id',
                    title: 'No'
                },
                {
                    data: 'name',
                    title: 'Name'
                },
                {
                    data: 'status',
                    title: 'Status'
                },
                {
                    data: 'aksi',
                    title: 'Action'
                }
            ],
        });
    });
    //button add
    $(document).on('click', '#adddata', function() {
        $("#save").removeClass("btn btn-info waves-effect update");
        $("#save").addClass("btn btn-info waves-effect add");
    });
    //add data
    $('.modal-footer').on('click', '.add', function() {
        var form = document.getElementById("form-add");
        var fd = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '{{ route("storeUser") }}',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data[1]) {
                    let text = "";
                    var dataa = Object.assign({}, data[0])
                    for (let x in dataa) {
                        text += '<div class="alert alert-danger"><strong>Oh snap!' + dataa[x] + '</strong>';
                    }
                    $('#peringatan').append(text);
                } else {
                    $('#cancel').trigger('click');
                    reset_from();
                    $('#dataTable').DataTable().ajax.reload();
                }

            },
        });
    });
    $(document).on('click', '#edit', function(e) {
        e.preventDefault();
        var uid = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '{{route("editUser")}}',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': uid,
            },
            success: function(data) {
                //console.log(data);

                //isi form
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#username').val(data.username);
                $('#status').val(data.status).trigger('change');

                id = $('#id').val();

                $('.modal-title').text('Edit Data');
                $("#save").removeClass("btn btn-info waves-effect add");
                $("#save").addClass("btn btn-info waves-effect update");
                $('#exampleModal').modal('show');

            },
        });

    });
    //end edit
    //update
    $('.modal-footer').on('click', '.update', function() {
        var form = document.getElementById("form-add");
        var fd = new FormData(form);
        $.ajax({
            type: 'POST',
            url: '{{route("updateUser")}}',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data[1]) {
                    let text = "";
                    var dataa = Object.assign({}, data[0])
                    for (let x in dataa) {
                        text += '<div class="alert alert-danger"><strong>Oh snap!' + dataa[x] + '</strong>';
                    }
                    $('#peringatan').append(text);
                } else {
                    $('#cancel').trigger('click');
                    reset_from();
                    $('#dataTable').DataTable().ajax.reload();
                }
            }
        });
    });
    //end update
</script>
@endsection