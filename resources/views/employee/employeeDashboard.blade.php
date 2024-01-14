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
                "targets": [4], // table ke 1
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
                    data: 'gender',
                    title: 'Gender'
                },
                {
                    data: 'details.levels.name',
                    title: 'Level'
                },
                {
                    data: 'aksi',
                    title: 'Action'
                }
            ],
        });
    });
</script>
@endsection