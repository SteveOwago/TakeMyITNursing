@extends('layouts.backend')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <style>
        .answer-area {
            display: none;
        }

        .show-indicator {
            cursor: pointer;
            text-decoration: none;
            color: blue;
        }
    </style>
@endsection
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Test Details</h3>
                    <p class="text-subtitle text-muted">Click on Action Buttons to View Entire Details</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Take Test</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4>Test: {{ $test->name }} <span class="float-start float-lg-end">Total Available Questions (Bank):
                            {{ $test->questions->count() }}</span> </h4>
                </div>
                <div class="card-body">
                    <livewire:test-exam :id="$test->id"/>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    @endsection
    @section('scripts')
    <script>
        function showAnswer() {
            var answerArea = document.getElementById('answerArea');
            answerArea.style.display = 'block';
        }
        function showShortAnswer() {
            var shortAnswerArea = document.getElementById('shortAnswerArea');
            shortAnswerArea.style.display = 'block';
        }
        function showFullAnswer() {
            var fullAnswerArea = document.getElementById('fullAnswerArea');
            fullAnswerArea.style.display = 'block';
        }
        function showAnswerResource() {
            var answerResourceArea = document.getElementById('answerResourceArea');
            answerResourceArea.style.display = 'block';
        }
    </script>
    @endsection
