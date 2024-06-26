@extends('layouts.backend')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backendIT/assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backendIT/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('backendIT/assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('backendIT/assets/css/pages/filepond.css') }}">
@endsection
@section('content')
    @if (auth()->user()->hasRole('Admin'))
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Edit Topic Exams</h3>
                        <p class="text-subtitle text-muted">Select Domain and Subject Category</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Topic</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- // Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit topic Examination</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" action="{{ route('admin.topics.update', [$topic]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <label for="first-name-column">Select Test</label>
                                                <fieldset class="form-group">
                                                    <select class="form-select dynamicSubjectDomain"
                                                        id="dynamicSubjectDomain" name="test_id"
                                                        data-dependent="subject_category_id" data-campaign="sender-name"
                                                        required>
                                                        <option selected value="" disabled>Click Here</option>
                                                        @forelse ($tests as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @empty
                                                            <option disabled>No Tests Added</option>
                                                        @endforelse
                                                    </select>
                                                </fieldset>
                                                @error('subject_domain_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Topic Name</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Topic Name" name="name" value="{{ $topic->name }}">
                                                </div>
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Description</label>
                                                <textarea rows="10" class="form-control" placeholder="Start Typing Here ..." id="editor" name="description">{{ $topic->description }}</textarea>
                                                <div id="informationchar"></div>
                                                {{-- <div id="informationword"></div> --}}
                                                <div id="informationparagraphs"></div>
                                            </div>
                                            @error('description')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic multiple Column Form section end -->
        </div>
    @endif
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function() {

            // Client Change
            $('.dynamicSubjectDomain').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr('name');
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('fetch.subjects.categories') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }

                    })
                }
            });

            $('.dynamicSubjectDomain').change(function() {
                $('.dynamicSubjectCategory').val('');
                $('.dynamicShortCode').val('');
            });
        });
    </script>
    <script src="{{ asset('backendIT/assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('backendIT/assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('backendIT/assets/js/pages/filepond.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('backendIT/assets/js/pages/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backendIT/assets/js/pages/ckeditor/plugins/wordcount/plugin.js') }}"></script>
    <script src="{{ asset('backendIT/assets/js/pages/ckeditor.js') }}"></script>
@endsection
