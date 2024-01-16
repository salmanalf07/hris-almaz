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
                        <span id="peringatan"></span>
                        <form id="wizard_with_validation" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id" id="id" hidden />
                            <h3>Profile Information</h3>
                            <fieldset>
                                <div class="card">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="employeeId" name="employeeId" placeholder="Employee Id" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name*" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="flatpickr-input picker-form" id="birth" name="birth" placeholder="Birth*">
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
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="role" name="role[]" class="select2-notModals" multiple="" data-placeholder="Select your role">
                                                        @foreach($role as $roles)
                                                        <option value="{{$roles->name}}">{{$roles->name}}</option>
                                                        @endforeach
                                                    </select>
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
                                                    <select id="levelId" name="levelId" class="select2-notModals" style="width: 100%;" required>
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
                                                    <select id="deptId" name="deptId" class="select2-notModals" style="width: 100%;" required>
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
                                                    <input id="jointDate" class="flatpickr-input picker-form" name="jointDate" placeholder="Joint Date*" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="typeEmployee" name="typeEmployee" class="select2-notModals" style="width: 100%;" required>
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
                                                    <input type="text" class="form-control" id="contractNo" name="contractNo" placeholder="Contract No">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contractStAttr" class="col-md-2" hidden>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="flatpickr-input picker-form" id="contractSt" name="contractSt" placeholder="Contract Start">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contractEdAttr" class="col-md-2" hidden>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input class="flatpickr-input picker-form" id="contractEd" name="contractEd" placeholder="Contract End">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="status" name="status" class="select2-notModals" style="width: 100%;" required>
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
                                                    <input type="file" id="photo" name="photo">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 2MB</div>
                                                </div>
                                            </div>
                                            <div class="currentPhoto" hidden>
                                                <div class="d-flex align-items-center ml-2">
                                                    <p style="margin-top: revert;margin-right:1rem">Current Photo:</p>
                                                    <button id="currentPhoto" type="button" class="btn">View Photo</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">KTP</h2>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="ktpNumber" name="ktpNumber" maxlength="16" minlength="3">
                                                    <label class="form-label">KTP Number</label>
                                                </div>
                                            </div>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" id="ktp" name="ktp">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                            <div class="currentKtp" hidden>
                                                <div class="d-flex align-items-center ml-2">
                                                    <p style="margin-top: revert;margin-right:1rem">Current KTP:</p>
                                                    <button id="currentKtp" type="button" class="btn">View KTP</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">KK</h2>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="kkNumber" name="kkNumber" maxlength="16" minlength="3">
                                                    <label class="form-label">KK Number</label>
                                                </div>
                                            </div>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="kk" id="kk">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                            <div class="currentKk" hidden>
                                                <div class="d-flex align-items-center ml-2">
                                                    <p style="margin-top: revert;margin-right:1rem">Current KK:</p>
                                                    <button id="currentKk" type="button" class="btn">View KK</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">NPWP</h2>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="npwpNumber" name="npwpNumber" maxlength="16" minlength="3">
                                                    <label class="form-label">NPWP Number</label>
                                                </div>
                                            </div>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" id="npwp" name="npwp">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                            <div class="currentNpwp" hidden>
                                                <div class="d-flex align-items-center ml-2">
                                                    <p style="margin-top: revert;margin-right:1rem">Current NPWP:</p>
                                                    <button id="currentNpwp" type="button" class="btn">View NPWP</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2 class="card-inside-title">Ijazah</h2>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" id="ijazah" name="ijazah">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                    <div class="help-info">Max file size is 1MB</div>
                                                </div>
                                            </div>
                                            <div class="currentIjazah" hidden>
                                                <div class="d-flex align-items-center ml-2">
                                                    <p style="margin-top: revert;margin-right:1rem">Current Ijazah:</p>
                                                    <button id="currentIjazah" type="button" class="btn">View Ijazah</button>
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
                                                    <select id="bankName" name="bankName" class="select2-notModals" style="width: 100%;">
                                                        <option value="#" disabled selected>Bank Name</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="accNumber" name="accNumber" placeholder="Account Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="accName" name="accName" placeholder="Account Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="acclocation" name="acclocation" placeholder="Account Location">
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
    <!-- modals -->
    <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Document</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="player"></div>
                </div>
                <div class="modal-footer">
                    <button id="cancel" type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancel</button>
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
                // Submit the form using AJAX
                if ('{{isset($aksi) && $aksi == "editData"}}') {
                    var link = "{{ route('updateEmployee') }}";
                } else {
                    var link = "{{ route('storeEmployee') }}";
                }

                var formData = new FormData($('#wizard_with_validation')[0]);
                $.ajax({
                    type: 'POST',
                    url: link,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // Handle the success response
                        if (data[1]) {
                            var dataa = Object.assign({}, data[0])
                            for (let x in dataa) {
                                text = '<div class="alert alert-danger"><strong>Oh snap!' + dataa[x] + '</strong>';
                                $('#peringatan').append(text);
                            }
                        } else {
                            window.location.href = "{{ route('employeeDashboard') }}";
                        }
                    },
                    error: function(error) {
                        // Handle the error response, if needed
                        alert("Oops!", "Something went wrong!", "error");
                    }
                });
            }
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
        flatpickr(".picker-form", {
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

        //edit data
        if ('{{isset($aksi) && $aksi == "editData"}}') {
            $('#id').val('{!! isset($data) ? $data->id : "" !!}');
            $('#employeeId').val('{!! isset($data) ? $data->empId : "" !!}');
            $('#name').val('{!! isset($data) ? $data->name : "" !!}');
            $('#birth').val(('{!! isset($data) ? $data->birth : "" !!}').split("-").reverse().join("/"));
            $('#gander').val('{!! isset($data) ? $data->gander : "" !!}').trigger('change');
            $('#phone').val('{!! isset($data) ? $data->phone : "" !!}');
            $('#address').val('{!! isset($data) ? $data->address : "" !!}');
            $('#username').val('{!! isset($data->users) ? $data->users->username : "" !!}');
            <?php
            // Contoh data roles dari PHP
            $dataRoles = isset($data->users) ? $data->users->roles : [];
            // Ubah hanya jika $dataRoles bukan array
            $dataRolesArray = is_array($dataRoles) ? $dataRoles : $dataRoles->toArray();
            // Ambil hanya nilai dari properti "name" dan ubah menjadi string dengan koma sebagai pemisah
            $resultString = implode(',', array_column($dataRolesArray, 'name'));
            ?>

            var rawRole = '{!! $resultString !!}';
            var dataArray = rawRole.split(",");
            $('#role').val(dataArray).trigger('change');

            $('#levelId').val('{!! isset($data->details) ? $data->details->levelId : "" !!}').trigger('change');
            $('#deptId').val('{!! isset($data->details) ? $data->details->deptId : "" !!}').trigger('change');
            $('#jointDate').val(('{!! isset($data->details) ? $data->details->joinDate : "" !!}').split("-").reverse().join("/"))
            $('#typeEmployee').val('{!! isset($data->details) ? $data->details->typeEmployeeId : "" !!}').trigger('change');
            $('#contractNo').val('{!! isset($data->details) ? $data->details->contractNo : "" !!}');
            $('#contractSt').val(('{!! isset($data->details) ? $data->details->contractSt : "" !!}').split("-").reverse().join("/"))
            $('#contractEd').val(('{!! isset($data->details) ? $data->details->contractEd : "" !!}').split("-").reverse().join("/"))
            $('#status').val('{!! isset($data->details) ? $data->details->status : "" !!}').trigger('change');
            if ('{!! isset($data->files->photo)!!}') {
                $('.currentPhoto').removeAttr('hidden');
                document.getElementById('currentPhoto').setAttribute('data-type', '{!!isset($data->files) ? $data->files->photo : ""!!}');
            }
            $('#ktpNumber').val('{!! isset($data->files) ? $data->files->ktpNumber : "" !!}');
            if ('{!! isset($data->files->ktp)!!}') {
                $('.currentKtp').removeAttr('hidden');
                document.getElementById('currentKtp').setAttribute('data-type', '{!!isset($data->files) ? $data->files->ktp : ""!!}');
            }
            $('#kkNumber').val('{!! isset($data->files) ? $data->files->kkNumber : "" !!}');
            if ('{!! isset($data->files->kk)!!}') {
                $('.currentKk').removeAttr('hidden');
                document.getElementById('currentKk').setAttribute('data-type', '{!!isset($data->files) ? $data->files->kk : ""!!}');
            }
            $('#npwpNumber').val('{!! isset($data->files) ? $data->files->npwpNumber : "" !!}');
            if ('{!! isset($data->files->npwp)!!}') {
                $('.currentNpwp').removeAttr('hidden');
                document.getElementById('currentNpwp').setAttribute('data-type', '{!!isset($data->files) ? $data->files->npwp : ""!!}');
            }
            if ('{!! isset($data->files->ijazah)!!}') {
                $('.currentIjazah').removeAttr('hidden');
                document.getElementById('currentIjazah').setAttribute('data-type', '{!!isset($data->files) ? $data->files->ijazah : ""!!}');
            }

            $('#bankName').val('{!! isset($data->banks) ? $data->banks->bankName : "" !!}').trigger('change');
            $('#accNumber').val('{!! isset($data->banks) ? $data->banks->accNumber : "" !!}');
            $('#accName').val('{!! isset($data->banks) ? $data->banks->accName : "" !!}');
            $('#acclocation').val('{!! isset($data->banks) ? $data->banks->acclocation : "" !!}');

        }
        //end edit data
    })
    $(document).on('click', '#currentPhoto,#currentKtp,#currentKk,#currentNpwp,#currentIjazah', function(e) {
        e.preventDefault();
        var type = $(this).data('type');
        var player = document.getElementById("player");
        var mediaPlayer;

        function createImagePlayer(src) {
            var imagePlayer = document.createElement("img");
            imagePlayer.id = "imagePlayer";
            imagePlayer.src = '{{ asset("assets/images/") }}/' + src;
            imagePlayer.alt = "Slideshow Image";
            return imagePlayer;
        }

        mediaPlayer = createImagePlayer(type);
        player.innerHTML = "";
        player.appendChild(mediaPlayer);

        $('#documentModal').modal('show');
    })
</script>
@endsection