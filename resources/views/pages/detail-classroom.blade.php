@extends('layouts.app')

@section('title', 'DataTables')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">

    <link rel="stylesheet"
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Fakultas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">DataTables</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Basic DataTables</h4>
                                <div class="card-header-action">
                                    <a id="modal-13" href="#" class="btn btn-primary">
                                        Tambah Classroom
                                    </a>

                                    {{-- ini formnya --}}
                                    <form class="modal-part"
                                        id="modal-create-classroom" method="post" action="{{ route('add-detail-classroom') }}">
                                        @csrf
                                        <p>This login form is taken from elements with <code>#modal-login-part</code> id.</p>
                                        <div class="form-group">
                                            <label>Nama Kelas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="nama ruang kelas"
                                                    name="name" id="name" required>
                                            </div>
                                            <label>Kapasitas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="jumlah kapasitas"
                                                    name="capacity" id="capacity" required>
                                            </div>
                                            <label>Gedung</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <select name="building_id" id="building_id" class="form-control">
                                                    <option value="">Pilih Gedung</option>
                                                    @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label>Fasilitas yang di sediakan</label>
                                            <select class="form-control select2" name="facilities[]" id="facilities"
                                                multiple="">
                                                @foreach($facilities as $facility)
                                                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Submit
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table"
                                        id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    id
                                                </th>
                                                <th>Nama Ruang Kelas</th>
                                                <th>Bangunan</th>
                                                <th>Kapasitas</th>
                                                <th>Fasilitas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($classrooms as $d)
                                            <tr>
                                                <td>
                                                    {{$d->id}}
                                                </td>
                                                <td>{{$d->name}}</td>
                                                <td>{{$d->building->name}}</td>
                                                <td>{{$d->capacity}}</td>
                                                <td>@foreach($d->facilities as $f)
                                                    <span class="badge badge-primary">{{$f->name}}</span>
                                                    @endforeach
                                                </td>
                                                
                                                <td>
                                                    <form action="{{ route('delete-detail-classroom', $d->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('edit-detail-classroom', $d->id) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset() }}"></script> --}}
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
    
@endpush
