@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Subject Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Subject Forms</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Mata Kuliah</h4>
                            </div>
                            <form method="post" action="{{ route('update-detail-subject', $subject->id) }}" >
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Subject</label>
                                        <input type="text"
                                            class="form-control" name="name" id="name" value="{{ $subject->name }}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select class="form-control" name="term" id="term">
                                            <option {{$subject->term == 'Semester 1'?'selected':'' }}>Semester 1</option>
                                            <option {{$subject->term == 'Semester 2'?'selected':'' }}>Semester 2</option>
                                            <option {{$subject->term == 'Semester 3'?'selected':'' }}>Semester 3</option>
                                            <option {{$subject->term == 'Semester 4'?'selected':'' }}>Semester 4</option>
                                            <option {{$subject->term == 'Semester 5'?'selected':'' }}>Semester 5</option>
                                            <option {{$subject->term == 'Semester 6'?'selected':'' }}>Semester 6</option>
                                            <option {{$subject->term == 'Semester 7'?'selected':'' }}>Semester 7</option>
                                            <option {{$subject->term == 'Semester 8'?'selected':'' }}>Semester 8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
