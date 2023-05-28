@extends('layouts.backend')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
@endsection
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Question Details</h3>
                    <p class="text-subtitle text-muted">Click on Question Name to View Entire Details</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Question</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4>Question: {!! $question->question!!} </h4>
                    @if (auth()->user()->hasRole('Admin'))<a href="{{ route('admin.questions.create') }}" class="btn btn-primary float-start float-lg-end">Add
                        Questions</a>
                        @endif
                </div>
                {{-- Choice Section --}}




                {{-- Select Answer Section. --}}





                {{-- <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-1">
                               <h4>Question Description</h4>
                                {!!$question->description!!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-6">Max Number of Questions Per question : {{ $question->max_number_of_questions}}</div>
                            <div class="col-6">question Duration: {{$question->question_duration}}</div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
    @endsection
