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
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Cabang Universitas</h1>
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
                                    <a id="modal-10" href="#" class="btn btn-primary">
                                        Tambah Gedung
                                    </a>

                                    {{-- ini formnya --}}
                                    <form class="modal-part"
                                        id="modal-create-building" method="post" action="{{ route('add-detail-building') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Gedung</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="nama fakultas"
                                                    name="name" id="name" required>
                                            </div>
                                            <label>Kode Gedung</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control"
                                                    placeholder="alamat"
                                                    name="codeBuilding" id="codeBuilding" required>
                                            </div>
                                            <label>Cabang dan fakultas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                </div>
                                                <select class="form-control" name="branf_id" id="branf_id">
                                                    @foreach ($branch_faculties as $b)
                                                        <option value="{{ $b->id }}">{{ $b->branch->name }} - {{ $b->faculty->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        
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
                                                <th>Nama Cabang</th>
                                                <th>Alamat</th>
                                                <th>Fakultas didalamnya</th>
                                                <th>Kota</th>
                                                <th>Kode Pos</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($buildings as $b)
                                            <tr>
                                                <td>
                                                    {{$b->id}}
                                                </td>
                                                <td>{{$b->name}}</td>
                                                <td>
                                                    {{ $b->codeBuilding }}
                                                </td>
                                                <td>
                                                    {{ $b->branch_faculty->branch->name }} - {{ $b->branch_faculty->faculty->name }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('delete-detail-branch', $b->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <a href="{{ route('edit-detail-branch', $b->id) }}" class="btn btn-primary">Edit</a>
                                                    
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
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
