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
                    <h3>Test Details</h3>
                    <p class="text-subtitle text-muted">Click on Test Name to View Entire Details</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Test</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3>Test: {{ $test->name}} Questions: {{$test->questions->count()}}</h3>
                    <a href="{{ route('admin.take.exam',[$test->id]) }}" class="btn btn-success float-start float-lg-end">Take
                        Exams</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-1">
                               <h4>Test Description</h4>
                                {!!$test->description!!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-6">Max Number of Questions Per Test : {{ $test->max_number_of_questions}}</div>
                            <div class="col-6">Test Duration: {{$test->test_duration}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Questions
                    <a href="{{ route('admin.tests.question.create',[$test->id]) }}" class="btn btn-primary float-start float-lg-end">Add
                        Question</a>
                </div>
                <div class="card-body">
                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody>
                            <tr>
                                <td>Start date:</td>
                                <td><input type="date" id="min" name="min"></td>
                            </tr>
                            <tr>
                                <td>End date:</td>
                                <td><input type="date" id="max" name="max"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" id="ContactTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Short Answer Explanation</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    @endsection
    @section('scripts')
        @include('layouts.partials.utilities.datatableScripts')
        <script>
            $(document).ready(function() {
                $('#ContactTable').DataTable({
                    processing: true,
                    method: 'GET',
                    serverSide: true,
                    ajax: "{{ route('admin.tests.show',$test->id) }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'question',
                            name: 'question'
                        },
                        {
                            data: 'answer',
                            name: 'answer'
                        },
                        {
                            data: 'short_answer',
                            name: 'short_answer'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'actions',
                            name: 'actions'
                        },
                    ],
                    dom: 'lBfrtip',
                    pageLength: 100,
                    buttons: [
                        'copy',
                        {
                            extend: 'excelHtml5',
                            title: 'Contact_list',
                            exportOptions: {
                                exportOptions: {
                                    columns: [0, 1, 2, ':visible']
                                }
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Contact_list',
                            exportOptions: {
                                columns: [0, 1, 2]
                            }
                        },
                        'colvis'
                    ]
                });
            });
        </script>
        <script>
            var minDate, maxDate;

            // Custom filtering function which will search data in column four between two values
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = minDate.val();
                    var max = maxDate.val();
                    var date = new Date(data[4]);

                    if (
                        (min === null && max === null) ||
                        (min === null && date <= max) ||
                        (min <= date && max === null) ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                    return false;
                }
            );

            $(document).ready(function() {
                // Create date inputs
                minDate = new DateTime($('#min'), {
                    format: 'MMMM Do YYYY'
                });
                maxDate = new DateTime($('#max'), {
                    format: 'MMMM Do YYYY'
                });

                // DataTables initialisation
                var table = $('#ContactTable').DataTable();

                // Refilter the table
                $('#min, #max').on('change', function() {
                    table.draw();
                });
            });
        </script>
    @endsection
