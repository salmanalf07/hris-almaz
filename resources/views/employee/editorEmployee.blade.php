@extends('index')

@section('konten')
<style>
    .select2-selection__rendered {
        padding: 6px 0px 5px 0px !important;
    }

    .select2-container .select2-selection--single {
        height: auto !important;
    }
</style>
<section class="content heightContent">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Add {{$judul}}</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{Route('dashboard')}}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">{{$judul}}</a>
                        </li>
                        <li class="breadcrumb-item active">Add {{$judul}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="body">
                        <form id="wizard_with_validation" method="POST">
                            <h3>Profile Information</h3>
                            <fieldset>
                                <div class="card">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="employeeId" placeholder="Employee Id" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="name" placeholder="Name*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input id="myDatePicker" class="flatpickr-input" name="birth" placeholder="Birth*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="gander" name="gander" class="select2-notModals" required>
                                                        <option value="#" disabled selected>Gender*</option>
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="address" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="username" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Profile Detail</h3>
                            <fieldset>
                                <div class="card">
                                    <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="levelId" name="levelId" class="select2-notModals" required>
                                                        <option value="#" disabled selected>Level*</option>
                                                        @foreach ($level as $levels )
                                                        <option value="{{$levels->id}}">{{$levels->level}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="deptId" name="deptId" class="select2-notModals" required>
                                                        <option value="#" disabled selected>Department*</option>
                                                        @foreach ($department as $departments )
                                                        <option value="{{$departments->id}}">{{$departments->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input id="myDatePicker" class="flatpickr-input" name="jointDate" placeholder="Joint Date*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="typeEmployee" name="typeEmployee" class="select2-notModals" required>
                                                        <option value="#" disabled selected>Type Employee*</option>
                                                        @foreach ($typeEmployee as $typeEmployees )
                                                        <option value="{{$typeEmployees->id}}">{{$typeEmployees->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contractNoAttr" class="col-md-4" hidden>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="contractNo" placeholder="Contract No">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contractStAttr" class="col-md-2" hidden>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input id="myDatePicker" class="flatpickr-input" name="contractSt" placeholder="Contract Start*">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contractEdAttr" class="col-md-2" hidden>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input id="myDatePicker" class="flatpickr-input" name="contractEd" placeholder="Contract End*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="status" name="status" class="select2-notModals" required>
                                                        <option value="#" disabled selected>Status*</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Resign">Resign</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                            <h3>Profile Document</h3>
                            <fieldset>
                                <div class="card">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">Photo Profile</h2>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="photo">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 2MB</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">KTP</h2>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="ktpNumber" maxlength="16" minlength="3">
                                                    <label class="form-label">KTP Number</label>
                                                </div>
                                            </div>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="ktp">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">KK</h2>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="kkNumber" maxlength="16" minlength="3">
                                                    <label class="form-label">KK Number</label>
                                                </div>
                                            </div>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="kk">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">NPWP</h2>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="npwpNumber" maxlength="16" minlength="3">
                                                    <label class="form-label">NPWP Number</label>
                                                </div>
                                            </div>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="npwp">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">Ijazah</h2>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="ijazah">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Bank Information</h3>
                            <fieldset>
                                <div class="card">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="bankName" name="bankName" class="select2-notModals">
                                                        <option value="#" disabled selected>Bank Name</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="accNumber" placeholder="Account Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="accName" placeholder="Account Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="accLocation" placeholder="Account Location">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $(function() {
        // //flatpicker date and time picker
        var form = $("#wizard_with_validation").show();
        form.steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slideLeft",
            onInit: function(event, currentIndex) {
                //Set tab width
                var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
                var tabCount = $tab.length;
                $tab.css("width", 100 / tabCount + "%");

                //set button waves effect
                setButtonWavesEffect(event);
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (currentIndex > newIndex) {
                    return true;
                }

                if (currentIndex < newIndex) {
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass(
                        "error"
                    );
                }

                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                setButtonWavesEffect(event);
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                swal("Good job!", "Submitted!", "success");
            },
        });

        form.validate({
            highlight: function(input) {
                $(input).parents(".form-line").addClass("error");
            },
            unhighlight: function(input) {
                $(input).parents(".form-line").removeClass("error");
            },
            errorPlacement: function(error, element) {
                $(element).parents(".form-group").append(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password",
                },
            },
        });
        //date init
        flatpickr("#myDatePicker", {
            dateFormat: "d/m/Y",
            allowInput: true,
            onOpen: function(selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            },
        });

    })
</script>
<script>
    $(document).ready(function() {
        $('#typeEmployee').change(function() {
            var uid = $(this).val();
            if (uid == '9c34859c-fc13-4986-9fa1-89d761e3bf83') {
                $('#contractNoAttr').removeAttr('hidden');
                $('#contractStAttr').attr('hidden', 'hidden');
                $('#contractEdAttr').attr('hidden', 'hidden');
            } else if (uid == '70ec57d3-4f42-4acc-94ca-df781793ee89') {
                $('#contractNoAttr').removeAttr('hidden');
                $('#contractStAttr').removeAttr('hidden');
                $('#contractEdAttr').removeAttr('hidden');
            } else if (uid == '6c1e0a5c-0400-4ef8-9c3d-faba19818601') {
                $('#contractNoAttr').attr('hidden', 'hidden');
                $('#contractStAttr').removeAttr('hidden');
                $('#contractEdAttr').removeAttr('hidden');
            } else {
                $('#contractNoAttr').attr('hidden', 'hidden');
                $('#contractStAttr').attr('hidden', 'hidden');
                $('#contractEdAttr').attr('hidden', 'hidden');
            }
        })

        // Menggunakan Ajax untuk mengambil data dari server
        $.ajax({
            url: '{{route("apiBankIndonesia")}}',
            dataType: 'json',
            success: function(data) {
                // Memasukkan data ke dalam dropdown
                var select = $('#bankName');
                $.each(data, function(key, value) {
                    select.append('<option value="' + value.code + '">' + value.name + '</option>');
                });
            }
        });
    })
</script>
@endsection