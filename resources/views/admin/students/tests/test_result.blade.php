@extends('layouts.backend')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h5><strong>{{ $data['test']->name }}</strong> <span class="float-start float-lg-end"><strong>Score:
                            {{ $data['0']['test_result'] }}</strong> </span></h5>
            </div>
        </div>
        <div class="row">
            <div class="container">
                @foreach ($data['testQuestions'] as $key => $question)
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <p class="highlight"><strong>Question {{ $key + 1 }}</strong> <span
                                        class="float-start float-lg-end {{ $question->answer == 'correct' ? 'text-success' : 'text-danger' }}">
                                        {{ $question->answer == 'correct' ? '1 point of 1' : '0 point of 1' }} </span></p>
                                {!! $question->question->question ?? 'Question Not Set' !!}
                            </div>
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="answer-area" id="answerArea">
                                                @php $choices = $question->question->choices; @endphp
                                                <ul class="list-unstyled">
                                                    @foreach ($choices as $key => $value)
                                                        <li>
                                                            <div class="form-group">
                                                                <label>
                                                                    {{ str_replace('choice_', '', $key) }}&nbsp;:&nbsp;
                                                                    {{ $value }}
                                                                </label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <strong>Answer</strong>
                                            <div class="answer-area" id="answerArea">
                                                <p class="highlightLight">{!! $question->question->answer !!}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <strong>My Answer</strong>
                                            <div class="answer-area" id="answerArea">
                                                <p class="highlightLight">{!! $question->student_choice !!}</p>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>Short Answer Explanation</strong>
                                            <div class="answer-area" id="shortAnswerArea">
                                                <p class="highlightLight">{!! $question->question->short_answer !!}</p>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-6"><strong>Full Answer Explanation</strong>
                                            <div class="answer-area" id="fullAnswerArea">
                                                <p class="highlightLight">{!! $question->question->full_answer !!}</p>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>Test Topic & Concept</strong>
                                            <div class="answer-area" id="shortAnswerArea">
                                                <p class="highlightLight">{!! $question->question->topic->name !!}</p>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-6">
                                            <strong>Answer Resource Link</strong>
                                            <div class="answer-area" id="answerResourceArea">
                                                <a href="{{ $question->question->answer_resource }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $question->question->answer_resource }}</a>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
