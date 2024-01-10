<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title">{{$judul}} - {{$subJudul}}</h4>
    </li>
    <li class="breadcrumb-item bcrumb-1">
        <a href="{{Route('dashboard')}}">
            <i class="fas fa-home"></i> Home</a>
    </li>
    <li class="breadcrumb-item bcrumb-2">
        <a href="#" onClick="return false;">{{$judul}}</a>
    </li>
    <li class="breadcrumb-item active">{{$subJudul}}</li>
</ul>