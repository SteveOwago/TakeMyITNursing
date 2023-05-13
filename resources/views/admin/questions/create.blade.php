@extends('layouts.backend')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backendIT/assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backendIT/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('backendIT/assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('backendIT/assets/css/pages/filepond.css') }}">
@endsection
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Question</h3>
                    <p class="text-subtitle text-muted">Select Test and Add Question Details</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Question Exam</li>
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
                            <h4 class="card-title">Create Question</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('admin.questions.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-10 offset-1">
                                            <div class="col-md-12 col-12">
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
                                                            <option disabled>No Test Added</option>
                                                        @endforelse
                                                    </select>
                                                </fieldset>
                                                @error('subject_domain_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Question</label>
                                                <textarea rows="10" class="form-control" placeholder="Start Typing Here ..." id="editor" name="question"></textarea>
                                                <div id="informationchar"></div>
                                                <div id="informationword"></div>
                                                {{-- <div id="informationparagraphs"></div> --}}
                                                @error('question')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <label for="">Choices</label>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first-name-column">A</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="A Answer" name="choice_A">
                                                    </div>
                                                    @error('choice_A')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first-name-column">B</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="A Answer" name="choice_B">
                                                    </div>
                                                    @error('choice_B')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first-name-column">C</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="A Answer" name="choice_C">
                                                    </div>
                                                    @error('choice_C')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first-name-column">D</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="D Answer" name="choice_D">
                                                    </div>
                                                    @error('choice_D')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first-name-column">E</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="E Answer" name="choice_E">
                                                    </div>
                                                    @error('choice_E')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="choices" id="choices"
                                                    value="{{ old('choices') ?? '{}' }}">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <label for="first-name-column">Select Answer</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" name="answer" required>
                                                            <option selected value="" disabled>Click Here</option>
                                                            @forelse ($answers as $item)
                                                                <option value="{{ $item->choice }}">{{ $item->choice }}</option>
                                                            @empty
                                                                <option disabled>No Choices Added</option>
                                                            @endforelse
                                                        </select>
                                                    </fieldset>
                                                    @error('answer')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Answer Resource URL</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="https://example.com" name="answer_resource">
                                                    </div>
                                                    @error('answer')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Short Answer Explanation</label>
                                                <textarea rows="10" class="form-control" placeholder="Start Typing Here ..." id="editor1"
                                                    name="short_answer"></textarea>
                                                <div id="informationchar"></div>
                                                <div id="informationword"></div>
                                                {{-- <div id="informationparagraphs"></div> --}}
                                                @error('short_answer')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label>Full Answer Explanation</label>
                                                <textarea rows="10" class="form-control" placeholder="Start Typing Here ..." id="editor2"
                                                    name="full_answer"></textarea>
                                                <div id="informationchar"></div>
                                                {{-- <div id="informationword"></div> --}}
                                                <div id="informationparagraphs"></div>
                                                @error('full_answer')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
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
        // Listen for changes in the choice input fields
        var choiceInputs = document.querySelectorAll('input[name^="choice_"]');
        choiceInputs.forEach(function(input) {
            input.addEventListener('input', updateChoices);
        });

        // Function to update the hidden input field with the JSON representation of the choices
        function updateChoices() {
            var choices = {};
            choiceInputs.forEach(function(input) {
                choices[input.name] = input.value;
            });
            document.getElementById('choices').value = JSON.stringify(choices);
        }
    </script>
    <script src="{{ asset('backendIT/assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('backendIT/assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('backendIT/assets/js/pages/filepond.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('backendIT/assets/js/pages/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backendIT/assets/js/pages/ckeditor/plugins/wordcount/plugin.js') }}"></script>
    <script src="{{ asset('backendIT/assets/js/pages/ckeditor.js') }}"></script>
@endsection
