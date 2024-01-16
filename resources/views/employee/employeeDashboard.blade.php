@extends('index')

@section('konten')
<section class="content heightContent">
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
                                        <a href="{{route('addEmployee')}}" class="btn btn-info">
                                            Add New
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="dataTable" class="table table-bordered table-striped table-hover" style="width:100%;">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                "targets": [2, 5, 6], // table ke 1
            }, ],
            ajax: {
                url: '{{ route("dataTableEmployee")}}'
            },
            "fnCreatedRow": function(row, data, index) {
                $('td', row).eq(0).html(index + 1);
            },
            columns: [{
                    data: 'empId',
                    title: 'Employee Id'
                },
                {
                    data: 'name',
                    title: 'Name'
                },
                {
                    data: 'gander',
                    title: 'Gender'
                },
                {
                    data: 'details.levels.level',
                    title: 'Level'
                },
                {
                    data: 'details.departments.name',
                    title: 'Department'
                },
                {
                    data: 'details.status',
                    title: 'Status'
                },
                {
                    data: 'aksi',
                    title: 'Action'
                }
            ],
        });
    });
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        if (confirm('Yakin akan menghapus data ini?')) {
            // alert("Thank you for subscribing!" + $(this).data('id') );

            $.ajax({
                type: 'DELETE',
                url: '{{route("deleteEmployee")}}',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': $(this).data('id')
                },
                success: function(data) {
                    alert("Data Berhasil Dihapus");
                    $('#dataTable').DataTable().ajax.reload();
                }
            });

        } else {
            return false;
        }
    });
</script>
@endsection